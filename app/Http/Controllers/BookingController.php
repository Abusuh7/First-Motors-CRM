<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Notifications;
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
        $viewproduct = Vehicle_Details::find($id);
        return view('shop.purchase.purchase', compact('viewproduct'));
    }

    public function purchaseProcess($id)
    {
        // Get the current user id
        $user_id = auth()->user()->id;

        // Create a new booking
        $booking = new Bookings();
        $booking->user_id = $user_id;
        $booking->vehicle_id = $id;
        $booking->booking_type = 'purchase';
        $booking->booking_status = 'pending';
        $booking->booking_mode = 'online';
        $booking->booking_payment_status = 'paid';
        $booking->booking_amount = 50000;

        // Save the reservation

        $booking->save();

        //get the vehicle name from vehicle details table
        $vehicle_name = Vehicle_Details::find($id);


        // Create a new notification
        $notification = new Notifications();
        $notification->booking_id = $booking->id;
        $notification->notification_type = 'purchase';
        $notification->notification_status = 'unread';
        $notification->notification_message = 'New Purchase Request from ' . auth()->user()->name . ' for ' . $vehicle_name->vehicle_model;

        // Save the notification
        $notification->save();


        // Return a success response
        return response()->json(['success' => true, 'message' => 'Reservation successful']);
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
