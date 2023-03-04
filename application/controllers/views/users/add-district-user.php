 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <h3 class="card-title">Add District Presidents  </h3>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <h3 class="card-title">Add District Secretarys  </h3>
<?php } ?>          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <form action="<?php base_url('users/adddistrictuser') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-6">
<?php  if($this->session->userdata('group_id') == '2'){ ?>
       <input type="hidden" name="group_id" value="4"/>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
       <input type="hidden" name="group_id" value="5"/>
<?php } ?>
       <input type="hidden" name="status" value="Active"/>

 <div class="form-group row">
	<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District</label>
	<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" style="width: 100%;" required="required">
			       <option value="">Select District Name</option>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
				   $data = $this->model_users->getDistrictLimit();
				   foreach($data as $row)
				  {  
				  echo '<option value="'.$row['id'].'">'.$row['district_name'].'</option>';
				  }
}
	  ?>
		 </select>
	</div>
</div>	  
				<div class="form-group row">
					<label for="full_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Full Name">
					</div>
				</div>
	    <div class="form-group row">
					<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender </label>
					<div class="col-sm-8">
						<div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
					</div>
				</div>
				<div class="form-group row">
					<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="50" placeholder="Aadhaar No">
					</div>
				</div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="phone" id="phone" maxlength="50" placeholder="Mobile Number">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Email ID </label>
					<div class="col-sm-8">
						<input  required="requiered" type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email ID">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-4 col-form-label"><span style="color:red"></span>Password</label>
					<div class="col-sm-8">
						<input  required="requiered" type="password" class="form-control" name="password" id="password" maxlength="50" placeholder="Password">
						<span id="dupVNO" style="color:red"></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="cpassword" class="col-sm-4 col-form-label"><span style="color:red"></span>Confirm password</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="cpassword" id="cpassword" maxlength="50" placeholder="Confirm password">
					</div>
				</div>
				
                  </div>                <!-- 
              </div>
              <!-- /.col -->
            </div>
        
         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save"/>
                        <a href="{{ route('vehicle.index') }}" class="btn btn-info">Back</a>
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