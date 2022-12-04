<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/site.css"> --}}
    <link rel="stylesheet" href="/css/homeNav.css">
    <title></title>
</head>
<body>
    @include('inc.homeNav')
    <div>
        @yield('content')
    </div>
    <div>
        <hr>
        <center>
            All right preserved to this page.
        </center>
        
    </div>
    <script src="/js/main.js"></script>
</body>
</html>