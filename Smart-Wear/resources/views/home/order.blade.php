<!DOCTYPE html>
<html>
   <head>
     
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        table,th,td
        {
            border: 1px solid black;
        }

        .th_deg
        {
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;

        }
      </style>
   </head>
   <body>
      @include('sweetalert::alert')
      
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
        <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Vendor Name</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Day</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Date of order</th>
                <th class="th_deg">Return Date</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
                <th class="th_deg">Print</th>


            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->vendor_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->day}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>{{$order->created_at->format('Y-m-d') }}</td>
@php
    $daysToAdd = $order->day; // Change this to the number of days you want to add
    $newDate = $order->created_at->addDays($daysToAdd);
@endphp

<td>{{ $newDate->format('Y-m-d') }}</td>
                <td>
                <img height="100" width="120" src="{{ asset('added_products/' . $order->image) }}" alt="Product Image">

                </td>
                <td>
                    @if($order->delivery_status=='processing')
                    <a onclick="return confirm('Are you sure to cancel this order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel</a>
                    @else
                    <p style="color: blue;"> Not Allowed</p>
                    @endif
                </td>
                <td>
                    <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                </td>
            </tr>
            @endforeach
            
         </table>

        </div><!-- slider section -->
         
      <!-- footer end -->
      

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>