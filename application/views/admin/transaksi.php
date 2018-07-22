<?php $this->load->view('admin/header');?> 

  <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row row-mt-15em">
        <div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
          <h1>Tambahkan <strong>Quantity</strong></h1>
          
      </div>
    </div>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
   
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?=form_open('Tabelbarang/tambah_jumlah') ?>
                <h1>Detail <strong><?php echo $Barang_list['nama']  ?></strong></h1> 
                  
                <p>
                <input type="hidden" name="id_barang" value="<?php echo $Barang_list['id_barang']  ?>">
                <input type="hidden" name="jumlah_brg" value="<?php echo $Barang_list['jumlah']  ?>">
                <input type="text" class="form-control ins" name="jumlah" placeholder="Tambah Quantity" value="<?php echo set_value('jumlah')?>"></p>
                <p class="help-block text-danger"></p>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <?=form_close()?>
              </div>
            </div>
          </div></form>
        </div>
      </div>
    </div>
  </div>
<?php 

$this->load->view('footer');?> 