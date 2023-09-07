<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_Details;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.booking.bookingDashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userPurchaseBooking($id)
    {
        //get the vehicle details
        $viewproduct=Vehicle_Details::find($id);
        return view('shop.purchase.purchase', compact('viewproduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
