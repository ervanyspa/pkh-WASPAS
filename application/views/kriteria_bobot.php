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
											<th>No</th>
											<th>Kode Kriteria</th>
											<th>Jenis Kriteria</th>
											<th>Atribut</th>
											<th>Bobot</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>AAAAAA</td>
											<td>AAAAAA</td>
											<td>AAAAAA</td>
											<td>AAAAAA</td>
											<td>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#lihatKriteria"><i class="fas fa-info"></i></a>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editDataKriteria"><i class="fas fa-pen"></i></a>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editDataRentang"><i class="fas fa-pen"></i></a>
												<a href="#" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal with form -->
	<div class="modal fade" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Kriteria dan Bobot</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="">
						<div class="form-group">
							<label>Kode Kriteria</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nik">
							</div>
						</div>
						<div class="form-group">
							<label>Jenis Kriteria</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label>Atribut</label>
							<select class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
							</select>
						</div>
						<div class="form-group">
							<label>Bobot</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="alamat">
							</div>
						</div>
						<div class="form-group">
							<label>Rentang Nilai</label>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputEmail4" placeholder="Jenis Rentang">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputPassword4" placeholder="Nilai">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputEmail4" placeholder="Jenis Rentang">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputPassword4" placeholder="Nilai">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputEmail4" placeholder="Jenis Rentang">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputPassword4" placeholder="Nilai">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputEmail4" placeholder="Jenis Rentang">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="inputPassword4" placeholder="Nilai">
								</div>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal with form -->
	<div class="modal fade" id="lihatKriteria" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
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
								<input type="email" class="form-control" id="inputEmail3" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kriteria</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Atribut</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Bobot</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" placeholder="">
							</div>
						</div>
						<div class="form-group row mb-0">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Rentang Nilai</label>
							<div class="col-sm-9">
								<div class="form-row">
									<div class="form-group col-md-8">
										<input type="text" class="form-control" id="" placeholder="Jenis Rentang">
									</div>
									<div class="form-group col-md-4">
										<input type="text" class="form-control" id="" placeholder="Nilai">
									</div>
									<div class="form-group col-md-8">
										<input type="text" class="form-control" id="" placeholder="Jenis Rentang">
									</div>
									<div class="form-group col-md-4">
										<input type="text" class="form-control" id="" placeholder="Nilai">
									</div>
									<div class="form-group col-md-8">
										<input type="text" class="form-control" id="" placeholder="Jenis Rentang">
									</div>
									<div class="form-group col-md-4">
										<input type="text" class="form-control" id="" placeholder="Nilai">
									</div>
									<div class="form-group col-md-8">
										<input type="text" class="form-control" id="" placeholder="Jenis Rentang">
									</div>
									<div class="form-group col-md-4">
										<input type="text" class="form-control" id="" placeholder="Nilai">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
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
