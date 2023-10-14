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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
      </div>
      <div class="container">
         <div class="heading_container heading_center">
            <h2>
               Our <span>products</span>
            </h2>
            <div>
               <form action="{{url('product_search')}}" method="GET">
                  @csrf
                  <input type="text" name="search" placeholder="Search for Something">
                  <input type="submit" value="search">
               </form>
            </div>
         </div>
         <div class="row">
        

            @foreach($product as $products)

            <div class="col-sm-8 col-md-6 col-lg-6">
               <div class="box">
                  <div class="option_container">
                     <div class="options">
                        <a href="{{url('product_details',$products->product_id)}}" class="option1">
                        Product Details
                        </a>
                        <a class="option2">
                           Smart Wear
                        {{-- {{$products->vendor_name}} --}}
                        </a>
                        <form action="{{url('add_cart',$products->product_id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                              <label for="quantity">Quantity:</label>
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                              </div>
                              <div class="col-md-4">
                              <label for="quantity">Days:</label>
                                 <input type="number" name="days" value="{{ $products->days }}" min="{{ $products->days }}" style="width: 100px">
                              </div>
                              <div class="col-md-4">
                                 <input type="submit" value="Add to Cart">
                              </div>
                           </div>
                        </form>
      <!-- why section -->
      
      <!-- end why section -->
      
      <!-- arrival section -->
      
      <!-- end arrival section -->
      
      <!-- product section -->
         
      <!-- end product section -->

      <!-- subscribe section -->
      
      <!-- end subscribe section -->
      <!-- client section -->
      
      <!-- end client section -->
      <!-- footer start -->
      
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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