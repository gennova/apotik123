$(document).ready(function(){
	listApoteker();		
	var table = $('#apotekerListing').dataTable({     
		"bPaginate": true,
		"searching": true,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all employee in datatable
	function reload_table(){
		location.reload(false);		
		table.ajax.reload(null,false); //reload datatable ajax 
		//oTable.api().ajax.reload();
	}
	function listApoteker(){		
		$.ajax({
			type  : 'GET',
			url   : 'http://localhost/apotik123/apoteker/show',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].nojasa+'</td>'+
							'<td>'+data[i].namajasa+'</td>'+		                        
							'<td>'+data[i].nominal+'</td>'+
							'<td>'+data[i].status+'</td>'+
							'<td>'+data[i].keterangan+'</td>'+
							'<td style="text-align:center;">'+
								'<a href="javascript:void(0);" class="editRecord" data-id="'+data[i].id+'" data-nojasa="'+data[i].nojasa+'" data-namajasa="'+data[i].namajasa+'" data-nominal="'+data[i].nominal+'" data-status="'+data[i].status+'" data-keterangan="'+data[i].keterangan+'"><font color="BLUE">Edit</font></a>'+' '+
								'<a href="javascript:void(0);" class="deleteRecord" data-id="'+data[i].id+'"><font color="RED">Delete</font></a>'+
							'</td>'+
							'</tr>';
				}
				$('#listApoteker').html(html);					
			}
		});		
	}
	// save new employee record
	$('#saveApotekerForm').submit('click',function(){
		console.log("Insert method");
		var NOJASA = $('#nojasa').val();
		var NAMAJASA = $('#namajasa').val();
		var NOMINAL = $('#nominal').val();
		var STATUS = $( "#status option:selected" ).val();	
		var KETERANGAN = $('#keterangan').val();
		console.log(NOJASA);
		console.log(NAMAJASA);
		console.log(NOMINAL);
		console.log(STATUS);	
		console.log(KETERANGAN);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/save",
			dataType : "JSON",
			data : {nojasa:NOJASA, namajasa:NAMAJASA, nominal:NOMINAL,status:STATUS,keterangan:KETERANGAN},
			success: function(data){
				$('#nojasa').val("");
				$('#namajasa').val("");
				$('#nominal').val("");
				$('#keterangan').val("");
				$('#modal-xl').modal('hide');
				listApoteker();
				reload_table();
			}
		});
		return false;
	});
	// show edit modal form with emp data
	$('#listApoteker').on('click','.editRecord',function(){
		$('#modal-update').modal('show');
		$("#apotekerid").val($(this).data('id'));
		$("#nojasau").val($(this).data('nojasa'));
		$("#namajasau").val($(this).data('namajasa'));
		$("#nominalu").val($(this).data('nominal'));
		$("#statusu").val($(this).data('status'));
		$("#keteranganu").val($(this).data('keterangan'));
	});
	// save edit record
	 $('#editApotekerForm').on('submit',function(){
	 	console.log("Update "+$('#pembIDInput').val())
	 	var aptID = $('#apotekerid').val();
		var NOJASA = $('#nojasau').val();
		var NAMAJASA = $('#namajasau').val();
		var NOMINAL = $('#nominalu').val();
		var STATUS = $( "#statusu option:selected" ).val();	
		var KETERANGAN = $('#keteranganu').val();
		console.log(NOJASA);
		console.log(NAMAJASA);
		console.log(NOMINAL);
		console.log(STATUS);	
		console.log(KETERANGAN);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/update",
			dataType : "JSON",
			data : {id:aptID,nojasa:NOJASA, namajasa:NAMAJASA, nominal:NOMINAL,status:STATUS,keterangan:KETERANGAN},
			success: function(data){
				$('apotekerid').val("");
				$('#nojasa').val("");
				$('#namajasa').val("");
				$('#nominal').val("");
				$('#keterangan').val("");
				$('#modal-xl').modal('hide');
				listApoteker();
				reload_table();
			}
		});
		return false;
	});
	// show delete form
	$('#listApoteker').on('click','.deleteRecord',function(){
		var aptID = $(this).data('id');          
		console.log("Apoteker ID "+aptID);  
		$('#modal-default').modal('show');
		$('#apotekerid').val(aptID);
	});
	// delete emp record
	 $('#deleteApotekerForm').on('submit',function(){
		var aptID = $('#apotekerid').val();
		console.log("Deleted "+aptID);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/delete",
			dataType : "JSON",  
			data : {id:aptID},
			success: function(data){
				$("#"+aptID).remove();
				$('#apotekerid').val("");
				$('#modal-default').modal('hide');
				listApoteker();
				location.reload(true);
			}
		});
		return false;
	});
});