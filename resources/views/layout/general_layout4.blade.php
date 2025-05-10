<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>


@yield('navbar') 
<style>

body{

color:#444;
}
    /* Custom styling for navbar */
    .navbar-custom {
      background-color: #2c3e50;
      color: #ecf0f1;
    }
    .navbar-custom .navbar-nav .nav-link {
      color: #ecf0f1;
      font-weight: 500;
    }
    .navbar-custom .navbar-nav .nav-link:hover {
      color: #3498db;
    }
    .navbar-custom .navbar-brand {
      color: #ecf0f1;
      font-weight: 600;
    }
    .navbar-custom .navbar-toggler-icon {
      background-color: #ecf0f1;
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a style="margin-right: 50%;" class="navbar-brand" href="#">My Website Activity</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('profile')}}">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('service')}}">Our Services</a>
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

@show




@section('footer') 
<style>
    /* Custom styling for footer */
    .footer-custom {
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 10px 0;
      text-align: center;
    }
    .footer-custom a {
      color: #ecf0f1;
      text-decoration: none;
      margin: 0 10px;
    }
    .footer-custom a:hover {
      color: #3498db;
    }
  </style>
   <footer class="footer-custom">
    <p>&copy; 2025 MLJ Company. All Rights Reserved.</p>
    <p>
      <a href="#">Privacy Policy</a> | 
      <a href="#">Terms of Service</a> | 
      <a href="#">Contact</a>
    </p>
  </footer>
@show
</body>
</html>