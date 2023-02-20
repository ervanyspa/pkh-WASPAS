<?php echo $this->session->flashdata('berhasil_penerima') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h4>Data Penerima Bantuan</h4>
							<?php if ($this->session->userdata('status') == 'Aktif') { ?>
							<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahPenerimaBantuan"><i class="fas fa-plus"></i> Tambah Data</a></div>
							<?php } ?>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-1" style="width:100%">
									<thead>
										<tr>
											<th style="width:5%">No</th>
											<th style="width:15%">NIK</th>
											<th style="width:20%">Nama</th>
											<th style="width:20%">Alamat</th>
											<th style="width:10%">Angkatan</th>
											<th style="width:10%">Kategori</th>
											<th style="width:10%">Status</th>
											<?php if ($this->session->userdata('status') == 'Aktif') { ?>
											<th style="width:10%">Aksi</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $no = 1;
foreach ($penerima as $prm) { ?>
											<tr id="<?= $prm['id_penerima_bantuan'] ?>">
												<td><?= $no++ ?></td>
												<td><?= $prm['nik'] ?></td>
												<td><?= $prm['nama'] ?></td>
												<td><?= $prm['alamat'] ?></td>
												<td><?= $prm['angkatan'] ?></td>
												<td><?= $prm['kategori'] ?></td>
												<td>
													<?php if ($prm['status_bantuan'] == 'aktif') { ?>
														<span class="badge badge-success"><?= $prm['status_bantuan'] ?></span>
													<?php } else { ?>
														<span class="badge badge-danger"><?= $prm['status_bantuan'] ?></span>
													<?php } ?>
												</td>
												<?php if ($this->session->userdata('status') == 'Aktif') { ?>
												<td>
													<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editPenerimaBantuan<?= $prm['id_penerima_bantuan'] ?>"><i class="fas fa-pen"></i></a>
													<button class="btn btn-icon btn-sm btn-danger remove"><i class="fas fa-trash"></i></button>
												</td>
												<?php } ?>
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
	<div class="modal fade" id="tambahPenerimaBantuan" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Penerima Bantuan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?= base_url() ?>penerima_bantuan/tambah_penerima" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIK</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nik" required>
							</div>
						</div>
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
							<label>Angkatan</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="angkatan" required>
							</div>
						</div>
						<div class="form-group">
                      		<label>Kategori</label>
							<select class="form-control select2" style="width: 100%;" name="kategori" required>
								<option value="Pendidikan">Pendidikan</option>
								<option value="Kesehatan">Kesehatan</option>
								<option value="Kesejahteraan Sosial">Kesejahteraan Sosial</option>
							</select>
						</div>
						<div class="form-group">
                      		<label>Status</label>
							<select class="form-control select2" style="width: 100%;" name="status_bantuan" required>
								<option value="aktif">Aktif</option>
								<option value="tidak">Tidak</option>
							</select>
						</div>
						<div class="form-group align-right">
							<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php foreach ($penerima as $prm) { ?>
		<!-- Modal Edit -->
		<div class="modal fade" id="editPenerimaBantuan<?= $prm['id_penerima_bantuan'] ?>" role="dialog" aria-labelledby="formModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModal">Edit Data Penerima Bantuan</h5>
					</div>
					<div class="modal-body">
						<form class="" action="<?= base_url() ?>penerima_bantuan/update_penerima/<?php echo $prm['id_penerima_bantuan'] ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>NIK</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="" value="<?= $prm['nik'] ?>" name="nik" required>
								</div>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="" value="<?= $prm['nama'] ?>" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="" value="<?= $prm['alamat'] ?>" name="alamat" required>
								</div>
							</div>
							<div class="form-group">
								<label>Angkatan</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="" value="<?= $prm['angkatan'] ?>" name="angkatan" required>
								</div>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control select2" style="width: 100%;" name="kategori" required>
									<option value="Pendidikan" <?php echo ($prm['kategori'] === 'Pendidikan') ? 'selected' : '' ?>>Pendidikan</option>
									<option value="Kesehatan" <?php echo ($prm['kategori'] === 'Kesehatan') ? 'selected' : '' ?>>Kesehatan</option>
									<option value="Kesejahteraan Sosial" <?php echo ($prm['kategori'] === 'Kesejahteraan Sosial') ? 'selected' : '' ?>>Kesejahteraan Sosial</option>
								</select>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" style="width: 100%;" name="status_bantuan" required>
									<option value="aktif" <?php echo ($prm['status_bantuan'] === 'aktif') ? 'selected' : '' ?>>Aktif</option>
									<option value="tidak" <?php echo ($prm['status_bantuan'] === 'tidak') ? 'selected' : '' ?>>Tidak</option>
								</select>
							</div>
							<div class="form-group align-right">
								<button type="cancel" name="cancel" class="btn btn-secondary waves-effect mr-1">Batal</button>		
								<button type="submit" name="submit" class="btn btn-primary waves-effect">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(".remove").click(function() {
		var id = $(this).parents("tr").attr("id");
		swal({
			title: "Hapus Data?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '<?= base_url() ?>penerima_bantuan/delete_penerima/' + id,
					type: 'DELETE',
					error: function() {
						alert('Something is wrong');
					},
					success: function(data) {
						swal({
							title: "Data Telah Terhapus"
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
