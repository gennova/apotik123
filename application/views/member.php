<!DOCTYPE html>
<html lang="en">
<?php include('basehome/homeheadnavaside.php'); ?>
?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!-- Page level plugin JavaScript-->

<link rel="stylesheet" href="<?php echo base_url('asetku/adminlte/w3.css'); ?>">
<STYLE TYPE="text/css">

<!--
TD{font-family: Arial; font-size: 11pt;}
TH{font-family: Arial; font-size: 10pt;}
--->
</STYLE>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section id="demo" style="display:block"  class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-md-12">

        <table id="example2" class="table table-striped table-sm" >
               <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="show_data">
                 
            </tbody>
                <!--
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
            -->
              </table>

      </div>
  </div>
</div>
</section>
</div>
<script>    
$(function () {
      "pageLength": 3,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        $('#example2').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/barang/data_barang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td height=2>'+data[i].barang_kode+'</td>'+
                                '<td>'+data[i].barang_nama+'</td>'+
                                '<td>'+data[i].barang_harga+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
    });
 
</script>
<?php
include ('basehome/homefootermin.php');?>

</body>
</html>
