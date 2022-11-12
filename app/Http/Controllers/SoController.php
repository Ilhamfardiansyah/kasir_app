<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Produk;
use App\Models\Produks;
use App\Models\Raks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SoController extends Controller
{
    public function index()
    {
        $title = 'Stock Opname';
        $data = Rak::all();
        return view('so.index', compact('title', 'data'));
    }
}
