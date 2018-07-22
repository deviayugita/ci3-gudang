<?php $this->load->view('user/header');?> 

	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-12 mt-text text-center animate-box" data-animate-effect="fadeInUp">
					<h1><strong>HALLO!</strong></h1>	
					<h2>Selamat datang datang <?php echo $user->nama ?> <h2 class="badge badge-secondary"><?php echo $user->nama_level ?></h2></h2>
					<h2>di Sistem Inventaris Gudang Pakaian.</h2>
					<!-- <div class="text-center"><a href="#"><button class="btn btn-primary"> LOGIN </button></a></div> -->
				</div>
			</div>
		</div>
	</header>

<!-- - - - - - - - - - - - - -->
</div></div></body>


<?php $this->load->view('footer');?> 