<?php echo $this->session->flashdata('berhasil_periode') ?>
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h4>Periode Graduasi</h4>
							<?php if ($this->session->userdata('status') == 'Aktif') { ?>
							<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahDataPeriode"><i class="fas fa-plus"></i> Tambah Data</a></div>
							<?php } ?>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-1">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Periode</th>
											<th>Tanggal Dimulai</th>
											<th>Tanggal Berakhir</th>
											<?php if ($this->session->userdata('status') == 'Aktif') { ?>
											<th>Aksi</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $i = 1;
foreach ($periode as $prd) { ?>
											<tr id="<?= $prd['id_periode'] ?>">
												<td><?= $i++ ?></td>
												<td><?= $prd['nama_periode'] ?></td>
												<td><?= $prd['tgl_dimulai'] ?></td>
												<td><?= $prd['tgl_berakhir'] ?></td>
												<?php if ($this->session->userdata('status') == 'Aktif') { ?>
												<td>
													<a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="modal" data-target="#editDataPeriode<?php echo $prd['id_periode'] ?>"><i class="fas fa-pen"></i></a>
													<!-- <a href="#" class="btn btn-icon btn-sm btn-danger remove"><i class="fas fa-trash"></i></a> -->
													<button class="btn btn-icon btn-sm btn-danger remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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

	<!-- Modal with form -->
	<div class="modal fade" id="tambahDataPeriode" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModal">Tambah Data Periode Graduasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="" action="<?= base_url() ?>periode_graduasi/tambah_periode" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Periode</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nama_periode" required>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal Dimulai</label>
							<div class="input-group">
								<input type="date" class="form-control" placeholder="" name="tgl_dimulai" required>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal Berakhir</label>
							<div class="input-group">
								<input type="date" class="form-control" placeholder="" name="tgl_berakhir" required>
							</div>
						</div>
						<div class="form-group align-right">							
							<button type="submit" name="submit" class="btn btn-primary waves-effect">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($periode as $prd) { ?>
		<!-- Modal Edit -->
		<div class="modal fade" id="editDataPeriode<?php echo $prd['id_periode'] ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModal">Edit Data Periode Graduasi</h5>
					</div>
					<div class="modal-body">
						<form class="" action="<?= base_url() ?>periode_graduasi/update_periode/<?php echo $prd['id_periode'] ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama Periode</label>
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo $prd['nama_periode'] ?>" name="nama_periode">
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Dimulai</label>
								<div class="input-group">
									<input type="date" class="form-control" value="<?php echo $prd['tgl_dimulai'] ?>" name="tgl_dimulai">
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Berakhir</label>
								<div class="input-group">
									<input type="date" class="form-control" value="<?php echo $prd['tgl_berakhir'] ?>" name="tgl_berakhir">
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
                    url: '<?= base_url() ?>periode_graduasi/delete_periode/' + id,
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
