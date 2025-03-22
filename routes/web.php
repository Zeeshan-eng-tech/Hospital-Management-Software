<?php

use App\Http\Controllers\admin\ordersController;
use App\Http\Controllers\admin\pagesController as AdminPagesController;
use App\Http\Controllers\admin\productsController;
use App\Http\Controllers\pagesController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/Zeeshan', [pagesController::class, 'home']);


Route::get('/',[PagesController::class, 'home'])->name('home');

//Route::get('/Zeeshan',[PagesController::class, 'Zeeshan'])->name('Zeeshan');

Route::get('/products',[PagesController::class, 'products'])->name('products');
Route::get('/product/{id}',[PagesController::class, 'product'])->name('single.product');
Route::get('/category/{id}',[PagesController::class, 'catproduct'])->name('category.product');

Route::get('/cart',[PagesController::class, 'cart'])->name('cart');

Route::get('/checkout',[PagesController::class, 'checkout'])->name('checkout');

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/contact',[PagesController::class, 'contact'])->name('contact');

Route::get('login',[pagesController::class, 'login'])->name('login');
Route::get('register',[pagesController::class, 'register'])->name('register');
Route::post('/login/proccess',[pagesController::class, 'loginproccess'])->name('login.proccess');
Route::post('register/proccess',[pagesController::class, 'registerproccess'])->name('register.proccess');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/cart/{id}',[PagesController::class, 'addtocart'])->name('add.cart');


});

//Route admin panel

Route::prefix('admin')->namespace('admin')->group(function(){ 
    Route::middleware('admin')->group(function(){     
    Route::get('/dashboard',[AdminPagesController::class, 'dashboard'])->name('admin.dashboard');
    Route::prefix('products')->group(function() {
        Route::get('/create',[productsController::class, 'create'])->name('create.products');
        Route::get('/delete/{id}',[productsController::class, 'delete'])->name('delete.product');
        Route::post('/save',[productsController::class, 'save_product'])->name('save.product');
        Route::get('/all',[productsController::class, 'all'])->name('all.products');
    Route::prefix('categories')->group(function(){
        Route::get('/',[productsController::class, 'categories'])->name('admin.categories');
        Route::get('/{id}',[productsController::class, 'delete_category'])->name('delete.category');
        Route::post('/save',[productsController::class, 'create_category'])->name('save.category');    
        });
        
    });
    Route::prefix('orders')->group(function(){
        Route::get('/new',[ordersController::class, 'new'])->name('new.orders');
        Route::get('/completed',[ordersController::class, 'completed'])->name('completed.orders');
        Route::get('/processing',[ordersController::class, 'processing'])->name('processing.orders');
        Route::get('/cancel',[ordersController::class, 'cancel'])->name('cancel.orders');
    
    });
        Route::get('/customers',[AdminPagesController::class, 'customers'])->name('all.customers');
        Route::get('/users-management',[AdminPagesController::class, 'users'])->name('admin.users');
        Route::post('/user-management/create',[AdminPagesController::class, 'create_user'])->name('create.user');
    
    });
});
Route::get('/logout',function(){
    Auth::logout();  // session destroy ... unset ..
    return redirect(route('login'));
})->name('logout');

//Route::get('/admin/dashboard','admin/pagesController@dashboard')->name('admin.dashboard');


//Route::get('/admin/dashboard',[PagesController::class, 'dashboard'])->name('admin.dashboard');

//Route::get('/admin/products',[PagesController::class, 'products'])->name('admin.products');

//Route::get('/admin/dashboard', '\admin/dashboard/pagesController@dashboard');

//Route::get('/admin/dashboard', 'App\Http\Controllers\admin@dashboard');

//Route::get('/admin/dashboard',[PagesController::class, 'admin.dashboard'])->name('admin.dashboard');

//
//public function dashboard(){
 //   return view ('dashboard');
//}
//Route::get('/admin/dashboard', [pagesController::class, 'dashboard']);


//Route::get('/admin/dashboard', 'admin/pagesController@dashboard')->name('admin.dashboard');

//Route::get('/admin/dashboard','admin\pagesController@dashboard')->name('admin.dashboard');

///Route::get('/admin/dashboard', funtion (){
   // return view "Hello Admin";
///})->name('admin.dashboard');


//Route::get('/admin/dashboard',[pagesController::class, 'dashboard'])->name('admin.dashboard');
