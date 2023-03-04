<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">புதுப்பித்தல்</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>Name</th>
                  <th>Service</th>
                  <th style="width: 160px">Acehen</th>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  
	  <td><?php $originalDate = $row->paydate;
$paydate = date("d-m-Y", strtotime($originalDate));
	  echo $paydate; ?></td>
	  <td>புதுப்பித்தல்</td>
  <td>
  <?php if ($row->service_status == 'Paid') {?>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
 <div class="modal fade" id="CreateFome">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Select Pament </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                 <form action="<?php echo base_url('reports/paymentupload') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <center><a href="<?php echo $service_data['from_image']; ?>" download>Download <alt="W3Schools"></a></center>
</alt="W3Schools"></br>
                         <div class="form-group row">
                <label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Upload Size 800*1100</label>Upload Size 800*1100
             <div class="col-sm-8">
                 <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo">
             </div>
             </div>
					  <?php $customer_id =$this->uri->segment(3); 
                         $service_id =$this->uri->segment(4); ?>
<input type="hidden" name="ser_id" value="<?php echo $service_id; ?>"/>
<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
<input type="hidden" name="ad_info" value="NULL"/>
<input type="hidden" name="family_user_id" value="NULL"/>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type='submit' class='btn btn-primary'>Paya Submit</button>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </div>
  <?php } if ($row->service_status == 'Img') {?>
  		 <a href="<?php echo $row->from_image; ?>" download class="btn btn-sm btn-primary"><i class="fa fa-download " title="Push to Government Website"> Download</i></a> 

  <?php } ?>

  </td>

<?php } ?>

                </tbody>
					  <td>#</td>
					  <td><?php $originalDate = $date = date('Y-m-d');
$newDate2 = date("d-m-Y", strtotime($originalDate)); ?>
<?php echo $newDate2; ?></td>
					  <td>புதுப்பித்தல்</td>
<td>
<?php $customer_id =$this->uri->segment(3); 
 $service_id =$this->uri->segment(4); ?>
<?php $log_id = $this->session->userdata('id');

$sql="Select * from payments where log_id = $log_id  and service_id = '$service_id' order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){ 
 if($data->service_status == 'Img'){ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay">
Pay Now
</button>
<?php } else{ ?>

<?php } ?>

<?php } else{ ?>

 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay">
Pay Now
</button>
<?php } ?>
</td>

<div class="modal fade" id="pay">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Select Payment </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
<?php if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
   if($this->session->userdata('dist_id') == $user_data['dist_id'] ) {
echo(round($pay));
                              $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $service_data['service_payment'];
                              } ?> 

<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {

                              $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $service_data['service_payment'];
                              } ?> 
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){

  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {

                              $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                    echo $pay = $service_data['service_payment'];
                              } ?> 
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){

 if($this->session->userdata('panchayath_id') == $user_data['panchayath_id'] ) {

                              $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $service_data['service_payment'];
                              } ?> 
  <?php } ?>



                                       <?php $wallet = $In_Payment - $Out_Payment; ?>
                                       <?php  if(($pay - $wallet) > 0){ 
$referral_id = $this->session->userdata('referral_id'); 
                                      
                                      $sql="Select * from `users` where `id` = $referral_id order by `id` desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$full_name  = $datagp->full_name;
$phone = $datagp->phone;
$upi = $datagp->upi;
$payment_qr_oode = $datagp->payment_qr_oode; ?>
<center>
<?php echo $full_name; ?></br>
<?php echo $phone; ?></br>
<?php echo $upi; ?></br>
<?php echo $upi; ?></br>
<img style="width:200px" src="<?php echo $payment_qr_oode; ?>"/></center>

                                          <?php } else{ ?>

                                       <form action="<?php echo base_url('users/mlm/'.$service_id) ?>/<?php echo $customer_id ?>" method="post"  class="form-horizontal">
                                           <input type="hidden" value="" name="family_id" id="family_id">
                                          <input type="hidden" value="NULL" name="ad_info" id="ad_info">
                                          <input type="hidden" value="<?php echo $user_data['dist_id']; ?>" name="dist_id">
                                          <input type="hidden" value="<?php echo $user_data['taluk_id']; ?>" name="taluk_id">
                                          <input type="hidden" value="<?php echo $user_data['panchayath_id']; ?>" name="panchayath_id">
										  
                                          <div class="form-group row">
                                             <label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
                                             <input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
                                          </div>
                                          <div class="form-group row">
                                             <label for="service_payment" class="col-sm-12 col-form-label"><span style="color:red"></span>Service Payment</label>

                                 <input value="<?php echo(round($pay)); ?>" type="text" class="form-control"  readonly>
                                          </div>

                                        <?php } ?>
 

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <?php if(($pay - $wallet) > 0){ 
                                       echo "<button type='submit' class='btn btn-default' data-dismiss='modal'> Close</button>";
                                       } else {
                                       echo "<button type='submit' class='btn btn-primary'>Next</button>";
                                       } ?>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                           </div>


              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		   