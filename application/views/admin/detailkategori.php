<?php $this->load->view('user/header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1><?php echo $Kategori_list['nama_kategori']  ?></h1>
					 <a href="<?php echo site_url( 'Welcome/edit_kategori/'.$Kategori_list['id_kategori']) ?>"><button class="btn btn-primary"> UPDATE </button></a>	
				         <a href="<?php echo site_url( 'Welcome/delete_kategori/'.$Kategori_list['id_kategori']) ?>"><button class="btn btn-primary"> DELETE</button></a>    
                         
                    </div>
			</div>
		</div>
	</header>







<?php $this->load->view('footer');?> 