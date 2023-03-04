<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Districts </h1>
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
            <h3 class="card-title">Update Districts  </h3>
          </div>
          <!-- /.card-header -->
           <div class="card-body">
              <form action="<?php base_url('districts/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <input type="hidden" name="id" value="<?php echo $district['id'] ?>">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
					<label for="district_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Districts Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="district_name" value="<?php echo $district['district_name'] ?>" id="district_name" maxlength="50" placeholder="Districts Name">
					</div>
				</div>
				<div class="form-group row">
					<label for="user_id" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status"
			style="width: 100%;" required="required">
				        <option value="Active" <?php if($district['status'] =="Active") { echo "selected='selected'"; } ?>>Active</option>
                <option value="Inactive" <?php if($district['status'] =="Inactive") { echo "selected='selected'"; } ?>>Inactive</option>
            </select>
					</div>
				</div> 
				
		         <div class="form-group row">
					<label for="district_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Image Upload</label>
					<div class="col-sm-8">
						 <input type="file" name="photo" value="Upload Image"><br/><br/>
             <img style="width:200px" src="<?php echo $district['signature']; ?>"/>
						<span id="dupdistrict_name" style="color:red"></span>
					</div>
				</div>
				
				
                  </div>
              </div>
            </div>
         <div class="form-group row">
					<div class="col-md-12 text-center">
						<input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
						
					</div>
				</div>	
          </div>
          </div>
          </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#District").addClass('menu-open');
      $("#Districts").addClass('active');
      $("#DistrictsCreate").addClass('active');
    });
  </script>