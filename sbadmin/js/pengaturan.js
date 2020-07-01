$(document).ready(function () {
    
    load_tabel_pengaturan();







    ///========= start pengatura kurir ========///

    /// start tambah kurir ////
    $('.form-tambah-kurir').submit(function(e){
        e.preventDefault();
        $.ajax({
			url: base_url+'admin/add_kurir',
			type: 'post',
			dataType: 'json',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			success: function (response) {
				if (response.kode == 0) {
					alert_bootstrap(response.kode, response.pesan);

                } 
                else if(response.kode == 1) {
					button_disabler($('.btn-simpan'));
					button_disabler($('.btn-batal'));
					alert_bootstrap(response.kode, response.pesan);
					setTimeout(function(){
						$('#modal-tambah-kurir').modal('hide');
						load_tabel_pengaturan();
					},700);
					
                }
                else
                {
                    button_disabler($('.btn-simpan'));
					button_disabler($('.btn-batal'));
					alert_bootstrap(response.kode, response.pesan);
					setTimeout(function(){
						$('#modal-tambah-kurir').modal('hide');
						load_tabel_pengaturan();
					},700);
                }
                
                console.log('sukses koneksi');

            },
            error:function()
            {
                console.log('gagal koneksi');
            }
        });
       
    });
    /// end tambah kurir

    /// start edit
    $('.row').on('click','.btn-edit-kurir',function(){
        var val = $(this).data('value');
        var data = get_data_pengaturan_by(1,val);

        $.each(data, function (index, value) { 
            $('input[name="id_kurir"]').val(value.id_kurir);
            $('input[name="nama_kurir"]').val(value.nama_kurir);
            $('input[name="harga_kurir"]').val(value.harga_kurir);
            $('input[name="situs_kurir"]').val(value.situs_kurir);
        });
        
        $('#modal-edit-kurir').modal('show');
    
    });
    


    $('.form-edit-kurir').submit(function(e){
        e.preventDefault();
        $.ajax({
			url: base_url+'admin/up_kurir',
			type: 'post',
			dataType: 'json',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			success: function (response) {
				if (response.kode == 0) {
					alert_bootstrap(response.kode, response.pesan);

                } 
                else if(response.kode == 1) {
					button_disabler($('.btn-simpan'));
					button_disabler($('.btn-batal'));
					alert_bootstrap(response.kode, response.pesan);
					setTimeout(function(){
						$('#modal-edit-kurir').modal('hide');
						load_tabel_pengaturan();
					},700);
					
                }
                else
                {
                    button_disabler($('.btn-simpan'));
					button_disabler($('.btn-batal'));
					alert_bootstrap(response.kode, response.pesan);
					setTimeout(function(){
						$('#modal-edit-kurir').modal('hide');
						load_tabel_pengaturan();
					},700);
                }
                
                console.log('sukses koneksi');

            },
            error:function()
            {
                console.log('gagal koneksi');
            }
        });
       
    });
    
    /// end edit

    // hapus kurir
    $('.table-kurir').on('click','.btn-hapus-kurir',function () {
        var instance = $(this);
        var value = $(this).data('value');
        $('#modal-hapus-kurir').modal('show');
        $('.btn-hapus-kurir-ya').on('click',function () {
            $.ajax({
                type: "post",
                url: base_url+"admin/delete_pengaturan",
                data: {id:value,jenis:1},
                dataType: "json",
                success: function (response) {
                    if (response.kode != 1) {
                        alert_bootstrap(response.kode, response.pesan);
                    } else if (response.kode == 1) {
                        $('#modal-hapus-kurir').modal('hide');
                        alert_bootstrap(response.kode, response.pesan);
                        //animasi fading row
                        animated_row(instance);
                        console.log(response);
                    }
                    
                }
            });
        });
        
     });
    // end hapus kurir

     /// start clean form
    $('#modal-edit-kurir').on('hidden.bs.modal', function (e) {
        $('input[name="nama_kurir"]').val('');
        $('input[name="harga_kurir"]').val('');
        $('input[name="situs_kurir"]').val('');
    });
    $('#modal-tambah-kurir').on('hidden.bs.modal', function (e) {
        $('input[name="nama_kurir"]').val('');
        $('input[name="harga_kurir"]').val('');
        $('input[name="situs_kurir"]').val('');
    });
    /// end clear form


    ///======== end pengetauran kurir ===========////




    ///======== start pengaturan Bank ========///

        /// start tambah bank ////
        $('.form-tambah-bank').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/add_bank',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.kode == 0) {
                        alert_bootstrap(response.kode, response.pesan);

                    } 
                    else if(response.kode == 1) {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-tambah-bank').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                        
                    }
                    else
                    {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-tambah-bank').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                    }
                    
                    console.log('sukses koneksi');

                },
                error:function()
                {
                    console.log('gagal koneksi');
                }
            });
        
        });
        /// end tambah bank

        /// start edit
        $('.row').on('click','.btn-edit-bank',function(){
            var val = $(this).data('value');
            var data = get_data_pengaturan_by(2,val);

            $.each(data, function (index, value) { 
                $('input[name="id_bank"]').val(value.id_bank);
                $('input[name="nama_bank"]').val(value.nama_bank);
                $('input[name="no_rek"]').val(value.no_rek);
            });
            
            $('#modal-edit-bank').modal('show');
        
        });
        $('.form-edit-bank').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/up_bank',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.kode == 0) {
                        alert_bootstrap(response.kode, response.pesan);

                    } 
                    else if(response.kode == 1) {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-bank').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                        
                    }
                    else
                    {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-bank').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                    }
                    
                    console.log('sukses koneksi');

                },
                error:function()
                {
                    console.log('gagal koneksi');
                }
            });
        
        });
        
        /// end edit

        // hapus bank
        $('.table-bank').on('click','.btn-hapus-bank',function () {
            var instance = $(this);
            var value = $(this).data('value');
            $('#modal-hapus-bank').modal('show');
            $('.btn-hapus-bank-ya').on('click',function () {
                $.ajax({
                    type: "post",
                    url: base_url+"admin/delete_pengaturan",
                    data: {id:value,jenis:2},
                    dataType: "json",
                    success: function (response) {
                        if (response.kode != 1) {
                            alert_bootstrap(response.kode, response.pesan);
                        } else if (response.kode == 1) {
                            $('#modal-hapus-bank').modal('hide');
                            alert_bootstrap(response.kode, response.pesan);
                            //animasi fading row
                            animated_row(instance);
                            console.log(response);
                        }
                        
                    }
                });
            });
            
        });
        // end hapus bank

        /// start clean form
        $('#modal-edit-bank').on('hidden.bs.modal', function (e) {
            $('input[name="nama_bank"]').val('');
            $('input[name="no_rek"]').val('');
        });
        $('#modal-tambah-bank').on('hidden.bs.modal', function (e) {
            $('input[name="nama_bank"]').val('');
            $('input[name="no_rek"]').val('');
        });
        /// end clear form




    ///======== end pengaturan Bank ========///




    ///======== start pengaturan kategori ========///
    
        /// start tambah kategori ////
        $('.form-tambah-kategori').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/add_kategori',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.kode == 0) {
                        alert_bootstrap(response.kode, response.pesan);

                    } 
                    else if(response.kode == 1) {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-tambah-kategori').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                        
                    }
                    else
                    {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-tambah-kategori').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                    }
                    
                    console.log('sukses koneksi');

                },
                error:function()
                {
                    console.log('gagal koneksi');
                }
            });
        
        });
        /// end tambah kategori

        /// start edit
        $('.row').on('click','.btn-edit-kategori',function(){
            var val = $(this).data('value');
            var data = get_data_pengaturan_by(3,val);

            $.each(data, function (index, value) { 
                $('input[name="id_kategori"]').val(value.id_kategori);
                $('input[name="nama_kategori"]').val(value.nama_kategori);
               
            });
            
            $('#modal-edit-kategori').modal('show');
        
        });
        $('.form-edit-kategori').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/up_kategori',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.kode == 0) {
                        alert_bootstrap(response.kode, response.pesan);

                    } 
                    else if(response.kode == 1) {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-kategori').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                        
                    }
                    else
                    {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-kategori').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                    }
                    
                    console.log('sukses koneksi');

                },
                error:function()
                {
                    console.log('gagal koneksi');
                }
            });
        
        });
        
        /// end edit

        // hapus kategori
        $('.table-kategori').on('click','.btn-hapus-kategori',function () {
            var instance = $(this);
            var value = $(this).data('value');
            $('#modal-hapus-kategori').modal('show');
            $('.btn-hapus-kategori-ya').on('click',function () {
                $.ajax({
                    type: "post",
                    url: base_url+"admin/delete_pengaturan",
                    data: {id:value,jenis:3},
                    dataType: "json",
                    success: function (response) {
                        if (response.kode != 1) {
                            alert_bootstrap(response.kode, response.pesan);
                        } else if (response.kode == 1) {
                            $('#modal-hapus-kategori').modal('hide');
                            alert_bootstrap(response.kode, response.pesan);
                            //animasi fading row
                            animated_row(instance);
                            console.log(response);
                        }
                        
                    }
                });
            });
            
        });
        // end hapus kategori

        /// start clean form
        $('#modal-edit-kategori').on('hidden.bs.modal', function (e) {
            $('input[name="nama_kategori"]').val('');
        });
        $('#modal-tambah-kategori').on('hidden.bs.modal', function (e) {
            $('input[name="nama_kategori"]').val('');
        });
        /// end clear form




    ///======== end pengaturan Bank ========///





    // start pengaturan admin //
        /// start edit
        $('.row').on('click','.btn-edit-admin',function(){
            var val = $(this).data('value');
            var data = get_data_pengaturan_by(4,val);

            $.each(data, function (index, value) { 
                $('input[name="id_admin"]').val(value.id_admin);
                $('input[name="username"]').val(value.username);
                
               
            });
            
            $('#modal-edit-admin').modal('show');
        
        });
        $('.form-edit-admin').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/up_admin',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.kode == 0) {
                        alert_bootstrap(response.kode, response.pesan);

                    } 
                    else if(response.kode == 1) {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-admin').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                        
                    }
                    else
                    {
                        button_disabler($('.btn-simpan'));
                        button_disabler($('.btn-batal'));
                        alert_bootstrap(response.kode, response.pesan);
                        setTimeout(function(){
                            $('#modal-edit-admin').modal('hide');
                            load_tabel_pengaturan();
                        },700);
                    }
                    
                    console.log('sukses koneksi');

                },
                error:function()
                {
                    console.log('gagal koneksi');
                }
            });
        
        });
        $('#modal-edit-admin').on('hidden.bs.modal', function (e) {
            $('input[name="username"]').val('');
            $('input[name="password"]').val('');
        });
        /// end edit
    // end pengaturan admin //


});



