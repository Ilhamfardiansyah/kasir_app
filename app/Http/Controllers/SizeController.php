<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Size;
use Alert;
use Illuminate\Support\Facades\DB;


class SizeController extends Controller
{
    public function index(){
        $title = 'Tambah Size';
        $data = Size::all();
        return view('master.size', compact('title', 'data'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|unique:sizes',
        ]);
        Size::create($validateData);
        toast('Data Size Berhasil Ditambahkan!!','success');
        return back();
    }

    public function destroy($id){
        DB::table('sizes')->where('id', $id)->delete();
        toast('Data Size Berhasil Dihapus','error');
        return back();
    }
}
