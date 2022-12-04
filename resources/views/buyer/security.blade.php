@extends('layouts.buyerLayout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/buyerDash.css">
    <title>Dashboard</title>
    <link href="/dashboard/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/dashboard/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="/dashboard/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-200">
    @section('content')
    
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start ms-3   bg-white shadow">
        <div class="sidenav-header text-center">
          <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            {{-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
            <span class="ms-1 font-weight-bold">My Dashboard</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold" href="/buyer/dashboard">
                <div class="text-dark font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark  font-weight-bold" href="../pages/billing.html">
                <div class="text-dark  font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <span class="nav-link-text ms-1">Payments</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold " href="../pages/notifications.html">
                <div class="text-dark font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">notifications</i>
                </div>
                <span class="nav-link-text ms-1">Notifications</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold " href="/buyer/profile/get">
                <div class="text-dark font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold active" href="/buyer/security">
                <div class="text-dark font-weight-bold text-center active me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">security</i>
                </div>
                <span class="nav-link-text ms-1">Security</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold " href="/buyer/logout">
                <div class="text-dark font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10 text-danger">logout</i>
                </div>
                <span class="nav-link-text ms-1 text-danger">Sign Out</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
          <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
              <h2 class="font-weight-bolder mb-0">Security</h2>
            </nav>
            
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          <div class="row mb-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>My Password</h6>
                      </p>
                    </div>
                    
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="my-security">
                        <form  method="post" action="/buyer/changepass" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label>Old Password <span>*</span></label><br>
                            <input type="password" placeholder="Enter pessword" id="password" name="old_password" value="{{old('old_password')}}">
                            @if ($errors->has('old_password'))
                                <span>
                                    <p>{{$errors->first("old_password")}}</p>
                                </span>
                            @endif
                            <label>New Password <span>*</span></label><br>
                            <input type="password" placeholder="Enter pessword" id="password2" name="password" value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span>
                                    <p>{{$errors->first("password")}}</p>
                                </span>
                            @endif
                            <label>Confirm Password <span>*</span></label><br>
                            <input type="password" placeholder="Re-enter password" id="password3" name="password_confirmation" value="{{old('password_confirmation')}}">
                            @if ($errors->has('password_confirmation'))
                                <span>
                                    <p>{{$errors->first("password_confirmation")}}</p>
                                </span>
                            @endif
                            
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="myFunction()">
                            <label class="text-sm" for="flexSwitchCheckDefault">Show Passowd</label><br>
                            <input type="submit" name="submit" value="Save">

                        </form>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card h-100 ">
                <div class="card-header pb-0">
                  <h6>Login Sessions</h6>
                  <p class="text-sm">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <?php
                    $i = 0;
                    // dd($all_user->logged_session);
                     foreach ($all_user->logged_session as $item){
                        if ($item->logout_time == "NULL"){
                            $i += 1;
                        }
                    }
                    echo('<span class="font-weight-bold">'.$i.'</span> active login,');
                    ?>
                    <span><a href="" class="text-danger text-bold"> Logout from all session</a></span>
                  </p>
                </div>
                <div class="card-body p-3">
                  <div class="timeline timeline-one-side order-history-body">
                    
                    @foreach ($all_user->logged_session as $item)
                        @if ($item->logout_time == "NULL")
                        
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                              <i class="material-icons text-danger text-gradient">key</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Time:- {{$item->login_time}}</h6>
                                @if ($item->token == Cookie::get('token'))
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">This PC</p>
                                @else
                                    <p class="text-primary font-weight-bold text-xs mt-1 mb-0"><a href="/buyer/logout/session/{{$item->token}}"> — {{$item->token}}</a></p>
                                @endif
                              
                              
                            </div>
                          </div>
                        @endif
                    @endforeach
            
                  </div>
                </div>
              </div>                   
            </div>
      </main>

      <script>
        function myFunction() {
          var x = document.getElementById("password");
          var x2 = document.getElementById("password2");
          var x3 = document.getElementById("password3");

          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }

          if (x2.type === "password") {
            x2.type = "text";
          } else {
            x2.type = "password";
          }

          if (x3.type === "password") {
            x3.type = "text";
          } else {
            x3.type = "password";
          }
        }
        </script>

    @endsection
</body>
</html>