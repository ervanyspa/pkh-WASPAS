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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bundles/jquery-selectric/selectric.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url() ?>assets/img/favicon.ico' />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
							<form>
								<div class="form-row">
									<div class="col-lg-7 col-md-4 col-sm-2 col-xs-2">
										<div class="form-group">
											<select class="form-control selectric">
												<option>Pilih Periode</option>
												<option>Option 2</option>
												<option>Option 3</option>
											</select>
										</div>
									</div>
									<div class="col-lg-5 col-md-4 col-sm-2 col-xs-2">
										<button class="btn btn-sm bg-info text-white" style="border-radius: 10px; " type="submit">Tampilkan</button>
									</div>
								</div>
							</form>
						</li>

					</ul>
				</div>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url() ?>assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
						<div class="dropdown-menu dropdown-menu-right pullDown">
							<div class="dropdown-title">Hello Sarah Smith</div>
							<a href="<?php base_url() ?> Profil" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
