<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Apparel;
use App\Models\products;
use App\Models\UserSignup;
use App\Models\Order;
use App\Models\VendorSignup;
use App\Models\final_vendors;
use App\Models\Temp_product;

class admin_content_controller extends Controller
{

    public function index(){
        $order_data= Order::all();
        $product_data=products::all();
        $cus_data=UserSignup::all();
        $w_order= Order:: where('vendor_name', 'Wear wise')->get();       
         
        return view('adminpanel.admin_dashboard',compact('order_data', 'product_data', 'cus_data','w_order'));
            
        }

    

    public function view_catagory(){
        $data= Catagory::all();
        return view('adminpanel.add_catagory', compact('data'));
    }

    public function add_catagory(Request $request){
        $data= new Catagory;
        $data->catagory_name= $request['catagory_name'];
        $data-> save();

        return redirect()->back()->with('message','Catagory Added successfully');
    }

    public function delete_catagory($id){
        $data=Catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Catagory Deleted successfully');    
    }




    public function view_apparel(){

        $data= Apparel::all();
        return view('adminpanel.add_apparel',compact('data'));
    }

    public function add_apparel(Request $request){
        $data= new Apparel;
        $data->apparel_name= $request['apparel_name'];
        $data->save();
        
        return redirect()->back()->with('message','apparel Added successfully');
    }

    public function delete_apparel($apparel_id){

        $data=Apparel::where('apparel_id', $apparel_id);
        $data->delete();
        return redirect()->back()->with('message','Apparel Deleted successfully');    
    }


    public function view_product(){
        if (session()->has('admin')) {
          
        $cat= Catagory::all();
        $app= Apparel::all();

        return view('adminpanel.add_product',compact('cat'),compact('app'));
        } 
        else {
            return redirect('adminlogin')->with('message', 'Please login to access the admin panel features.');
    
        }
        
    }

    public function add_product(Request $request){
        $data= new products;
        $data->product_title= $request['product_title'];
        $data->product_description= $request['product_description'];
        $data->price =$request['product_price'];
        $data->days =$request['product_days'];
        $data->discounted_price= $request['product_discount_price'];
        $data->quantity= $request['product_quantity'];
        $data->catagory_id= $request['product_category'];
        $data->apparel_id= $request['product_apparel'];
        $data->vendor_name= "Wear Wise";

        $image=$request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('added_products',$imagename);
        $data->image=$imagename;

        $data-> save();

        return redirect()->back()->with('message','Product Added successfully');
    }


    public function show_products(){
        $product_data= products::all();
       

        return view('adminpanel.show_products',compact('product_data'));
    }

