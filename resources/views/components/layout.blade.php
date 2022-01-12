<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
</head>

<body>
    <x-nav />
    <x-hero />

    <!-- Page content-->
    <div class="container">
        <div class="row">
            {{$slot}}
            <x-right-side-widgets />
        </div>
    </div>
    <!-- Footer-->
    <x-footer />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>