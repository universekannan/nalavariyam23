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
                    
                
                  <?php if(in_array('updateUser', $user_permission) || in_array('AllServices', $user_permission)): ?>
                  <th style="width: 130px">Additional</th>
                  <th style="width: 130px">View</th>
                  <th style="width: 160px">Acehen</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($service_data): ?>                  
                    <?php foreach ($service_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['service_name']; ?></td>

                        <?php if(in_array('AllServices', $user_permission)): ?>
                        <td>
<?php $customer_id =$this->uri->segment(3); ?>

<?php 
 $log_id = $this->session->userdata('id');

 $sql="Select * from payments where customer_id = $log_id order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_status == 'UsedPaid'){ ?>
	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  <t/d>
	   <td>
	  <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $v['id'] ?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $customer_id;?>" style="display: none;">

          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $v['service_payment']; ?>  Pay Now</button>
        </form>
		 <?php } } else{ ?>
	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  <t/d>
	   <td>
		 <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $v['id'] ?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $customer_id;?>" style="display: none;">

          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $v['service_payment']; ?>  Pay Now</button>
        </form>
 <?php }?>

<?php 
 $log_id = $this->session->userdata('id');

 $sql="Select * from payments where customer_id = $log_id order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_status == 'Paid'){
$service_id = $v['id'];
$sql="Select * from service where id = $service_id order by id";    
    $query = $this->db->query($sql);
    $data1 =  $query->row();
      if($data1->next_url == '1'){ 
	 if($data1->id == '$service_id'){ ?>
	 	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  <t/d>
	   <td>
		 <a href="<?php echo base_url('service/save_image/'.$customer_id) ?>/<?php echo $v['id']; ?>" class="btn btn-default" onclick="window.open('<?php echo base_url('service/save_image/'.$customer_id) ?>/<?php echo $v['id']; ?>','popup','width=1000,height=1450'); return false;"><i class="fa fa-image"> Create Fome</i> </a>
		 
<?php }  else{ ?>

	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  </td>
	  <td>
 <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $v['id'] ?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $customer_id;?>" style="display: none;">
          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $v['service_payment']; ?>  Pay Now</button>
        </form>
<?php } ?>

<?php } if($data1->next_url == '2'){ ?>

	    <a href="<?php echo base_url('customers/edu/'.$customer_id) ?>/<?php echo $v['id']; ?>" class="btn btn-default"><i class="fa fa-ellipsis-h"> Next </i></a>
	</td>
	<td>
	    <a href="<?php echo base_url('customers/edu/'.$customer_id) ?>/<?php echo $v['id']; ?>" class="btn btn-default"><i class="fa fa-ellipsis-h"> Next </i></a>
    </td>
	<td>
	    <a href="<?php echo base_url('customers/edu/'.$customer_id) ?>/<?php echo $v['id']; ?>" class="btn btn-default"><i class="fa fa-ellipsis-h"> Next </i></a>
	<?php } ?>

<?php } if($data->service_status == 'Dean'){ 
$service_id = $v['id'];
$sql="Select * from payments where service_id = $service_id and customer_id = $log_id order by id";    
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_id == $v['id']){ ?>
	  	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  <t/d>
	   <td>
        <a href="<?php echo base_url('api/users/') ?><?php echo $customer_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload" title="Push to Government Website"> Push</i></a> 

<?php } } else{ ?>
	<a href="<?php echo base_url('customers/') ?><?php echo $v['additional_url']; ?>/<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Additional information"> Additional</i></a>	
	</td>
	<td>
	 <a href="<?php echo base_url('service/test/') ?><?php echo $customer_id ?>/<?php echo $v['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye" title="View"> Test</i></a>   
	  <t/d>
	   <td>
	  		 <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $v['id'] ?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $customer_id;?>" style="display: none;">

          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $v['service_payment']; ?>  Pay Now</button>
        </form>
<?php }}?>
     <?php }?>

                        </td>
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
  