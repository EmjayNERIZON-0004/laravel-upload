
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
    <title>Login Form</title>
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
      <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
</head>
<body>
    
<div class="d-flex justify-content-center align-items-center bg-light" style="min-height: 600px; margin-bottom:0px;">

    <!-- Login Form Container -->
    <div class="bg-white p-5 rounded shadow-lg w-100" style="max-width: 400px;">

        <!-- Display Errors at the Top of the Form -->
   

        <form action="{{ route('login-submit') }}" method="POST">
            @csrf

            <!-- Title -->
            <h2 class="text-center mb-4">Login to Laravel 12</h2>

            <!-- Username Field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

</div>

</body>
</html>
