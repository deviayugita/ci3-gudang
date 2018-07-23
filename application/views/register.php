<?php $this->load->view('user/header');?> 

  <header>
 <br><br>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
      <?php
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open('Welcome/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
      

<h2 class="text-center">REGISTER</h2>
          <form>
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

                          <div class="form-group">
                            <label for="">Pilih Paket Member :</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="membership" id="suplier" value="3" checked>
                            <label class="form-check-label" for="suplier">Suplier</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="membership" id="distributor" value="4">
                            <label class="form-check-label" for="distributor">Distributor</label>
                           </div>
                          </div>

                           <div class="clearfix"></div>
                          <div id="success"></div>
                          <center>
                            <input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Daftar"/>
                          </center>
                  
            
          </form>   


    </div>
  </div>
  
<?php 
echo form_close();
$this->load->view('footer');?> 
