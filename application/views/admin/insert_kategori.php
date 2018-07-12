<?php $this->load->view('user/header');?> 

  <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row row-mt-15em">
        <div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
          <h1>Tambahkan <strong>Kategori</strong></h1> 
          <h2>inputkan data secara lengkap.</h2>
        </div>
      </div>
    </div>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
    <?php echo form_open_multipart('welcome/insert_kategori', array('class' => 'needs-validation', 'novalidate' => ''));?>
    <?php echo validation_errors(); ?>
                    <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
      <div class="row">
        <div class="col-md-12"><form>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <p>
                <input type="text" class="form-control ins" name="nama_kategori" placeholder="nama" value="<?php echo set_value('nama_kategori')?>"></p>
                <p class="help-block text-danger"></p>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
              </div>
            </div>
          </div></form>
        </div>
      </div>
    </div>
  </div>
<?php 
echo form_close();
$this->load->view('footer');?> 