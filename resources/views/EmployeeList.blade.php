@extends('layout.general_layout')
  <title>@yield('title', 'Dashboard')</title>
  
     @yield('navbar')
@section('page_name','Employee List')


     @show
     @section('content')
     <div class="container mt-2 ">

  <!-- Bootstrap Modal for Success/Error Messages -->
  <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">

            <!-- Modal Header -->
            <div class="modal-header text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;
                background: #28a745">
                <h5 class="modal-title fw-bold">
                    @if(session('success'))  Success @elseif(session('error'))  Error @endif
                </h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-center p-4">
                @if(session('success'))
                    <i class="fas fa-check-circle fa-3x text-success mb-2"></i>
                    <p class="text-success fw-semibold fs-5">{{ session('success') }}</p>
                @elseif(session('error'))
                    <i class="fas fa-times-circle fa-3x text-danger mb-2"></i>
                    <p class="text-danger fw-semibold fs-5">{{ session('error') }}</p>
                @endif
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer justify-content-center">
                <small class="text-muted">Auto-closing in <span id="countdown" class="fw-bold">5</span> seconds...</small>
                <button type="button" class="btn btn-outline-dark btn-sm px-3" data-bs-dismiss="modal">Close Now</button>
            </div>
        </div>
    </div>
</div>


    <div class="card mb-5" >
        <div class="card-header bg-dark text-white ">
            <h4> List</h4>
        </div>
        
        <br>
        <a href="employees/create" class="btn btn-primary btn-sm" style="width: 150px;">Add Employee</a>
        
        <br>
        <div class="card-body shadow-lg p-4 rounded" style="max-height: 350px;min-height: 350px; overflow-y: auto;">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th style="background-color:rgb(66, 66, 66);">Employee ID</th>
                <th style="background-color:rgb(66, 66, 66);">Profile</th> <!-- New column for Image -->
                <th style="background-color:rgb(66, 66, 66);">Full Name</th>
                <th style="background-color:rgb(66, 66, 66);">Complete Address</th>
                <th style="background-color:rgb(66, 66, 66);">Contact No.</th>
                <th style="background-color:rgb(66, 66, 66);">Username</th>
                <th style="background-color:rgb(66, 66, 66);">Status</th>
                <th style="background-color:rgb(66, 66, 66);width:180px">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td style="color:#333;">{{ $employee->employee_Id }}</td>
            <td style="text-align:center; color:#333;">
                @if($employee->image_path)
                    <img src="{{ asset('/images/' . $employee->image_path) }}" alt="Employee Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 2px; border: 2px solid #ddd;">
                @else
                    <span>No Image</span>
                @endif
            </td>
            <td style="color:#333;">{{ $employee->fname }} {{ $employee->mname }} {{ $employee->lname }}</td>
            <td style="color:#333;">{{ $employee->address }}</td>
            <td style="color:#333;">{{ $employee->contact }}</td>
            <td style="color:#333;">{{ $employee->username }}</td>
            <td style="color:#333;">{{ $employee->status }}</td>
            <td style="width:100px">
                <!-- Action Buttons -->
                <a href="/employees/{{$employee->id}}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this employee?')">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
    {{$employees->links()}}
</div>

    </div>
</div>


<!-- JavaScript to Auto-Show and Close Modal -->
@if(session('success') || session('error'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var messageModal = new bootstrap.Modal(document.getElementById("messageModal"));
        var countdownElement = document.getElementById("countdown");
        var timeLeft = 5; // Countdown duration in seconds

        messageModal.show();

        var countdown = setInterval(function() {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(countdown);
                messageModal.hide(); // Auto-close modal
            }
        }, 1000);
    });
</script>
@endif
@endsection

@yield('footer')
@show