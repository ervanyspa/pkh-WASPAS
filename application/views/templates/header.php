<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>PKH WASPAS</title>
	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bundles/datatables/datatables.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bundles/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bundles/jquery-selectric/selectric.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
	<link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/image-gallery/PKH.png' />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php $periode = $this->Model_periode->get_periode()->result_array();
	$where = array(
	    'id_petugas' => $this->session->userdata('id_petugas')
	);
	// $profil = $this->ModelPetugas->tampil_petugas($where)->row_array(); ?>
<body>
	<div class="loader"></div>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar sticky">
				<div class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li>
							<a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a>
						</li>
						<li>
						<?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'peserta_graduasi' || $this->uri->segment(1) == 'laporan_seleksi' ) { ?>
							<form action="<?= base_url() ?><?php echo ($this->uri->segment(1) == 'laporan_seleksi') ? 'laporan_seleksi' : '' ?><?php echo ($this->uri->segment(1) == 'peserta_graduasi') ? 'peserta_graduasi' : '' ?><?php echo ($this->uri->segment(1) == '') ? 'dashboard' : '' ?>/filterperiode" method="post" enctype="multipart/form-data">
								<div class="form-row">
									<div class="col-lg-7 col-md-4 col-sm-2 col-xs-2">
										<div class="form-group">
											<select class="form-control select2" name="id_periode">
											<?php foreach ($periode as $prd) { ?>
                                                    <?php if ($this->session->userdata('id_periode') == $prd['id_periode']) { ?>
                                                        <option value="<?= $prd['id_periode'] ?>"selected><?= $prd['nama_periode'] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $prd['id_periode'] ?>"><?= $prd['nama_periode'] ?></option>
                                                    <?php } ?>
                                                <?php }?> 
											</select>
										</div>
									</div>
									<div class="col-lg-5 col-md-4 col-sm-2 col-xs-2">
										<button class="btn btn-sm bg-info text-white" style="border-radius: 10px; " type="submit">Tampilkan</button>
									</div>
								</div>
							</form>
							<?php } ?>
						</li>
					</ul>
				</div>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img height="30px" width="30px" alt="image" src="<?= base_url('assets/img/uploads/') . $this->session->userdata('foto') ?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
						<div class="dropdown-menu dropdown-menu-right pullDown"> <?php $nama = explode(' ', $this->session->userdata('nama')); ?>
							<div class="dropdown-title">Hello <?= $nama[0] ?></div>
							<a href="<?= base_url() ?>profil" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url() ?>auth/login/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>

			<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
            <script type="text/javascript">
              $(document).ready(function() {
                $('.select2').select2();
            });</script>