/// staart get data pengaturan by ///
/// ini untuk load data pengaturan ///
function get_data_pengaturan_by(jenis,id)
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/get_data_pengaturan_by",
        data: {jenis:jenis,id:id},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });
    
    return jsonku;
}
/// end get data pengaturan by



/// start load semua tabel per ////
function load_admin()
{
    $('.admin').html('');
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/ld_admin",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, value) { 
                $('.admin').html(`
                <tr>
					<td> `+value.username+`</td>
                    <td>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                        <button type="button" class="btn btn-success  btn-sm btn-block btn-edit-admin" data-value="`+value.id_admin+`"><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
					</td>
				</tr>
                
                `);
            });
        }
    });
}

function load_kurir()
{
    $('.kurir').html('');
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/ld_kurir",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, value) { 
                $('.kurir').append(`
                <tr>
					<td>`+value.nama_kurir+`</td>
					<td>Rp.`+angka_koma(value.harga_kurir)+`</td>
					<td><a href="`+value.situs_kurir+`" target="_blank">`+value.situs_kurir+`</a></td>
                    <td>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                        <button type="button" class="btn btn-success  btn-sm btn-block btn-edit-kurir" data-value="`+value.id_kurir+`"><i class="fas fa-edit"></i></button>
                        </div>
                        <div class="col-md-6 mb-2">
                        <button type="button" class="btn btn-danger  btn-sm btn-block btn-hapus-kurir" data-value="`+value.id_kurir+`" ><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
					</td>
				</tr>
                
                `);
            });
        }
    });
}

