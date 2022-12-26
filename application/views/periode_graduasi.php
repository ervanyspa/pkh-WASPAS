<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h4>Periode Graduasi</h4>
										<div class="d-flex "><a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#tambahDataPeriode"><i class="fas fa-plus"></i> Tambah Data</a></div>
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
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Create a mobile app</td>
														<td>2018-01-20</td>
                            <td>2018-01-20</td>
                            <td>
															<a href="#" class="btn btn-icon btn-sm btn-info"  data-toggle="modal" data-target="#editDataPeriode"><i class="fas fa-pen"></i></a>
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
        <div class="modal fade" id="tambahDataPeriode" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tambah Data Periode Graduasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Nama Periode</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="" name="nama_periode">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Dimulai</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="" name="tgl_mulai">
                    </div>
                  </div>
									<div class="form-group">
                    <label>Tanggal Berakhir</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="" name="tgl_akhir">
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
				<!-- Modal Edit -->
				<div class="modal fade" id="editDataPeriode" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Edit Data Periode Graduasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Nama Periode</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="" name="nama_periode">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Dimulai</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="" name="tgl_mulai">
                    </div>
                  </div>
									<div class="form-group">
                    <label>Tanggal Berakhir</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="" name="tgl_akhir">
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
      </div>
