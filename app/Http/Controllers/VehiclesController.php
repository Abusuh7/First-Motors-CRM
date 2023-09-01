<?php

namespace App\Http\Controllers;

use App\Models\Previous_Owner_Details;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminVehicles()
    {
        $vehicles = Vehicle_Details::all(); // Retrieve all vehicles from the database
        return view('admin.vehicle.vehicles', compact('vehicles'));
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
        // Validate the request data
        $request->validate([
            'vehicle_type' => 'required',
            'vehicle_make' => 'required',
            'vehicle_model' => 'required',
            'vehicle_year_manufactured' => 'required|integer',
            'vehicle_year_registered' => 'required|integer',
            'vehicle_ownership' => 'required',
            'vehicle_color' => 'required',
            'vehicle_mileage' => 'required|integer',
            'vehicle_transmission' => 'required',
            'vehicle_fuel_type' => 'required',
            'vehicle_condition' => 'required',
            'vehicle_license_plate' => 'required',
            'vehicle_description' => 'nullable',
            'vehicle_cost_price' => 'required|numeric',
            'vehicle_selling_price' => 'required|numeric',
            'vehicle_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
            //vehicle images is an array of images
            'vehicle_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
        ]);

        // Create a new VehicleDetail instance
        $vehicleDetail = new Vehicle_Details([
            'vehicle_type' => $request->input('vehicle_type'),
            'vehicle_make' => $request->input('vehicle_make'),
            'vehicle_model' => $request->input('vehicle_model'),
            'vehicle_year_manufactured' => $request->input('vehicle_year_manufactured'),
            'vehicle_year_registered' => $request->input('vehicle_year_registered'),
            'vehicle_ownership' => $request->input('vehicle_ownership'),
            'vehicle_color' => $request->input('vehicle_color'),
            'vehicle_mileage' => $request->input('vehicle_mileage'),
            'vehicle_transmission' => $request->input('vehicle_transmission'),
            'vehicle_fuel_type' => $request->input('vehicle_fuel_type'),
            'vehicle_condition' => $request->input('vehicle_condition'),
            'vehicle_license_plate' => $request->input('vehicle_license_plate'),
            'vehicle_description' => $request->input('vehicle_description'),
            'vehicle_cost_price' => $request->input('vehicle_cost_price'),
            'vehicle_selling_price' => $request->input('vehicle_selling_price'),
            'profit' => 0.00, // You can calculate profit as needed
            'availability' => 'available', // Adjust as needed
        ]);

        // Save the vehicle details
        $vehicleDetail->save();

        // Check if ownership is not "new" (i.e., there is a previous owner)
        if ($request->input('vehicle_ownership') !== 'new') {
            // Validate previous owner details
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email',
                'gender' => 'required',
                'dob' => 'required|date',
                'age' => 'required|integer',
                'occupation' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required|integer',
                'country' => 'required',
            ]);

            // Create a new PreviousOwnerDetail instance
            $previousOwnerDetail = new Previous_Owner_Details([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'age' => $request->input('age'),
                'occupation' => $request->input('occupation'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zip_code' => $request->input('zip_code'),
                'country' => $request->input('country'),
            ]);

            // Save the previous owner details
            $previousOwnerDetail->save();

            // Update the vehicle detail with the previous owner ID
            $vehicleDetail->previous_owner_id = $previousOwnerDetail->id;
            $vehicleDetail->save();
        }

        // Handle vehicle thumbnail upload
        if ($request->hasFile('vehicle_thumbnail')) {
            $thumbnailPath = $request->file('vehicle_thumbnail')->store('thumbnails', 'public');
            $vehicleDetail->vehicle_thumbnail = $thumbnailPath;
            $vehicleDetail->save();
        }

        // Handle vehicle images upload
        if ($request->hasFile('vehicle_images')) {
            $imagePaths = [];

            foreach ($request->file('vehicle_images') as $image) {
                dd($image);
                $imagePath = $image->store('more_images', 'public');
                $imagePaths[] = $imagePath;
            }

            $vehicleDetail->vehicle_images = json_encode($imagePaths);
            $vehicleDetail->save();
        }
        // dd($vehicleDetail);
        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Vehicle added successfully');
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
