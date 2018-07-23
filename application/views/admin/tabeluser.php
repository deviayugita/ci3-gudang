<!DOCTYPE html>
<html>
<?php $this->load->view('admin/header');?> 
<header>
  <br><br><br>
  </header>

  <!-- ..........BATAS SUCI............... -->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data user</title>
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
    <h2 class="text-center">DATA USER</h2>
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
         <th>Id user</th>
          <th>Nama user</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>No Telepon </th>
          <th>Level </th>
          <!-- <th>Book Category</th> -->

          <!-- <th style="width:125px;">Action
          </p></th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach($user as $tabeluser){?>
             <tr>
                 <td><?php echo $tabeluser->id_user;?></td>
                 <td><?php echo $tabeluser->nama;?></td>
                 <td><?php echo $tabeluser->alamat;?></td>
                 <td><?php echo $tabeluser->email;?></td>
                <td><?php echo $tabeluser->no_tlp;?></td>
                <td><?php echo $tabeluser->nama_level;?></td>
               
<!--                 <td>
                  <button class="btn btn-warning" onclick="edit_tabeluser(<?php echo $tabeluser->id_user;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_tabeluser(<?php echo $tabeluser->id_user;?>)"><i class="glyphicon glyphicon-remove"></i></button>


                </td> -->
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


    function add_tabeluser()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_tabeluser(id_user)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/tabeluser/tabeluser_edit/')?>/" + id_user,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_user"]').val(data.id_user);
            $('[name="nama_user"]').val(data.nama_user);
            $('[name="alamat"]').val(data.alamat);
            $('[name="no_telp"]').val(data.no_telp);
       
          


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
          url = "<?php echo site_url('index.php/tabeluser/tabeluser_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/tabeluser/tabeluser_update')?>";
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

    function delete_tabeluser(id_user)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/tabeluser/tabeluser_delete')?>/"+id,
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
        <h3 class="modal-title">Form Data user</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_user"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">ID user</label>
              <div class="col-md-9">
                <input name="id_user" placeholder="id_user" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama user</label>
              <div class="col-md-9">
                <input name="nama_user" placeholder="nama" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Alamat</label>
              <div class="col-md-9">
                <input name="alamat" placeholder="alamat" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-9">
                <input name="alamat" placeholder="email" class="form-control" type="email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">NO telepon</label>
              <div class="col-md-9">
                <input name="no_telp" placeholder="no_telp" class="form-control" type="text">
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
<?php $this->load->view('admin/footertabel');?>