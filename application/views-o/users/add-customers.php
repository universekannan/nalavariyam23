 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ ?>
                <h3 class="card-title">Add Customer Details  </h3>
<?php } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ ?>
                <h3 class="card-title">Add Customer Details</h3>
<?php } ?>
       </div>
          <!-- /.card-header -->
          <div class="card-body">
              <form action="<?php base_url('users/addcenterusers') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-6">
			<select hidden="hidden" name="idname"  >
				<?php $data = $this->model_users->getDistrict();
				   foreach($data as $row){ ?>
                   <option value="<?php echo $row['idname'] ?> <?php if($user_data['group_id'] == $v['id']) { echo 'selected'; } ?>"></option>
				<?php } ?>
		    </select>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ ?>
       <input type="hidden" name="groups" value="14"/>
<?php } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ ?>
       <input type="hidden" name="groups" value="15"/>
<?php } ?>

       <input type="hidden" name="status" value="Active"/>
 
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
				<div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="phone" id="phone" maxlength="50" placeholder="Mobile Number">
					</div>
				</div>
              </div>
              <div class="col-md-6">
                 
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
				<div class="form-group row">
					<label for="followdate" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Date</label>
					<div class="col-sm-8">
						<input  required="requiered" type="date" class="form-control" name="followdate" id="followdate" maxlength="50" placeholder="">
					</div>
				</div>
				<div class="form-group row">
					<label for="follow_message" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Message</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="follow_message" id="follow_message" style="width: 100%;" required="required">
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