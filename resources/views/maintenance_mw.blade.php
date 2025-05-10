<!-- resources/views/errors/maintenance.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Under Maintenance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            color: #2c3e50;
        }
        p {
            color: #7f8c8d;
            font-size: 1.2rem;
            margin-top: 10px;
        }
        svg {
            max-width: 400px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<img src="{{ asset('undraw_logistics_xpdj.svg') }}" alt="Maintenance Image" width="300">


    <!-- Message -->
    <h1>Sorry, the page is under maintenance</h1>
    <p>We're currently doing some work. Please check back later!</p>

</body>
</html>
