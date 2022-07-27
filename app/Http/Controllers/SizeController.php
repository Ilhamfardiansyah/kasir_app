<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $title = 'Tambah Size';
        return view('master.size', compact('title'));
    }
}
