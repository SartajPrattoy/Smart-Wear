@extends('adminpanel/navbar')
@section('content')
<!-- DESIGNING OF THE PAGE-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
  </head>
  <body>
    <!-- connect navbar-->
    


    
    
    <!-- HTML bootstrap design -->
    <div class="container">
    <!-- Heading of page -->
    <style>
        body {
          height: 100vh; /* Set the body height to 100% viewport height */
          overflow: hidden; /* Hide the body's default scrollbar */
        }

      </style>
    <div class="content-wrapper">
    @if(session()->has('message'))

    <div class="alert alert-info">
        
        {{session()->get('message')}}

    </div>

    @endif    
    

    
    <h1 class="text-center fw-bold" style="color: green; font-family: 'Montserrat', sans-serif;">SIGN UP AS ADMIN</h1>
    <form action="{{url('/')}}/adminsignup" method="post">

        @csrf 
        <div class="row">
            <!-- Name box-->
            <div class="col-md-6 mb-3">
                <label for="Name" class="form-label fw-bold">Name</label>
                <input type="text" maxlength="30" class="form-control" id="Name" name="Name" aria-describedby="nameHelp" required="required">
            </div>
            <!--pohone num box-->
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label fw-bold">Phone number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" aria-describedby="phoneHelp" required="required">
                <div id="phoneHelp" maxlength="15" class="form-text">Enter a valid phone number</div>
            </div>
            <!--Reference box-->
            <div class="col-md-6 mb-3">
                <label for="ref_code" class="form-label fw-bold">Reference Code</label>
                <input type="text" maxlength="5" class="form-control" id="ref_code" name="ref_code" aria-describedby="ref_code_Help" required="required">
                <div id="ref_code_Help" maxlength="5" class="form-text">Enter reference code given by other admins</div>
            </div>
            <!--Reference Generate box-->
            <div class="col-md-6 mb-3">
                <label for="ref_code_gen" class="form-label fw-bold">Your reference Code</label>
                <input type="text" maxlength="5" class="form-control" id="ref_code_gen" name="ref_code_gen" aria-describedby="ref_code_Help" required="required">
                <div id="ref_code_Help" maxlength="5" class="form-text">Enter a reference code that you'd like to use for other new admin signups</div>
            </div>
            <!--Email box-->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold">Email address</label>
                <input type="email" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp" required="required">
            </div>
            <!--username box-->
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required="required">
            </div>
            <!--Password box-->
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" maxlength="30" class="form-control" id="password" name="password" required="required">
            </div>
            <!--Confirm pass box-->
            <div class="col-md-6 mb-3">
                <label for="cpassword" class="form-label fw-bold">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required="required">
                <div id="cpassword"  maxlength="30" class="form-text">Please enter the password again.</div>
            </div>
            </div>
            <!--Sign up button button-->
            <div class="text-center" >
            <button type="submit" class="btn btn-primary bg-success fw-bold">Sign Up as Admin</button>
        </div>
    </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    
    </div>

    <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Smartwear <br> Live Smart</span>

              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Contact<br> Email: tajemon9@gmail.com <br> Phone: <br>Address: Brac University, Dhaka, Bangldadesh </span>
            </div>
          </footer>
  </body>
</html>
@stop