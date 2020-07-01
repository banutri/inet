  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">Klik "Logout" untuk mengakhiri sesi</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
  				<a class="btn btn-primary" href="<?php echo base_url('admin/logout') ?>">Logout</a>
  			</div>
  		</div>
  	</div>
  </div>


  <?php if($title=='barang'){ ?>
  <!-- modal tambah barang-->
  <div class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form id="form-barang" action="<?php echo base_url('admin/tambah_barang') ?>" method="post"
  					enctype="multipart/form-data">
  					<input type="number" hidden name="id_barang">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="kode">Kode Barang</label>
  								<input type="text" class="form-control form-control-sm" id="kode" name="kode_brg"
  									placeholder="">
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="nama">Nama Barang</label>
  								<input type="text" class="form-control form-control-sm" id="nama" name="nama_brg"
  									placeholder="">
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-4">
  							<div class="form-group">
  								<label for="stok">Stok</label>
  								<input type="number" class="form-control form-control-sm" id="stok" name="stok_brg"
  									placeholder="">
  							</div>
  						</div>
  						<div class="col-md-4">
  							<div class="form-group">
  								<label for="harga">Harga <small class="text-danger">(Rupiah)</small></label>
  								<input type="number" class="form-control form-control-sm" id="harga" name="harga_brg"
  									placeholder="">

  							</div>
  						</div>
  						<div class="col-md-4">
  							<div class="form-group">
  								<label for="kategori">Kategori</label>
  								<select class="form-control form-control-sm" id="kategori" name='id_kategori'>

  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">

  						<div class="col-lg-8">
  							<div class="form-group">
  								<label for="deskripsi">Deskripsi</label>
  								<textarea class="form-control form-control-sm" id="deskripsi" name="deskripsi"
  									rows="8" style="resize:;"></textarea>
  							</div>
  						</div>
  						<div class="col-lg-4">
  							<div class="row">
  								<div class="col">
  									<div class="form-group">
  										<label for="foto">Foto</label>
  										<input type="file" accept="image/png, image/jpeg, image/jpg"
  											class="form-control-file form-control-sm" id="img-input" name="foto">
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col">

  									<img id="img-preview" src="<?php echo base_url('assets/img/kosong.jpg') ?>"
  										alt="" class="img-fluid mx-auto d-block img-thumbnail" style="height:150px;">

  								</div>
  							</div>
  						</div>
  					</div>


  					<div class="modal-footer">
  						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
  						<button type="submit" class="btn btn-info btn-submit" data-param="1">Kirim</button>
  					</div>
  				</form>
  			</div>


  		</div>
  	</div>
  </div>

  <!-- Modal konfirmasi hapus -->
  <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">Apakah ingin menghapus ini?</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-danger btn-hapus-ya" id="">Ya</button>
  			</div>
  		</div>
  	</div>
  </div>
  <?php } ?>


  <?php if($title=='pengaturan'){ ?>
  <!-- Start modal untuk pengaturan kurir -->

  <!-- Modal tambah kurir -->
  <div class="modal fade" id="modal-tambah-kurir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Kurir</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-tambah-kurir">
  							<div class="form-group">
  								<label for="nama_kurir">Nama Kurir</label>
  								<input type="text" class="form-control" id="nama_kurir" autofocus name="nama_kurir">
  							</div>
  							<div class="form-group">
  								<label for="harga_kurir">Biaya Kurir <span>(Rp)</span></label>
  								<input type="number" class="form-control" id="harga_kurir" name="harga_kurir" min="1">
  							</div>
  							<div class="form-group">
  								<label for="situs_kurir">Situs Track</label>
  								<input type="text" class="form-control" id="situs_kurir" name="situs_kurir" min="1">
  							</div>
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!-- Modal edit kurir -->
  <div class="modal fade" id="modal-edit-kurir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Kurir</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-edit-kurir">
  							<input type="text" name="id_kurir" id="id_kurir" hidden>
  							<div class="form-group">
  								<label for="nama_kurir">Nama Kurir</label>
  								<input type="text" class="form-control" id="nama_kurir" autofocus name="nama_kurir">
  							</div>
  							<div class="form-group">
  								<label for="harga_kurir">Biaya Kurir <span>(Rp)</span></label>
  								<input type="number" class="form-control" id="harga_kurir" name="harga_kurir">
  							</div>
  							<div class="form-group">
  								<label for="situs_kurir">Situs Track</label>
  								<input type="text" class="form-control" id="situs_kurir" name="situs_kurir">
  							</div>

  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
  </div>

  <!-- Modal konfirmasi hapus -->
  <div class="modal fade" id="modal-hapus-kurir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				Apakah ingin menghapus ini?
  				<p class="text-danger text-sm font-italic">Hati-hati saat menghapus kurir juga akan menghapus record
  					yang terkait!</p>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-danger btn-hapus-kurir-ya" id="">Ya</button>
  			</div>
  		</div>
  	</div>
  </div>



  <!-- end modal untuk pengaturan kurir -->




  <!-- Start modal untuk pengaturan bank -->

  <!-- Modal tambah Bank -->
  <div class="modal fade" id="modal-tambah-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Bank</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-tambah-bank">
  							<div class="form-group">
  								<label for="nama_bank">Nama bank</label>
  								<input type="text" class="form-control" id="nama_bank" autofocus name="nama_bank">
  							</div>
  							<div class="form-group">
  								<label for="no_rek">No. Rekening </label>
  								<input type="text" class="form-control" id="no_rek" name="no_rek">
  							</div>
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!-- Modal edit bank -->
  <div class="modal fade" id="modal-edit-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Bank</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-edit-bank">
  							<input type="text" name="id_bank" id="id_bank" hidden>
  							<div class="form-group">
  								<label for="nama_bank">Nama bank</label>
  								<input type="text" class="form-control" id="nama_bank" autofocus name="nama_bank">
  							</div>
  							<div class="form-group">
  								<label for="no_rek">No. Rekening </label>
  								<input type="number" class="form-control" id="no_rek" name="no_rek">
  							</div>

  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>


  <!-- Modal konfirmasi hapus -->
  <div class="modal fade" id="modal-hapus-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				Apakah ingin menghapus ini?
  				<p class="text-danger text-sm font-italic">Hati-hati saat menghapus bank juga akan menghapus record
  					yang terkait!</p>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-danger btn-hapus-bank-ya" id="">Ya</button>
  			</div>
  		</div>
  	</div>
  </div>



  <!-- end modal untuk pengaturan bank -->





  <!-- Start modal untuk pengaturan kategori -->

  <!-- Modal tambah kategori -->
  <div class="modal fade" id="modal-tambah-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Kategori</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-tambah-kategori">
  							<div class="form-group">
  								<label for="nama_kategori">Nama kategori</label>
  								<input type="text" class="form-control" id="nama_kategori" autofocus
  									name="nama_kategori">
  							</div>
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!-- Modal edit kategori -->
  <div class="modal fade" id="modal-edit-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">kategori</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-edit-kategori">
  							<input type="text" name="id_kategori" id="id_kategori" hidden>
  							<div class="form-group">
  								<label for="nama_kategori">Nama kategori</label>
  								<input type="text" class="form-control" id="nama_kategori" autofocus
  									name="nama_kategori">
  							</div>


  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>

  <!-- Modal konfirmasi hapus -->
  <div class="modal fade" id="modal-hapus-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<p>Apakah ingin menghapus ini?</p>
  				<p class="text-danger text-sm font-italic">Hati-hati saat menghapus kategori juga akan menghapus
  					barang yang memiliki kategori tersebut!</p>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-danger btn-hapus-kategori-ya" id="">Ya</button>
  			</div>
  		</div>
  	</div>
  </div>



  <!-- end modal untuk pengaturan bank -->





  <!-- Start pengaturan admin -->
  <div class="modal fade" id="modal-edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Admin</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">
  						<form action="post" class="form-edit-admin">
  							<input type="text" name="id_admin" id="id_admin" hidden>
  							<div class="form-group">
  								<label for="username">Username</label>
  								<input type="text" class="form-control" id="username" autofocus name="username">
  							</div>
  							<div class="form-group">
  								<label for="password">Password</label>
  								<input type="text" class="form-control" id="password" autofocus name="password"
  									placeholder="(unchanged)">
  							</div>
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>


  <?php } ?>


  <?php if($title=='pemesanan'){ ?>
  <!-- Start pengaturan admin -->
  <div class="modal fade" id="modal-detail-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Detail</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md">

  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-simpan" type="submit">Simpan</button>
  			</div>
  		</div>
  	</div>
  </div>

  <?php } ?>

  <!-- START PESANAN -->


  <!-- detail pesanan -->
  <div class="modal fade" id="modal-detail-pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog modal-xl" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-info" id="exampleModalLabel">Detail Pesanan <a
  						href="#no_pesanan" class="" title="No Pesanan">#<span class="no-pesanan"></span></a></h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-sm-6">
  						<div class="table-responsive">
  							<table class="table table-hover ">
  								<thead>
  									<tr>
  										<th>Nama</th>
  										<th>Harga</th>
  										<th>Jumlah</th>

  									</tr>

  								</thead>
  								<tbody id="isi-tabel-pesanan">

  								</tbody>
  							</table>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="card  h-100">
  							<div class="card-body ">
  								<div class="row">
  									<div class="col-sm">
  										<p><span
  												class="font-weight-bold">Penerima</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
  											<span class="nama-user">Banu Triyantoko</span> ( <span
  												class="no-hp-user">0987877776</span> ) </p>
  									</div>
  									<div class="w-100"></div>
  									<div class="col-sm">
  										<p><span
  												class="font-weight-bold">Status</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
  											<span class="status-pesanan "></span></p>
  									</div>
  									<div class="w-100"></div>
  									<div class="col-sm">
  										<p><span class="font-weight-bold">Pengiriman</span>&nbsp;: <span
  												class="kurir-pesanan"> Sicepat</span> ( <span title="Resi"
  												class="font-italic resi-pesanan">resi tidak tersedia</span> ) </p>
  									</div>
  									<div class="w-100"></div>
  									<div class="col-sm"><span
  											class="font-weight-bold">Alamat</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
  										<p class="alamat-user">Jl. Mr. Wurjanto Kp. Ngabean RT 01 RW 04, Gunungpati,
  											Semarang, 50225</p>
  									</div>


  								</div>
  								<hr>
  								<div class="row">
  									<div class="col-sm align-self-center text-center p-2">
  										<h2> <span class="text-danger total-harga">Rp. 50,000</span></h2>
  									</div>
  								</div>

  							</div>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="modal-footer">
  				<button class="btn btn-info" type="button" data-dismiss="modal">Tutup</button>
  			</div>

  		</div>
  	</div>
  </div>


  <!-- input resi -->
  <div class="modal fade" id="modal-input-resi-pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-info" id="exampleModalLabel">Resi untuk <a
  						href="#resi">#<span id="resi_pesanan"></span></a></h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">

  					<div class="col">
  						<form action="" method="" id="form-input-resi">
  							<div class="row">
  								<div class="col-8">
								  	<input type="number" hidden name="id_pesanan" id="id-pesanan">
  									<input type="text" class="form-control" id="no-resi" name="no_resi" autofocus>
  								</div>
  								<div class="col-4">
  									<button type="submit" class="btn btn-info btn-block btn-input-resi">Input <i
  											class="fab fa-telegram-plane"></i></button>
  								</div>
  							</div>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>



  <!-- start Modal detail pembayaran -->
  <div class="modal fade" id="modal-detail-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content ">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-info" id="exampleModalLabel">Detail untuk <a
  						href="#pay">#<span class="no-pembayaran"></span></a></h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body isi-detail-pembayaran">
				

					  

  			</div>
  		</div>
  	</div>
  </div>



  <!-- end Modal detail pembayaran -->


 <!-- start Modal validasi pembayaran -->
 <div class="modal fade" id="modal-validasi-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content ">
  			<div class="modal-header">
  				<h5 class="modal-title m-0 font-weight-bold text-info" id="exampleModalLabel">Konfirmasi</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">
				<p>Apakah anda ingin melakukan validasi pembayaran ini?</p>

  			</div>
			  <div class="modal-footer">
  				<button class="btn btn-secondary btn-batal" type="button" data-dismiss="modal">Batal</button>
  				<button class="btn btn-outline-success btn-valid-ya" type="submit">Validasi!</button>
  			</div>

  		</div>
  	</div>
  </div>



  <!-- END PESANAN -->

  <!-------------- alert --------------->
  <div class="alert alert-success alert-dismissible fade hidden alert-fixed" role="alert">
  	<strong>Sukses!</strong>
  	<p id="pesan-sukses"></p>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
  	</button>
  </div>

  <div class="alert alert-danger alert-dismissible fade hidden alert-fixed" role="alert">
  	<strong>Kesalahan!</strong>
  	<p id="pesan-gagal"></p>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
  	</button>
  </div>

  <div class="alert alert-warning alert-dismissible fade hidden alert-fixed" role="alert">
  	<strong>Peringatan!</strong>
  	<p id="pesan-peringatan"></p>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
  	</button>
  </div>