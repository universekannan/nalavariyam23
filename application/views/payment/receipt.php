<link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
  <div class="content-wrapper">
    <section class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
             <center> <img src="<?php echo base_url('assets/dist/img/logo.jpg') ?>" width="600"></center>
			  </br>
			  </br>

			  <div class="form-group row">
					<label for="submitting_url" class=" col-form-label"><span style="color:red"></span>Receipt No  :</label>
					<div class="col-sm-2">
						<input value="<?php echo $paydate = date('Y-m-d') ?>" class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
						<label for="submitting_url" class="col-sm-5 col-form-label"><span style="color:red"></span><b><center><h4>Receipt</h4></center></b></label>
						
					<label for="submitting_url" class="col-sm-2col-form-label"><span style="color:red"></span>Date  :</label>
					<div class="col-sm-2">
						<input value="<?php echo $paydate = date('Y-m-d') ?>" type="text" class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
				</div>
				
			  <div class="form-group row">
					<label for="submitting_url" class="col-form-label"><span style="color:red"></span>Received with thanks from  :</label>
					<div class="col-sm-9">
						<input value="<?php echo $paydate = date('Y-m-d') ?>"  class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="submitting_url" class="col-form-label"><span style="color:red"></span>Amount in words  :</label>
					<div class="col-sm-10">
						<input value="<?php echo $paydate = date('Y-m-d') ?>"  class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
				</div>
               <div class="form-group row">
					<label for="submitting_url" class=" col-form-label"><span style="color:red"></span>For the purpose of  :</label>
					<div class="col-sm-6">
						<input value="<?php echo $paydate = date('Y-m-d') ?>"  class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
					<label for="submitting_url" class="col-form-label"><span style="color:red"></span>Contact No :</label>
					<div class="col-sm-2">
						<input value="<?php echo $paydate = date('Y-m-d') ?>"  class="form-control form-control-bproduct_order bproduct_order-width-2"/>
					</div>
				</div>
				 <div class="form-group row">
					<label for="submitting_url" class="col-form-label"><span style="color:red"></span>Amount  :</label>
					<div class="col-sm-2">
<input value="<?php echo $paydate = date('Y-m-d') ?>" class="form-control">
					</div>
				</div>
				

				 <div class="row mb-4">
       <div class="col-sm-4">

				<div>
					
									</br>
									</br>
									</br>
									</br>
                                        <strong>Receiver's Signature</strong>
				</div>
				</div>
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="text-align: right;">
<img src="../../assets/dist/img/Signatory.png" width="100" class="left"></br>

                                        <strong>Authorised Signatory</strong>				</div>
              </div>
			  
			  
                </div>
				
            </div>
			 <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>-->
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
        </div>
    </div>
	
	    </section>
		
    </div>
      <!-- /.container-fluid -->


  <script src="<?php echo base_url('../assets/plugins/select2/js/select2.full.min.js') ?>"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>	

  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerView").addClass('active');
    });
  </script>