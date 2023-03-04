 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Change Password  </h1>
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
            <h3 class="card-title">Change Password</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php if(validation_errors() !== ''): ?>
              
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
              
            <?php endif; ?>
              <?php
				if($this->session->flashdata('msg')){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<?php
				}
			?>
            <?php echo form_open(base_url('Auth/change_pwd'));  ?> 
              <div class="form-group">
                <label for="password" class="col-sm-6 control-label">New Password</label>

              <div class="input-group mb-2">
                  <input type="text" name="password" class="form-control" id="password" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="confirm_pwd" class="col-sm-6 control-label">Confirm Password</label>

               <div class="input-group mb-2">
                  <input type="text" name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="">
                </div>
              </div>

              <div class="form-group">
               <div class="input-group mb-3">
                  <input type="submit" name="submit" value="Change Password" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
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
      $("#Profile").addClass('menu-open');
      $("#Profiles").addClass('active');
      $("#Password").addClass('active');
    });
  </script>