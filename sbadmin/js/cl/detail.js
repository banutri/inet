$(document).ready(function () {
    
    // mencegah exceed qty
    $('#qty').on('keyup mouseup',function(){
        var value = $(this).val();
       
        if(value<=0)
        {
            $('.btn-beli').prop('disabled',true);
            $('.btn-keranjang').prop('disabled',true);
        }
        else
        {
            $('.btn-beli').prop('disabled',false);
            $('.btn-keranjang').prop('disabled',false);
            if(stok_brg<10)
            {
                if(value>stok_brg)
                {
                    $(this).val(stok_brg);
                }
            }
            else
            {
                if(value>10)
                {
                    $(this).val(10);
                }
            }
            
            
        }
    
        
    });
});