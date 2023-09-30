<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}"/>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>PHPJabbers.com | Free Online Store Website Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('osw/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Additional CSS Files -->
  {{--
  <link rel="stylesheet" href="{{asset('osw/assets/css/fontawesome.css')}}">
  --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="{{asset('osw/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('osw/assets/css/owl.css')}}">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
  <div class="jumper">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html"><h2>Online Store <em>Website</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="about-us.html">About Us</a>
              <a class="dropdown-item" href="blog.html">Blog</a>
              <a class="dropdown-item active" href="testimonials.html">Testimonials</a>
              <a class="dropdown-item" href="terms.html">Terms</a>
            </div>
          </li>

          <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout</a></li>

          <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Page Content -->
<div class="page-heading about-heading header-text" style="background-image: url({{asset('osw/assets/images/heading-3-1920x500.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Dolore doloribus sint</h4>
          <h2>Testimonials</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="services section-background">
  <div class="container">
    <div class="row">
      @foreach($communities as $c)
      <div class="col-md-4">
        <div class="service-item">
          <div class="icon">
            {{--<img  style="height: 140px; width: 200px;" src="{{asset('assets/images/blog-01.jpg')}}">--}}
            <i class="fa-solid fa-people-group"></i>
          </div>
          <div class="down-content">
            <h4>{{$c->name}}</h4>
            <p class="n-m"><em>{{$c->description}}</em></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-content">
          <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="{{asset('osw/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('osw/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- Additional Scripts -->
<script src="{{asset('osw/assets/js/custom.js')}}"></script>
<script src="{{asset('osw/assets/js/owl.js')}}"></script>
</body>

</html>
