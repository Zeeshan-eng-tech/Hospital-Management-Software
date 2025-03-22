<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use Illuminate\Support\Facades\Auth;


class pagesController extends Controller
{
    //
    public function dashboard(){
        $users = user::all();
        $products = product::all();
        $categories = category::all();
        return view('admin.dashboard',compact('users','products','categories'));
    }
    ///
    // public function product($id){
    //     return $id;
    // }
       ///products 
        public function customers(){
    return view('admin.customers');
   }
        ///Users
        public function users(){
            $users = User::all();
    return view('admin.users' ,compact('users'));
   }

    ///Create User ...
    public function create_user(Request $request){
        $validated = $request->validate([ 
       'name' => 'required',
       'email' => 'required|unique:users',
       'password' => 'required|confirmed|min:6',

      ]);
      $user = new User; 
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->is_admin = 1;
      $user->save();
      return redirect()->back()->with('message','User Created Successfully');
    //   return $request;
   }

}