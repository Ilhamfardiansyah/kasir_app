<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;



class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Tambah Kategori';
        $data = Kategori::all();
        return view('master.kategori', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|unique:kategoris',
        ]);
        Kategori::create($validateData);
        toast('Data Kategori Berhasil Ditambahkan!!','success');
        return back();
    }

    public function destroy($id)
    {
        DB::table('kategoris')->where('id', $id)->delete();
        toast('Data kategori Berhasil Dihapus','error');
        return back();
    }
}
