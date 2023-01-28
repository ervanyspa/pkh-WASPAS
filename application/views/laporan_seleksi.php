<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<h5 class="ml-4 mt-3">Hasil Seleksi</h5>
						<div class="card-header d-flex">
							<div class="mr-auto">
								<form action="<?= base_url() ?>laporan_seleksi/filter_hasil" method="post" enctype="multipart/form-data">
									<div class="form-row mb-0">
										<div class="form-group mb-0">
											<input type="number" class="form-control" min="1" max="100" value="<?php echo $this->session->userdata('hasil')?>" placeholder="Inputkan nilai filter hasil (%)"   name="hasil" required>
										</div>
										<div class="ml-2">
											<button type="submit" class="btn btn-success waves-effect">Simpan</button>
										</div>
									</div>
								</form>
							</div>
							<div class="p-1"><a href="<?php echo base_url('laporan_seleksi/PrintHasil/'.$id_periode)?>" target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak Hasil Rekomendasi</a></div>
							<div class="p-1"><a href="<?php echo base_url() ?>laporan_seleksi/detail_perhitungan" class="btn btn-icon icon-left btn-warning"></i> Detail Perhitungan</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-3">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($penerima as $prm) { ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <td><?= $prm['nama'] ?></td>
                                            <td><?php echo $prm['total'] ?></td>
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
</div>
