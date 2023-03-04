
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title">Add Customer Details</h3>
                <br>
               <?php echo validation_errors(); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
               <div id="accordion">
                  <div class="card card-primary">
                     
                     <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <form action="<?php base_url('freeuser/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <div class="row">
                                 <div class="col-md-6">
                                    <?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ ?>
                                    <input type="hidden" name="group_id" value="14"/>
                                    <?php } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ ?>
                                    <input type="hidden" name="group_id" value="15"/>
                                    <?php } ?>
                                    <input type="hidden" name="dist_id" value="<?php echo $this->session->userdata('dist_id'); ?>"/>
									 <div class="form-group row">
                                       <label for="relative_name_tamil" class="col-sm-4 col-form-label"><span style="color:red"></span>Full Name  </label>
                                       <div class="col-sm-8">
                                          <input  required="required" type="text" class="form-control" name="full_name_tamil" id="full_name_tamil" maxlength="50" placeholder="Enter Full Name">
                                       </div>  
									   </div>
									<div class="form-group row">
                                       <label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender  </label>
                                       <div class="col-sm-8 custom-file">
                                          <select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
                                             <option value="">Select Gender</option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                             <option value="Other">Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="phone" class="col-sm-4 col-form-label"><span style="color:red"></span>Mobile Number</label>
                                       <div class="col-sm-8">
                                          <input required="required" type="number" class="form-control" name="phone" id="phone" maxlength="10" placeholder="Enter Mobile Number">
                                       </div>
                                    </div>
									   <div class="form-group row">
                                       <label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
                                       <div class="col-sm-8">
                                          <input  required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
                                       </div>
                                    </div>
                                   
                                 </div>
                                 <div class="col-md-6">
                                    
                                    <?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ ?>
                                    <div class="form-group row">
                                       <label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="dist_id" id="district" style="width: 100%;" required="required">
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
                                    <div class="form-group row">
                                       <label for="panchayath_id" class="col-sm-4 col-form-label"><span style="color:red"></span> VAO</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="panchayath_id" id="panchayath" style="width: 100%;" required="required">
                                             <option value="">Select Village</option>
                                          </select>
                                       </div>
                                    </div>
                                    <?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9') ||  ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){ ?>
                                    <div class="form-group row">
                                       <label for="dist_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="dist_id" id="district" style="width: 100%;" required="required">
                                             <option value="">Select District Name</option>
                                             <option value="<?php echo $district_row['id'] ?>"> <?php echo $district_row['district_name'] ?>
                                             </option>
                                          </select>
                                       </div>
                                    </div>
 <?php  if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){ ?>
                                     <div class="form-group row">
                                       <label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;" required="required">
                                             <option value="">Select Taluk</option>
                                          </select>
                                       </div>
                                    </div>
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){ ?>
                                   <div class="form-group row">
                                       <label for="taluk_id" class="col-sm-4 col-form-label"><span style="color:red"></span> Taluk</label>
                                       <div class="col-sm-8">
                                         <select class="form-control select2bs4" name="taluk_id" id="taluk" style="width: 100%;" required="required">
                                             <option value="">Select Taluk</option>
                                          </select>
                                       </div>
                                    </div>
<?php } ?>
                                    <div class="form-group row">
                                       <label for="panchayath_id" class="col-sm-4 col-form-label"><span style="color:red"></span> VAO</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="panchayath_id" id="panchayath" style="width: 100%;" required="required">
                                             <option value="">Select Village</option>
                                          </select>
                                       </div>
                                    </div>
                                    <?php }	?>
                                    <div class="form-group row">
                                       <label for="followdate" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Date</label>
                                       <div class="col-sm-8">
                                          <input value="<?php echo $from_date =date('Y-m-d',strtotime('+ 15 day')); ?>" required="required" type="date" class="form-control" name="followdate" id="followdate" maxlength="50" placeholder="">
                                       </div>

                                    </div>
                                    <div class="form-group row">
                                       <label for="follow_message" class="col-sm-4 col-form-label"><span style="color:red"></span>Follow Up Message</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="follow_message" id="follow_message" style="width: 100%;" required="required">
                                             <option value="New Application">New Application</option>
                                             <option value="Renewal">Renewal</option>
                                             <option value="Resubmit">Resubmit</option>
                                             <option value="6th study">6th study</option>
                                             <option value="7th study">7th study</option>
                                             <option value="8th study">8th study</option>
                                             <option value="9th study">9th study</option>
                                             <option value="10th study">10th study</option>
                                             <option value="11th study">11th study</option>
                                             <option value="12th study">12th study</option>
                                             <option value="Ug 1st year">Ug 1st year</option>
                                             <option value="Ug 2nd year">Ug 2nd year</option>
                                             <option value="Ug 3rd year">Ug 3rd year</option>
                                             <option value="Ug 4th year">Ug 4th year</option>
                                             <option value="Ug 5th year">Ug 5th year</option>
                                             <option value="Pg 1st year">Pg 1st year</option>
                                             <option value="Pg 2nd year">Pg 2nd year</option>
                                             <option value="Pg 3rd year">Pg 3rd year</option>
                                             <option value="Marriage">Marriage</option>
                                             <option value="Maternity">Maternity</option>
                                             <option value="Pension">Pension</option>
                                             <option value="Life Certificate">Life Certificate</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
                                 </div>
                              </div>
                           </form>
                           <!-- /.col -->
                        </div>
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
   
   
   $('#district').on('change', function() { 
        
   cat1_val = $(this).find(":selected").val();
   
   if(cat1_val >0){
   
   $.ajax({
   type: "POST",
   url: "<?php echo base_url();?>" + "freeuser/get_sub_Taluk", 
   data: {district: cat1_val},
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
   url: "<?php echo base_url();?>" + "freeuser/get_sub_President", 
   data: {taluk: cat1_val},
   
   dataType: "text",  
   cache:false,
   success: 
   	function(data){
   		$('#panchayath').empty().append(data);
   	}
   });// you have missed this bracket
   return false;
   
   }
   
   }); 
    
</script>
<script>
   $(function () {
     bsCustomFileInput.init();
     bsAadhaarFileInput.init();
     bsCommunityFileInput.init();
     bsdob_document_fileInput.init();
     bsrationfileInput.init();
     bsprphotoInput.init();
   });
</script>
<script>
   function sync() {
     var phone = document.getElementById('phone');
     var hourss = document.getElementById('hourss');
     var email = document.getElementById('email');
     var password = document.getElementById('password');
     email.value = phone.value + hourss.value;
     password.value = phone.value;
   }
</script>
<script>  
   function ageCalculator() {  
       var userinput = document.getElementById("DOB").value;  
       var dob = new Date(userinput);  
       if(userinput==null || userinput=='') {  
         document.getElementById("message").innerHTML = "**Choose a date please!";    
         return false;   
       } else {  
         
       //calculate month difference from current date in time  
       var month_diff = Date.now() - dob.getTime();  
         
       //convert the calculated difference in date format  
       var age_dt = new Date(month_diff);   
         
       //extract year from date      
       var year = age_dt.getUTCFullYear();  
         
       //now calculate the age of the user  
       var age = Math.abs(year - 1970);  
         
       //display the calculated age  
       return document.getElementById("result").innerHTML =    
                "" + age + "";  
       }  
   }  
</script>  
<script>
   $('#dob').datepicker({
       onSelect: function(value, ui) {
           var today = new Date(), 
               age = today.getFullYear() - ui.selectedYear;
           $('#age').val(age);
       },
       maxDate: '+0d',
       changeMonth: true,
       changeYear: true,
        yearRange: '1950:2030',
   });
   
</script>