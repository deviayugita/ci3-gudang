<?php $this->load->view('header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Detail <strong><?php echo $Bawahan_list['Nama']  ?></strong></h1>
					 <a href="<?php echo site_url( 'Welcome/edit_bawahan/'.$Bawahan_list['id_bawahan']) ?>"><button class="btn btn-primary"> UPDATE </button></a>	
				</div>
			</div>
		</div>
	</header>



<section id="about">
	<div class="gtco-cover gtco-cover-sm" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_2.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<div class="row">
						 <div class="col-lg-12 text-center">
            <p><?php echo "<img src='".base_url()."assets/images/".$Bawahan_list['Gambar']."' width='200' height='150'>"?></p>
          </div>
<font color="white">
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Jenis</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Nama'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Jenis</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Jenis'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Merk</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Merk'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Ukuran</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Ukuran'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Tanggal Masuk</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Tgl_masuk'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Harga</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Harga'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Jumlah</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Bawahan_list['Jumlah'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div>          
</font>
					</div>

					</div>
					<div class="col-md-3"></div>
				</div>
						
				</div>	
			</div>
</section>





<?php $this->load->view('footer');?> 