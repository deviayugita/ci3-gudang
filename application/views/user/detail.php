<?php $this->load->view('user/header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Detail <strong><?php echo $Barang_list['nama']  ?></strong></h1>
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
            <p><?php echo "<img src='".base_url()."assets/images/".$Barang_list['Gambar']."' width='200' height='150'>"?></p>
          </div>
<font color="white">
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Nama</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Barang_list['nama'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Kategori</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Barang_list['nama_kategori'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Harga</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Barang_list['harga'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Jumlah</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Barang_list['jumlah'] ?></i></div>
          	<div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
               <div class="col-lg-3"></div>
               <div class="col-lg-3"><label>Ukuran</label></div>
               <div class="col-lg-1"><label>:</label></div>
               <div class="col-lg-2"><i><?php echo $Barang_list['nama_ukuran'] ?></i></div>
               <div class="col-lg-3"></div>
          </div>
          <div class="col-lg-12">
          	<div class="col-lg-3"></div>
          	<div class="col-lg-3"><label>Tanggal Masuk</label></div>
          	<div class="col-lg-1"><label>:</label></div>
          	<div class="col-lg-2"><i><?php echo $Barang_list['tgl_masuk'] ?></i></div>
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