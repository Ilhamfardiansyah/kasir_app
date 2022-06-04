<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Alert;
use Illuminate\Routing\Controller;
use App\Models\Suplaier;


class MasterController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Data Master",
            'suplaier' => Suplaier::all()
        ]);
    }

    public function create(){
        $last = Produk::count();
        $title = 'Data Master';
        $suplier = Suplaier::all();
        $invoice ='Invoice'.':'. '00'. $last. date('dM-Y');
        $kode_barang = 'B'. '000' . $last;
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
        $user_id = $request->user_id;
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

        // dd($suplaier);

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
        return view('print.index', compact('nama_produk', 'suplaier_id', 'user_id', 'no_invoice', 'kode_produk', 'barcode', 'stok', 'harga_jual', 'harga_beli', 'total_harga' ,'title', 'data', 'nama_suplaier'));
        toast('Barang baru sudah ditambahkan','success');
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


