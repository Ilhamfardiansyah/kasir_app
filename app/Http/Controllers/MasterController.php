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
            'user_id' => 'max:255',
            'no_invoice' => 'required',
            'kode_produk' => 'required|unique:produks',
            'barcode' => 'required|unique:produks',
            'stok' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'total_harga' => 'required'
        ]);
        // dd($validateData);

        Produk::create($validateData);
        toast('Barang baru sudah ditambahkan','success');
        return redirect('/inputbarangbaru');
    }
}
