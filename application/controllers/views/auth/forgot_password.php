
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nalavariyam | Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<style>
.login-page, .register-page {
    background: url(assets/dist/img/tn.png) no-repeat 0px 0px !important;
	background-size: cover !important;
    min-height: 300px !important;
    position: relative !important;
    background-attachment: fixed !important;
}

.login-card-body, .register-card-body {
    background-color: #deddde;
    border-top: 0;
    color: #0e0c0d;
    padding: 20px;
}
</style>
<div class="login-box">
  <div class="login-logo">
    <a href=""></b>Forgot Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
              <?php
				if($this->session->flashdata('success')){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php
				}
			?>
      <?php $attributes = array('id' => 'login_form', 'method' => 'post');
        echo form_open(base_url('Forgot_password/forget_password'), $attributes);?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
           <input type="submit" name="submit" id="submit" class="form-control" value="Submit">
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close(); ?>
      <p class="mt-3 mb-1">
        <a href="<?php echo base_url('/'); ?>">Login</a>
      </p>

 <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
