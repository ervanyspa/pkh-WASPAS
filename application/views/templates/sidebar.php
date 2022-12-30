<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">PKH</span>
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Main</li>
			<li class="dropdown <?php echo ($this->uri->segment(1) == '') ? 'active' : '' ?>">
				<a href="<?php echo base_url() ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
			</li>
			<li class="dropdown <?php echo ($this->uri->segment(1) === 'periode_graduasi' || $this->uri->segment(1) === 'penerima_bantuan' || $this->uri->segment(1) === 'kriteria_bobot'  ) ? 'active' : '' ?>">
				<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Master Data</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo ($this->uri->segment(1) === 'periode_graduasi') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>periode_graduasi">Periode Graduasi</a></li>
					<li class="<?php echo ($this->uri->segment(1) === 'penerima_bantuan') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>penerima_bantuan">Data Penerima Bantuan</a></li>
					<li class="<?php echo ($this->uri->segment(1) === 'kriteria_bobot') ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url() ?>kriteria_bobot">Data Kriteria dan Bobot</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Proses Seleksi</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="chat.html">Data Peserta Graduasi</a></li>
				</ul>
			</li>
			<li><a class="nav-link" href="blank.html"><i data-feather="mail"></i><span>Laporan Hasil Seleksi</span></a></li>
		</ul>
	</aside>
</div>
<div class="settingSidebar">
	<a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
	</a>
	<div class="settingSidebar-body ps-container ps-theme-default">
		<div class=" fade show active">
			<div class="setting-panel-header">Setting Panel
			</div>
			<div class="p-15 border-bottom">
				<h6 class="font-medium m-b-10">Select Layout</h6>
				<div class="selectgroup layout-color w-50">
					<label class="selectgroup-item">
						<input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
						<span class="selectgroup-button">Light</span>
					</label>
					<label class="selectgroup-item">
						<input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
						<span class="selectgroup-button">Dark</span>
					</label>
				</div>
			</div>
			<div class="p-15 border-bottom">
				<h6 class="font-medium m-b-10">Sidebar Color</h6>
				<div class="selectgroup selectgroup-pills sidebar-color">
					<label class="selectgroup-item">
						<input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
						<span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
					</label>
					<label class="selectgroup-item">
						<input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
						<span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
					</label>
				</div>
			</div>
			<div class="p-15 border-bottom">
				<h6 class="font-medium m-b-10">Color Theme</h6>
				<div class="theme-setting-options">
					<ul class="choose-theme list-unstyled mb-0">
						<li title="white" class="active">
							<div class="white"></div>
						</li>
						<li title="cyan">
							<div class="cyan"></div>
						</li>
						<li title="black">
							<div class="black"></div>
						</li>
						<li title="purple">
							<div class="purple"></div>
						</li>
						<li title="orange">
							<div class="orange"></div>
						</li>
						<li title="green">
							<div class="green"></div>
						</li>
						<li title="red">
							<div class="red"></div>
						</li>
					</ul>
				</div>
			</div>
			<div class="p-15 border-bottom">
				<div class="theme-setting-options">
					<label class="m-b-0">
						<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
						<span class="custom-switch-indicator"></span>
						<span class="control-label p-l-10">Mini Sidebar</span>
					</label>
				</div>
			</div>
			<div class="p-15 border-bottom">
				<div class="theme-setting-options">
					<label class="m-b-0">
						<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
						<span class="custom-switch-indicator"></span>
						<span class="control-label p-l-10">Sticky Header</span>
					</label>
				</div>
			</div>
			<div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
				<a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
					<i class="fas fa-undo"></i> Restore Default
				</a>
			</div>
		</div>
	</div>
</div>
