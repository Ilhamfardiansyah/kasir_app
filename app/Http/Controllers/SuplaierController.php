<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Suplaier;
use App\Models\Produk;
use App\Models\User;
use Alert;

class SuplaierController extends Controller
{
    public function index(){
        return view('suplaier.index', [
            'title' => 'Data Supplier',
            'suplier' => Suplaier::all(),
            'produk' => Produk::all(),
            'jml_produk' => Produk::count(),
            'jml_user' => User::count(),
            'jml_supplier' => Suplaier::count()
        ]);
    }

    public function create(){
        return view('suplaier.create', [
            'title' => 'Tambah Data Suplaier',
            'suplier' => Suplaier::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama_supplier' => 'required',
            'kode_supplier' => 'required|unique:suplaiers',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        Suplaier::create($validateData);
        toast('Your Post as been submited!','success');
        return redirect('/create');
    }
}
