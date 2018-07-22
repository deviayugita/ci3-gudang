<?php $this->load->view('admin/header');?> 

  <header>
    <br><br><br>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
    <?php echo form_open_multipart('welcome/insert_kategori', array('class' => 'needs-validation', 'novalidate' => ''));?>
    <?php echo validation_errors(); ?>
                    <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
      <div class="row">
        <div class="col-md-12"><form>
          <div class="row">
                <h2 class="text-center">INPUT KATEGORI</h2>
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