<div class="content-wrapper">
      <div class="card-header">
                <h3 class="card-title">Summary</h3>
				
                <!-- <a href="" data-toggle="modal" data-target="#ClearData" class="btn btn-primary btn-sm float-sm-right" title="Clear Payment Data   "><i class="fas fa-plus"> Clear Data </i> </a>-->
				 
				 
                 <a href="" data-toggle="modal" data-target="#Transfer" class="btn btn-primary btn-sm float-sm-right" title="Transfer"><i class="fas fa-plus"> Transfer</i> </a>
<?php if ($this->session->userdata('group_id') == '1'){ ?>
				<a href="" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm float-sm-right" title="Add Payment "><i class="fas fa-plus"> Add Payment</i> </a>
  <?php   } else { ?>

                 <a href="" data-toggle="modal" data-target="#addpaydate" class="btn btn-primary btn-sm float-sm-right" title="Add Payment "><i class="fas fa-plus"> Add Payment</i> </a>
  <?php   }  ?>

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
                  <th>S No</th>
                  <th>UserId</th>
                  <th>Tittels</th>
                  <th>DateTime</th>
                  <th>Data</th>
                  <th> Debit</th>
                  <th> Credit</th>

                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->from_id; ?></td>
      <td><?php echo $row->service_status; ?>, <?php echo $row->ad_info; ?>, <?php echo $row->ad_info2; ?>, RS<?php echo $row->amount; ?></td>

	  	 <td><?php $originalDate = $row->paydate;
$newDate = date("d-m-Y", strtotime($originalDate)); 
	  echo $newDate; ?>, <?php echo $row->time; ?></td>
	  <td>C<?php echo $row->customer_id; ?>, S<?php echo $row->service_id; ?></td>
	     <?php if($row->service_status == 'Out Payment') { ?>
	  <td><?php echo $row->amount; ?></td>
	  <td></td>
 <?php } else { ?>
	  <td></td>
	  <td><?php echo $row->amount; ?></td>
 <?php } ?>

</tr>
                    
                   <?php } ?>

                </tbody>
				     <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
      <td></td>
                   <td>Total</td>
				   <?php $wallet = $In_Payment - $Out_Payment; ?>
                   <td><?php echo(round($wallet)); ?></td>
                      </tr>
              </table>
			  			  
<div class="modal fade" id="Transfer">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Payment Transfer</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment;
//print_r($data);die;

 if(($wallet) > 0){ ?>
<form action="<?php echo base_url('wallet/create') ?>" method="post"  class="form-horizontal">
<?php } else {?>
<?php } ?>
                <div class="form-group row">
					<label for="user_id" class="col-sm-12 col-form-label"><span style="color:red"></span> District</label>
						<select class="form-control select2bs4" name="user_id" style="width: 100%;" required="required">
							<option value="">Select User Name</option>
								 <?php 
   if ($this->session->userdata('group_id') == '1'){
	   
							   $data = $this->model_users->getUsers();
							   foreach($data as $row)
							  {  
							  echo '<option value="'.$row['id'].'">'.$row['phone'].' -> '.$row['full_name'].'</option>';
							  }
   }  elseif (($this->session->userdata('group_id') == '16') | ($this->session->userdata('group_id') == '17')){
		$assigned_user_id = $this->session->userdata('id');

$sql="select * from users where assigned_user_id= $assigned_user_id";
$query = $this->db->query($sql);
$query->num_rows();
$result = $query->result();

//print_r($result); die;
  foreach($result as $row) { 
$customer = $row->id;


							  echo '<option value="'.$row->id.'">'.$row->phone.' -> '.$row->full_name.'</option>';
							  }
   } else {
							    $data = $this->model_users->getWalletUsers();
							   foreach($data as $row)
							  {  
							  echo '<option value="'.$row['id'].'">'.$row['phone'].' -> '.$row['full_name'].'</option>';
							  }
   }
							  
							  ?>
						</select>
				</div>	 
 				<div class="form-group row">
					<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
					<input value="<?php echo(round($wallet)); ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
				</div>
				
