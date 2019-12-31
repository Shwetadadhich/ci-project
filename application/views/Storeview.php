<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/owl.theme.default.min.css">
	
	<!-- font awesome-->
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/fonts/font-awesome.min.css">-->
  
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url(); ?>assests/store/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style>
	    body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box;}

    .open-button {
		  background-color: #555;
		  color: white;
		  padding: 10px 10px;
		  border: none;
		  cursor: pointer;
		  opacity: 0.8;
		  position: fixed;
		  top: 30px;
		  right: 0px;
		  width: 100px;
		}

/* The popup form - hidden by default */
	.form-popup {
	  margin:70px;
	  border-radius: 10px;
      margin-right:0px;
	  display: none;
	  position: fixed;
	  top: 0;
	  right: 15px;
	  border: 3px solid #f1f1f1;
	  z-index: 9;
	}

/* Add styles to the form container */
	.form-container {
	  max-width: 300px;
	  padding: 10px;
	  background-color: #e3e3e3;
	}

/* Full-width input fields */
	.form-container input[type=text], .form-container input[type=password] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  border: none;
	  background: #f1f1f1;
	}

/* When the inputs get focus, do something */
	.form-container input[type=text]:focus, .form-container input[type=password]:focus {
	  background-color: #ddd;
	  outline: none;
	}

/* Set a style for the submit/login button */
		.form-container .btn {
		  background-color: #4CAF50;
		  color: white;
		  padding: 16px 20px;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		  margin-bottom:10px;
		  opacity: 0.8;
		}

