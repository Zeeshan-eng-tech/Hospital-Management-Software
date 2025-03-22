<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    //order 
    public function new(){
        return view('admin.orders.new');
    }

    //completed orders
    public function completed(){
        return view('admin.orders.completed');
    }
    //processind orders
    public function processing(){
        return view('admin.orders.processing');
    }
//Cancele Orders
public function cancel(){
    return view('admin.orders.cancel');
}

}

