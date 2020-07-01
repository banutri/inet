<div class="container-fluid">
	<div class="jumbotron bg-light ">
		<h1 class="display-5 text-body ">Checkout <span class="text-info"> <i class="fas fa-truck-moving"></i></span>
		</h1>
		<p>Silahkan isi form untuk detail pemesanan</p>
	</div>


	<div class="row">

		<div class="col-8">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover">

							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Harga</th>
									<th scope="col">Jumlah</th>
									<th scope="col">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; ?>
								<?php $total_keseluruhan=0; ?>
								<?php foreach($keranjang as $krj){   ?>
								<?php $total_harga = $krj->qty*$krj->harga_brg ?>

								<tr>
									<th scope="row"><?=$i ?></th>
									<td><?=$krj->nama_brg?></td>
									<td>Rp. <?=number_format($krj->harga_brg)?></td>
									<td><?=$krj->qty?></td>
									<td>Rp. <?= number_format($total_harga) ?></td>
								</tr>

								<?php $total_keseluruhan = $total_keseluruhan + $total_harga; ?>

								<?php $i++; ?>
								<?php } ?>
							</tbody>


						</table>
					</div>
				</div>
			</div>


		</div>
		<div class="col">
			<div class="card">
				<div class="card-body">
					<form action="<?php echo base_url('customer/buat_pesanan') ?>" method="post">
									<div class="form-group">
										<label for="">Nama</label>
										<input type="text" class="form-control" name="nama_user" autofocus required>
									</div>
									<div class="form-group">
										<label for="">No. Hp</label>
										<input type="text" class="form-control" name="no_hp_user" required>
									</div>
									<div class="form-group">
										<label for="">Alamat</label>
										<textarea name="alamat_user" id="" rows="5" class="form-control" style="resize:none;" required></textarea>
									</div>
						<div class="form-group">
							<label for="kurir">Kurir</label>
							<select class="form-control " id="kurir" name='id_kurir' required>
								<option disabled selected value="">..:: Pilih ::..</option>
                                <?php foreach($kurir as $k ) {?>
                                <option value="<?= $k->id_kurir ?>"><?= $k->nama_kurir ?> ( Rp. <?= number_format($k->harga_kurir) ?> )</option>
								<?php } ?>
                            </select>
						</div>

                        <div class="form-group">
							<label for="bank">Bank</label>
							<select class="form-control " id="bank" name='id_bank' required>
								<option disabled selected value="">..:: Pilih ::..</option>
                                <?php foreach($bank as $k ) {?>
                                <option value="<?= $k->id_bank ?>"><?= $k->nama_bank ?> </option>
								<?php } ?>
                            </select>
						</div>
                                <div class="form-group">
                                <label for="">Total</label>
                        <div class="card bg-light">
                                    
                                    <div class="card-body text-center">
                                        <p class="text-danger" style="font-size:5vh">Rp. <span class="total-harga" ></span> </p>
                                        
                                    </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" >Buat Pesanan</button>

                        
					</form>
				</div>
			</div>
		</div>
	</div>

</div>