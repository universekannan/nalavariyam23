<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit User status</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
			<form action="<?php base_url('users/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

			<?php echo validation_errors(); ?>
            <div class="row">
              <div class="col-md-3">
			  </div>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ ?>
              <div class="col-md-6">
			  <div class="form-group row">
					<label for="from_to_date" class="col-sm-4 col-form-label"><span style="color:red"></span>Expired Date</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['from_to_date'] ?>" required="required" type="date" class="form-control" name="from_to_date" id="from_to_date" maxlength="50" placeholder=" ">
					</div>
				</div>
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
                  </div>
<?php } ?>
               <div class="col-md-3">
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