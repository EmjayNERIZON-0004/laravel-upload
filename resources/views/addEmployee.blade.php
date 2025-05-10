@extends ('layout.general_layout')

<title>@yield('title','Add Employee Form')</title>
@yield('navbar')

@section('page_name','Adding Employee')
@show

@section('content')
<div class="container mt-5">
    <style>
        body { background-color: #eef2f7; font-family: 'Poppins', sans-serif; }
        .card { border-radius: 12px; border: none; background: #ffffff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); padding: 20px; }
        h2 { color: #1e3a8a; font-weight: 700; text-align: center; margin-bottom: 20px; }
        label { font-weight: 300; color: #374151; font-size: 14px; }
        .form-control { border-radius: 6px; border: 1px solid #94a3b8; padding: 5px; font-size: 14px; background-color: white;   }
        .btn-primary { border-radius: 6px; background-color: #2563eb; border: none; font-weight: normal; padding: 5px 10px; }
        .btn-primary:hover { background-color: #1e40af; }
        .btn-secondary { border-radius: 6px; background-color: #64748b; color: white; padding: 5px 10px;}
        .btn-secondary:hover { background-color: #475569; }
        .error-message { font-size: 13px; color: #dc2626; margin-top: 5px; }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-6">
            
        <div class="card">
             <div class="card-header text-center text-white mb-3" style="background-color: #1e3a8a;">
        <h2 class="mb-0" style="color: white;">Employee Registration</h2>
    </div>
   
                @if ($errors->any())
                    <!-- Error Modal -->
                     
                    
                    <!-- Auto-close modal after 5 seconds -->
                    <script>
                        setTimeout(function() { 
                            var errorModal = document.getElementById('errorModal');
                            if (errorModal) {
                                errorModal.style.display = 'none';
                            }
                        }, 5000);
                    </script>
                @endif
<?php 

use App\Models\employee;
use Illuminate\Support\Carbon;
$year = Carbon::now()->format('y');
$currentYear = Carbon::now()->year;
$empCount = (employee::whereYear('created_at', $currentYear)->count())  +1  ;

$empId = "E-" . $year . "-" . $empCount;
?>
                <form action="/employees" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Employee ID</label>
                        <input type="text" name="employee_Id" class="form-control" value="{{ $empId }}" readonly>
                 
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ old('fname') }}">
                            @error('fname') <span class="error-message">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <input type="text" name="mname" class="form-control" value="{{ old('mname') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                            @error('lname') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Contact Number</label>
                        <input type="tel" name="contact" class="form-control" value="{{ old('contact') }}">
                        @error('contact') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email') <span class="error-message">{{ $email }}</span> @enderror
                    </div>
                     
    <!-- Other form fields -->
    <div class="mb-3">
    <label for="image" class="form-label" style="font-weight: 500; color: #374151;">Upload Image:</label>
    
    <input type="file" name="image" id="imageInput" class="form-control" accept="image/*" onchange="previewImage(event)" style="padding: 6px; font-size: 14px;">

    <div class="mt-3 text-center">
        <img id="imagePreview" src="#" alt="Image Preview" style="
            display: none;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px dashed #94a3b8;
            border-radius: 12px;
            padding: 4px;
            background-color: #f9fafb;
        ">
    </div>
</div>

    <script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

                    <div class="text-center mt-4">
                        <a href="{{ url('/EmployeeList') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






  

</div>
@endsection
