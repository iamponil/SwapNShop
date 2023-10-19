<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Detail</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href=" {{ asset('images/icons/favicon.png') }}"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<header class="header-v4">
  <!-- Header desktop -->
  <div class="container-menu-desktop">
    <!-- Topbar -->
    <div class="top-bar">
      <div class="content-topbar flex-sb-m h-full container">
        <div class="left-top-bar">
          Free shipping for standard order over $100
        </div>

        <div class="right-top-bar flex-w h-full">
          <a href="#" class="flex-c-m trans-04 p-lr-25">
            Help & FAQs
          </a>

          <a href="#" class="flex-c-m trans-04 p-lr-25">
            My Account
          </a>

          <a href="#" class="flex-c-m trans-04 p-lr-25">
            EN
          </a>

          <a href="#" class="flex-c-m trans-04 p-lr-25">
            USD
          </a>
        </div>
      </div>
    </div>

    <div class="wrap-menu-desktop how-shadow1">
      <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
        <a href="#" class="logo">
          <img src="{{asset('images/icons/logo-01.png')}}" alt="IMG-LOGO">
        </a>

        <!-- Menu desktop -->

        <div class="menu-desktop">
          <ul class="main-menu">
            <li class="active-menu">
              <a href="{{ route('index') }}">Home</a>
              <ul class="sub-menu">
                <li><a href="{{ route('index') }}">Homepage 1</a></li>
                <li><a href="home-02.html">Homepage 2</a></li>
                <li><a href="home-03.html">Homepage 3</a></li>
              </ul>
            </li>

            <li>
              <a href="{{ route('shop') }}">Shop</a>
            </li>

            <li class="label1" data-label1="hot">

              <a href="{{ route('cart') }}">Features</a>
            </li>

            <li>

              <a href="{{ route('blog') }}">Blog</a>
            </li>

            <li>
              <a href="{{ route('about') }}">About</a>
            </li>
            <li>
              <a href="{{ route('reclamtion') }}">Reclamation</a>
            </li>
            <li>
              <a href="{{ route('create') }}">Add product</a>
            </li>
          </ul>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
          </div>

          <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
               data-notify="2">
            <i class="zmdi zmdi-shopping-cart"></i>
          </div>

          <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
            <i class="zmdi zmdi-favorite-outline"></i>
          </a>
        </div>
      </nav>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
      <a href="index.html"><img src="{{asset('images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
        <i class="zmdi zmdi-search"></i>
      </div>

      <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
        <i class="zmdi zmdi-shopping-cart"></i>
      </div>

      <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
         data-notify="0">
        <i class="zmdi zmdi-favorite-outline"></i>
      </a>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
    </div>
  </div>


  <!-- Menu Mobile -->
  <div class="menu-mobile">
    <ul class="topbar-mobile">
      <li>
        <div class="left-top-bar">
          Free shipping for standard order over $100
        </div>
      </li>

      <li>
        <div class="right-top-bar flex-w h-full">
          <a href="#" class="flex-c-m p-lr-10 trans-04">
            Help & FAQs
          </a>

          <a href="#" class="flex-c-m p-lr-10 trans-04">
            My Account
          </a>

          <a href="#" class="flex-c-m p-lr-10 trans-04">
            EN
          </a>

          <a href="#" class="flex-c-m p-lr-10 trans-04">
            USD
          </a>
        </div>
      </li>
    </ul>

    <ul class="main-menu-m">
      <li>
        <a href="index.html">Home</a>
        <ul class="sub-menu-m">
          <li><a href="index.html">Homepage 1</a></li>
          <li><a href="home-02.html">Homepage 2</a></li>
          <li><a href="home-03.html">Homepage 3</a></li>
        </ul>
        <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
      </li>

      <li>
        <a href="product.html">Shop</a>
      </li>

      <li>
        <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
      </li>

      <li>
        <a href="blog.html">Blog</a>
      </li>

      <li>
        <a href="about.html">About</a>
      </li>

      <li>
        <a href="contact.html">Contact</a>
      </li>
      <li>
        <a href="addproduct.html">Add product</a>
      </li>
    </ul>
  </div>

  <!-- Modal Search -->
  <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
      <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
        <img src="{{asset('images/icons/icon-close2.png')}}" alt="CLOSE">
      </button>

      <form class="wrap-search-header flex-w p-l-15">
        <button class="flex-c-m trans-04">
          <i class="zmdi zmdi-search"></i>
        </button>
        <input class="plh3" type="text" name="search" placeholder="Search...">
      </form>
    </div>
  </div>
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
  <div class="s-full js-hide-cart"></div>

  <div class="header-cart flex-col-l p-l-65 p-r-25">
    <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

      <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
        <i class="zmdi zmdi-close"></i>
      </div>
    </div>

    <div class="header-cart-content flex-w js-pscroll">
      <ul class="header-cart-wrapitem w-full">
        <li class="header-cart-item flex-w flex-t m-b-12">
          <div class="header-cart-item-img">
            <img src="{{asset('images/item-cart-01.jpg')}}" alt="IMG">
          </div>

          <div class="header-cart-item-txt p-t-8">
            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
              White Shirt Pleat
            </a>

            <span class="header-cart-item-info">
								1 x $19.00
							</span>
          </div>
        </li>

        <li class="header-cart-item flex-w flex-t m-b-12">
          <div class="header-cart-item-img">
            <img src="{{asset('images/item-cart-02.jpg')}}" alt="IMG">
          </div>

          <div class="header-cart-item-txt p-t-8">
            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
              Converse All Star
            </a>

            <span class="header-cart-item-info">
								1 x $39.00
							</span>
          </div>
        </li>

        <li class="header-cart-item flex-w flex-t m-b-12">
          <div class="header-cart-item-img">
            <img src="{{asset('images/item-cart-03.jpg')}}" alt="IMG">
          </div>

          <div class="header-cart-item-txt p-t-8">
            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
              Nixon Porter Leather
            </a>

            <span class="header-cart-item-info">
								1 x $17.00
							</span>
          </div>
        </li>
      </ul>

      <div class="w-full">
        <div class="header-cart-total w-full p-tb-40">
          Total: $75.00
        </div>

        <div class="header-cart-buttons flex-w w-full">
          <a href="shoping-cart.html"
             class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            View Cart
          </a>

          <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- breadcrumb -->
