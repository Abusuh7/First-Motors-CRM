<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{

    public function show()
    {
        //get all the product data from the databas
        $data = products::all();
        return view('admin.products', compact('data'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'product_name'=>'required',
            'product_price'=>'required',
            'product_description'=>'required',
            'product_image'=>'required',
            // 'product_more_image'=>'required',
            'product_category'=>'required',
            'product_stock'=>'required',
            'product_status'=>'required',
        ]);

        $products = new products();

        // $products->product_name = $request->input('product_name');
        // $products->product_price = $request->input('product_price');
        // $products->product_description = $request->input('product_description');
        // $products->product_image = $request->input('product_image');


        $image_path = $request->file('product_image')->store('product_image', 'public');
        $products->product_image = $image_path;

        $data = products::create([
            "product_name" => $request->input('product_name'),
            "product_price" => $request->input('product_price'),
            "product_description" => $request->input('product_description'),
            "product_image" => $image_path,
            // "product_more_image" => $request->input('product_more_image'),
            "product_category" => $request->input('product_category'),
            "product_stock" => $request->input('product_stock'),
            "product_status" => $request->input('product_status'),
        ]);
        return redirect()->route('addproduct');


        // $products->save();
        // return redirect('admin.products')->with('message','Product Image Upload Successfully');

    }



    public function destroy($id)
    {
        $product=products::find($id);
        $product->delete();
        return redirect('/admin/products')->with('success', 'Product has been deleted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_category' => 'required',
            'product_stock' => 'required',
            'product_status' => 'required',
        ]);

        $product = products::find($id);

        if (!$product) {
            return redirect('/admin/products')->with('error', 'Product not found');
        }

        if ($request->hasFile('product_image')) {
            $image_path = $request->file('product_image')->store('product_image', 'public');
            $product->product_image = $image_path;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->product_category = $request->input('product_category');
        $product->product_stock = $request->input('product_stock');
        $product->product_status = $request->input('product_status');
        $product->save();

        return redirect('/admin/products')->with('success', 'Product updated successfully');
    }

    public function edit($id)
    {
        $product=products::find($id);
        return view('admin.editProduct', compact('product'));
    }


    //search for a particular product using the search
    // public function search(Request $request)
    // {
    //     $search = $request->get('search');
    //     $products = products::where('product_name', 'like', '%' . $search . '%')->paginate(5);
    //     return view('admin.products', compact('products'));
    // }
}
