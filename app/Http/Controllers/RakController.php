<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Rak;
use Illuminate\Support\Facades\DB;


class RakController extends Controller
{
    public function index()
    {
        $title = 'Tambah Data Rak';
        $data = Rak::all();
        return view('master.rak', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|unique:raks',
        ]);
        Rak::create($validateData);
        toast('Data Kategori Berhasil Ditambahkan!!','success');
        return back();
    }

    public function destroy($id)
    {
        DB::table('raks')->where('id', $id)->delete();
        toast('Data Rak Berhasil Dihapus','error');
        return back();
    }
}
