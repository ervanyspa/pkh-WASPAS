<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Data Peserta Graduasi</h4>
							<div class="p-2 align-right">
								<h6>Total</h6>
								<h6>20</h6>
							</div>
							<div class="p-2"><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahPesertaGraduasi"><i class="fas fa-plus"></i> Tambah Data</a></div>
							<div class="p-2"><a href="#" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#prosesPenilaian"></i> Proses Penilaian</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-1">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama</th>
											<th>Periode</th>
											<th>Status Penilaian</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>AAAAAA</td>
											<td>AAAAAA</td>
											<td>2018-01-20</td>
											<td><span class="badge badge-success">Success</span></td>
											<td>
												<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editPesertaGraduasi"><i class="fas fa-pen"></i></a>
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
	<div class="modal fade bd-example-modal-lg" id="tambahPesertaGraduasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Peserta Graduasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="">
						<div class="form-group">
							<label>NIK / Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nik">
							</div>
						</div>
						<div class="form-group">
							<label>Periode</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Kepemilikan Rumah</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Penghasilan</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Hutang</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Pengeluaran Pembelian Makanan dalam Seminggu</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Pembelian Pakaian dalam Setahun</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Lantai Tempat Tinggal</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Dinding Tempat Tinggal</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Tempat BAB / BAK</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Sumber Penerangan</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Hak Aset</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-secondary waves-effect">Batal</button>
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Edit -->
	<div class="modal fade bd-example-modal-lg" id="editPesertaGraduasi" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Edit Data Peserta Graduasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="">
						<div class="form-group">
							<label>NIK / Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nik">
							</div>
						</div>
						<div class="form-group">
							<label>Periode</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Kepemilikan Rumah</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Penghasilan</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Hutang</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Pengeluaran Pembelian Makanan dalam Seminggu</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Pembelian Pakaian dalam Setahun</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Lantai Tempat Tinggal</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Dinding Tempat Tinggal</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Tempat BAB / BAK</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Sumber Penerangan</label>
								<select class="form-control selectric">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="form-group col-md-6">
							<label>Hak Aset</label>
							<select class="form-control selectric">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
							</select>
							</div>
						</div>
						<div class="form-group align-right">
							<button type="button" class="btn btn-secondary waves-effect">Batal</button>
							<button type="button" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
