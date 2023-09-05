<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Vehicle_Details;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    public function view($id)
    {
        $viewproduct=Vehicle_Details::find($id);
        // return view('shop.productview', compact('viewproduct'));


        //check the product_category of the product with the above id
        //if the product_category is luxury, then display all the products with the same product_category
        //if the product_category is sedan, then display all the products with the same product_category
        //if the product_category is convertible, then display all the products with the same product_category
        //if the product_category is jdm, then display all the products with the same product_category
        //if the product_category is sports, then display all the products with the same product_category
        // $data = products::where('product_category', 'luxury')->get();
        // return view('shop.productview', compact('viewproduct'));

        if ($viewproduct->vehicle_type == "sedan")
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'sedan')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->vehicle_type == "luxury")
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'luxury')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->vehicle_type == "convertible")
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'convertible')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->vehicle_type == "jdm")
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'jdm')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->vehicle_type == "sports")
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'sports')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        else
        {
            $recommended = Vehicle_Details::where('vehicle_type', 'hyper')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }

    }
}
