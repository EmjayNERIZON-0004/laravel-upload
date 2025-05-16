<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<style>
    body{
        background-color:rgba(241, 241, 241, 0.8);
    }
</style>
<!-- Navbar -->
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

<!-- Content -->
<div class="container my-5">
    <h2 class="mb-4">List of Users</h2>
    <a href="/new_user" class="btn btn-primary mb-3">Create New Users</a>
    <table class="table table-bordered ">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Default Password</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <tr>
                <td>{{ $user->useraccount_id }}</td>
                <td>{{ $user->username ?? '-' }}</td>
                <td>{{ $user->default_password ?? '-' }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
        
        <td>
    @if($user->status == "active")
        <span class="badge bg-success">Active</span>
    @else
        <span class="badge bg-secondary">Inactive</span>
    @endif
</td>
<td>
 <form action="{{ route('status', $user->id) }}" method="POST">
    @csrf 
    <button type="submit" class="btn btn-sm {{ $user->status === 'active' ? 'btn-danger' : 'btn-success' }}">
        {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
    </button>
</form>

</td>

            </tr>
            
        @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap 5 JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
