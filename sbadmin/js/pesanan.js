/// gloabal var ///
var stats_code='';
var stats_pesanan = get_data_status_pesanan();
/// end global var ///





$(document).ready(function () {
    load_pesanan();


    /// start tombol aksi ///

    /// btn detail
    // start detail pesasnan
    $('#tabel-pesanan').on('click','.btn-detail-pesanan',function(){
        var value = $(this).data('value');
        load_modal_pesanan(value);

        // console.log(value);
        
        
        // console.log(get_data_pesanan_by(value));
    })
    // end detail pesanan

    /// btn kirim
    $('#tabel-pesanan').on('click','.btn-kirim-pesanan',function(){
        var val = $(this).data('value');
        var instance = $(this);
        var data_pesanan = get_data_pesanan_by(val);

        $('#id-pesanan').attr('value',val);

        $.each(data_pesanan, function (i, value) { 
            $('#resi_pesanan').html(value.no_pesanan);
        });
        
        input_resi(instance);
        $('#modal-input-resi-pesanan').modal('show');
    });

    /// end tombol aksi ///

    // btn reload tabel
    $('.btn-reload-table').on('click',function(){
        reload_table();
        // console.log('jih');
    });
    // btn reload tabel

    /// auto reload table
    setInterval(() => {
        reload_table();
    }, 60000);
    /// auto reload table


});

// start aksi input resi
function input_resi(instance)
{
    $('#form-input-resi').submit(function (e) {

		e.preventDefault();
		$.ajax({
			url: base_url+'admin/input_resi',
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
					button_disabler($('.btn-input-resi'));
					alert_bootstrap(response.kode, response.pesan);
                        $('#modal-input-resi-pesanan').modal('hide');
                        $('#form-input-resi').find("input[type=text]").val(""); 
                        $(instance).closest('tr').fadeOut(1000,function () { reload_table() });

                    // console.log('sukses');
					
					
                }
                
              

            }
            
		});

	});
}
// end aksi input resi

/// start load pesanan ke modal
function load_modal_pesanan(id_pesanan)
{
    var kurir='';
    var data_pesanan = get_data_pesanan_by(id_pesanan);
    var detail_pesanan = get_detail_pesanan(id_pesanan);
    

    $('#modal-detail-pesanan').modal('show');

    $('#isi-tabel-pesanan').html('');
    $.each(data_pesanan, function (i, value) {
        kurir=value;
        $('#isi-tabel-pesanan').append(`
        <tr>
            <td>`+value.nama_brg+`</td>
            <td>Rp. `+angka_koma(value.harga_brg)+`</td>
            <td>`+value.qty+`</td>
           
        </tr>
        
        
        `);
         
    });
    $('#isi-tabel-pesanan').append(`
        <tr>
            <td>Expedisi `+kurir.nama_kurir+`</td>
            <td>Rp. `+angka_koma(kurir.harga_kurir)+`</td>
            <td></td>
           
        </tr>
        
        
        `);

    /// start detail
    $.each(detail_pesanan, function (i, value) {

         $('.no-pesanan').html(value.no_pesanan);
         $('.nama-user').html(value.nama_user);
         $('.no-hp-user').html(value.no_hp_user);
         $('.status-pesanan').html(status_pesanan(value.status_pesanan,value.nama_status));
         $('.total-harga').html('Rp. '+angka_koma(value.total_harga));
         $('.kurir-pesanan').html(value.nama_kurir);
         $('.resi-pesanan').html(get_resi_pesanan(id_pesanan));
         $('.alamat-user').html(value.alamat_user);
         
    });
    
    /// end detail
    

    $('#modal-detail-pesanan').on('hidden.bs.modal',function(){
        
    });
}

/// end load pesanan ke modal


/// start function get data pesanan by
function get_data_pesanan_by(id_pesanan)
{
    var jsonku ='';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_pesanan",
        data: {id_pesanan:id_pesanan},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;
}
// end get data pesanan by

// start get detail pesanan
function get_detail_pesanan(id_pesanan)
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_detail_pesanan",
        data: {id_pesanan:id_pesanan},
        dataType: "JSON",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;
}
// end detail pesanan

///=========================================
/// function reload tabel
function reload_table() {
	$('#tabel-pesanan').DataTable().destroy();
	load_pesanan();
}
///===========================================


