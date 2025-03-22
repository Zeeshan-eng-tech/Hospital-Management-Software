<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class pagesController extends Controller
{
    //home 
    public function home(){
        return view('welcome');
    } 
    ///Dashboard 
    public function dashboard(){
        return view('dashboard');
    }
    ///Add To  Cart
    public function addtocart($id){
        $cart = new cart;
        $cart->product_id = $id;
        $cart->user_id = Auth::id();
        $cart->save();
        return redirect()->back()->with('message','Product Added Into Cart Successfully');
        // return $id;

    }
    //about
    public function about(){
        return view('about');
    }
     ///contact 
     public function contact(){
        return view('contact');
     }
     
     public function product($id){
        $product = product::find($id);
        return view('product');
    // return $product;

    }
    ///view products
    //  public function products(){
    //     $products = product::all();
    //     return view('products',compact('products'));
    //  }

    ///catproducts
     public function catproduct($id){
        // return $id;
        $products = product::find('category_id',$id)->get();
        return view('products',compact('products'));
        
     }

     ///cart
     public function products(){
        $products = product::all();
        return view('products',compact('products'));
     }
     ///checkout
     public function checkout(){
        return view('checkout');
    }
    //Admin Zeeshan
    //public function Zeeshan(){
      //  return view('welcome');
    //}
    //shop cart
    public function cart(){
        return view('cart');

    }

    //login systm
    public function login(){
        return view('admin.login');
 }
  ///loginproccess

  public function loginproccess(Request $request){
    $validated = $request->validate([ 
        'email' => 'required',
        'password' => 'required',
    ]); 
    //Auth Attempt ...
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        if (Auth::user()->is_admin == 1){
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('dashboard'));
        }
    } else {
        return redirect()->back()->with('message','email or password not match');

    //    return redirect()->back()->with('message','email or password not match');
    }

}    
///Register 
       public function register(){
    return view('admin.register');
    
    }
    public function registerproccess(Request $request){
        $validated = $request->validate([ 
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
     
           ]);
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();
    // $user->posts()->save($user);

        return redirect( route ('login'));
        //    return $request;
    }

    // $user = new user;

    // $user->insert([
    //     'name' => $request['name'],
    //     'email' => $request['email'],
    //     'password' => Hash::make[$request->password],
    //     // 'author' => 1,
    //     // "created_at"=> now(),
    //     // "updated_at"=> now(),
    // ]);

    // $user->save();


}

