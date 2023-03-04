<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Customer  </h1>
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
                <h3 class="card-title">Edit Customer Details</h3>
				</br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                  
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
              <form action="<?php base_url('customers/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
<?php echo validation_errors(); ?>
		
		  <div class="row">
			<div class="col-md-6">           

<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ ?>
      <input type="hidden" name="group_id" value="14"/>
<?php } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ ?>
      <input type="hidden" name="group_id" value="15"/>

<?php } ?>

      <input type="hidden" name="dist_id" value="<?php echo $this->session->userdata('dist_id'); ?>"/>
	  
	  <div class="form-group row">
					<label for="full_name_tamil" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['full_name_tamil'] ?>" required="required" type="text" class="form-control" name="full_name_tamil" id="full_name_tamil" maxlength="50" placeholder="Full Name">
					</div>
				</div>
                
				<div class="form-group row">
					<label for="relationship_tamil" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
							<option value="<?php echo $user_data['gender'] ?>"><?php echo $user_data['gender'] ?></option>
							<option value="Male">Male </option>
              <option value="Female">Female</option>
						</select>
					</div>
				  </div>
				  
				
				 <div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['phone'] ?>" required="required" type="text" class="form-control"  onkeyup="sync()" onClick="sync()"  name="phone" id="phone" maxlength="10" placeholder="Mobile Number">
					</div>
				</div>
				<div class="form-group row">
					<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['aadhaar_no'] ?>" required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
					</div>
					
				</div>
				
              </div>
              <div class="col-md-6">
               
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ ?>

	<div class="form-group row">
		<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" id="district" style="width: 100%;">
		    <option value="<?php echo $user_data['dist_id'] ?>">Selected <?php echo $user_data['dist_id'] ?> District</option>
			   <?php foreach($district_data as $val) { ?> 
				<option value="<?php echo $val['id'];?>">
				  <?php echo $val['district_name'];?>
			    </option>  
			  <?php } ?>
		    </select>
		</div>
	</div>	
	<div class="form-group row">
		<label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;">
			<option value="<?php echo $user_data['taluk_id'] ?>">Selected <?php echo $user_data['taluk_id'] ?> Taluk</option>
		 </select>
		</div>
	</div>
    <div class="form-group row">
		<label for="panchayath_id" class="col-sm-4 col-form-label"><span style="color:red"></span> VAO</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="panchayath_id" id="panchayath" style="width: 100%;">
			<option value="<?php echo $user_data['panchayath_id'] ?>">Selected <?php echo $user_data['panchayath_id'] ?> Village</option>
		 </select>
		</div>
		
	</div>	
<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){ ?>
	<div class="form-group row">
		<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" id="district" style="width: 100%;" required="required">
		      <option value="<?php echo $district_row['id'] ?>">  <?php echo $district_row['district_name'] ?> Change ?
		      <option value="<?php echo $district_row['id'] ?>"> <?php echo $district_row['district_name'] ?>
			    </option>  
		    </select>
		</div>
	</div>	

	   <div class="form-group row">
		<label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;">
			<option value="<?php echo $user_data['taluk_id'] ?>">Select Taluk</option>
			
		 </select>
		</div>
	</div>
         <div class="form-group row">
		<label for="panchayath_id" class="col-sm-4 col-form-label"><span style="color:red"></span> VAO</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="panchayath_id" id="panchayath" style="width: 100%;">
			<option value="<?php echo $user_data['panchayath_id'] ?>">Select Village</option>
		 </select>
		</div>
	</div>	
<?php }	?>

				<div class="form-group row">
					<label for="followdate" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Date</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['followdate'] ?>" required="required" type="date" class="form-control" name="followdate" id="followdate" maxlength="50" placeholder="">
					</div>
				</div>
				<div class="form-group row">
					<label for="follow_message" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Message</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="follow_message" id="follow_message" style="width: 100%;" required="required">
							<option value="<?php echo $user_data['follow_message'] ?>"><?php echo $user_data['follow_message'] ?></option>
							<option value="New Application">New Application</option>
							<option value="Renewal">Renewal</option>
							<option value="Resubmit">Resubmit</option>
							<option value="6th study">6th study</option>
							<option value="7th study">7th study</option>
							<option value="8th study">8th study</option>
							<option value="9th study">9th study</option>
							<option value="10th study">10th study</option>
							<option value="11th study">11th study</option>
							<option value="12th study">12th study</option>
							<option value="Ug 1st year">Ug 1st year</option>
							<option value="Ug 2nd year">Ug 2nd year</option>
							<option value="Ug 3rd year">Ug 3rd year</option>
							<option value="Ug 4th year">Ug 4th year</option>
							<option value="Ug 5th year">Ug 5th year</option>
							<option value="Pg 1st year">Pg 1st year</option>
							<option value="Pg 2nd year">Pg 2nd year</option>
							<option value="Pg 3rd year">Pg 3rd year</option>
							<option value="Marriage">Marriage</option>
							<option value="Maternity">Maternity</option>
							<option value="Pension">Pension</option>
							<option value="Life Certificate">Life Certificate</option>
						</select>
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
