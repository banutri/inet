
$(document).ready(function () {
    load_pembayaran();

    // start btn detail pembayaran 
    $('#tabel-pembayaran').on('click','.btn-detail-pembayaran',function(){
        var value = $(this).data('value');

        load_modal_detail_pembayaran(value);
        
    });
    // end btn detail pembayaran

    //start btn validasi pembayaran
    $('#tabel-pembayaran').on('click','.btn-validasi-pembayaran',function(){
        var instance = $(this);

        do_valid(instance);
        
    });
    // end btn validasi pembayaran


});

// start do valid
function do_valid(instance)
{
	$('#modal-validasi-pembayaran').unbind().modal(); /// mencegah terpanggil 2x atau lebih
	$('#modal-validasi-pembayaran .btn-valid-ya').unbind().click(function(){
		
		
		valid_action(instance.data('value'));
		button_disabler($(this));
		$('#modal-validasi-pembayaran').modal('hide');
		
		$(instance).closest('tr').fadeOut(1500,function () { reload_table() });
	});
	
}
// end do valid

// start load modal detail pembayaran
function load_modal_detail_pembayaran(id_pembayaran)
{
    var isi_pembayaran = get_isi_pembayaran(id_pembayaran);

    

    $.each(isi_pembayaran, function (i, value) { 
         if(value.foto_bukti==null || value.foto_bukti=='')
        {
             $('.isi-detail-pembayaran').html(`<div class="row">
             <div class="col-sm">
                 <p class="text-center text-danger font-weight-bold">User belum upload bukti pembayaran </p>
             </div>
         </div>`);
        }
        else
        {
                
                $('.isi-detail-pembayaran').html(`<p class="lead text-center text-info font-weight-bold">Bukti Transfer</p>
                <img src="`+base_url+`uploads/items/bukti_tf/`+value.foto_bukti+`"
                    class="img-fluid mx-auto d-block" alt="">`);
         }
         $('.no-pembayaran').html(value.no_pembayaran);

    });

    $('#modal-detail-pembayaran').modal('show');

    // console.log(isi_pembayaran);
}
// end modal detail pembayarna


/// start action validasi pembayaran
function valid_action(id_pembayaran)
{
   

    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/validasi_pembayaran",
        data: {id_pembayaran:id_pembayaran},
        dataType: "json",
        success: function (response) {
            if (response.kode != 1) {
                alert_bootstrap(response.kode, response.pesan);

            } else {
                button_disabler($('.btn-submit'));
                alert_bootstrap(response.kode, response.pesan);
                setTimeout(function(){
                    $('#modal-detail-pembayaran').modal('hide');
                    reload_table();
                },700);
                
            }
        }
    });

    
}

/// end modal validasi pembayaran

// reload table pembayaran
function reload_table()
{
    $('#tabel-pembayaran').DataTable().destroy();
    load_pembayaran();
}
// end reload table pembayaran

/// start function load pembayaran
function load_pembayaran()
{
    $('#tabel-pembayaran').DataTable({
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
			[5, "desc"]
		],
        data:get_data_pembayaran(),
        columns: [
			{
				data: "no_pembayaran",
			},
			{
                data: "no_pesanan",
				
            },
            {
                data: "nama_user",
				
            },
            {
                data:"total_harga",
                render:function(data)  
                {
                    return 'Rp. ' + data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                }
              },
			{
				data: "status_pembayaran",
                render:function(data,type,row){
                        var st='';
                            if(data==1)
                            {
                                
                                st=`<span class="text-warning font-weight-bold">`+row.nama_status+`</span>`;
                            }
                            if(data==2)
                            {
                                st=`<span class="text-primary font-weight-bold">`+row.nama_status+`</span>`;
                            }
                            if(data==3)
                            {
                                st=`<span class="text-success font-weight-bold">`+row.nama_status+`</span>`;
                            }
                            if(data==4)
                            {
                                st=`<span class="text-danger font-weight-bold">`+row.nama_status+`</span>`;
                            }
                         
                    return st;
                    
                }
            },
            {
                data:"dibuat_pembayaran"
            },
			
			{
				data:"id_pembayaran",
				render: function (data,type,row) {
                    
                    
                    var btn_verif = `<div class="col-sm mb-2"><button type="button" class="btn btn-success btn-circle btn-validasi-pembayaran" title="Validasi!" data-value="`+data+`" ><i class="fas fa-check" ></i></button></div>`;
                    

                    if(row.status_pembayaran==1)
                    {
                        return render_btn_aksi('',data);
                    }
                    else if(row.status_pembayaran==2)
                    {
                        return render_btn_aksi(btn_verif,data);
                    }
                    else if(row.status_pembayaran==3)
                    {
                        return render_btn_aksi('',data);
                    }
                    else if(row.status_pembayaran==4)
                    {
                        return render_btn_aksi('',data);
                    }
                    
                    
				}
			}

			/*and so on, keep adding data elements here for all your columns.*/
		]
    });
}

/// end function load pembayaran


// start function get data pembayaran //
function get_data_pembayaran()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_pembayaran",
        data: {view:1},
        dataType: "json",
        success: function (response) {
           
            jsonku = response;
        }
    });
    
    return jsonku;
}

// end funtion get data pembayaran //


/// start render tombol aksi ///
function render_btn_aksi(btn,data)
{
    var warp1 = `<div class="row no-gutters">`;
    var warp2 = `</div>`
    var btn_detail = `<div class="col-sm mb-2"><button type="button" class="btn btn-info btn-circle btn-detail-pembayaran" title="Detail" data-value="`+data+`"><i class="fa fa-info" ></i></button></div>`;

    return warp1+''+btn_detail+''+btn+''+warp2;
}
/// end render tombol aksi ///


/// get isi pembayaran
function get_isi_pembayaran(id_pembayaran)
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_isi_pembayaran",
        data: {id_pembayaran:id_pembayaran},
        dataType: "json",
        success: function (response) {
            jsonku =  response;
        }
    });

    return jsonku;
}
// end get isi pembayaran



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


////===========================
/// function pencegah spam tombol
function button_disabler(instance)
{
	instance.prop('disabled',true);
	setTimeout(function(){instance.prop('disabled',false)},1500);
}
////===========================