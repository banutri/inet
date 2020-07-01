//=========================
var table = '';



$(document).ready(function () {
	//load kategori 
	load_kategori();

	//load barang
	load_barang();

	

/// tombol hapus harus delegate
$("#dataTable").on('click','.btn-hapus',function (e) {
	var instance = $(this);
	hapus(instance);
	
	
});
/// tombol hapus ///

/// tombol tambah //
$('.btn-tambah-barang').on('click',function(){
	var param = $(this).data('param');
	show_modal_barang();
	

});
/// end tombol tambah ///


/// start tombol edit ///
$('#dataTable').on('click','.btn-edit-barang',function(){
	var id_barang = $(this).data('value');
	show_modal_barang(id_barang);
});
/// end tombol edit ///
	
});


///function untuk hapus
function hapus(instance)
{
	$('#modal-hapus').unbind().modal(); /// mencegah terpanggil 2x atau lebih
	$('#modal-hapus .btn-hapus-ya').unbind().click(function(){
		console.log('tbl hps ya '+instance.val());
		
		delete_action(instance.val());
		button_disabler($(this));
		$('#modal-hapus').modal('hide');
		
		$(instance).closest('tr').fadeOut(1500,function () { reload_table() });
	});
	
}



////===========================
/// function pencegah spam tombol
function button_disabler(instance)
{
	instance.prop('disabled',true);
	setTimeout(function(){instance.prop('disabled',false)},1500);
}
////===========================

//function get data barang
function get_data_barang(id_barang='') {
	var jsonku = '';
	if(id_barang!='')
	{
		$.ajax({
			async: false,
			url: base_url + 'admin/load_barang_by',
			type: 'post',
			dataType: 'JSON',
			data: {
				id_barang: id_barang
			},
			success: function (result) {
				jsonku = result[0];
				// console.log(jsonku);
	
			}
		});
	}
	else
	{
		$.ajax({
			async: false,
			url: base_url + 'admin/load_barang',
			type: 'post',
			dataType: 'JSON',
			data: {
				view: 1
			},
			success: function (result) {
				jsonku = result;
				
	
			}
		});
	}
	return jsonku;
}

/// start function load data barang ke dalam tabel
function load_barang() {
	var table = $('#dataTable').DataTable({
		"ordering": true,
		columnDefs: [{
				orderable: false,
				targets: "no-sort"
			},
			{
				"width": "15%",
				"targets": 4
			},
			{
				"className": "dt-center",
				"targets": 6
			},


		],
		order: [
			[4, "desc"]
		],
		data: get_data_barang(),
		columns: [{
				data: "nama_brg",
			},
			{
				data: "harga_brg",
				render: function (data) {
					return 'Rp. ' + data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
				}
			},
			{
				data: "stok_brg"
			},
			{
				data: "id_kategori",
				
				

			},
			{
				data: "tanggal_update"
			},
			{
				data: "foto",
				render: function (data) {
					return `<div class="foto-barang mx-auto d-block" style="background-image:url('` + base_url + `uploads/items/` + data + `');"></div>`
				}
			},
			{
				data:"id_barang",
				render: function (data) {
					return `<div class="dropdown no-arrow">
							<button class="dropdown-toggle btn btn-sm btn-info"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-chevron-circle-down"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in bg-light" aria-labelledby="dropdownMenuLink">
							  <button data-value="`+data+`" class="dropdown-item text-warning btn-edit-barang"  href="#"><i class="fas fa-edit"></i> Edit</button>
							  <button class="dropdown-item text-danger btn-hapus" style="font-size:2.5vh;" value="` + data + `"><i class="fas fa-trash"></i> Hapus</button>
						  </div>`;
				}
			}

			/*and so on, keep adding data elements here for all your columns.*/
		]
	});
}
/// end load barang



/// start function menampilkan modal barang berdasarkan tambah atau edit
function show_modal_barang(id_barang='')
{
	var modal_brg = $('#modal-barang').on('shown.bs.modal');
	if(id_barang!='') // menampilkan modal untuk update barang
	{
		modal_brg.modal('show');
		load_to_form(id_barang);
		// ubah data param
		//$('.btn-submit').attr('data-param',2);
		tbl_submit(2);
		
	}
	else //menampilkan modal untuk tambah barang
	{
		modal_brg.modal('show');
		tbl_submit(1);
		
	}
}
/// end show modal barang


/// start ubah parameter btn_submit
function ubah_param_btn_submit(kode)
{
	var clickfun = $(".btn-submit").attr("onClick");
   	var funname = clickfun.substring(0,clickfun.indexOf("("));       
	   if(kode==1)
	   {
		$(".btn-submit").attr("onclick",funname+"(1)");
	   }
	   else if(kode==2)
	   {
		$(".btn-submit").attr("onclick",funname+"(2)");
	   }
	   else
	   {
		   console.log('error ubah param btn submit!');
	   }
}