function load_pesanan()
{
    var table = $('#tabel-pesanan').DataTable({
		"ordering": true,
		columnDefs: [{
				orderable: false,
				targets: "no-sort"
			},
			{
				"width": "15%",
				
			},
			


        ],
        order: [
			[4, "desc"]
		],
		
		data: get_data_pesanan(),
		columns: [
			{
				data: "no_pesanan",
			},
			{
                data: "nama_user",
				
            },
            {
                data: "nama_kurir",
				
			},
			{
				data: "status_pesanan",
                render:function(data){
                    stats_code = data;
                    var st='';
                    
                    
                    $.each(stats_pesanan, function (index, value) { 
                         if(data==value.id_status)
                         {
                            if(value.id_status==1)
                            {
                                
                                st=`<span class="text-warning font-weight-bold">`+value.nama_status+`</span>`;
                            }
                            if(value.id_status==2)
                            {
                                st=`<span class="text-primary font-weight-bold">`+value.nama_status+`</span>`;
                            }
                            if(value.id_status==3)
                            {
                                st=`<span class="text-success font-weight-bold">`+value.nama_status+`</span>`;
                            }
                            if(value.id_status==4)
                            {
                                st=`<span class="text-info font-weight-bold">`+value.nama_status+`</span>`;
                            }
                            if(value.id_status==5)
                            {
                                st=`<span class="text-danger font-weight-bold">`+value.nama_status+`</span>`;
                            }
                            if(value.id_status==6)
                            {
                                st=`<span class="text-secondary font-weight-bold">`+value.nama_status+`</span>`;
                            }

                         }
                    });

                    return st;
                    
                }
            },
            {
                data:"dibuat_pesanan"
            },
            {
              data:"total_harga",
              render:function(data)  
              {
                  return 'Rp. ' + data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
              }
            },
			
			{
				data:"id_pesanan",
				render: function (data) {
                    var btn_validasi = `<div class="col-sm mb-2"><a href="`+base_url+`admin/pembayaran" class=" btn btn-success btn-circle  btn-validasi-pesanan" title="Validasi pembayaran" ><i class="fas fa-check" ></i></button></div>`;
                    var btn_hapus = `<div class="col-sm mb-2"><button type="button" class=" btn btn-danger btn-circle  btn-hapus-pesanan" title="Batalkan!" data-value="`+data+`"><i class="fa fa-trash-alt" ></i></button></div>`;
                    var btn_send = `<div class="col-sm mb-2"><button type="button" class="btn btn-primary btn-circle btn-kirim-pesanan" title="Kirimkan" data-value="`+data+`"><i class="fa fa-paper-plane" ></i></button></div>`;
                    

                    if(stats_code==1)
                    {
                        return render_btn_aksi(btn_hapus,data);
                    }
                    else if(stats_code==2)
                    {
                        return render_btn_aksi(btn_validasi,data);
                    }
                    else if(stats_code==3)
                    {
                        return render_btn_aksi('',data);
                    }
                    else if(stats_code==4)
                    {
                        return render_btn_aksi('',data);
                    }
                    else if(stats_code==5)
                    {
                        return render_btn_aksi('',data);
                    }
                    else if(stats_code==6)
                    {
                        return render_btn_aksi(btn_send,data);
                    }
                    
				}
			}

			/*and so on, keep adding data elements here for all your columns.*/
		]
	});
}

/// start render tombol aksi ///
function render_btn_aksi(btn,data)
{
    var warp1 = `<div class="row no-gutters">`;
    var warp2 = `</div>`
    var btn_detail = `<div class="col-sm mb-2"><button type="button" class="btn btn-info btn-circle btn-detail-pesanan" title="Detail" data-value="`+data+`"><i class="fa fa-info" ></i></button></div>`;

    return warp1+''+btn_detail+''+btn+''+warp2;
}
/// end render tombol aksi ///

function get_data_pesanan()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_pesanan",
        data: {},
        dataType: "json",
        success: function (response) {
           
            jsonku = response;
        }
    });
    
    return jsonku;
}

function get_data_status_pesanan()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_status_pesanan",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });
    return jsonku;
}

// warna status
function status_pesanan(id_status,nama_status)
{
    var status = '';

    if(id_status==1)
    {
        status = `<span class="text-warning font-weight-bold ">`+nama_status+`</span>`;
    }
    if(id_status==2)
    {
        status = `<span class="text-primary font-weight-bold ">`+nama_status+`</span>`;
    }
    if(id_status==3)
    {
        status = `<span class="text-success font-weight-bold ">`+nama_status+`</span>`;
    }
    if(id_status==4)
    {
        status = `<span class="text-info font-weight-bold ">`+nama_status+`</span>`;
    }
    if(id_status==5)
    {
        status = `<span class="text-danger font-weight-bold ">`+nama_status+`</span>`;
    }
    if(id_status==6)
    {
        status = `<span class="text-secondary font-weight-bold ">`+nama_status+`</span>`;
    }
    

    return status;
}
/// end status pesanan

// start resi
function  get_resi_pesanan(id_pesanan)
{
    var jsonku= '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_resi_pesanan",
        data: {id_pesanan:id_pesanan},
        dataType: "JSON",
        success: function (response) {
            jsonku = response;
        }
    });

    if(jsonku!='')
    {
        jsonku = jsonku[0].resi;
    }
    else
    {
        jsonku = 'Resi tidak / belum tersedia';
    }

    return jsonku;
    
}
// end resi


// start angka koma
function angka_koma(angka)
{
    return angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}
// end angka koma


////===========================
/// function pencegah spam tombol
function button_disabler(instance)
{
	instance.prop('disabled',true);
	setTimeout(function(){instance.prop('disabled',false)},1500);
}
////===========================


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