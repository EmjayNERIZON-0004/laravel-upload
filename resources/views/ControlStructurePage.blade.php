@extends('layout.general_layout')

<title>
    @yield('title', 'Control Structure')
</title>

@yield('navbar')
@section ('page_name', 'Control Structure')
@show
@show

@section('content')
<style>
/* Centering the container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;

           
        }

        /* Styling the card */
        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        
        }

        /* Card title */
        .card h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Styling the grade result */
        .grade {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .grade span {
            font-size: 24px;
            color: #28a745;
        }

        .invalid-grade {
            color: red;
            font-size: 16px;
        }

    </style>
    <br><br>
<div class="container">
    <div class="card">
        <h2>Grade Result</h2>
       @if(($grade != "Enter Your Grade") && ($grade >= 0 && $grade <=100))
      
       <p><i> My Grade: <b> </i> {{$grade}} </b></p>
  @endif


        @if($grade >= 97 && $grade <= 100)
            <p class="grade">Equivalent Grade: <span style="color:green">1.00</span></p>
        @elseif($grade >= 94 && $grade <= 96)
            <p class="grade">Equivalent Grade: <span style="color:green">1.25</span></p>
        @elseif($grade >= 91 && $grade <= 93)
            <p class="grade">Equivalent Grade: <span style="color:green">1.50</span></p>
        @elseif($grade >= 88 && $grade <= 90)
            <p class="grade">Equivalent Grade: <span style="color:green">1.75</span></p>
        @elseif($grade >= 85 && $grade <= 87)
            <p class="grade">Equivalent Grade: <span style="color:green">2.00</span></p>
        @elseif($grade >= 82 && $grade <= 84)
            <p class="grade">Equivalent Grade: <span style="color:orange">2.25</span></p>
        @elseif($grade >= 79 && $grade <= 81)
            <p class="grade">Equivalent Grade: <span style="color:orange">2.50</span></p>
        @elseif($grade >= 76 && $grade <= 79)
            <p class="grade">Equivalent Grade: <span style="color:orange">2.75</span></p>
        @elseif($grade == 75)
            <p class="grade">Equivalent Grade: <span style="color:orange">3.00</span></p>
        @elseif($grade >= 0 && $grade <= 74)
            <p class="grade">Equivalent Grade: <span style="color:red">5.00</span></p>
        @else
            @if($grade == "Enter Your Grade")
            <p class="invalid-grade"><b>  Please Input your Grade first. </b></p>

                @else
            <p class="invalid-grade"><b> Grade is INVALID.</b></p>
            @endif
        @endif
    </div>
</div>
<br><br>

<div class="container">
    <div class="card" style="text-align: left;font-size:30px;
        ">

        <h2 style="text-align: center;">Right Christmas Tree</h2>

                                                            @php
                                                            $row = 7;
                                                            @endphp
                                                         
                                                            @for($i=0;$i<=$row;$i++)
                                                        
                                                                
                                                                            @for($j=0; $j<=$i; $j++)  

                                                                                            <!-- //will print the last row only -->
                                                                                        @if($i == $row)
                                                                                            *
                                                                                                <!-- //will print last and first inside the j loop -->
                                                                                                @elseif($i==$j || $j==0) 
                                                                                                *
                                                                                                   <!-- will print the middle -->
                                                                                                    @else 
                                                                                                    -   
                                                                                         @endif
                                                                             @endfor
                                                                             <br>
                                                             @endfor

    </div>
</div>
<br><br>



<div class="container">
    <div class="card">
    <h2 class="text-center mb-4">Employee List</h2>

    <!-- Bootstrap Table -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emp as $employ)
            <tr>
                <td>{{$employ['name']}}</td>
                <td>{{$employ['age']}}</td>
                <td>{{$employ['address']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>






@endsection


@yield('footer')
@show