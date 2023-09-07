<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        // if ($role == '1') {
        //     return view('admin.home');
        // } elseif ($role == '0') {
        //     return view('dashboard');
        // } else {
        //     return view('shop.logged-index');
        // }

        if ($role == "admin") {
            $users = User::all();
            $usersCount = $users->count();

            //get the count of admin users
            $adminUsers = User::where('role', 'admin')->get();
            $adminCount = $adminUsers->count();

            //get the count of staff users
            $staffUsers = User::where('role', 'staff')->get();
            $staffCount = $staffUsers->count();

            //get the count of customer users
            $customerUsers = User::where('role', 'customer')->get();
            $customerCount = $customerUsers->count();

            //new users who joint today
            $newUsers = User::whereDate('created_at', date('Y-m-d'))->get();
            $newUsersCount = $newUsers->count();



            return view('admin.home', compact('usersCount', 'adminCount', 'staffCount', 'customerCount', 'newUsersCount'));
            
        } elseif ($role == "staff") {
            return view('dashboard');
        } else {
            return view('shop.logged-index');
        }
    }

    public function adminHome()
    {
        $users = User::all();
        $usersCount = $users->count();

        //get the count of admin users
        $adminUsers = User::where('role', 'admin')->get();
        $adminCount = $adminUsers->count();

        //get the count of staff users
        $staffUsers = User::where('role', 'staff')->get();
        $staffCount = $staffUsers->count();

        //get the count of customer users
        $customerUsers = User::where('role', 'customer')->get();
        $customerCount = $customerUsers->count();

        //new users who joint today
        $newUsers = User::whereDate('created_at', date('Y-m-d'))->get();
        $newUsersCount = $newUsers->count();



        return view('admin.home', compact('usersCount', 'adminCount', 'staffCount', 'customerCount', 'newUsersCount'));
    }
}
