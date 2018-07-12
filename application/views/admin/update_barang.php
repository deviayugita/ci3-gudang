<?php $this->load->view('user/header');?> 


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
      <?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
      <div class="row">
        <div class="col-md-12"><form>
                <div class="row">
            <div class="col-md-6">
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Nama</span>
                            <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama', $Barang['nama'] ) ?>" placeholder="Nama" required>
                          </div><br>

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Kategori</span>
                            <?php echo form_dropdown('id_kategori', $dropdown_kategori, set_value('id_kategori',$Barang['id_kategori']), 'class="form-control" required' ); ?>
                          </div><br>
                          
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Harga</span>
                            <input class="form-control" type="text" name="harga" value="<?php echo set_value('harga', $Barang['harga']) ?>" placeholder="Harga" required>
                          </div><br>
                        

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Jumlah</span>
                            <input class="form-control" type="text" name="jumlah" value="<?php echo set_value('jumlah', $Barang['jumlah'] ) ?>" placeholder="Jumlah" required>
                          </div><br>
                        </div>

                    
                          <div class="col-md-6">
                          <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Admin</span>
                        <?php echo form_dropdown('id_admin', $dropdown_admin, set_value('id_admin',$Barang['id_admin']), 'class="form-control" required'); ?>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Ukuran</span>
                            <?php echo form_dropdown('id_ukuran', $dropdown_ukuran, set_value('id_ukuran',$Barang['id_ukuran']), 'class="form-control" required'); ?>
                          </div><br>
                      
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Tanggal Masuk</span>
                            <input class="form-control" name="tgl_masuk" value="<?php echo set_value('tgl_masuk', $Barang['tgl_masuk']) ?>" type="date" placeholder="Tanggal Masuk" required>
                          </div><br>
                          
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Gambar</span>
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
