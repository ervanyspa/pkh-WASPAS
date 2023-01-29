<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-lg-12 col-md-8">
					<div class="card">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Detail Perhitungan</h4>
							<div class="p-2"><a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak Hasil Perhitungan</a></div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<div class="section-title mt-0">Matrik Keputusan/Nilai Awal</div>
								<table class="table table-striped dataTable" id="table-3">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>C1</th>
											<th>C2</th>
											<th>C3</th>
											<th>C4</th>
											<th>C5</th>
											<th>C6</th>
											<th>C7</th>
											<th>C8</th>
											<th>C9</th>
											<th>C10</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach($penerima as $prm) { ?>
										<tr>											
											<th><?= $no++ ?></th>
											<td><?= $prm['nama'] ?></td>
											<?php 
											$cek = 0;
											foreach($kriteria as $ktr) {
                                                $nilai = "";
                                                foreach($kuisioner as $kuis) {

                                                    if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                        $cek++;
                                                        $nilai = $kuis['nilai'];
                                                    }
                                                } if($cek > 0) { ?>

                                                    <td class="col-md-1 text-center"><?= $nilai ?></td>

                                                <?php } ?>



                                            <?php } ?>

										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-8">
					<div class="card">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Matrik Keputusan/Nilai Awal</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table mb-0 table-bordered table-hover">
                                    <thead>
                                        <tr class="table-active">
                                            <?php
                                            $no = 0;
                                            foreach ($kriteria as $ktr){?>

                                                <th class="col-md-1 text-center"><strong ><?php echo $ktr['nama_kode'] ?></strong></th>

                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($kriteria as $ktr){?>
                                            <?php if($ktr['atribut'] == 'Benefit') { ?>
                                                <th class="col-md-1 text-center"><?php  echo $ktr['max']->nilai ?></th>
                                            <?php } else { ?>
                                                <th class="col-md-1 text-center"><?php  echo $ktr['min']->nilai ?></th>
                                            <?php } ?>

                                        <?php } ?>

                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-8">
					<div class="card">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Matrik Ternormalisasi</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-4">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>C1</th>
											<th>C2</th>
											<th>C3</th>
											<th>C4</th>
											<th>C5</th>
											<th>C6</th>
											<th>C7</th>
											<th>C8</th>
											<th>C9</th>
											<th>C10</th>
										</tr>
									</thead>
									<tbody>
									<?php 
                                        $no = 1;
                                        foreach($penerima as $prm) { ?>
                                            <tr>
                                                <th class="col-md-1 text-center"><?= $no++; ?></th>
                                                <td><?= $prm['nama'] ?></td>

                                                <?php 

                                                foreach($kriteria as $ktr) {
                                                    $cek = 0;
                                                    foreach($kuisioner as $kuis) {
                                                        if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                            $cek++;
                                                            $nilai = $kuis['nilai'];

                                                            if($ktr['atribut'] == 'Benefit'){
                                                                $max = $ktr['max']->nilai;
                                                                $normalisasi = $nilai/$max;
                                                            } else {
                                                                $min = $ktr['min']->nilai;
                                                                $normalisasi = $min/$nilai;
                                                            }


                                                        }
                                                    } if ($cek > 0) { ?>
                                                        <td class="col-md-1 text-center"><?= number_format($normalisasi, 3) ?></td>
                                                    <?php } ?>
                                                <?php } ?>


                                            </tr>

                                        <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-8">
					<div class="card">
						<div class="card-header d-flex">
							<h4 class="mr-auto">Nilai Hasil Perhitungan Metode WASPAS</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped dataTable" id="table-5">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Nilai</th>
										</tr>
									</thead>
									<tbody>
									<?php 
                                        $no = 1;
										function cariMultiplikasi($array) {
											$output = 1;
    
											foreach ($array as $x) {
												$output *= $x; 
											}
											
											return $output;
										}

                                        foreach($penerima as $prm) { ?>
                                            <tr>
                                                <th class="col-md-1 text-center"><?= $no++; ?></th>
                                                <td ><?= $prm['nama'] ?></td>

                                                <?php

												$perkalian = array(); 
												$pangkat = array();

                                                foreach($kriteria as $ktr) {

                                                    $cek = 0;
                                                    foreach($kuisioner as $kuis) {
                                                        if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                            $cek++;
                                                            $nilai = $kuis['nilai'];

                                                            if($ktr['atribut'] == 'Benefit'){
                                                                $max = $ktr['max']->nilai;
                                                                $normalisasi = $nilai/$max;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
																$preferensi2 = pow($normalisasi, $ktr['bobot'])  ;
																array_push($perkalian, $preferensi);
																array_push($pangkat, $preferensi2);
                                                                // $total+= $preferensi;
                                                            } else {
                                                                $min = $ktr['min']->nilai;
                                                                $normalisasi = $min/$nilai;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
																$preferensi2 = pow($normalisasi, $ktr['bobot'])  ;
																array_push($perkalian, $preferensi);
																array_push($pangkat, $preferensi2);
                                                                // $total+= $preferensi;
                                                            }

                                                        }
                                                    } 

                                                } 
												$total = 0.5 * array_sum($perkalian) + 0.5 * cariMultiplikasi($pangkat);
												?>


                                                <td class="col-md-1 text-center"><?php echo number_format($total, 3) ?></td>
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
