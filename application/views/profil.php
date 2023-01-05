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
								<img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
								<div class="clearfix"></div>
								<div class="author-box-name">
									<a href="#">Sarah Smith</a>
								</div>
								<div class="author-box-job">Web Developer</div>
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
										<p class="text-muted border-bottom">Emily Smith</p>
									</div>
									<div>
										<strong>No. Hp</strong>
										<br>
										<p class="text-muted border-bottom">Emily Smith</p>
									</div>
									<div>
										<strong>Alamat</strong>
										<br>
										<p class="text-muted border-bottom">Ponorogo</p>
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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>No. HP</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Foto Profil</label>
							<div class="input-group">
								<input type="file" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-secondary waves-effect mr-1">Batal</button>
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
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
					<form class="">
						<div class="form-group">
							<label>Password Lama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-secondary waves-effect mr-1">Batal</button>
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
