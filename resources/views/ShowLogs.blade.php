@extends ('layout.general_layout')
   <title>@yield('title', 'Profile Page')</title>
   
@yield('navbar')
@section('page_name','Profile')
@show
@section ('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
 
<div class="container">
<h1 style="margin-top:10px;">CRUD Logs Only for today: <span id="current-date"></span></h1>
<br>
<script>
    // Get the current date
    const today = new Date();
    const dateString = today.toLocaleDateString();  // Format it as MM/DD/YYYY or your locale's format

    // Insert the current date into the HTML
    document.getElementById("current-date").textContent = dateString;
</script>
    @if(count($logs) > 0)
        <table>
            <thead>
                <tr>
                    <th>Log Entry</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No logs found.</p>
    @endif
</div>
<br><br><br><br><br><br><br><br><br>
@endsection
@yield('footer')
@show
 