@extends('layout.general_layout')
 
    <title>@yield('title','Contact Us') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

@yield('navbar')
@section('page_name','Contact Us')
@show


@section ('content')
    

    <div class="container mt-4">
    <div class="contact-card">
        <h2 style="color:rgb(65, 65, 65);">Contact Us</h2>
        
        <form class="contact-form" action="submit_form.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <div class="map-container">
            <h3 style="color:rgb(65, 65, 65);">Our Location</h3>
            <!-- Embed Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.279908235!2d-74.25986607872836!3d40.697670063040974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1902d63f91%3A0x3d1182b6cfba3f2!2sNew%20York%2C%20NY%2010001!5e0!3m2!1sen!2sus!4v1676499128398!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <style>
                .contact-card {
            background-color: white;
            border-radius: 10px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .contact-card h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .contact-form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        .map-container {
            margin-top: 20px;
            text-align: center;
        }

        .map-container iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }

        .contact-details {
            margin-top: 20px;
            text-align: center;
        }

        .contact-details p {
            margin: 5px 0;
            color: #333;
        }
    </style>
        </style>
        <div class="contact-details">
            <h3 style="color:rgb(65, 65, 65);">Contact Info</h3>
            <p style="color:rgb(65, 65, 65);"><strong>Phone:</strong> (123) 456-7890</p>
            <p style="color:rgb(65, 65, 65);"><strong>Email:</strong> xyzgroup@company.com</p>
            <p style="color:rgb(65, 65, 65);"><strong>Address:</strong> Rizal Blvd. New York City, USA</p>
        </div>
    </div>
    </div>
    @endsection

    @yield('footer')
    @show
 