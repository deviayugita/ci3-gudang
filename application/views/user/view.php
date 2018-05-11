<?php $this->load->view('user/header');?>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Detail Atasan</strong></h1>	
					<h2>detail data inventaris kami.</h2>
				</div>
			</div>
		</div>
	</header>




<div class="overflow-hid"> 
		<div class="gtco-section">

			<div class="gtco-container">

				<div class="row">

					<!-- ===========atasan=========== -->
					<?php foreach ($Barang as $row) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="<?php echo site_url('Welcome/detail_barang/'.$row->id_barang)?>" class="gtco-card-item">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="<?php echo site_url('assets/images/'.$row->Gambar) ?>" alt="Image" class="img-responsive">
							</figure>
							<div class="gtco-text">
								<h2><strong><?php echo $row->nama ?></strong></h2>
								<p><?php echo $row->harga ?></p>
								<p><span class="btn btn-primary">Learn more</span></p>
								<!-- <p><span class="btn btn-primary">Delete</span></p> -->

							</div>	
						</a>

					</div>


          <?php } ?>



				</div>

			</div>


		</div>
			

	
	
	


<?php $this->load->view('footer');?> 
