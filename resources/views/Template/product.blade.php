<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }} "/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
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
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
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
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
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
								<a href="{{ route('contact') }}">Contact</a>
							</li>
							<li>
								<a href="{{ route('myproduct') }}">My products </a>
							  </li>
						</ul>
					</div>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						{{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-favorite-outline"></i>
						</div> --}}

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2" id="wishlistButton">
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
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				
				
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
					<a href="addproduct.html">Add Product</a>
				</li>
			</ul>
		</div>

		{{-- <!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div> --}}
	</header>
{{-- wishlist----------------------------------- --}}
	{{-- <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>
		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Wishlist
				</span>
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full" id="wishlistContainer">
					<!-- Wishlist items will be dynamically added here using JavaScript -->
				</ul>
			</div>
		</div>
	</div> --}}
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Wishlist
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				
				<ul class="header-cart-wrapitem w-full" id="wishlistContainer">
					<!-- Wishlist items will be dynamically added here using JavaScript -->
				</ul>
				
			</div>
		</div>
	</div>

	


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				
				<div class="flex-w flex-sb-m p-b-52">
					<div class="flex-w flex-c-m m-tb-10">
						<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
							<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
							<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
							Search
						</div>
					</div>
				
					<!-- Search product -->
					<div class="dis-none panel-search w-full p-t-10 p-b-15">
						<div class="bor8 dis-flex p-l-15">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search-product" placeholder="Search">
						</div>
					</div>
				</div>
				
				

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

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
			</div>







			<div class="row isotope-grid">
				@foreach($listproductss as $product)
				@if($product->user_id !== auth()->user()->id)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('images/' . $product->images) }}" alt="Product Image" style="width: 300px; height: 400px;" >

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 show-product" data-bs-toggle="modal" data-bs-target="#Modal1" data-product-name="{{ $product->product_name }}"
								data-product-price="{{ $product->price }}"
								data-product-description="{{ $product->description }}"
								data-product-order="{{ $product->order }}"
								data-product-image="{{ asset('images/' . $product->image) }}"
								data-product-id="{{ $product->id }}"
								>
								Quick View
							</a>
						
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $product->product_name }}
								</a>

								<span class="stext-105 cl3">
									${{ $product->price }}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" data-product-id="{{ $product->id }}">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
							
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>




















			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
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
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
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
				

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
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
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="#Modal1"  >
	<div class="overlay-modal1 js-hide-modal1"></div>

	<div class="container">
		<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src="images/icons/icon-close.png" alt="CLOSE">
			</button>

			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">


							<div class="slick3 gallery-lb">



								<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
									<div class="wrap-pic-w pos-relative">
										<img id="productImage" src="" alt="Product Image">


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h1 class="mtext-105 cl2 js-name-detail p-b-14">
						<h1>	<span id="productName"></span></h1>
						</h1>
<br/>
						<span class="mtext-106 cl2">
						 	$<span id="productPrice"></span>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<span id="productDescription"></span>	</p>

							<p class="stext-102 cl3 p-t-23">
							<h5>	I WANT TO EXCHANGE FOR:</h5>
								<br/>
								<span id="productorder"></span>	</p>
						<!--  -->


						<br/>
						<br/>
						<br/>
						<br/>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="p-b-10">

										<span id="productId" style="display: none;"></span>
										<label id="selectedProduct" style="display: none;">Sélectionnez un produit :</label>
										<select id="userProducts" style="display: none; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
											@foreach ($listproductss as $productt)
											@if($productt->user_id === auth()->user()->id)
												<option value="{{ $productt->id }}" data-product-id="{{ $productt->id }}" style="padding: 10px;">{{ $productt->product_name }}</option>
											@endif
											@endforeach
										</select>
									</div>

									<!-- Boutons "Besoin", "Confirmer" et "Annuler" -->
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-204 flex-w flex-m respon6-next">
											<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-show-products" data-product-id="{{ $product->id }}">
												Besoin
											</button>
											<div class="flex-w flex-r-m p-b-10">
												<button class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-confirm" style="display: none;">
													Confirmer
												</button>
												<button class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-cancel" style="display: none; margin-top: 20px">
													Annuler
												</button>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.show-product').click(function () {

            console.log('Button clicked'); // Add this line
            var productName = $(this).data('product-name');
			var productId = $(this).data('product-id');
            var productPrice = $(this).data('product-price');
            var productDescription = $(this).data('product-description');
			var productorder = $(this).data('product-order');
            var productImage = $(this).data('product-image');

            // Set the modal content with product details
            $('#productName').text(productName);
			$('#productId').text(productId);
            $('#productPrice').text(productPrice);
            $('#productDescription').text(productDescription);
			$('#productorder').text(productorder);
            $('#productImage').attr('src', productImage);
        });
    });
