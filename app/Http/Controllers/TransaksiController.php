<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use App\Models\Suplaier;
use Illuminate\Support\Facades\Auth;
use Alert;

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

    function nguranginStok($id, $qty){
        $stok = Produk::Where('id', $id)->first()->stok;
        if($qty > $stok ){
             Alert::error('blooggg kelebihan...');
            return back();
        }else{
        $produk = Produk::Where('id', $id)->update([
            'stok' => $stok - $qty
            ]);
             Alert::success('good job...');
            return back();
        }
    }


    public function cari(Request $request){
        $cari = $request->cari;
        $produk = Produk::orderBY('updated_at', 'asc')->skip(0)->take(10)->get();
        $title = 'Transaksi';
        return view('transaksi.index', compact('produk', 'title'));
    }
    public function menu(){
        return view('transaksi.index', [
            "title" => "Data Master",
            'suplaier' => Suplaier::all()
        ]);
    }

    public function create(Request $request){
        $cari = $request->cari;
        $produk = DB::table('produks')
        ->where('id', 'like', "%".$cari. "%")
        ->paginate();
        $title = 'Transaksi';
        return view('transaksi.index', compact('produk', 'title'));
    }

    public function store(Request $request){
        dd($request->all()); //viewnya am mana
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
        $user_id = Auth::user()->id;
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

        $last = Produk::groupBy('kode_produk')->get();
        if(count($last) == 0){
            $last = 1;
        }else {
            $last = count($last) + 1;
        }
        $title = 'Data Master';
        $invoice ='Invoice:000' . date('GdM-Y');
        $kode_barang = 'B000'. $last;
        $barcode = '000045825'. $last;
        return response()->json([
            'status' => 'ok',
            'data' =>  [
                'invoice' => $invoice,
                'kode_barang' => $kode_barang,
                'barcode' => $barcode,
            ]
        ]);

    }
}
