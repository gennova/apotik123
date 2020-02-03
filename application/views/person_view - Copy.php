<!DOCTYPE html>
<html> 
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APOTIK PENJUALAN ECERAN</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style type="text/css">
        .dataTables_filter {
        display: none;
    }
    .dataTables_length {
        display: none;
    }
    </style>
    </head> 
<body>
    <div class="container">
        <h3>Penjualan Eceran</h3>
        <!-- <input type="text" name="no_invoice" value="<?php echo $invoice;?>">-->      
        <?php echo validation_errors(); ?> 
        <?php echo form_open('transaksi/save'); ?>
        <div class="col-sm-6" style="padding: 1px">
                <div class="col-sm-3">
             <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px; width: 100%">KODE TRX</label> </div>
        <div class="form-group">                            
              <div class="col-sm-9" style="padding: 1px">
                <input name="kodetransaksinya" placeholder="Pelanggan" class="form-control" type="text"  value="<?php echo $invoice;?>" readonly>
            </div>
        </div> 
        <div class="col-sm-12" style="padding-top: 10px"></div>
        <div class="col-sm-3">
             <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px">Pelanggan</label> </div>
        <div class="form-group">                            
              <div class="col-sm-9" style="padding: 1px">
                <input name="namapelanggan" placeholder="Pelanggan" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-sm-3">
            <label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px;width: 100%">Tipe DO</label> </div>
        <div class="form-group">                            
              <div class="col-sm-9" style="padding: 1px">
                <input name="tipedo" placeholder="Tipe DO" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-sm-3"><label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px;width: 100%">Cara Bayar</label> </div>
        <div class="form-group">                            
              <div class="col-sm-9" style="padding: 1px">
                <input name="carabayar" placeholder="Cara bayar" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-sm-3"><label class="control-label col-md-2" style="padding-top: 8px; padding-left: 1px">Keterangan</label> </div>
        <div class="form-group">                            
              <div class="col-sm-9" style="padding: 1px">
                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
            </div>
        </div> 
        <div class="col-md-3" style="padding: 0px;padding-left: 20px">
            <button type="submit" id="btnSave" class="btn btn-success">&nbsp &nbsp &nbsp &nbsp Save&nbsp &nbsp &nbsp &nbsp</button>            
        </div>
        </div>  
        
        <div class="col-sm-6">
        TOTAL <h1><input type="text" name="totalbayar" id="totalbayar"><h1>
        </div>   
        <input type="hidden" name="totalbayarnonformat" id="totalbayarnonformat">   
        <?php         
         echo form_close();
         ?>
        <form action="#" id="form">
            <div class="col-sm-12">
                <div class="form-body">
                        <div class="form-group">                            
                            <div class="col-md-3" style="padding: 1px">
                                <input name="firstName" placeholder="Barang" class="form-control" type="text" id="myInput" autocomplete="on">      

                            </div>
                        </div>

                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="middleName" placeholder="Stok" class="form-control" type="text">
                                
                            </div>
                        </div>
                        <div class="form-group">                           
                            <div class="col-md-2" style="padding: 1px">
                                <input name="lastName" placeholder="Harga Jual" class="form-control" type="text">
                                
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="gender" id="jumlah" value="1" placeholder="Jumlah" class="form-control" type="text">                               
                            </div>                            
                        </div>
                        <div class="col-md-1" style="padding: 1px">
                               <button type="button" id="btnSave" onclick="minus()" class="btn btn-primary">-</button> <button type="button" id="btnSave" onclick="added()" class="btn btn-primary">+</button>
                            </div>
                        <div class="form-group">                            
                            <div class="col-md-2" style="padding: 1px">
                                <input name="address" placeholder="Diskon" class="form-control" type="text">                               
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="col-md-1" style="padding: 1px">
                                <input name="dob" id="dob" class="form-control"  placeholder="Total" type="text">
                            </div>
                        </div>

                            <div class="col-md-1" style="padding: 1px">
                               <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">ADD</button>
                            </div>
                        
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
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
    //console.log('DOING THIS FIRST');
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('person/ajax_list')?>",
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
        url = "<?php echo site_url('person/ajax_add')?>";
    } else {
        url = "<?php echo site_url('person/ajax_update')?>";
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
    console.log("DATA JSONKU"+myObj.total);
  }
};
xmlhttp.open("GET", "http://localhost/apotik/eceran/ajax_list", true);
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
            url : "<?php echo site_url('person/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myObj = JSON.parse(this.responseText);
                    document.getElementById("totalbayar").value = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(myObj.total);
                    console.log("DATA JSONKU"+myObj.total);
                }
            };
            xmlhttp.open("GET", "http://localhost/apotik/eceran/ajax_list", true);
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
    document.getElementById("jumlah").value = i;
    console.log(i);
}

function added(){ 
    if (i >= -100) {
            ++i;
        }
    document.getElementById("jumlah").value = i;
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
function autocomplete(inp, arr) {
  var myObj;
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        document.getElementById('middleName').value="-";
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var countries =[];
var i=0;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    // Loop through Object and create peopleHTML
    //alert(myObj.data[1].barcode);
    for (var i = 0; i<myObj.data.length; i++) {
      countries[i]=myObj.data[i].namaproduk;
      console.log(myObj.data[i].namaproduk);
    }
  }
};
xmlhttp.open("GET", "http://localhost/apotik/api/produk?id=1", true);
xmlhttp.send();

/*An array containing all the country names in the world:
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
*/
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>


<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    document.getElementById("totalbayar").value = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(myObj.total);
    console.log("DATA JSONKU"+myObj.total);
  }
};
xmlhttp.open("GET", "http://localhost/apotik/eceran/ajax_list", true);
xmlhttp.send();
</script>
