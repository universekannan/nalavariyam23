<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit User profile</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
			<form action="<?php base_url('users/editkannan'.$this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

			<?php echo validation_errors(); ?>
            <div class="row">
			
              <div class="col-md-6">
						<input type="hidden" value="<?php echo $this->uri->segment(4) ?>" name="user_id" id="user_id" maxlength="50" placeholder="Customer ID">

              	<div class="form-group row">
					<label for="service_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Name</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="service_id" id="service_id" style="width: 100%;" required="required">
			
                    <?php
$sql="SELECT * FROM service";
$query = $this->db->query($sql);
$result1 = $query->result();
  foreach($result1 as $row1) { ?>
                     <option value="<?php echo $row1->id; ?>"><?php echo $row1->service_name; ?> </option> 
  <?php } ?>
            </select>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="customer_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Customer ID</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="customer_id" id="customer_id" maxlength="50" placeholder="Customer ID">
					</div>
				</div>	
				
              </div>
              </div>
              <!-- /.col -->
            </div>
        
         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save"/>
					</div>
				</div>	

          </div>
        </div>
        <!-- /.card -->
        <!-- SELECT2 EXAMPLE -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#UsersCreate").addClass('active');
    });

	  
	  $('#district').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "users/get_sub_Taluk", 
			data: {district: cat1_val},
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#taluk').empty().append(data);
				} 
		  
		});
		
		}
	});

		$('#taluk').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "users/get_sub_President", 
			data: {taluk: cat1_val},
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#panchayath').empty().append(data);
				} 
			
		        }); 
		  }
     });
</script>	