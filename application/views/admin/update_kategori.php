<?php $this->load->view('admin/header');?> 


  <header>
    <br><br><br>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
      <?php echo validation_errors(); ?>
            <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
      <?php echo form_open_multipart(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>
      <div class="row">
        <div class="col-md-12"><form>
                <div class="row">
                      <h2 class="text-center">UPDATE KATEGORI</h2>
            <div class="col-md-6">
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Nama</span>
                            <input class="form-control" type="text" name="nama_kategori" value="<?php echo set_value('nama_kategori', $Kategori->nama_kategori) ?>" placeholder="Nama" required>
                          </div><br>

                          
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
