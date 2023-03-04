<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Customer Bank Details  </h1>
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
                <h3 class="card-title">Edit Customer Bank Details</h3>
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
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        Family Details
                        </a>
                      </h4>
                    </div>
					 <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
					
					
              <form action="<?php base_url('users/family/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row">
		  
			<div class="col-md-12">           
				 <div class="form-group row">
					<label for="bank_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Bank Name / வங்கியின் பெயர்</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="bank_name" id="bank_name" style="width: 100%;" required="required">
							<option value="<?php echo $user_data['bank_name'] ?>
							<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>
							<option value="BNP Paribas">BNP Paribas</option>
							<option value="Bank of Baroda">Bank of Baroda</option>
							<option value="Bank of India">Bank of India</option>
							<option value="Bank of Maharashtra">Bank of Maharashtra</option>
							<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>
							<option value="Bank of Ceylon">Bank of Ceylon</option>
							<option value="Bank of America">Bank of America</option>
							<option value="BANK OF TOKYO MITSUBISHI LIMITED">BANK OF TOKYO MITSUBISHI LIMITED</option>
							<option value="BHARATIYA MAHILA BANK LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
							<option value="CANARA BANK">CANARA BANK</option>
							<option value="CATHOLIC SYRIAN BANK LIMITED">CATHOLIC SYRIAN BANK LIMITED</option>
							<option value="Central Bank of India">Central Bank of India</option>
							<option value="CITI BANK">CITI BANK</option>
							<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>
							<option value="Credit Agricole Corporate & Investment Bank CALYON BANK">Credit Agricole Corporate & Investment Bank CALYON BANK</option>
							<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>
							<option value="Deutsche Bank">Deutsche Bank</option>
							<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>
							<option value="DEVELOPMENT BANK OF SINGAPORE">DEVELOPMENT BANK OF SINGAPORE</option>
							<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>
							<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
							<option value="HSBC Ltd">HSBC Ltd</option>
							<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>
							<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>
							<option value="India Post Payments Bank">India Post Payments Bank</option>
							<option value="Indian Bank">Indian Bank</option>
							<option value="Indian Overseas Bank">Indian Overseas Bank</option>
							<option value="INDUSIND BANK">INDUSIND BANK</option>
							<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>
							<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>
							<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>
							<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
							<option value="Lakshmi Vilas Bank Ltd.">Lakshmi Vilas Bank Ltd.</option>
							<option value="MIZUHO CORPORATE BANK LIMITED">MIZUHO CORPORATE BANK LIMITED</option>
							<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
							<option value="Punjab National Bank">Punjab National Bank</option>
							<option value="RATNAKAR BANK LIMITED">RATNAKAR BANK LIMITED</option>
							<option value="Shinhan Bank">Shinhan Bank</option>
							<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>
							<option value="Standard Chartered Bank">Standard Chartered Bank</option>
							<option value="State Bank of India">State Bank of India</option>
							<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
							<option value="Tamil Nadu Grama Bank">Tamil Nadu Grama Bank</option>
							<option value="THE COSMOS CO OPERATIVE BANK LIMITED">THE COSMOS CO OPERATIVE BANK LIMITED</option>
							<option value="THE ROYAL BANK OF SCOTLAND N V">THE ROYAL BANK OF SCOTLAND N V</option>
							<option value="THE SHAMRAO VITHAL COOPERATIVE BANK">THE SHAMRAO VITHAL COOPERATIVE BANK</option>
							<option value="THE TAMILNADU STATE APEX COOPERATIVE BANK">THE TAMILNADU STATE APEX COOPERATIVE BANK</option>
							<option value="UCO Bank">UCO Bank</option>
							<option value="Union Bank of India">Union Bank of India</option>
							<option value="Woori Bank">Woori Bank</option>
							<option value="YES BANK">YES BANK</option>
						</select>
					</div>
				  </div>
				<div class="form-group row">
					<label for="branch_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Branch Name / கிளையின் பெயர்</label>
						<div class="col-sm-8">
						<input  required="required" type="text" class="form-control" name="branch_name" id="branch_name" maxlength="50" placeholder="Branch Name / கிளையின் பெயர்" value="<?php echo $user_data['branch_name'] ?>">
						</div>
				</div>
		
				<div class="form-group row">
					<label for="account_number" class="col-sm-4 col-form-label"><span style="color:red"></span>Account Number / கணக்கு எண்</label>
					<div class="col-sm-8">
						<input  required="required" type="number" class="form-control" name="account_number" id="account_number" maxlength="50" placeholder="Account Number / கணக்கு எண்" value="<?php echo $user_data['account_number'] ?>">
					</div>	
				</div>

				<div class="form-group row">
					<label for="r_account_number" class="col-sm-4 col-form-label"><span style="color:red"></span>Re-Enter Account Number / கணக்கு எண்</label>
					<div class="col-sm-8">
						<input  required="required" type="number" class="form-control" name="r_account_number" id="r_account_number" maxlength="50" placeholder="Re-Account Number / கணக்கு எண்" value="<?php echo $user_data['r_account_number'] ?>">
					</div>
				</div>	
				<div class="form-group row">
					<label for="ifsc_code" class="col-sm-4 col-form-label"><span style="color:red"></span>IFSC Code / IFSC குறியீடு</label>
					<div class="col-sm-8">
						<input  required="required" type="text" class="form-control" name="ifsc_code" id="ifsc_code" maxlength="50" placeholder="IFSC Code / IFSC குறியீடு்" value="<?php echo $user_data['ifsc_code'] ?>">
					</div>
				</div>	
				<div class="form-group row">
					<label for="micr_code" class="col-sm-4 col-form-label"><span style="color:red"></span>MICR Code / MICR குறியீடு</label>
					<div class="col-sm-8">
						<input  required="required" type="text" class="form-control" name="micr_code" id="micr_code" maxlength="50" placeholder="MICR Code / MICR குறியீடு்" value="<?php echo $user_data['micr_code'] ?>">
					</div>
				</div>	
				
				<div class="form-group row">
					<label for="bank_passbook_file" class="col-sm-4 col-form-label"><span style="color:red"></span>Upload Bank Passbook Front Page </label>
					<div class="col-sm-8 custom-file">
						<input type="file" class="custom-file-input" name="bank_passbook_file" id="bank_passbook_file">
				    <label class="custom-file-label" for="bank_passbook_file">வங்கி கணக்கு புத்தகத்தின் முதல் பக்கத்தை பதிவேற்றம் செய்யவும் ( Original/அசல்) - Choose file</label> 
					</div>
				</div>
		      </div>
		      </div>
		      </div>
        		
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info" 	type="submit"
						name="submit" value="Save"/>
					</div>

				</div>	
</form>
                    </div>
                   </div>
				   <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                         Work Details
                        </a>
                      </h4>
                    </div>
                  </div>
					<div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        Union Details
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
  </script>
<script>
$(function () {
  bsbank_passbook_fileInput.init();
});
</script>

