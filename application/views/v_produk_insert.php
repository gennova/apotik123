<!DOCTYPE html>
<html>
<?php 
//include('basehome/headdata.php'); 
include ('basehome/homeheadnavaside.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <?php echo validation_errors(); ?>
            <?php echo form_open('produk/insert'); ?>
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">Data Produk</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem"> 
                <div class="row">                        
                 <div class="col-4">
                  Barcode <input class="form-control form-control-sm" type="text"name="barcode" id="myInput" placeholder=" kode barcode produk" autocomplete="off" required>
                </div>
                 <div class="col-8">
                  Nama <input class="form-control form-control-sm" type="text" name="namaproduk" placeholder="nama produk" id="namaproduk">
                 </div>
                </div> 
                  <div class="row">
                  <div class="col-4">
                    Tipe Produk <br>
                        <select class="form-control form-control-sm" name="tipeproduk">
                          <option value="Obat">Obat</option>
                          <option value="Jasa">Jasa</option>
                        </select>   
                  </div>
                  <div class="col-4">
                    Golongan Margin <br>
                        <select class="form-control form-control-sm" name="golonganmargin">
                          <?php
                          foreach ($golonganmargins as $key ) {
                            echo '<option value="'.$key->id.'">'.$key->namagolongan.'</option>';
                          }
                          ?>
                        </select>   
                  </div>
                  <div class="col-4">
                    Golongan Produk <br>
                        <select class="form-control form-control-sm" name="golonganproduk">
                          <?php foreach ($golongans as $item) { 
                          echo '<option value="'.$item->id.'">'.$item->namagolongan.'</option>'; }?>                          
                        </select>   
                  </div>
                </div>  <!-- end class row -->      
                  <div class="row">
                  <div class="col-4">
                    Min. Stok <br>
                        <input class="form-control form-control-sm" type="text" placeholder="Stok minimal" name="minstok">
                  </div>
                  <div class="col-4">
                    Rak <br>
                        <input class="form-control form-control-sm" type="text" placeholder="Lokasi rak" name="rak">
                  </div>
                  <div class="col-4">
                    Pemakaian Obat <br>
                        <select class="form-control form-control-sm" name="pemakaianobat">
                          <option value="Umum">Umum</option>
                          <option value="Obat Luar">Obat Luar</option>
                          <option value="Obat Dalam">Obat Dalam</option>
                        </select>   
                  </div>
                </div>  <!-- end class row -->       
          
                <div class="row">
                  <div class="col-4">
                    Stok Awal <br>
                        <input class="form-control form-control-sm" type="text" placeholder="Stok awal" name="stokawal">
                  </div>
                  <div class="col-4">
                    Expirate Date <br>
                    <input type="text" name="expiratedate" class="form-control form-control-sm datepicker" />
                  </div>
                  <div class="col-4">
                    No Batch <br>
                        <input class="form-control form-control-sm" type="text" placeholder=" batch no" name="nobatch">

                  </div>
                </div>  <!-- end class row -->
                                 <div class="row">  
                 <div class="col-4">
                  Status <br>
                        <select class="form-control form-control-sm" name="statusobat">
                          <option value="Aktif">Aktif</option>
                          <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>   
                </div>
                 <div class="col-8">
                  Keterangan <input class="form-control form-control-sm" type="text" placeholder="keterangan"name="keterangan">
                 </div>
                </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-info">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">Kemasan</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem">
                <div class="row">
                  <div class="col-4">
                    Kemasan Dasar <br>
                        <select class="form-control form-control-sm" name="kemasandasar">
                           <?php foreach ($kemasan as $item) { 
                          echo '<option value="'.$item->id.'">'.$item->namakemasan.'</option>'; }?>
                        </select>   
                  </div>
                  <div class="col-4">
                    Kemasan Lain <br>
                        <select class="form-control form-control-sm" name="kemasan2">
                          <?php foreach ($kemasan as $item) { 
                          echo '<option value="'.$item->id.'">'.$item->namakemasan.'</option>'; }?>
                        </select>   
                  </div>
                  <div class="col-4">
                    Kemasan Lain <br>
                        <select class="form-control form-control-sm" name="kemasan3">
                          <?php foreach ($kemasan as $item) { 
                          echo '<option value="'.$item->id.'">'.$item->namakemasan.'</option>'; }?>
                        </select>   
                  </div>
                </div>  <!-- end class row -->    
                <div class="row">  
                 <div class="col-4">
                  <input class="form-control form-control-sm" type="text" placeholder="isi" value="1" name="isi1">
                </div>
                 <div class="col-4">
                  <input class="form-control form-control-sm" type="text" placeholder="isi" value="1" name="isi2">
                 </div>
                 <div class="col-4">
                  <input class="form-control form-control-sm" type="text" placeholder="isi" value="1" name="isi3">
                 </div>
                </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Horizontal Form -->
        </div>
          <div class="col-md-6">
            <!-- general form elements -->

            <!-- Form Element sizes -->
            <div class="card card-warning">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">Kategori Obat</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem">       
              <!--         
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">    
                -->
                <div class="row">
                  <div class="col-4">
                    Farmakologi <br>
                        <select class="form-control form-control-sm" name="farmakologi">
                          <option value="1">option 1</option>
                          <option value="2">option 2</option>
                          <option value="3">option 3</option>
                          <option value="4">option 4</option>
                          <option value="5">option 5</option>
                        </select>   
                  </div>
                  <div class="col-4">
                    Kategori <br>
                        <select class="form-control form-control-sm" name="kategori">
                          <option value="1">option 1</option>
                          <option value="2">option 2</option>
                          <option value="3">option 3</option>
                          <option value="4">option 4</option>
                          <option value="5">option 5</option>
                        </select>   
                  </div>
                  <div class="col-4">
                    Sub Kategori <br>
                        <select class="form-control form-control-sm" name="subkategori">
                          <option value="1">option 1</option>
                          <option value="2">option 2</option>
                          <option value="3">option 3</option>
                          <option value="4">option 4</option>
                          <option value="5">option 5</option>
                        </select>   
                  </div>
                </div>  <!-- end class row -->               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-danger">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">ISO DIGITAL (Informasi Spesialite Obat)</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem">
                <div class="row">
                  <div class="form-group">
                        Kandungan
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="kandungannya"></textarea>
                  </div>
                  <div class="form-group">
                        Indikasi
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="indikasinya"></textarea>
                  </div>
                  <div class="form-group">
                        Kontra Indikasi
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="kontraindikasinya"></textarea>
                  </div>
                  <div class="form-group">
                        Efek Samping
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="efeksampingannya"></textarea>
                  </div>
              </div>
               <div class="row">
                  <div class="form-group">
                        Dosis
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="dosisnya"></textarea>
                  </div>
                  <div class="form-group">
                        Aturan Pakai
                        <textarea class="form-control" rows="1" placeholder="Enter ..." name="aturanpakainya"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                     <div class="form-group">
                        FDA Pregnancy<br>
                        <select class="form-control form-control-sm" name="fdapregnancy">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="X">X</option>
                        </select>   
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        FDA Latency<br>
                        <select class="form-control form-control-sm" name="fdalatency">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="X">X</option>
                        </select>   
                     </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Horizontal Form -->
        </div>

         <div class="col-md-12">
            <!-- general form elements -->

            <!-- Form Element sizes -->
            <div class="card card-primary">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">Harga Obat</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem">  
                <div class="row" ng-app="" ng-init="resep='10';nonresep='10'" >
                  <div class="col-2">
                    Harga<br>
                        <select class="form-control form-control-sm" name="jenisharga">
                          <option value="eceran">Eceran</option>
                          <option value="grosir">Grosir</option>
                        </select> 
                  </div>
                  <div class="col-2">
                    HNA
                        <input class="form-control form-control-sm" type="text" placeholder="HNA" ng-model="HNA" name="hnanya">
                  </div><div class="col-2">
                    Margin resep (%)
                        <input class="form-control form-control-sm" type="text" value="{{resep}}" placeholder="margin resep (%)" ng-model="resep" name="marginresepnya">
                  </div>
                  <div class="col-2">
                    Margin non resep (%)
                        <input class="form-control form-control-sm" type="text" value="{{nonresep}}" placeholder="margin non resep (%)" ng-model="nonresep" name="marginnonresepnya">
                  </div>
                  <div class="col-2">
                    Harga jual Rp.
                        <input class="form-control form-control-sm" type="text" placeholder="harga jual" value="{{(HNA * 1) + ((HNA * 1)*(resep/100)) }}" name="hargajualnya">
                  </div>
                  <div class="col-2">
                    Harga jual non resep Rp.
                        <input class="form-control form-control-sm" type="text" placeholder="harga jual non resep" value="{{(HNA * 1) + ((HNA * 1)*(nonresep/100)) }}" name="hargajualnonresepnya">
                  </div>                  
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

</form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include('basehome/footerdata.php'); ?>
</body>
</html>
<!-- Include library Bootstrap Datepicker -->
    <script src="<?php echo base_url('asetku/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

    <!-- Include file custom.js -->
    <script src="<?php echo base_url('asetku/bootstrap-datepicker/js/custom.js'); ?>"></script>

    <script>
    $(document).ready(function(){
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })
  </script>
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
        document.getElementById('namaproduk').value="-";
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
      countries[i]=myObj.data[i].barcode;
      console.log(myObj.data[i].barcode);
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
var fetch = angular.module('myapp', []);
fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
 $http({
  method: 'get',
  url: 'http://localhost/apotik/api/produk'
 }).then(function successCallback(response) {
  // Store response data
  $scope.namaku = response.data.data[0].barcode;  
  $scope.namaku2 = response.data.data[1].barcode;
  console.log(response.data.data.length);
 });
}]);

</script>

<script type="text/javascript">
  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
