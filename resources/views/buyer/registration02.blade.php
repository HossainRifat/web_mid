@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="/js/intlTelInput.js"></script>
     
    <title>Registration</title>
</head>
<body>
    @section('content')

    <script>
        $('#phone').intTelInput();
    </script>

    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <h2>2 OF 3</h2>
                <div class="reg-img">
                    <img src="/img/reg.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Buyer Registration</h2>
                <h4>Just a Step way to become our Member!</h4>
                <div class="reg-border">
                    <form  method="post" action="/registration02/buyer" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label>National Identificatin Number <span>*</span></label><br>
                        <input type="text" placeholder="Enter your NId" name="nid" value="{{old('nid')}}">
                        @if ($errors->has('nid'))
                            <span>
                                <p>{{$errors->first("nid")}}</p>
                            </span>
                        @endif
                        <label>Passport Number</label><br>
                        <input type="text" placeholder="Enter your passport number" name="passport" value="{{old('passport')}}">
                        @if ($errors->has('passport'))
                            <span>
                                <p>{{$errors->first("passport")}}</p>
                            </span>
                        @endif
                        <label>Phone Number <span>*</span></label><br>
                        <input type="text" placeholder="Enter your phone number" name="phone" id="phone" value="{{old('phone')}}">
                        @if ($errors->has('phone'))
                            <span>
                                <p>{{$errors->first("phone")}}</p>
                            </span>
                        @endif
                        <label>Income Cirtificate <span>*</span></label>
                        <input type="file" class="form-control" id="formFile" name="account">
                        @if ($errors->has('account'))
                            <span>
                                <p>{{$errors->first("account")}}</p>
                            </span>
                        @endif
                        <label>Documents Of Previous (at least Five)</label>
                        <input type="file" class="form-control" id="formFile" name="documents">
                        @if ($errors->has('documents'))
                            <span>
                                <p>{{$errors->first("documents")}}</p>
                            </span>
                        @endif
                        
                        <input type="submit" name="submit" value="Signup">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="errors">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>  
    </div>

    @endsection
</body>
</html>