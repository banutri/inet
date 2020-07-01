

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




<!-------------- alert PHP --------------->
<?php if($this->session->flashdata('pesan_berhasil')!=NULL) {?>
<div class="alert alert-sukses-php alert-success alert-dismissible show fade alert-fixed" role="alert">
	<strong>Sukses!</strong>
	<p id="pesan-sukses"><?php echo $this->session->flashdata('pesan_berhasil'); ?></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>

<?php if($this->session->flashdata('pesan_gagal')!=NULL){ ?>
<div class="alert alert-gagal-php alert-danger alert-dismissible show fade alert-fixed" role="alert">
	<strong>Kesalahan!</strong>
	<p id="pesan-gagal"><?php echo $this->session->flashdata('pesan_gagal'); ?></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>








<!-------------- alert --------------->
<div class="alert alert-success alert-dismissible alert-fixed" role="alert" style="display:none;">
	<strong>Sukses!</strong>
	<p id="pesan-sukses"></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

<div class="alert alert-danger alert-dismissible  alert-fixed" role="alert" style="display:none;">
	<strong>Kesalahan!</strong>
	<p id="pesan-gagal"></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>