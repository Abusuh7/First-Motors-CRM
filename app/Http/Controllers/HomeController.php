<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Notifications;
use App\Models\User;
use App\Models\User_Details;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
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

            //get the test drive notification count where status is pending or approved
            $testDriveCount = Notifications::where('notification_type', 'test_drive')->get()->count();

            //get the purchase notification count where status is pending or approved
            $purchaseCount = Notifications::where('notification_type', 'purchase')->get()->count();

            //get the total count of vehicles where status is available
            $vehiclesCount = Vehicle_Details::where('availability', 'available')->get()->count();

            //get the total count of vehicles where status is sold
            $soldVehiclesCount = Vehicle_Details::where('availability', 'sold')->get()->count();

            //get all the test drive bookings count
            $testDriveTotalCount = Bookings::where('booking_type', 'test_drive')->get()->count();

            //get all the purchase bookings count
            $purchaseTotalCount = Bookings::where('booking_type', 'purchase')->get()->count();


            //--------------------GRAPH DATA-----------------------------

            //get user count who's city is colombo
            $colomboUsers = User_Details::where('city', 'colombo')->get()->count();

            //get user count who's city is gampaha
            $anuradhapuraUsers = User_Details::where('city', 'anuradhapura')->get()->count();

            //get user count who's city is kalutara
            $kalutaraUsers = User_Details::where('city', 'kalutara')->get()->count();

            //get user count who's city is kandy
            $kandyUsers = User_Details::where('city', 'kandy')->get()->count();

            //get user count who's city is galle
            $galleUsers = User_Details::where('city', 'galle')->get()->count();

            //get users who are none of the above
            $otherUsers = User_Details::where('city', '!=', 'colombo')
                ->where('city', '!=', 'anuradhapura')
                ->where('city', '!=', 'kalutara')
                ->where('city', '!=', 'kandy')
                ->where('city', '!=', 'galle')
                ->get()->count();

            //get all these counts in an array
            $cityCount = array(
                $colomboUsers,
                $kalutaraUsers,
                $galleUsers,
                $anuradhapuraUsers,
                $kandyUsers,
                $otherUsers
            );




            return view('admin.home', compact(
                'usersCount',
                'adminCount',
                'staffCount',
                'customerCount',
                'newUsersCount',
                'testDriveCount',
                'purchaseCount',
                'vehiclesCount',
                'soldVehiclesCount',
                'testDriveTotalCount',
                'purchaseTotalCount',
                'cityCount'
            ));
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

        //get the test drive notification count where status is pending or approved
        $testDriveCount = Notifications::where('notification_type', 'test_drive')->get()->count();

        //get the purchase notification count where status is pending or approved
        $purchaseCount = Notifications::where('notification_type', 'purchase')->get()->count();

        //get the total count of vehicles where status is available
        $vehiclesCount = Vehicle_Details::where('availability', 'available')->get()->count();

        //get the total count of vehicles where status is sold
        $soldVehiclesCount = Vehicle_Details::where('availability', 'sold')->get()->count();

        //get all the test drive bookings count
        $testDriveTotalCount = Bookings::where('booking_type', 'test_drive')->get()->count();

        //get all the purchase bookings count
        $purchaseTotalCount = Bookings::where('booking_type', 'purchase')->get()->count();


        //--------------------GRAPH DATA-----------------------------

        //get user count who's city is colombo
        $colomboUsers = User_Details::where('city', 'colombo')->get()->count();

        //get user count who's city is gampaha
        $anuradhapuraUsers = User_Details::where('city', 'anuradhapura')->get()->count();

        //get user count who's city is kalutara
        $kalutaraUsers = User_Details::where('city', 'kalutara')->get()->count();

        //get user count who's city is kandy
        $kandyUsers = User_Details::where('city', 'kandy')->get()->count();

        //get user count who's city is galle
        $galleUsers = User_Details::where('city', 'galle')->get()->count();

        //get users who are none of the above
        $otherUsers = User_Details::where('city', '!=', 'colombo')
            ->where('city', '!=', 'anuradhapura')
            ->where('city', '!=', 'kalutara')
            ->where('city', '!=', 'kandy')
            ->where('city', '!=', 'galle')
            ->get()->count();

        //get all these counts in an array
        $cityCount = array(
            $colomboUsers,
            $kalutaraUsers,
            $galleUsers,
            $anuradhapuraUsers,
            $kandyUsers,
            $otherUsers
        );



        return view('admin.home', compact(
            'usersCount',
            'adminCount',
            'staffCount',
            'customerCount',
            'newUsersCount',
            'testDriveCount',
            'purchaseCount',
            'vehiclesCount',
            'soldVehiclesCount',
            'testDriveTotalCount',
            'purchaseTotalCount',
            'cityCount'
        ));
    }
}
