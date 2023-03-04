<div class="content-wrapper">
  <div class="card-header">
               <h3 class="card-title">Search Customer Details</h3>
               </br>
               <?php echo validation_errors(); ?>
            </div>   <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
          
            <!-- /.card-header -->
            <div class="card-body">
               <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
               <div id="accordion">
                  <div class="card card-primary">
                     <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <form action="result" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <div class="row">
                                 <div class="col-md-3"></div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
                                       <div class="col-sm-8">
                                          <input  required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
                                       </div>
                                    </div>
                                  </div>
                                   <div class="col-md-3"></div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info" type="submit" name="submit" value="Search!"/>
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
   url: "<?php echo base_url();?>" + "customers/get_sub_Taluk", 
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
   url: "<?php echo base_url();?>" + "customers/get_sub_President", 
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