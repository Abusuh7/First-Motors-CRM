<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Notifications;
use App\Models\User;
use App\Models\User_Details;
use App\Models\Vehicle_Details;
use App\Notifications\BookingConfirmationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.booking.bookingDashboard');
    }

    public function userBooking()
    {
        // Get the current user's ID
        $user_id = Auth::id();

        // Retrieve all booking details of the current user with the associated vehicle information
        $user_booking_details = Bookings::where('user_id', $user_id)
            ->with('vehicle_details') // Eager load the vehicle details relationship
            ->get();

        // dd($user_booking_details);

        return view('shop.booking.booking', compact('user_booking_details'));
    }

    public function userPurchaseBookingDetails()
    {
        // Get the current user's ID
        $user_id = Auth::id();

        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking tye purchase
        $user_booking_details = Bookings::where('user_id', $user_id)
            ->where('booking_status', 'pending')
            ->orWhere('booking_status', 'approved')
            ->with('vehicle_details') // Eager load the vehicle details relationship
            ->get();

        // dd($user_booking_details);

        return view('shop.booking.purchaseBooking', compact('user_booking_details'));
    }

    public function userTestdriveBookingDetails()
    {
        // Get the current user's ID
        $user_id = Auth::id();

        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking type testdrive
        $user_booking_details = Bookings::where('user_id', $user_id)
            ->where('booking_status', 'pending')
            ->orWhere('booking_status', 'approved')
            ->with('vehicle_details') // Eager load the vehicle details relationship
            ->get();

        // dd($user_booking_details);

        return view('shop.booking.testdriveBooking', compact('user_booking_details'));
    }

    public function userPastBookingDetails()
    {
        // Get the current user's ID
        $user_id = Auth::id();

        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking type testdrive
        $user_booking_details = Bookings::where('user_id', $user_id)
            ->where('booking_status', 'rejected')
            ->orWhere('booking_status', 'completed')
            ->with('vehicle_details') // Eager load the vehicle details relationship
            ->get();

        // dd($user_booking_details);

        return view('shop.booking.pastBooking', compact('user_booking_details'));
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

        //check if the users has already done a booking and the booking status is pending or approved for the booking type purchase show error message
        if (Bookings::where('user_id', $user_id)
            ->where(function ($query) {
                $query->where('booking_status', 'pending')
                    ->orWhere('booking_status', 'approved');
            })
            ->where('booking_type', 'purchase')
            ->exists()
        ) {
            return response()->json(['success' => false, 'message' => 'You have already made a purchase booking.']);
        } else {
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
    }


    public function userTestdriveBooking($id)
    {
        //get the vehicle details
        $viewproduct = Vehicle_Details::find($id);
        //get the user id of the current user
        $user_id = Auth::id();

        $user = User::where('id', $user_id)
            ->with('user_details') // Eager load the user_details relationship
            ->first(); // Retrieve the first matching user

        // dd($user);


        //NOTIFICATIONS
        // auth()->user()->notify(new BookingConfirmationNotification());+

        return view('shop.testdrive.testdrive', compact('viewproduct', 'user'));
    }

    public function testdriveProcess(Request $request, $id)
    {
        // Get the current user id
        $user_id = Auth::id();

        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'phone_number' => 'required|string|regex:/[0-9]{10}/',
        //     'gender' => 'required',
        //     'dob' => 'required|date',
        //     'occupation' => 'required|string|max:255',
        //     'address' => 'nullable|string|max:255',
        //     'city' => 'nullable|string|max:255',
        //     'state' => 'nullable|string|max:255',
        //     'zip_code' => 'nullable|string|max:255',
        //     'country' => 'nullable|string|max:255',
        //     // 'test_drive_date' => 'required|date',
        //     // 'test_drive_time' => 'required|string|in:9:00 AM,10:00 AM,11:00 AM,12:00 PM,1:00 PM,2:00 PM,3:00 PM,4:00 PM,5:00 PM',
        // ]);

        //check if the users has already done a booking and the booking status is pending or approved for the booking type testdrive show error message
        //check if the users has already done a booking and the booking status is pending or approved for the booking type purchase show error message
        if (Bookings::where('user_id', $user_id)
            ->where(function ($query) {
                $query->where('booking_status', 'pending')
                    ->orWhere('booking_status', 'approved');
            })
            ->where('booking_type', 'test_drive')
            ->exists()
        ) {
            return response()->json(['success' => false, 'message' => 'You have already made a test drive booking.']);

            // dd($request->all());
        } else {

            // Create a new user details id if user details id does not exist in the user table
            if (auth()->user()->user_details_id == null) {
                $user_details = new User_Details();
                // $user_details->user_id = $user_id;
                $user_details->first_name = $request->input('first_name');
                $user_details->last_name = $request->input('last_name');
                $user_details->email = $request->input('email');
                $user_details->phone_number = $request->input('phone_number');
                $user_details->gender = $request->input('gender');
                $user_details->dob = $request->input('dob');
                //calculate age from dob
                $user_details->age = date_diff(date_create($request->input('dob')), date_create('today'))->y;
                $user_details->occupation = $request->input('occupation');
                $user_details->address = $request->input('address');
                $user_details->city = $request->input('city');
                $user_details->state = $request->input('state');
                $user_details->zip_code = $request->input('zip_code');
                $user_details->country = $request->input('country');

                // Save the user details
                $user_details->save();

                //save the user details id to the user table
                $user = User::find($user_id);
                $user->user_details_id = $user_details->id;
                $user->save();
            }

            // Create a new booking
            $booking = new Bookings();
            $booking->user_id = $user_id;
            $booking->vehicle_id = $id;
            $booking->booking_type = 'test_drive';
            $booking->booking_status = 'pending';
            $booking->booking_mode = 'online';
            $booking->booking_payment_status = 'paid';
            $booking->booking_amount = 0;
            //date
            // $booking->test_drive_date = $request->input('test_drive_date');

            // Save the reservation

            $booking->save();

            //get the vehicle name from vehicle details table
            $vehicle_name = Vehicle_Details::find($id);

            // Create a new notification
            $notification = new Notifications();
            $notification->booking_id = $booking->id;
            $notification->notification_type = 'test_drive';
            $notification->notification_status = 'unread';
            $notification->notification_message = 'New Test Drive Request from ' . auth()->user()->name . ' for ' . $vehicle_name->vehicle_model;

            // Save the notification
            $notification->save();

            //Nofication
            auth()->user()->notify(new BookingConfirmationNotification());

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Reservation successful']);
        }
    }


    // ----------------------AMIDN BOOKING--------------------------
    public function adminPurchaseBookingDetails()
    {
        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking tye purchase
        $user_booking_details1 = Bookings::where('booking_type', 'purchase')
            ->where('booking_status', 'pending')
            ->orWhere('booking_status', 'approved')
            // Eager load the vehicle details and user relationship
            ->with('vehicle_details', 'users')
            ->paginate(5);

        //get the notification with notification_type purchase and chnage the notification status to read
        $notification = Notifications::where('notification_type', 'purchase')
            ->where('notification_status', 'unread')
            ->get();

        // make the notification status to read after the user click on the notification
        foreach ($notification as $notification) {
            $notification->notification_status = 'read';
            $notification->save();
        }

        // dd($user_booking_details);

        return view('admin.booking.purchaseBooking', compact('user_booking_details1'));
    }

    public function adminTestdriveBookingDetails()
    {
        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking type testdrive
        $user_booking_details2 = Bookings::where('booking_type', 'test_drive')
            ->where('booking_status', 'pending')
            ->orWhere('booking_status', 'approved')
            // Eager load the vehicle details and user relationship
            ->with('vehicle_details', 'users')
            ->paginate(5);

        //get the notification with notification_type purchase and chnage the notification status to read
        $notification = Notifications::where('notification_type', 'test_drive')
            ->where('notification_status', 'unread')
            ->get();

        // make the notification status to read after the user click on the notification
        foreach ($notification as $notification) {
            $notification->notification_status = 'read';
            $notification->save();
        }

        // dd($user_booking_details);

        return view('admin.booking.testdriveBooking', compact('user_booking_details2'));
    }

    public function adminPastBookingDetails()
    {
        // Retrieve all booking details of the current user with the associated vehicle information of booking stsatus pending or approved of booking type testdrive
        $user_booking_details3 = Bookings::where('booking_status', 'rejected')
            ->orWhere('booking_status', 'completed')
            // Eager load the vehicle details and user relationship
            ->with('vehicle_details', 'users')
            ->paginate(5);

        // dd($user_booking_details);

        return view('admin.booking.pastBooking', compact('user_booking_details3'));
    }

    public function adminBookingRestore($id)
    {
        $booking = Bookings::find($id);
        $booking->booking_status = 'pending';
        $booking->save();

        return redirect()->back();
    }

    //Admin booking accept and reject
    public function adminBookingAccept($id)
    {
        //get the booking id using the id
        $booking = Bookings::find($id);

        //update the booking status to approved
        $booking->booking_status = 'approved';

        //save the booking status
        $booking->save();

        //redirect to the same page
        return redirect()->back();
    }

    //Admin booking accept and reject
    public function adminBookingReject($id)
    {
        //get the booking id using the id
        $booking = Bookings::find($id);

        //update the booking status to rejected
        $booking->booking_status = 'rejected';

        //save the booking status
        $booking->save();

        //redirect to the same page
        return redirect()->back();
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
