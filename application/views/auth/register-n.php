
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nalavariyam | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition register-page">

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
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="register-box">
  <div class="register-logo">
    <a href="nalavariyam.com"><b>Nalavariyam</b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new memberships</p>
         
	           <?php
			   
				 $message = $this->session->flashdata('errors');
				
				if (isset($message)) {
					echo '<div class="alert alert-info">' . $message . '</div>';
					 $this->session->unset_userdata('message');
				}   

             ?>
			 
           <?php echo form_open(base_url("register/register"), 'class="form-horizontal"');  ?> 
		       
		      
	     <div class="form-group">
            <select class="form-control select2bs4" name="dist_name" style="">
               <?php 
			   $data = $this->model_auth->getdistrict();
	
               foreach($data as $row)
   
              {  
			
              echo '<option value="'.$row['id'].'">'.$row['district_name'].'</option>';
              }?>
            </select>

        </div>
        <div class="input-group mb-3">
          <input type="text" name="fname" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" name="another" value="" placeholder="Aadhar Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" name="mobile" value="" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
                       <input type="submit" name="register" value="Add User" class="btn btn-info pull-right">          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close( ); ?>


      <a href="../app" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- AdminLTE App -->

</body>
</html>
