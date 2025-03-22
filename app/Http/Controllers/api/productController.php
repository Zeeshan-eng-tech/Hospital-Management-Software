<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //Products Api Function
    public function products(){
        $products = product::all();
        return response()->json($products);
    }

    //Product for Testing Api
    // public function products(){
    //     return dd("test");
    // }
}
