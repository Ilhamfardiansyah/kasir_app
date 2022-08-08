<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Produk;
use Alert;

class UpdateController extends Controller
{
     public function cari($barcode)
    {
        // $data = Post::Where('barcode' , $barcode)->with(['suplaier', 'rak'])->first();
        $data = Produk::Where('barcode' , $barcode)->first();
        if ($data==null) {
            Alert::error('Gagal','Tidak Temukan');
            return back();
        }
        else {
    $title = 'Input Data';
    return view('dashboard.data', compact('data', 'title'));
                    }
            }
}
