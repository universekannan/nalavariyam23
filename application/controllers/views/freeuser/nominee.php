<div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
		 <div class="card-header">
                <h3 class="card-title">Add or Edit Nominee Details</h3>
				</br>
			<?php echo validation_errors(); ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
					 <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">

              <form action="<?php base_url('users/nominee/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row">
		  
			 <div class="col-md-6">   
				  <div class="form-group row">
					<label for="nominee_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Nominees Name</label>
					<div class="col-sm-8">
						<input value="<?php echo $user_data['family_member_name'] ?>" required="required" type="text" class="form-control" name="nominee_name" id="nominee_name" maxlength="50" placeholder="Nominees Full Name">
					</div>
				</div>
			
				  

              </div>
              <div class="col-md-6">
			 	<div class="form-group row">
					<label for="n_relationship" class="col-sm-4 col-form-label"><span style="color:red"></span>Relationship</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="n_relationship" id="n_relationship" style="width: 100%;" required="required">
					<option>****Select Relationship****</option>
					<option value="மகன்">மகன்</option>
					<option value="மகள்">மகள்</option>
					<option value="கணவர்">கணவர்</option>
					<option value="மனைவி">மனைவி</option>
					<option value="Brother">Brother</option>
					<option value="Brother-In-Law">Brother-In-Law</option>
					<option value="Daughter">Daughter</option>
					<option value="Father">Father</option>
					<option value="Father-In-Law">Father-In-Law</option>
					<option value="Grand Daughter">Grand Daughter</option>
					<option value="Grand Father">Grand Father</option>
					<option value="Grand Mother">Grand Mother</option>
					<option value="Grand Son">Grand Son</option>
					<option value="Husband">Husband</option>
					<option value="Mother">Mother</option>
					<option value="Mother-In-Law">Mother-In-Law</option>
					<option value="Nephew">Nephew</option>
					<option value="Niece">Niece</option>
					<option value="Sister">Sister</option>
					<option value="Sister-In-Law">Sister-In-Law</option>
					<option value="Son">Son</option>
					<option value="Spouse">Spouse</option>
					<option value="Wife">Wife</option>
					</select>
					</div>
				  </div>
			 
              </div>
				</div>
				
				
        		 <div class="callout callout-danger">
                  <h5>Notes :</h5>
                  <p>அணைத்து குடும்ப உறுப்பினர்களின் விடுதல் இன்றி ஏற்றவேண்டும். குடும்ப உறுப்பினர்களின் வயதின் அடிப்படையிலேயே படிப்பு மற்றும் திருமணத்திற்கான தொகை பெறப்படுகிறது, ஆகையால் பிறந்த தேதியை மனுவில் சரியாக குறிப்பிட வேண்டும்.</p>
          </div>
         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save or Update"/>
					</div>
					
				</div>	
</form>
                    </div>
                   </div>
				  
					<div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100 d-block w-100" data-toggle="collapse">
                        Work Details
                        </a>
                      </h4>
                    </div>
                  </div>
					<div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100 d-block w-100" data-toggle="collapse">
                        Bank Details
                        </a>
                      </h4>
                    </div>
                   </div>
                </div>
              </div>
          </div>
        </div>
      </div>
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
  bsCustomFileInput.init();
  bsn_documentInput.init();
});
</script>

