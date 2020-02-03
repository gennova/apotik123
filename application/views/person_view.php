<!DOCTYPE html>
<html> 
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APOTIK PENJUALAN ECERAN</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
      <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('asetku/adminlte/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asetku/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <style type="text/css">
        .dataTables_filter {
        display: none;
    }
    .dataTables_length {
        display: none;
    }
    #totalbayar{
        width: 100%;
         border: none;
  border-bottom: 2px solid red;
    }
    </style>
    <style>
body {
    font-family: Arial, Helvetica, sans-serif;
}
table {
    font-size: 1em;
}
.ui-draggable, .ui-droppable {
    background-position: top;
}
    .custom-combobox {
        position: relative;
        display: inline-block;

    }
    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }
    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
        width: 159%;
        height: 35px;
    }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-inverse{
        background-color: #047c0a;
        border-color: #047c0a;
    }
    .sidenav{
        padding-left: 30px;
    }
</style>
    </head> 
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">APOTIK INDONESIA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('auth/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>online : <?php echo $this->session->userdata('namauser'); ?></h4>
      <span id="time"></span> &nbsp;
      <span id="shift"></span>
      <ul class="nav nav-pills nav-stacked">
        <li>TARGET PENJUALAN</li>
        <li><?php echo $this->session->userdata('targetpenjualan'); ?></li>
      </ul><br>
    </div>
    <div class="col-sm-10">
                <h3>Penjualan Eceran</h3>
        <!-- <input type="text" name="no_invoice" value="<?php echo $invoice;?>">-->      
        <?php echo validation_errors(); ?> 
        <?php echo form_open('transaksi/save'); ?>
        <div class="col-sm-6" style="padding: 1px">
                <div class="col-sm-4">
             <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px; width: 100%">KODE TRX</label> </div>
        <div class="form-group">                            
              <div class="col-sm-8" style="padding: 1px">
                <input name="kodetransaksinya" id="trxcode" placeholder="Pelanggan" class="form-control" type="text"  value="<?php echo $invoice;?>" readonly>
            </div>
        </div> 
        <div class="col-sm-12" style="padding-top: 10px"></div>
        <div class="col-sm-4">
             <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px">Pelanggan</label> </div>
        <div class="form-group">                            
              <div class="col-sm-8" style="padding: 1px">
                <input name="namapelanggan" placeholder="Pelanggan" id="namapelanggan" class="form-control" type="text">
            </div>
        </div>         
        <div class="col-sm-4"><label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px;width: 100%">Cara Bayar</label> </div>
        <div class="form-group">                            
              <div class="col-sm-8" style="padding: 1px">
                <input name="carabayar" placeholder="Cara bayar" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-sm-4">
            <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px;width: 100%">Tracking Code</label> </div>
        <div class="form-group">                            
              <div class="col-sm-8" style="padding: 1px">
                <input name="tipedo" placeholder="Tipe DO" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-sm-4"><label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px">Keterangan</label> </div>
        <div class="form-group">                            
              <div class="col-sm-8" style="padding: 1px">
                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
            </div>
        </div> 
                             &nbsp &nbsp &nbsp <input type="hidden" name="totalbayarnonformat" id="totalbayarnonformat">   
        <div class="col-md-3" style="padding: 0px;padding-left: 20px">
            <button type="submit" id="btnSave" class="btn btn-success">&nbsp &nbsp &nbsp &nbsp Save&nbsp &nbsp &nbsp &nbsp</button>            
        </div>
        </div>  
        
        <div class="col-sm-6">
        TOTAL <h1><input type="text" name="totalbayar" id="totalbayar"><h1>
        </div>   
        
        <?php         
         echo form_close();
         ?>
        <form action="#" id="form">

            <div class="col-sm-12">
                <div class="form-body">
                    <div ng-app="myApp" ng-controller="myCtrl" ng-init="stok='1';jumlah='1';diskonnya='0'">                       
                        <div class="form-group">                            
                            <div class="col-md-3" style="padding: 1px">
                            <select name="firstName" id="barcodenya" class="form-control select2">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->barcode;?>"><?php echo $row->namaproduk;?></option>
                            <?php endforeach;?>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="middleName" ng-model="stok" id="stoka" placeholder="Stok" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">                           
                            <div class="col-md-2" style="padding: 1px">
                                <input name="lastName" id="hargajual" ng-model="hargajual" placeholder="Harga Jual" class="form-control" type="text" readonly>
                                
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="gender" id="jumlah" ng-model="jumlah" value="1" placeholder="Jumlah" class="form-control" type="text">                               
                            </div>                            
                        </div>
                        <div class="col-md-1" style="padding: 1px">
                               <button type="button" id="btnSave" onclick="minus()" class="btn btn-primary">-</button> <button type="button" id="btnSave" onclick="added()" class="btn btn-primary">+</button>
                            </div>
                        <div class="form-group">                            
                            <div class="col-md-2" style="padding: 1px">
                                <input name="address" id="diskoninput" placeholder="Diskon" class="form-control" type="text" ng-model="diskonnya" onmousedown="mouseDown()" onmouseup="mouseUp()" onmouseout="proses()">                               
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="dob" id="dob" value={{diskonnya*jumlah}} class="form-control"  placeholder="Total" type="text">
                            </div>
                        </div>

                            <div class="col-md-1" style="padding: 1px">
                               <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">ADD</button>
                            </div>
                        </div>  <!-- end Angular App controller -->
                    </div>                   
                </div>
                    <!-- <input type="hidden" value="" name="id"/> -->
                    

                </form>
         <div class="col-sm-12">

        <br />
         
        <table id="table" class="table table-condensed"  cellspacing="0" width="100%">
            <thead>
                <tr style="height: 10px;">
                    <th >Barang</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Qty</th>
                    <th>Diskon</th>
                    <th>Total</th>
                    <th style="width:50px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table></div>
    </div>
