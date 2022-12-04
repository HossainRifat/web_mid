@extends('layouts.buyerLayout');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/css/details.css">
    <title>Details</title>
</head>
<body>
    @section('content')
    <section class="banner-main py-7" id="banner">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 col-md-8">
                    <div class="main-banner">
                        <span class="text-color font-weight-bold">{{$post->category}}</span>
                        <h1 class="mb-3 mt-2">
                           {{$post->title}} 
                        </h1>
    
                        <div class="mb-4">
                            <h4>Price per unit:- <span class="text-color">${{$post->price}}</span></h4>
                        </div>
                        <?php
                                    $var = (explode(",",$post->quantity));
                                    $total_product = 0;
                                    $total_amount = 0;
                                    foreach ($var as $item2) {
                                        $var2 = explode("=",$item2);
                                        $total_product += (int)$var2[1];
                                        $total_amount = (int)$post->price * $total_product;
                                    }
                                    // $total_bid = count($item->bid);
                                    
                                    echo('<div class="mb-4"><h4>Quantity:- <span class="text-color">'.$total_product.'</span></h4></div>');
                                    echo('<div class="mb-4"><h4>Total Price:- <span class="text-color">$'.$total_amount.'</span></h4></div>');
                        ?>
                        <div class="mb-4">
                            <h4>Delivery:- <span class="text-color">{{$post->expire_date}}</span></h4>
                        </div>
                        <h5 class="mb-4"> Description:</h5>
                        <p class="mb-4">{{$post->description}}</p>
                        <p class="mb-4">{{$post->quantity}}</p>

                        <a class="mb-4" href="" class="link-primary">Download design</a>
                    </div>
                </div>
    
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="banner-img pt-5">
                        <img src="/storage/uploads/{{$post->photo}}" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div> 
        </div> 
    </section>
    <div class="bid-container">
        <div class="container d-flex justify-content-center mt-50 mb-50">
            
            <div class="row">
               <div class="col-md-10 justify-content-center bid-body">
                <h1>{{count($post->bid)}} Bids in total</h1>
                <hr>
                @if ($post->bid)
                    @foreach ($post->bid as $item)
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">
                                <img src="/img/bid_img.png" width="50" height="50">
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold">
                                    <a href="#" data-abc="true">{{$item->seller->company->company_name}}</a>
                                </h6>

                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">{{$item->seller->first_name}} {{$item->seller->last_name}}</a></li>
                                    {{-- <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li> --}}
                                </ul>

                                <p class="mb-8">{{$item->description}}</p>

                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li><p>{{$item->seller->address}}, At <span>{{$item->bid_date}}</span> </p></li>
                                </ul>
                            </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                
                                <h3 class="mb-0 font-weight-semibold">$ {{$item->price}}</h3>
                                <div class="text-muted"> Delivary <b>{{$item->delivery_date}}</b> </div>
                                <div class="text-muted"> Production per week <b>{{$item->seller->company->production_per_week}}</b></div>
                                <div class="text-muted">Orders done <b>{{$item->seller->company->total_orders_done}}</b> </div>

                                <a href="/buyer/bid/confirm/{{$item->id}}"><button type="button"><i class="icon-cart-add"></i>Confirm</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    
                @endif
                        
                                 
            </div>                     
            </div>
        </div>
        

    </div>
    @endsection
</body>
</html>