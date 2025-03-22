<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//         public function dashboard(){
//         return view('admin.dashboard');
//     }
//        ///products 
//         public function customers(){
//     return view('admin.customers');
//    }
//         ///Users
//         public function users(){
//     return view('admin.users');
//    }

//     ///Create User ...
//     public function create_user(Requrest $requrest){
//    $validated = $request->validate([
//        'name' => 'required',
//        'email' => 'required|unique:users',
//        'password' => 'required|confirmed|min:6',

//       ]);
//       return $request;
  

//     }


}
