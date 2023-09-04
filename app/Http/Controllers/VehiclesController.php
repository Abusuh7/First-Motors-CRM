<?php

namespace App\Http\Controllers;

use App\Models\Previous_Owner_Details;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminVehicles()
    {
        // $vehicles = Vehicle_Details::all()->paginate(5); // Retrieve all vehicles from the database
        // retrive all the vehicle data and paginate it
        $vehicles = Vehicle_Details::paginate(5);
        return view('admin.vehicle.vehicles', compact('vehicles'));
    }

    //displaying the vehicle details
    public function showVehicle($id)
    {
        //get all the vehicle details from the database and if it has a previous owner id get the previous owner details
        $vehicles = Vehicle_Details::find($id);
        $previousOwners = Previous_Owner_Details::find($vehicles->previous_owner_id);
        return view('admin.vehicle.viewVehicle', compact('vehicles', 'previousOwners'));
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
            'vehicle_cost_price' => 'required|numeric|min:0|max:100000000',
            'vehicle_selling_price' => 'required|numeric|min:0|max:100000000',
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
                // dd($image);
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

    //Search for a vehicle
    public function search(Request $request)
    {
        // dd($request->all());
        $search = $request->input('search');
        $filter = $request->input('searchBy');
        // $vehicles = Vehicle_Details::where('vehicle_make', 'like', '%' . $search . '%')->paginate(5);
        // if the filter is make then search by make else if the filter is model then search by model else if the filter is year then search by year else if the filter is color then search by color else if the filter is license plate then search by license plate else if the filter is availability then search by availability else if the filter is ownership then search by ownership else if the filter is transmission then search by transmission else if the filter is fuel type then search by fuel type else if the filter is condition then search by condition else if the filter is all then search by all
        if ($filter == "make") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_make', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "model") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_model', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "year") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_year_manufactured', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "color") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_color', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "license_plate") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_license_plate', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "availability") {
            $vehiclesSearch = Vehicle_Details::where('availability', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "ownership") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_ownership', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "transmission") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_transmission', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "fuel_type") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_fuel_type', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "condition") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_condition', 'like', '%' . $search . '%')->paginate(5);
        } else if ($filter == "all") {
            $vehiclesSearch = Vehicle_Details::where('vehicle_make', 'like', '%' . $search . '%')
                ->orWhere('vehicle_model', 'like', '%' . $search . '%')
                ->orWhere('vehicle_year_manufactured', 'like', '%' . $search . '%')
                ->orWhere('vehicle_color', 'like', '%' . $search . '%')
                ->orWhere('vehicle_license_plate', 'like', '%' . $search . '%')
                ->orWhere('availability', 'like', '%' . $search . '%')

                ->orWhere('vehicle_transmission', 'like', '%' . $search . '%')
                ->orWhere('vehicle_fuel_type', 'like', '%' . $search . '%')
                ->orWhere('vehicle_condition', 'like', '%' . $search . '%')
                ->paginate(5);
        }


        return view('admin.vehicle.vehicles', compact('vehiclesSearch'));
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
        //get the vehicle details and the previous owner details if any and the images from the data base and the storage
        $vehicle = Vehicle_Details::find($id);
        // dd($vehicle);
        //get the previous owner details if any
        if ($vehicle->previous_owner_id) {
            $previousOwner = Previous_Owner_Details::find($vehicle->previous_owner_id);
        } else {
            $previousOwner = null;
        }
        // dd($previousOwner);
        return view('admin.vehicle.editVehicle', compact('vehicle', 'previousOwner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            'vehicle_cost_price' => 'required|numeric|min:0|max:100000000',
            'vehicle_selling_price' => 'required|numeric|min:0|max:100000000',
            'vehicle_availability' => 'required',
            'vehicle_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vehicle_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Retrieve the existing vehicle and previous owner details
        $vehicleDetail = Vehicle_Details::find($id);

        if (!$vehicleDetail) {
            return redirect()->back()->with('error', 'Vehicle not found');
        }

        // Update vehicle details
        $vehicleDetail->vehicle_type = $request->input('vehicle_type');
        $vehicleDetail->vehicle_make = $request->input('vehicle_make');
        $vehicleDetail->vehicle_model = $request->input('vehicle_model');
        $vehicleDetail->vehicle_year_manufactured = $request->input('vehicle_year_manufactured');
        $vehicleDetail->vehicle_year_registered = $request->input('vehicle_year_registered');
        $vehicleDetail->vehicle_ownership = $request->input('vehicle_ownership');
        $vehicleDetail->vehicle_color = $request->input('vehicle_color');
        $vehicleDetail->vehicle_mileage = $request->input('vehicle_mileage');
        $vehicleDetail->vehicle_transmission = $request->input('vehicle_transmission');
        $vehicleDetail->vehicle_fuel_type = $request->input('vehicle_fuel_type');
        $vehicleDetail->vehicle_condition = $request->input('vehicle_condition');
        $vehicleDetail->vehicle_license_plate = $request->input('vehicle_license_plate');
        $vehicleDetail->vehicle_description = $request->input('vehicle_description');
        $vehicleDetail->vehicle_cost_price = $request->input('vehicle_cost_price');
        $vehicleDetail->vehicle_selling_price = $request->input('vehicle_selling_price');
        $vehicleDetail->profit = $request->input('vehicle_selling_price') - $request->input('vehicle_cost_price');
        $vehicleDetail->availability = $request->input('vehicle_availability');

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

            // Update or create previous owner details
            $previousOwnerDetail = $vehicleDetail->previousOwnerDetail ?: new Previous_Owner_Details();
            $previousOwnerDetail->first_name = $request->input('first_name');
            $previousOwnerDetail->last_name = $request->input('last_name');
            $previousOwnerDetail->phone_number = $request->input('phone_number');
            $previousOwnerDetail->email = $request->input('email');
            $previousOwnerDetail->gender = $request->input('gender');
            $previousOwnerDetail->dob = $request->input('dob');
            $previousOwnerDetail->age = $request->input('age');
            $previousOwnerDetail->occupation = $request->input('occupation');
            $previousOwnerDetail->address = $request->input('address');
            $previousOwnerDetail->city = $request->input('city');
            $previousOwnerDetail->state = $request->input('state');
            $previousOwnerDetail->zip_code = $request->input('zip_code');
            $previousOwnerDetail->country = $request->input('country');

            // Save the previous owner details
            $previousOwnerDetail->save();

            // Update the relationship between vehicle and previous owner
            $vehicleDetail->previousOwnerDetail()->associate($previousOwnerDetail);
            $vehicleDetail->save();
        } else {
            // If ownership is "new," you may want to clear previous owner details
            $vehicleDetail->previous_owner_id = null;
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
                $imagePath = $image->store('more_images', 'public');
                $imagePaths[] = $imagePath;
            }

            $vehicleDetail->vehicle_images = json_encode($imagePaths);
            $vehicleDetail->save();
        }

        // Redirect to the vehicle dashboard with a success message
        return redirect()->back()->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete the vehicle details and the previous owner details if any and the images from the data base and the storage
        $vehicle = Vehicle_Details::find($id);
        // dd($vehicle);
        //delete the vehicle images from the storage
        if ($vehicle->vehicle_images) {
            $vehicleImages = json_decode($vehicle->vehicle_images);
            foreach ($vehicleImages as $image) {
                // dd($image);
                Storage::delete('public/' . $image);
            }
        }
        //delete the vehicle thumbnail from the storage
        if ($vehicle->vehicle_thumbnail) {
            Storage::delete('public/' . $vehicle->vehicle_thumbnail);
        }
        //delete the vehicle details from the database
        $vehicle->delete();
        //delete the previous owner details from the database
        if ($vehicle->previous_owner_id) {
            $previousOwner = Previous_Owner_Details::find($vehicle->previous_owner_id);
            $previousOwner->delete();
        }
        //redirect to the admin vehicles page
        return redirect()->back()->with('success', 'Vehicle deleted successfully');
    }
}
