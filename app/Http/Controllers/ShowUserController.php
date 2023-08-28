<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShowUserController extends Controller
{
    public function show()
    {
        //get all the data of users with role admin avoiding the first user
        $admin = User::where('role', 'admin')->where('id', '!=', 1)->get();

        //get all the data of users with role staff
        $staff = User::where('role', 'staff')->get();

        //get all the data of users with role user
        $user = User::where('role', 'user')->get();

        return view('admin.users', compact('admin', 'staff', 'user'));
    }

    //write a public function to add a new user and store in database
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'role' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',

        ]);

        //create a new user by first saving the user details in the database
        $user_details = User_Details::create([
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "phone_number" => $request->input('phone_number'),
            "email" => $request->input('email'),
            "gender" => $request->input('gender'),
            "dob" => $request->input('dob'),
            "age" => $request->input('age'),
            "occupation" => $request->input('occupation'),
            "address" => $request->input('address'),
            "city" => $request->input('city'),
            "state" => $request->input('state'),
            "zip_code" => $request->input('zip_code'),
            "country" => $request->input('country'),
        ]);

        //then save the user details in the user table
        $user = User::create([
            //name should be the first name and last name
            "name" => $request->input('first_name') . " " . $request->input('last_name'),
            //if if the role is admin then the email should be admin+number@firstmotors.lk else if role is staff should be firstname@staffs.firstmotors.lk else if role is user them email should be user details email
            "email" => $request->input('role') == "admin" ? "admin" . rand(1, 100) . "@firstmotors.lk" : ($request->input('role') == "staff" ? $request->input('first_name') . "@staffs.firstmotors.lk" : $request->input('email')),
            //have a default password for all users as 1234qwer
            "password" => Hash::make("1234qwer"),
            // "password" => Hash::make($request->input('password')),
            "role" => $request->input('role'),
            "user_details_id" => $user_details->id,
        ]);

        return redirect()->back()->with('success', 'User has been added');
    }

    //write a function to delete a user from the database
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('success', 'User has been deleted');
    }

    //write a function to update a user from the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'role'=>'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        // $user->role=$request->get('role');
        $user->password = $request->get('password');
        $user->save();

        return redirect('/admin/users')->with('success', 'User has been updated');
    }

    //write a function to edit a user from the database
    public function edit($id)
    {
        $user = User::find($id);
        //get the password by removing the hash
        $user->password = Hash::make($user->password);
        return view('admin.editUser', compact('user'));
    }
}
