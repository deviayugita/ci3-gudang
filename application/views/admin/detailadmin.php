<?php $this->load->view('admin/header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Detail <strong><?php echo $Admin_list['nama']  ?></strong></h1>
					 <a href="<?php echo site_url( 'Welcome/edit_admin/'.$Admin_list['id_admin']) ?>"><button class="btn btn-primary"> UPDATE </button></a>	
				         <a href="<?php echo site_url( 'Welcome/delete_admin/'.$Admin_list['id_admin']) ?>"><button class="btn btn-primary"> DELETE</button></a>    
                         
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
                      
<font color="white">
          <div class="col-lg-12">
               <div class="col-lg-3"></div>
               <div class="col-lg-3"><label>Nama</label></div>
               <div class="col-lg-1"><label>:</label></div>
               <div class="col-lg-2"><i><?php echo $Admin_list['nama'] ?></i></div>
               <div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
               <div class="col-lg-3"></div>
               <div class="col-lg-3"><label>Alamat</label></div>
               <div class="col-lg-1"><label>:</label></div>
               <div class="col-lg-2"><i><?php echo $Admin_list['alamat'] ?></i></div>
               <div class="col-lg-3"></div>
          </div> 
          <div class="col-lg-12">
               <div class="col-lg-3"></div>
               <div class="col-lg-3"><label>NO telepon</label></div>
               <div class="col-lg-1"><label>:</label></div>
               <div class="col-lg-2"><i><?php echo $Admin_list['no_telp'] ?></i></div>
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