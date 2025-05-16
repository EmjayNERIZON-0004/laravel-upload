@extends('layout.general_layout')
<title>@yield('title', 'Dashboard')</title>

@section('page_name', 'Employee List')

@show

@section('content')@yield('navbar')
<div class="container mt-2">
    <div class="card" style="height: 395px">
        <div class="card-header bg-dark text-white">
            <h4>List</h4>
        </div>
        <br>
        <a class="btn btn-primary btn-sm" style="width: 150px;" onclick="window.history.go(-1)">Back</a>
        <br>
        <div class="card-body shadow-lg p-4 rounded" style="max-height: 350px; overflow-y: auto;">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="background-color: rgb(66, 66, 66);">Employee ID</th>
                        <th style="background-color: rgb(66, 66, 66);">Full Name</th>
                        <th style="background-color: rgb(66, 66, 66);">Complete Address</th>
                        <th style="background-color: rgb(66, 66, 66);">Contact No.</th>
                        <th style="background-color: rgb(66, 66, 66);">Image</th>
                        <th style="background-color: rgb(66, 66, 66);">Status</th>
                        <th style="background-color: rgb(66, 66, 66);">Username</th>
                        <th style="background-color: rgb(66, 66, 66);">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $employees)
                    <tr>
                        <td style="color: #333;">{{ $employees->employee_Id }}</td>
                        <td style="color: #333;">{{ $employees->fname }} {{ $employee->mname }} {{ $employee->lname }}</td>
                        <td style="color: #333;">{{ $employees->address }}</td>
                        <td style="color: #333;">{{ $employees->contact }}</td>
                        <td>
                            @if($employees->image_path)
                                <img src="{{ asset('$employee->image_path) }}" alt="Employee Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </td>
                        <td style="color: #333;">{{ $employees->status }}</td>
                        <td style="color: #333;">{{ $employees->username }}</td>
                        <td>
                           
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@yield('footer')
@show