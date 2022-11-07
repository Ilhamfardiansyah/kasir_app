<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Routing\Controller;
use App\Models\Suplaier;
use Auth;
use Alert;
use App\Models\Size;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MasterController extends Controller
{
    public function index()
    {
            $title = 'Data Master';
            $suplaier = Suplaier::all();
            $size = Size::all();
            $kategori = Kategori::all();
            $rak = Rak::all();
        return view('dashboard.index', compact('title', 'suplaier', 'size', 'kategori', 'rak'));
    }

    public function create(){
        $last = Produk::groupBy('kode_produk')->get();
        if(count($last) == 0){
            $last = 1;
        }else {
            $last = count($last) + 1;
        }
        $title = 'Data Master';
        $suplier = Suplaier::all();
        $invoice ='Invoice:000'. $last. date('GisdMY');
        $kode_barang = 'B000'. $last;
        $barcode = '000045825'. $last;
        $size = Size::all();
        $kategori = Kategori::all();
        $rak = Rak::all();
        $produk = Produk::with('suplaier', 'size');
        return view ('dashboard.index', compact('invoice', 'produk', 'title',
        'suplier', 'kode_barang', 'barcode', 'size', 'kategori', 'rak'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama_produk' => 'required',
            'suplaier_id' => 'required',
            'no_invoice' => 'required',
            'kode_produk' => 'required|unique:produks',
            'barcode' => 'required|unique:produks',
            'stok' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'size_id' => 'required',
            'kategori_id' => 'required',
            'rak_id' => 'required', //disini am errornya rak_id gada, sedangkan lu setnya harus terisi, di vienya jek? iyaa
        ]);

        $nama_produk = $request->nama_produk;
        $suplaier_id = $request->suplaier_id;
        // dd($suplaier_id);
        $user_id = Auth::user()->id;
        $no_invoice = $request->no_invoice;
        $kode_produk = $request->kode_produk;
        $barcode = $request->barcode;
        $stok = $request->stok;
        $harga_jual = $request->harga_jual;
        $harga_beli = $request->harga_beli;
        $size_id = $request->size_id;
        $kategori_id = $request->kategori_id;
        $rak_id = $request->rak_id;
        $title = 'Print Invoice';
        $data = $request->created_at;
        $nama_suplaier = Suplaier::where('id', $suplaier_id)->first()->value('nama_supplier');
        $total_harga = (int) $stok * (int) $harga_beli;

        Produk::create([
            'nama_produk' => $nama_produk,
            'suplaier_id' => $suplaier_id,
            'user_id' => $user_id,
            'no_invoice' => $no_invoice,
            'kode_produk' => $kode_produk,
            'barcode' => $barcode,
            'stok' => $stok,
            'harga_jual' => $harga_jual,
            'harga_beli' => $harga_beli,
            'total_harga'=> $total_harga,
            'size_id' => $size_id,
            'kategori_id' => $kategori_id,
            'rak_id' => $rak_id
        ]);

        $last = Produk::groupBy('kode_produk')->get();
        if(count($last) == 0){
            $last = 1;
        }else {
            $last = count($last) + 1;
        }
        $title = 'Data Master';
        $invoice ='Invoice:000' . date('GdM-Y');
        $kode_barang = 'B000'. $last;
        $barcode = '000045825'. $last;
        return response()->json([
            'status' => 'ok',
            'data' =>  [
                'invoice' => $invoice,
                'kode_barang' => $kode_barang,
                'barcode' => $barcode,
            ]
        ]);

    }

    public function print()
    {
        $data = Produk::whereDate('created_at', date('Y-m-d'))->get();
        if(count($data)==0) {
            Alert::warning('Data untuk hari ini tidak ditemukan', 'silahkan tunggu setelah transaksi masuk');
            return back();
        }else{
            $title = 'Print Invoice';
            return view('print.index', compact('data', 'title'));
        }
    }

    public function printmonth()
    {
        $data = Produk::whereMonth('created_at', date('m'))->get();
        if(count($data)==0){
            Alert::warning('Data untuk bulan ini tidak ditemukan', 'silahkan tunggu setelah transaksi masuk');
            return back();
        }else{
            $title = 'Print Invoice';
            $stok = $data->sum('stok');
            $total = $data->sum('harga_jual');
            $total_barang = $stok;
            $total_harga = $data->sum('total_harga');
            $keseluruhan = $stok * $total;
            return view('print.bulan', compact('data', 'title', 'stok', 'total', 'total_harga', 'keseluruhan', 'total_barang'));
        }
    }

    public function cari(){
        return view('dashboard.input', [
            'title' => 'Input Produk'
        ]);
    }

    // public function update(Request $request){
    //    $tes = Produk::where('stok', $request->stok)->first();
    //     // dd($tes->stok+$request->stok);
    //            Produk::where('stok', $request->stok)
    //         ->update([
    //             'stok' => $tes->stok+$request->stok,
    //         ]);
    //             return back();
    // }



    public function barcode(){
        $data = Produk::with(['rak', 'kategori'])->get();
        $title = 'Print Barcode';
        return view('barcode.index', compact('data', 'title'));
    }

    public function show(Rak $rak)
    {
        $title = 'Cetak Barcode';
        $data = $rak->produk;
        $pdf = PDF::loadview('barcode.detail', compact('title', 'data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-barcode.pdf');
    }



    public function cetakBarcode(Request $request)
    {
        return $request;
    }
}


