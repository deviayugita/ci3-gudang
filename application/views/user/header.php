<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gudang &mdash; Fashion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

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

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="http://localhost:8080/ci3-gudang/assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="http://localhost:8080/ci3-gudang/assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">

	<div id="head-top" style="position: absolute; width: 100%; top: 0; ">
		<div class="gtco-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<div id="gtco-logo"><a href="home">WAREHOUSE. <em>.</em></a></div>
					</div>
					<div class="col-md-6 col-xs-6 social-icons">
						<ul class="gtco-social-top">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>	
		</div>
		<nav class="gtco-nav sticky-banner" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-xs-12 menu-1"><center>
						<ul>
							<?php if(!$this->session->userdata('logged_in') || $this->session->userdata('logged_in')) : ?>
							<li class="active">
								<li>
									<a href="<?php echo site_url('Welcome/dashboard/')?>">Home</a>
								</li>
								<li>
									<a href="<?php echo site_url('Welcome/about/')?>">About</a>
								</li>
								<li>
									<a href="<?php echo site_url('Welcome/contact/')?>">Contact</a>
								</li>
								<?php endif; ?>

						<?php if($this->session->userdata('logged_in') && $this->session->userdata('level') == 3 ) : ?> 
								<li>
									<a href="<?php echo site_url('Welcome/readbarang/')?>">View</a>
								</li>
								<?php endif; ?>

								<?php if($this->session->userdata('logged_in')) : ?>
								<li>
									<a href="<?php echo site_url('Tabelbarang/tabel/')?>">Data Barang</a>
								</li>
								<?php endif; ?>
								
							</li>
							




							<?php if(!$this->session->userdata('logged_in')) : ?>
							<li class="">
								<li class="pull-right">
									<a href="<?php echo site_url('Welcome/login/')?>">Login</a>
								</li>
								<li class="pull-right">
									<a href="<?php echo site_url('Welcome/register/')?>">Register</a>
								</li>
							</li>
						<?php endif; ?>
							

							<?php if($this->session->userdata('logged_in')) : ?>
							<li class="">
								<li class="pull-right">
									<a href="<?php echo site_url('Welcome/logout/')?>">Logout</a>
								</li>
							</li>
						<?php endif; ?> 

					</ul>
						</center>
					</div>
				</div>
				
		</nav>
	</div>

	<?php if($this->session->flashdata('user_registered')): ?>
		<?php echo "<script>alert('".$this->session->flashdata('user_registered')."')</script>"; ?>
          <!-- <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?> -->
        <?php endif; ?>
        <?php if($this->session->flashdata('login_failed')): ?>
          <?php echo "<script>alert('".$this->session->flashdata('login_failed')."')</script>"; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
        	<?php echo "<script>alert('".$this->session->flashdata('user_loggedin')."')</script>"; ?>
          <!-- <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?> -->
        <?php endif; ?>

         <?php if($this->session->flashdata('user_loggedout')): ?>
         	<?php echo "<script>alert('".$this->session->flashdata('user_loggedout')."')</script>"; ?>
          <!-- <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</div>'; ?> -->
        <?php endif; ?>