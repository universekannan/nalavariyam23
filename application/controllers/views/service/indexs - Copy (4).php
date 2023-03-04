<div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
			     <div class="form-group row">
					<label class="col-sm-4 col-form-label"><span style="color:red"></span></label>
					<label class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $user_data['full_name'] ?></label>
				</div>
					</div>
				</div>
            <div class="card">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Services</th>
                  <th style="width: 130px">Amount</th>
                  <th style="width: 130px">Additional</th>
                  <th style="width: 100px">View</th>
                  <th style="width: 200px">Acehen</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($service_data): ?>                  
                    <?php foreach ($service_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?> </td>
                        <td><?php echo $v['service_name']; ?></td>
                        <td><?php echo $v['service_payment'] / $user_datas['customer_amound']; ?> Rs</td>

                        <?php if(in_array('AllServices', $user_permission)): ?>
						
                    
					  
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
<?php $users_id = $this->session->userdata('id');
$sql="Select * from users where id = $users_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$wallet = $datag->wallet; 
 if(($v['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ ?>
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
					<input value="<?php echo $v['service_payment'] / $user_datas['customer_amound']; ?>" type="text" class="form-control" name="new_payment">
				</div>
<?php if(($v['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ 

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
<?php if(($v['service_payment'] / $user_datas['customer_amound'] - $wallet) > 0){ 
		 echo "<button type='submit' class='btn btn-primary'>Paya Now</button>";
		} else {
		 echo "<button type='submit' class='btn btn-primary'>Next</button>";
 } ?>
  </form>
</div>
</div>
</div>
</div> 
 <?php endif; ?>
 </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerView").addClass('active');
    });
	
	function pay() {
		var SITEURL = "<?php echo base_url() ?>";
//$(document).on('load', function(){
	var txnid =  "<?php echo $this->session->userdata('id'); ?>";
	var email =  "<?php echo $this->session->userdata('email'); ?>";
	var mobile =  "<?php echo
	$this->session->userdata('phone'); ?>";
	var firstname =  "<?php echo $this->session->userdata('full_name'); ?>";
	var totalCost =  "<?php echo $v['service_payment']; ?>";
	var productinfo =  "kannan";
		  $.ajax({
		url: SITEURL + 'transaction',
		type: 'post',
		data: {txnid : txnid, email : email , mobile : mobile,firstname : firstname ,totalCost : totalCost,productinfo : productinfo
		}, 
		success: function (data) {
			window.location.href = SITEURL + 'transaction';
		//alert(data);
		}
		});
//});
		
	}
  </script>

