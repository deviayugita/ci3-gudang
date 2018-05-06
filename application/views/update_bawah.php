<?php $this->load->view('header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Update <strong>Barang</strong></h1>	
					<h2>inputkan data secara lengkap.</h2>
				</div>
			</div>
		</div>
	</header>

	<div class="gtco-section gtco-gray-bg">
		<div class="gtco-container">
			<?php echo validation_errors(); ?>
            <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
			<?php echo form_open_multipart('Welcome/edit_bawahan/'.$bawahan['id_bawahan'], array('class' => 'needs-validation', 'novalidate' => '')); ?>
			<div class="row">
				<div class="col-md-12"><form>
            		<div class="row">
						<div class="col-md-6">
								<div class="form-group">
                    				<input class="form-control" type="text" name="Nama" value="<?php echo set_value('Nama', $bawahan['Nama'] ) ?>" placeholder="Nama" required>
                  				</div>
                  				<div class="form-group">
                    				<input class="form-control" type="text" name="Jenis" value="<?php echo set_value('Jenis', $bawahan['Jenis']) ?>" placeholder="Jenis" required>
                  				</div>
                  				<div class="form-group">
                    				<input class="form-control" type="text" name="Merk" value="<?php echo set_value('Merk', $bawahan['Merk']) ?>" placeholder="Merk" required>
                  				</div>
                  				<div class="form-group">
                    				<select name="Ukuran" value="<?php echo set_value('Ukuran', $bawahan['Ukuran']) ?>" class="form-control" required>
				                    	<option hidden="" selected="">Pilih</option>
				                    	<option value="S">S</option>
				                    	<option value="M">M</option>
				                    	<option value="L">L</option>
				                    	<option value="XL">XL</option>
				                    	<option value="XXL">XXL</option>
                    				</select> 
                  				</div>
                			</div>
	                		<div class="col-md-6">
	                			<div class="form-group">
	                    			<input class="form-control" name="Tgl_masuk" value="<?php echo set_value('Tgl_masuk', $bawahan['Tgl_masuk']) ?>" type="date" placeholder="Tgl_masuk" required>
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Harga" value="<?php echo set_value('Harga', $bawahan['Harga']) ?>" type="text" placeholder="Harga" required>
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Jumlah" value="<?php echo set_value('Jumlah', $bawahan['Jumlah']) ?>" type="text" placeholder="Jumlah" required>
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Gambar" type="file">
	                  			</div>
	                		</div>
	                	<div class="clearfix"></div>
	                		<div class="col-lg-12 text-center">
	                  			<div id="success"></div>
	                  			<input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Update"/>
	                		
	                	
	                  			
	                		</div>
              			</div>
						
					</form>		

				</div>

			</div>
		</div>
	</div>
	
<?php 
echo form_close();
$this->load->view('footer');?> 
