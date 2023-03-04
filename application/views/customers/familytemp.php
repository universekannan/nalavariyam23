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
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Particulars of the family members / குடும்ப உறுப்பினர்களின் விவரங்கள்  </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>Member Name</th>
                  <th>Aadhaar No</th>
                  <th>Relationship</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->family_member_name; ?></td>
	  <td><?php echo $row->aadhaar_no; ?></td>
	  <td><?php echo $row->family_relationship; ?></td>

          <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateUser', $user_permission)): ?>
                          <a href="<?php echo base_url('customers/editfamily/'.$row->id) ?>/<?php echo $row->customer_id; ?>" class="btn btn-info" title="Edit">  <i class="fa fa-edit"> Edit</i> </a>
		                  <a href="<?php echo base_url('customers/nominee/'.$row->customer_id) ?>/<?php echo $row->id; ?>" class="btn btn-info" title="Edit">  <i class="fa fa-plus"> Nominee </i> </a>
                          <?php endif; ?>
<?php $Family_id = $row->id; ?>
<?php $sql="Select * from payment where ad_info2 = $Family_id order by id";    
$query = $this->db->query($sql);
$data1 =  $query->row();
    if($data1){ ?>
      <a href="" class="btn btn-danger" title="Delete not Baseful"><i class="fa fa-trash"> Delete</i></a>
<?php } else{ ?>
      <a href="<?php echo base_url('customers/delete/'.$row->id) ?>" class="btn btn-info" title="Delete"><i class="fa fa-trash"> Delete</i></a>
<?php } ?>

                        </td>
                      <?php endif; ?>
                      </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>                <div id="accordion">
                  <div class="card card-primary">
                   
					 <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
					
	    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add Family Member</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
              <form action="<?php base_url('customers/family/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row">
		  
			<div class="col-md-6">           

				<div class="form-group row">
					<label for="family_member_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Member Name</label>
					<div class="col-sm-8">
						<input  required="required" type="text" class="form-control" name="family_member_name" id="family_member_name" maxlength="50" placeholder="Member Full Name">
					</div>
				</div>
				 <div class="form-group row">
					<label for="family_relationship" class="col-sm-4 col-form-label"><span style="color:red"></span>Relationship</label>
					<div class="col-sm-8">
						<select class="form-control select2bs4" name="family_relationship" id="family_relationship" style="width: 100%;" required="required">
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
				  <div class="col-md-6">    
				  <div class="form-group row">
					<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
					<div class="col-sm-8">
						<input required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
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
						name="submit" value="Save"/>


					</div>
				</div>	
</form>
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

