$(document).ready(function () {

    total_harga();

    
    /// start select kurir ///
    $('#kurir').on('change',function(){
        var val = $(this).val();
        total_harga(val);
        
    });
    /// end select kurir //
});




/// start update total harga
function total_harga(id_kurir='')
{
    var total_harga = total_barang()+harga_kurir(id_kurir);
    $('.total-harga').html(angka_koma(total_harga));

}
/// end





/// start function hitung total barang//
function total_barang()
{
    var total = 0;
    var data = data_keranjang();

    $.each(data.isi_keranjang, function (index, value) { 
         total = total + (value.qty*value.harga_brg);
    });

    return total;
}

/// end




/// get data keranjang ///
function data_keranjang()
{
    var jsonku = '';

    $.ajax({
        async:false,
        type: "post",
        url: base_url+"customer/get_data_keranjang",
        data: {view:1},
        dataType: "JSON",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;

}
////


/// start data kurir
function harga_kurir(id_kurir)
{
    var jsonku = '';

    $.ajax({
        async:false,
        type: "post",
        url: base_url+"customer/get_data_kurir_by",
        data: {id_kurir:id_kurir},
        dataType: "json",
        success: function (response) {
            jsonku = parseInt(response[0].harga_kurir);
            console.log(jsonku);
        }
    });

    return jsonku;

}
/// end



/// start function ubah angka koma
function angka_koma(angka) {
	return angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
///end function ubah angka koma

