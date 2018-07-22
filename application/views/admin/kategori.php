<?php $this->load->view('admin/header');?>

	<header>
		<br><br><br>
	</header>




<div class="overflow-hid"> 
		<div class="gtco-section">

			<div class="gtco-container">

				<div class="row">
					    <h2 class="text-center">KATEGORI</h2>

					<!-- ===========atasan=========== -->
					<?php foreach ($Kategori as $row) { ?>
					
					<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="jumbotron text-center responsive">	
								<a href="<?php echo site_url('Welcome/detailkategori/'.$row->id_kategori)?>" class="gtco-card-item">
							<div class="gtco-text">
								<h1><strong><?php echo $row->id_kategori ?></strong></h1>
								<p><?php echo $row->nama_kategori ?></p>
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

