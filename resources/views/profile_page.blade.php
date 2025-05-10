

@extends('layout.general_layout4')

<title>
@yield('title','Profile')
</title>
@yield('navbar')
@show
@section('content')
  
  <style>
     body {
     
      background-color: #f5f5f5;
    }

    .profile-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .profile-sidebar {
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      border-radius: 10px;
      width: 250px;
    }

    .profile-sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 10px 0;
      font-size: 16px;
    }

    .profile-sidebar a:hover {
      background-color: #3498db;
      padding-left: 10px;
      border-radius: 5px;
    }

    .profile-content {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      width: 600px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }

    .profile-info p {
      font-size: 18px;
      margin: 10px 0;
    }

    .btn-edit {
      width: 100%;
      background-color: #3498db;
      color: white;
      border: none;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .btn-edit:hover {
      background-color: #2980b9;
    }
  </style>
   
  <div class="container mt-5">
    <div class="profile-container">

      <!-- Sidebar -->
      <div class="profile-sidebar">
        <h4 class="text-center">Profile Menu</h4>
        <a href="#">View Profile</a>
        <a href="#">Edit Profile</a>
        <a href="#">Change Password</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
      </div>

      <!-- Profile Content -->
      <div class="profile-content">
        <div class="profile-header">
          <img src="https://img.freepik.com/premium-vector/avatar-profile-icon-flat-style-female-user-profile-vector-illustration-isolated-background-women-profile-sign-business-concept_157943-38866.jpg?semt=ais_hybrid" alt="Profile Image" class="profile-img">
          <h3>Michelle Junio</h3>
          <p class="text-muted">Front End Developer</p>
        </div>

        <div class="profile-info">
          <p><strong>Full Name:</strong> Junio, Michelle L.</p>
          <p><strong>Email:</strong> mich1187@gmail.com</p>
          <p><strong>Location:</strong> Basista, Pangasinan</p>
          <p><strong>Phone:</strong> (123) 456-7890</p>
          <p><strong>Joined:</strong> January 15, 2025</p>
        </div>

        <div class="text-center">
          <button class="btn-edit">Edit Profile</button>
        </div>
      </div>

    </div>
  </div>
  <br><br>
@endsection

@yield('footer')

@show