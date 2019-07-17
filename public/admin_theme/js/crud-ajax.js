//FUNCTION UNTUK RELOAD DATATABLES
var error = 1;
function reload_table()
{
	table_guru.ajax.reload(null,false);
	table_kelas.ajax.reload(null,false);
	table_hari.ajax.reload(null,false);
	table_mapel.ajax.reload(null,false);
	table_tugas.ajax.reload(null,false);
	table_wali.ajax.reload(null,false);
	table_siswa.ajax.reload(null,false);
	// table_jadwal.ajax.reload(null,false);
}

//untuk hapus data
function confirm_modal($id)
{
	$('#delete').val($id);
  	$('#modal_delete').modal('show', {backdrop: 'static'});
}

//untuk edit data
function confirm_edit($id)
{
	$('#edit').val($id);
  	$('#modal_edit').modal('show', {backdrop: 'static'});
}

//close modal edit
function closeEdit()
{
	$('#modal_edit').modal('hide');
	$('#form_siswa').modal('hide');
	$('#form_guru').modal('hide');
}

//untuk tampil data
var table_guru;
var table_kelas;
var table_hari;
var table_mapel;
var table_tugas;
var table_wali;
var table_siswa;
var table_jadwal;
$(document).ready(function(){
	table_guru = $('#table_guru').DataTable({
		"ajax":{
			"url": "Crud/readGuru",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2,3]
		},
		],error: function(){
			alert('error');
		},
	});

	table_kelas = $('#table_kelas').DataTable({
		"ajax":{
			"url": "Crud/readKelas",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel tugas guru
	table_tugas = $('#table_Tugas').DataTable({
		"ajax":{
			"url": "Crud/readTugas",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2,3,4,5]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel hari
	table_hari = $('#table_hari').DataTable({
		"ajax":{
			"url": "Crud/readHari",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2]
		},
		],error: function(){
			alert('error');
		},
	});
	//tabel hari
	table_hari = $('#table_jam').DataTable({
		"ajax":{
			"url": "Crud/readJam",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel mapel
	table_mapel = $('#table_mapel').DataTable({
		"ajax":{
			"url": "Crud/readMapel",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel wali
	table_wali = $('#table_wali').DataTable({
		"ajax":{
			"url": "Crud/readWali",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2,3]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel siswa
	table_siswa = $('#table_siswa').DataTable({
		"ajax":{
			"url": "Crud/readSiswa",
			"type": "POST"
		},
		"columnDefs":[{
			"targets": [0,1,2,3]
		},
		],error: function(){
			alert('error');
		},
	});

	//tabel jadwal
	// var Jkelas = $('#Jkelas').val();
	// table_jadwal = $('#table_jadwal').DataTable({
	// 	"ajax":{
	// 		"url": 'Crud/readJadwal/'+Jkelas,
	// 		"type": "POST",
	// 		"dataType":"JSON"
	// 	},
	// 	"columnDefs":[{
	// 		"targets": [0,1,2,3,4]
	// 	},
	// 	],error: function(){
	// 		alert('error');
	// 	},
	// });
});

//ACTION UNTUK DATA GURU
//FUNCTION INSERT DAN UPDATE DATA GURU
$(document).ready(function(){
	$('#form_guru').submit(function(){
		var id_guru = $('#id_guru').val();
		if (id_guru != '') {
			$('#form_guru').hide();
			confirm_edit(id_guru);
			return false;
		}else{
			var kode_guru = $('#kode_guru').val();
			var nip_guru  = $('#nip_guru').val();
			var nama_guru = $('#nama_guru').val();
			var user_guru = $('#username_guru').val();
			var pass_guru = $('#password_guru').val();
			if (kode_guru != '') {
				$('#div_kodeguru').attr('class', 'form-group');
			}
			if (nip_guru != '') {
				$('#div_nipguru').attr('class', 'form-group');
			}
			if (nama_guru != '') {
				$('#div_namaguru').attr('class', 'form-group');
			}
			if (user_guru != '') {
				$('#div_userguru').attr('class', 'form-group');
			}
			if (pass_guru != '') {
				$('#div_passguru').attr('class', 'form-group');
			}
			if (kode_guru == '') {
				$('#kode_guru').focus();
				$('#div_kodeguru').attr('class', 'form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data guru.',
				  class_name: 'color danger'
				});
				return false;
			}
			if (nip_guru == '') {
				$('#nip_guru').focus();
				$('#div_nipguru').attr('class', 'form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data guru.',
				  class_name: 'color danger'
				});
				return false;
			}
			if (nama_guru == '') {
				$('#nama_guru').focus();
				$('#div_namaguru').attr('class', 'form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data guru.',
				  class_name: 'color danger'
				});
				return false;
			}
			if (user_guru == '') {
				$('#username_guru').focus();
				$('#div_userguru').attr('class', 'form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data guru.',
				  class_name: 'color danger'
				});
				return false;
			}
			if (pass_guru == '') {
				$('#password_guru').focus();
				$('#div_passguru').attr('class', 'form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data guru.',
				  class_name: 'color danger'
				});
				return false;
			}else{
				$.ajax({
					url       : "Crud/insertGuru",
					type      : "POST",
					data      : $('#form_guru').serialize(),
					cache     : false,
					success: function(msg)
					{
						if (msg == 1) 
						{
							$.gritter.add({
							  title: 'Gagal',
							  text: 'Nip sudah ada!',
							  class_name: 'color danger'
							});
							error = 1;
						}else{
							$('#form_guru')[0].reset();
							$('#kode_guru').focus();
							reload_table();
							$.gritter.add({
							  title: 'Sukses',
							  text: 'Data berhasil disimpan.',
							  class_name: 'color success'
							});
							error = 0;
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
					alert('Error adding data')
					}
				});
				return false;
			}
		}
	});
});
//FUNCTION SHOW GURU
function showGuru($id)
{
	$.ajax({
		url: 'Crud/showGuru/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_guru')[0].reset();
			$('#id_guru').val(data['id_guru']);
			$('#kode_guru').val(data['kode']);
			$('#nip_guru').val(data['nip']);
			$('#nama_guru').val(data['nama']);
			$('#username_guru').val(data['username']);
		},error: function(){
			alert('error');
		}
	});
}

//untuk username guru
function showUserGuru()
{
	var nip = $('#nip_guru').val();
	$('#username_guru').val(nip);
}

//FUNCTION UNTUK UPDATE DATA GURU
//UNTUK UPDATE GURU
function updateGuru()
{
	$('#modal_edit').modal('hide');
	$('#form_guru').modal('hide');
	$.ajax({
		url       : "Crud/updateGuru",
		type      : "POST",
		data      : $('#form_guru').serialize(),
		cache     : false,
		success: function(data)
		{
			reload_table();
			$('#form_guru')[0].reset();
			$.gritter.add({
				title: 'Sukses',
				text: 'Data berhasil disimpan.',
				class_name: 'color success'
			});
			
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		alert('Error adding data')
		}
	});
	return false;
}
//FUNCTION DELETE GURU
function deleteGuru()
{
	var idguru = $('#delete').val();
	$.ajax({
		url: "Crud/deleteGuru/"+idguru,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}

//UNTUK VIEW DATA GURU
//ACTION UNTUK VIEW DATA GURU
function viewGuru($id)
{
	$.ajax({
		url: 'Crud/showGuru/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#view_kodeguru').val(data['kode']);
			$('#view_nipguru').val(data['nip']);
			$('#view_namaguru').val(data['nama']);
			$('#view_usernameguru').val(data['username']);
		},error: function(){
			alert('error');
		}
	});
}

//RESET DATA GURU
//untuk reset data guru
function resetDataGuru()
{
	$('#form_guru')[0].reset();
	$('#div_kodeguru').attr('class','form-group');
	$('#div_nipguru').attr('class','form-group');
	$('#div_namaguru').attr('class','form-group');
	$('#div_userguru').attr('class','form-group');
	$('#div_passguru').attr('class','form-group');
}
//END ACTION UNTUK DATA GURU

//ACTION UNTUK DATA KELAS
//FUNCTION INSERT DAN UPDATE
$(document).ready(function(){
	$('#form_kelas').submit(function(){
		var id_kelas = $('#id_kelas').val();
		var kelas 	 = $('#kelas').val();

		if (kelas == '') {
			$('#div_kelas').attr('class', 'form-group has-error');
			$.gritter.add({
  				title: 'Gagal',
  				text: 'Data gagal disimpan.',
  				class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_kelas').attr('class', 'form-group');
		}

		if (id_kelas != '' && kelas != '') {
			confirm_edit(id);
			return false;
			
		}else{
			$.ajax({
				url       : "Crud/insertKelas",
				type      : "POST",
				data      : $('#form_kelas').serialize(),
				cache     : false,
				success: function(msg)
				{
					if (msg == 1) 
					{
						$.gritter.add({
						  title: 'Gagal',
						  text: 'Data kelas sudah ada!',
						  class_name: 'color danger'
						});
						error = 1;
					}else{
						reload_table();
						$.gritter.add({
						  title: 'Sukses',
						  text: 'Data berhasil disimpan.',
						  class_name: 'color success'
						});
						$('#form_kelas')[0].reset();
						$('#kelas').focus();
						error = 0;
					}
					
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
				alert('Error adding data')
				}
			});
			return false;
		}
	});
});

//ACTION UNTUK EDIT DATA KELAS
function showKelas($id)
{
	$.ajax({
		url: 'Crud/showKelas/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_kelas')[0].reset();
			$('#id_kelas').val(data['id_kelas']);
			$('#kelas').val(data['kelas']);
		},error: function(){
			alert('error');
		}
	});
}

//FUNCTION UPDATE DATA KELAS
function updateKelas()
{
	$('#modal_edit').modal('hide');
	$.ajax({
		url       : "Crud/updateKelas",
		type      : "POST",
		data      : $('#form_kelas').serialize(),
		success: function()
		{
			$('#form_kelas')[0].reset();
			reload_table();
			$.gritter.add({
				title: 'Sukses',
				text: 'Data berhasil disimpan.',
				class_name: 'color success'
			});
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		alert('Error adding data')
		}
	});
	return false;
}

//FUNCTION UNTUK HAPUS
function deleteKelas()
{
	var idkelas = $('#delete').val();
	$.ajax({
		url: "Crud/deleteKelas/"+idkelas,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}
//END ACTION UNTUK DATA KELAS

//ACTION UNTUK DATA HARI
//INSERT DAN UPDATE DATA HARI

$(document).ready(function(){
	$('#form_hari').submit(function(){
	  	var id_hari      = $('#id_hari').val();
	  	var hari 	= $('#hari').val();

		if (hari == '') {
			$('#div_hari').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_hari').attr('class', 'form-group');
		}

		if (id_hari != '' && hari != ''){
			confirm_edit(id);
			return false;
			
		}else{
			$.ajax({
	  			url       : "Crud/addHari",
	  			type      : "POST",
	  			data      : $('#form_hari').serialize(),
	  			cache     : false,
	  			success: function(msg)
	  			{
	  				if (msg == 1) 
	  				{
	  					$('#form_hari')[0].reset();
		   				$.gritter.add({
		      				title: 'Gagal',
		      				text: 'Data yang anda inputkan sudah ada!',
		      				class_name: 'color danger'
		    			});
		    			error = 1;
	  				}else{
	  					reload_table();
	  					$('#form_hari')[0].reset();
		   				$.gritter.add({
		      				title: 'Berhasil',
		      				text: 'Data yang anda inputkan sudah ada!',
		      				class_name: 'color success'
		    			});
	  					error = 0;
	  				}

	  			},
	  			error: function(jqXHR, textStatus, errorThrown)
	  			{
	    			alert('Error adding data')
	  			}
			});
			return false;
		}
	});
});

//UNTUK UPDATE HARI
function updateHari()
{
	$('#modal_edit').modal('hide');
	$.ajax({
  			url       : "Crud/updateHari",
  			type      : "POST",
  			data      : $('#form_hari').serialize(),
  			cache     : false,
  			success: function()
  			{
  				reload_table();
  				$('#form_hari')[0].reset();
   				$.gritter.add({
      				title: 'Sukses',
      				text: 'Data berhasil disimpan.',
      				class_name: 'color success'
    			});
  			},
  			error: function(jqXHR, textStatus, errorThrown)
  			{
    			alert('Error adding data')
  			}
		});
		return false;
}

//UNTUK SHOW HARI
function showHari($id)
{
	$.ajax({
		url: 'Crud/showHari/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_hari')[0].reset();
			$('#id_hari').val(data['id_hari']);
			$('#hari').val(data['hari']);
		},error: function(){
			alert('error');
		}
	});
}

//hapus data hari
function deleteHari()
{
	var idhari = $('#delete').val();
	$.ajax({
		url: "Crud/deleteHari/"+idhari,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#form_hari')[0].reset();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}
//END ACTION UNTUK DATA HARI

//ACTION UNTUK DATA jam
//INSERT DAN UPDATE DATA jam

$(document).ready(function(){
	$('#form_jam').submit(function(){
	  	var id_jam      = $('#id_jam').val();
	  	var jam 	= $('#jam').val();

		if (jam == '') {
			$('#div_jam').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_jam').attr('class', 'form-group');
		}

		if (id_jam != '' && jam != ''){
			confirm_edit(id);
			return false;
			
		}else{
			$.ajax({
	  			url       : "Crud/addJam",
	  			type      : "POST",
	  			data      : $('#form_jam').serialize(),
	  			cache     : false,
	  			success: function(msg)
	  			{
	  				if (msg == 1) 
	  				{
	  					$('#from_jam')[0].reset();
		   				$.gritter.add({
		      				title: 'Gagal',
		      				text: 'Data yang anda inputkan sudah ada!',
		      				class_name: 'color danger'
		    			});
		    			error = 1;
	  				}else{
	  					reload_table();
	  					$('#from_jam')[0].reset();
		   				$.gritter.add({
		      				title: 'Berhasil',
		      				text: 'Data yang anda inputkan sudah ada!',
		      				class_name: 'color success'
		    			});
	  					error = 0;
	  				}

	  			},
	  			error: function(jqXHR, textStatus, errorThrown)
	  			{
	    			alert('Error adding data')
	  			}
			});
			return false;
		}
	});
});

//UNTUK UPDATE jam
function updateJam()
{
	$('#modal_edit').modal('hide');
	$.ajax({
  			url       : "Crud/updateJam",
  			type      : "POST",
  			data      : $('#form_hari').serialize(),
  			cache     : false,
  			success: function()
  			{
  				reload_table();
  				$('#form_hari')[0].reset();
   				$.gritter.add({
      				title: 'Sukses',
      				text: 'Data berhasil disimpan.',
      				class_name: 'color success'
    			});
  			},
  			error: function(jqXHR, textStatus, errorThrown)
  			{
    			alert('Error adding data')
  			}
		});
		return false;
}

//UNTUK SHOW jam
function showJam($id)
{
	$.ajax({
		url: 'Crud/showJam/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_jam')[0].reset();
			$('#id_jam').val(data['id_jam']);
			$('#jam').val(data['jam']);
		},error: function(){
			alert('error');
		}
	});
}

//hapus data jam
function deleteJam()
{
	var idhari = $('#delete').val();
	$.ajax({
		url: "Crud/deleteJam/"+id_jam,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#from_jam')[0].reset();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}
//END ACTION UNTUK DATA JAM

//ACTION UNTUK DATA MAPEL
//insert dan update data mapel
$(document).ready(function(){
	$('#form_mapel').submit(function(){
	  	var id_mapel      = $('#id_mapel').val();
	  	var mapel 	= $('#mapel').val();

		if (mapel == '') {
			$('#div_mapel').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_mapel').attr('class', 'form-group');
		}

		if (id_mapel != '' && mapel != ''){
			confirm_edit(id);
			return false;
			
		}else{
			$.ajax({
	  			url       : "Crud/addMapel",
	  			type      : "POST",
	  			data      : $('#form_mapel').serialize(),
	  			cache     : false,
	  			success: function(msg)
	  			{
	  				if (msg == 1) 
	  				{
	  					$.gritter.add({
		      				title: 'Gagal',
		      				text: 'Data mata pelajaran sudah ada!',
		      				class_name: 'color danger'
		    			});
		    			error = 1;
	  				}else{
	  					reload_table();
		  				$('#form_mapel')[0].reset();
		   				$.gritter.add({
		      				title: 'Sukses',
		      				text: 'Data berhasil disimpan.',
		      				class_name: 'color success'
		    			});
		    			error = 0;	
	  				}
	  				
	  			},
	  			error: function(jqXHR, textStatus, errorThrown)
	  			{
	    			alert('Error adding data')
	  			}
			});
			return false;
		}
	});
});
//show data mapel
function showMapel($id)
{
	$.ajax({
		url: 'Crud/showMapel/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_mapel')[0].reset();
			$('#id_mapel').val(data['id_mapel']);
			$('#mapel').val(data['mapel']);
		},error: function(){
			alert('error');
		}
	});
}

//UNTUK UPDATE MAPEL
function updateMapel()
{
	$('#modal_edit').modal('hide');
	$.ajax({
  			url       : "Crud/updateMapel",
  			type      : "POST",
  			data      : $('#form_mapel').serialize(),
  			cache     : false,
  			success: function()
  			{
  				reload_table();
  				$('#form_mapel')[0].reset();
  				$('#mapel').focus();
   				$.gritter.add({
      				title: 'Sukses',
      				text: 'Data berhasil disimpan.',
      				class_name: 'color success'
    			});
  			},
  			error: function(jqXHR, textStatus, errorThrown)
  			{
    			alert('Error adding data')
  			}
		});
		return false;
}

//hapus data mapel
function deleteMapel()
{
	var idmapel = $('#delete').val();
	$.ajax({
		url: "Crud/deleteMapel/"+idmapel,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#form_mapel')[0].reset();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}
//END ACTION UNTUK DATA MAPEL

//ACTION UNTUK DATA WALI KELAS
//INSERT DAN UPDATE DATA WALI KELAS
$(document).ready(function(){
	$('#form_wali').submit(function(){
	  	var id_wali      = $('#wali_id').val();
	  	var guru 	= $('#kode_guru').val();
	  	var kelas 	= $('#kelas').val();

	  	if (guru != '') {
	  		$('#div_idguru').attr('class', 'form-group');
			$('#div_nama').attr('class', 'form-group');
	  	}
	  	if (kelas != 'Pilih kelas') {
	  		$('#div_idkelas').attr('class', 'form-group');
	  	}
		if (guru == '') {
			$('#kode_guru').focus();
			$('#div_idguru').attr('class', 'form-group has-error');
			$('#div_nama').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan! Lengkapi form wali.',
	  			class_name: 'color danger'
			});
			return false;
		}
		if (kelas == 'Pilih kelas') {
			$('#div_idkelas').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan! Lengkapi form wali.',
	  			class_name: 'color danger'
			});
			return false;
		}

		if (id_wali != ''){
			confirm_edit(id);
			return false;
			
		}else{
			$.ajax({
	  			url       : "Crud/addWali",
	  			type      : "POST",
	  			data      : $('#form_wali').serialize(),
	  			cache     : false,
	  			success: function(msg)
	  			{
	  				if (msg == 1) 
	  				{
	  					$.gritter.add({
		      				title: 'Gagal',
		      				text: 'Data wali dengan guru ini suda ada!',
		      				class_name: 'color danger'
		    			});
		    			error = 1;
	  				}else{
	  					reload_table();
		  				$('#form_wali')[0].reset();
		   				$.gritter.add({
		      				title: 'Sukses',
		      				text: 'Data berhasil disimpan.',
		      				class_name: 'color success'
		    			});
		    			error = 0;
	  				}
	  				
	  			},
	  			error: function(jqXHR, textStatus, errorThrown)
	  			{
	    			alert('Error adding data')
	  			}
			});
			return false;
		}
	});
});

//show data wali kelas
function showWali($id)
{
	$.ajax({
		url: 'Crud/showWali/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_wali')[0].reset();
			$('#wali_id').val(data['id_wali']);
			$('#id_guru').val(data['id_guru']);
			$('#kode_guru').val(data['kode']);
			$('#nama_guru').val(data['nama']);
			$('#kelas').val(data['id_kelas']);
		},error: function(){
			alert('error');
		}
	});
}

//UNTUK UPDATE WALI KELAS
function updateWali()
{
	$('#modal_edit').modal('hide');
	$.ajax({
  			url       : "Crud/updateWali",
  			type      : "POST",
  			data      : $('#form_wali').serialize(),
  			cache     : false,
  			success: function()
  			{
  				$('#form_wali')[0].reset();
  				$('#kode_guru').focus();
  				reload_table();
   				$.gritter.add({
      				title: 'Sukses',
      				text: 'Data berhasil disimpan.',
      				class_name: 'color success'
    			});
  			},
  			error: function(jqXHR, textStatus, errorThrown)
  			{
    			alert('Error adding data')
  			}
		});
		return false;
}

//hapus data wali kelas
function deleteWali()
{
	var idwali = $('#delete').val();
	$.ajax({
		url: "Crud/deleteWali/"+idwali,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#form_wali')[0].reset();
  				$('#id_wali').val();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}
//END ACTION UNTUK DATA WALI KELAS

//ACTION UNTUK DATA TUGAS GURU
//hapus data tugas guru
function deleteTugas()
{
	var idtugas = $('#delete').val();
	$.ajax({
		url: "Crud/deleteTugas/"+idtugas,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}

//ACTION UNTUK EDIT DATA TUGAS GURU
function showTugas($id)
{
	$.ajax({
		url: 'Crud/showTugas/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#editTugas')[0].reset();
			$('#id_tugas').val(data['id_tugas']);
			$('#id_guru').val(data['id_guru']);
			$('#kode_guru').val(data['kode']);
			$('#nama_guru').val(data['nama']);
			$('#mapel').val(data['id_mapel']);
			$('#hari').val(data['id_hari']);
			$('#jam').val(data['jam']);
			$('#kelas').val(data['id_kelas']);
		},error: function(){
			alert('error');
		}
	});
}

//ACTION UNTUK UPDATE DATA TUGAS GURU
$(document).ready(function(){
	$('#editTugas').submit(function(){
	  	var kode      = $('#kode_guru').val();
	  	var id_mapel  = $('#mapel').val();
	  	var id_hari   = $('#hari').val();
	  	var jam       = $('#jam').val();
	  	var id_kelas  = $('#kelas').val();

		if (kode == '') {
			$('#div_kode').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_kode').attr('class', 'form-group');
		}

		if (id_mapel == 'Pilih mapel') {
			$('#div_mapel').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_mapel').attr('class', 'form-group');
		}

		if (id_hari == 'Pilih hari') {
			$('#div_hari').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_hari').attr('class', 'form-group');
		}

		if (id_kelas == 'Pilih kelas') {
			$('#div_kelas').attr('class', 'form-group has-error');
			$.gritter.add({
	  			title: 'Gagal',
	  			text: 'Data gagal disimpan.',
	  			class_name: 'color danger'
			});
			return false;
		}else{
			$('#div_kelas').attr('class', 'form-group');
		}

		if (kode != '' && id_mapel != 'Pilih mapel' && id_hari != 'Pilih hari' && id_kelas != 'Pilih kelas'){
			$.ajax({
	  			url       : "Crud/updateTugas",
	  			type      : "POST",
	  			data      : $('#editTugas').serialize(),
	  			cache     : false,
	  			success: function()
	  			{
	  				$('#form_editTugas').modal('hide');
	  				reload_table();
	   				$.gritter.add({
	      				title: 'Sukses',
	      				text: 'Data berhasil disimpan.',
	      				class_name: 'color success'
	    			});
	  			},
	  			error: function(jqXHR, textStatus, errorThrown)
	  			{
	    			alert('Error adding data')
	  			}
			});
			return false;
		}
	});
});

//ACTION UNTUK VIEW DATA TUGAS GURU
function viewTugas($id)
{
	$.ajax({
		url: 'Crud/showTugas/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#view_kodeguru').val(data['kode']);
			$('#view_namaguru').val(data['nama']);
			$('#view_mapel').val(data['mapel']);
			$('#view_hari').val(data['hari']);
			$('#view_jam').val(data['jam']);
			$('#view_kelas').val(data['kelas']);
		},error: function(){
			alert('error');
		}
	});
}
//END ACTION UNTUK DATA TUGAS GURU

//ACTION UNTUK DATA SISWA
//Untuk insert dan update
$(document).ready(function(){
	$('#form_siswa').submit(function(){
		var id_siswa = $('#id_siswa').val();
		var nis_siswa = $('#nis_siswa').val();
		var nama_siswa = $('#nama_siswa').val();
		var kelas = $('#kelas').val();
		var pass_siswa = $('#password_siswa').val();
		
		if (id_siswa != '') {
			$('#form_siswa').hide();
			confirm_edit(id_siswa);
			return false;
		}else{
			if (nis_siswa == '') {
				//code
				$('#nis_div').attr('class','form-group has-error');
				$('#username_div').attr('class','form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data siswa.',
				  class_name: 'color danger'
				});
				return false;
			}else if (nama_siswa == '') {
				$('#nama_div').attr('class','form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data siswa.',
				  class_name: 'color danger'
				});
				return false;
			}else if (kelas == 'Pilih kelas') {
				$('#kelas_div').attr('class','form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data siswa.',
				  class_name: 'color danger'
				});
				return false;
			}else if (pass_siswa == '') {
				$('#pass_div').attr('class','form-group has-error');
				$.gritter.add({
				  title: 'Gagal',
				  text: 'Data gagal disimpan! Lengkapi form data siswa.',
				  class_name: 'color danger'
				});
				return false;
			}else{
				$.ajax({
					url       : "Crud/insertSiswa",
					type      : "POST",
					data      : $('#form_siswa').serialize(),
					cache     : false,
					success: function(msg)
					{
						if (msg == 1) 
						{
							$.gritter.add({
							  title: 'Gagal',
							  text: 'Data siswa sudah ada!',
							  class_name: 'color danger'
							});
							error = 1;
						}else{
							$('#form_siswa')[0].reset();
							reload_table();
							$.gritter.add({
							  title: 'Sukses',
							  text: 'Data berhasil disimpan.',
							  class_name: 'color success'
							});
							error = 0;
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
					alert('Error adding data')
					}
				});
				return false;
			}
		}
	});
});

