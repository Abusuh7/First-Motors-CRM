<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;

        // if ($role == '1') {
        //     return view('admin.home');
        // } elseif ($role == '0') {
        //     return view('dashboard');
        // } else {
        //     return view('shop.logged-index');
        // }

        if ($role == "admin") {
            return view('admin.home');
        } elseif ($role == "staff") {
            return view('dashboard');
        } else{
            return view('shop.logged-index');
        }


    }
}
