<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">Districts </h3>
				<button type="button" class="btn btn-default float-sm-right" data-toggle="modal" data-target="#CreateDistricts"><i class="fa fa-plus"> Add District</i></button>

              </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Districts Name</th>
                    <th>Status</th>
                
                  <?php if(in_array('updateDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($districts_data): ?>                  
                    <?php 
					foreach ($districts_data as $k => $v):
					//print_r($districts_data); die;

					?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['district_name']; ?></td>
                        <td><?php echo $v['status']; ?></td>
                    

                        <?php if(in_array('updateDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateDistrict', $user_permission)): ?>

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditTaluk<?php echo $v['id']; ?>"><i class="fa fa-edit"> Edit</i></button>

 <div class="modal fade" id="EditTaluk<?php echo $v['id']; ?>">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Edit Taluk </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="<?php echo base_url('districts/edit/'.$v['id']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 
				<div class="form-group row">
					<label for="district_name" class="col-sm-4 col-form-label"><span style="color:red"></span>District Name</label>
					<div class="col-sm-8">
						<input value="<?php echo $v['district_name']; ?>" required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="District Name">
					</div>
				</div>
				  <div class="form-group row">
					<label for="status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status"
			style="width: 100%;" required="required">
				        <option value="Active" <?php if($v['status'] =="Active") { echo "selected='selected'"; } ?>>Active</option>
                <option value="Inactive" <?php if($v['status'] =="Inactive") { echo "selected='selected'"; } ?>>Inactive</option>
            </select>
					</div>
				</div> 
				
                           <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type='submit' class='btn btn-primary'>Submit</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
				 <a href="<?php echo base_url('districts/taluk/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Taluk</a>

				  <?php endif; ?>
                          <?php if(in_array('deleteDistrict', $user_permission)): ?>
                          
  <a href="<?php echo base_url('districts/delete/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i> Default</a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
                </table>
				<div class="modal fade" id="CreateDistricts">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Add Districts </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="<?php echo base_url('districts/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                           						
					<div class="form-group row">
					<label for="district_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Districts Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="Districts Name">
					</div>
				</div>
				
                           <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type='submit' class='btn btn-primary'>Submit</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
     <script type="text/javascript">
    $(document).ready(function() {
      $("#District").addClass('menu-open');
      $("#Districts").addClass('active');
      $("#viewDistricts").addClass('active');
    });
  </script>