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
								<?php $jumlahcl = 0;
								foreach ($calon as $cl) {
								    $jumlahcl ++;
								} ?>
								<h6><?= $jumlahcl ?></h6>
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
										<?php $no = 1;
								foreach ($penerima as $prm) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $prm['nama'] ?></td>
											<td><?= $prm['nik'] ?></td>
											<td><?= $prm['nama_periode'] ?></td>
											<td>
												<?php if ($prm['total'] == 0) { ?>
													<span class="badge badge-danger">Belum Dinilai</span>
												<?php } else { ?>
													<span class="badge badge-success">Sudah Dinilai</span>
												<?php } ?>
											</td>
											<td>
												<a href="#" title="Edit" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editPesertaGraduasi<?php echo $prm['id_detail_periode'] ?>"><i class="fas fa-pen"></i></a>
												<a href="#" title="Delete" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
							<select class="form-control select2" style="width: 100%;" name="id_penerima_bantuan">
									<option value=""></option>
									<?php foreach ($penerimaB as $prm) {
									    $cek=0;
									    foreach ($dataterisi as $ds) {
									        if ($ds['id_penerima_bantuan'] == $prm['id_penerima_bantuan']) {
									            $cek++;
									        }
									    }
									    if ($cek == '0') {
									        if ($prm['status_bantuan'] == 'aktif') { ?>
									<option value="<?php echo $prm['id_penerima_bantuan']; ?>"><?php echo $prm['nik']; ?>-<?php echo $prm['nama']; ?> </option>
									<?php }
									        }
									} ?>
							</select>
						</div>
						<div class="form-group">
							<label>Periode</label>
							<div class="input-group">
								<?php foreach ($period as $prd) { ?>
                                    <input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode'] ?>" > 
                                    <input type="hidden" name="id_periode" value="<?php echo $prd['id_periode'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="form-row">
							<?php foreach ($kriteria as $ktr) { ?>
								<div class="form-group col-md-6">
									<label><?php echo $ktr['jenis_kriteria']?></label>									
									<input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
									<select class="form-control select2" style="width: 100%;" name="id_rentang<?php  echo $ktr['id_kriteria'] ?>">
										<option value=""></option>
										<?php foreach($rentang_nilai as $rn){ ?>
											<?php if ($rn['id_kriteria'] == $ktr['id_kriteria']){ ?>
												<option value="<?php echo $rn['id_rentang']; ?>"><?php echo $rn['jenis_rentang']; ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							<?php } ?>
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
	<?php foreach($penerima as $prm) { ?>
	<div class="modal fade bd-example-modal-lg" id="editPesertaGraduasi<?php echo $prm['id_detail_periode'] ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
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
                                <input class="form-control" type="text" disabled name="" value="<?php echo $prm['nik']; ?>-<?php echo $prm['nama']?>" > 
							</div>
						</div>
						<div class="form-group">
							<label>Periode</label>
							<div class="input-group">
                                <input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode']; ?>" > 
							</div>
						</div>
						<div class="form-row">
							
						<?php $i = 0; ?>
						<?php  foreach ($kriteria as $ktr){  ?>
							<?php foreach ($kuisioner as $kuis) {
							    if ($kuis['id_detail_periode'] == $prm['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria']) { ?>
								<input type="hidden" name="id_kuisioner<?php echo $ktr['id_kriteria']?>" value="<?php echo $kuis['id_kuisioner']?>">
							<?php } ?>
						<?php } ?>
							<div class="form-group col-md-6">
								<label><?php echo $ktr['jenis_kriteria']?></label>
                                <input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
								<select class="form-control select2" style="width: 100%;" name="id_rentang<?php  echo $ktr['id_kriteria'] ?>">
								<?php foreach ($ktr['rentang'] as $key) { ?>
								<?php $cek = 0; 
								foreach($kuisioner as $kuis){ 
									if($kuis['id_detail_periode'] == $prm['id_detail_periode'] && $key['id_rentang'] == $kuis['id_rentang']){
										$cek++;
										$id_kuisioner = $kuis['id_kuisioner'];
									} 
								} ?>
								<?php if($cek > 0 ) { ?>
									<option value="<?php echo $key['id_rentang']; ?>"  selected><?php echo $key['jenis_rentang']; ?></option>
								<?php } else { ?>
									<option value="<?php echo $key['id_rentang']; ?>" ><?php echo $key['jenis_rentang']; ?></option>
								<?php } ?>     

							<?php }?>
								</select>
							</div>
						<?php } ?>
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
	<?php } ?>
</div>
