<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">கல்வி உதவித்தொகை</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>Service</th>
                  <th>Amount</th>
                  <th style="width: 220px">Acehen</th>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  
	  <td><?php echo $row->service_valu; ?></td>
 <td>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                             ?>  Rs                         
<?php }else if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
	
  if($this->session->userdata('status') == 'Active') {
	  
   if($this->session->userdata('dist_id') == $user_data['dist_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
 ?>  Rs
<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

  if($this->session->userdata('status') == 'Active') {
	  
  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
							  ?>  Rs
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
	
  if($this->session->userdata('status') == 'Active') {
	  
  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
  ?>  Rs
							  
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){


  if($this->session->userdata('status') == 'Active') {
	  
 if($this->session->userdata('panchayath_id') == $user_data['panchayath_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
  ?>  Rs
  <?php } ?>
                           </td>
                           <?php if(in_array('AllServices', $user_permission)): ?>
<td>

<?php 
 $log_id = $this->session->userdata('id');
      $customer_id =$this->uri->segment(3); 
      $family_user_id =$this->uri->segment(5); 
      $service_id = $row->service_id;
      $service_valuid = $row->id;
	  
$sql2="Select * from users where id = $customer_id order by id desc limit 1 ";    
$query = $this->db->query($sql2);
$data2 =  $query->row();
$customer_group_id = $data2->group_id;


                              $sql="Select * from payments where log_id = $log_id  and service_id = '$service_id' and customer_id='$customer_id' order by id desc limit 1 ";
                                  $query = $this->db->query($sql);
                                  $data =  $query->row();
                                  if(!empty($data)){ 

                               if($data->service_status == 'Paid'){ 
                              $sql="Select * from payments where service_id = '$service_id' and customer_id = '$customer_id' order by id desc limit 1 ";
                                  $query = $this->db->query($sql);
                                  $data =  $query->row();
                                  if(!empty($data)){ 
                               if($data->service_id == $service_id){ 

$sql="Select * from payments where service_id = '$service_id' and customer_id = '$customer_id' order by id desc limit 1 ";
                                  $query = $this->db->query($sql);
                                  $data =  $query->row();
                                  if(!empty($data)){ 
                               if($data->ad_info == $service_valuid){ ?>

                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome<?php echo $row->id; ?>"><i class="fa fa-image"> Create Fome </i></button>
							 				 
<div class="modal fade" id="CreateFome<?php echo $row->id; ?>">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Select Pament </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                 <form action="<?php echo base_url('freeuser/paymentupload') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <center><a href="<?php echo $service_data['from_image']; ?>" download>Download <alt="W3Schools"></a></center>
</alt="W3Schools"></br>
                        <div class="form-group row">
                <label for="photo" class="col-sm-6 col-form-label"><span style="color:red"></span>Upload Size 800*1100</label>
             <div class="col-sm-6">
                 <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo">
             </div>
         </div>
		 <input type="hidden" name="customer_group_id" value="<?php echo  $customer_group_id; ?>"/>
            <input type="hidden" name="ser_id" value="<?php echo  $service_data['id']; ?>"/>
            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
            <input type="hidden" name="ad_info" value="<?php echo $row->id; ?>"/>
            <input type="hidden" name="family_user_id" value="<?php echo $family_user_id; ?>"/>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type='submit' class='btn btn-primary'>Paya submit</button>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </div>
							  <?php } else{ ?>
							  
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>

                           <?php }  ?>
							  <?php } else{ ?>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>
                           <?php }  ?>
			
                           <?php } else{ ?>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>
                           <?php }  ?>
                           <?php } else{ ?>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>
                           <?php } ?>
						     <?php } if($data->service_status == 'Pending'){ ?>
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#view"><i class="fa fa-image"> view</i></button>
							 <div class="modal fade" id="view">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Select Payment </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
         <div class="form-group">
                <label for="photo" class="col-sm-12 col-form-label"><span style="color:red"></span>Waiting for Approval</label>
             </div>

                           <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                 </div>
                           <?php } if($data->service_status == 'Img'){ 
                              $sql="Select * from payments where service_id = '$service_id' and customer_id='$customer_id' order by id desc limit 1 ";
                                  $query = $this->db->query($sql);
                                  $data =  $query->row();
                                  if(!empty($data)){ 
                               if($data->service_id == $service_id){ 
                                 $customer_id =$this->uri->segment(3); 
                                 $sql1="Select * from payments where service_id = $service_id and customer_id = '$customer_id' order by id desc limit 1 ";     
                                    $query1 = $this->db->query($sql1);
                                    $datax = $query1->row();
                                     if(!empty($datax)){ ?>
                             <!-- <a href="<?php echo $datax->profile_image_copy; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"></i></a>-->
                              <?php } else{ ?>
                                     <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">Pay Now</button> 
                    <?php }
                         $sql="Select * from payments where customer_id = $customer_id and service_id = $service_id order by id desc limit 1 ";    
                              $query = $this->db->query($sql);
                              $data =  $query->row();
                             if($data){ 
                         $from_image = $data->from_image; 
                         $image_id = $data->id;
                         $ad_infoS = $data->ad_info;
                        if($service_valuid == $ad_infoS){
							
							 $sql1="Select * from payments where customer_id = $customer_id and service_id = $service_id and family_user_id = $family_user_id order by id desc limit 1 ";    
                             $query = $this->db->query($sql1);
                             $data1 =  $query->row();
							 $family_user_output_id = $data->family_user_id; 

  if($data1){ ?>
                              <a href="<?php echo $from_image ?>" download class="btn btn-sm btn-primary"><i class="fa fa-download " title="Push to Government Website"> Download</i></a> 
<?php if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ ?>
                              <a href="<?php echo base_url('service/servicedelete/') ?><?php echo $image_id ?>/<?php echo $customer_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload" title="Push to Government Website"> Delete </i></a>
							  <?php } ?>
							  <?php } else{ ?>
                               <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button> 
                               <?php } ?>
                              <?php } else{ ?>
                               <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button> 
                               <?php } ?>

                              <!-- <a href="<?php echo base_url('api/users/') ?><?php echo $customer_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload" title="Push to Government Website"> Push</i></a> -->
                           <?php } else{ ?>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button> 
                           <?php }  ?>
                           <?php } else{ ?>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>
                           <?php } ?>
                           <?php } else{ ?>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">
                              Pay Now
                              </button>
                           <?php } ?>

                            <?php } else{ ?>
                          
                           <?php } ?>
                            <?php } else{ ?>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay<?php echo $service_valuid; ?>">Pay Now</button>
                           <?php } ?>
                       </td>



 
                         

<div class="modal fade" id="pay<?php echo $service_valuid; ?>">
<div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Select Pament </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
<?php if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){


  if($this->session->userdata('status') == 'Active') {
	  
   if($this->session->userdata('dist_id') == $user_data['dist_id'] ) {
echo(round($pay));
                              $pay = $v['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $v['service_payment'];
                              }
 } else {
                                     $pay = 150;
 }
 ?> 

<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){


  if($this->session->userdata('status') == 'Active') {
	  
   if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {

                              $pay = $v['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $v['service_payment'];
                              }
 } else {
                                     $pay = 150;
 }
  ?> 
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){



  if($this->session->userdata('status') == 'Active') {
	  
  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {

                              $pay = $v['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                     $pay = $v['service_payment'];
                              }
 } else {
                                     $pay = 150;
 }
  ?> 
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){




  if($this->session->userdata('status') == 'Active') {
	  
 if($this->session->userdata('panchayath_id') == $user_data['panchayath_id'] ) {

                              $pay = $v['service_payment'] / $user_datas['customer_amound'];
                              } else {
                                   $pay = $v['service_payment'];
                              }
 } else {
                                     $pay = 150;
 }

} 
  
  
                               $wallet = $In_Payment - $Out_Payment; 
                                 if(($pay - $wallet) > 0){ 
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
<img style="width:200px" src="<?php echo $payment_qr_oode; ?>"/></center>

                                          <?php } else{ ?>

                                       <form action="<?php echo base_url('freeuser/mlm/'.$service_id) ?>/<?php echo $customer_id ?>" method="post"  class="form-horizontal">

                                    <div class="modal-body">

                                          <input type="hidden" value="" name="family_id" id="family_id">
                                          <input type="hidden" value="<?php echo $row->id; ?>" name="ad_info" id="ad_info">
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
                                         


                                        <?php } ?>
                                         
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <?php if(($pay - $wallet) > 0){ 
                                       echo "<button type='submit' class='btn btn-default' data-dismiss='modal'>Close </button>";
                                       } else {
                                       echo "<button type='submit' class='btn btn-primary'>Next</button>";
                                       } ?>
                                    </div>
                                     </form>    
                                 </div>
                              </div>
                           </div>
                    
  <?php endif; ?>

                            </tr>
                   <?php } ?>
                </tbody>
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

