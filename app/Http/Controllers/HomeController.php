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
        $data = [
            "title" => 'Home',
            "produk" => Produk::all(),
            "suplier" => Suplaier::all(),
            "jml_produk" => Produk::count(),
            "jml_supplier" => Suplaier::count(),
            "jml_user" => User::count()
            ];

        if (auth()->user()->hasRole('kasir')) {
		return view('dashboards.kasir', $data);
	    }
	    if (auth()->user()->hasRole('admin')) {
		return view('dashboards.admin', $data);
	    }
	    return view('dashboards.role_not_found');
    }
}
