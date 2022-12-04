
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/buyerNav.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="stylesheet" href="/css/posts.css">


    <title></title>
</head>
<body>
    @include('inc.buyerNav')
    <div>
        @yield('content')
    </div>
    <footer>
        {{-- <hr>
        <center>
            All right preserved to this page.
        </center> --}}
        
    </footer>
    <script src="/js/main.js"></script>
    
</body>
</html>