    public function delete_product($product_id){

        $data=products::where('product_id', $product_id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted successfully');    
    }

    public function edit_product($product_id){
        $data=products::where('product_id', $product_id)->get();
        $cata= Catagory::all();
        $appa= Apparel::all();
        return view('adminpanel.edit_products',compact('data', 'cata', 'appa'));
    }

    public function update_product(Request $request, $product_id){
        
        $data=products::find($product_id);
        $data->product_title= $request->product_title;
        $data->product_description= $request->product_description;
        $data->price =$request->product_price;
        $data->days =$request->product_days;
        $data->discounted_price= $request->product_discount_price;
        $data->quantity= $request->product_quantity;
        $data->catagory_id= $request->product_category;
        $data->apparel_id= $request->product_apparel;
        $data->vendor_name= "Wear Wise";

        
        $image=$request->image;
        if ($image){
            
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('added_products',$imagename);
        $data->image=$imagename;
            
        }
        

        $data->save();

        return redirect()->back()->with('message','Product Updated successfully'); 

        
    
        }


        
        public function order()
        {
            $product_data = Order::all();
        
            return view('adminpanel.order', compact('product_data'));
        }
        public function delete_orders($product_id){

            $data=Order::where('id', $product_id);
            $data->delete();
            return redirect()->back()->with('message','Order Deleted successfully');    
        }
        
        

        public function Customer()
        {
            $cus_data=UserSignup::all();
        
            return view('adminpanel.Customer',compact('cus_data'));
        }
        public function delete_Customer($cus_id){

            $data=UserSignup::where('id', $cus_id);
            $data->delete();
            return redirect()->back()->with('message','Customer Deleted successfully');    
            }

//test
        public function view_test1(){
            if (session()->has('user')) {
          
                return view('test1');
            } else {
                return redirect('userlogin')->with('message', 'Please login to access the admin dashboard.');
        
            }
        }

        

        public function show_vendors(){
            $vendor_data= VendorSignup::all();
    
            return view('adminpanel.show_vendors',compact('vendor_data'));
        }

        public function delete_vendor($vendor_id){

            $data=VendorSignup::where('id', $vendor_id);
            $data->delete();
            return redirect()->back()->with('message','vendor Deleted successfully');    
            }

            public function approve_vendor($vendor_id) {
                // Retrieve the data from the VendorSignup model
                $vendorData = VendorSignup::where('id', $vendor_id)->first();
            
                if ($vendorData) {
                    // Create a new instance of the FinalVendors model
                    $data = new final_vendors;
            
                    // Assign the properties from the $vendorData object
                    $data->name = $vendorData->name;
                    $data->phone = $vendorData->phone;
                    $data->username = $vendorData->username;
                    $data->email = $vendorData->email;
                    $data->password = $vendorData->password;
                    $data->buisness_name = $vendorData->buisness_name;
                    $data->address = $vendorData->address;
                    $data->buisness_lisence_no = $vendorData->buisness_lisence_no;
            
                    $data->save();
                    $vendorData->delete();
            
                    return redirect()->back()->with('message', 'Vendor Approved successfully');
                } else {
                    // Handle the case when the vendor data with the given ID is not found
                    return redirect()->back()->with('error', 'Vendor data not found');
                }
            }


            public function final_vendors(){
                $vendor_data= final_vendors::all();
        
                return view('adminpanel.final_vendors',compact('vendor_data'));
            }
            public function delete_f_vendor($vendor_id){

                $data=final_vendors ::where('id', $vendor_id);
                $data->delete();
                return redirect()->back()->with('message','vendor Deleted successfully');    
                }

                public function admin_show_vendor_products(){
                    $product_data= Temp_product::all();
            
                    return view('adminpanel.show_vendor_products',compact('product_data'));
                }



#approve prod
public function approve_product($product_id) {
    // Retrieve the data from the productSignup model
    $productData = Temp_product::where('id', $product_id)->first();

    if ($productData) {
        // Create a new instance of the Finalproducts model
        $data = new products;

        // Assign the properties from the $productData object
        $data->product_title = $productData->product_title;
        $data->product_description = $productData->product_description;
        $data->price = $productData->price;
        $data->days = $productData->days;
        $data->discounted_price = $productData->discounted_price;
        $data->quantity = $productData->quantity;
        $data->catagory_id = $productData->catagory_id;
        $data->apparel_id = $productData->apparel_id;
        $data->vendor_name = $productData->vendor_name;
        $data->image = $productData->image;

        $data->save();
        $productData->delete();

        return redirect()->back()->with('message', 'product Approved successfully');
    } else {
        // Handle the case when the product data with the given ID is not found
        return redirect()->back()->with('error', 'product data not found');
    }
}
#ffff




            


#VENDOR WORKS

public function v_view_product(){

      
    $cat= Catagory::all();
    $app= Apparel::all();

    return view('vendor.add_product',compact('cat'),compact('app'));
    

    
}

public function v_add_product(Request $request){
    $data= new Temp_product;
    $log = session('vendor');
    $row = final_vendors::where('username', $log)->first();

    if ($row) {
        $vendorName = $row->buisness_name;
    }

    $data->product_title= $request['product_title'];
    $data->product_description= $request['product_description'];
    $data->price =$request['product_price'];
    $data->days =$request['product_days'];
    $data->discounted_price= $request['product_discount_price'];
    $data->quantity= $request['product_quantity'];
    $data->catagory_id= $request['product_category'];
    $data->apparel_id= $request['product_apparel'];
    $data->vendor_name= $vendorName;

    $image=$request->image;
    $imagename= time().'.'.$image->getClientOriginalExtension();
    $request->image->move('added_products',$imagename);
    $data->image=$imagename;

    $data-> save();

    return redirect()->back()->with('message','Product Added successfully');
}


public function show_vendor_products(){
    $product_data= Temp_product::all();

    return view('vendor.show_vendor_products',compact('product_data'));
}


public function v_delete_product($product_id){

    $data=Temp_product::where('id', $product_id);
    $data->delete();
    return redirect()->back()->with('message','Product Deleted successfully');    
}

public function v_edit_product($product_id){
    $data=Temp_product::where('id', $product_id)->get();
    $cata= Catagory::all();
    $appa= Apparel::all();
    return view('vendor.v_edit_products',compact('data', 'cata', 'appa'));
}

public function v_update_product(Request $request, $product_id){
    
    $data=Temp_product::find($product_id);
    $data->product_title= $request->product_title;
    $data->product_description= $request->product_description;
    $data->price =$request->product_price;
    $data->days =$request->product_days;
    $data->discounted_price= $request->product_discount_price;
    $data->quantity= $request->product_quantity;
    $data->catagory_id= $request->product_category;
    $data->apparel_id= $request->product_apparel;

    
    $image=$request->image;
    if ($image){
        
    $imagename= time().'.'.$image->getClientOriginalExtension();
    $request->image->move('added_products',$imagename);
    $data->image=$imagename;
        
    }
    

    $data->save();
    

    return redirect()->back()->with('message','Product Updated successfully'); 

    

    }
   
    public function show_approved_vendor_products(){
        $log = session('vendor');
    $row = final_vendors::where('username', $log)->first();

    if ($row) {
        $vendorName = $row->buisness_name;
    }



    $product_data= products:: where('vendor_name', $vendorName)->get();
    //dd($product_data);
    //return view('vendor.test',compact('product_data'));
       return view('vendor.show_approved_vendor_products',compact('product_data'));
    }


    public function v_orders(){
        $log = session('vendor');
    $row = final_vendors::where('username', $log)->first();

    if ($row) {
        $vendorName = $row->buisness_name;
    }
    $product_data= Order:: where('vendor_name', $vendorName)->get();
    
        return view('vendor.v_orders',compact('product_data'));
    }

    public function delete_v_orders($product_id){

        $data=Order::where('id', $product_id);
        $data->delete();
        return redirect()->back()->with('message','Order Deleted successfully');    
    }
    
    }






