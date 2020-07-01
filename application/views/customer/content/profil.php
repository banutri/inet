<div class="container-fluid">
	<div class="jumbotron bg-light ">
    
		<h1 class="display-5 text-body ">Selamat datang <span class="text-info"><?php echo $user_detail[0]->nama_user ?></span></h1>
		<p class="">Ini adalah halaman untuk melakukan perubahan data identitas dan data login anda</p>
		<hr>
	</div>

	<div class="row">
		
        <div class="col-md-5 my-2">
            <div class="card">
                <div class="card-header">
                    <span class="lead">Data Login</span>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('customer/profil/1') ?>" method="post">
                        
						<div class="form-group">
							<label for="username_baru">Username <span class="badge badge-success">Baru</span></label>
							<input type="text" class="form-control" name="username_baru" id="username_baru"
								placeholder="" value="<?php echo set_value('username_baru'); ?>">
							<label for="username_baru" class="label"><?php echo form_error('username_baru'); ?></label>
						</div>
				
					
						<div class="form-group">
							<label for="password_baru">Password <span class="badge badge-success">Baru</span></label>
							<input type="password" class="form-control" name="password_baru" id="password_baru" 
								placeholder="" value="<?php echo set_value('password_baru'); ?>">
							<label for="password_baru" class="label"><?php echo form_error('password_baru'); ?></label>
						</div>
                    <p class="text-body">Silahkan isi salah satu atau kedua kolom <span class="badge badge-success">diatas</span> hati-hati <span class="badge badge-danger">Auto logout!</span></p>
                    <div class="form-group">
							<label for="password">Password <span class="badge badge-warning">lama</span></label>
							<input type="password" class="form-control" name="password" id="password" required
								placeholder="(harus diisi)" value="">
							
						</div>
                    <button class="btn btn-info btn-block shadow" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

<?php foreach($user_detail as $v){ ?>
        <div class="col-md my-2">
			<div class="card " >
                <div class="card-header">
                    <span class="lead">Data Identitas</span>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url('customer/profil/2') ?>" method="post" accept-charset="utf-8"
				name="form-daftar">
				
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="username">Nama</label>
							<input type="text" class="form-control" name="nama_user" id="nama_user" required
								placeholder="Nama" value="<?= (set_value('nama_user')!=NULL ? set_value('nama_user') : $v->nama_user );?>">
							<label for="nama_user" class="label"><?php echo form_error('nama_user'); ?></label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="username">No. Identitas</label>
							<input type="text" class="form-control" name="no_identitas_user" id="no_identitas_user"
								required placeholder="KTP / SIM" value="<?= (set_value('no_identitas_user')!=NULL ? set_value('no_identitas_user') : $v->no_identitas_user );?>">
							<label for="no_identitas_user"class="label"><?php echo form_error('no_identitas_user'); ?></label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="username">No. Hp.</label>
							<input type="tel" class="form-control disabled" name="no_hp_user" id="no_hp_user"  value="<?= $v->no_hp_user ?> " disabled>
						
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="username">Kota</label>
							<input type="text" class="form-control" name="kota_user" id="kota_user" required
								placeholder="Semarang..." value="<?= (set_value('kota_user')!=NULL ? set_value('kota_user') : $v->kota_user );?>">
							<label for="kota_user" class="label"><?php echo form_error('kota_user'); ?></label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="username">Kode Pos</label>
							<input type="text" class="form-control" name="kode_pos_user" id="kode_pos_user" required
								placeholder="5022..." value="<?= (set_value('kode_pos_user')!=NULL ? set_value('kode_pos_user') : $v->kode_pos_user );?>">
							<label for="kode_pos_user" class="label"><?php echo form_error('kode_pos_user'); ?></label>
						</div>
					</div>

				</div> 

				<div class="form-group">
					<label for="username">Alamat</label>
					<textarea class="form-control" name="alamat_user" id="alamat_user" rows="3" style="resize:none;"
						required placeholder="Jl. halan halan..."><?= (set_value('alamat_user')!=NULL ? set_value('alamat_user') : $v->alamat_user );?></textarea>
					<label for="alamat_user" class="label"><?php echo form_error('alamat_user'); ?></label>
				</div> 
                <button class="btn btn-info btn-block shadow" type="submit">Simpan</button>
			</form>
                </div>
<?php } ?>
            </div>
		</div>

	</div>

</div>