<?php
use App\Http\Controllers\admin_content_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSignupController;
use App\Http\Controllers\admin_login_controller;
use App\Http\Controllers\UserSignupController;
use App\Http\Controllers\VendorSignupController;

//

use App\Http\Controllers\HomeController;
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


Route :: get('/adminsignup',[AdminSignupController::class,'index']);
Route :: post('/adminsignup',[AdminSignupController::class,'admin_data_store']);

Route :: get('/adminlogin',[admin_login_controller::class,'index']);
Route :: post('/adminlogin',[admin_login_controller::class,'admin_login']);


Route :: get('/logout', function(){
    if (session()->has('admin')) {
        session()->pull('admin');
        return redirect('adminlogin');
    }
    
});




Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin_dashboard', [admin_content_controller::class, 'index']);
    // Add other routes handled by admin_content_controller here...
    

    Route :: get('/add_catagory',[admin_content_controller::class,'view_catagory']);
    Route :: post('/add_catagory',[admin_content_controller::class,'add_catagory']);
    Route :: get('/delete_catagory/{id}',[admin_content_controller::class,'delete_catagory']);
    
    Route :: get('/add_apparel',[admin_content_controller::class,'view_apparel']);
    Route :: post('/add_apparel',[admin_content_controller::class,'add_apparel']);
    Route :: get('/delete_apparel/{apparel_id}',[admin_content_controller::class,'delete_apparel']);
    
    
    
    Route :: get('/view_product',[admin_content_controller::class,'view_product']);
    Route :: post('/add_product',[admin_content_controller::class,'add_product']);
    
    Route :: get('/show_products',[admin_content_controller::class,'show_products']);
    Route :: get('/delete_product/{product_id}',[admin_content_controller::class,'delete_product']);
    Route :: get('/edit_product/{product_id}',[admin_content_controller::class,'edit_product']);
    Route :: post('/update_product/{product_id}',[admin_content_controller::class,'update_product']);
    
    Route :: get('/show_vendors',[admin_content_controller::class,'show_vendors']);
    Route :: get('/delete_vendor/{id}',[admin_content_controller::class,'delete_vendor']);
    Route :: get('/approve_vendor/{id}',[admin_content_controller::class,'approve_vendor']);
    Route :: get('/final_vendors',[admin_content_controller::class,'final_vendors']);
    Route :: get('/delete_f_vendor/{id}',[admin_content_controller::class,'delete_f_vendor']);
    Route :: get('/a_v_show_products',[admin_content_controller::class,'admin_show_vendor_products']);
    Route :: get('/a_v_delete_product/{product_id}',[admin_content_controller::class,'v_delete_product']);
    Route :: get('/approve_product/{id}',[admin_content_controller::class,'approve_product']);
    
    
    Route :: get('/order',[admin_content_controller::class,'order']);
    Route :: get('/delete_orders/{product_id}',[admin_content_controller::class,'delete_orders']);
    Route :: get('/Customer',[admin_content_controller::class,'Customer']);
    Route :: get('/delete_Customer/{cus_id}',[admin_content_controller::class,'delete_Customer']);

});

//vendor admin common delete 
Route :: get('/delete_product/{product_id}',[admin_content_controller::class,'delete_product']);
Route :: get('/usersignup',[UserSignupController::class,'index']);
Route :: post('/usersignup',[UserSignupController::class,'user_data_store']);

Route :: get('/userlogin',[UserSignupController::class,'get_login']);
Route :: post('/userlogin',[UserSignupController::class,'user_login']);



//test auth user

Route::middleware(['user.auth'])->group(function () {

    
    Route :: get('/test1',[admin_content_controller::class,'view_test1']);
    route::post('/add_cart/{product_id}',[HomeController::class,'add_cart']);
    Route::get('/', [HomeController::class, 'index']);
    route::get('/show_cart',[HomeController::class,'show_cart']);
    route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
    route::get('/cash_order',[HomeController::class,'cash_order']);
    route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
    Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
    route::get('/show_order',[HomeController::class,'show_order']);
    route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
    route::get('/print_pdf/{id}',[HomeController::class,'print_pdf']);
    route::get('/profile',[HomeController::class,'profile']);
    route::get('/profile_edit/{id}',[HomeController::class,'profile_edit']);
    route::post('/profile_update/{id}',[HomeController::class,'profile_update']);
    
    });


Route :: get('/userlogout', function(){
    if (session()->has('user')) {
        session()->pull('user');
        return redirect('userlogin');
    }

});



route::get('/product_details/{product_id}',[HomeController::class,'product_details']);
route::get('/product_search',[HomeController::class,'product_search']);
route::get('/product_show',[HomeController::class,'product_show']);
Route::get('/guestuser', [HomeController::class, 'index2']);


Route :: get('/vendorsignup',[VendorSignupController::class,'index']);
Route :: post('/vendorsignup',[VendorSignupController::class,'vendor_data_store']);

Route :: get('/vendorlogin',[VendorSignupController::class,'get_login']);
Route :: post('/vendorlogin',[VendorSignupController::class,'vendor_login']);

Route::middleware(['vendor.auth'])->group(function () {

    Route :: get('/vendor_dashboard',[VendorSignupController::class,'vendor_dashboard']);

    Route :: view('welcome','welcome');
    Route :: get('/v_view_product',[admin_content_controller::class,'v_view_product']);
    Route :: post('/v_add_product',[admin_content_controller::class,'v_add_product']);
    Route :: get('/v_p_show_products',[admin_content_controller::class,'show_vendor_products']);
    Route :: get('/v_delete_product/{product_id}',[admin_content_controller::class,'v_delete_product']);
    Route :: get('/v_edit_product/{product_id}',[admin_content_controller::class,'v_edit_product']);
    Route :: post('/v_update_product/{product_id}',[admin_content_controller::class,'v_update_product']);

    Route :: get('/v_show_products',[admin_content_controller::class,'show_approved_vendor_products']);
    Route :: get('/v_orders',[admin_content_controller::class,'v_orders']);
    Route :: get('/delete_v_orders/{product_id}',[admin_content_controller::class,'delete_v_orders']);
    
    });

    Route :: get('/vendorlogout', function(){
        if (session()->has('vendor')) {
            session()->pull('vendor');
            return redirect('vendorlogin');
        }
    
    });

Route::post('/product/{product_id}/add_comment', [HomeController::class, 'add_comment']);

Route::post('/add_reply',[HomeController::class,'add_reply']);
