$(document).ready(function () {
	// mengaktifkan tooltip
	initTooltip();


	// load semua barang
	load_barang_all();

	// load kategori
	load_kategori();

	// ketika nav di klik
	$('.nav-link').on('click', function () {

		initTooltip(); /// mengaktifkan tooltip teross :(

		$('.nav-link').removeClass('active');
		$(this).addClass('active');
		var value = $(this).data('value');
		if (value != null) {
			if (value == 'pencarian') {
				set_searchbox(); /// replace isi daftar barang dengan elemnt isi pencarian
			} else {
				load_barang_kategori(value);
				$('.item-kategori').fadeIn(500);
			}
		} else {
			load_barang_all();
			$('.item-kategori').fadeIn(500);
		}



	});
	// end nav klik


/// start anu alert ahh.. fading
$(".alert-sukses-php").fadeTo(2000, 500).slideUp(500, function () {
	$(".alert-sukses-php").slideUp(1000);
});

$(".alert-gagal-php").fadeTo(2000, 500).slideUp(500, function () {
	$(".alert-gagal-php").slideUp(1000);
});


/// end



/// start btn ad keranjang
$('.daftar-barang').on('click','.btn-add-keranjang',function(){
	var val = $(this).data('value');
	var hasil = add_to_cart(val);
	var kode = hasil.kode;
	var pesan = hasil.pesan;

	alert_bootstrap(kode,pesan);
	
});
/// end btn add keranjang


});


/// start load barang ke card
function load_barang_all() {
	$('.daftar-barang').html('');
	var barang = get_data_barang();

	if(barang=='')
	{
		$('.daftar-barang').html(`
		<div class="col-12 my-2 item-kategori" style="">
		<div class="jumbotron bg-light w-100" style="height:325px;">
			<h1 class="display-5 text-center text-danger">Kosong</h1>
		</div>
	</div>
		`);
	}


	$.each(barang, function (index, data) {
		
		
		var stok_habis_image = '';
		var stok_habis_button = '';
		if(data.stok_brg<=0){
			stok_habis_image = 
			`
				<div style="background-color:rgba(0,0,0,0.5); z-index:99; width:100%; height:100%" class="d-flex">
					<div class="align-self-center w-100 " > <p class="text-center lead text-light">Habis</p></div>
				</div>
			`;
		}
		else
		{
			stok_habis_button = `<div class="col">
			<form action="`+base_url+`customer/beli" method="post">
			<input name="id_barang" value="`+data.id_barang+`" hidden>
			
			<button type="submit" class="btn btn-success btn-circle btn-beli" data-toggle="tooltip"
				data-placement="top" title="Beli sekarang"><i class="fas fa-dollar-sign"></i></button>
			</form>
		</div>
		<div class="col">
			<button  data-value="`+data.id_barang+`" type="button" class="btn btn-danger btn-circle btn-add-keranjang" data-toggle="tooltip"
				data-placement="top" title="Tambah ke keranjang"><i class="fas fa-cart-plus"></i>
			</button>
		</div>`;
		}

		$('.daftar-barang').append(`
		<div class="col-md-3 my-2 item-kategori" style="display:none;">
		<!-- <a href="#" class="text-decoration-none"> -->
		<div class="card">
			
			<div class="img-produk "
				style="background-image:url('` + base_url + `uploads/items/` + data.foto + `');">
				`+stok_habis_image+`
			</div>
			

			<div class="card-body">
				<div class="row">
					<div class="col">
						<p class="card-title text-body" style="font-size:3vh"> ` + data.nama_brg + ` <span class="font-italic">(`+data.nama_kategori+`)</span></p>
					</div>

				</div>
				<div class="row">
					<div class="col">
						<h5 class="text-muted font-weight-light" style="font-size:2.7vh;">Rp.` + data.harga_brg + `</h5>
					</div>
				</div>
				<div class="row justify-content-center text-center no-gutters">
					<div class="col">
					<a href="`+base_url+`customer/detail/`+data.id_barang+`" name="id_barang" class="btn btn-info btn-circle btn-detail" data-toggle="tooltip"
					data-placement="top" title="Detail" ><i class="fas fa-info"></i></a>
					</div>
					`+stok_habis_button+`

				</div>
			</div>


		</div>


	</div>
		
		
		`);

		$('.item-kategori').fadeIn(500);

	});
}
/// end load barang


