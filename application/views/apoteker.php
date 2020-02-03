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
          DATA PRODUK          
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl">
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
              <table id="employeeListing" class="table table-bordered table-striped table-hover" style="line-height: 1px">
                <thead>
                <tr>
                  <th>No Jasa</th>
                  <th>Nama Jasa</th>
                  <th>Nominal</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody id="listRecords">                    
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
<form id="saveEmpForm" method="post">
   <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert Jasa Apoteker</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
            <div class="col-sm-12">
              <label class="col-sm-1">No Jasa</label>
              <label class="col-sm-3">Nama Jasa</label>
              <label class="col-sm-2">Nominal</label>
              <label class="col-sm-2">Status</label>
              <label class="col-sm-3">Keterangan</label>
            </div>             
              <div class="col-sm-12">
                <input type="text" class="col-sm-1" name="nojasa" id="nojasa" required>
                <input type="text" class="col-sm-3" name="namajasa" id="namajasa" required>
                <input type="text" class="col-sm-2" name="nominal" id="nominal" required>
                <input type="text" class="col-sm-2" name="status" id="status" required>
                <input type="text" class="col-sm-3" name="keterangan" id="keterangan" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary swalDefaultSuccessInputApoteker">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</form>
      <!-- /.modal -->
<form id="deleteEmpForm" method="post">
            <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Jasa Apoteker</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>YAKIN AKAN MENGHAPUS DATA INI, <br />Data tidak akan bisa dikembalikan?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="ApotekerIDInput" id="ApotekerIDInput" class="form-control">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger swalDefaultSuccessDeleteApoteker">Yes, Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</form>      

<form id="editEmpForm" method="post">
   <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Jasa Apoteker</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
            <div class="col-sm-12">
              <label class="col-sm-1">No Jasa</label>
              <label class="col-sm-3">Nama Jasa</label>
              <label class="col-sm-2">Nominal</label>
              <label class="col-sm-2">Status</label>
              <label class="col-sm-3">Keterangan</label>
            </div>             
              <div class="col-sm-12">
                <input type="text" class="col-sm-1" name="njasa" id="njasa" class="form-control" required>
                <input type="text" class="col-sm-3" name="nmjasa" id="nmjasa" class="form-control" required>
                <input type="text" class="col-sm-2" name="nnominal" id="nnominal" class="form-control" required>
                <input type="text" class="col-sm-2" name="nstat" id="nstat" class="form-control" required>
                <input type="text" class="col-sm-3" name="nket" id="nket" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="empId" id="empId" class="form-control">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary swalDefaultSuccessUpdateApoteker">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</form>
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