</div>


    <div class="container">


    </div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
    //console.log('DOING THIS FIRST');
    //datatables
    //var data='TRX3101200001';
    //console.log('DATA '+data);
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('eceran/ajax_list/'.$invoice.'')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('person/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="firstName"]').val(data.firstName);
            $('[name="middleName"]').val(data.middleName);
            $('[name="lastName"]').val(data.lastName);
            $('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
var totalbayar=0;
function save()
{

    save_method = 'add'; 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('eceran/ajax_add')?>";
    } else {
        url = "<?php echo site_url('eceran/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    document.getElementById("totalbayar").value = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(myObj.total);
    if(myObj.total==null){
        document.getElementById('totalbayarnonformat').value=0;
    console.log("Harga"+myObj.total);
    }else{
        document.getElementById('totalbayarnonformat').value=myObj.total;    
    }
    console.log("DATA JSONKU"+myObj.total);
  }
};
var trx= document.getElementById('trxcode').value;
xmlhttp.open("GET", "http://localhost/apotik123/eceran/ajax_list/"+trx, true);
xmlhttp.send();
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string   
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('eceran/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myObj = JSON.parse(this.responseText);
                    document.getElementById("totalbayar").value = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(myObj.total);
                    if(myObj.total==null){
                            document.getElementById('totalbayarnonformat').value=0;
                            console.log("Harga"+myObj.total);
                    }else{
                            document.getElementById('totalbayarnonformat').value=myObj.total;    
                    }
                    console.log("DATA JSONKU"+myObj.total);
                }
            };
            var trx= document.getElementById('trxcode').value;
            xmlhttp.open("GET", "http://localhost/apotik123/eceran/ajax_list/"+trx, true);
            xmlhttp.send();
            
            reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}
var i = document.getElementById("jumlah").value;
function minus(){ 
    if (i > 1) {
            --i;
        }else {
            document.getElementById("jumlah").value = 1;
        }
    var hj = document.getElementById("hargajual").value;
    document.getElementById("jumlah").value = i;
    document.getElementById("dob").value = i*hj;
    console.log(i);
}

function added(){ 
    if (i >= -100) {
            ++i;
        }
    var hj = document.getElementById("hargajual").value;
    document.getElementById("jumlah").value = i;
    document.getElementById("dob").value = i * hj;
    console.log(i);
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
               
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

<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    document.getElementById("totalbayar").value = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(myObj.total);
    if(myObj.total==null){
        document.getElementById('totalbayarnonformat').value=0;
    console.log("Harga"+myObj.total);
    }else{
        document.getElementById('totalbayarnonformat').value=myObj.total;    
    }
    console.log("Harga"+myObj.total);
  }
};
var trx= document.getElementById('trxcode').value;
xmlhttp.open("GET", "http://localhost/apotik123/eceran/ajax_list/"+trx, true);
xmlhttp.send();
</script>

<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.hargabayar = $scope.diskonnya;
});
</script>

