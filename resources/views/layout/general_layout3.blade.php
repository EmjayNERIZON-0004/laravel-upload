<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


@yield('navbar')
<style>

  body{

    color:#444;
  }
    /* Custom Styling */
    .navbar-custom {
    background-color: #333; /* Dark Gray for the navbar background */
    border-radius: 0 0 20px 20px;
}

.navbar-custom .navbar-nav .nav-link {
    color: #fff !important; /* White text for the links */
    font-size: 18px;
    transition: color 0.3s ease;
}

 

.navbar-custom .navbar-toggler-icon {
    background-color: #fff; /* White color for the toggler icon */
}

.navbar-custom .dropdown-menu {
    background-color: #444; /* Darker gray for the dropdown background */
    border-radius: 10px;
}

.navbar-custom .dropdown-item {
    color: #fff !important; /* White text for dropdown items */
    transition: background-color 0.3s ease;
}

.navbar-custom .dropdown-item:hover {
    background-color: #555 !important; /* Slightly lighter gray on hover */
}

/* Custom Logo */
.navbar-brand img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: white;
}

.navbar-custom .search-bar {
    position: relative;
    width: 200px;
}

.navbar-custom .search-bar input {
    width: 100%;
    padding: 8px;
    border-radius: 20px;
    border: none;
    margin-right: 10px;
}
.nav-item:hover{
    background-color :#555;
  
    border-radius: 5px;
}
.navbar-custom .search-bar button {
    background-color: #555; /* Gray for the search button */
    color: #fff;
    border-radius: 50%;
    border: none;
    padding: 10px 15px;
}

  </style>
   <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">  
    
    <a style="margin-right: 30%;font-size:30px;font-weight:600"  class="navbar-brand" href="#">CRYSTAL LIM ACTIVITY</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('dashboard')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('service')}}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('profile')}}">Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              More
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">FAQ</a></li>
              <li><a class="dropdown-item" href="#">Contact</a></li>
              <li><a class="dropdown-item" href="#">Privacy Policy</a></li>
            </ul>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>

  <!-- Optional: Bootstrap JS (for dropdown and toggle functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@show
    

@yield('content')

@show




@section('footer')
<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>This activity on Laravel is the way to passed the subject.</p>
        </div>
        <!-- Links Section -->
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="{{route('dashboard')}}" class="text-white">Home</a></li>
            <li><a href="{{route('profile')}}" class="text-white">Profile</a></li>
            <li><a href="{{route('service')}}" class="text-white">Services</a></li>
            <li><a href="{{route('contact')}}" class="text-white">Contact</a></li>
          </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-4">
          <h5>Contact</h5>
          <p>Email: crystallim@example.com</p>
          <p>Phone: +1 (555) 123-4567</p>
        </div>
      </div>
      <div class="text-center mt-4">
        <p>&copy; 2025 . All Rights Reserved.</p>
      </div>
    </div>
  </footer>
@show
</body>
</html>