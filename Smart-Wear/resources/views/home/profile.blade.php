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
      <title>llll</title>
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
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
           dtd                                                                                    



      <div class="container mt-4">
      


      <div class="row">
    <div class="card">
        <div class="card-header">
            <h4>User Profile</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('profile') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Username</label>
                            <div class="form-control">
                                {{$user->username}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <div class="form-control">
                                {{$user->email}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <div class="form-control">
                                {{$user->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Name</label>
                            <div class="form-control">
                                {{$user->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Address</label>
                            <div class="form-control">
                                {{$user->address}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a class="badge badge-info" href="{{url('profile_edit',$user->id)}}"><i class="fa fa-edit"></i>Edit Profile</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

      
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