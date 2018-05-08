<!DOCTYPE html>
<html>
<?php $this->load->view('header');?> 
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row row-mt-15em">
        <div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
          <h1>DATA TABLE <strong>Bawahan</strong></h1>  
          <h2>List dan detail dari data bawahan</h2>
        </div>
      </div>
    </div>
  </header>

  <!-- ..........BATAS SUCI............... -->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bawahan</title>
    <link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
         <th>Id Bawahan</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Merk </th>
          <th>Ukuran </th>
          <th>Tanggal Masuk </th>
          <th>Harga </th>
          <th>Jumlah </th>
          <th>Gambar </th>
          <!-- <th>Book Category</th> -->

          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($bawahan as $bawahantable){?>
             <tr>
                 <td><?php echo $bawahantable->id_bawahan;?></td>
                 <td><?php echo $bawahantable->Nama;?></td>
                 <td><?php echo $bawahantable->Jenis;?></td>
                <td><?php echo $bawahantable->Merk;?></td>
                <td><?php echo $bawahantable->Ukuran;?></td>
                 <td><?php echo $bawahantable->Tgl_masuk;?></td>
                 <td><?php echo $bawahantable->Harga;?></td>
                <td><?php echo $bawahantable->Jumlah;?></td>
                <td><?php echo $bawahantable->Gambar;?></td>
               
                <td>
                  <button class="btn btn-warning" onclick="edit_bawahantable(<?php echo $bawahantable->id_bawahan;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_bawahantable(<?php echo $bawahantable->id_bawahan;?>)"><i class="glyphicon glyphicon-remove"></i></button>


                </td>
              </tr>
             <?php }?>



      </tbody>
<!-- 
      <tfoot>
        <tr>
          <th>Id Atasan</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Merk </th>
          <th>Ukuran </th>
          <th>Tanggal Masuk </th>
          <th>Harga </th>
          <th>Jumlah </th>
          <th>Gambar </th>
          <th>Action</th>
        </tr>
      </tfoot> -->
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


    function add_bawahantable()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_bawahantable(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/bawahantable/bawahantable_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_bawahan"]').val(data.id_bawahan);
            $('[name="Nama"]').val(data.Nama);
            $('[name="Jenis"]').val(data.Jenis);
            $('[name="Merk"]').val(data.Merk);
            $('[name="Ukuran"]').val(data.Ukuran);
            $('[name="Tgl_masuk"]').val(data.Tgl_masuk);
            $('[name="Harga"]').val(data.Harga);
            $('[name="Jumlah"]').val(data.Jumlah);
            $('[name="Gambar"]').val(data.Gambar);
       
          


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Bawahan'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('index.php/bawahantable/bawahantable_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/bawahantable/bawahantable_update')?>";
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

    function delete_bawahantable(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/bawahantable/bawahantable_delete')?>/"+id,
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
        <h3 class="modal-title">Form Data Bawahan</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_bawahan"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="Nama" placeholder="Nama" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jenis</label>
              <div class="col-md-9">
                <input name="Jenis" placeholder="Jenis" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Merk</label>
              <div class="col-md-9">
                <input name="Merk" placeholder="Merk" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Ukuran</label>
              <div class="col-md-9">
                <input name="Ukuran" placeholder="Ukuran" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal Masuk</label>
              <div class="col-md-9">
                <input name="Tgl_masuk" placeholder="Tanggal Masuk" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Harga</label>
              <div class="col-md-9">
                <input name="Harga" placeholder="Harga" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jumlah</label>
              <div class="col-md-9">
                <input name="Jumlah" placeholder="Jumlah" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gambar</label>
              <div class="col-md-9">
                <input name="Gambar" placeholder="Gambar" class="form-control" type="text">
              </div>
            </div>
            <!-- <div class="form-group">
              <label class="control-label col-md-3">Book Category</label>
              <div class="col-md-9">
                <input name="book_category" placeholder="Book Category" class="form-control" type="text">

              </div>
            </div> -->

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