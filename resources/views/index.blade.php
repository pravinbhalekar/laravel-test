<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        @stack('css')
        <style>
            body{
                font-family: 'Montserrat', sans-serif;   
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/')}}">Laravel Test</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="{{Route::currentRouteName()=='user' ? 'active' : ''}}"><a href="{{url('/')}}">View User</a></li>
                    <li class="{{Route::currentRouteName()=='add-user' ? 'active' : ''}}"><a href="{{route('add-user')}}">Add User</a></li> 
                </ul>
            </div>
        </nav>

        @yield('content')
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    {{-- BASE URL DEFINE FOR AJAX CALL --}}
    <script> var App_Base_Url   = "{{url('/')}}";</script>
    @stack('js')
</html>
