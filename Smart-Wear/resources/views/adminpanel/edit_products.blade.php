<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('adminpanel.css') 
  </head>
  <body>
    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('adminpanel.sidebar')    
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    @include('adminpanel.header')  
    <!-- partial-->
    <div class="main-panel">
        <!--<div class="content-wrapper">-->
    <div class="content-wrapper">
        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

        </div>

        @endif


    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light"> 
    <div class="container ">
        <h1 class="text-center" style="color: white;" >Insert Products</h1> 
        <!--multipart - for adding images-->
        <form action="{{url('/update_product', $data[0]->product_id)}}" method="post" enctype="multipart/form-data">  
            @csrf

        <!-- Product Name-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_title" style="color: white;" class="form-label fw-bold">Product Name</label>
            <input type="text" class="form-control" id="product_title" name="product_title" value="{{$data[0]->product_title}}" aria-describedby="Product_name_help" placeholder="Enter product name" required="required" autocomplete="on">
        </div>
        
        <!-- Category select-->
        <div class="form-outline mb-2 w-30 m-auto">
        <label for="product_category" style="color: white;" class="form-label fw-bold">Product Category</label>
            <select name="product_category" class="form-select" aria-label="Default select example">
                <option value="{{$data[0]->catagory_id}}" selected="">Pick a category</option>
                @foreach ($cata as $cata)
                    <option value="{{$cata->id}}">{{$cata->catagory_name}}</option>
                @endforeach
            </select>
        </div>
        <!-- Appreal select-->
        <div class="form-outline mb-2 w-30 m-auto">
        <label for="product_apparel" style="color: white;" class="form-label fw-bold">Product Apparel</label>
            <select name="product_apparel" class="form-select" aria-label="Default select example">
            <option value="{{$data[0]->apparel_id}}" selected="">Pick an apparel</option>
            @foreach ($appa as $appa)
                    <option value="{{$appa->apparel_id}}">{{$appa->apparel_name}}</option>
            @endforeach

            </select>
        </div>

        
        <!-- product_price-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_price" style="color: white;" class="form-label fw-bold">Product Price </label>
            <input type="text" class="form-control" id="product_keywords" value="{{$data[0]->price}}" name="product_price" 
            aria-describedby="product_price_help" placeholder="Enter product Price" autocomplete="on" required="required" >
        </div>

        <!-- product_discount_price-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_price" style="color: white;" class="form-label fw-bold">Product Discount Price</label>
            <input type="text" class="form-control" id="product_keywords" value="{{$data[0]->discounted_price}}" name="product_discount_price" 
            aria-describedby="product_price_help" placeholder="Enter product discount Price" autocomplete="on" required="required" >
        </div>

        <!-- product_days-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_price" style="color: white;" class="form-label fw-bold">Days </label>
            <input type="text" class="form-control" value="{{$data[0]->days}}" id="product_keywords" name="product_days" 
            aria-describedby="product_price_help" placeholder="Enter product Price" autocomplete="on" required="required" >
        </div>

        <!-- product_quantity-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_quantity" style="color: white;" class="form-label fw-bold">Product Quantity</label>
            <input type="text" value="{{$data[0]->quantity}}" class="form-control" id="product_quantity" 
            name="product_quantity"  placeholder="Enter product Quantity" autocomplete="on" required="required">
        </div>
        <!-- Image-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_image" style="color: white;" class="form-label fw-bold">Current Product Image</label>
            <img  height="100" width="100" src="/added_products/{{$data[0]->image}}" alt="">
        </div>


        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_image" style="color: white;" class="form-label fw-bold">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="image" >
        </div>

        <!-- Product Description-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_description" style="color: white;" class="form-label fw-bold">Product Description</label>
            <input type="text"  value="{{$data[0]->product_description}}" class="form-control" id="product_description" name="product_description" aria-describedby="product_description_help" placeholder="Enter product description" autocomplete="off" required="required">
        </div>


        <!-- Submit-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control" id="product_insert" name="product_insert" class="btn btn-info" value="Launch product" >
        </div>
            
        </div>
        </form>
    </div>


    
</body>
</html>
            

        </div>
/div> 
        
    <!-- container-scroller -->
    @include('adminpanel.script')
  </body>
</html> 