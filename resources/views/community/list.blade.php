{{-- @extends('layouts/contentNavbarLayout') --}}
<!-- Include Styles -->
@extends('layouts/sections/styles')
<!-- Include Scripts for customizer, helper, analytics, config -->
@extends('layouts/sections/scriptsIncludes')
<!-- Include Scripts -->
@include('layouts/sections/scripts')
  <!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
  <link rel="stylesheet" type="text css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('osw/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('osw/assets/css/owl.css') }}">
</head>

<body class="animsition">
<!-- Header -->
<header style="height:40px;">
  <!-- Header desktop -->
  <div class="container-menu-desktop">
    <!-- Topbar -->
    <div class="top-bar" style>
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

    <div class="wrap-menu-desktop">
      <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
        <a href="#" class="logo">
          <!--	<img src="images/icons/logo-01.png" alt="IMG-LOGO">-->
          <img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">
          <ul class="main-menu">
            {{--
<li class="active-menu"> --}}
            <a href="{{ route('index') }}">Home</a>
            {{--
<ul class="sub-menu">
<li><a href="{{ route('index') }}">Homepage 1</a></li>
<li><a href="home-02.html">Homepage 2</a></li>
<li><a href="home-03.html">Homepage 3</a></li>
</ul> --}}
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
              <a href="{{ route('contact') }}">Contact</a>
            </li>
            <li>
              <a href="{{ route('community.index') }}">Communities</a>
              <ul class="sub-menu">
                <li><a href="{{ route('community.index') }}">Communities List</a></li>
                <li><a href="{{ route('community.create') }}">Create Community</a></li>
              </ul>
            </li>
            <li>
              <a href="{{ route('event.index') }}">Events</a>
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

          <a href="#"
             class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
             data-notify="0">
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
      <a href="index.html"><img src=" {{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
        <i class="zmdi zmdi-search"></i>
      </div>

      <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
           data-notify="2">
        <i class="zmdi zmdi-shopping-cart"></i>
      </div>

      <a href="#"
         class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
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
        <a href="{{ route('contact') }}">Contact</a>
      </li>
      <li>
        <a href="{{ route('community.index') }}">Communities</a>
        <ul class="sub-menu">
          <li><a href="{{ route('community.index') }}">Communities List</a></li>
          <li><a href="{{ route('community.create') }}">Create Community</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('event.index') }}">Events</a>
      </li>
    </ul>
  </div>

  <!-- Modal Search -->
  <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
      <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
        <img src=" {{ asset('images/icons/icon-close2.png') }} " alt="CLOSE">
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
            <img src="{{ asset('images/item-cart-01.jpg') }}" alt="IMG">
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
            <img src="{{ asset('images/item-cart-02.jpg') }} " alt="IMG">
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
            <img src="{{ asset('images/item-cart-03.jpg') }} " alt="IMG">
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

          <a href="shoping-cart.html"
             class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Communities -->
