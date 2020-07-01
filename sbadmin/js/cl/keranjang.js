$(document).ready(function () {

	load_keranjang();
	update_harga();








	/// start perhitungan total harga dan qty ///
	$('.properti-barang').on('change', function () {
		update_harga();
	});
	/// end perhitungan total harga


	// tombol hapus item keranjang 
	$('#isi_keranjang').on('click', '.btn-hapus-item', function () {
		var instance = $(this);
		hapus(instance);
	});
	// end hapus item


});


/// start hitung total semua barang sesuai qty
function hitung_total() {
	var total_harga = 0;
	$('.baris-barang').each(function () {
		var i = $('.properti-barang', this);
		var harga = $(i).data('harga');
		var qty = $(i).val();

		total_harga = total_harga + (harga * qty);

	});
	return total_harga;
}
/// end hitung total

// hapus item aksi
function hapus(instance) {
	var id_barang = instance.data('id');
	$('#modal-hapus').unbind().modal(); /// mencegah terpanggil 2x atau lebih
	$('#modal-hapus .btn-hapus-ya').unbind().click(function () {


		hapus_item_aksi(id_barang);
		button_disabler($(this));
		$('#modal-hapus').modal('hide');

		$(instance).closest('.baris-barang').fadeOut(1500, function () {
			load_keranjang();
			update_harga();

		});
	});
}
// end aksi hapus


function hapus_item_aksi(id_barang) {
	$.ajax({
		async: false,
		type: "post",
		url: base_url + "customer/hapus_item_keranjang",
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


/// start update harga 
function update_harga() {
    var total = hitung_total();
	var total_koma = angka_koma(total);
    if(isNaN(total))
    {
        $('.footer-harga').remove();
        
    }
    else
    {
        $('.total-harga').html(total_koma);
    }

    
	
}
/// end update harga   

/// strat load keranjang
function load_keranjang() {


	var isi_keranjang = get_isi_keranjang();
	$('#isi_keranjang').html('');

	if (isi_keranjang != '') {
		$.each(isi_keranjang, function (index, value) {
			$('#isi_keranjang').append(`
            
            <div class="card-body baris-barang">
            <div class="row my-1">
                <div class="col-md-3 align-self-center my-1">
                    <div class="foto-barang mx-auto d-block"
                        style="background-image:url('` + base_url + `uploads/items/` + value.foto + `');">
                    </div>
                </div>
                <input type="text" name="id_barang[]" value="` + value.id_barang + `" hidden>
                <div class="col-md align-self-center   my-1"><span
                        class="font-weight-bold ">` + value.nama_brg + `</span></div>
                <div class="col-md align-self-center text-center my-1 "><span class="harga " data-value="` + value.harga_brg + `">Rp. ` + angka_koma(value.harga_brg) + `</span></div>
                <div class="col-md-2 align-self-center text-center my-1">
                    <div class="form-group">
                        <input type="number" name="qty[]" class="form-control properti-barang" data-harga="` + value.harga_brg + `" value="` + value.qty + `" min="1" max="` + (value.stok_brg > 10 ? 10 : value.stok_brg) + `">
                    </div>
                </div>
                <div class="col-md align-self-center text-center my-1">
                    <button type="button" class="btn btn-danger btn-circle btn-hapus-item" data-id="` + value.id_barang + `" title="Hapus"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <hr>
        </div>
    
            `);

		});
	} else {
		$('#isi_keranjang').html(`
            <div class="card-body baris-barang">
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h1 class="display-4 ">Keranjang kosong <i class="far fa-frown text-info"></i></h1>
            <p class="lead">Klik <a href="` + base_url + `" target="_blank"><span class="badge badge-info">Disini</span></a> untuk berbelanja</p>
            </div>
            </div>
            </div>
        `);
	}



}
/// end load keranjang






/// start get isi keranjang
function get_isi_keranjang() {
	var isi_keranjang = '';


	$.ajax({
		async: false,
		type: "post",
		url: base_url + "customer/get_data_keranjang",
		data: {
			view: 1
		},
		dataType: "JSON",
		success: function (response) {
			isi_keranjang = response['isi_keranjang'];

		}
	});
	return isi_keranjang;
}
// end get isi keranjang


/// start function ubah angka koma
function angka_koma(angka) {
	return angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
///end function ubah angka koma






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

/// function pencegah spam tombol
function button_disabler(instance) {
	instance.prop('disabled', true);
	setTimeout(function () {
		instance.prop('disabled', false)
	}, 1500);
}
////===========================



/// start anu alert ahh.. fading
$(".alert-sukses-php").fadeTo(2000, 500).slideUp(500, function () {
	$(".alert-sukses-php").slideUp(1000);
});

$(".alert-gagal-php").fadeTo(2000, 500).slideUp(500, function () {
	$(".alert-gagal-php").slideUp(1000);
});


/// end
