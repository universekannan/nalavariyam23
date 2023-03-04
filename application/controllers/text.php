<link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <section class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
              <img src="../../assets/dist/img/logo.jpg" width="900">
			  
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div>
                            <strong>From</strong>
                        </div>
<div>New No. 2, Thillai Nagar</div>
<div>Manavalampettai, Nannilam</div>
<div>Thiruvarur Dt - 610105</div>
<div>Tamilnadu, India,</div>

                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        </br>
                        </br>
                        <div>Phone:9445511401</div>
                        <div>Email: whiteangelpublishers@gmail.com</div>
                        <div>www.whiteangelpublishers.com</div>
                    </div>
                </div>
				<hr>
				<div class="row mb-4">
                    <div class="col-sm-9">
                        <div>
                            <strong>Bill To : </strong><?php echo $user_data['full_name'] ?>, <?php echo $user_data['adres'] ?>.
                        </div>
                    </div>        		

                    <div class="col-sm-3">
                        <div>
						<?php $sql="Select * from payments ORDER BY id DESC LIMIT 1";    
						$query = $this->db->query($sql);
						$data =  $query->row();
						$invoiceid = $data->id;
						?>
                            <strong>Invoice No : </strong> 00<?php echo $invoiceid; ?></br>
                            <strong>Invoice Date : </strong> <?php echo $date = date('Y-m-d'); ?>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                 <th class="center">#</th>
                                <th>Service Name</th>
                                <th>Amond</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
						 <?php if($service_data): ?>                  
                         <?php foreach ($service_data as $k => $v): ?>
						<tr>
						
							<td class="center"><?php echo $v['id']; ?></td>
							<td class="left strong"><?php echo $v['service_name']; ?></td>
							<td class="right"><?php echo $v['service_payment']; ?></td>

							<td class="center">1</td>

							<td class="right"><?php echo $v['service_payment']; ?></td>
						</tr>
						<?php endforeach ?>
                  <?php endif; ?>
                           
							 <tr>
                                <td class="left"></td>
                                <td class="left"></td>
                                <td class="left"></td>
                                <td class="left">Total</td>
                                <td class="right"> $500000,00</td>
                            </tr>
							
                        </tbody>
                    </table>
					 <div class="callout callout-danger">
                  <h5>Amount in words : </h5>

                  <p>The vehicle immobilization system (P-CS System) is meant to enforce sales declaration</p>
				  
                </div>
<strong>Bank Details</strong></br>
Bank Name : INDIAN BANK,</br>
Account Name : WHITE ANGEL PRINTERS AND PUBLISHERS,</br>
Account Type : Current Account,</br>
Account Number : 6639603079,</br>
IFSC Code : IDIB000K016,</br>
Bank Branch: Karaikal.

</br>
</br>
</br>
We declare that this invoice shows the actual prize of the goods described and that all particulars are true and correct. 
</br>
</br>
                </div>
                <div class="row">
				  <div class="col-lg-6 col-sm-5">
					 <table class="table table-clear">
                            <tbody>
							   <tr>
                                    <td class="left">
									</br>
									</br>
									</br>
									</br>
									</br>
									</br>
									</br>
                                        <strong>Receiver's Signature</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
							   <tr>
							        
                                    <td class="left">
									</br>
									<img src="../../assets/dist/img/Signatory.png" width="150" class="left"></br>

                                        <strong>Authorised Signatory</strong>
                                    </td>
                                    
                                </tr>
                               
                            </tbody>
                        </table>
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