<div class="services section-background">
  <div class="container">
    <div class="row">
      <!-- breadcrumb -->
      <div class="container" style="padding-bottom: 25px;">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
          <a href="{{route('index')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
          </a>
          <a href="{{route('community.index')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Communities
            <i class="fa fa-angle-double-down m-l-9 m-r-10" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      @foreach ($communities as $c)
        <div class="col-md-4">
          {{-- <i class="fa-solid fa-ellipsis-vertical" style="position: relative;left: 345px;top: 40px;"></i> --}}
          @if ($c->creator_id == Auth::user()->id)
          <div class="dropdown">
            <button style="position: relative;
                              left: 400px;
                              top: 40px;" class="btn p-0"
                    type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
              <a class="dropdown-item" href="{{ route('community.edit', ['community' => $c]) }}"><i
                  class="fa-solid fa-pen-to-square"></i>Edit</a>
              {{-- <a class="dropdown-item" href="{{route('community.destroy',['community'=>$c])}}"><i class="fa-solid fa-trash"></i>Delete</a> --}}
              <form method="POST" action="{{ route('community.destroy', ['community' => $c]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">
                  <i class="fa-solid fa-trash"></i> Delete
                </button>
              </form>
            </div>
          </div>
          @endif
          <div class="service-item">
            <div class="icon">
              {{-- <img  style="height: 140px; width: 200px;" src="{{asset('assets/images/blog-01.jpg')}}"> --}}
              <i class="fa-solid fa-people-group"></i>
            </div>
            <div class="down-content">
              <a href="{{route('community.show',['community'=>$c])}}"><h4>{{ $c->name }}</h4></a>
              <p class="n-m"><em>{{ $c->description }}</em></p>
              <hr>
              {{ $c->members->count() }} <i class="fa-solid fa-user"></i>
              @if ($c->events->where('date_time', '>', now())->count() > 0)
                • <i class="fa-solid fa-calendar-days"></i>
                {{ $c->events->where('date_time', '>', now())->sortBy('date_time')->first()->date_time->format('d M, Y H:i') }}
              @endif
              @if ($c->members->contains('id',Auth::user()->id))
                <div>
                  <a href="{{ route('event.form', ['id' => $c->id]) }}">
                    <button style="margin-top : 5px;" class="stext-101 cl0 size-104 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                      Create Event <i class="fa-solid fa-plus"></i>
                    </button>
                  </a>
                </div>
              @else
                <form method="POST" action="{{ route('community.join', ['community' => $c]) }}">
                  @csrf
                  <button type="submit" style="margin-top : 5px;"
                          class="stext-101 cl0 size-104 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                    Join <i class="fa-solid fa-right-to-bracket"></i>
                  </button>
                  {{--           <div style="margin-top : 10px;">
                                        <span class="badge rounded-pill bg-label-primary">Primary</span>
                            <span class="badge rounded-pill bg-label-success">Success</span>
                                      <span class="badge rounded-pill bg-label-danger">Danger</span>
                            <span class="badge rounded-pill bg-label-warning">Warning</span>
                            <span class="badge rounded-pill bg-label-info">Info</span>
                            </div>--}}
                </form>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>


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
          Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
          on (+1) 96 716
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
            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                   placeholder="email@example.com">
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
          <img src=" {{ asset('images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src=" {{ asset('images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{ asset('images/icons/icon-pay-03.pngt') }}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{ asset('images/icons/icon-pay-04.png') }}" alt="ICON-PAY">
        </a>

        <a href="#" class="m-all-1">
          <img src="{{ asset('images/icons/icon-pay-05.png') }}" alt="ICON-PAY">
        </a>
      </div>

      <p class="stext-107 cl6 txt-center">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
          href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a
          href="https://themewagon.com" target="_blank">ThemeWagon</a>
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

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
  <div class="overlay-modal1 js-hide-modal1"></div>

  <div class="container">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
      <button class="how-pos3 hov3 trans-04 js-hide-modal1">
        <img src=" {{ asset('images/icons/icon-close.png') }}" alt="CLOSE">
      </button>

      <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
          <div class="p-l-25 p-r-30 p-lr-0-lg">
            <div class="wrap-slick3 flex-sb flex-w">
              <div class="wrap-slick3-dots"></div>
              <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

              <div class="slick3 gallery-lb">
                <div class="item-slick3"
                     data-thumb="{{ asset('images/product-detail-01.jpg') }}">
                  <div class="wrap-pic-w pos-relative">
                    <img src=" {{ asset('images/product-detail-01.jpg') }}"
                         alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                       href=" {{ asset('images/product-detail-01.jpg') }} ">
                      <i class="fa fa-expand"></i>
                    </a>
                  </div>
                </div>

                <div class="item-slick3"
                     data-thumb="{{ asset('images/product-detail-02.jpg') }}">
                  <div class="wrap-pic-w pos-relative">
                    <img src="{{ asset('images/product-detail-02.jpg') }} "
                         alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                       href="  {{ asset('images/product-detail-02.jpg') }}">
                      <i class="fa fa-expand"></i>
                    </a>
                  </div>
                </div>

                <div class="item-slick3"
                     data-thumb="{{ asset('images/product-detail-03.jpg') }} ">
                  <div class="wrap-pic-w pos-relative">
                    <img src="{{ asset('images/product-detail-03.jpg') }} "
                         alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                       href=" {{ asset('images/product-detail-03.jpg') }} ">
                      <i class="fa fa-expand"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
          <div class="p-r-50 p-t-5 p-lr-0-lg">
            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
              Lightweight Jacket
            </h4>

            <span class="mtext-106 cl2">
                                $58.79
                            </span>

            <p class="stext-102 cl3 p-t-23">
              Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
              ornare feugiat.
            </p>

            <!--  -->
            <div class="p-t-33">
              <div class="flex-w flex-r-m p-b-10">
                <div class="size-203 flex-c-m respon6">
                  Size
                </div>

                <div class="size-204 respon6-next">
                  <div class="rs1-select2 bor8 bg0">
                    <select class="js-select2" name="time">
                      <option>Choose an option</option>
                      <option>Size S</option>
                      <option>Size M</option>
                      <option>Size L</option>
                      <option>Size XL</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                  </div>
                </div>
              </div>

              <div class="flex-w flex-r-m p-b-10">
                <div class="size-203 flex-c-m respon6">
                  Color
                </div>

                <div class="size-204 respon6-next">
                  <div class="rs1-select2 bor8 bg0">
                    <select class="js-select2" name="time">
                      <option>Choose an option</option>
                      <option>Red</option>
                      <option>Blue</option>
                      <option>White</option>
                      <option>Grey</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                  </div>
                </div>
              </div>

              <div class="flex-w flex-r-m p-b-10">
                <div class="size-204 flex-w flex-m respon6-next">
                  <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>

                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                           name="num-product" value="1">

                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-plus"></i>
                    </div>
                  </div>

                  <button
                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                    Add to cart
                  </button>
                </div>
              </div>
            </div>

            <!--  -->
            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
              <div class="flex-m bor9 p-r-10 m-r-11">
                <a href="#"
                   class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                   data-tooltip="Add to Wishlist">
                  <i class="zmdi zmdi-favorite"></i>
                </a>
              </div>

              <a href="#"
                 class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                 data-tooltip="Facebook">
                <i class="fa fa-facebook"></i>
              </a>

              <a href="#"
                 class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                 data-tooltip="Twitter">
                <i class="fa fa-twitter"></i>
              </a>

              <a href="#"
                 class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                 data-tooltip="Google Plus">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<script>
  $(".js-select2").each(function () {
    $(this).select2({
      minimumResultsForSearch: 20,
      dropdownParent: $(this).next('.dropDownSelect2')
    });
  })
</script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/slick/slick.min.js"></script>
<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="vendor/parallax100/parallax100.js"></script>
<script>
  $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
  $('.gallery-lb').each(function () { // the containers for all your galleries
    $(this).magnificPopup({
      delegate: 'a', // the selector for gallery item
      type: 'image',
      gallery: {
        enabled: true
      },
      mainClass: 'mfp-fade'
    });
  });
</script>
<!--===============================================================================================-->
<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script>
  $('.js-addwish-b2').on('click', function (e) {
    e.preventDefault();
  });

  $('.js-addwish-b2').each(function () {
    var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
    $(this).on('click', function () {
      swal(nameProduct, "is added to wishlist !", "success");

      $(this).addClass('js-addedwish-b2');
      $(this).off('click');
    });
  });

  $('.js-addwish-detail').each(function () {
    var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

    $(this).on('click', function () {
      swal(nameProduct, "is added to wishlist !", "success");

      $(this).addClass('js-addedwish-detail');
      $(this).off('click');
    });
  });

  /*---------------------------------------------*/

  $('.js-addcart-detail').each(function () {
    var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    $(this).on('click', function () {
      swal(nameProduct, "is added to cart !", "success");
    });
  });
</script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
<script src="js/main.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('osw/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('osw/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Additional Scripts -->
<script src="{{ asset('osw/assets/js/custom.js') }}"></script>
<script src="{{ asset('osw/assets/js/owl.js') }}"></script>
</body>

</html>