//untuk username siswa
function showUserSiswa()
{
	var nis = $('#nis_siswa').val();
	$('#username_siswa').val(nis);
}

//Untuk show siswa
function showSiswa($id)
{
	// var id = $('#edit').val();
	// $('#modal_edit').hide();
	$.ajax({
		url: 'Crud/showSiswa/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#form_siswa')[0].reset();
			$('#id_siswa').val(data['id_user']);
			$('#nis_siswa').val(data['nis']);
			$('#nama_siswa').val(data['nama']);
			$('#kelas').val(data['kelas']);
			$('#username_siswa').val(data['username']);
		},error: function(){
			alert('error');
		}
	});
}

//UNTUK UPDATE Siswa
function updateSiswa()
{
	$('#modal_edit').modal('hide');
	$.ajax({
		url       : "Crud/updateSiswa",
		type      : "POST",
		data      : $('#form_siswa').serialize(),
		cache     : false,
		success: function(data)
		{
			reload_table();
			$('#form_siswa')[0].reset();
			$.gritter.add({
				title: 'Sukses',
				text: 'Data berhasil disimpan.',
				class_name: 'color success'
			});
			
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		alert('Error adding data')
		}
	});
	return false;
}

//UNTUK hapus Siswa
function deleteSiswa()
{
	var idsiswa = $('#delete').val();
	$.ajax({
		url: "Crud/deleteSiswa/"+idsiswa,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			reload_table();
			$('#modal_delete').modal('hide');
			$.gritter.add({
              title: 'Sukses',
              text: 'Data berhasil dihapus.',
              class_name: 'color success'
            });
		},
		error: function(){
			alert('Error');
		}
	});
	return false;
}

