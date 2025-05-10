@extends ('layout.general_layout')
   <title>@yield('title', 'Profile Page')</title>
   
@yield('navbar')
@section('page_name','Profile')
@show
@section ('content')
    <div class="container mt-4">
           <div class="card p-4 shadow-lg">
         
 <h2 style="text-align: center;"> Ichiraku Ramen</h2>
           <img src="{{asset('img/image.png')}}" alt="hello" style="border-radius:50%;height:300px;width:310px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
           <!-- <br> -->
           <!-- <a href="{{route('route_contact')}}" style="margin-left:400px;margin-right:400px;" class="btn btn-primary" > Contact </a> -->

     
           <!-- <br> -->
         
         
           <br>
 <br>
 <style>
    .divvy{
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 20px;
        color:rgb(47, 47, 47);
    }
 </style>
 <div class="divvy">Hello! I'm a web developer specializing in PHP, JavaScript, and MySQL.</div>
        <div class="divvy">I have experience in full-stack development, database management, and creating dynamic web applications.</div>
 
             
          </div></div>

@endsection
    @yield('footer')
@show
 