/* Add a red background color to the cancel button */
		.form-container .cancel {
		  background-color: red;
		}

		/* Add some hover effects to buttons */
		.form-container .btn:hover, .open-button:hover {
		  opacity: 1;
		}
    </style>

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="<?php echo base_url(); ?>Estore">E-Store</a></div>
						</div>
						<div class="col-xs-9 text-right menu-1">
							<ul>
								<li class="active"><a href="<?php echo base_url(); ?>Estore">Home</a></li>
								<li class="has-dropdown">
									<a href="<?php echo base_url("Estore/product_shop"); ?>">Shop</a>
									<ul class="dropdown">
										<!-- <li><a href="<?php echo base_url("Estore/product_detail"); ?>">Product Detail</a></li> -->
										<li><a href="<?php echo base_url(); ?>Estore/cart">Shipping Cart</a></li>
										<li><a href="<?php echo base_url(); ?>assests/store/checkout.html">Checkout</a></li>
										<li><a href="<?php echo base_url(); ?>assests/store/order-complete.html">Order Complete</a></li>
										<li><a href="<?php echo base_url(); ?>assests/store/add-to-wishlist.html">Wishlist</a></li>
									</ul>
								</li>
								<li><a href="<?php echo base_url(); ?>assests/store/blog.html">Blog</a></li>
								<li><a href="<?php echo base_url(); ?>assests/store/about.html">About</a></li>
								<li><a href="<?php echo base_url(); ?>assests/store/contact.html">Contact</a></li>
								<li><a href="cart.html"><i class="<?php echo base_url(); ?>assests/store/icon-shopping-cart"></i> Cart [0]</a></li>

								<?php 
								$email = '';
								if(!empty($this->session->userdata('email')))
								{?>
									<span style="text-transform: uppercase;">
									<?php echo $this->session->userdata('name'); ?></span>
								<li> <a href="<?php echo base_url("Estore/user_logout"); ?>" class="btn btn-primary">Sign out</a></li>
								<?php } ?>

							</ul>
						</div>
						<div class="col-md-1">
						<?php if(empty($this->session->userdata('email')))
						{?>
							<button class="open-button" onclick="openForm()">Login</button>
							<?php } ?>
							<div class="form-popup" id="myForm">
								  <form action="<?php echo base_url("Estore/login_user"); ?>" class="form-container" method="post">
								    <h1 style="text-align:center;border-bottom:1px solid black;margin-bottom:5px;">Login</h1>
								    <label for="email"><b>Email</b></label>
								    <input type="text" placeholder="Enter Email" name="email" required autocomplete="off">

								    <label for="psw"><b>Password</b></label>
								    <input type="password" placeholder="Enter Password" name="password" required>

								    <button type="submit" class="btn">Login</button>
								  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url('<?php echo base_url("assests/store/images/img_bg_1.jpg"); ?>');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Men's</h1>
					   					<h2 class="head-2">Jeans</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url('<?php echo base_url("assests/store/images/img_bg_2.jpg"); ?>');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Huge</h1>
					   					<h2 class="head-2">Sale</h2>
					   					<h2 class="head-3">45% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url('<?php echo base_url("assests/store/images/img_bg_3.jpg"); ?>');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">New</h1>
					   					<h2 class="head-2">Arrival</h2>
					   					<h2 class="head-3">up to 30% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="shop.html" class="f-product-1" style="background-image: url('<?php echo base_url("assests/store/images/item-1.jpg"); ?>');">
							<div class="desc">
								<h2>Fahion <br>for <br>men</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url('<?php echo base_url("assests/store/images/item-2.jpg"); ?>');">
									<div class="desc">
										<h2>New <br>Arrival <br>Dress</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url('<?php echo base_url("assests/store/images/item-4.jpg"); ?>');">
									<div class="desc">
										<h2>Sale <br>20% <br>off</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="" class="f-product-2" style="background-image: url('<?php echo base_url("assests/store/images/item-3.jpg"); ?>');">
									<div class="desc">
										<h2>Shoes <br>for <br>men</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-5.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-6.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-7.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-8.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url('<?php echo base_url("assests/store/images/cover-img-1.jpg"); ?>');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Just hurry up limited offer!</h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
									<p><a href="shop.html" class="btn btn-primary">Shop Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Products</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-9.jpg"); ?>');">
								<p class="tag"><span class="sale">Sale</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-10.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-11.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-12.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-13.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-14.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-15.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url('<?php echo base_url("assests/store/images/item-16.jpg"); ?>');">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Floral Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Satisfied Customer says</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">						
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url('<?php echo base_url("assests/store/images/person1.jpg"); ?>');"></span>
									<span class="user">Alysha Myers</span>
									<small>Miami Florida, USA</small>
									<blockquote>
										<p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url('<?php echo base_url("assests/store/images/person2.jpg"); ?>');"></span>
									<span class="user">James Fisher</span>
									<small>New York, USA</small>
									<blockquote>
										<p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url('<?php echo base_url("assests/store/images/person3.jpg"); ?>');"></span>
									<span class="user">Jacob Webb</span>
									<small>Athens, Greece</small>
									<blockquote>
										<p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
						<h2>Recent Blog</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url('<?php echo base_url("assests/store/images/blog-1.jpg"); ?>');"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url('<?php echo base_url("assests/store/images/blog-2.jpg"); ?>');"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url('<?php echo base_url("assests/store/images/blog-3.jpg"); ?>');"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		
		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>We have a dynamic team of website design, development, branding and creative specialists, along with in-house "high end" programmers located in Jodhpur.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="twitter.com"><i class="icon-twitter"></i></a></li>
								<li><a href="facebook.com"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Get In Touch</h4>
						<ul class="colorlib-footer-links">
							<li><i class="fa fa-map"></i>Address: 39, First Floor, 1st C Road ,<br> Sardarpura, Jodhpur, </li>
							<li><a href="tel://1234567920">Tel: + (91) 8233-33-6991</a></li>
							<li><a href="mailto:info@atntechnologies.in">Email: info@atntechnologies.in</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							
							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assests/store/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="<?php echo base_url(); ?>assests/store/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>assests/store/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="<?php echo base_url(); ?>assests/store/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="<?php echo base_url(); ?>assests/store/js/main.js"></script>
   
   <script>
	function openForm()
	{
		$(document).ready(function() {
		  var myElement = $("#myForm");
		  myElement.toggle();

		});
    }

	// function closeForm() 
	// {
	// 	$(document).ready(function() {
	// 	  var myElement = $("#myForm");
	// 	  myElement.hide();
	// 	});
	// }

   </script>
	</body>
</html>

