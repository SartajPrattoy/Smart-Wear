<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserSignup;
use App\Models\Catagory;
use App\Models\Order;
use Session;
use Stripe;
use PDF;
use App\Models\Comment;
use App\Models\Reply;
class HomeController extends Controller
{
    public function index()
    {   
        
        $product=products::paginate(2);
        return view('home.userpage',compact('product'));
    }

    public function index2()
    {   
        
        $product=products::paginate(3);
        return view('home.guestuser',compact('product'));
    }


    public function product_details($product_id)
    {
        $product=products::find($product_id);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();

        return view('home.product_details',compact('product','comment','reply'));
    }


    public function add_cart(Request $request,$product_id)
    { 
           
        $store = session('user'); // Assuming $store holds the username
        $user = UserSignup::where('username', $store)->first();
        $product = products::where('product_id', $product_id)->first();
        

            
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->username=$user->username;

            $cart->product_title=$product->product_title;
            $cart->vendor_name=$product->vendor_name;
            $cart->Product_id=$product->product_id;
            $cart->image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->day=$request->days;
            if($product->discounted_price!=null)
            {
                $cart->price=$product->discounted_price * $request->quantity * $request->days;
            }
            else
            {
                $cart->price=$product->price * $request->quantity * $request->days;
            }
            
            

            $cart->save();

        Alert::success('Product Added Successfully','We have added product to the cart');

            return redirect()->back();
            }

    public function show_cart()
    {
        $username = session('user');
        $cart=cart::where('username','=',$username)->get();
        return view('home.showcart',compact('cart'));

    }
        
    public function remove_cart($product_id)
    {
        $cart=cart::find($product_id);
        $cart->delete();
        return redirect()->back();
    }
    
    public function product_search(Request $request)
    {
    $search_text = $request->search;
    $product = products::where('product_title', 'LIKE', "%" . $search_text . "%")->paginate(2);


    $catagory = Catagory::where('catagory_name', 'LIKE', "%" . $search_text . "%")->paginate(2);
    return view('home.userpage', compact('product', 'catagory'));
    }

    public function product_show()
    {
       
        return view('home.product_show');
    }


    public function cash_order()
    {
        $store = session('user'); // Assuming $store holds the username
        $data = cart::where('username','=', $store)->get();
        

        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->username=$data->username;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->day=$data->day;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->vendor_name=$data->vendor_name;
            

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();

        }
        return redirect('/')->with('message','We have Received your Order. We will connect with you soon.....');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $store = session('user'); // Assuming $store holds the username
        $data = cart::where('username','=', $store)->get();

        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->username=$data->username;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->day=$data->day;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->vendor_name=$data->vendor_name;

            $order->payment_status='Paid';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        $username = session('user');
        $order = order::where('username','=', $username)->get();
        return view('home.order',compact('order'));
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='Your order have been canceled';
        $order->save();
        return redirect()->back();

    }

    public function print_pdf($id)
    {
        $order=order::find($id);
        $pdf=PDF::loadView('home.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function profile()
    {
        $username = session('user');
        $user = UserSignup::where('username', $username)->first();

        return view('home.profile',compact('user'));
    }

    public function profile_edit()
    {
        $username = session('user');
        $user = UserSignup::where('username', $username)->first();
        return view('home.profile_edit',compact('user'));
    }

    public function profile_update(Request $request,$id)
    {
        $username = session('user');
        $user = UserSignup::where('username', $username)->first();
        $user->username = $request->username;
        $user->name = $request->name;
        
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('profile');
    }
    public function add_comment(Request $request,$product_id)
    {
       $store =session('user');
    //    $product=products::where('id','=', $product_id)->get();
       

       if($store!=null)
       {
         $comment=new comment;
        //  $comment->product_id=$product;
         $comment->product_id = $product_id;
         $comment->name=$store;
         $comment->comment=$request->comment;
         $comment->save();
         return redirect()->back();


   
       }
       else
       {
        return redirect('userlogin');
       }
    }
    public function add_reply(Request $request)
    {
       $store =session('user');
       

       if($store!=null)
       {
         $reply=new reply;
         $reply->name=$store;
         $reply->comment_id=$request->commentId;
         $reply->reply=$request->reply;
         $reply->save();
         return redirect()->back();


   
       }
       else
       {
        return redirect('userlogin');
       }
    }

    



}

