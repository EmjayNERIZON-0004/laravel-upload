<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
    <title>@yield('title')</title>
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
      <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
</head>

<body>

@section('navbar')
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Welcome to @yield('page_name')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{route('route_dashboard')}}">Home</a></li>
               
            <li class="nav-item"><a class="nav-link" href="{{route('route_service')}}">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('route_contact')}}">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('route_profile')}}">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('route_control')}}"> Control Structure</a></li>
          
            <li class="nav-item"><a class="nav-link" href="{{url('employees')}}"> Employee</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('logs')}}"> Logs History</a></li>
           
        </ul>
        </div>
    </div>
    <style>
        .nav-item:hover{
            background-color:rgb(62, 62, 62);
        border-radius: 5px;
        }
    </style>
</nav>
@show


@yield('content')


    
@section('footer')
    <div class="bg-dark text-white text-center py-2">
       <p>&copy; 2025 XYZ Group of Companies Inc.</p>
         <div class="container " >
            
            <div>
                <a href="#" class="text-white text-decoration-none mx-2">Privacy Policy</a> |
                <a href="#" class="text-white text-decoration-none mx-2">Terms of Service</a> |
                <a href="#" class="text-white text-decoration-none mx-2">Contact Us</a>
            </div>
        </div>
    </div>
    @show


    


</body>
</html>