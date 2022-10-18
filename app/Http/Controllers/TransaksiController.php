<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Produk;


class TransaksiController extends Controller
{
    public function index(){
        $data = Produk::orderBY('updated_at', 'asc')->skip(0)->take(10)->get();
        $title = 'Transaksi';
        return view('transaksi.index', compact('data', 'title'));
    }
    public function jadwal(){
        $data = Produk::orderBY('updated_at', 'asc')->skip(0)->take(10)->get();
        $title = 'Jadwal Penjualan';
        return view('jadwal.index', compact('data', 'title'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $produk = DB::table('produk')
        ->where('id', 'like', "%".$cari. "%")
        ->paginate();

        return view('transaksi.index', ['produk' =>$produk]);
    }
}
