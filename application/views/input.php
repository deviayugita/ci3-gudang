<?php $this->load->view('header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Input <strong>Data Atasan</strong></h1>	
					<h2>inputkan data barang masuk secara lengkap.</h2>
				</div>
			</div>
		</div>
	</header>

	<div class="gtco-section gtco-gray-bg">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<?php echo form_open_multipart('Welcome/create_atasan')?>
              			<div class="row">
                			<div class="col-md-6">
                  				<div class="form-group">
                    				<input class="form-control" type="text" name="Nama" placeholder="Nama">
                  				</div>
                  				<div class="form-group">
                    				<input class="form-control" type="text" name="Jenis" placeholder="Jenis">
                  				</div>
                  				<div class="form-group">
                    				<input class="form-control" type="text" name="Merk" placeholder="Merk">
                  				</div>
                  				<div class="form-group">
                    				<select name="Ukuran" class="form-control">
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
	                    			<input class="form-control" name="Tgl_masuk" type="date" placeholder="Tgl_masuk">
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Harga" type="text" placeholder="Harga">
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Jumlah" type="text" placeholder="Jumlah">
	                  			</div>
	                  			<div class="form-group">
	                    			<input class="form-control" name="Gambar" type="file">
	                  			</div>
	                		</div>
	                		<div class="clearfix"></div>
	                		<div class="col-lg-12 text-center">
	                  			<div id="success"></div>
	                  			<input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Simpan"/>
	                		</div>
              			</div>
            		</form>		
				
				</div>

			</div>
		</div>
	</div>
	
<?php $this->load->view('footer');?> 
