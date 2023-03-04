<style>
  img{
  max-width:400px;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1>  </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><?php echo $servicedata['service_name']; ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
			  
			  <center><a href="<?php echo $servicedata['from_image']; ?>" download>Download <alt="W3Schools"></a>
 </br>
			   <a href="<?php echo $servicedata['from_image']; ?>" download>
      
	  <img src="<?php echo $servicedata['from_image'] ?>" alt="Download">
    </a>
</br></br>
 <p><?php echo $servicedata['download'] ?></p>
</br>
</br> 
<?php 
 $se_id = $this->uri->segment(3);
 $log_id = $this->session->userdata('id');
 $sql="Select * from payments where customer_id = $log_id order by id desc limit 1 ";
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_status == 'UsedPaid'){ ?>
     <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $servicedata['id'];?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $log_id;?>" style="display: none;">
          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $servicedata['service_payment']; ?>  Pay</button>
        </form> 
		 <?php } } else{ ?>
		  <form action="<?php echo base_url('service/check');?>" method="post">
          <input type="" name="id" value="<?php echo $servicedata['id'];?>" style="display: none;">
          <input type="" name="customer_id" value="<?php echo $log_id;?>" style="display: none;">
          <button type="submit" class="btn btn-sm buy_now btn-primary">Rs <?php echo $servicedata['service_payment']; ?>  Pay Now</button>
        </form> 
 <?php }?>
</center>
</div>
</br>
</br>
<div class="col-md-12">
<center>
 <?php 
 $customer_id =  $this->uri->segment(4);
 $userID = $this->session->userdata('id');
 $distID = $this->session->userdata('dist_id');
 $sql="Select * from payments where customer_id = $userID order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_status == 'Paid'){ ?>
			        <form action="https://nalavariyam.com/app/reports/paymentupload" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="form-group row">
	 <label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Upload the Application (Width 800 ,Height 1100)</label>
                      <div class="col-sm-8">
                          <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo" onchange="loadFile(event)">
                      </div>
		</div>
<img id="output"/>
</br></br>	
<p><?php echo $servicedata['upload'] ?></p>
</br> 
      <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
      <input type="hidden" name="ser_id" value="<?php echo $servicedata['id']; ?>"/>
        <input type="submit" name="submit"  value="Submit" class="btn btn-sm btn-primary"></input> 
      <?php } } else{ ?>
       
     <?php }?>
 </center>
                  </form>
                  </div>	  
              </div>
            </div>
          </div>
         </div>
       </div>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerView").addClass('active');
    });
  </script>
  
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>