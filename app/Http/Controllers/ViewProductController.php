<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    public function view($id)
    {
        $viewproduct=products::find($id);
        // return view('shop.productview', compact('viewproduct'));


        //check the product_category of the product with the above id
        //if the product_category is luxury, then display all the products with the same product_category
        //if the product_category is sedan, then display all the products with the same product_category
        //if the product_category is convertible, then display all the products with the same product_category
        //if the product_category is jdm, then display all the products with the same product_category
        //if the product_category is sports, then display all the products with the same product_category
        // $data = products::where('product_category', 'luxury')->get();
        // return view('shop.productview', compact('viewproduct'));

        if ($viewproduct->product_category == "sedan")
        {
            $recommended = products::where('product_category', 'sedan')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->product_category == "luxury")
        {
            $recommended = products::where('product_category', 'luxury')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->product_category == "convertible")
        {
            $recommended = products::where('product_category', 'convertible')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->product_category == "jdm")
        {
            $recommended = products::where('product_category', 'jdm')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        elseif ($viewproduct->product_category == "sports")
        {
            $recommended = products::where('product_category', 'sports')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }
        else
        {
            $recommended = products::where('product_category', 'hyper')->get();
            return view('shop.productview', compact('viewproduct', 'recommended'));
        }

    }
}
