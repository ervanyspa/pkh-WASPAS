<?php echo $this->session->flashdata('berhasil_petugas') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h4>Data User</h4>
							<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahPetugas"><i class="fas fa-plus"></i> Tambah Data</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-3" style="width:100%">
									<thead>
										<tr>
											<th style="width:5%">No</th>
											<th style="width:15%">Nama</th>
											<th style="width:15%">Alamat</th>
											<th style="width:10%">No Hp</th>
											<th style="width:10%">Foto</th>
											<th style="width:10%">Level</th>
											<th style="width:10%">Username</th>
											<th style="width:10%">Status</th>
											<th style="width:15%">Aksi</th>
										</tr>
									</thead>
									<tbody><?php
										$no = 1;
										foreach ($user as $usr) { ?>
										<tr id="<?= $usr['id_petugas'] ?>">
											<td><?= $no++ ?></td>
											<td><?= $usr['nama'] ?></td>
											<td><?= $usr['alamat'] ?></td>
											<td><?= $usr['nohp'] ?></td>
											<td><img src="<?= base_url('assets/img/uploads/').$usr['foto'] ?>" class="rounded-circle" width="35px" alt="image" data-toggle="tooltip"></td>
											<td><?= $usr['level'] ?></td>
											<td><?= $usr['username'] ?></td>
											<td>
												<?php if ($usr['status'] == 'aktif') { ?>
														<span class="badge badge-success"><?= $usr['status'] ?></span>
													<?php } else { ?>
														<span class="badge badge-danger"><?= $usr['status'] ?></span>
													<?php } ?>
											</td>
											<td>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editPetugas<?= $usr['id_petugas'] ?>"><i class="fas fa-pen"></i></a>
												<a href="#" class="btn btn-icon btn-sm btn-dark" data-toggle="modal" data-target="#editPassword"><i class="fas fa-lock"></i></a>
												<button class="btn btn-icon btn-sm btn-danger remove"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal Tambah -->
	<div class="modal fade" id="tambahPetugas" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Petugas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?= base_url() ?>data_user/tambah_user/" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama" required>
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="alamat" required>
							</div>
						</div>
						<div class="form-group">
							<label>No Hp</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nohp" required>
							</div>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control select2" style="width: 100%;" name="level" required>
								<option value="Admin">Admin</option>
								<option value="Superadmin">Superadmin</option>
							</select>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="username" required>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control select2" style="width: 100%;" name="status" required>
								<option value="Aktif">Aktif</option>
								<option value="Pasif">Pasif</option>
							</select>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<div class="input-group">
								<input type="file" class="form-control" placeholder="" name="foto" required>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($user as $usr) { ?>
	<!-- Modal Edit -->
	<div class="modal fade" id="editPetugas<?= $usr['id_petugas'] ?>" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Data Petugas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?= base_url() ?>data_user/update_user/<?php echo $usr['id_petugas'] ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" value="<?= $usr['nama'] ?>" name="nama" required>
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" value="<?= $usr['alamat'] ?>" name="alamat" required>
							</div>
						</div>
						<div class="form-group">
							<label>No Hp</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" value="<?= $usr['nohp'] ?>" name="nohp" required>
							</div>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control select2" style="width: 100%;" name="level" required>
								<option value="Admin" <?php echo ($usr['level'] === 'Admin') ? 'selected' : '' ?>>Admin</option>
								<option value="Superadmin" <?php echo ($usr['level'] === 'Superadmin') ? 'selected' : '' ?>>Superadmin</option>
							</select>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" value="<?= $usr['username'] ?>" name="username" required>
							</div>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control select2" style="width: 100%;" name="status" required>
								<option value="Aktif" <?php echo ($usr['status'] === 'Aktif') ? 'selected' : '' ?>>Aktif</option>
								<option value="Pasif" <?php echo ($usr['status'] === 'Pasif') ? 'selected' : '' ?>>Pasif</option>
							</select>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<div class="input-group">
								<input type="file" class="form-control" placeholder="" name="foto" required>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="modal fade" id="editPassword" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Password Baru</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="password" required>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(".remove").click(function() {
		var id = $(this).parents("tr").attr("id");
		swal({
			title: "Hapus User?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '<?= base_url() ?>data_user/delete_user/' + id,
					type: 'DELETE',
					error: function() {
						alert('Something is wrong');
					},
					success: function(data) {
						swal({
							title: "User Telah Terhapus"
						}).then(function() {
							location.reload();
						});
					}
				});
			} else {
				// swal("Batal");
			}
		});
	});
</script>
