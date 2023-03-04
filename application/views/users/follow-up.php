<div class="content-wrapper">
      <div class="card-header">
                  <h3 class="card-title">Followup Details </h3>
                 
               </div>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
            
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                  <th> S No</th>
                  <th> District</th>
                  <th> Taluk</th>
                  <th> Name</th>
                  <th> FollowDate</th>
                  <th> Status</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th> Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?> 
  <tr>
	  <td> <?php echo $row->id; ?></td>
	  <td> <?php echo $row->district_name; ?></td>
	  <td> <?php echo $row->taluk_name; ?></td>
	  <td> <?php echo $row->full_name; ?></td>
	  <td> <?php echo $row->followdate; ?></td>
	  <td> <?php echo $row->status; ?></td>
                           <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                           <td>
                              <?php if(in_array('updateUser', $user_permission)): ?>

<div class="btn-group">
<button type="button" class="btn btn-default">Action</button>
<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu" role="menu">
<a class="dropdown-item" href="<?php echo base_url('users/edit/'.$row->group_id.'/'.$row->id) ?>">Edit</a>
<a class="dropdown-item" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?> ">View</a>

 <?php if (($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3'))  { ?>
<a class="dropdown-item" href="<?php echo base_url('users/status/'.$row->group_id.'/'.$row->id) ?>">Status</a>

	  <?php } if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')){ ?>
	  <a class="dropdown-item" data-toggle="modal" data-target="#pay<?php echo $row->id; ?>">Status</a>
<a class="dropdown-item" href="<?php echo base_url('wallet/userwallet/'.$row->id) ?>"> User Wallet</a>

	  <?php } ?>

</div>
</div>
 <?php endif; ?>
                           </td>
                           <?php endif; ?>
                        </tr>
                        <div class="modal fade" id="modal-default<?php echo $row->id; ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title"><?php echo $row->full_name; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
					 <form action="<?php echo base_url('users/addfollowup/'.$row->id) ?>" method="post"  class="form-horizontal">

                                 <div class="modal-body">
                                    <span class="dropdown-item dropdown-header">
                                    <img src="<?php echo base_url('assets/dist/img/'.$row->profile_photo) ?>"  class="img-circle elevation-2 " style="width: 25%; height: auto;">
                                    </span>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->id; ?> </label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>UserName </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->username; ?> </label>
                                    </div>
<?php if(($this->session->userdata('group_id') == '1') || ($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ ?>

                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>District </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->district_name; ?> </label>
                                    </div>
<?php } else if(($this->session->userdata('group_id') == 4) || ($this->session->userdata('group_id') == 5)){ ?>

                                     <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Taluk </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->taluk_name; ?> </label>
                                    </div>

<?php } else if(($this->session->userdata('group_id') == 6) || ($this->session->userdata('group_id') == 7) || ($this->session->userdata('group_id') == 10) || ($this->session->userdata('group_id') == 11)){ ?>

                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Panchayath </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->panchayath_name; ?> </label>
                                    </div>
<?php } ?>
    <input type="hidden" name="user_id" value="<?php echo $row->id; ?>"/>

                 <div class="form-group row">
									   	<label for="follow_message" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Date</label>
					<div class="col-sm-8">

                                          <input value="<?php echo $row->followdate; ?>" type="date" class="form-control"  name="followdate" required="requiered">
                                       </div>
									   </div>
                 <div class="form-group row">
					<label for="follow_message" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Message</label>
					<div class="col-sm-8">
						<textarea  rows="5" required="requiered" type="text" class="form-control" name="follow_message" id="follow_message" maxlength="1000" placeholder="follow_message"><?php echo $row->follow_message; ?></textarea>
					</div>
				</div>
									
                                 </div>
                                 <div class="modal-footer justify-content-between">
                                    <a type="" class=""></a>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                 </div>
								</form>

                              </div>
                           </div>
                        </div>
                        <div class="modal fade" id="pay<?php echo $row->id; ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Select Pament </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10')){ 

                                       $group_id ="12";

                                       } if(($this->session->userdata('group_id') == '3') ||  ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')){ 

                                       $group_id ="13";

                                       } 

           $sql="Select * from groups_list where `id` = '$group_id' order by id desc limit 1 ";    
		   $query = $this->db->query($sql);
		   $data = $query->row();
		   $admin_amount = $data->admin_amount;
		   $renew_payment = $data->renew_payment;
		   if($data){ 
		   if($status = $row->status == 'Inactive'){
			   
if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ 
 $pay = 500;
} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){ 
 if(($this->session->userdata('dist_id') == $row->dist_id )) {
 $pay = 500;
} else{
 $pay = 750;
}
} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){ 
 if(($this->session->userdata('dist_id') == $row->dist_id )) {
 $pay = 750;
} else{
 $pay = 1000;
}
} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){ 
 $pay = 750;
}

		   } if($status = $row->status == 'Active'){ 
			   $pay = 100;
		   } } ?>
									   
									   



                                       
                                    <?php $wallet = $In_Payment - $Out_Payment; ?>
                                    <?php  if(($pay - $wallet) > 0){ 
 if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){
    $referral_id ='Null';
    } else {
 $referral_id = $this->session->userdata('referral_id'); 

}
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


                                      
                                       <form action="<?php echo base_url('users/userpay/'.$row->id) ?>" method="post"  class="form-horizontal">

                                      <input type="hidden" value="<?php echo $row->dist_id; ?>" name="dist_id">
                                       <input type="hidden" value="<?php echo $row->taluk_id; ?>" name="taluk_id">
                                       <input type="hidden" value="<?php echo $row->panchayath_id; ?>" name="panchayath_id">
                                       <input type="hidden" value="<?php echo $row->group_id; ?>" name="group_id">
                                        <input type="hidden" value="<?php echo $row->id; ?>" name="custmor_id">

                                       <div class="form-group row">
                                          <label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
                                          <input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
                                       </div>
                                       <div class="form-group row">
                                          <label for="service_payment" class="col-sm-12 col-form-label"><span style="color:red"></span>Activasen Payment</label>
                                          <input value="<?php echo $pay; ?>" type="text" class="form-control"  name="admin_amount" readonly>
                                       </div>

                                       <?php if(($pay - $wallet) > 0){ 
                                          echo "<div class='form-group row'>
                                          <label for='new_payment' class='col-sm-12 col-form-label'><span style='color:red'></span>Adsenal Payment</label>
                                          <input required='requiered' type='text' class='form-control' name='new_payment' placeholder='Enter Balance Payment'>
                                          </div>";
                                          } else {
                                          echo "";
                                          } ?>
                                 </div>
                                  <?php } ?>
                                 <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <?php if(($pay - $wallet) > 0){ 
                                    echo "";
                                    } else {
                                    echo "<button type='submit' class='btn btn-primary'>Pay Now</button>";
                                    } ?>
                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>
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