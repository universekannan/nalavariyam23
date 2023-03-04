<div class="content-wrapper">
  
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Creates Details </h3>
              </div>
              <!-- /.card-header -->
                        <div class="card-body">

			    <form action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			               <?php echo validation_errors(); ?>

            <div class="row">
			<div class="col-md-6">
				
				<div class="form-group row">
					<label for="school_name" class="col-sm-4 col-form-label"><span style="color:red"></span>School name</label>
					<div class="col-sm-8">
						<input disabled value="<?php echo $family_member_data['school_name'] ?>"  type="text" class="form-control" name="school_name" maxlength="50" placeholder="School name">
					</div>
				</div>
				  <div class="form-group row">
					<label for="school_address" class="col-sm-4 col-form-label"><span style="color:red"></span>School Name Address</label>
					<div class="col-sm-8">
						<textarea disabled rows="5" type="text" class="form-control" name="school_address" id="school_address" maxlength="1000" placeholder="School Name Address"> <?php echo $family_member_data['school_address'] ?></textarea>
					</div>
				</div>					   
                <div class="form-group row">
					<label for="certificate_issued_date" class="col-sm-4 col-form-label"><span style="color:red"></span>Certificate Issued Date</label>
					<div class="col-sm-8">
						<input disabled value="<?php echo $family_member_data['certificate_issued_date'] ?>"  type="date" class="form-control" name="certificate_issued_date" maxlength="50">
					</div>
				</div>
				

				  <div class="form-group row">
					<label for="bonafied_certificate" class="col-sm-4 col-form-label"><span style="color:red"></span>Bonafied Certificate</label>

					<div class="col-sm-8 custom-file">
						<input disabled type="file" class="custom-file-input" name="bonafied_certificate" id="registeration_book">
				    <label class="custom-file-label" for="bonafied_certificate">Choose file</label>
					</div>
				</div>
              </div>
			 <div class="col-md-6">
					 <div class="form-group row">
					<label for="registeration_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Registeration Book</label>
					<div class="col-sm-4">
						<input  value="<?php echo $family_member_data['registeration_no'] ?>"  required="required" type="text" class="form-control" name="registeration_no" id="registeration_no" maxlength="12" placeholder="Registeration Book">
					</div>
					<div class="col-sm-4 custom-file">
						<input disabled type="file" class="custom-file-input" name="registeration_book_file" id="registeration_book_file">
				    <label class="custom-file-label" for="registeration_book_file">Choose file</label>
					</div>
				</div>	
				<div class="form-group row">
					<label for="registeration_date" class="col-sm-4 col-form-label"><span style="color:red"></span>Registeration Date</label>
					<div class="col-sm-8">
						<input  value="<?php echo $family_member_data['registeration_date'] ?>"  required="required" type="date" class="form-control" name="registeration_date" id="registeration_date" maxlength="12" placeholder="Registeration Datek">
					</div>
				</div>	
				
				
				   <div class="form-group row">
					<label for="studying_course" class="col-sm-4 col-form-label"><span style="color:red"></span>Studying Course</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="studying_course" id="studying_course" style="width: 100%;" required="required">
							<option value="">Select Course</option>
							<option value="10th pass">10th pass</option>
							<option value="12th pass">12th pass</option>
						</select>
					</div>
				  </div>
				<div class="form-group row">
					<label for="academic_year" class="col-sm-4 col-form-label"><span style="color:red"></span> Academic Year</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="academic_year" id="academic_year" style="width: 100%;" required="required">
							<option value="2022-2023">2022-2023</option>
							<option value="2023-2024">2023-2024</option>
							<option value="2024-2025">2024-2025</option>
							<option value="2025-2026">2025-2026</option>
							<option value="2026-2027">2026-2027</option>
						</select>
					</div>
				  </div>

				 
				<div class="form-group row">
					<label for="book_entry_page" class="col-sm-4 col-form-label"><span style="color:red"></span>Bank pass Book entry Page</label>

					<div class="col-sm-8 custom-file">
						<input disabled type="file" class="custom-file-input" name="bank_entry_file" id="bank_entry_file">
				    <label class="custom-file-label" for="bank_entry_file">Choose file</label>
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
		   