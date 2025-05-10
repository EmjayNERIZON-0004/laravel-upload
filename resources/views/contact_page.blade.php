@extends('layout.general_layout4')

<title>
@yield('title','Contact Us')
</title>
@yield('navbar')
@show

@section('content') 
<style>
    .contact-section {
      padding: 50px 0;
      background-color: #f8f9fa;
    }
    .contact-form {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .contact-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .social-media a {
      font-size: 24px;
      margin: 0 10px;
      color: #333;
      text-decoration: none;
    }
    .social-media a:hover {
      color: #3498db;
    }
    .map-container {
      margin-top: 30px;
      height: 400px;
      border-radius: 8px;
      overflow: hidden;
    }
  </style>
  <section class="contact-section">
    <div class="container">
      <div class="contact-header">
        <h2>Contact Us</h2>
        <p>We would love to hear from you! Please fill out the form below, and we will get back to you as soon as possible.</p>
      </div>
      
      <!-- Contact Form -->
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="contact-form">
            <form action="#" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Social Media Links -->
      <div class="text-center social-media">
        <p>Follow Us:</p>
        <a href="#" target="_blank" class="bi bi-facebook">Facebook</a>
        <a href="#" target="_blank" class="bi bi-twitter">Twitter</a>
        <a href="#" target="_blank" class="bi bi-instagram">Instagram</a>
      </div>

      <!-- Google Maps Embed -->
      <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.989536106614!2d-122.08385138468117!3d37.42199977982557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb2fd7b342fff%3A0x5c4c4d3e9c8c1a1d!2sGoogleplex!5e0!3m2!1sen!2sus!4v1630611764528!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      
    </div>
  </section>

@endsection
@yield('footer')
@show