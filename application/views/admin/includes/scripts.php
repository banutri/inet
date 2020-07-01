 <!-- global var for javascript -->
 <script>
 	var base_url = "<?php echo base_url() ?>";
 </script>
 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url('sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
 <script src="<?php echo base_url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url('sbadmin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url('sbadmin/js/sb-admin-2.min.js') ?>"></script>
 <script src="<?php echo base_url('sbadmin/js/addtional.js') ?>"></script>
 




 <?php
    if($title=='dashboard')
    {
        echo '
        <script src="'.base_url('sbadmin/js/dashboard.js').'"></script>
        
        ';
    }
    else if($title=='barang')
    {
        echo '
        <script src="'.base_url('sbadmin/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
        <script src="'.base_url('sbadmin/js/demo/datatables-demo.js').'"></script>
        
        <script src="'.base_url('sbadmin/plugin/ckeditor/ckeditor.js').'"></script>
        <script src="'.base_url('sbadmin/js/barang.js').'"></script>
        
        ';
    }

    else if($title=='pesanan')
    {
        echo '
        <script src="'.base_url('sbadmin/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
        <script src="'.base_url('sbadmin/js/pesanan.js').'"></script>
        
        
        ';
    }

    else if($title=='pembayaran')
    {
        echo '
        <script src="'.base_url('sbadmin/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
        <script src="'.base_url('sbadmin/js/pembayaran.js').'"></script>
        
        
        ';
    }

    else if($title=='pengaturan')
    {
        echo '
        <script src="'.base_url('sbadmin/js/pengaturan.js').'"></script>
        
        
        ';
    }
  
  ?>

 </body>

 </html>
