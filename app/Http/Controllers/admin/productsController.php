<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\category;
use App\Models\product;

class productsController extends Controller
{
    //
    public function create(){
        $categories = category::all();
        return view('admin.products.create',compact('categories'));
    }
    //Save Products
    public function save_product(Request $request){
        //   $validated = $request->validate([
        //       'thumbnail' => 'required',
        //       'title' => 'required',
        //       'discruption' => 'required',
        //       'quantity' => 'required',
        //       'category' => 'required',
        //       'price' => 'required'
        //      ]);
        //return $request;

              $imgname = time().'.'.$request->file('thumbnail')->extension();
              $request->file('thumbnail')->storeAs('products',$imgname,'public');
              $product = new product;
              $product->title = $request->title;
              $product->price = $request->price;
              $product->discription = $request->discription;
              $product->quantity = $request->quantity;
              $product->category_id = $request->category;
              $product->picture = $imgname;
              $product->save();
             return redirect()->back()->with('message','Product created successfully');
         }
    //ALL products 
    public function all(){
        $products = product::orderby('id','desc')->get();
        $total = product::sum('price');
        return view('admin.products.all',compact('products','total'));
    }
    //Delete Products
    public function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }
    //categories
    public function categories(){
        $categories = category::orderby('id','desc')->get();
        //return $categories->count();
      return view('admin.products.categories', compact('categories'));
    }
    ///save categories
    public function create_category(Request $request){
       $validated = $request->validate([
        'name' => 'required | min:6 | unique:categories'
       ]);
        $category = new category;
        $category-> name = $request->name;
        $category->save();
       return redirect()->back()->with('message','Product created successfully');
    }
    //delete category
    public function delete_category($id){
        $category = category::find($id);
        $category->delete();
        return redirect()->back()->with('delete','Category Deleted Successfully');
    }
  
}
