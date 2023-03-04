
<div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
		 <div class="card-header">
                <h3 class="card-title">Add Customer Details</h3>
				</br>
			<?php echo validation_errors(); ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                          Customer Basic details 
                        </a>
                      </h4>
                    </div>
                   
                  </div>
                 
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="">
                         Work Details
                        </a>
                      </h4>
                    </div>
					 <div id="" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
					
              <form action="<?php base_url('users/family/') ?>" method="post">
		  <div class="row">

	<div class="col-md-12">           
           <div class="form-group row">
		<label for="work_one_id" class="col-sm-4 col-form-label"><span style="color:red"></span> வாரியம்</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="work_one_id" id="work_one" style="width: 100%;" required="required">
			<option value="<?php echo $user_data['work_one_id'] ?>"><?php echo $user_data['work_one_name'] ?></option>

			   <?php foreach($work_one as $val) { ?> 
				<option value="<?php echo $val['id'];?>">
				  <?php echo $val['work_one_name'];?>
			    </option>  
			  <?php } ?>
		    </select>
		</div>
	</div>	<div class="form-group row">
		<label for="work_two_id" class="col-sm-4 col-form-label"><span style="color:red"></span> துணை வாரியம்</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="work_two_id" id="work_two" style="width: 100%;" required="required">
			<option value="<?php echo $user_data['work_two_id'] ?>"> <?php echo $user_data['work_two_name'] ?></option>
		 </select>
		</div>
	</div>
         <div class="form-group row">
		<label for="work_there_id" class="col-sm-4 col-form-label"><span style="color:red"></span> தொழிலின் தன்மை</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="work_there_id" id="work_there" style="width: 100%;" required="required">
			<option value="<?php echo $user_data['work_there_id'] ?>"><?php echo $user_data['work_there_name'] ?></option>
		 </select>
		</div>
	</div>	      
	
				  <div class="form-group row">
					<label for="working_status" class="col-sm-4 col-form-label"><span style="color:red"></span>வேலையின் இயல்பு</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="working_status" id="working_status" style="width: 100%;" required="required">
						
							<option value="<?php echo $user_data['working_status'] ?>"><?php echo $user_data['working_status'] ?></option>
						   <option value="Employed / வேலை செய்பவர்">Employed / வேலை செய்பவர்</option>
						   <option value="Self Employed / சுய தொழில் செய்பவர்">Self Employed / சுய தொழில் செய்பவர்</option>
						</select>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="employment" class="col-sm-4 col-form-label"><span style="color:red"></span>பணிசெய்யும் காலம் </label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="employment" id="employment" style="width: 100%;" required="required">
							<option value="<?php echo $user_data['employment'] ?>"><?php echo $user_data['employment'] ?></option>
						   <option value="4 ஆண்டுகளாக">4  ஆண்டுகளாக</option>
						   <option value="5 ஆண்டுகளாக">5 ஆண்டுகளாக</option>
						   <option value="6 ஆண்டுகளாக">6 ஆண்டுகளாக</option>
						   <option value="7 ஆண்டுகளாக">7 ஆண்டுகளாக</option>
						   <option value="8 ஆண்டுகளாக">8 ஆண்டுகளாக</option>
						   <option value="11 ஆண்டுகளாக">11 ஆண்டுகளாக</option>
						   <option value="14 ஆண்டுகளாக">14 ஆண்டுகளாக</option>
						   <option value="16 ஆண்டுகளாக">16 ஆண்டுகளாக</option>
						   <option value="17 ஆண்டுகளாக">17 ஆண்டுகளாக</option>
						   <option value="18 ஆண்டுகளாக">18 ஆண்டுகளாக</option>
						   <option value="21 ஆண்டுகளாக">21 ஆண்டுகளாக</option>

						</select>
					</div>
				  </div>

		     </div>
              </div>
            </div>
      <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save"/>
		              <!--   <a href="<?php echo base_url('customers/bankdetails/') ?><?php echo $this->uri->segment(3); ?>" class="btn btn-info" title="Edit">  <i class="fa fa-plus"> Bank Details </i> </a>-->

					</div>
				</div>	
</form>
                    </div>
                   </div>
                   <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        Family Details
                        </a>
                      </h4>
                    </div>
                   </div>
					<div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
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
		
 $('#work_one').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "customers/get_sub_work_two", 
			data: {work_one: cat1_val},
			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#work_two').empty().append(data);
				}
			});// you have missed this bracket
			return false;

		}
			
		});


		$('#work_two').on('change', function() { 
        
		cat1_val = $(this).find(":selected").val();

		if(cat1_val >0){

		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>" + "customers/get_sub_work_there", 
			data: {work_two: cat1_val},

			dataType: "text",  
			cache:false,
			success: 
				function(data){
					$('#work_there').empty().append(data);
				}
			});// you have missed this bracket
			return false;

		}
			
		}); 
		
  </script>