//untuk reset data siswa
function resetDataSiswa()
{
	$('#form_siswa')[0].reset();
	$('#nis_div').attr('class','form-group');
	$('#nama_div').attr('class','form-group');
	$('#kelas_div').attr('class','form-group');
	$('#username_div').attr('class','form-group');
	$('#pass_div').attr('class','form-group');
}

//ACTION UNTUK VIEW DATA SISWA
function viewSiswa($id)
{
	$.ajax({
		url: 'Crud/showSiswa/'+$id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#view_nissiswa').val(data['nis']);
			$('#view_namasiswa').val(data['nama']);
			$('#view_kelas').val(data['kelas']);
			$('#view_user').val(data['username']);
		},error: function(){
			alert('error');
		}
	});
}
//END ACTION UNTUK DATA SISWA

function generate()
{
	$.ajax({
		url: "Proses",
		cache: false,
		beforeSend: function(){
			$("#response").show();
			$("#response").html("<img style='width:100%; height:100%;' src='assets/img/svg/ring-alt.svg' />");
		},
		complete: function(){
			$("#response").hide();
		},
		success: function(html){
			$('#response').html(html);
			$.gritter.add({
              title: 'Sukses',
              text: 'Jadwal berhasil dibuat.',
              class_name: 'color success'
            });
		},
		error: function(er){
			alert(er);
		}
	});
}

function unduh()
{
	$.ajax({
		url: "download",
		type: "post",
		data: $('#download').serialize(),
		cache: false,
		success: function(){
			
		},
		error: function(er){
			alert(er);
		}
	});
}

function clickJadwal()
{
	$.ajax({
    url: "jadwal.html",
    type: "POST",
    	success: function(){
      	window.location = "jadwal.html";
    	}
  	});
  	return false;
}