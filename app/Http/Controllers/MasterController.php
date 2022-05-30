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
