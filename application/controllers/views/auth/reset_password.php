<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nalavariyam Password Reset</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">

<style>
.login-page, .register-page {
    background: url(../assets/dist/img/tn.png) no-repeat 0px 0px !important;
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
<div class="register-logo">
    <a href="nalavariyam.com"><b>Reset Password</a>
  </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(validation_errors() !== ''): ?>
              
                 
                  <?= validation_errors();?>
              
            <?php endif; ?>
              <?php
				if($this->session->flashdata('msg')){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<?php
				}
			?>
          <?php echo form_open(base_url('resetpassword/reset_password/'.$reset_code), 'class="login-form" '); ?>
              <div class="form-group">
                <label for="password" class="col-sm-6 control-label">New Password</label>

              <div class="input-group mb-2">
               <input type="password" name="password" id="password" class="form-control" placeholder="Password" >

                </div>
              </div>

              <div class="form-group">
 <label for="password" class="col-sm-6 control-label">Confirm New Password</label>
               <div class="input-group mb-2">
                   <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm" >
                </div>
              </div>

              <div class="form-group">
			   
               <div class="input-group mb-3">
                  <input type="submit" name="submit" value="Change Password" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php site_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>

 <script>
    $("#admin").addClass('active');
  </script>