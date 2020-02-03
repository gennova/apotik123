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
          JENIS KATEGORI KONTAK         
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl">
                  INSERT
                </button>
                <!-- hide button worked
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
              <table id="apotekerListing" class="table table-bordered table-striped table-hover" style="line-height: 1px">
                <thead>
                <tr>
                  <th>Nama Kategori</th>                  
                  <th>Margin Resep</th>
                  <th>Margin Non Resep</th>
                  <th>Jenis Pembayaran</th>
                  <th>Status</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody id="listPembeli">                    
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
<form id="saveKategoriPembeliForm" method="post">
   <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert Jenis Kontak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
            <div class="col-sm-12">
              <label class="col-sm-3" style="width: 100%">Jenis Kontak</label>              
              <label class="col-sm-2" style="width: 100%">Margin Resep</label>
              <label class="col-sm-2" style="width: 100%">M. Non Resep</label>
              <label class="col-sm-3">Jenis Bayar</label>
              <label class="col-sm-1">Status</label>
            </div>             

              <div class="col-sm-12">
                <div class="row">
                  <div class="col-3"><input type="text" name="jeniskontak" id="jeniskontak" required></div>
                  <div class="col-2"><input type="text" name="marginresep" id="marginresep" required></div>
                  <div class="col-2"><input type="text" name="marginnonresep" id="marginnonresep" required></div>
                  <div class="col-3"><input type="text" name="jenisbayar" id="jenisbayar" required></div>
                  <div class="col-2">
                        <select class="form-control form-control-sm" name="statusjenis" id="statusjenis">
                          <option value="Aktif">Aktif</option>
                          <option value="Non Aktif">Non Aktif</option>
                        </select>   
                  </div> 
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
</div>
      <!-- /.modal -->
<form id="deleteKategoriPembeliForm" method="post">
            <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Jenis Kontak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>YAKIN AKAN MENGHAPUS DATA INI, <br />Data tidak akan bisa dikembalikan?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="kategoriPembeliID" id="kategoriPembeliID" class="form-control">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger swalDefaultSuccessDeleteApoteker">Yes, Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</form>      

<form id="editKategoriPembeliForm" method="post">
   <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Jenis Kontak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
                       <div class="col-sm-12">
              <label class="col-sm-3" style="width: 100%">Jenis Kontak</label>              
              <label class="col-sm-2" style="width: 100%">Margin Resep</label>
              <label class="col-sm-2" style="width: 100%">M. Non Resep</label>
              <label class="col-sm-3">Jenis Bayar</label>
              <label class="col-sm-1">Status</label>
            </div>             

              <div class="col-sm-12">
                <div class="row">
                  <div class="col-3"><input type="text" name="jeniskontak" id="jeniskontaku" required></div>
                  <div class="col-2"><input type="text" name="marginresep" id="marginresepu" required></div>
                  <div class="col-2"><input type="text" name="marginnonresep" id="marginnonresepu" required></div>
                  <div class="col-3"><input type="text" name="jenisbayar" id="jenisbayaru" required></div>
                  <div class="col-2">
                        <select class="form-control form-control-sm" name="statusjenisu" id="statusjenisu">
                          <option value="Aktif">Aktif</option>
                          <option value="Non Aktif">Non Aktif</option>
                        </select>   
                  </div> 
                </div>
                
                            
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="pembIDInput" id="pembIDInput" class="form-control">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary swalDefaultSuccessUpdateApoteker">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</form>
</div>

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