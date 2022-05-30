<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Alert;

class MasterController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Data Master"
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama_produk' => 'required',
            'kode_produk' => 'required|unique:produks',
            'barcode' => 'required|unique:produks',
            'stok' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'total_harga' => 'required'
        ]);
        // dd($validateData);

        Produk::create($validateData);
        toast('Your Post as been submited!','success');
        return redirect('/barangbaru');
    }
}
