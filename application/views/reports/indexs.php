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
              <div class="col-md-6">
			  
			 <center><a href="<?php echo $servicedata['from_image']; ?>" download>Download <alt="W3Schools"></a></center>
 </br>
			   <a href="<?php echo $servicedata['from_image']; ?>" download>
      
	  <img src="<?php echo $servicedata['from_image'] ?>" alt="Download">
    </a>
</br></br>	
 <p><?php echo $servicedata['download'] ?></p>
</br>

              </div>



              <div class="col-md-6">
			        <form action="https://nalavariyam.com/app/reports/paymentupload" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="form-group row">
					          <label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Insurance</label>
                      <div class="col-sm-8">
                          <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo" onchange="loadFile(event)">
                      </div>
				          </div>
			
<img id="output"/>

</br></br>	
<p><?php echo $servicedata['upload'] ?></p>
</br>


<center>
 <?php 
 $customer_id =  $this->uri->segment(4);
 $log_id = $this->session->userdata('log_id');

 $distID = $this->session->userdata('dist_id');
 $sql="Select * from payments where customer_id = '$log_id' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data =  $query->row();
    if(!empty($data)){
      if($data->service_status == 'Paid'){ ?>

      <input type="hidden" name="ser_id" value="<?php echo $servicedata['id']; ?>"/>
      <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
      
	  <input type="submit" name="submit"  value="Next" class="btn btn-sm btn-primary"></input> 
      <?php } } else{ ?>
       
     <?php }?>
 </center>
                  </form>

                  </div>

                <!-- /.form-group -->
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
 
 