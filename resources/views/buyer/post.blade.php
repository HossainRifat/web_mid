@extends('layouts.buyerLayout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    
    <title>Post</title>
</head>
<body>
    @section('content')
        

    

    <div class="container-main">
        <div class="post-background-image"></div>
        <div class="post-container shadow text-dark">
            <div class="top-text">
                <h2>RMG Solution</h2>
                <h3>Tell us what you need done</h3>
                <h6>Contact skilled freelancers within minutes. View profiles, ratings, portfolios and chat with them. Pay the freelancer only when you are 100% satisfied with their work.</h6>
            </div>
            <div class="form-conatiner">
                <form  method="post" action="/buyer/post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label>Choose a name for your project</label><br>
                    <input type="text" placeholder="Project title" name="title" value="{{old('title')}}">
                    @if ($errors->has('title'))
                        <span>
                            <p>{{$errors->first("title")}}</p>
                        </span>
                    @endif
                    <label>Choose category</label>
                    <select name="category">
                        <option value="" disabled selected>Choose your product category</option>
                        <option value="T-shirt">T-shirt</option>
                        <option value="Casual Shirt">Casual Shirt</option>
                        <option value="Jursey">Jursey</option>
                        <option value="Formal Shirt">Formal Shirt</option>
                        <option value="Sweater">Sweater</option>
                        <option value="Jacket">Jacket</option>
                        <option value="Coat">Coat</option>
                        <option value="Jeans">Jeans</option>
                        <option value="Shocks">Shocks</option>
                        <option value="Shorts">Shorts</option>
                        <option value="Tracksuit">Tracksuit</option>
                        <option value="Vest">Vest</option>
                        <option value="Pajamas">Pajamas</option>
                        <option value="Suit">Suit</option>
                        <option value="Raincoat">Raincoat</option>
                        <option value="Ladies Dress">Ladies Dress</option>
                      </select>
                      @if ($errors->has('category'))
                        <span>
                            <p>{{$errors->first("category")}}</p>
                        </span>
                    @endif

                    <label>Tell us more about your project</label>
                    <textarea name="description" rows="5" placeholder="Describe your product including color codes, fabrics and design here..">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span>
                            <p>{{$errors->first("description")}}</p>
                        </span>
                    @endif
                    <label>Upload your design</label>
                    <input type="file" placeholder="Enter your profile picture" class="form-control form-control-l dropify" id="formFile" name="design" value="{{old('design')}}">
                    @if ($errors->has('design'))
                        <span>
                            <p>{{$errors->first("design")}}</p>
                        </span>
                    @endif

                    <label>Quantity in different sizes</label><br>
                    <input type="number" placeholder="M" name="m" value="{{old('m')}}">
                    <input type="number" placeholder="L" name="l" value="{{old('l')}}">
                    <input type="number" placeholder="XL" name="xl" value="{{old('xl')}}">
                    <input type="number" placeholder="XXL" name="xxl" value="{{old('xxl')}}">
                    <input type="number" placeholder="XXXL" name="xxxl" value="{{old('xxxl')}}">

                    @if ($errors->has('m') || $errors->has('l') || $errors->has('xl') || $errors->has('xxl') || $errors->has('xxxl'))
                        <span>
                            <p>{{$errors->first("m")}} {{$errors->first("l")}} {{$errors->first("xl")}} {{$errors->first("xxl")}} {{$errors->first("xxxl")}}</p>
                        </span>
                    @endif
                    <label>Price per unit</label>
                    <input type="text" placeholder="Price per unit you want to offer in number" name="price" value="{{old('price')}}">
                    @if ($errors->has('price'))
                        <span>
                            <p>{{$errors->first("price")}}</p>
                        </span>
                    @endif
                    
                    <label>Provide deadline for delivary</label>
                    <input type="date" placeholder="" name="expire_date" value="{{old('expire_date')}}">
                    @if ($errors->has('expire_date'))
                        <span>
                            <p>{{$errors->first("expire_date")}}</p>
                        </span>
                    @endif
                    
                    
                    <input type="submit" name="submit" value="Post">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>
    @endsection
    
</body>
</html>