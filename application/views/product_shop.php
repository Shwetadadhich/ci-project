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
	<link rel="stylesheet" href="<?php echo base_url() ?>assests/store/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assests/store/css/style.css">
    <script src="<?php echo base_url(); ?>assests/store/js/modernizr-2.6.2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
     <link href = "<?php echo base_url(); ?>assests/store/css/jquery-ui.css"> 
  
	</head>
	<body>
		
	<!-- <div class="colorlib-loader" style="display:none;"></div> -->


	<div id="page"> 
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="<?php echo base_url("Estore"); ?>">E-Store</a></div>
						</div> 
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="<?php echo base_url("Estore"); ?>">Home</a></li>
								<li class="has-dropdown active">
									<a href="<?php echo base_url("Estore/product_shop"); ?>">Shop</a>
									<ul class="dropdown">
										<li><a href="<?php echo base_url("Estore/product_detail"); ?>">Product Detail</a></li>
										<li><a href="cart.html">Shipping Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="order-complete.html">Order Complete</a></li>
										<li><a href="add-to-wishlist.html">Wishlist</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>  

		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url('<?php echo base_url("assests/store/images/cover-img-1.jpg"); ?>');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Products</h1>
				   					<h2 class="bread"><span><a href="<?php echo base_url("Estore"); ?>">Home</a></span> <span>Shop</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
                    <div class="col-md-10 col-md-push-2">
				        <div class="row row-pb-lg">
				        <div class="col-md-9">
								        <h2 align="center">Product Filters in Codeigniter using Ajax</h2>
								    <br />
								    <div class="row filter_data"></div>
								    <br />

							    <ul class="pagination"> 
									 <div align="center" id="pagination_link"> 
                                          <?php //echo pagination; ?>
									 </div>
							    </ul> 
                        </div>
				        	  <?php if ($store_category) { ?>
								<?php foreach ($store_category as $store) { ?>
							<div class="col-md-4 text-center">
								<div class="product-entry">
								    <div class="product-img img-responsive" style="height:280px; background-image: url(<?php echo base_url('assests/DataTables/images/'.$store->image); ?>" );">
										<p class="tag"><span class="new">New</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="<?php echo base_url("Estore/product_detail"); ?>"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="<?php echo base_url("Estore/product_detail/".'?id='.$store->id); ?>"> <?php echo $store->title; ?></a></h3>
										<p class="price"><span><?php echo $store->price; ?></span> <span class="sale">$300.00</span></p>
									</div>
									
								</div>
								
							</div>
							 <?php } ?>
								<?php } ?>
                        </div>

                        

						<!-- <div class="row">
							<div class="col-md-12">
															</div>
						</div> -->
					</div>

					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
						    <div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="">
						          
								            <a href="<?php echo base_url('Estore/product_shop'); ?>"></a>
								            <div class="treeview-menu">
								                <?php 
								                  $categories = getCatergoryList();
								                  
								                  if(!empty($categories))  
								                  {
								                     foreach ($categories as $ind => $cat) { 
								                  ?>
								                     <div class="<?php echo ($this->router->fetch_method() == 'product_shop'&& $cat->cat_id == $this->uri->segment(3)) ? '' : '' ?>">

								                     <a style="color:orange;" href="<?php echo base_url("Estore/product_shop/".$cat->cat_id); ?>"><?php echo $cat->cat_title; ?></a></div>
								                    
								                  <?php 
								                    }
								                  }
								                ?>
											</div>
										 <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			                             <div class="panel-body">
			                                 <ul>
			                                 	<li><a href="#">Jeans</a></li>
			                                 	<li><a href="#">T-Shirt</a></li>
			                                 	<li><a href="#">Jacket</a></li>
			                                 	<li><a href="#">Shoes</a></li>
			                                 </ul>
			                             </div>
			                            </div>
						          	</div>
			                  </div>
			               </div>
							</div>
						<div class="side">
								
				              	<div class="row">
				              	 <div class="col-md-12">
                                    <div class="list-group">
								     	<h3>Price</h3>
								        <input type="hidden" id="hidden_minimum_price" value="0" />
								   	    <input type="hidden" id="hidden_maximum_price" value="65000" />
								        <p id="price_show">1000 - 65000</p>
								        <div id="price_range" style="height:20px;"></div>
								    </div>         
                                </div>
                             </div>
                        </div>
						
							<div class="side">
								<h2>Color</h2>
								<div class="">
									<div class="list-group">
                                        <?php
									        foreach($color->result_array() as $row) { ?>
									        <div class="list-group-item checkbox">
									           <label><input type="checkbox" class="common_selector color" value="<?php echo $row['color']; ?>" > <?php echo $row['color']; ?> </label>
									        </div><?php } ?> 
									</div>
								</div>
							</div>

							<div class="side">
								<h2>Size</h2>
								<div class="">
									<div class="list-group">
									<?php
										 foreach($size->result_array() as $row) { ?>
										 	<div class="list-group-item checkbox">
										     <label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" > <?php echo $row['size']; ?> </label>
									        </div> <?php } ?> 
									</div>
								</div>
							</div>
						</div>
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
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
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
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li><i class="fa fa-map"></i>Address: 39, First Floor, 1st C Road ,<br> Sardarpura, Jodhpur </li>
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
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assests/store/js/jquery.min.js"></script>
	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
$(document).ready(function(){

    filter_data(1);

    function filter_data(page)
    {

        //var action = '';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var size = get_filter('size');
        var color = get_filter('color');
            

        $.ajax({
            url:"product_shop_filter",
            method:"POST",
            dataType:"JSON",
            data:{minimum_price:minimum_price, maximum_price:maximum_price,size:size,color:color},
            success:function(data)
            {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
                //alert('yo!');
            },
       //     error: function (xhr, ajaxOptions, thrownError) {
	      //   alert(xhr.status);
	      //   alert(thrownError);
	      // }
        })
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function(){
        filter_data(1);
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000,65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data(1);
        }

    });

});
</script>
	
</body>
</html>

