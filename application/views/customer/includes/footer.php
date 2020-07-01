	
	<?php if($title=='home' || $title=='detail'){ ?>
	<a href="<?php echo base_url('customer/keranjang') ?>">
		<div class="item bg-info text-light" style="z-index:9999;">
			<span class="notify-badge badge badge-danger badge-counter cart-counter"></span>
			<i class="fas fa-shopping-cart text-lg"></i>
		</div>
	</a>
	<?php } ?>

	<!-- Footer -->
	<footer class="mt-5 p-5 bg-dark footer">
		<div class="container">
			<p class="m-0 text-center ">
			
            <span class="text-white">iNet Shop Tugas Pemrograman Web Lanjut 2020 | &copy;</span> <span> <a href="<?php echo base_url('about') ?>" class="card-link text-info"> Banu Triyantoko </a></span>
       
			</p>
		</div>
		<!-- /.container -->
	</footer>

	<script>var base_url = '<?php echo base_url() ?>';</script>
	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo base_url('sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('sbadmin/vendor/popper/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- script cutom -->

	

	
	<?php
		if($title=='home')
		{
			echo 
			'
				<script src="'.base_url('sbadmin/js/cl/barang.js').'"></script>
				<script src="'.base_url('sbadmin/js/cl/real_time_keranjang.js').'"></script>
			';
		}
		elseif($title=='detail')
		{
			echo 
			'
				
				<script src="'.base_url('sbadmin/js/cl/detail.js').'"></script>
				<script src="'.base_url('sbadmin/js/cl/real_time_keranjang.js').'"></script>
			';
		}

		
		elseif($title=='keranjang')
		{
			echo 
			'
				<script src="' .base_url('sbadmin/js/cl/keranjang.js').'"></script>

			';
		}

		elseif($title=='checkout')
		{
			echo '
			<script src="' .base_url('sbadmin/js/cl/checkout.js').'"></script>
			';
		}
		
		
	?>





</body>

</html>