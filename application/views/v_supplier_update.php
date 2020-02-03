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
            <?php echo form_open('supplier/update_process/'.$supplier['id']); ?>
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header" style="padding: 0.25rem 0.25rem">
                <h3 class="card-title">Data Rinci Supplier</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem"> 
                <div class="row">                        
                 <div class="col-4">
                  Kode Supplier <input value="<?php echo $supplier['nosupplier'] ?>" class="form-control form-control-sm" type="text"name="kodesupplier" id="kodesupplier" placeholder="Kode supplier" autocomplete="off" required>
                </div>
                 <div class="col-8">
                  Nama Supplier<input value="<?php echo $supplier['namasupplier'] ?>" class="form-control form-control-sm" type="text" name="namasupplier" placeholder="Nama supplier" id="namasupplier" required="">
                 </div>
                </div> 
                  <div class="row">
                  <div class="col-12">
                    Email <input value="<?php echo $supplier['email'] ?>" class="form-control form-control-sm" type="text" name="emailsupplier" placeholder="Email" id="emailsupplier">
                  </div>
                  <div class="col-12">
                    Telpon <input value="<?php echo $supplier['telpon'] ?>" class="form-control form-control-sm" type="text" name="telponsupplier" placeholder="Telpon supplier" id="telponsupplier"> 
                  </div>
                  <div class="col-12">
                    Alamat
                        <textarea class="form-control" rows="3" placeholder="Alamat supplier ..." name="alamatsupplier"><?php echo $supplier['alamat'] ?></textarea>  
                  </div>
                </div>  <!-- end class row 1 baris inputan mendatar inputan -->      

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
                <h3 class="card-title">Data Kontak Sales</h3>
              </div>
              <div class="card-body" style="padding: 0.25rem">       
              <!--         
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                NAMA <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">    
                -->
                <div class="row">
                  <div class="col-8">
                    Nama Sales <input value="<?php echo $supplier['namasales'] ?>" class="form-control form-control-sm" type="text"name="namasales" id="namasales" placeholder="Nama Sales" autocomplete="off" required> 
                  </div>
                  <div class="col-4">
                    Kontak Sales <input value="<?php echo $supplier['telponsales'] ?>" class="form-control form-control-sm" type="text"name="kontaksales" id="kontaksales" placeholder="Kontak hp/telpon sales" autocomplete="off">
                  </div>
                  <div class="col-12">
                    Keterangan <input value="<?php echo $supplier['keterangan'] ?>" class="form-control form-control-sm" type="text"name="keterangansales" id="keterangansales" placeholder="Keterangan tambahan" autocomplete="off"> 
                  </div>
                </div>  <!-- end class row -->               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
            <!-- Horizontal Form -->
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