<div class="container">
  <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
    <a href="{{route('index')}}" class="stext-109 cl8 hov-cl1 trans-04">
      Home
      <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="{{route('event.index')}}" class="stext-109 cl8 hov-cl1 trans-04">
      Events
      <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
				{{$event->title}}
			</span>
  </div>
</div>


<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-9 p-b-80">
        <div class="p-r-45 p-r-0-lg">
          <!--  -->
          <div class="wrap-pic-w how-pos5-parent">
            <img src="{{asset('images/exchange3.jpg')}}" alt="IMG-BLOG">

            <div class="flex-col-c-m size-123 bg9 how-pos5">
    <span class="ltext-107 cl2 txt-center">
        {{ $event->date_time->format('d') }}
    </span>
              <span class="stext-109 cl3 txt-center">
        {{ $event->date_time->format('M Y') }}
    </span>
            </div>
            <div class="flex-col-c-m size-123 bg9 how-pos1">
    <span class="ltext-107 cl2 txt-center">
        {{ $event->date_time->format('H:i') }}
    </span>
            </div>
          </div>

          <div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">Created By</span> {{$event->creator->name}}
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
                  {{$event->created_at->format('d M, Y H:i')}}
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									{{$event->community->name}}
								</span>
							</span>

            <h4 class="ltext-109 cl2 p-b-28">
              {{$event->title}}
            </h4>

            <p class="stext-117 cl6 p-b-26">
              {{$event->description}}
            </p>
          </div>
          <!-- Map -->
          <hr>
          <h4 class="ltext-109 cl3 p-b-28">
            Location :
          </h4>
          <div id="map" style="height: 400px;"></div>
          <div class="flex-w flex-t p-t-16">
							<span class="size-216 stext-116 cl8 p-t-4">
								Tags
							</span>

            <div class="flex-w size-217">
              <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                Streetstyle
              </a>

              <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                Crafts
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3 p-b-80">
        <div class="side-menu">
          <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
              Participants
            </h4>
            <ul>
              @foreach($event->attendees as  $attendee)
                <li class="flex-w flex-t p-b-30">
                  <a class="wrao-pic-w size-214 m-r-20">
                    <img style="width: 110px ; height: 110px" src="{{asset('assets/images/user.jpg')}}" alt="PRODUCT">
                  </a>

                  <div class="size-215 flex-col-t p-t-8">
                    <a class="stext-116 cl8 hov-cl1 trans-04">
                      {{$attendee->name}}
                    </a>
                    <div style="width: 90px;margin-top: 30px;"
                         class="flex-c-m stext-106 cl6 size-107 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                      <i class="fa-solid fa-message cl2 m-r-6 fs-15 trans-04"></i>
                      Chat
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-lg-3 p-b-50">
        <h4 class="stext-301 cl0 p-b-30">
          Categories
        </h4>

        <ul>
          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Women
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Men
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Shoes
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Watches
            </a>
          </li>
        </ul>
      </div>

      <div class="col-sm-6 col-lg-3 p-b-50">
        <h4 class="stext-301 cl0 p-b-30">
          Help
        </h4>

        <ul>
          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Track Order
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Returns
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              Shipping
            </a>
          </li>

          <li class="p-b-10">
            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
              FAQs
            </a>
          </li>
        </ul>
      </div>

      <div class="col-sm-6 col-lg-3 p-b-50">
        <h4 class="stext-301 cl0 p-b-30">
          GET IN TOUCH
        </h4>

        <p class="stext-107 cl7 size-201">
          Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716
          6879
        </p>

        <div class="p-t-27">
          <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
            <i class="fa fa-facebook"></i>
          </a>

          <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
            <i class="fa fa-instagram"></i>
          </a>

          <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
            <i class="fa fa-pinterest-p"></i>
          </a>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 p-b-50">
        <h4 class="stext-301 cl0 p-b-30">
          Newsletter
        </h4>

        <form>
          <div class="wrap-input1 w-full p-b-4">
            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
            <div class="focus-input1 trans-04"></div>
          </div>

          <div class="p-t-18">
            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
              Subscribe
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="p-t-40">
      <div class="flex-c-m flex-w p-b-18">
        <a href="#" class="m-all-1">
          <img src="{{asset('images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{asset('images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{asset('images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{asset('images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{asset('images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
        </a>
      </div>

      <p class="stext-107 cl6 txt-center">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
        All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
          href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com"
                                                                                           target="_blank">ThemeWagon</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

      </p>
    </div>
  </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!--===============================================================================================-->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script>
  var eventMarkerIcon = L.icon({
    iconUrl: "{{asset('images/icons/location-pin.png')}}",
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32]
  });
  var map = L.map('map').setView([{{ $event->location['latitude'] }}, {{ $event->location['longitude'] }}], 15);
  var eventMarker = L.marker([{{ $event->location['latitude'] }}, {{ $event->location['longitude'] }}], {icon: eventMarkerIcon}).addTo(map);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
</script>
<script>
  $(".js-select2").each(function () {
    $(this).select2({
      minimumResultsForSearch: 20,
      dropdownParent: $(this).next('.dropDownSelect2')
    });
  })
</script>
<!--===============================================================================================-->
<script src="{{asset('vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script>
  $('.js-pscroll').each(function () {
    $(this).css('position', 'relative');
    $(this).css('overflow', 'hidden');
    var ps = new PerfectScrollbar(this, {
      wheelSpeed: 1,
      scrollingThreshold: 1000,
      wheelPropagation: false,
    });

    $(window).on('resize', function () {
      ps.update();
    })
  });
</script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
