<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html"> <img style="height: 55px;" alt="image" src="<?= base_url() ?>assets/img/image-gallery/PKH.png" class="header-logo"/><span class="logo-name"></span>
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Main</li>
			<li class="dropdown <?php echo ($this->uri->segment(1) == '') ? 'active' : '' ?>">
				<a href="<?php echo base_url() ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
			</li>
			<li class="dropdown <?php echo ($this->uri->segment(1) === 'periode_graduasi' || $this->uri->segment(1) === 'penerima_bantuan' || $this->uri->segment(1) === 'kriteria_bobot' || $this->uri->segment(1) === 'data_user' ) ? 'active' : '' ?>">
				<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Master Data</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo ($this->uri->segment(1) === 'periode_graduasi') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>periode_graduasi">Periode Graduasi</a></li>
					<li class="<?php echo ($this->uri->segment(1) === 'penerima_bantuan') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>penerima_bantuan">Data Penerima Bantuan</a></li>
					<li class="<?php echo ($this->uri->segment(1) === 'kriteria_bobot') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>kriteria_bobot">Data Kriteria dan Bobot</a></li>
					<?php if($this->session->userdata('level') == 'Superadmin') { ?>
					<li class="<?php echo ($this->uri->segment(1) === 'data_user') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>data_user">Data User</a></li>
					<?php } ?>
				</ul>
			</li>
			<li class="dropdown <?php echo ($this->uri->segment(1) == 'peserta_graduasi') ? 'active' : '' ?>">
				<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Proses Seleksi</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo ($this->uri->segment(1) == 'peserta_graduasi') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>peserta_graduasi">Data Peserta Graduasi</a></li>
				</ul>
			</li>
			<li class="<?php echo ($this->uri->segment(1) == 'laporan_seleksi') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>laporan_seleksi"><i data-feather="mail"></i><span>Laporan Hasil Seleksi</span></a></li>
		</ul>
	</aside>
</div>
