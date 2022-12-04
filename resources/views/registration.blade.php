@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    @section('content')

    @if ($name == "buyer")
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <h2>1 OF 3</h2>
                <div class="reg-img">
                    <img src="/img/reg.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Buyer Registration</h2>
                <h4>Just a Step way to become our Member!</h4>
                <div class="reg-border">
                    <form  method="post" action="/registration/buyer" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label>First Name</label><br>
                        <input type="text" placeholder="Enter your first name" name="first_name" value="{{old('first_name')}}">
                        @if ($errors->has('first_name'))
                            <span>
                                <p>{{$errors->first("first_name")}}</p>
                            </span>
                        @endif
                        <label>Last Name</label><br>
                        <input type="text" placeholder="Enter your last name" name="last_name" value="{{old('last_name')}}">
                        @if ($errors->has('last_name'))
                            <span>
                                <p>{{$errors->first("last_name")}}</p>
                            </span>
                        @endif
                        <label>Email</label>
                        <input type="Email" placeholder="Enter your email" name="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        {{-- <label>Password</label>
                        <input type="password" placeholder="Enter your password" name="password" value="{{old('password')}}">
                        @if ($errors->has('password'))
                            <span>
                                <p>{{$errors->first("password")}}</p>
                            </span>
                        @endif --}}
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male" class="form-check-input" value="{{old('gender')}}">
                        <label >Male</label>
                        <input type="radio" name="gender" value="female" class="form-check-input" value="{{old('gender')}}">
                        <label >Female</label>
                        <input type="radio" name="gender" value="other" class="form-check-input" value="{{old('gender')}}">
                        <label >Other</label><br>
                        @if ($errors->has('gender'))
                            <span>
                                <p>{{$errors->first("gender")}}</p>
                            </span>
                        @endif
                        <label>Date of birth</label>
                        <input type="date" placeholder="Enter your date of bitrh" name="dob" value="{{old('dob')}}">
                        @if ($errors->has('dob'))
                            <span>
                                <p>{{$errors->first("dob")}}</p>
                            </span>
                        @endif
                        <label>Profile Picture</label>
                        <input type="file" placeholder="Enter your profile picture" class="form-control" id="formFile" name="photo" value="{{old('photo')}}">
                        @if ($errors->has('photo'))
                            <span>
                                <p>{{$errors->first("photo")}}</p>
                            </span>
                        @endif
                        <label>Address</label>
                        <textarea name="address" rows="3" placeholder="Enter address">{{old('address')}}</textarea>
                        @if ($errors->has('address'))
                            <span>
                                <p>{{$errors->first("address")}}</p>
                            </span>
                        @endif
                        <input type="submit" name="submit" value="Next">
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
    @else
    
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <div class="reg-img">
                    <img src="/img/reg.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Admin Registration</h2>
                <h4>Just a Step way to become Admin!</h4>
                <div class="reg-border">
                    <form  method="post" action="/registration/admin">
                        {{ csrf_field() }}
                        <label>Name</label><br>
                        <input type="text" placeholder="Enter your name" name="First_Name" value="{{old('First_Name')}}">
                        @if ($errors->has('First_Name'))
                            <span>
                                <p>{{$errors->first("First_Name")}}</p>
                            </span>
                        @endif
                        <label>Email</label>
                        <input type="Email" placeholder="Enter your email" name="email">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        <label>Password</label>
                        <input type="password" placeholder="Enter your password" name="password">
                        @if ($errors->has('password'))
                            <span>
                                <p>{{$errors->first("password")}}</p>
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
    
    @endif

    @endsection
</body>
</html>