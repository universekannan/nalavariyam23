<div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
		 <div class="card-header">
                <h3 class="card-title">Edit Notipikesan Details</h3>
				</br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                  
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
              <form action="<?php base_url('notipikesan/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
<?php echo validation_errors(); ?>
		
		  <div class="row">
			<div class="col-md-6">           
<div class="form-group row">
                                       <label for="notipikesan_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Name  </label>
                                       <div class="col-sm-8">
                                          <input value="<?php echo $notipikesan_row['notipikesan_name'] ?>" required="required" type="text" class="form-control" name="notipikesan_name" id="notipikesan_name" maxlength="50" placeholder="Enter Notipikesan Name">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="from_date" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                       <div class="col-sm-8">
                                          <input  value="<?php echo $notipikesan_row['from_date'] ?>" required="required" type="date" class="form-control" name="from_date" id="from_date" maxlength="10" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="to_date" class="col-sm-4 col-form-label"><span style="color:red"></span>To Date</label>
                                       <div class="col-sm-8">
                                          <input value="<?php echo $notipikesan_row['to_date'] ?>"  required="required" type="date" class="form-control" name="to_date" id="to_date" maxlength="10" placeholder="">
                                       </div>
                                    </div>
                  <div class="form-group row">
					<label for="user_type" class="col-sm-4 col-form-label"><span style="color:red"></span>User Type</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="user_type" id="user_type" style="width: 100%;" required="required">
                   <option value="<?php echo $notipikesan_row['user_type'] ?>">selectED User </option> 
                   <option value="A">Superadmin</option> 
<option value="B">State Users</option> 
<option value="C">District Users</option> 
<option value="D">Taluk Users</option> 
<option value="E">Block Users</option> 
<option value="F">Panchayath Users</option> 
<option value="G">Center Users</option> 
<option value="I">Special User</option>

            </select>
					</div>
				</div>
                                 </div>
                                 <div class="col-md-6">
                                                 	
                                    <div class="form-group row">
                                       <label for="notipikesan_details" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Details</label>
                                       <div class="col-sm-8">
                                          <textarea  rows="5" required="requiered" type="text" class="form-control" name="notipikesan_details" id="notipikesan_details" maxlength="1000" placeholder="Notipikesan Details "><?php echo $notipikesan_row['notipikesan_details'] ?></textarea>
                                       </div>
                                    </div>
									           <div class="form-group row">
					<label for="status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status"
			style="width: 100%;" required="required">
				        <option value="1" <?php if($notipikesan_row['status'] =="Active") { echo "selected='selected'"; } ?>>Active</option>
                <option value="2" <?php if($notipikesan_row['status'] =="Inactive") { echo "selected='selected'"; } ?>>Inactive</option>
            </select>
					</div>
				</div> 
													 <div class="form-group row">
										<label for="notipikesan_img" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Image</label>
										<div class="col-sm-8">
											 <input type="file" name="notipikesan_img" value="Upload Image"><br/><br/>
											<span id="notipikesan_img" style="color:red"></span>
										</div>
									 </div>
									 
                                 </div>
								 
								 
								 
              </div>
              <!-- /.col -->
            </div>
            <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
						
					</div>
		    </div>
            </div>
                </div>
                </div>
              </div>
           </div>
        </div>
    </section>
          </div>

    <script type="text/javascript">
    $(document).ready(function() {
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerCreate").addClass('active');
    });
  </script>

<script>
 $('#district').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "customers/get_sub_Taluk", 
			data: {district: cat1_val},
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#taluk').empty().append(data);
				}
			});// you have missed this bracket
			return false;

		}
			
		});


		$('#taluk').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "customers/get_sub_President", 
			data: {taluk: cat1_val},

			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#panchayath').empty().append(data);
				}
			});// you have missed this bracket
			return false;

		}
			
		}); 
    
</script>
