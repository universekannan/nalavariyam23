<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">OutPut Details </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>Name</th>
                  <th>Pay Date</th>
                  <th style="width: 160px">Acehen</th>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->paydate; ?></td>
	  <td><?php echo $row->paydate; ?></td>


<?php
		   $customer_id = $this->uri->segment('4');
		   $service_id = $this->uri->segment('5');

$sql="Select * from payments where customer_id = $customer_id and service_id = $service_id order by id desc limit 1 ";    
         $query = $this->db->query($sql);
         $data =  $query->row();
        if(!empty($data)){ 
		 $profile_image_copy = $data->profile_image_copy; 
?>
 <td>
  <a href="<?php echo $profile_image_copy ?>" download class="btn btn-sm btn-primary"><i class="fa fa-download " title="Push to Government Website"> Download</i></a> 
   </td>
<?php } else{ ?>
<?php } ?>
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
		   