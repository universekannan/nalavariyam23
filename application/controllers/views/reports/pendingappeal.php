 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Payment Status</h1>
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
            <h3 class="card-title">Service Payment Status</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

              <form action="<?php base_url('reports/rettanapply/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row">
              <div class="col-md-12">
				<div class="form-group row">
					<label for="service_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
 <?php 
 $userID = $this->session->userdata('id');
 $id =  $this->uri->segment(3);
 $sql="Select * from payments where id = $id order by id desc limit 1 ";    
 $query = $this->db->query($sql);
 $data =  $query->row();
 $upi_id = $data->upi;
if(!empty($data)){
 ?>
 <div class="form-group row">
					<label for="upi" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Payment Status</label>
<div class="col-sm-8">
             <select class="form-control select2bs4" name="service_status" id="service_status" required="requiered" style="width: 100%;" required="required">
 				<option value="<?php echo $data->service_status; ?>"><?php echo $data->service_status; ?></option>
                <option value="Paid">Paid</option>
                <option value="UsedPaid">UsedPaid</option>
				 <?php } ?>
            </select>
					</div>
					</div>
					</div>
				</div> 
                  </div>
              </div>
            </div>
         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
					</div>
				</div>	
          </div>
          <!-- /.box-body -->
      </div>
  </div><!-- /.container-fluid -->
    </section>   
	</div>

 <script>
    $("#admin").addClass('active');
  </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#Setting").addClass('menu-open');
      $("#Settings").addClass('active');
      $("#PendingAppeal").addClass('active');
    });
  </script>