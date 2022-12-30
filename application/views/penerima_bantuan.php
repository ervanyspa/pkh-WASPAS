<?php echo $this->session->flashdata('berhasil_penerima') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h4>Data Penerima Bantuan</h4>
							<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahPenerimaBantuan"><i class="fas fa-plus"></i> Tambah Data</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-1">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Angkatan</th>
											<th>Kategori</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										foreach($penerima as $prm) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $prm['nik'] ?></td>
											<td><?= $prm['nama'] ?></td>
											<td><?= $prm['alamat'] ?></td>
											<td><?= $prm['angkatan'] ?></td>
											<td><?= $prm['kategori'] ?></td>
											<td>
												<?php if($prm['status_bantuan'] == 'aktif') { ?>
													<span class="badge badge-success"><?= $prm['status_bantuan'] ?></span>
												<?php } else { ?>
													<span class="badge badge-danger"><?= $prm['status_bantuan'] ?></span>
												<?php } ?>
											</td>
											<td>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editPenerimaBantuan"><i class="fas fa-pen"></i></a>
												<a href="#" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
	<div class="modal fade" id="tambahPenerimaBantuan" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
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
							<select class="form-control" name="kategori" required>
								<option value="Pendidikan">Pendidikan</option>
								<option value="Kesehatan">Kesehatan</option>
								<option value="Kesejahteraan Sosial">Kesejahteraan Sosial</option>
							</select>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status_bantuan" required>
								<option value="Aktif">Aktif</option>
								<option value="Tidak">Tidak</option>
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


	<!-- Modal Edit -->
	<div class="modal fade" id="editPenerimaBantuan" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Data Penerima Bantuan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="">
						<div class="form-group">
							<label>NIK</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nik">
							</div>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="alamat">
							</div>
						</div>
						<div class="form-group">
							<label>Angkatan</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="angkatan">
							</div>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
							</select>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