function load_bank()
{
    $('.bank').html('');
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/ld_bank",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, value) { 
                $('.bank').append(`
                <tr>
					<td> `+value.nama_bank+`</td>
					<td> `+value.no_rek+`</td>
                    <td>
                    <div class="row">
                        <div class="col-sm-6 mb-2">
                        <button type="button" class="btn btn-success  btn-block btn-sm btn-edit-bank" data-value="`+value.id_bank+`" ><i class="fas fa-edit"></i></button>
                        </div>
                        <div class="col-sm-6 mb-2">
                        <button type="button" class="btn btn-danger btn-block btn-sm btn-hapus-bank" data-value="`+value.id_bank+`" ><i class="fas fa-minus"></i></button></td>
                        </div>
                    </div>
				</tr>
                
                `);
            });
        }
    });
}

function load_kategori()
{
    $('.kategori').html('');
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/ld_kategori",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, value) { 
                $('.kategori').append(`
                <tr>
					<td> `+value.nama_kategori+`</td>
                    <td>
                    <div class="row">
                        <div class="col-sm-6 mb-2">
                        <button type="button" class="btn btn-success btn-block btn-sm btn-edit-kategori" data-value="`+value.id_kategori+`" ><i class="fas fa-edit"></i></button>
                        </div>
                        <div class="col-sm-6 mb-2">
                        <button type="button" class="btn btn-danger btn-block btn-sm btn-hapus-kategori" data-value="`+value.id_kategori+`"><i class="fas fa-minus" data-value="`+value.id_kategori+`" ></i></button>
                        </div>
                    </td>
				</tr>
                
                `);
            });
        }
    });
}
function load_tabel_pengaturan()
{
    load_admin();
    load_kurir();
    load_bank();
    load_kategori();

}
/// end load table









	



/// start memberi koma pada bilangan ///
function angka_koma(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    
}
/// end koma


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
    else
    {
        $('#pesan-peringatan').html(pesan);
		$(".alert-warning").fadeTo(2000, 500).slideUp(500, function () {
			$(".alert-warning").slideUp(1000);
		});
    }

}
/// end alert


/// start animasi faing row
function animated_row(instance)
{
    $(instance).closest('tr').fadeOut(1500,function () { load_tabel_pengaturan(); });
}
/// end