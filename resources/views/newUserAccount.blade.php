<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <title>Login Form</title>
</head>
<body>
<style>
    body{
        background-color:rgba(241, 241, 241, 0.8);
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1" style="font-size:22px"></i> {{ session('user_id') ?? 'Guest' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><a class="dropdown-item" href="{{ url('/new_user') }}">Create New User</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex justify-content-center align-items-center bg-light" style="min-height: 500px; margin-bottom:0px;">

    <!-- Form Container -->
    <div class="bg-white p-5 rounded shadow-lg w-100" style="max-width: 400px;">
        <h2 class="text-center mb-4">Create New User</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf

            <!-- Username Field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" 
                       name="username" 
                       id="username" 
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username') }}"
                       placeholder="Enter a username"
                       required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Create User</button>
            
        </form>
        <button type="button" class="btn btn-secondary w-100 mt-2" onclick="window.location='/admin-dashboard'">Home</button>
    </div>

</div>

<!-- Bootstrap 5 JS with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
