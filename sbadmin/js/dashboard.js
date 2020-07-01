$(document).ready(function () {
    
pendapatan();
total_stock_barang();
total_barang_terjual();

// update
setInterval(() => {
    pendapatan();
    total_stock_barang();
    total_barang_terjual();
}, 60000);
// update
    
});

// start total barang
function pendapatan()
{
    $('.pendapatan').html(angka_koma(get_data_pendapatan()));
}
// end total barang

// start total barang
function total_barang_terjual()
{
    $('.total-barang-terjual').html(get_data_total_barang_terjual());
}
// end total barang


// start total barang
function total_stock_barang()
{
    $('.total-stock').html(get_data_total_stock());
}
// end total barang

// start get data total_stock
function get_data_total_stock()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/total_stock",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;
}
// end get data total_stock


// start get data barang_terjual
function get_data_total_barang_terjual()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/total_barang_terjual",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;
}
// end get data barang_terjual


// start get data pendapatan
function get_data_pendapatan()
{
    var jsonku = '';
    $.ajax({
        async:false,
        type: "post",
        url: base_url+"admin/pendapatan",
        data: {view:1},
        dataType: "json",
        success: function (response) {
            jsonku = response;
        }
    });

    return jsonku;
}
// end get data pendapatan


// start angka koma
function angka_koma(angka)
{
    return angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}
// end angka koma