$(document).ready(function () {
    setInterval(function(){
        update_ikon_keranjang();
    },1000);
});



// start update ikon keranjang
function update_ikon_keranjang()
{
    var jumlah_isi_keranjang = get_jumlah_isi_keranjang();
        $('.cart-counter').html('');
        $('.cart-counter').html(jumlah_isi_keranjang);
}
// end update ikon keranjang

/// start get jumlah isi keranjang
function get_jumlah_isi_keranjang()
{
    var jumlah_isi = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"customer/get_data_keranjang",
        data: {view:1},
        dataType: "JSON",
        success: function (response) {
            jumlah_isi = response.jumlah_isi;
            
        }
    });

    return jumlah_isi;
}
/// end get jumlah isi keranjang
