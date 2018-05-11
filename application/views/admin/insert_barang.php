<?php $this->load->view('admin/header');?>    
<!-- insert -->
    <section class="bg-light" id="insert">
      <div class="container">
          
        </div>
        <div class="row">
          <div class="col-lg-3"></div>
         
          <div class="col-lg-6">
            <div class="jumbotron">
            <center><h2 class="section-heading text-uppercase"><font face="One Stroke Script LET">Insert</font></h2>
            <font class="section-subheading text-muted">Insert Blog Baru</font></center>
            <br>
            <?php echo form_open_multipart('Welcome/insert', array('class'=>'needs-validation','novalidate'=>'')); ?>
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <p>
                <input type="text" class="form-control ins" name="nama" placeholder="nama" value="<?php echo set_value('nama')?>"></p>
                <p class="help-block text-danger"></p>

                <div class="form-group">
               <label>Kategori</label>
               <select name="id_kategori" class="form-control">
                  <option value="empty" hidden="">Piih Kategori</option>
                  <?php
                  foreach ($kategori->result() as $data) {
                    echo "<option value='$data->id_kategori'".set_select('id_kategori',$data->id_kategori).">$data->nama</option>";
                  }
                  ?>
                </select>
              </div>
                <!-- <p class="help-block text-danger"></p> -->

              <p>
                <input type="date" class="form-control ins" name="harga" placeholder="harga" value="<?php echo set_value('harga')?>"></p>
                <p class="help-block text-danger"></p>
              <p>
                <input type="text" class="form-control ins" name="jumlah" placeholder="jumlah" value="<?php echo set_value('jumlah')?>"></p>
                <p class="help-block text-danger"></p>

              <div class="form-group">
               <label>Admin</label>
               <select name="id_admin" class="form-control">
                  <option value="empty" hidden="">Piih Admin</option>
                  <?php
                  foreach ($admin->result() as $data) {
                    echo "<option value='$data->id_admin'".set_select('id_admin',$data->id_admin).">$data->nama</option>";
                  }
                  ?>
                </select>
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
               <div class="form-group">
	                    			<input class="form-control" name="tgl_masuk" type="date" placeholder="Tgl_masuk">
	                  			</div>
              
              <p>
                <input type="file" class="form-control ins" name="userfile" placeholder="Foto"></p>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
          </div>
            <?php echo form_close(); ?>
             <!-- </form> -->
          </div>
        </div>

          <div class=col-lg-3""></div>

        </div>
      </div>
    </section>

<?php $this->load->view('Profil/Footer');?>