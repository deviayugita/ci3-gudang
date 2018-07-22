<?php $this->load->view('admin/header');?>

	<header>
		<br><br><br>
	</header>




<div class="overflow-hid"> 
		<div class="gtco-section">

			<div class="gtco-container">

				<div class="row">
    <h2 class="text-center">DATA BARANG</h2>
					<!-- ===========atasan=========== -->
					<?php foreach ($Barang as $row) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="<?php echo site_url('Welcome/detailbarang/'.$row->id_barang)?>" class="gtco-card-item">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="<?php echo site_url('assets/images/'.$row->Gambar) ?>" alt="Image" class="img-responsive">
							</figure>
							<div class="gtco-text">
								<h2><strong><?php echo $row->nama ?></strong></h2>
								<p><?php echo $row->harga ?></p>
								<small class="text-success text-uppercase"><?php echo $row->nama_kategori ?></small>
                            <br>
								<p><span class="btn btn-primary">Learn more</span></p>
								<!-- <p><span class="btn btn-primary">Delete</span></p> -->

							</div>	
						</a>

					</div>


          <?php } ?>


				</div>

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

