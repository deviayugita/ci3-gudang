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
            <font class="section-subheading text-muted">Insert admin Baru</font></center>
            <br>
            <?php echo form_open_multipart('Welcome/insert_admin', array('class'=>'needs-validation','novalidate'=>'')); ?>
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <p>
                <input type="text" class="form-control ins" name="nama" placeholder="nama" value="<?php echo set_value('nama')?>"></p>
                <p class="help-block text-danger"></p>
                <p>
                <input type="text" class="form-control ins" name="alamat" placeholder="alamat" value="<?php echo set_value('alamat')?>"></p>
                <p class="help-block text-danger"></p>
                <p>
                <input type="text" class="form-control ins" name="no_telp" placeholder="no_telp" value="<?php echo set_value('no_telp')?>"></p>
                <p class="help-block text-danger"></p>

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