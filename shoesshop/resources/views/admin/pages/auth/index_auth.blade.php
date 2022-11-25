<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOES ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{asset('/backend/images\favicon.png')}}"> --}}
    <!-- App css -->
    <link href="{{asset('/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/backend/css/icons.min.css')}}"rel="stylesheet" type="text/css">
    <link href="{{asset('/backend/css/app.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
@yield('content')
    <footer class="footer footer-alt">
      
    </footer>
    <script src="{{asset('/backend/js/vendor.min.js')}}"></script>
	<script src="{{asset('/backend/js/app.min.js')}}"></script>
</body>

</html>
