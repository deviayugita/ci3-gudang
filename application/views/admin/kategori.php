<?php $this->load->view('admin/header');?>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Kategori</strong></h1>	
					<h2>detail data kategori kami.</h2>
				</div>
			</div>
		</div>
	</header>




<div class="overflow-hid"> 
		<div class="gtco-section">

			<div class="gtco-container">

				<div class="row">

					<!-- ===========atasan=========== -->
					<?php foreach ($Kategori as $row) { ?>
					
					<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="jumbotron text-center responsive">	
								<a href="<?php echo site_url('Welcome/detailkategori/'.$row->id_kategori)?>" class="gtco-card-item">
							<div class="gtco-text">
								<h1><strong><?php echo $row->id_kategori ?></strong></h1>
								<p><?php echo $row->nama ?></p>
							</div></a>
							</div>
					</div>


          <?php } ?>



				</div>

			</div>


		</div>
			

	
	
	


<?php $this->load->view('footer');?> 

