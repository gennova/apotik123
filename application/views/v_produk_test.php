<!DOCTYPE html>
<html>
<head>
	<title>Select berhubungan dengan codeigniter dan ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<br/>
	<div class="col-md-6 col-md-offset-3">
		<div class="thumbnail">
			<h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
			<form class="form-horizontal">
				<div class="form-group">
	                <label class="control-label col-md-3">Kategori</label>
	                <div class="col-md-8">
	                    <select name="kategori" id="kategori" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    	<?php foreach($data->result() as $row):?>
	                    		<option value="<?php echo $row->produk_id;?>"><?php echo $row->namaproduk;?></option>
	                    	<?php endforeach;?>
	                    </select>
	                </div>
	            </div>
	            <h1 id="barcode"></h1>
			</form>
			<hr/>
			<p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
			console.log("ID "+id);
			$.ajax({
				url : "<?php echo base_url();?>index.php/produk/get_produk_byID/"+id,
				method : "POST",
				async : false,
		        dataType : 'json',
				success: function(data){
					var i;
					for(i=0; i<data.length; i++){		                
		                console.log("lihat data "+data[i].barcode);
		                console.log("lihat data "+data[i].namaproduk);
		                document.getElementById('barcode').innerHTML=data[i].barcode;
		            }				
				}
			});
		});
	});
</script>
</body>
</html>