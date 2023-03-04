 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Create Services</h3>
          </div>
          <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                 <div class="form-group row">
					<label for="service_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="service_name" id="service_name" maxlength="50" placeholder="Service Name">
						<span id="" style="color:red"></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="service_payment" class="col-sm-4 col-form-label"><span style="color:red"></span>Service Payment</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="service_payment" id="service_payment" maxlength="50" placeholder="Service Payment">
						<span id="dupservice_payment" style="color:red"></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="user_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status" required="requiered" style="width: 100%;" required="required">
                <option value="">Select Status</option>
				<option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
					</div>
				</div> 
            
				         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info"
						type="submit"
						name="submit" value="Save"/>
					</div>
				</div>	
                  </div>

				<div class="col-md-3"></div>

          </div>
        </div>
      </div>
    </section>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesCreate").addClass('active');
    });
  </script>
