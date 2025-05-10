@extends('layout.general_layout')
  <title>@yield('title', 'Dashboard')</title>
  
     @yield('navbar')
@section('page_name','Employee List')


     @show
     @section('content')
     <div class="container mt-2 ">
    <div class="card " style="height:395px">
        <div class="card-header bg-dark text-white ">
            <h4> List</h4>
        </div>
        <style>
           
        </style>
        <br>
        <a class="btn btn-primary btn-sm" style="width: 150px;" onclick="window.history.go(-1)">Back</a>

        <br>
        <div  class="card-body shadow-lg p-4 rounded" style="max-height: 350px; overflow-y: auto;">
            <table class="table table-bordered table-striped">
                <thead class="table-dark" >
                    <tr>
                        <th style="background-color:rgb(66, 66, 66);">Employee ID</th>
                        <th style="background-color:rgb(66, 66, 66);">Full Name</th>
                        <th style="background-color:rgb(66, 66, 66);">Complete Address</th>
                        <th style="background-color:rgb(66, 66, 66);">Contact No.</th>
                        <th style="background-color:rgb(66, 66, 66);">Actions</th>
                    </tr>
                </thead>
                <tbody >
               
<tr>
    <td style="color:#333;">{{ $employees->employee_Id }}</td>
    <td style="color:#333;">{{ $employees->fname }} {{ $employees->mname }} {{ $employees->lname }}</td>
    <td style="color:#333;">{{ $employees->address }}</td>
    <td style="color:#333;">{{ $employees->contact }}</td>
    <td >
        <!-- Action Buttons -->
        <a href="{{ route('employees.index') }}" class="btn   btn-primary btn-sm">
            <i class="fas fa-eye"></i> Show All
        </a>
        
         
    </td>
</tr>
 

                </tbody>
            </table>
 


        </div>
    </div>
</div>
@endsection

@yield('footer')
@show