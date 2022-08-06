<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Alert;
use Illuminate\Routing\Controller;
use App\Models\Suplaier;
use Auth;


class MasterController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Data Master",
            'suplaier' => Suplaier::all()
        ]);
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
        $invoice ='Invoice:000' . $last. date('dM-Y');
        $kode_barang = 'B000'. $last;
        $barcode = '000045825'. $last;
        $produk = Produk::with('suplaier');
        return view ('dashboard.index', compact('invoice', 'produk', 'title', 'suplier', 'kode_barang', 'barcode'));
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
            'total_harga'=> $total_harga
        ]);

        $last = Produk::groupBy('kode_produk')->get();
        if(count($last) == 0){
            $last = 1;
        }else {
            $last = count($last) + 1;
        }
        $title = 'Data Master';
        $invoice ='Invoice:000' . date('dM-Y');
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
        $title = 'Print Invoice';
        $data = Produk::whereDate('created_at', date('Y-m-d'))->get();
        return view('print.index', compact('data', 'title'));
    }

    public function edit(){
        return view('dashboard.input', [
            'title' => 'Input Produk'
        ]);
    }

    public function update(Request $request){
       $tes = Produk::where('barcode', $request->barcode)->first();
        // dd($tes->stok+$request->stok);
        Produk::where('barcode', $request->barcode)
            ->update([
                'stok' => $tes->stok+$request->stok,
            ]);
                return back();
    }
}