</script>
{{-- addwishliste --}}
{{-- <script>
    $(document).ready(function() {
        $('.js-addwish-b2').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            var button = $(this);

            $.ajax({
                url: '{{ route('wishlist.toggle') }}',
                method: 'POST',
                data: { product_id: productId, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    if (response.success) {
                        if (response.added) {
                            // Product added to wishlist
                            button.find('.icon-heart1').hide();
                            button.find('.icon-heart2').show();
                            // Show an alert message when liked
							swal(nameProduct, "is added to wishlist !", "success");

                          $(this).addClass('js-addedwish-b2');
                          $(this).off('click');
                        } else {
                            // Product removed from wishlist
                            button.find('.icon-heart2').hide();
                            button.find('.icon-heart1').show();
                            // Show an alert message when unliked
                           alert('Product removed from wishlist');
							
                        }
                    } else {
                        // Handle errors
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr) {
                    // Handle errors
                    alert('Error: ' + xhr.statusText);
                }
            });
        });
    });
</script> --}}


{{-- getwishliste --}}
<script>
    $(document).ready(function() {
        var wishlistContainer = $('.wrap-header-cart'); // Wishlist container
        var wishlistButton = $('#wishlistButton');

        wishlistButton.on('click', function(e) {
            e.preventDefault();
            wishlistContainer.toggleClass('show'); // Toggle the visibility of the wishlist container

            // Check if the wishlist is visible and load it only when it's shown
            if (wishlistContainer.hasClass('show')) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("wishlist.show") }}', // Make sure this route exists in your Laravel routes
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var wishlistProducts = response.wishlistProducts;
                            var wishlistContent = wishlistContainer.find('#wishlistContainer');

                            // Clear the existing content
                            wishlistContent.empty();

                            // Loop through the wishlist products and append them to the container
                            $.each(wishlistProducts, function(index, product) {
                                wishlistContent.append(
                                    '<li class="header-cart-item flex-w flex-t m-b-12">' +
                                    '   <div class="header-cart-item-img">' +
                                    '       <img src="{{ asset('images/') }}/' + product.image + '" alt="Product Image">' +
                                    '   </div>' +
                                    '   <div class="header-cart-item-txt p-t-8">' +
                                    '       <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">' +
                                    '           ' + product.product_name +
                                    '       </a>' +
                                    '       <span class="header-cart-item-info">Price: $' + product.price + '</span>' +
                                    '   </div>' +
                                    '</li>'
                                );
                            });
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }
        });
    });
</script>




{{-- Exchange_____________________ --}}
<script>
	let productExchangeId;
    const showProductsButton = document.querySelector('.js-show-products');
    const confirmButton = document.querySelector('.js-confirm');
    const cancelButton = document.querySelector('.js-cancel');
    const userProductsSelect = document.querySelector('#userProducts');
	const selectedProductLabel = document.querySelector('#selectedProduct');

	const productIdLabel = document.querySelector('#productId');
    showProductsButton.addEventListener('click', function() {
		console.log()
        showProductsButton.style.display = 'none';
        confirmButton.style.display = 'inline';
        cancelButton.style.display = 'inline';
        userProductsSelect.style.display = 'inline';
		selectedProductLabel.style.display = 'inline';
		productExchangeId = productIdLabel.textContent;
		console.log('productExchangeId:', productExchangeId);
		//const productExchangeId = showProductsButton.getAttribute('data-product-id');

    });

    cancelButton.addEventListener('click', function() {
        showProductsButton.style.display = 'inline';
        confirmButton.style.display = 'none';
        cancelButton.style.display = 'none';
        userProductsSelect.style.display = 'none';
		selectedProductLabel.style.display = 'none';
    });


	confirmButton.addEventListener('click', function() {
        const selectedOption = userProductsSelect.options[userProductsSelect.selectedIndex];
        const selectedProductId = selectedOption.value;
        const selectedProductText = selectedOption.textContent;
		const modalElement = document.querySelector('.js-modal1');
		 // Envoyer une requête AJAX au serveur pour créer une offre
        $.ajax({
            type: 'POST',
            url: '{{ route('offre.create') }}', // L'URL du contrôleur qui crée l'offre
            data: {
                _token: '{{ csrf_token() }}', // Assurez-vous d'inclure le jeton CSRF
                id_produit_a_echanger: selectedProductId, // L'ID du produit à échanger
                id_produit_pour_echanger_avec: productExchangeId,
            },
            success: function(data) {
                // Traitez la réponse du serveur, par exemple, affichez un message de succès
                alert('Offre créée avec succès pour le produit : ' + selectedProductText + productExchangeId);
            },
            error: function(xhr) {
                // Traitez les erreurs, par exemple, affichez un message d'erreur
                alert('Une erreur s\'est produite : ' + xhr.responseText);
            }
        });
    });
