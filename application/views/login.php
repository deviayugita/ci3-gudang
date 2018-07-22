<?php $this->load->view('user/header');?> 

  <header>
 <br><br>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
      <?php echo form_open('Welcome/login'); ?> 
      <!-- <?php echo form_open_multipart(current_url()); ?> -->
   
      <div class="row">
        <div class="col-md-3"></div>
          <form>
            <div class="col-md-6">
              <div class="jumbotron">

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
                    <h2 class="text-center">LOGIN</h2> 
                          <div class="form-group">
                           <!--  <span class="input-group-addon" id="basic-addon1">Username</span> -->
                            <input class="form-control" type="text" name="username"  placeholder="Username" required autofocus>
                          </div><br>

                          <div class="form-group">
                           <!--  <span class="input-group-addon" id="basic-addon1">Password</span> -->
                            <input class="form-control" type="password" name="password"  placeholder="Password" required>
                          </div><br>

                    <div class="clearfix"></div>
                      <div class="col-lg-12 text-center">
                          <div id="success"></div>
                          <input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Login"/>
                      </div>
                      <br>
</div>
<div class="col-md-1"></div>
</div>

            </div>
            </div>
          </form> 
       <div class="col-md-3"></div>
      </div>

    </div>
  </div>
  
<?php 
echo form_close();
$this->load->view('footer');?> 
