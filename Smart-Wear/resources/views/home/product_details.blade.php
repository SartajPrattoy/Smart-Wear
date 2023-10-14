<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

    
      <div class="col-sm-8 col-md-6 col-lg-6" style="margin: auto; width: 50%; padding: 30px">
                  
                     <div class="img-box" style="padding: 20px">
                     <img src="{{ asset('added_products/' . $product->image) }}" alt="">

                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->product_title}}
                        </h5>

                        @if($product->discounted_price!=null)


                        <h6 style="color: red">
                        Discount price
                        <br>
                           {{$product->discounted_price}} -/BDT
                        </h6>

                        <h6 style="text-decoration: line-through; color: blue">
                           Per day Rent
                           <br>
                           {{$product->price}} -/BDT
                        </h6>

                        @else

                        <h6 style="color: blue">
                           Per Day Rent
                           <br>
                           {{$products->price}} -/BDT
                        </h6>

                        @endif

                        <h6>Product Details : {{$product->product_description}}</h6>
                        <h6>Available Quantity : {{$product->quantity}}</h6>
                        {{-- <h6>Vendor : {{$product->vendor_name}}</h6> --}}


                        

                        <form action="{{url('add_cart',$product->product_id )}}" method="Post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                 </div>
                                 <div class="col-md-4">
                                 <label for="quantity">Days:</label>
                                    <input type="number" name="quantity" value="5" min="5" style="width: 100px">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add to Cart">
                                 </div>
                              </div>
                           </form>

   




                        
                     </div>
                  </div>
               </div>
               <div style="text-align: center; padding-bottom: 30px;">
                  <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>
                  <form action="{{ url('/product/' . $product->product_id  . '/add_comment') }}" method="POST">

         
                     @csrf
                     <textarea style="height: 150px; width: 600px;" placeholder="Comment something here" name="comment"></textarea>
                     <br>
                     <input type="submit" class="btn btn-primary" value=" Comment">
                      
                  </form>
         
         
               </div>
               <div style="padding-left: 20%;">
                  <h1 style="font-size: 20px; padding-bottom: 20px;">All Users Comments</h1>
                  @foreach($comment as $comment)
                      @if ($comment->product_id == $product->product_id )

                  <div>
                  
                  
                  <b>{{$comment->name}}</b>
                  <p>{{$comment->comment}}</p>
                  <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                  @foreach($reply as $rep)
                  @if($rep->comment_id==$comment->id)
                  <div style="padding-left: 3%; padding-bottom: 10px; padding-bottom: 10px;">
                     <b>{{$rep->name}}</b>
                     <p>{{$rep->reply}}</p>
                     <a style="color: red"  href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
         
                  </div>
                  @endif
                  @endforeach
         
                  </div>
                  @endif
         
                  @endforeach
         
                  <!-- reply text -->
                  <div style="display: none;" class="replyDiv">
                     <form action="{{url('add_reply')}}" method="POST">
                        @csrf
                     <input type="text" id="commentId"  name="commentId" hidden="">
                     <textarea style="height: 100px; width: 500px;" name="reply" placeholder="write your reply here"></textarea>
                     <br>
                     <input type="submit" class="btn btn-primary" value="reply">
                     <a href="javascript::void(0);" class="btn" onClick="reply_close(this)">Close</a>
                     </form>
                  </div>
               </div>
               
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Taj</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script type="text/javascript"> 
         function reply(caller) {
           document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter ($(caller));
            $('.replyDiv').show();
          }
         function reply_close(caller) {
            
            $('.replyDiv').hide();
          }
     </script>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      

   </body>
</html>