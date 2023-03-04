<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title">Add Notipikesan Details</h3>
               <br>
               <?php echo validation_errors(); ?>
            </div>
            <div class="card-body">
               <div id="accordion">
                  <div class="card card-primary">
                     <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <form action="<?php base_url('notipikesan/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <?php echo validation_errors(); ?>
                              <div class="row">
                                 <div class="col-md-6">
                                    <input type="hidden" name="status" value="1"/>
                                    <div class="form-group row">
                                       <label for="notipikesan_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Name  </label>
                                       <div class="col-sm-8">
                                          <input  required="required" type="text" class="form-control" name="notipikesan_name" id="notipikesan_name" maxlength="50" placeholder="Enter Notipikesan Name">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="from_date" class="col-sm-4 col-form-label"><span style="color:red"></span>From Date</label>
                                       <div class="col-sm-8">
                                          <input required="required" type="date" class="form-control" name="from_date" id="from_date" maxlength="10" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="to_date" class="col-sm-4 col-form-label"><span style="color:red"></span>To Date</label>
                                       <div class="col-sm-8">
                                          <input required="required" type="date" class="form-control" name="to_date" id="to_date" maxlength="10" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="user_type" class="col-sm-4 col-form-label"><span style="color:red"></span>User Type</label>
                                       <div class="col-sm-8">
                                          <select class="form-control select2bs4" name="user_type" id="user_type" style="width: 100%;" required="required">
											<option value="A">Superadmin</option> 
											<option value="B">State Users</option> 
											<option value="C">District Users</option> 
											<option value="D">Taluk Users</option> 
											<option value="E">Block Users</option> 
											<option value="F">Panchayath Users</option> 
											<option value="G">Center Users</option>
											<option value="I">Special User</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">

                                    <div class="form-group row">
                                       <label for="notipikesan_details" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Details</label>
                                       <div class="col-sm-8">
                                          <textarea rows="5" required="requiered" type="text" class="form-control" name="notipikesan_details" id="notipikesan_details" maxlength="1000" placeholder="Notipikesan Details "></textarea>
                                       </div>
                                    </div>
									 <div class="form-group row">
										<label for="notipikesan_img" class="col-sm-4 col-form-label"><span style="color:red"></span>Notipikesan Image</label>
										<div class="col-sm-8">
											 <input type="file" name="notipikesan_img"><br/><br/>
											<span id="notipikesan_img" style="color:red"></span>
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
</script>