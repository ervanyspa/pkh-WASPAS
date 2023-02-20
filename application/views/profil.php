<?php echo $this->session->flashdata('berhasil_profil') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card author-box">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Personal Detail</h4>
						</div>
						<div class="card-body">
							<div class="author-box-center">
								<img alt="image" src="<?= base_url('assets/img/uploads/') . $petugas['foto'] ?>" class="rounded-circle author-box-picture">
								<div class="clearfix"></div>
								<div class="author-box-name">
									<a href="#"><?= $petugas['nama'] ?></a>
								</div>
							<?php if ($this->session->userdata('status') == 'Aktif') { ?>
								<span class="badge badge-success">Aktif</span>
								<?php } else { ?>
									<span class="badge badge-danger">Pasif</span>
								<?php } ?>
								<div class="author-box-job"><?= $petugas['level'] ?></div>
							</div>
							<div class="d-flex justify-content-center">
								<div class="p-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editProfil">Edit Profil</a></div>
								<div class="p-2"><a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPassword">Ubah Password</a></div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-6">
									<div>
										<strong>Username</strong>
										<br>
										<p class="text-muted border-bottom"><?= $petugas['username'] ?></p>
									</div>
									<div>
										<strong>No. Hp</strong>
										<br>
										<p class="text-muted border-bottom"><?= $petugas['nohp'] ?></p>
									</div>
									<div>
										<strong>Alamat</strong>
										<br>
										<p class="text-muted border-bottom"><?= $petugas['alamat'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
			
	<!-- Edit Profil -->
	<div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Profil</h5>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>profil/update_profil" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama" value="<?= $petugas['nama'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="alamat" value="<?= $petugas['alamat'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label>No. HP</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nohp" value="<?= $petugas['nohp'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="username" value="<?= $petugas['username'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Foto Profil</label>
							<div class="input-group">
								<input type="file" class="form-control" placeholder="" name="foto">
							</div>
						</div>
						<div class="form-group align-right">
							<button type="cancle" name="cancle" class="btn btn-secondary waves-effect mr-1">Batal</button>
							<button type="submit" name="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Password -->
	<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>profil/ubah_password" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Password Lama</label>
							<div class="input-group">
								<input type="password" id="password" class="form-control" placeholder="" name="password_lama">
								<div class="input-group-append">
										<div class="input-group-text"><i class="fas fa-eye " id="eyeIcon"></i></div>
									</div>
							</div>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<div class="input-group">
								<input type="password" id="password2" class="form-control" placeholder="" name="password_baru">
								<div class="input-group-append">
										<div class="input-group-text"><i class="fas fa-eye " id="eyeIcon2"></i></div>
									</div>
							</div>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<div class="input-group">
								<input type="password" id="password3" class="form-control" placeholder="" onkeyup="check()">
								<div class="input-group-append">
										<div class="input-group-text"><i class="fas fa-eye " id="eyeIcon3"></i></div>
									</div>
							</div>
							<p id="alertPassword" class="d-flex ml-2 text-danger"></p>
						</div>
						<div class="form-group align-right">
							<button type="cancel" name="cancel" class="btn btn-secondary waves-effect mr-1">Batal</button>
							<button type="submit" name="submit" class="btn btn-primary waves-effect" id="btnsubmit">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let passwordInput = document.getElementById('password'),
		icon = document.getElementById('eyeIcon');

	function togglePassword() {
		if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
			icon.classList.add("fa-eye-slash");
			//toggle.innerHTML = 'hide';
		} else {
			passwordInput.type = 'password';
			icon.classList.remove("fa-eye-slash");
			//toggle.innerHTML = 'show';
		}
	}

	function checkInput() {}

	icon.addEventListener('click', togglePassword, false);
	passwordInput.addEventListener('keyup', checkInput, false);
</script>

<script type="text/javascript">
	let passwordInput2 = document.getElementById('password2'),
		icon2 = document.getElementById('eyeIcon2');

	function togglePassword2() {
		if (passwordInput2.type === 'password') {
			passwordInput2.type = 'text';
			icon2.classList.add("fa-eye-slash");
			//toggle.innerHTML = 'hide';
		} else {
			passwordInput2.type = 'password';
			icon2.classList.remove("fa-eye-slash");
			//toggle.innerHTML = 'show';
		}
	}

	function checkInput2() {}

	icon2.addEventListener('click', togglePassword2, false);
	passwordInput2.addEventListener('keyup', checkInput2, false);
</script>

<script type="text/javascript">
	let passwordInput3 = document.getElementById('password3'),
		icon3 = document.getElementById('eyeIcon3');

	function togglePassword3() {
		if (passwordInput3.type === 'password') {
			passwordInput3.type = 'text';
			icon3.classList.add("fa-eye-slash");
			//toggle.innerHTML = 'hide';
		} else {
			passwordInput3.type = 'password';
			icon3.classList.remove("fa-eye-slash");
			//toggle.innerHTML = 'show';
		}
	}

	function checkInput3() {}

	icon3.addEventListener('click', togglePassword3, false);
	passwordInput3.addEventListener('keyup', checkInput3, false);
</script>

<script>
	var check = function() {
		if (document.getElementById('password2').value == document.getElementById('password3').value) {
			document.getElementById('alertPassword').style.color = '#8CC63E';
			document.getElementById('alertPassword').innerHTML = '';
			document.getElementById('btnsubmit').disabled = false;
		} else {
			document.getElementById('alertPassword').style.color = '#EE2B39';
			document.getElementById('alertPassword').innerHTML = '<span>password tidak cocok</span>';
			document.getElementById('btnsubmit').disabled = true;
		}
	}
</script>
