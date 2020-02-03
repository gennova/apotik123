<!DOCTYPE html>
<html>
<?php 
//include('basehome/headdata.php'); 
include ('basehome/homeheadnavaside.php');
?>
<style type="text/css">
  th,tr{
    white-space: nowrap;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          DATANG GOLONGAN MARGIN          
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-info btn-sm" onclick="location.href='<?php echo base_url('golmargin/insert'); ?>'";>
                  INSERT
                </button><!-- hide button worked
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl">
                  INSERT
                </button>
                <button type="button" class="btn btn-success swalDefaultSuccess btn-sm">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info swalDefaultInfo btn-sm">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-danger swalDefaultError btn-sm">
                  Launch Error Toast
                </button>
                <button type="button" class="btn btn-warning swalDefaultWarning btn-sm">
                  Launch Warning Toast
                </button>
              -->
            </div>

            <!-- /.card-header -->
            <div class="card-body" style="padding: 0.5rem">
              <table id="example1" class="table table-bordered table-striped table-hover" style="line-height: 1px">
                <thead>
                <tr>
                  <th>Nama Golongan Margin</th>
                  <th>Margin Resep</th>
                  <th>Margin Non Resep</th>
                  <th>Status</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($golonganmargins as $key) {
                    echo "<tr><td>".$key->namagolongan."</td><td>".$key->marginresep."</td><td>".$key->marginnonresep."</td><td>".$key->status."</td><td><a href='".base_url('golmargin/delete/').$key->id."' id='btn_delete' onclick='data()'><font color='RED'>DELETE</font></a>  <a href='".base_url('golmargin/update/').$key->id."'>UPDATE</a></td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.end of col 12 -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <style> 
input[type=text] {
  width: 100%;
  padding: 2px 2px;
  margin: 1px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}
</style>
   <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
              <form>
                  <tr><td><label for="fname">Tipe Produk</label>
                      <input type="text" id="fname" name="fname" value="John"></td>
                  </tr>
                  <tr><td><label for="lname">Barcode</label>
                      <input type="text" id="lname" name="lname" value="Doe"></td>
                  </tr>
              </form>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  <?php include('basehome/footerdata.php'); ?>
</body>
</html>

<script type="text/javascript">
var tbl = document.getElementById("example1");
        if (tbl != null) {
            for (var i = 0; i < tbl.rows.length; i++) {
                for (var j = 0; j < tbl.rows[i].cells.length; j++)
                    tbl.rows[i].cells[j].onclick = function () { getval(this); };
            }
        }
        function getval(cel) {            
            console.log(cel.innerHTML)
        }
</script>

<script type="text/javascript">
function data()
{
  var x = confirm("Yakin akan menghapus data ini?");
  if (x)
      return true;
  else
    return false;
}

</script>