<?php  if(($wallet) > 0){ 
          echo "<div class='form-group row'>
					<label for='transfer_payment' class='col-sm-12 col-form-label'><span style='color:red'></span>Transfer Payment</label>
					<input required='requiered' type='text' class='form-control' name='transfer_payment' placeholder='Enter Transfer Payment'>
				</div>";
		} else {
         echo "";
 } ?>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php  if(($wallet) > 0){ 
		 echo "<button type='submit' id='plansubmit' class='btn btn-primary'>Transfer Now</button>";
		} else {
		 echo "<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>";
 } ?>
  </form>
</div>
</div>
</div>
</div> 

<div class="modal fade" id="add">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Payment</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?php echo base_url('wallet/inset') ?>" method="post"  class="form-horizontal">
<div class="modal-body">

	<div class="form-group row">
		<label for="amount" class="col-sm-12 col-form-label"><span style="color:red"></span>Pament</label>
		<input type="text" class="form-control" name="amount" id="amount" >
    </div>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add Payment</button>
	
  </form>
</div>
</div>
</div>
</div> 
<!--
<div class="modal fade" id="ClearData">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Clear Data</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?php echo base_url('wallet/cleardata') ?>" method="post"  class="form-horizontal">
<div class="modal-body">
<h4 class="modal-title">Clear Data <?php echo $wallet; ?> Rows </h4>

	<div class="form-group row">
		<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
		<input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
    </div>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Transfer Now</button>
	
  </form>
</div>
</div>
</div>
</div> -->

<div class="modal fade" id="addpaydate">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Payment</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php 
   if ($this->session->userdata('group_id') == '1'){
$sql="Select * from `users` where `group_id` = '1' order by `id` desc limit 1 ";
 }else if ($this->session->userdata('group_id') == '2'){
$sql="Select * from `users` where `group_id` = '2' order by `id` desc limit 1 ";
 }else if ($this->session->userdata('group_id') == '3'){
$sql="Select * from `users` where `group_id` = '3' order by `id` desc limit 1 ";
 }else if (($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
	 $login = $this->session->userdata('id');
 $sql="select `a`.*,`b`.`full_name`,`phone`,`upi`,`payment_qr_oode` from `assigned_district` `a`,`users` `b` where `a`.`user_id`=`b`.`id` and `a`.`district_user_id`='$login'";
    } else {
 $referral_id = $this->session->userdata('referral_id'); 
 $sql="Select * from `users` where `id` = $referral_id order by `id` desc limit 1 ";    
	}
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


</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </form>
</div>
</div>
</div>
</div> 
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



  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		 <script type="text/javascript">
    $("#tamount").keyup(function(){
        var getval = parseInt(this.value);
        var bal = parseInt($('#avilable_balance').val());
        var bal2 = parseInt($('#balance').val());
        if(getval) {
            if(bal < getval) {
                $("#error").css("display", "block");
                $('#nbalance').val(0); 
            } else {
                var tds = (getval/100) * 15;
                $('#tds').val(tds);
				var rebirth = (getval/100) * 10;
                $('#rebirth').val(rebirth);
                var myamount = getval - tds - rebirth;
                $('#myamount').val(myamount);


               var res = bal2 - getval;
                $('#nbalance').val(res); 
                $('#nbalance1').val(res); 
                $("#error").css("display", "none");
            }
        } else {
            $("#error").css("display", "none");
            $('#nbalance').val(0); 
        }
    });

    $('.submit-form').on('submit', function(){
        $('.submit-button').attr('disabled', 'true');
    })
</script>  
 <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
    $('#plansubmit').click(function () {
     $('#modal-popup').modal('hide');
    });
});

</script>
<style type="text/css">
  .small-box>.small-box-footer { cursor: default; }
</style>
