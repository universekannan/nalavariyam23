<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nalavariyam | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
      <p class="login-box-msg">Register a new User</p>
         
	           			 
          <form method="post" id="product_info" enctype="multipart/form-data" action="<?php echo base_url(); ?>payment/bulkpurchases">                                                                  
                <div class="form-group">                      
                  <input type="number"  name="payble_amount" id="payble_amount" value="2" class="form-control" placeholder="Enter Payble Amount" required readonly/>
                </div>
                <div class="form-group">
                    <input type="text" name="product_info" id="product_info" class="form-control"  Placeholder="Product info name" required />
                </div>
               <div class="form-group">                      
                  <input type="text"  name="customer_name" id="customer_name" class="form-control" placeholder="Full Name (Only alphabets)" required/>
                </div>
                <div class="form-group">                                   
                  <input type="number"  name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number(10 digits)" required/>
                </div>
                <div class="form-group">                                   
                  <input type="email"  name="customer_email" id="customer_email" class="form-control" placeholder="Email" required/>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="customer_address" id="customer_address" placeholder="Address" required></textarea>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>    

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
