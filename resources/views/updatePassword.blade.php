 
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
<div class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="bg-white p-5 rounded shadow-lg w-100" style="max-width: 400px;">
        <h3 class="text-center mb-4">Update Password</h3>

        <!-- Display Success or Error Flash Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('password.update.submit') }}" method="POST">
            @csrf

            <!-- New Password -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input id="new_password" name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" required>
                @error('new_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success w-100">Update Password</button>
        </form>
    </div>

</div> 
</body>
</html>