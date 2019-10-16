<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-learning</title>


    <title>home</title>
<link href="{{asset('tawfik/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('tawfik/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tawfik/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('tawfik/css/agency.css')}}" rel="stylesheet">

    <link href="{{asset('tawfik/bootstrap3/css/bootstrap.css')}}" rel="stylesheet" />
 
  
  </head>



  <body id="page-top">
    @include('share.navigation')
  

   <!--content-->
   
   
      @yield('content')

   <!--content end-->

     @include('share.footer')


    <script src="{{asset('tawfik/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tawfik/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('tawfik/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('tawfik/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('tawfik/js/contact_me.js')}}"></script>
    <script src="{{asset('tawfik/js/agency.min.js')}}"></script>

    <script src="{{url('js/ajax.js')}}"></script>



  </body>

</html>

    