<?php $stok=''?>
<div class="container">
	<div class="card">
		<div class="card-body">
			<?php foreach($barang as $brg){  $stok=$brg->stok_brg ?>
			<div class="row">
				<div class="col-lg-4">
					<div class="img-produk"
						style="background-image:url('<?php echo base_url('uploads/items/').$brg->foto ?>');">
					</div>
				</div>
				<div class="col-lg-8">
					<h4 class="modal-title nama_brg"><?=$brg->nama_brg ?></h4>
					<p class="my-2">
						<span class="text-danger text-lg harga_brg">Rp. <?= number_format($brg->harga_brg)?></span>
					</p>
					<?=ucfirst($brg->deskripsi) ?>
					<p>Tersisa : <?=$brg->stok_brg ?> barang</p>
				</div>
			</div>
		</div>
		<div class="card-footer" style="border:none; display:block;">
			<div class="row justify-content-center" style="display:;">
				<?php if($brg->stok_brg >0) {?>
                    <div class="col-md">
					<form class="form" action="<?php echo base_url('customer/beli_detail')?>" method="post">
                    <input type="text" value="<?php echo $brg->id_barang ?>" hidden name="id_barang">
						<div class="form-row">
							<div class="col-sm-2">
								<label for="" class="font-weight-bold text-info">Jumlah :</label>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<input type="number" class="form-control" name="qty" id="qty" value="1"
										class="form-control" min="1" max="<?php if($stok<10){ echo $stok;} else{echo '10';} ?>" required>
								</div>
							</div>
							<div class="col-sm"></div>
							<div class="col-sm-3">
								<button class="btn btn-success btn-beli btn-block mb-2" href="#beli">Beli</button>
							</div>
						</div>
					</form>
				</div>
				
                <?php } ?>
                <?php if($brg->stok_brg ==0) { ?>
                    <div class="col"><h4 class="text-danger text-center">Stok habis!</h4></div>
                <?php }?>

			</div>
		</div>
		<?php } ?>
	</div>

</div>
<script>
	var stok_brg = <?php echo $stok ?> ;
</script>
