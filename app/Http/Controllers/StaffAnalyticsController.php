<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffAnalyticsController extends Controller
{
    public function index()
    {
        //get the data from the database and display it
        $staff = Staff::all();

        //get the staff who has the commission highest in the order and get all
        $staffLeaderboard1 = Staff::orderBy('commission', 'desc')->with('users')->first();
        $staffLeaderboard2 = Staff::orderBy('commission', 'desc')->skip(1)->with('users')->first();
        $staffLeaderboard3 = Staff::orderBy('commission', 'desc')->skip(2)->with('users')->first();

        //the rest of the staffs
        $staffLeaderboardAfter3 = Staff::orderBy('commission', 'desc')
            ->with('users')
            ->skip(3) // Skip the first three records
            ->take(PHP_INT_MAX) // Take all remaining records
            ->get();


    //---------------------------BAR CHART---------------------------------

        //get the staff who has the commission highest in the order and get all
        $staffLeaderboard1Bar = Staff::orderBy('commission', 'desc')->with('users')->first();
        $staffLeaderboard2Bar = Staff::orderBy('commission', 'desc')->skip(1)->with('users')->first();
        $staffLeaderboard3Bar = Staff::orderBy('commission', 'desc')->skip(2)->with('users')->first();

        //add the these staffs commission to the array
        $staffLeaderboardBar = array(
            $staffLeaderboard1Bar->commission,
            $staffLeaderboard2Bar->commission,
            $staffLeaderboard3Bar->commission
        );

        //add the these staffs name to the array
        $staffLeaderboardBarName = array(
            $staffLeaderboard1Bar->users->name,
            $staffLeaderboard2Bar->users->name,
            $staffLeaderboard3Bar->users->name
        );


        return view(
            'admin.staff.staffAnalytics',
            compact(
                'staff',
                'staffLeaderboard1',
                'staffLeaderboard2',
                'staffLeaderboard3',
                'staffLeaderboardAfter3',
                'staffLeaderboardBar',
                'staffLeaderboardBarName'
            )
        );
    }

    // public function staffDisplay()
    // {
    //     //get the data from the database and display it
    //     $staff = Staff::all();

    //     //get the staff who had the highest commission,second highest and third highest at first,second and third place respectively
    //     $staffLeaderboard1 = Staff::orderBy('commission', 'desc')->first()->with('users');
    //     $staffLeaderboard2 = Staff::orderBy('commission', 'desc')->skip(1)->first()->with('users');
    //     $staffLeaderboard3 = Staff::orderBy('commission', 'desc')->skip(2)->first();



    //     return view('admin.staff.staffAnalytics', compact('staff', 'staffLeaderboard1', 'staffLeaderboard2', 'staffLeaderboard3'));
    // }
}
