@extends("layouts.buyerLayout")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    
    <title>Posts</title>
</head>
<body>
    @section('content')
    <div class="posts-container">
        <div class="container d-flex justify-content-center mt-50 mb-50">
            
            <div class="row">
               <div class="col-md-10 my-cart">

                @if ($all_post)
                    @foreach ($all_post as $item)
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">
                                <img src="/storage/uploads/{{$item->photo}}" width="150" height="250" alt="">
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold">
                                    <a href="#" data-abc="true">{{$item->title}}</a>
                                </h6>

                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">{{$item->category}}</a></li>
                                    {{-- <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li> --}}
                                </ul>

                                <p class="mb-3">{{$item->description}}</p>

                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Post by <a href="#" data-abc="true">{{$item->user->first_name}} {{$item->user->last_name}}</a></li><br>
                                    <li><p data-abc="true">{{$item->post_date}}</p></li>
                                    <li><p>From, {{$item->user->address}}</p></li>
                                </ul>
                            </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <?php
                                    $var = (explode(",",$item->quantity));
                                    $total_product = 0;
                                    $total_amount = 0;
                                    foreach ($var as $item2) {
                                        $var2 = explode("=",$item2);
                                        $total_product += (int)$var2[1];
                                        $total_amount = (int)$item->price * $total_product;
                                    }
                                    $total_bid = count($item->bid);
                                    echo('<h3 class="mb-0 font-weight-semibold">$'.$total_amount.'</h3>');
                                    echo('<div class="text-muted"> Product count <br> <b>'.$total_product.'</b></div>');
                                    echo('<div class="text-muted"> Delivary <br> <b>'.$item->expire_date.'</b> </div>');
                                    echo('<div class="text-muted"> Bid count <br> <b>'.$total_bid.'</b> </div>');
                                ?>
                                
                                {{-- <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                </div> --}}
                                <a href="/buyer/post/details/{{$item->id}}"><button type="button"><i class="icon-cart-add"></i>Details</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h1>hello</h1>
                @endif
                        
                                 
            </div>
            <ul class=" page-posts row">
                {{-- <p style="width: 10px;">{{$all_post->links()}}</p>  --}}
                <li {{$all_post->links()}}</li>
            </ul>                     
            </div>
        </div>
        <div class="right-container">

            <div class="search">
                <input type="search" name="search" id="search" placeholder="Search here..">
            </div>
            <div class="posts-hed">
                <h5 class="text-light">Short By</h5>
            </div>
            <div class="posts-short">     
            <ul>
                <li> <input class="form-check-input" type="checkbox"><a href="/buyer/posts/title/AtoZ" class="text-dark">Title A > Z</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/title/ZtoA" class="text-dark">Title Z > A</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/cat/AtoZ" class="text-dark">Category A > Z</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/cat/ZtoA" class="text-dark">Category Z > A</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/date/1to9" class="text-dark">Delivary date 1 > 9</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/date/9to1" class="text-dark">Delivary date 9 > 1</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/quantity/1to9" class="text-dark">Quantity 1 > 9</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="/buyer/posts/quantity/9to1" class="text-dark">Quantity 9 > 1</a></li>
            </ul>
            </div>
            <div class="posts-hed">
                <h5 class="text-light">Filter By</h5>
            </div>
            <div class="posts-short">     
            <ul>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 1000 - 10,000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 10,000 - 100,000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Price 100,000+</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 100 - 500</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 500 - 1000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 1000 - 2000</a></li>
                <li><input class="form-check-input" type="checkbox"><a href="" class="text-dark">Quantity 2000+</a></li>
            </ul>
            </div>
        </div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
{{-- 
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{csrf_token()}}' } });
    </script>
     --}}
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    </script>
    
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function(){
                var value = $(this).val();
                // console.log(value);
                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: {'search':value},
                    success: function (data) {
                        $('.my-cart').html(data);
                        //console.log(data);
                    }
                });
            });
        });
    </script>

    @endsection
</body>
</html>