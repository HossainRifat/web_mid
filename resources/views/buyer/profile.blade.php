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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
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
              <a class="nav-link text-dark font-weight-bold active" href="../pages/profile.html">
                <div class="text-dark font-weight-bold active text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold" href="/buyer/security">
                <div class="text-dark font-weight-bold text-center me-2 d-flex align-items-center justify-content-center">
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
      
      <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
          <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
              <h4 class="font-weight-bolder mb-0">Profile</h4>
            </nav>
            
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
          <div class="page-header min-height-300 border-radius-xl mt-4" style="background-color:rgb(126, 114, 216); opacity:.8;">
            <span class="mask  opacity-6"></span>
          </div>
          <div class="card card-body mx-3 mx-md-4 mt-n6">
            <button class="btn btn-danger  position-absolute top-4 end-4 col-md-1 text-light" data-toggle="modal" data-target="#exampleModalCenter">Delete</button>
            <div class="row gx-4 mb-2">
              <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                  <img src="/storage/uploads/{{$user->photo}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
              </div>
              <div class="col-auto my-auto">
                <div class="h-100">
                  <h5 class="mb-1">
                    {{$user->first_name}} {{$user->last_name}}
                  </h5>
                  <p class="mb-0 font-weight-normal text-sm">
                    CEO / Co-Founder
                  </p>
                  
                </div>
              </div>
              
              
            </div>

            @if ($data == "get")
            <div class="row">
              <div class="row">
              
                <div class="col-12 col-xl-6">
                  <div class="card profile-card-plain shadow-none border-0 h-100">
                    <div class="profile-header pb-0 p-3">
                      <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                          <h6 class="mb-0">Profile Information</h6>
                        </div>
                      </div>
                    </div>
                    <div class="profile-card p-3">
    
                      
                        <p class="text-sm">
                          Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark" readonly>First Name <span>*</span></strong> &nbsp; <input type="text" name="first_name" value="{{$user->first_name}}" readonly></li>
                          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Last Name <span>*</span></strong> &nbsp; <input type="text" name="last_name" value="{{$user->last_name}}" readonly></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile <span>*</span></strong> &nbsp; <input type="text" name="phone" readonly value="{{$user->phone}}" readonly></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email <span>*</span></strong> &nbsp; <input type="text" name="phone" value="{{$user->email}}" readonly></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date of birth <span>*</span></strong> &nbsp; <input type="date" name="dob" value="{{$user->dob}}" style="border: solid; border-color: rgb(231, 232, 230);" readonly></li>
                          
                          <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-instagram fa-lg"></i>
                            </a>
                          </li>
                        </ul>
                      
                      
                    </div>
                  </div>
                </div>
                <div class="col-12 col-xl-6">
                  <div class="card card-plain shadow-none border-0 h-100">
                    <div class="profile-header pb-0 p-3">
                      <div class="row">
                        
                        <div class="col-md-8 d-flex align-items-center">
                          <!-- <h6 class="mb-0">Profile Information</h6> -->
                          
                        </div>
                        <div class="col-md-4 text-end">
                          
                          <a href="/buyer/profile/edit">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="profile-card p-1">
                        <!-- <p class="text-sm">
                          <textarea name="" rows="3" style="width: 98%;">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</textarea>
                          
                        </p> -->
                        <!-- <hr class="horizontal gray-light my-4"> -->
                        <ul class="list-group">
                          <li class="list-group-item border-0 ps-0 pt-7 text-sm"><strong class="text-dark">National identity number <span>*</span></strong> &nbsp; <input type="text" name="nid" value="{{$user->nid}}" readonly></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Passport number</strong> &nbsp; <input type="text" name="passport" value="{{$user->passport}}" readonly></li>
                          {{-- <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Profile picture <span>*</span></strong> &nbsp; <input type="file" name="photo" value="{{$user->photo}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">My accounts documents <span>*</span></strong> &nbsp; <input type="file" name="account" value="{{$user->account}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">My business documents</strong> &nbsp; <input type="file" name="documents" value="{{$user->documents}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li> --}}
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address <span>*</span></strong> &nbsp; <textarea name="address" rows="6" style="width: 100%;" readonly>{{$user->address}}</textarea></li>
                        </ul>                      
                    </div>
                  </div>
                </div>      
              </div>
            </div>
            @else
                <form method="post" action="/buyer/profile" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="row">
                    
                      <div class="col-12 col-xl-6">
                        <div class="card profile-card-plain shadow-none border-0 h-100">
                          <div class="profile-header pb-0 p-3">
                            <div class="row">
                              <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                              </div>
                            </div>
                          </div>
                          <div class="profile-card p-3">
          
                            
                              <p class="text-sm">
                                Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                              </p>
                              <hr class="horizontal gray-light my-4">
                              <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">First Name <span>*</span></strong> &nbsp; <input type="text" name="first_name" value="{{$user->first_name}}"></li>
                                @if ($errors->has('first_name'))
                                <span>
                                  <p>{{$errors->first("first_name")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Last Name <span>*</span></strong> &nbsp; <input type="text" name="last_name" value="{{$user->last_name}}"></li>
                                @if ($errors->has('last_name'))
                                <span>
                                  <p>{{$errors->first("last_name")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile <span>*</span></strong> &nbsp; <input type="text" name="phone" value="{{$user->phone}}"></li>
                                @if ($errors->has('phone'))
                                <span>
                                  <p>{{$errors->first("phone")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email <span>*</span></strong> &nbsp; <input type="text" name="email" value="{{$user->email}}"></li>
                                @if ($errors->has('email'))
                                <span>
                                  <p>{{$errors->first("email")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date of birth <span>*</span></strong> &nbsp; <input type="date" name="dob" value="{{$user->dob}}" style="border: solid; border-color: rgb(231, 232, 230);" ></li>
                                @if ($errors->has('dob'))
                                <span>
                                  <p>{{$errors->first("dob")}}</p>
                                </span>
                                @endif
                                
                                <li class="list-group-item border-0 ps-0 pb-0">
                                  <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                  </a>
                                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg"></i>
                                  </a>
                                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                  </a>
                                </li>
                              </ul>
                            
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-xl-6">
                        <div class="card card-plain shadow-none border-0 h-100">
                          <div class="profile-header pb-0 p-3">
                            <div class="row">
                              <div class="col-md-8 d-flex align-items-center">
                                <!-- <h6 class="mb-0">Profile Information</h6> -->
                              </div>
                              <div class="col-md-4 text-end">
                                {{-- <a href="/buyer/profile/edit">
                                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                </a> --}}
                              </div>
                            </div>
                          </div>
                          <div class="profile-card p-1">
                              <!-- <p class="text-sm">
                                <textarea name="" rows="3" style="width: 98%;">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</textarea>
                                
                              </p> -->
                              <!-- <hr class="horizontal gray-light my-4"> -->
                              <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-7 text-sm"><strong class="text-dark">National identity number <span>*</span></strong> &nbsp; <input type="text" name="nid" value="{{$user->nid}}"></li>
                                @if ($errors->has('nid'))
                                <span>
                                  <p>{{$errors->first("nid")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Passport number</strong> &nbsp; <input type="text" name="passport" value="{{$user->passport}}"></li>
                                @if ($errors->has('passport'))
                                <span>
                                  <p>{{$errors->first("passport")}}</p>
                                </span>
                                @endif
                                {{-- <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Profile picture <span>*</span></strong> &nbsp; <input type="file" name="photo" value="{{$user->photo}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">My accounts documents <span>*</span></strong> &nbsp; <input type="file" name="account" value="{{$user->account}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">My business documents</strong> &nbsp; <input type="file" name="documents" value="{{$user->documents}}" class="form-control form-control-lg" id="formFile" style="padding-top: 8px;"></li> --}}
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address <span>*</span></strong> &nbsp; <textarea name="address" rows="6" style="width: 100%;">{{$user->address}}</textarea></li>
                                @if ($errors->has('address'))
                                <span>
                                  <p>{{$errors->first("address")}}</p>
                                </span>
                                @endif
                                <li class="list-group-item border-0 ps-0 text-sm"></strong> &nbsp; <input type="submit" value="Save"></li>
                              </ul>                      
                          </div>
                        </div>
                      </div>      
                    </div>
                  </div>
                </form>
            @endif

            
          </div>
        </div>
        
      </div>

      <!-- Modal -->
      <!-- Button trigger modal -->

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure? You want to remove your account.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger"><a href="/buyer/account/remove" class="text-light">Yes Continue</a></button>
            </div>
          </div>
        </div>
      </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @endsection
</body>
</html>