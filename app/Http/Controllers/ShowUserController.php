<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShowUserController extends Controller
{
    public function show()
    {
        //get all data from database skiping the  row with id == 1
        $data = User::where('id', '!=', 1)->get();

        return view('admin.users', compact('data'));
    }

    //write a public function to add a new user and store in database
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            // 'role'=>'required',
            'password'=>'required',
        ]);

        // $user=new User([
        //     'name'=>$request->post('name'),
        //     'email'=>$request->post('email'),
        //     'role'=>$request->post('role'),
        //     'password'=>$request->post('password'),
        // ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();
        return redirect('/admin/users')->with('success', 'User has been added');
    }

    //write a function to delete a user from the database
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('success', 'User has been deleted');
    }

    //write a function to update a user from the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            // 'role'=>'required',
            'password'=>'required',
        ]);

        $user=User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        // $user->role=$request->get('role');
        $user->password=$request->get('password');
        $user->save();

        return redirect('/admin/users')->with('success', 'User has been updated');
    }

    //write a function to edit a user from the database
    public function edit($id)
    {
        $user=User::find($id);
        //get the password by removing the hash
        $user->password=Hash::make($user->password);
        return view('admin.editUser', compact('user'));
    }
}
