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
                    <form  method="post" action="/registration03/buyer" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label>Password <span>*</span></label><br>
                        <input type="password" placeholder="Enter pessword" name="password" value="{{old('password')}}">
                        @if ($errors->has('password'))
                            <span>
                                <p>{{$errors->first("password")}}</p>
                            </span>
                        @endif
                        <label>Confirm Password <span>*</span></label><br>
                        <input type="password" placeholder="Re-enter password" name="password_confirmation" value="{{old('password_confirmation')}}">
                        @if ($errors->has('password_confirmation'))
                            <span>
                                <p>{{$errors->first("password_confirmation")}}</p>
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