<script>
var input = document.getElementById("diskoninput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   var hrgj = document.getElementById('hargajual').value;
   var juml = document.getElementById('jumlah').value;
   var disc = document.getElementById('diskoninput').value;
   var hargaF = parseFloat(hrgj);
   var jmlF = parseFloat(juml);
   var discF = parseFloat(disc);
   var totHargaSebelumDiskon = jmlF*hargaF;
   var totbayarFloat = totHargaSebelumDiskon - ((discF/100)*totHargaSebelumDiskon);
   console.log(hargaF);
   console.log(juml);
   console.log(disc);
   document.getElementById('dob').value=totbayarFloat;   
   event.preventDefault();   
  }
});
function mouseDown() {
  console.log('CLICKED DOWN');
  var hrgj = document.getElementById('hargajual').value;
   var juml = document.getElementById('jumlah').value;
   var disc = document.getElementById('diskoninput').value;
   var hargaF = parseFloat(hrgj);
   var jmlF = parseFloat(juml);
   var discF = parseFloat(disc);
   var totHargaSebelumDiskon = jmlF*hargaF;
   var totbayarFloat = totHargaSebelumDiskon - ((discF/100)*totHargaSebelumDiskon);
   console.log(hargaF);
   console.log(juml);
   console.log(disc);
   document.getElementById('dob').value=totbayarFloat;   
}

function mouseUp() {
  console.log('CLICKED UP');
  var hrgj = document.getElementById('hargajual').value;
   var juml = document.getElementById('jumlah').value;
   var disc = document.getElementById('diskoninput').value;
   var hargaF = parseFloat(hrgj);
   var jmlF = parseFloat(juml);
   var discF = parseFloat(disc);
   var totHargaSebelumDiskon = jmlF*hargaF;
   var totbayarFloat = totHargaSebelumDiskon - ((discF/100)*totHargaSebelumDiskon);
   console.log(hargaF);
   console.log(juml);
   console.log(disc);
   document.getElementById('dob').value=totbayarFloat;   
}
function proses() {
  console.log('on mouse over');
  var hrgj = document.getElementById('hargajual').value;
   var juml = document.getElementById('jumlah').value;
   var disc = document.getElementById('diskoninput').value;
   var hargaF = parseFloat(hrgj);
   var jmlF = parseFloat(juml);
   var discF = parseFloat(disc);
   var totHargaSebelumDiskon = jmlF*hargaF;
   var totbayarFloat = totHargaSebelumDiskon - ((discF/100)*totHargaSebelumDiskon);
   console.log(hargaF);
   console.log(juml);
   console.log(disc);
   document.getElementById('dob').value=totbayarFloat;   
}
</script>

<script>
var input = document.getElementById("namapelanggan");
$(document).on("keydown", ":input:not(textarea)", function(event) {
    if (event.key == "Enter") {
        event.preventDefault();
    }
});
</script>

<script type="text/javascript">
(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
</script>



<!-- jQuery -->
<script src="<?php echo base_url('asetku/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asetku/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('asetku/adminlte/plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- Bootstrap4 Duallistbox -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#barcodenya').change(function(){
            var id=$(this).val();
            console.log("ID "+id);
            $.ajax({
                url : "<?php echo base_url();?>index.php/hargaproduk/get_hproduk_bybarcode/"+id,
                method : "POST",
                async : false,
                dataType : 'json',
                success: function(data){
                    var i;
                    for(i=0; i<data.length; i++){                       
                        console.log("lihat data "+data[i].hargajual);
                        var qty = document.getElementById('jumlah');
                        document.getElementById('hargajual').value=data[i].hargajual;
                        document.getElementById('dob').value=data[i].hargajual; 
                        document.getElementById('diskoninput').value=0;
                        document.getElementById('stoka').value=data[i].jumlahstoka; 
                    }               
                }
            });
        });
    });
</script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script type="text/javascript">
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }
    $( document ).ready(function() {
    console.log( "ready!" );
    var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
    var jambukapagi = 6;
    var jamtutuppagi = 12;
    var jambukasiang = 12;
    var jamtutupsiang = 18;
    if((h>=jambukapagi) && (h<=jamtutuppagi)){
        document.getElementById('shift').innerHTML ="SHIFT PAGI";
    } else if((h>=jambukasiang) && (h<=jamtutupsiang)){
        document.getElementById('shift').innerHTML ="SHIFT SIANG";
    } 
    else{
         document.getElementById('shift').innerHTML ="SHIFT MALAM";
    }
    
});
     
</script>