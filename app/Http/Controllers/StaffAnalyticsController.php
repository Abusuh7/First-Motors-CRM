<?php

namespace App\Http\Controllers;

use App\Models\Sold_Vehicles;
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
        //get the staff id
        $staffLeaderboard1Id = $staffLeaderboard1->id;
        //get the count of vehicles sold by the staff from sold vehicles table
        $staffLeaderboard1Count = Sold_Vehicles::where('staff_id', $staffLeaderboard1Id)->count();


        //get the staff who has the commission second highest in the order and get all
        $staffLeaderboard2 = Staff::orderBy('commission', 'desc')->skip(1)->with('users')->first();
        $staffLeaderboard2Id = $staffLeaderboard2->id;
        $staffLeaderboard2Count = Sold_Vehicles::where('staff_id', $staffLeaderboard2Id)->count();


        //get the staff who has the commission third highest in the order and get all
        $staffLeaderboard3 = Staff::orderBy('commission', 'desc')->skip(2)->with('users')->first();
        $staffLeaderboard3Id = $staffLeaderboard3->id;
        $staffLeaderboard3Count = Sold_Vehicles::where('staff_id', $staffLeaderboard3Id)->count();


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
                'staffLeaderboard1Count',
                'staffLeaderboard2Count',
                'staffLeaderboard3Count',
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
