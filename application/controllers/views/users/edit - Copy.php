    <link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit User Profile</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
			<form action="<?php base_url('users/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

			<?php echo validation_errors(); ?>
            <div class="row">
              <div class="col-md-6">
				<input type="hidden" name="groups" value="<?php echo $user_data['group_id'] ?>"/>

<?php if(($this->uri->segment(3) == '4') || ($this->uri->segment(3) == '5')) { ?>
 <div class="form-group row">
					<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" style="width: 100%;" required="required" >
             <?php $data = $this->model_users->getDistrictlimit();
				   foreach($data as $row)
				  { ?>
				<option readonly value="<?php echo $row['id'] ?>" <?php if($user_data['dist_id'] == $row['id']) { echo "selected='selected'"; } ?>><?php echo $row['district_name'] ?></option>
             <?php }?>
			  </select>
			</div>
		</div>
<?php } if(($this->uri->segment(3) == '6') || ($this->uri->segment(3) == '7')){ ?>
     <div class="form-group row">
			<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" id="cat1" style="width: 100%;" required="required" >
             <?php $data = $this->model_users->getDistrict();
				   foreach($data as $row)
				  { ?>
				<option readonly value="<?php echo $row['id'] ?>" <?php if($user_data['dist_id'] == $row['id']) { echo "selected='selected'"; } ?>><?php echo $row['district_name'] ?></option>
             <?php }?>
			 
			  </select>
			</div>
		</div>
		<div class="form-group row">
		<label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;" required="required">
			
		 </select>
		</div>
	</div>
<?php } if(($this->uri->segment(3) == '8') || ($this->uri->segment(3) == '9') || ($this->uri->segment(3) == '10') || ($this->uri->segment(3) == '11')  ||  ($this->uri->segment(3) == '12') || ($this->uri->segment(3) == '13')){ ?>
	<div class="form-group row">
		<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" id="district" style="width: 100%;" required="required">
			  <option value="">Select District Name</option>
			  <?php $data = $this->model_users->getDistrict();
				   foreach($data as $row)
				  { ?>
				<option readonly value="<?php echo $row['id'] ?>" <?php if($user_data['dist_id'] == $row['id']) { echo "selected='selected'"; } ?>><?php echo $row['district_name'] ?></option>
             <?php }?>
		    </select>
		</div>
	</div>	
	<div class="form-group row">
		<label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;" required="required">
			<option value="">Select Taluk</option>
		 </select>
		</div>
	</div>
         <div class="form-group row">
		<label for="panchayath_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Panchayath</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="panchayath_id" id="panchayath" style="width: 100%;" required="required">
			<option value="">Select Panchayath</option>
		 </select>
		</div>
	</div>	      
	<?php } ?>
 
				<div class="form-group row">
					<label for="full_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Full Name" value="<?php echo $user_data['full_name'] ?>">
					</div>
				</div>
	     <div class="form-group row">
					<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="50" placeholder="Aadhaar No" value="<?php echo $user_data['aadhaar_no'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="phone" id="phone" maxlength="50" placeholder="Mobile Number" value="<?php echo $user_data['phone'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Email ID</label>
					<div class="col-sm-8">
						<input  required="requiered" type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email ID" value="<?php echo $user_data['email'] ?>">
					</div>
				</div>

<?php if($this->session->userdata('group_id') == '1'){ ?>
           <div class="form-group row">
					<label for="status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status"
			style="width: 100%;" required="required">
				        <option value="Active" <?php if($user_data['status'] =="Active") { echo "selected='selected'"; } ?>>Active</option>
                <option value="Inactive" <?php if($user_data['status'] =="Inactive") { echo "selected='selected'"; } ?>>Inactive</option>
            </select>
					</div>
				</div> 
<?php } if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ ?>
           <div class="form-group row">
					<label for="status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
						<input type="status" class="form-control" name="status" id="status" maxlength="50" placeholder="" value="<?php echo $user_data['status'] ?>"readonly>
					</div>
				</div> 
<?php } if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '10')){ ?>
      <input type="hidden" name="status" value="<?php echo $user_data['status'] ?>"/>
<?php } ?>
              </div>
              <div class="col-md-6">
			  
			  <div class="form-group row">
					<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender </label>
					<div class="col-sm-8">
						<div class="radio">
                    <label>
                      <input type="radio" <?php  if($user_data['gender'] == '1'){ ?> checked <?php }else{ ?> '' <?php } ?> name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" <?php  if($user_data['gender'] == '2'){ ?> checked <?php }else{ ?> '' <?php } ?> name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
					</div>
				</div>
                 <div class="form-group row">
					<label for="permanent_address_1" class="col-sm-4 col-form-label"><span style="color:red"></span>Contact Address</label>
					<div class="col-sm-8">
						<textarea  rows="5" required="requiered" type="text" class="form-control" name="permanent_address_1" id="permanent_address_1" maxlength="1000" placeholder="Contact Address"><?php echo $user_data['permanent_address_1'] ?></textarea>
					</div>
				</div>

		         <div class="form-group row">
					<label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Image Upload</label>
					<div class="col-sm-8">
						 <input type="file" name="photo" value="">
					</div>
				</div>
				
                  </div>

                <!-- /.form-group -->
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
				
				
            <!-- /.row -->

           
            <!-- /.row -->
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
  </script>
  <script src="<?php echo base_url('../assets/plugins/select2/js/select2.full.min.js') ?>"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
	
	 $('#district').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "users/get_sub_Taluk", 
			data: {district: cat1_val}, group_id:<?php echo $group_id; ?>},
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
			url: "<?php echo base_url();?>" + "users/get_sub_PresidentLimit", 
			data: {taluk: cat1_val, group_id:<?php echo $group_id; ?>},
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
    });
</script>	