/// end ubah btn submit

/// start load data ke form
function load_to_form(id_barang)
{
	
	if(data_barang!='')
	{
		var data_barang = get_data_barang(id_barang); // load data barang
		
		

		///load data ke form barang
		$('input[name="id_barang"]').val(data_barang['id_barang']);
		$('input[name="kode_brg"]').val(data_barang['kode_brg']);
		$('input[name="nama_brg"]').val(data_barang['nama_brg']);
		$('input[name="stok_brg"]').val(data_barang['stok_brg']);
		$('input[name="harga_brg"]').val(data_barang['harga_brg']);
		$("select").val(data_barang['id_kategori']);
		CKEDITOR.instances['deskripsi'].setData(data_barang['deskripsi']);
		$('#img-preview').attr('src', base_url+'uploads/items/'+data_barang['foto']);


		

		

	}
	

}



///=========================================
/// function reload tabel
function reload_table() {
	$('#dataTable').DataTable().destroy();
	load_barang();
}
///===========================================






//start ketika modal barang ditutup
$('#modal-barang').on('hidden.bs.modal', function (e) {
	clear_form();
	console.log('hide modal!');
})
// end modal barang ditutup


///membuat function yang memiliki parameter jenis tombol yg diklik
function tbl_submit(kode)
{
	url ='';
	if(kode==1) /// tambah barang
	{
		url = base_url+'admin/tambah_barang';
	}
	else if(kode==2) /// edit barang
	{
		url = base_url+'admin/update_barang';
	}
	else
	{
		console.log('jangan macam-macam');
	}

	$('#form-barang').submit(function (e) {
		

		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement(); /// memaksa update pada ckeditor supaya masuk ke <textarea>
		}
		e.preventDefault();
		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,

			success: function (response) {
				if (response.kode != 1) {
					alert_bootstrap(response.kode, response.pesan);

				} else {
					button_disabler($('.btn-submit'));
					alert_bootstrap(response.kode, response.pesan);
					setTimeout(function(){
						$('#modal-barang').modal('hide');
						reload_table();
					},700);
					
				}

			}
		});

	});

}



//===========================





// start function membersihakn form tambah barang
function clear_form() {
	$('#form-barang').find("input[type=text], input[type=number],input[type=file]").val(""); //clear form
	CKEDITOR.instances.deskripsi.setData(''); //clear editor
	load_kategori(); //reload kategori
	$('#img-preview').attr('src',base_url+'assets/img/kosong.jpg');
	
}
// end clear



// start load CKeditor
CKEDITOR.replace('deskripsi');
// end laod CKEditir


// start function load kategori
function load_kategori() {
	$.ajax({
		type: "post",
		url: base_url + "admin/load_kategori",
		data: {
			load: 1
		},
		dataType: "json",
		success: function (response) {
			$('#kategori').html('');
			$('#kategori').html('<option value="">-== Pilih ==-</option>');

			$.each(response, function (index, data) {
				$('#kategori').append(`
                       <option value="` + data.id_kategori + `">` + data.nama_kategori + `</option>
                      `);

			});

		}
	});
}



/// start function image preview
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#img-preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#img-input").change(function () {
	readURL(this);
});
/// end












// start function aksi hapus
function delete_action(id_barang) {
	$.ajax({
		async:false,
		type: "post",
		url: base_url + "admin/hapus_barang",
		data: {
			id_barang: id_barang
		},
		dataType: "json",
		success: function (response) {
			if (response.kode == 0) {
				alert_bootstrap(response.kode, response.pesan);
			} else if (response.kode == 1) {
				alert_bootstrap(response.kode, response.pesan);
				//reload_table();
				console.log(response);
			}
		}
	});
}
/// end hapus

/// start function alert bootstrap
function alert_bootstrap(jenis, pesan) {
	if (jenis == 0) {
		$('#pesan-gagal').html(pesan);
		$(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
			$(".alert-danger").slideUp(1000);
		});
	} else if (jenis == 1) {
		$('#pesan-sukses').html(pesan);
		$(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
			$(".alert-success").slideUp(1000);
		});
	}

}
/// end alert


/// animasi ketika tabel berubah... coba
// $('#dataTable tbody').on('click', 'tr', function () {
//     var tr = $(this).closest('tr');
// 		//tr.hide();
// 		tr.delay(500).fadeOut(1000,function(){
// 			reload_table();
// 		});


// } );

// start tabel column efek fade out
function column_faded() {
	var row = $('#dataTable tbody').closest('tr');
	var btn_hapus = row.closest('.btn-hapus');
	row.delay(500).fadeOut(1000, function () {});
}
// end
