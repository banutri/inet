<div class="container">
	<div class="jumbotron bg-light ">
		<h3 class="display-5 text-body text-center">Pesanan telah dibuat
		</h3>
		<p class="text-success text-center" style="font-size:6vh;"> <i class="fas fa-check-circle"></i></p>

	</div>
	<div class="row">
		<div class="col-sm">
			<div class="card mb-4">
				<div class="card-body">
					<h4 class="m-1 text-center">Silahkan lakukan pembayaran</h4>
					<?php foreach($pembayaran as $v){ $total_harga = $v->total_harga; ?>
					<p class="text-sm">1. Pergi ke ATM <span
							class="nama-bank font-weight-bold"><?=$v->nama_bank?></span> </p>
					<p>2. Masukan kartu ATM ke mesin ATM <span
							class="nama-bank font-weight-bold"><?=$v->nama_bank?></span> </p>
					<p>3. Pilih bahasa</p>
					<p>5. Masukan Pin <span class="font-weight-bold">6 digit</span> </p>
					<p>6. Pilih menu pembayaran</p>
					<p>7. Pilih menu virtual akun</p>
					<p>8. Masukan no pembayaran <span
							class="no-pembayaran font-weight-bold"><?=$v->no_pembayaran?></span> sebagai virtual
						akun, kemudian OK</p>
					<p>9. Masukan nominal uang sebesar <span class="total-harga text-danger">Rp.
							<?=number_format($v->total_harga)?></span> kemudian OK </p>
					<p>10. Ambil struk yang keluar dari mesin ATM <span
							class="nama-bank font-weight-bold"><?=$v->nama_bank?></span> ,
						kemudian foto struk tersebut</p>
					<p>11. Kirim foto tersebut sebagai bukti pembayaran ke nomor <a
							href="http://api.whatsapp.com/send?phone=+6281548143693"
							class="font-weight-bold text-body">+6281548143693</a> </p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			<div class="card h-100">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Tabel Pesanan</h6>
				</div>
				<div class="card-body " >
					<div class="table-responsive" style="height:300px; overflow-y:auto;"> 
						<table class="table table-hover " >

							<thead>
								<tr>
									<th scope="col">Nama</th>
									<th scope="col no-sort">Jumlah</th>
									<th scope="col">Harga</th>
									<th scope="col">Total</th>
								</tr>
							</thead>
							
								<tbody>
									<?php $total_barang =0; ?>
									<?php foreach($pesanan_isi as $v){ 
									$nama_kurir = $v->nama_kurir; 
									$harga_kurir=$v->harga_kurir;
									
									$total_barang = $total_barang+($v->harga_brg*$v->qty);
									?>
									<tr>
										<td><?=$v->nama_brg?></td>
										<td><?=$v->qty?> X</td>
										<td>Rp. <?=number_format($v->harga_brg)?></td>
										<td>Rp. <?=number_format($v->harga_brg*$v->qty)?></td>

									</tr>
									<?php } ?>


								</tbody>
						



						</table>
					</div>
				</div>
				<div class="card-footer">
					<span class="font-weight-bold">Total harga barang:</span> <span class="text-danger">Rp. <?=number_format($total_barang)?></span> + <span class="font-weight-bold">Biaya Expedisi: </span><span class="text-danger">Rp. <?=number_format($harga_kurir)?></span>

				</div>
			</div>
		</div>
		<div class="col-md">
			<div class="card  h-100">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
					<div class="dropdown no-arrow">


					</div>
				</div>
				<div class="card-body ">
					<div class="row">
						<div class="col-sm">
					<?php foreach($detail_pesanan as $v){ ?>
							<p><span class="font-weight-bold">Penerima</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
								<span class="nama-user"><?= $v->nama_user?></span> ( <span
									class="no-hp-user"><?= $v->no_hp_user?></span> ) </p>
						</div>
						<div class="w-100"></div>
						<div class="col-sm">

						</div>
						<div class="w-100"></div>
						<div class="col-sm">
							<p><span class="font-weight-bold">Pengiriman</span>&nbsp;: <span class="kurir-pesanan">
							<?= $v->nama_kurir?></span> </p>
						</div>
						<div class="w-100"></div>
						<div class="col-sm"><span
								class="font-weight-bold">Alamat</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
							<p class="alamat-user"><?= $v->alamat_user?></p>
						</div>
					<?php } ?>

					</div>
					<hr>
					<div class="row">
						<div class="col-sm align-self-center text-center p-1">
							<h3>Total</h3>
							<h2> <span class="text-danger">Rp. <span
										id="total-harga"><?=number_format($total_harga)?></span></span></h2>
						</div>
					</div>


				</div>
				<div class="card-footer">
					<a href="<?php echo base_url() ?>" class="card-link"><i class="fas fa-arrow-left"></i> Belanja
						Lagi</a>
				</div>
			</div>
		</div>
	</div>

</div>