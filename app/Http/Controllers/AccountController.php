<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Auth;

class AccountController extends Controller
{
    public function index(){
        return view('profile.index', [
            'title' => 'Account Profile',
            'user' => User::all()
        ]);
    }

    public function view(){
        $data = User::all();
        $title = 'Account Karyawan';
        return view('profile.view', compact('data', 'title'));
    }
}
