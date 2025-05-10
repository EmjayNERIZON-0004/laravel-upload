@extends('layout.general_layout4')

<title>
@yield('title','Service')
</title>
@yield('navbar')
@show
@section('content')  
<style>
    .services-section {
      padding: 50px 0;
      background-color: #f8f9fa;
    }
    .service-card {
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }
    .service-card:hover {
      transform: translateY(-10px);
    }
    .service-icon {
      font-size: 40px;
      color: #3498db;
    }
    .service-title {
      font-size: 1.5rem;
      margin-top: 20px;
    }
    .service-description {
      font-size: 1rem;
      color: #555;
      margin-top: 10px;
    }
  </style>
  <!-- Services Offered Section -->
  <section class="services-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2>Our Services</h2>
        <p>We offer a wide range of high-quality services tailored to meet your needs. Here are some of the services we provide:</p>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Service 1: Web Development -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-laptop"></i>
              </div>
              <h5 class="service-title">Web Development</h5>
              <p class="service-description">Our expert web developers create modern, responsive, and user-friendly websites tailored to your business needs. Whether you're launching a new site or need a redesign, we have you covered.</p>
            </div>
          </div>
        </div>

        <!-- Service 2: SEO Optimization -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-search"></i>
              </div>
              <h5 class="service-title">SEO Optimization</h5>
              <p class="service-description">Our SEO experts ensure that your website ranks high on search engines, driving organic traffic and increasing visibility. We use proven techniques to boost your online presence.</p>
            </div>
          </div>
        </div>

        <!-- Service 3: E-commerce Solutions -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-bag"></i>
              </div>
              <h5 class="service-title">E-commerce Solutions</h5>
              <p class="service-description">We provide end-to-end e-commerce solutions, including custom store design, secure payment systems, and optimized product catalogs. Let us help you turn your website into a sales powerhouse.</p>
            </div>
          </div>
        </div>

        <!-- Service 4: Social Media Marketing -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-share"></i>
              </div>
              <h5 class="service-title">Social Media Marketing</h5>
              <p class="service-description">Engage your audience and grow your brand with tailored social media campaigns. From Facebook to Instagram, we manage your social media platforms to boost your online presence and customer engagement.</p>
            </div>
          </div>
        </div>

        <!-- Service 5: Graphic Design -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-pencil"></i>
              </div>
              <h5 class="service-title">Graphic Design</h5>
              <p class="service-description">Our creative designers craft stunning visuals for your brand. From logos to brochures and digital ads, we ensure that your brand's identity is impactful and memorable.</p>
            </div>
          </div>
        </div>

        <!-- Service 6: Content Writing -->
        <div class="col">
          <div class="card service-card">
            <div class="card-body text-center">
              <div class="service-icon">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <h5 class="service-title">Content Writing</h5>
              <p class="service-description">Engaging and high-quality content is essential for SEO and customer retention. Our writers create blog posts, articles, and web copy that inform, entertain, and convert your audience.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@yield('footer')
@show