 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
<?php if($this->session->userdata('group_id') == '4'){ ?>
                <h3 class="card-title">Add Taluk Presidents  </h3>
<?php } if($this->session->userdata('group_id') == '5'){ ?>
                <h3 class="card-title">Add Taluk Secretarys  </h3>
<?php } ?>          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <form action="<?php base_url('users/addtalukusers') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-6">
			<select hidden="hidden" name="idname"  >
				<?php $data = $this->model_users->getDistrict();
				   foreach($data as $row){ ?>
                   <option value="<?php echo $row['idname'] ?> <?php if($user_data['group_id'] == $v['id']) { echo 'selected'; } ?>"></option>
				<?php } ?>
		    </select>			<div class="form-group row">
		<label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="dist_id" id="cat1" style="width: 100%;" required="required">
			  <option value="">Select District Name</option>
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
            <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;" required="required">
			<option value="">Select Taluk</option>
		 </select>
		</div>
	</div>
             
<?php  if($this->session->userdata('group_id') == '2'){ ?>
       <input type="hidden" name="group_id" value="6"/>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
       <input type="hidden" name="group_id" value="7"/>
<?php } if($this->session->userdata('group_id') == '4'){ ?>
       <input type="hidden" name="group_id" value="6"/>
<?php } if($this->session->userdata('group_id') == '5'){ ?>
       <input type="hidden" name="group_id" value="7"/>
<?php } if($this->session->userdata('group_id') == '6'){ ?>
       <input type="hidden" name="group_id" value="6"/>
<?php } if($this->session->userdata('group_id') == '7'){ ?>
       <input type="hidden" name="group_id" value="7"/>
<?php } if($this->session->userdata('group_id') == '8'){ ?>
       <input type="hidden" name="group_id" value="8"/>
<?php } ?>
       <input type="hidden" name="status" value="Inactive"/>

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
						<span id="password" style="color:red"></span>
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



       
	  $('#cat1').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "users/get_sub_TalukLimit", 
			data: {cat1: cat1_val, group_id:<?php echo $group_id; ?>},
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
			url: "<?php echo base_url();?>" + "users/get_sub_cat3", 
			data: {taluk: cat1_val},
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#cat3').empty().append(data);
				}
			});// you have missed this bracket
			return false;

		}
			
		});

    });

  </script>