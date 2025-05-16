    @extends('layout.general_layout')
    @yield('navbar')
    @section('page_name', 'Edit Employee')

    @show
    @section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <h2 class="mb-4 text-center text-primary">Edit Employee</h2>

                    <!-- Hidden Button to Trigger Modal -->
                    <button type="button" class="btn btn-danger d-none" id="errorModalBtn" data-bs-toggle="modal" data-bs-target="#errorModal"></button>

                    <!-- Bootstrap Modal for Validation Errors -->
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="errorModalLabel">Validation Errors</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="text-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Edit Form -->
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="employee_Id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control @error('employee_Id') is-invalid @enderror" id="employee_Id" name="employee_Id" value="{{ old('employee_Id', $employee->employee_Id) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" 
                                value="{{ old('fname') !== null ? old('fname') : $employee->fname }}">
                        </div>

                        <div class="mb-3">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" class="form-control @error('mname') is-invalid @enderror" id="mname" name="mname" 
                                value="{{ old('mname') !== null ? old('mname') : $employee->mname }}">
                        </div>

                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" 
                                value="{{ old('lname') !== null ? old('lname') : $employee->lname }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Complete Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') !== null ? old('address') : $employee->address }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact No</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" 
                                value="{{ old('contact') !== null ? old('contact') : $employee->contact }}">
                        </div>

                        <!-- Image Upload Section with Current and New Image Display -->
                      <div class="mb-3">
    <label for="image" class="form-label">Upload New Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(event)">
    
    <div class="mt-3">
        <label>Image Preview:</label>
        <div class="d-flex align-items-center">
            <img id="imagePreview" src="{{ $employee->image_path ? asset('/images/' . $employee->image_path) : '#' }}" alt="Employee Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
        </div>
    </div>
</div>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                            <a href="{{ url('employees') }}" class="btn btn-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Show Modal If Errors Exist -->
    @if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("errorModalBtn").click();
        });
    </script>
    @endif

    <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result; // Update the src to the new image
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


    @endsection
