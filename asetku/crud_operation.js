$(document).ready(function(){
	listEmployee();		
	var table = $('#employeeListing').dataTable({     
		"bPaginate": true,
		"searching": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all employee in datatable
	function reload_table(){
		location.reload(false);		
		table.ajax.reload(null,false); //reload datatable ajax 
	}
	function listEmployee(){		
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
								'<a href="javascript:void(0);" class="editRecord" data-id="'+data[i].id+'" data-nojasa="'+data[i].nojasa+'" data-namajasa="'+data[i].namajasa+'" data-nominal="'+data[i].nominal+'" data-status="'+data[i].status+'" data-keterangan="'+data[i].keterangan+'">Edit</a>'+' '+
								'<a href="javascript:void(0);" class="deleteRecord " data-id="'+data[i].id+'" >Delete</a>'+
							'</td>'+
							'</tr>';
				}
				$('#listRecords').html(html);					
			}
		});		
	}
	// save new employee record
	$('#saveEmpForm').submit('click',function(){
		console.log("Insert method");
		var noJasa = $('#nojasa').val();
		var namaJasa = $('#namajasa').val();
		var nominal = $('#nominal').val();
		var status = $('#status').val();
		var keterangan = $('#keterangan').val();
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/save",
			dataType : "JSON",
			data : {nojasa:noJasa, namajasa:namaJasa, nominal:nominal, status:status, keterangan:keterangan},
			success: function(data){
				$('#nojasa').val("");
				$('#namajasa').val("");
				$('#nominal').val("");
				$('#status').val("");
				$('#keterangan').val("");
				$('#modal-xl').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		console.log("Nomor jasa "+$(this).data('nojasa'));
		console.log("Nama jasa "+$(this).data('status'));
		$('#modal-update').modal('show');
		$("#empId").val($(this).data('id'));
		$("#njasa").val($(this).data('nojasa'));
		$("#nmjasa").val($(this).data('namajasa'));
		$("#nnominal").val($(this).data('nominal'));
		$("#nstat").val($(this).data('status'));
		$("#nket").val($(this).data('keterangan'));
	});
	// save edit record
	 $('#editEmpForm').on('submit',function(){
	 	var empId = $('#empId').val();
		var nojasa = $('#njasa').val();
		var namajasa = $('#nmjasa').val();
		var nominal = $('#nnominal').val();
		var status = $('#nstat').val();
		var keterangan = $('#nket').val();			
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/update",
			dataType : "JSON",
			data : {id:empId,nojasa:nojasa, namajasa:namajasa, nominal:nominal, status:status, keterangan:keterangan},
			success: function(data){
				$('#nojasa').val("");
				$('#namajasa').val("");
				$('#nominal').val("");
				$('#status').val("");
				$('#keterangan').val("");
				$('#modal-update').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var empId = $(this).data('id');          
		console.log("EMP ID "+empId);  
		$('#modal-default').modal('show');
		$('#ApotekerIDInput').val(empId);
	});
	// delete emp record
	 $('#deleteEmpForm').on('submit',function(){
		var apotekerID = $('#ApotekerIDInput').val();
		console.log("Deleted "+apotekerID);
		$.ajax({
			type : "POST",
			url  : "http://localhost/apotik123/apoteker/delete",
			dataType : "JSON",  
			data : {id:apotekerID},
			success: function(data){
				$("#"+apotekerID).remove();
				$('#ApotekerIDInput').val("");
				$('#modal-default').modal('hide');
				listEmployee();
				reload_table();
			}
		});
		return false;
	});
});