$(document).ready(function(){
	listEmployee();		
	var table = $('#kategoriListing').dataTable({     
		"bPaginate": true,
		"searching": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all employee in datatable
	function reload_table(){
		//location.reload(false);		
		//table.ajax.reload(null,false); //reload datatable ajax 
		oTable.api().ajax.reload();
	}
	function listEmployee(){		
		$.ajax({
			type  : 'ajax',
			url   : 'http://localhost/apotik123/katseller/show',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].jeniskontak+'</td>'+
							'<td>'+data[i].marginresep+'</td>'+		                        
							'<td>'+data[i].marginnonresep+'</td>'+
							'<td>'+data[i].jenispembayaran+'</td>'+
							'<td>'+data[i].status+'</td>'+
							'<td style="text-align:center;">'+
								'<a href="javascript:void(0);" class="editRecord" data-id="'+data[i].id+'" data-jeniskontak="'+data[i].jeniskontak+'" data-marginresep="'+data[i].marginresep+'" data-marginnonresep="'+data[i].marginnonresep+'" data-jenisbayar="'+data[i].jenispembayaran+'" data-status="'+data[i].status+'"><font color="BLUE">Edit</font></a>'+' '+
								'<a href="javascript:void(0);" class="deleteRecord" data-id="'+data[i].id+'"><font color="RED">Delete</font></a>'+
							'</td>'+
							'</tr>';
				}
				$('#listPembeli').html(html);					
			}
		});		
	}
	// save new employee record
	$('#saveKategoriPembeliForm').submit('click',function(){
		console.log("Insert method");
		var JENISKONTAK = $('#jeniskontak').val();
		var MARGINRESEP = $('#marginresep').val();
		var MARGINNONRESEP = $('#marginnonresep').val();
		var JENISBAYAR = $('#jenisbayar').val();
		var STATUS = $( "#statusjenis option:selected" ).val();	
		console.log(JENISKONTAK);
		console.log(MARGINRESEP);
		console.log(MARGINNONRESEP);
		console.log(JENISBAYAR);	
		console.log(STATUS);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/katseller/save",
			dataType : "JSON",
			data : {jeniskontak:JENISKONTAK, marginresep:MARGINRESEP, marginnonresep:MARGINNONRESEP,jenisbayar:JENISBAYAR,status:STATUS},
			success: function(data){
				$('#jeniskontak').val("");
				$('#jenisbayar').val("");
				$('#marginresep').val("");
				$('#marginnonresep').val("");
				$('#modal-xl').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
	// show edit modal form with emp data
	$('#listPembeli').on('click','.editRecord',function(){
		$('#modal-update').modal('show');
		$("#pembIDInput").val($(this).data('id'));
		$("#jeniskontaku").val($(this).data('jeniskontak'));
		$("#jenisbayaru").val($(this).data('jenisbayar'));
		$("#marginresepu").val($(this).data('marginresep'));
		$("#marginnonresepu").val($(this).data('marginnonresep'));
		$("#statusjenisu").val($(this).data('status'));
	});
	// save edit record
	 $('#editKategoriPembeliForm').on('submit',function(){
	 	console.log("Update "+$('#pembIDInput').val())
	 	var pembID = $('#pembIDInput').val();
		var JENISKONTAK = $('#jeniskontaku').val();
		var MARGINRESEP = $('#marginresepu').val();
		var MARGINNONRESEP = $('#marginnonresepu').val();
		var JENISBAYAR = $('#jenisbayaru').val();
		var STATUS = $( "#statusjenisu option:selected" ).val();	
		console.log(JENISKONTAK);
		console.log(MARGINRESEP);
		console.log(MARGINNONRESEP);
		console.log(JENISBAYAR);	
		console.log(STATUS);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/katseller/update",
			dataType : "JSON",
			data : {id:pembID,jeniskontak:JENISKONTAK, marginresep:MARGINRESEP, marginnonresep:MARGINNONRESEP,jenisbayar:JENISBAYAR,status:STATUS},
			success: function(data){
				$('#jeniskontak').val("");
				$('#jenisbayar').val("");
				$('#marginresep').val("");
				$('#marginnonresep').val("");
				$('#modal-update').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
	// show delete form
	$('#listPembeli').on('click','.deleteRecord',function(){
		var pembID = $(this).data('id');          
		console.log("Kategori Pembeli ID "+pembID);  
		$('#modal-default').modal('show');
		$('#kategoriPembeliID').val(pembID);
	});
	// delete emp record
	 $('#deleteKategoriPembeliForm').on('submit',function(){
		var pembID = $('#kategoriPembeliID').val();
		console.log("Deleted "+pembID);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/katseller/delete",
			dataType : "JSON",  
			data : {id:pembID},
			success: function(data){
				$("#"+pembID).remove();
				$('#kategoriPembeliID').val("");
				$('#modal-default').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
});