</script>















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
		$(".js-select2").each(function(){
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
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
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
		$(document).ready(function() {
			$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
				e.preventDefault();
			});
	
			$('.js-addwish-b2').each(function(){
				$(this).on('click', function(){
					var productId = $(this).data('product-id');
					var button = $(this);
	
					$.ajax({
						url: '{{ route('wishlist.toggle') }}',
						method: 'POST',
						data: { product_id: productId, _token: '{{ csrf_token() }}' },
						success: function(response) {
							
							if (response.success) {
								if (response.added) {
									// Product added to wishlist
									button.find('.icon-heart1').hide();
									button.find('.icon-heart2').show();
									var nameProduct = button.parent().parent().find('.js-name-b2').html();
									swal(nameProduct, "is added to wishlist !", "success");
								} else {
									// Product removed from wishlist
									swal({
										title: 'Remove from Wishlist',
										text: 'Do you want to remove this product from your wishlist?',
										icon: 'warning',
										buttons: ["Cancel", "Remove"],
									})
									.then((confirmed) => {
										if (confirmed) {
											//button.find('.icon-heart2').hide();
											button.find('.icon-heart1').show();
											var nameProduct = button.parent().parent().find('.js-name-b2').html();
											swal(nameProduct, "Product removed from wishlist !", "success");
										}
									});
								}
							} else {
								// Handle errors
								swal('Error', response.message, "error");
							}
						},
						error: function(xhr) {
							// Handle errors
							swal('Error', xhr.statusText, "error");
						}
					});
	
					$(this).addClass('js-addedwish-b2');
					$(this).off('click');
				});
			});
	
			$('.js-addwish-detail').each(function(){
				$(this).on('click', function(){
					var productId = $(this).data('product-id');
					var button = $(this);
	
					$.ajax({
						url: '{{ route('wishlist.toggle') }}',
						method: 'POST',
						data: { product_id: productId, _token: '{{ csrf_token() }}' },
						success: function(response) {
							if (response.success) {
								if (response.added) {
									// Product added to wishlist
									button.find('.icon-heart1').hide();
									button.find('.icon-heart2').show();
									var nameProduct = button.parent().parent().parent().find('.js-name-detail').html();
									swal(nameProduct, "is added to wishlist !", "success");
								} else {
									// Product removed from wishlist
									swal({
										title: 'Remove from Wishlist',
										text: 'Do you want to remove this product from your wishlist?',
										icon: 'warning',
										buttons: ["Cancel", "Remove"],
									})
									.then((confirmed) => {
										if (confirmed) {
											button.find('.icon-heart2').hide();
											button.find('.icon-heart1').show();
											var nameProduct = button.parent().parent().parent().find('.js-name-detail').html();
											swal(nameProduct, "Product removed from wishlist !", "success");
										}
									});
								}
							} else {
								// Handle errors
								swal('Error', response.message, "error");
							}
						},
						error: function(xhr) {
							// Handle errors
							swal('Error', xhr.statusText, "error");
						}
					});
	
					$(this).addClass('js-addedwish-detail');
					$(this).off('click');
				});
			});
	
			/*---------------------------------------------*/
	
			$('.js-addcart-detail').each(function(){
				var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
				$(this).on('click', function(){
					swal(nameProduct, "is added to cart !", "success");
				});
			});
		});
	</script>
	
	
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

<script>
    $(document).ready(function () {
        $('#search-product').on('input', function () {
            var searchValue = $('#search-product').val().toLowerCase();

            $('.isotope-item').each(function () {
                var productName = $(this).find('.js-name-b2').text().toLowerCase();

                if (productName.includes(searchValue) || searchValue === '') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>