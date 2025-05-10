

@extends('layout.general_layout4')

<title>
@yield('title','Dashboard')
</title>
@yield('navbar')
@show
@section('content')  


<style>
    
    .profile-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }
    .statistics {
      display: flex;
      gap: 20px;
    }
    .stat-card {
      width: 30%;
    }
    .recent-activity ul {
      list-style: none;
      padding-left: 0;
    }
    .recent-activity li {
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }
  </style>
  <!-- Content Area -->
  <div class="container my-5">
    <!-- Header -->
    <div class="d-flex justify-content-between mb-4">
      <h1>Welcome, Michelle Junio!</h1>
      <div>
        <button class="btn btn-primary">Edit Profile</button>
      </div>
    </div>

    <!-- Profile Section -->
    <div class="row">
      <div class="col-md-4 text-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQH5sFjZPx1Yzi1b9_FpQzrxqgsjv2DPAp81Q&s" alt="Profile" class="profile-img mb-3">
        <h3>Michelle Junio</h3>
        <p>BSIT Student</p>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile Information</h5>
            <p><strong>Name:</strong> Michelle Junio</p>
            <p><strong>Occupation:</strong> BSIT Student at PSU San Carlos </p>
            <p><strong>Email:</strong> mich1187@gmail.com</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistics Section -->
    <div class="statistics mt-5">
      <div class="stat-card card">
        <div class="card-body text-center">
          <h5 class="card-title">Projects</h5>
          <p class="h3">12</p>
        </div>
      </div>
      <div class="stat-card card">
        <div class="card-body text-center">
          <h5 class="card-title">Clients</h5>
          <p class="h3">8</p>
        </div>
      </div>
      <div class="stat-card card">
        <div class="card-body text-center">
          <h5 class="card-title">Messages</h5>
          <p class="h3">5</p>
        </div>
      </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="recent-activity mt-5">
      <h4>Recent Activity</h4>
      <ul>
        <li>Completed task "Build Portfolio Website" - Feb 10, 2025</li>
        <li>Started project "E-commerce Website" - Feb 9, 2025</li>
        <li>Received message from Sarah - Feb 8, 2025</li>
        <li>Completed task "Fix Bugs in Project" - Feb 5, 2025</li>
        <li>Updated portfolio - Feb 1, 2025</li>
      </ul>
    </div>

  </div>
@endsection



@yield('footer')
@show