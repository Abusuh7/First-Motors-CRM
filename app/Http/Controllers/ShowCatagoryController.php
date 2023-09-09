<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;

class ShowCatagoryController extends Controller
{
    public function luxury()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only luxury category
         $data = Vehicle_Details::where('vehicle_type', 'luxury')->get();
         return view('shop.catagory.luxury', compact('data'));
    }

    public function sedan()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only sedan category
         $data = Vehicle_Details::where('vehicle_type', 'sedan')->get();
         return view('shop.catagory.sedan', compact('data'));
    }

    public function convertible()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only convertible category
         $data = Vehicle_Details::where('vehicle_type', 'convertible')->get();
         return view('shop.catagory.convertible', compact('data'));
    }

    public function jdm()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only jdm category
         $data = Vehicle_Details::where('vehicle_type', 'jdm')->get();
         return view('shop.catagory.jdm', compact('data'));
    }

    public function sports()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only sports category
         $data = Vehicle_Details::where('vehicle_type', 'sports')->get();
         return view('shop.catagory.sports', compact('data'));
    }

    public function hyper()
    {
        //get all the product data from the databas
        // $data = products::all();
        // return view('shop.catagory.luxury', compact('data'));

        //display only hyper category
         $data = Vehicle_Details::where('vehicle_type', 'hyper')->get();
         return view('shop.catagory.hyper', compact('data'));
    }
}




