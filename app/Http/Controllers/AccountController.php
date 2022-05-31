<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;


class AccountController extends Controller
{
    public function index(){
        return view('profile.index', [
            'title' => 'Account Profile',
            'user' => User::all()
        ]);
    }
}
