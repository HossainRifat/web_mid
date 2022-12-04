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
              <a class="nav-link text-dark font-weight-bold active" href="../pages/dashboard.html">
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
              <a class="nav-link text-dark font-weight-bold " href="">
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
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
          <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
              <h2 class="font-weight-bolder mb-0">Dashboard</h2>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                  <label class="form-label"></label>
                  <input type="text" class="form-control" placeholder="Search here..">
                </div>
              </div>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa-solid fa-newspaper opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">My Posts</p>
                    <h4 class="mb-0">{{$post}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa-solid fa-cart-shopping opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">My Orders</p>
                    <h4 class="mb-0">{{$active_order}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa-solid fa-bag-shopping opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">My Checkouts</p>
                    <h4 class="mb-0">{{$checkout}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa-solid fa-sack-dollar opacity-10"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">My Spends</p>
                    <h4 class="mb-0">${{$money}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
          
          <div class="row mb-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>My Orders</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i> Currently active
                        <span class="font-weight-bold ms-1"> {{$active_order}}</span> order(s)
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                      <div class="dropdown float-lg-end pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive dashboard-table">
                    <table class="table align-items-center mb-0 text-dark">
                      <thead class="sticky-top">
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Products</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deadline</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user->my_order as $item)
                              @if ($item->status != "done")
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div>
                                      {{-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> --}}
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{ucfirst(trans($item->title))}}</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <span class="text-xs font-weight-bold text-secondary">{{$item->delivery_date}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-xs font-weight-bold text-secondary">${{$item->price}}</span>
                                </td>
                                <td class="align-middle">
                                  <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                      <div class="progress-percentage">
                                        <span class="text-xs font-weight-bold text-secondary">{{$item->status}}%</span>
                                      </div>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar bg-gradient-info w-{{$item->status}}" role="progressbar" aria-valuenow={{$item->status}} aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              @endif
                            
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card h-100 ">
                <div class="card-header pb-0">
                  <h6>Posts overview</h6>
                  <p class="text-sm">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <span class="font-weight-bold">24%</span> this month
                  </p>
                </div>
                <div class="card-body p-3">
                  <div class="timeline timeline-one-side order-history-body">
                    @foreach ($my_post as $item)
                    @if ($item->bid)
                    @foreach ($item->bid as $item2)  
                      @if ($item2->status == "post")
                      <div class="timeline-block mb-3">
                        <span class="timeline-step">
                          <i class="material-icons text-success text-gradient">notifications</i>
                        </span>
                        <div class="timeline-content">
                          <h6 class="text-dark text-sm font-weight-bold mb-0">
                           <a href="/buyer/post/details/{{$item2->post->id}}" class="text-secondary">${{$item2->price}}, {{$item2->seller->first_name}} {{$item2->seller->last_name}}</a> </h6>
                          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{$item2->bid_date}}</p>
                        </div>
                      </div>
                      @endif
                    @endforeach
                    @endif
                    
                    @endforeach
                    
        </div>
      </main>

    @endsection
</body>
</html>