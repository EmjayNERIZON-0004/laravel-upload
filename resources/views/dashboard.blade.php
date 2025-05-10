@extends('layout.general_layout')
  <title>@yield('title', 'Dashboard')</title>
  
     @yield('navbar')
@section('page_name','Dashboard')


     @show

@section('content')
    <div class="container mt-4">
        <!-- Dashboard Section -->
        <div class="card p-4 shadow-lg">
            <h2 style="  color:rgb(65, 65, 65);">Top Performing Developer</h2>
              </div>
              <div class="container mt-4">
           <div class="card p-4 shadow-lg">
         
 <p style="text-align: left;font-size:40px; color:rgb(65, 65, 65);"> Ichiraku Ramen</p>
       <br><br>
 <div class="block">
 <div class="leftBlock">
 <img src="{{asset('img/image3.png')}}" alt="hello" style="border-radius:50%;height:200px;width:210px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
 </div>
 <style>
    .divvy{
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 20px;
      color:rgb(65, 65, 65);
    }
    .leftBlock{
        float: left;
        width: 50%;
    }
    .rightBlock{
        float: right;
        width: 50%;
    }
   
 </style>
 <div class="rightBlock">
 <div class="divvy">Hello! I'm a web developer specializing in PHP, JavaScript, and MySQL.</div>
        <div class="divvy">I have experience in full-stack development, database management, and creating dynamic web applications.</div>
        <br>
    <a href="{{route('route_profile')}}"  class="btn btn-primary" > View Profile</a>

    </div>
             
          </div>
        
   <div class="row mt-4">
   <div class="col-md-4">
    <div class="card text-center p-1">
        <h4 style="color:rgb(65, 65, 65);">Rating</h4>
        <p>4.9 / 5.0</p>
    </div></div>  
    
    <div class="col-md-4">
    <div class="card text-center p-1">
        <h4 style="color:rgb(65, 65, 65);">Projects Finished</h4>
        <p>9/10</p>
    </div></div>  
    
    <div class="col-md-4">
    <div class="card text-center p-1">
        <h4 style="color:rgb(65, 65, 65);">Team Performance</h4>
        <p>95%</p>
    </div></div>

   </div>     
        
        
        
        </div>
         
    </div>
</div>
@endsection



@yield('footer')
@show
 

