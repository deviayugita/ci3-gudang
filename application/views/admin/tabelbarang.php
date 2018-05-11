<!DOCTYPE html>
<html>
<?php $this->load->view('admin/header');?> 
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row row-mt-15em">
        <div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
          <h1>DATA TABLE <strong>BARANG</strong></h1>  
          <h2>List dan detail dari barang</h2>
        </div>
      </div>
    </div>
  </header>

  <!-- ..........BATAS SUCI............... -->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data barang</title>
    <link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
  </head>
  <body>


  <div class="container">
    <!-- <h1>Data Atasan</h1> -->
</center>
    <br />
   <!--  <button class="btn btn-success" onclick="add_atasantable()"><i class="glyphicon glyphicon-plus"></i> Add Data Atasan</button> -->
    <br />
    <br />
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
         <th>Id Barang</th>
          <th>Nama</th>
          <th>ID Kategori</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>ID admin</th>
          <th>Ukuran</th>
          <th>Tanggal masuk</th>
          <th>Gambar</th>
          <!-- <th>Book Category</th> -->

          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($barang as $tabelbarang){?>
             <tr>
                 <td><?php echo $tabelbarang->id_barang;?></td>
                 <td><?php echo $tabelbarang->nama;?></td>
                 <td><?php echo $tabelbarang->id_kategori;?></td>
                 <td><?php echo $tabelbarang->harga;?></td>
                 <td><?php echo $tabelbarang->jumlah;?></td>
                 <td><?php echo $tabelbarang->id_admin;?></td>
                 <td><?php echo $tabelbarang->ukuran;?></td>
                 <td><?php echo $tabelbarang->tgl_masuk;?></td>
                  <td><?php echo $tabelbarang->Gambar;?></td>
                <td>
                  <button class="btn btn-warning" onclick="edit_tabelbarang(<?php echo $tabelbarang->id_barang;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_tabelbarang(<?php echo $tabelbarang->id_barang;?>)"><i class="glyphicon glyphicon-remove"></i></button>


                </td>
              </tr>
             <?php }?>



      </tbody>
    </table>

  </div>

  <script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
  <script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>


  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add_tabelbarang()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_tabelbarang(id_barang)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/tabelbarang/tabelbarang_edit/')?>/" + id_barang,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_barang"]').val(data.id_barang);
            $('[name="nama"]').val(data.nama);
            $('[name="id_kategori"]').val(data.id_kategori);
            $('[name="harga"]').val(data.harga);
            $('[name="jumlah"]').val(data.jumlah);
            $('[name="id_admin"]').val(data.id_admin);
            $('[name="ukuran"]').val(data.ukuran);
            $('[name="tgl_masuk"]').val(data.tgl_masuk);
            $('[name="Gambar"]').val(data.Gambar);
          


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Atasan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('index.php/tabelbarang/tabelbarang_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/tabelbarang/tabelbarang_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_tabelbarang(id_barang)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/tabelbarang/tabelbarang_delete')?>/"+id_barang,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data barang</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_admin"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">ID barang</label>
              <div class="col-md-9">
                <input name="id_barang" placeholder="id_barang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="nama" placeholder="nama" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">ID Kategori</label>
              <div class="col-md-9">
                <input name="id_kategori" placeholder="id_kategori" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Harga</label>
              <div class="col-md-9">
                <input name="harga" placeholder="harga" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">jumlah</label>
              <div class="col-md-9">
                <input name="jumlah" placeholder="jumlah" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">ID Admin</label>
              <div class="col-md-9">
                <input name="id_admin" placeholder="id_admin" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Ukuran</label>
              <div class="col-md-9">
                <input name="ukuran" placeholder="ukuran" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal masuk</label>
              <div class="col-md-9">
                <input name="tgl_masuk" placeholder="tgl_masuk" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gambar</label>
              <div class="col-md-9">
                <input name="Gambar" placeholder="Gambar" class="form-control" type="text">
              </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  </body>
</html>
<?php $this->load->view('footer');?>