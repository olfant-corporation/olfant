<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from html.creativegigstf.com/charles/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 07:31:05 GMT -->
<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#061948">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#061948">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		<title>Charles-Business-Consulting HTML Template</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="assets/images/fav-icon/icon.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="assets/vendor/html5shiv.js"></script>
			<script src="assets/vendor/respond.js"></script>
		<![endif]-->	
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

			

			<!-- 
			=============================================
				Theme Header One
			============================================== 
			-->
			<?php include_once('components/header.php'); ?>
			
			<!--
			=====================================================
				Google Map
			=====================================================
			-->
			<!-- Google Map -->
			<div class="google-map-two section-spacing"><div class="map-canvas"></div></div>


			<!-- 
			=============================================
				Conatct us Section
			============================================== 
			-->
			<div class="contact-us-section section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>GET IN TOUCH</h2>
						<p>Contact us to explore how our IT solutions can empower your business.</p>
					</div> <!-- /.theme-title-one -->
					<div class="clearfix main-content no-gutters row">
						<div class="col-lg-5 col-12"><div class="img-box"></div></div>
						<div class="col-lg-7 col-12">
							<div class="form-wrapper">
								<form action="contact.php" class="theme-form-one form-validation" autocomplete="off" method="POST">
									<div class="row">
										<div class="col-sm-6 col-12"><input type="text" placeholder="Your Name *" name="name"></div>
										<div class="col-sm-6 col-12"><input type="text" placeholder="Your Phone *" name="phone"></div>
										<div class="col-sm-6 col-12"><input type="email" placeholder="Your Email *" name="email"></div>
										<div class="col-sm-6 col-12"><input type="text" placeholder="Your Website *" name="web"></div>
										<div class="col-12"><textarea placeholder="Your Message" name="message"></textarea></div>
									</div> <!-- /.row -->
									<button type="submit" class="theme-button-one">SEND MESSAGE</button>
								</form>
							</div> <!-- /.form-wrapper -->
						</div> <!-- /.col- -->
					</div> <!-- /.main-content -->
				</div> <!-- /.container -->
			
				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
							<p>Your message was sent successfully.</p>
						</div>
					</div>
				</div> <!-- End of .alert_wrapper -->
				<div class="alert-wrapper" id="alert-error">
					<div id="error">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
							<p>Sorry! Something went wrong. Please try again later.</p>
						</div>
					</div>
				</div> <!-- End of .alert_wrapper -->
			</div> <!-- /.contact-us-section -->
			



			<!-- 
			=============================================
				Compnay Branch Address
			============================================== 
			-->
			<div class="branch-address">
				<div class="container">
					<div class="row">
						<div class="address-slider">
							<div class="item">
								<div class="wrapper">
									<h6>Headquarters - Jamshedpur, India</h6>
									<p><i class="fa fa-address-book-o" aria-hidden="true"></i>Sakchi, Jamshedpur, Jharkhand, India.</p>
								</div> <!-- /.wrapper -->
							</div>
							<div class="item">
								<div class="wrapper">
									<h6>Mumbai Office</h6>
									<p><i class="fa fa-address-book-o" aria-hidden="true"></i>Andheri West, Mumbai, Maharashtra, India.</p>
								</div> <!-- /.wrapper -->
							</div>
							<div class="item">
								<div class="wrapper">
									<h6>Delhi Office</h6>
									<p><i class="fa fa-address-book-o" aria-hidden="true"></i>Connaught Place, Delhi, India.</p>
								</div> <!-- /.wrapper -->
							</div>
							<div class="item">
								<div class="wrapper">
									<h6>Bangalore Office</h6>
									<p><i class="fa fa-address-book-o" aria-hidden="true"></i>Koramangala, Bangalore, Karnataka, India.</p>
								</div> <!-- /.wrapper -->
							</div>
							<div class="item">
								<div class="wrapper">
									<h6>Hyderabad Office</h6>
									<p><i class="fa fa-address-book-o" aria-hidden="true"></i>HITEC City, Hyderabad, Telangana, India.</p>
								</div> <!-- /.wrapper -->
							</div>
						</div> <!-- /.address-slider -->
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.branch-address -->
			
			
			


			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<?php include_once('components/footer.php'); ?>
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="assets/vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src='assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script src='assets/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script src='assets/vendor/Camera-master/scripts/camera.min.js'></script>
	    <!-- menu  -->
		<script src="assets/vendor/menu/src/js/jquery.slimmenu.js"></script>
		<!-- WOW js -->
		<script src="assets/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="assets/vendor/jquery.appear.js"></script>
		<script src="assets/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<!-- Validation -->
		<script type="text/javascript" src="assets/vendor/contact-form/validate.js"></script>
		<script type="text/javascript" src="assets/vendor/contact-form/jquery.form.js"></script>
		<!-- Google map js -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQLCCbRKFhsr8BY78g2PQ0_bTyrm_YXU"></script>
		<script src="assets/vendor/sanzzy-map/dist/snazzy-info-window.min.js"></script>

		<!-- Theme js -->
		<script src="assets/js/theme.js"></script>
		<script src="assets/js/map-script.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>

<!-- Mirrored from html.creativegigstf.com/charles/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 07:31:06 GMT -->
</html>