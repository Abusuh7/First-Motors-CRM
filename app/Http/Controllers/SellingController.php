<?php

namespace App\Http\Controllers;

use App\Models\Sold_Vehicles;
use App\Models\Staff;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function adminSellVehicle()
    {
        $vehicles = Vehicle_Details::paginate(5);
        return view('admin.sell.sellVehicleDashboard', compact('vehicles'));
    }

    //Preview Vehicle Details
    public function sellingpreview($id)
    {
        $viewproduct = Vehicle_Details::find($id);
        //get all the staff with the user_id which is a foreign key
        $staffs = Staff::with('users')->get();



        return view('admin.sell.previewVehicle', compact('viewproduct', 'staffs'));
    }

    //Sell Vehicle
    public function sellvehicle(Request $request, $id)
    {
        // //get the vehicle details
        // $vehicle_details = Vehicle_Details::find($id);

        // //store the values from the form into the sold vehicles table
        // $sold_vehicle = new Sold_Vehicles();
        // $sold_vehicle->vehicle_id = $vehicle_details->id;
        // $sold_vehicle->buyer_fname = $request->input('buyer_fname');
        // $sold_vehicle->buyer_lname = $request->input('buyer_lname');
        // $sold_vehicle->buyer_email = $request->input('buyer_email');
        // $sold_vehicle->buyer_phone = $request->input('buyer_phone');
        // $sold_vehicle->buyer_gender = $request->input('buyer_gender');
        // $sold_vehicle->sold_date = $request->input('sold_date');
        // $sold_vehicle->sold_amount = $vehicle_details->vehicle_selling_price;
        // $sold_vehicle->sold_status = 'completed';
        // $sold_vehicle->delivery_date = $request->input('delivery_date');
        // $sold_vehicle->staff_id = $request->input('staff_id');
        // $sold_vehicle->staff_commission = $vehicle_details->vehicle_selling_price * 0.005;

        // $sold_vehicle->save();

        // //update the vehicle status to sold
        // $vehicle_details->vehicle_status = 'sold';
        // $vehicle_details->save();

        // //for the staff who sold the vehicle, update the staff commission
        // $staff = Staff::find($request->input('staff_id'));
        // $staff->staff_commission = $staff->staff_commission + $sold_vehicle->staff_commission;
        // $staff->save();

        // // Return a success response
        // return response()->json(['success' => true, 'message' => 'Purhcase Successful']);


        // try {
            // Your existing code here
            //get the vehicle details
            $vehicle_details = Vehicle_Details::find($id);

            //get the vehicle availability
            $vehicle_availability = $vehicle_details->availability;

            //check if the vehicle is available
            if ($vehicle_availability == 'sold') {
                return response()->json(['success' => false, 'message' => 'Vehicle is not available']);
            }

            //store the values from the form into the sold vehicles table
            $sold_vehicle = new Sold_Vehicles();
            $sold_vehicle->vehicle_id = $vehicle_details->id;
            $sold_vehicle->buyer_fname = $request->input('buyer_fname');
            $sold_vehicle->buyer_lname = $request->input('buyer_lname');
            $sold_vehicle->buyer_email = $request->input('buyer_email');
            $sold_vehicle->buyer_phone = $request->input('buyer_phone');
            $sold_vehicle->buyer_gender = $request->input('buyer_gender');
            $sold_vehicle->sold_date = $request->input('sold_date');
            $sold_vehicle->sold_amount = $vehicle_details->vehicle_selling_price;
            $sold_vehicle->sold_status = 'completed';
            $sold_vehicle->delivery_date = $request->input('delivery_date');
            $sold_vehicle->staff_id = $request->input('staff_id');
            $sold_vehicle->staff_commission = $vehicle_details->vehicle_selling_price * 0.005;

            $sold_vehicle->save();

            //update the vehicle status to sold
            $vehicle_details->availability = 'sold';
            $vehicle_details->save();

            //for the staff who sold the vehicle, update the staff commission
            $staff = Staff::find($request->input('staff_id'));
            $staff->commission = $staff->commission + $sold_vehicle->staff_commission;
            $staff->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Purchase Successful']);
            
        // } catch (\Exception $e) {
        //     // Return an error response
        //     return response()->json(['success' => false, 'message' => "Purchase Failed: {$e->getMessage()}"]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
