<div class="content-wrapper">
  
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Renewal Details </h3>
              </div>
              <!-- /.card-header -->
                        <div class="card-body">

			    <form action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-3">
              </div>
			 <div class="col-md-6">
			 <div class="form-group row">
					<label for="studying_course" class="col-sm-4 col-form-label"><span style="color:red"></span>Nominee Name</label>
					<div class="col-sm-7">
						<input readonly value="<?php echo $user_data['nominee_name'] ?>"  required="required" type="text" class="form-control" name="nominee_name" id="nominee_name" maxlength="12" placeholder="Go To Pulse Butten Combelsery">
					</div>
					<div class="col-sm-1">
					   <a href="<?php echo base_url('customers/family') ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-primary btn-sm float-sm-right" title="Go To Famely"><i class="fas fa-plus"> </i> </a>
					</div>
				</div>	
					 <div class="form-group row">
					<label for="registeration_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Registeration Number</label>
					<div class="col-sm-8">
						<input  value="<?php echo $user_data['registeration_no'] ?>"  required="required" type="text" class="form-control" name="registeration_no" id="registeration_no" maxlength="12" placeholder="Registeration Number">
					</div>
				</div>	
				<div class="form-group row">
					<label for="registeration_date" class="col-sm-4 col-form-label"><span style="color:red"></span>Registeration Date</label>
					<div class="col-sm-8">
						<input  value="<?php echo $user_data['registeration_date'] ?>"  required="required" type="date" class="form-control" name="registeration_date" id="registeration_date" maxlength="12" placeholder="Registeration Date">
					</div>
				</div>	
				<div class="form-group row">
					<label for="studying_course" class="col-sm-4 col-form-label"><span style="color:red"></span>Other Old Union Reg No</label>
					<div class="col-sm-8">
						<input  value="<?php echo $user_data['other_union_reg_no'] ?>"  required="required" type="text" class="form-control" name="other_union_reg_no" id="other_union_reg_no" maxlength="12" placeholder="Enter Old Union Reg No">
					</div>
				</div>	
				
				
              </div>
			  <div class="col-md-3">
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
          </div>
       </div>
       </div>
    </section>
    </section>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerCreate").addClass('active');
    });
  </script>
<script>
$(function () {
  bsregisteration_bookInput.init();
  bsbook_entry_pageInput.init();
});


</script>
		   