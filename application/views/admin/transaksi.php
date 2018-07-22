<?php $this->load->view('admin/header');?> 

  <header>
    <br><br><br>
  </header>

  <div class="gtco-section gtco-gray-bg">
    <div class="gtco-container">
   
      <div class="row">
        <div class="col-md-12">
          <div class="row">
                <h2 class="text-center">TAMBAH QUANTITY</h2>
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