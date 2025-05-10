
@extends('layout.general_layout')
<title>
@yield('title','Employee')
</title>
@yield('narbar')
@show
@section('content')
@if($grade == 100)
<p>HELLO WORLD</p>

@endif

<!-- <p>{{$employee['name']}}</p> -->


@foreach ($client as $cli)

		<p> Client Name: {{ $cli['name'] }} </p> 
       <p> Address:  {{$cli['address']}}</p> 

	@endforeach



@endsection
 






