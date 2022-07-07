<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use App\Models\Produk;
use App\Models\Suplaier;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            "title" => 'Home',
            "produk" => Produk::all(),
            "suplier" => Suplaier::all(),
            "jml_produk" => Produk::count(),
            "jml_supplier" => Suplaier::count(),
            "jml_user" => User::count()
                        // 'users' => User::all()
        ]);
    }
}
