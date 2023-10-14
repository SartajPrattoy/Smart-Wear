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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

    


    <!-- Content Header (Page header) -->
    
      



      <div class="container mt-4">
      


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('profile_update',$user->id) }}" method="POST">

                    @csrf
                
                    

                    <div class="row">
                        <div class="col-md-6">

                        
                            <div class="mb-3">
                                
<label>Username</label>
<input type="text" placeholder="Enter your username here" name="username" value="{{$user->username}}" class="form-control" />
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label>Email Address</label>
<input type="text" readonly value="{{$user->email}}" class="form-control" />
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label>Phone Number</label>
<input type="text" name="phone" placeholder="Enter your phone number here" value="{{$user->phone}}" class="form-control" />
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label>Name</label>
<input type="text" name="name" placeholder="Enter your name here" value="{{$user->name}}" class="form-control" />
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label>Address</label>
<textarea name="address" placeholder="Enter your address here" class="form-control" rows="3">"{{$user->address}}"</textarea>
</div>
</div>
<div class="col-md-12"> 
    <button type="submit" class="btn btn-success btn-block">Update Account</button> 
</div>


             
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


    
</body>
</html>
