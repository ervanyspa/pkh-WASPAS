<?php echo $this->session->flashdata('flashdata_login') ?>
<section class="section">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-lg-5">
                <div class="card card-info" style="overflow: hidden;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header d-block">
                                <h1 class="mx-auto col-black  d-flex justify-content-center">GRADUASI</h1>
                                <h5 class="mx-auto col-black  d-flex justify-content-center">DESA UTERAN</h5>
								<img src="<?= base_url() ?>assets/img/image-gallery/PKH.png" width="250" class="mx-auto col-black  d-flex justify-content-center align-top mr-2">
                            </div>
                            <div class="card-body">
								<h5 class="mx-auto col-black d-flex justify-content-center">LOGIN</h5>
                                <form action="<?php base_url() ?>login/login_user" method="post" enctype="multipart/form-data">
									<div class="form-group">										
									<?php echo $this->session->flashdata('pesan') ?>
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus>
                         				<span class="d-flex ml-2 text-danger"><?php echo $this->session->flashdata('err_username') ?></span>
                                    </div>
                                    <div class="form-group">
										<div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
										<div class="input-group">
                                        	<input id="password" type="password" class="form-control" name="password" tabindex="2" >
										<div class="input-group-append">
											<div class="input-group-text"><i class="fas fa-eye " id="eyeIcon"></i></div>
										</div>				
										</div>										
										<span class="d-flex ml-2 text-danger"><?php echo $this->session->flashdata('err_password') ?></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                            <h6 class="m-0">
                                                Login
                                            </h6>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
	let passwordInput = document.getElementById('password'),
		icon = document.getElementById('eyeIcon');

	function togglePassword() {
		if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
			icon.classList.add("fa-eye-slash");
			//toggle.innerHTML = 'hide';
		} else {
			passwordInput.type = 'password';
			icon.classList.remove("fa-eye-slash");
			//toggle.innerHTML = 'show';
		}
	}

	function checkInput() {}

	icon.addEventListener('click', togglePassword, false);
	passwordInput.addEventListener('keyup', checkInput, false);
</script>
