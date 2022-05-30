<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuplaierController extends Controller
{
    public function index(){
        return view('suplaier.index', [
            'title' => 'Data Supplier'
        ]);
    }

    public function create(){
        return view('suplaier.create', [
            'title' => 'Tambah Data Suplaier'
        ]);
    }
}
