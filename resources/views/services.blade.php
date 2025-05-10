@extends('layout.general_layout')
   <title>@yield('title', 'Services')</title>
 
     
@yield('navbar')
@section('page_name','Services')

@show

@section ('content')
    <div class="container mt-4">
        <h2 style="color:rgb(65, 65, 65);">Our Services</h2>
        <p>Explore the range of services we offer to help you succeed.</p>
        <ul class="list-group">
            <li class="list-group-item">Web Development</li>
            <li class="list-group-item">Portfolio Design</li>
            <li class="list-group-item">SEO Optimization</li>
            <li class="list-group-item">E-commerce Solutions</li>
            <li class="list-group-item">Custom Web Applications</li>
        </ul>
<br>
<style>
    .list-group-item{
        margin-top: 10px;
    }
    .list-group-item:hover{
        background-color:rgb(87, 87, 87);
        color: white;
    }
</style>
        <div class="card p-4 shadow-lg">    
            <h4 style="color:rgb(65, 65, 65);">Team Production</h4>
     <div>
     <div class="leftBlock">
       <img src="{{asset('img/image1.png')}}" alt="hello" style="border-radius:50%;height:200px;width:210px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
        <p style="color:rgb(65, 65, 65);text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:20px">Front End Developer</p>
   
   
       
        <img src="{{asset('img/image.png')}}" alt="hello" style="border-radius:50%;height:200px;width:210px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
        <p style="color:rgb(65, 65, 65);text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:20px">Back End Engineer</p>
      
        <img src="{{asset('img/image2.png')}}" alt="hello" style="border-radius:50%;height:200px;width:210px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
        <p style="color:rgb(65, 65, 65);text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:20px">Data Analyst</p>
        
        <img src="{{asset('img/image3.png')}}" alt="hello" style="border-radius:50%;height:200px;width:210px; box-shadow:0px 0px 3px 2px;display:block;margin: 0 auto">
        <p style="color:rgb(65, 65, 65);text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:20px">Project Leader</p>
        
        </div>

        <div class="rightBlock">
 
        <div class="profile-card">
         <div class="content">
            <h2 style="color:rgb(65, 65, 65);">Minato Namikazee</h2>
            <p><b>Front End Developer</b> | Tech Enthusiast | Problem Solver</p>
            <p>Passionate about creating innovative and user-friendly websites. Always exploring new technologies to improve my skills.</p>
            <a href="{{route('route_profile')}}"  class="btn btn-primary" > View Profile</a>

            
        </div>
    </div>
    <br> 
    <div class="profile-card">
         <div class="content">
            <h2 style="color:rgb(65, 65, 65);">Senju Hashirama</h2>
            <p><b>Back End Engineer</b>| Tech Enthusiast | Problem Solver</p>
            <p>Passionate about creating innovative and user-friendly websites. Always exploring new technologies to improve my skills.</p>
            <a href="{{route('route_profile')}}"  class="btn btn-primary" > View Profile</a>

            
        </div>
    </div>
    <br> 
    <div class="profile-card">
         <div class="content">
            <h2 style="color:rgb(65, 65, 65);">Hatake Kakashi</h2>
            <p><b>Data Analyst</b> | Tech Enthusiast | Problem Solver</p>
            <p>Passionate about creating innovative and user-friendly websites. Always exploring new technologies to improve my skills.</p>
            <a href="{{route('route_profile')}}"  class="btn btn-primary" > View Profile</a>

            
        </div>
    </div>
    <br> 
    <div class="profile-card">
         <div class="content">
            <h2 style="color:rgb(65, 65, 65);">Ichiraku Ramen</h2>
            <p><b>Project Leader</b> | Tech Enthusiast | Problem Solver</p>
            <p>Passionate about creating innovative and user-friendly websites. Always exploring new technologies to improve my skills.</p>

            <a href="{{route('route_profile')}}"  class="btn btn-primary" > View Profile</a>

        </div>
    </div>


        </div>
        </div>

        <style>
            .leftBlock{
                float:left;
                width: 50%;


            }  .rightBlock{
                float:right;
                
                width: 50%;
            }
            .profile-card {
            background-color: white;
            border-radius: 10px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
           
        }

        .profile-card img {
            width: 100%;
            height: 200px;
            object-fit: cover   ;
        }

        .profile-card .content {
            padding: 20px;
        }

        .profile-card h2 {
            margin: 10px 0;
            color: #333;
            font-size: 24px;
        }

        .profile-card p {
            color: #666;
            font-size: 16px;
            margin: 10px 0;
        }
        </style>
        </div>
    </div>
@endsection

    @yield('footer')
    @show
 