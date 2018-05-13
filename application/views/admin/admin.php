<?php $this->load->view('admin/header');?>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Admin</strong></h1>	
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
					<?php foreach ($Admin as $row) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="jumbotron text-center responsive">
								<a href="<?php echo site_url('Welcome/detailadmin/'.$row->id_admin)?>" class="gtco-card-item">
							<div class="gtco-text">
								<h1><strong><?php echo $row->id_admin ?></strong></h1>
								<p><?php echo $row->nama_admin ?></p>
							</div></a>
							</div>
					</div>


          <?php } ?>



				</div>

			</div>


		</div>
			
<center>
	    	<?php 
        if (isset($links)) {
            echo $links;
        } 
        ?></center>
	
	
	


<?php $this->load->view('footer');?> 

