<?php

namespace App\Http\Controllers;

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
        return view('admin.sell.previewVehicle', compact('viewproduct'));
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
