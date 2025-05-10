<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


</head>
<body>

@section ('navbar')
<style>
  body{
    color:#3f3f3f;
  }
        .navbar-custom {
            background-color:rgb(0, 46, 92); /* Change this to any color you like */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: white; /* White text color */
        }
        .navbar-custom .navbar-nav .nav-link:hover {
         
            background-color:rgb(133, 133, 133);
            border-radius: 5px;
        }
       
    </style>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a style="margin-right: 50%;" class="navbar-brand" href="#">MY ACTIVITY ELEC 2</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('service')}}">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@show
    




@yield('content')


@section('footer')
<style>
        /* Footer Styles */
        .footer {
            background-color: #343a40; /* Dark background */
            color: white;
            padding: 5px  ;
        }
        .footer a {
            color: #FFD700; /* Gold links */
        }
        .footer a:hover {
            color: #fff; /* White text on hover */
            text-decoration: underline;
        }
        .footer .social-icons a {
            color: #FFD700;
            margin: 0 10px;
            font-size: 1.5em;
        }
        .footer .social-icons a:hover {
            color: #fff;
        }
    </style>
<br><br>
<footer class="footer" >
  <div class="container ">
   
 
      <div class="col-12 text-center">
        <p>&copy; 2025 Kimberly Jimenez Company. All Rights Reserved.</p>
      </div>
     
  </div>
</footer>

@show



</body>
</html>