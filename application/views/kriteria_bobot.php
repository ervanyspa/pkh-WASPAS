<?php echo $this->session->flashdata('berhasil_kriteria_bobot') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h4>Data Kriteria dan Bobot</h4>
							<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahKriteria"><i class="fas fa-plus"></i> Tambah Data</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-1">
									<thead>
										<tr>
											<th style="width: 5%;">No</th>
											<th style="width: 15%;">Kode Kriteria</th>
											<th style="width: 45%;">Jenis Kriteria</th>
											<th style="width: 10%;">Atribut</th>
											<th style="width: 10%;">Bobot</th>
											<th style="width: 15%;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($kriteria as $ktr) { ?>
											<tr id="<?= $ktr['id_kriteria'] ?>">
												<td><?= $no++ ?></td>
												<td><?= $ktr['nama_kode'] ?></td>
												<td><?= $ktr['jenis_kriteria'] ?></td>
												<td><?= $ktr['atribut'] ?></td>
												<td><?= $ktr['bobot'] ?></td>
												<td>
													<a title="Detail" href="#" class="btn btn-icon btn-sm btn-warning" data-toggle="modal" data-target="#lihatKriteria<?php echo $ktr['id_kriteria'] ?>"><i class="fas fa-info"></i></a>
													<a title="Edit Kriteria" href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editDataKriteria<?php echo $ktr['id_kriteria'] ?>"><i class="fas fa-pen"></i></a>
													<a title="Edit Rentang Nilai" href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editDataRentang<?php echo $ktr['id_kriteria'] ?>"><i class="fas fa-pen"></i></a>
													<button title="Delete" class="btn btn-icon btn-sm btn-danger remove">
														<i class="fas fa-trash"></i>
													</button>
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

	<!-- Tambah Kriteria -->
	<div class="modal fade" id="tambahKriteria" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Kriteria dan Bobot</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>kriteria_bobot/tambah_kriteria_bobot" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kode Kriteria</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama_kode" required>
							</div>
						</div>
						<div class="form-group">
							<label>Jenis Kriteria</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="jenis_kriteria" required>
							</div>
						</div>
						<div class="form-group">
							<label>Atribut</label>
							<select class="form-control select2" style="width: 100%;" name="atribut" required>
								<option value="Benefit">Benefit</option>
								<option value="Cost">Cost</option>
							</select>
						</div>
						<div class="form-group">
							<label>Bobot</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="bobot" required>
							</div>
						</div>
						<div class="form-group">
							<label>Rentang Nilai</label>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Jenis Rentang" name="jenis_rentang1" required>
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Nilai" name="nilai1" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Jenis Rentang" name="jenis_rentang2" required>
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Nilai" name="nilai2" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Jenis Rentang" name="jenis_rentang3" required>
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Nilai" name="nilai3" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Jenis Rentang" name="jenis_rentang4" required>
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" placeholder="Nilai" name="nilai4" required>
								</div>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-secondary waves-effect mr-1">Batal</button>
							<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Lihat Kriteria -->
	<?php foreach ($kriteria as $ktr) { ?>
		<div class="modal fade" id="lihatKriteria<?php echo $ktr['id_kriteria'] ?>" role="dialog" aria-labelledby="formModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModal">Detail Data Kriteria dan Bobot</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Kode Kriteria</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?php echo $ktr['nama_kode'] ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kriteria</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?php echo $ktr['jenis_kriteria'] ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Atribut</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?php echo $ktr['atribut'] ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Bobot</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?php echo $ktr['bobot'] ?>" disabled>
								</div>
							</div>
							<div class="form-group row mb-0">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Rentang Nilai</label>
								<div class="col-sm-9">
									<div class="form-row">
										<?php foreach ($rentang_nilai as $rn) { ?>

											<?php if ($rn['id_kriteria'] == $ktr['id_kriteria']) { ?>

												<div class="form-group col-md-8">
													<input type="text" class="form-control" value="<?php echo $rn['jenis_rentang'] ?>" disabled>
												</div>
												<div class="form-group col-md-4">
													<input type="text" class="form-control" value="<?php echo $rn['nilai'] ?>" disabled>
												</div>

											<?php } ?>

										<?php } ?>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Data Kriteria -->
		<div class="modal fade" id="editDataKriteria<?php echo $ktr['id_kriteria'] ?>" role="dialog" aria-labelledby="formModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModal">Edit Data Kriteria</h5>
					</div>
					<div class="modal-body">
						<form action="<?= base_url() ?>kriteria_bobot/update_kriteria/<?= $ktr['id_kriteria'] ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Kode Kriteria</label>
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo $ktr['nama_kode'] ?>" name="nama_kode" required>
								</div>
							</div>
							<div class="form-group">
								<label>Jenis Kriteria</label>
								<div class="input-group">
									<input type="text" class="form-control" name="jenis_kriteria" value="<?php echo $ktr['jenis_kriteria'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label>Atribut</label>
								<select class="form-control select2" style="width: 100%;" name="atribut" required>
									<option value="Benefit" <?php echo ($ktr['atribut'] === 'Benefit') ? 'selected' : '' ?>>Benefit</option>
									<option value="Cost" <?php echo ($ktr['atribut'] === 'Cost') ? 'selected' : '' ?>>Cost</option>
								</select>
							</div>
							<div class="form-group">
								<label>Bobot</label>
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo $ktr['bobot'] ?>" name="bobot" required>
								</div>
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

		<!-- Edit Data Rentang -->
		<div class="modal fade" id="editDataRentang<?php echo $ktr['id_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModal">Edit Data Rentang Kriteria</h5>
					</div>
					<div class="modal-body">
						<form action="<?= base_url() ?>kriteria_bobot/update_rentang/<?= $ktr['id_kriteria'] ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Rentang Nilai</label>
								<div class="form-row">
									<?php $ai = 1;
									foreach ($rentang_nilai as $rn) {
										if ($rn['id_kriteria'] == $ktr['id_kriteria']) { ?>
											<div class="form-group col-md-8">
												<input type="text" class="form-control" value="<?= $rn['jenis_rentang'] ?>" name="jenis_rentang<?= $ai ?>" required>
												<input type="hidden" value="<?= $rn['id_rentang'] ?>" name="id_rentang<?= $ai ?>">
											</div>
											<div class="form-group col-md-4">
												<input type="text" class="form-control" value="<?= $rn['nilai'] ?>" name="nilai<?= $ai ?>" required>
											</div>
									<?php $ai++;
										}
									} ?>
								</div>
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
					url: '<?= base_url() ?>kriteria_bobot/delete_kriteria/' + id,
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
