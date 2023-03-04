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


                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>


<td>
  <a href="<?php echo $row->profile_image_copy; ?>" download class="btn btn-sm btn-primary"><i class="fa fa-download " title="Push to Government Website"> Download</i></a> 
</td>
			                    <?php endif; ?>

                      </tr>
                   <?php } ?>
                </tbody>
					  <td>#</td>
					  <td><?php $originalDate = $date = date('Y-m-d');
$newDate2 = date("d-m-Y", strtotime($originalDate)); ?>
<?php echo $newDate2; ?></td>
					  <td>புதுப்பித்தல்</td>
<?php $customer_id =$this->uri->segment(3); 
 $service_id =$this->uri->segment(4); ?>
<?php $log_id = $this->session->userdata('id');

$sql="Select * from payments where log_id = $log_id  and service_id = '$service_id' order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){ 
 if($data->service_status == 'Paid'){ 
$sql="Select * from payments where service_id = '$service_id' order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){ 
 if($data->service_id == $service_data['id']){ ?>
<td>	  
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
 </td>
<?php } else{ ?>
<td>	  
<?php $amound = $user_datas['customer_amound'] * $service_data['service_payment'] / 4;
 if($amound == 0){ ?>

                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
<?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php }  ?>

</td>
<?php }  ?>
<?php } else{ ?>
<td>	  
	   
<?php $amound = $user_datas['customer_amound'] * $service_data['service_payment'] / 4;
 if($amound == 0){ ?>
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
<?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php }  ?>
</td>
<?php } ?>

<?php } if($data->service_status == 'Img'){ 

$sql="Select * from payments where service_id = '$service_id' order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){ 
 if($data->service_id == $service_data['id']){ ?>
<td>	  
<?php
$customer_id =$this->uri->segment(3); 

$sql1="Select * from payments where service_id = $service_id and customer_id ='264' order by id desc limit 1 ";     
		$query1 = $this->db->query($sql1);
		$datax = $query1->row();
    if(!empty($datax)){ ?>
   <a href="<?php echo $datax->profile_image_copy; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"></i></a>
<?php } else{ ?>

<?php } ?>
<?php
$sql="Select * from payments where customer_id = $customer_id and service_id = $service_id order by id desc limit 1 ";    
         $query = $this->db->query($sql);
         $data =  $query->row();
        if(!empty($data)){ 
		 $profile_image_copy = $data->profile_image_copy; 
?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button><?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php } ?>

   <!-- <a href="<?php echo base_url('api/users/') ?><?php echo $customer_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload" title="Push to Government Website"> Push</i></a> -->
</td>
<?php } else{ ?>
<td>	  
	  
<?php $amound = $user_datas['customer_amound'] * $service_data['service_payment'] / 4;
 if($amound == 0){ ?>
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
<?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php }  ?>
</td>
<?php }  ?>
<?php } else{ ?>
<td>	  
	   
<?php $amound = $user_datas['customer_amound'] * $service_data['service_payment'] / 4;
 if($amound == 0){ ?>
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
<?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php }  ?>
</td>
<?php } ?>

<?php } } else{ ?>
<td>
<?php $amound = $user_datas['customer_amound'] * $service_data['service_payment'] / 4;
 if($amound == 0){ ?>
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome"><i class="fa fa-image"> Create Fome</i></button>
<?php } else{ ?>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_id; ?>">
Pay Now
</button>
<?php }  ?>
</td>
<?php } ?>

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
                         <label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Insurance</label>
                      <div class="col-sm-8">
                          <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo" onchange="loadFile(event)">
                      </div>
                      </div>
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
<div class="modal fade" id="pay<?php echo $service_id; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Select Pament</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $wallet = $In_Payment - $Out_Payment;
 if(($service_data['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ ?>
<form action="<?php echo base_url('Payments/index/'.$customer_id) ?>" method="post"  class="form-horizontal">
<?php } else {?>
<form action="<?php echo base_url('users/mlm/'.$service_id) ?>/<?php echo $customer_id ?>" method="post"  class="form-horizontal">
<?php } ?>
 				<div class="form-group row">
					<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
					<input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet">
				</div>
                <div class="form-group row">
                    <label for="service_payment" class="col-sm-12 col-form-label"><span style="color:red"></span>Service Payment</label>
                    <?php if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
   if($this->session->userdata('dist_id') == $user_data['dist_id'] ) {
                                   $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                                    (round($pay));
                              } else {
                                     $pay = "120";
                              } ?>
                <input type="hidden" value="<?php echo $user_data['dist_id']; ?>" name="dist_id" id="dist_id">
<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                                    (round($pay));
                              } else {
                                     $pay = "120";
                              } ?> 
                <input type="hidden" value="<?php echo $user_data['taluk_id']; ?>" name="dist_id" id="dist_id">
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){

  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                                    (round($pay));
                              } else {
                                     $pay = "120";
                              } ?> 
                     <input type="hidden" value="Renewal" name="ad_info" id="ad_info">
                     <input type="hidden" value="<?php echo $user_data['dist_id']; ?>" name="dist_id">
                     <input type="hidden" value="<?php echo $user_data['taluk_id']; ?>" name="taluk_id">
                     <input type="hidden" value="<?php echo $user_data['panchayath_id']; ?>" name="panchayath_id">
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){

 if($this->session->userdata('panchayath_id') == $user_data['panchayath_id'] ) {
                                   $pay = $service_data['service_payment'] / $user_datas['customer_amound'];
                                    (round($pay));
                              } else {
                                     $pay = "120";
                              } ?> 
                     <input type="hidden" value="Renewal" name="ad_info" id="ad_info">
                     <input type="hidden" value="<?php echo $user_data['dist_id']; ?>" name="dist_id">
                     <input type="hidden" value="<?php echo $user_data['taluk_id']; ?>" name="taluk_id">
                     <input type="hidden" value="<?php echo $user_data['panchayath_id']; ?>" name="panchayath_id">
  <?php } ?>

        <input value="<?php echo(round($pay)); ?>" type="text" class="form-control"  readonly>
                </div>


<?php if(($service_data['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ 

          echo "<div class='form-group row'>
					<label for='new_payment' class='col-sm-12 col-form-label'><span style='color:red'></span>Adsenal Payment</label>
					<input required='requiered' type='text' class='form-control' name='new_payment' placeholder='Enter Balance Payment'>
				</div>";
		} else {
         echo "";
 } ?>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php if(($service_data['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ 
		 echo "<button type='submit' class='btn btn-primary'>Paya Now</button>";
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
		   