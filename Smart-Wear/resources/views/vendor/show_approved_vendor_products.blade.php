<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('vendor.css') 
    <style>
    .product-image {
      width: 100px!important;
      height: 100px!important;
      object-fit: contain!important;
      border-radius: 5px!important;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('vendor.sidebar')    
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    @include('vendor.header')  
    <!-- partial -->
    <div class="main-panel">
        <!--<div class="content-wrapper">-->
        <div class="content-wrapper">

        @if(session()->has('message'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('message')}}

</div>

@endif

                <!-- TABLE-->
    <h1 class="text-center text-white">Smart Wear Products</h1>
    <div class="table-responsive">
  <table class="table table-bordered mt-5">
  <thead class="bg-secondary text-light text-center">
    <tr class="text-center">


        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Discount Price</th>
        <th>Quantity</th>
        <th>Day count on price</th>
        <th>Vendor</th>
        <th>Delete</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    
 @foreach($product_data as $product_data)
        <tr class='text-center'>
        
            <td>{{$product_data->product_id}}</td>
            <td>{{$product_data->product_title}}</td>
            <td>
            <img src="/added_products/{{$product_data->image}}" class="product-image">



            </td>
            <td>{{$product_data->price}}</td>
            <td>{{$product_data->discounted_price}}</td>
            <td>{{$product_data->quantity}}</td>
            <td>{{$product_data->days}}</td>
            <td>{{$product_data->vendor_name}}</td>

	            

            <td><a onclick="return confirm('Confirm Delete?')" class="btn btn-danger" href="{{url('delete_product',$product_data->product_id)}}">Delete</a></td>
        </tr>

@endforeach

    </tbody>

</thead>

</table>


        </div>
    </div>
    </div>

        
    <!-- container-scroller -->
    @include('vendor.script')
  </body>
</html> 