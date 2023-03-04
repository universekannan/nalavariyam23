<div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Service</h3>
          </div>
          <div class="card-body">
          <form  action=""  class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
                      
          <input type="hidden" name="id" value="<?php echo $service['id'] ?>">

            <div class="row">
			<div class="col-md-3"></div>
              <div class="col-md-6">
                 <div class="form-group row">
					<label for="service_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="service_name" id="service_name"  value="<?php echo $service['service_name'] ?>" maxlength="50" placeholder="Service Name">
						<span id="" style="color:red"></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="service_payment" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Payment</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="service_payment" value="<?php echo $service['service_payment'] ?>" id="service_payment" maxlength="50" placeholder="Service Payment">
						<span id="dupservice_payment" style="color:red"></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="user_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status" required="requiered" style="width: 100%;" required="required">
                <option value="">Select Status</option>
				        <option value="Active" <?php if($service['status'] =="Active") { echo "selected='selected'"; } ?>>Active</option>
                <option value="Inactive" <?php if($service['status'] =="Inactive") { echo "selected='selected'"; } ?>>Inactive</option>
            </select>
					</div>
				</div> 
				<div class="form-group row">
					<label for="marge_right" class="col-sm-4 col-form-label"><span style="color:red"></span>Marge Right</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="marge_right" value="<?php echo $service['marge_right'] ?>" id="marge_right" maxlength="50" placeholder="Marge Right">
					</div>
				</div>
				<div class="form-group row">
					<label for="marge_bottom" class="col-sm-4 col-form-label"><span style="color:red"></span>Marge Bottom</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="marge_bottom" value="<?php echo $service['marge_bottom'] ?>" id="marge_bottom" maxlength="50" placeholder="Marge Bottom">
					</div>
				</div>
				 <div class="form-group row">
					<label for="photo" class="col-sm-4 col-form-label"><span style="color:red"></span>Image Upload</label>
					<div class="col-sm-8">
                 <input required="requiered" accept="application/pdf,image/png, image/jpeg" name="photo" type="file" id="photo">
					</div>
				</div>
				 <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save"/>
            <a href="" class="btn btn-info">Back</a>
					</div>
				</div>
				</div>
				<div class="col-md-3"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </section>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesView").addClass('active');
    });
  </script>
