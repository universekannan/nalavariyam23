 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Customers  </h1>
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
            <h3 class="card-title">Add Customers</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                            <form action="<?php echo base_url();?>customers/create" method="post" enctype="multipart/form-data" class="form-horizontal">

			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-6">
              	
<?php if($this->session->userdata('group_id') == '1'){ ?>
 
<?php } if($this->session->userdata('group_id') == '2'){ ?>
      <input type="hidden" name="dist_id" value="<?php echo $this->session->userdata('dist_id'); ?>"/>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
      <input type="hidden" name="dist_id" value="<?php echo $this->session->userdata('dist_id'); ?>"/>
<?php } ?>

			 
				
				<div class="form-group row">
					<label for="full_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Full Name">
					</div>
				</div>
				 				              
			  
                  
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Email ID </label>
					<div class="col-sm-8">
						<input  required="requiered" type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email ID">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="phone" id="phone" maxlength="50" placeholder="Mobile Number">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-4 col-form-label"><span style="color:red"></span>Address</label>
					<div class="col-sm-8">
						<input  required="requiered" type="address" class="form-control" 
						name="address" id="address" maxlength="50" placeholder="address">
						
					</div>
				</div>
				<div class="form-group row">
					<label for="cpassword" class="col-sm-4 col-form-label"><span style="color:red"></span>Work1</label>
					<div class="col-sm-8">
						 <select title="Select Work1" name="work1" class="form-control" id="country-name">      
                    <option value="">Select Work1</option>
                    <?php
                    foreach ($geCountries as $key => $element) {
                        echo '<option value="'.$element['country_id'].'">'.$element['country_name'].'</option>';
                    }
                    ?>
                </select>
				</div>
				</div>
				<div class="form-group row">
					<label for="cpassword" class="col-sm-4 col-form-label"><span style="color:red"></span>Work2</label>
					<div class="col-sm-8">
						   <select title="Select Work2" name="work2" class="form-control" id="work2">      
                    <option value="">Select Work2</option>
                </select>
				</div>
				</div>
				<div class="form-group row">
					<label for="cpassword" class="col-sm-4 col-form-label"><span style="color:red"></span>Work3</label>
					<div class="col-sm-8">
						   <select title="Select Work3" name="work3" class="form-control" id="work3">      
                    <option value="">Select Work3</option>
                </select>
				</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhar Card</label>
					<div class="col-sm-8">
			<input  required="requiered" type="file" class="form-control" name="adhar" id="adhar">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-4 col-form-label"><span style="color:red"></span>Pan Card</label>
					<div class="col-sm-8">
		      <input  required="requiered" type="file" class="form-control" name="pancard" id="pancard">
						
						
					</div>
				</div>
                  </div>               
              </div>
            </div>
        
         <div class="form-group row">
					<div class="col-md-12 text-center">
						
<input class="btn btn-info" type="submit" name="submit" value="Save" />					</div>
					</div>
				</div>	
				
				
           
          </div>
       
        </div>
        
      </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#UsersCreate").addClass('active');
    });
  </script>
<script>var baseurl = "<?php echo site_url(); ?>";</script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/jquery.min.js"></script>
<script src="<?php echo site_url(); ?>assets/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets//bootstrap/bootstrap.min.js"></script>
<script src="<?php echo site_url(); ?>assets/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/common.js"></script>		