//function get data barang
function get_data_barang(id_barang = '') {
	var jsonku = '';
	if (id_barang != '') {
		$.ajax({
			async: false,
			url: base_url + 'customer/load_barang_by',
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
	} else {
		$.ajax({
			async: false,
			url: base_url + 'customer/load_barang_all',
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


// start get data kategori
function get_data_kategori() {
	var kategori = '';
	$.ajax({
		async: false,
		type: "post",
		url: base_url + "customer/get_kategori_all",
		data: {
			view: 1
		},
		dataType: "json",
		success: function (response) {

			kategori = response;
		}
	});
	return kategori;
}
/// end get kategori


/// load kategori ke nav
function load_kategori() {
	var kategori = get_data_kategori();
	kategori = kategori.reverse();

	$.each(kategori, function (index, value) {
		$('#main-nav').after(`
		 	
		 <li class="nav-item">
		 <a class="nav-link " href="#tabs" style=""  data-value="` + value.id_kategori + `">` + value.nama_kategori + `</a>
	 	</li>
		 `);
	});
	
}

/// load data barang by kategori
function load_data_barang_kategori(id_kategori = '') {
	var jsonku = '';
	if (id_kategori != '') {
		$.ajax({
			async: false,
			type: "post",
			url: base_url + "customer/load_barang_kategori",
			data: {
				id_kategori: id_kategori
			},
			dataType: "json",
			success: function (response) {
				jsonku = response;
			}
		});
	}
	return jsonku;
}
/// end load data barang kategori


/// start load barang per kategori
function load_barang_kategori(id_kategori) {
	var barang = load_data_barang_kategori(id_kategori);
	$('.daftar-barang').html('');
	if (barang.length > 0) //mengecek apakah ada balasan kategori nya?
	{
		$.each(barang, function (index, data) {
			var stok_habis_image = '';
		var stok_habis_button = '';
		if(data.stok_brg<=0){
			stok_habis_image = 
			`
				<div style="background-color:rgba(0,0,0,0.5); z-index:99; width:100%; height:100%" class="d-flex">
					<div class="align-self-center w-100 " ><p class="text-center font-weight-bold text-light">Habis</p></div>
				</div>
			`;
		}
		else
		{
			stok_habis_button = `<div class="col">
			<form action="`+base_url+`customer/beli" method="post">
			<input name="id_barang" value="`+data.id_barang+`" hidden>
			
			<button type="submit" class="btn btn-success btn-circle btn-beli" data-toggle="tooltip"
				data-placement="top" title="Beli sekarang"><i class="fas fa-dollar-sign"></i></button>
			</form>
		</div>
		<div class="col">
			<button  data-value="`+data.id_barang+`" type="button" class="btn btn-danger btn-circle btn-keranjang" data-toggle="tooltip"
				data-placement="top" title="Tambah ke keranjang"><i class="fas fa-cart-plus"></i>
			</button>
		</div>`;
		}

		$('.daftar-barang').append(`
		<div class="col-md-3 my-2 item-kategori" style="display:none;">
		<!-- <a href="#" class="text-decoration-none"> -->
		<div class="card">
			
			<div class="img-produk "
				style="background-image:url('` + base_url + `uploads/items/` + data.foto + `');">
				`+stok_habis_image+`
			</div>
			

			<div class="card-body">
				<div class="row">
					<div class="col">
						<p class="card-title text-body" style="font-size:3vh"> ` + data.nama_brg + ` <span class="font-italic">(`+data.nama_kategori+`)</span></p>
					</div>

				</div>
				<div class="row">
					<div class="col">
						<h5 class="text-muted font-weight-light" style="font-size:2.7vh;">Rp.` + data.harga_brg + `</h5>
					</div>
				</div>
				<div class="row justify-content-center text-center no-gutters">
					<div class="col">
					<a href="`+base_url+`customer/detail/`+data.id_barang+`" name="id_barang" class="btn btn-info btn-circle btn-detail" data-toggle="tooltip"
					data-placement="top" title="Detail" ><i class="fas fa-info"></i></a>
					</div>
					`+stok_habis_button+`

				</div>
			</div>


		</div>


	</div>
		
		
		`);

		});

	} else {
		$('.daftar-barang').html(`
		<div class="col-12 my-2 item-kategori" style="display:none; ">
			<div class="jumbotron bg-light w-100" style="height:325px;">
				<h1 class="display-5 text-center text-danger">Kosong</h1>
			</div>
		</div>


		

		`);

	}


}


/// mengaktifkan tooltip
function initTooltip() {
	setTimeout(function () {
		$('[data-toggle="tooltip"]').tooltip();
	}, 500);
}


/// function menyimpan element search berupa html
function set_searchbox() {
	$('.daftar-barang').html('');
	var form =
		`
	<div class="col-md-3 my-2 item-kategori" style="display:;">
		
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
	<div class="input-group">
		<input type="text" class="form-control bg-light border-0 small" id="navbar-search" placeholder="Cari barang..."
			aria-label="Search" aria-describedby="basic-addon2">
		<div class="input-group-append">
			<button class="btn btn-info" id="btn-submit-search" type="button">
				<i class="fas fa-search fa-sm"></i>
			</button>
		</div>
	</div>
	</form>

	</div>
	<div class="col-md-9 my-2 item-kategori" style="display:;">
		<div class="row daftar-pencarian">
			<div class="jumbotron bg-light w-100" style="height:325px;">
			<h1 class="display-5 text-center">Silahkan ketik nama barang</h1>
			</div>
		</div>
	</div>
	
	`;
	$('.daftar-barang').html(form);
	
	
	$('#navbar-search').focus();
	input_search();

}
/// end menyimpan element

/// start function untuk trigger button btn-submit-search
function input_search()
{
	$('#navbar-search').on('keyup',function(){
		var data_pencarian = $('#navbar-search').val();
		if(data_pencarian!='')
		{
			var hasil_pencarian = do_search_data(data_pencarian);
			set_hasil_search(hasil_pencarian);
		}
		else
		{
			set_searchbox();
		}
		

		
	});	
	
}

/// start function untuk melakukan pencarian
function do_search_data(data_pencarian)
{
	var jsonku = '';
	$.ajax({
		async:false,
		type: "post",
		url: base_url+"customer/search",
		data: {data:data_pencarian},
		dataType: "json",
		success: function (response) {
			
			jsonku = response;
		}
	});

	return jsonku;
}
/// end do search data

/// start menampilkan hasil pencarian
function set_hasil_search(hasil)
{
	if(hasil.length>0)
	{
		$('.daftar-pencarian').html('');
		$.each(hasil, function (index, data) {
		
		
			var stok_habis_image = '';
			var stok_habis_button = '';
			if(data.stok_brg<=0){
				stok_habis_image = 
				`
					<div style="background-color:rgba(0,0,0,0.5); z-index:99; width:100%; height:100%" class="d-flex">
						<div class="align-self-center w-100 " > <p class="text-center lead text-light">Habis</p></div>
					</div>
				`;
			}
			else
			{
				stok_habis_button = `<div class="col">
				<form action="`+base_url+`customer/beli" method="post">
				<input name="id_barang" value="`+data.id_barang+`" hidden>
				
				<button type="submit" class="btn btn-success btn-circle btn-beli" data-toggle="tooltip"
					data-placement="top" title="Beli sekarang"><i class="fas fa-dollar-sign"></i></button>
				</form>
			</div>
			<div class="col">
				<button  data-value="`+data.id_barang+`" type="button" class="btn btn-danger btn-circle btn-add-keranjang" data-toggle="tooltip"
					data-placement="top" title="Tambah ke keranjang"><i class="fas fa-cart-plus"></i>
				</button>
			</div>`;
			}
	
			$('.daftar-pencarian').append(`
			<div class="col-md-3 my-2 item-kategori" style="display:none;">
			<!-- <a href="#" class="text-decoration-none"> -->
			<div class="card">
				
				<div class="img-produk "
					style="background-image:url('` + base_url + `uploads/items/` + data.foto + `');">
					`+stok_habis_image+`
				</div>
				
	
				<div class="card-body">
					<div class="row">
						<div class="col">
							<p class="card-title text-body" style="font-size:3vh"> ` + data.nama_brg + ` <span class="font-italic">(`+data.nama_kategori+`)</span></p>
						</div>
	
					</div>
					<div class="row">
						<div class="col">
							<h5 class="text-muted font-weight-light" style="font-size:2.7vh;">Rp.` + data.harga_brg + `</h5>
						</div>
					</div>
					<div class="row justify-content-center text-center no-gutters">
						<div class="col">
						<a href="`+base_url+`customer/detail/`+data.id_barang+`" name="id_barang" class="btn btn-info btn-circle btn-detail" data-toggle="tooltip"
						data-placement="top" title="Detail" ><i class="fas fa-info"></i></a>
						</div>
						`+stok_habis_button+`
	
					</div>
				</div>
	
	
			</div>
	
	
		</div>
			
			
			`);
	
			$('.item-kategori').fadeIn(500);
	
		});
	}
	else
	{
		$('.daftar-pencarian').html(`
		<div class="col my-2 item-kategori" style="display:;">
		<div class="row daftar-pencarian">
			<div class="jumbotron bg-light w-100" style="height:325px;">
			<h1 class="display-5 text-center text-danger">Keyword tidak sesuai</h1>
			</div>
		</div>
	</div>
		
		
		`);
	}
}

/// mencegah inputan search tersubmit
$('.navbar-search').submit(function(e){ e.preventDefault();});


/////// ================== bagian detail ==============/////////
$(document).ready(function () {


	$('.btn-detail').on('click',function(){
		
		var id_barang = $(this).val();

	});


});


// start function add_to_cart
function add_to_cart(id_barang)
{
	var jsonku ='';
	$.ajax({
		async:false,
		type: "post",
		url: base_url+"customer/add_to_cart",
		data: {id_barang:id_barang},
		dataType: "json",
		success: function (response) {
			jsonku = response;
		}
	});

	return jsonku;
}
// end add to cart



/// start function do_get_detail
function do_get_detail_barang()
{
	$.ajax({
		type: "post",
		url: "url",
		data: "data",
		dataType: "dataType",
		success: function (response) {
			
		}
	});
}
/// end

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
