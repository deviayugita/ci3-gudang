<?php $this->load->view('user/header');?> 

  <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner"  data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row row-mt-15em">
        <div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
          <h1>Registrasi <strong></strong></h1> 
          
      </div>
    </div>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
      <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open('Welcome/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
      <div class="row">
        <div class="col-md-12"><form>
                <div class="row">
            <div class="col-md-6">
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Nama</span>
                            <input class="form-control" type="text" name="nama"  placeholder="Nama" required>
                          </div><br> 
                          
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Alamat</span>
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
                          </div><br>
                        
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Email</span>
                            <input class="form-control" type="text" name="email"  placeholder="Email" required>
                          </div><br>

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">No tlp</span>
                            <input class="form-control" type="text" name="no_tlp"  placeholder="no_tlp" required>
                          </div><br>

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Username</span>
                            <input class="form-control" type="text" name="username"  placeholder="Username" required>
                          </div><br>

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Password</span>
                            <input class="form-control" type="password" name="password"  placeholder="Password" required>
                          </div><br>

                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Konfirmasi Password</span>
                            <input class="form-control" type="password" name="password2"  placeholder="Konfirmasi Password" required>
                          </div><br>
                        </div>

                    
                    <div class="clearfix"></div>
                      <div class="col-lg-12 text-center">
                          <div id="success"></div>
                          <input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Daftar"/>
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
