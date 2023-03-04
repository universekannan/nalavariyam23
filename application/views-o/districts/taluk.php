<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title"> <?php echo $district['district_name'] ?> </h3>

				<button type="button" class="btn btn-default float-sm-right" data-toggle="modal" data-target="#CreateTaluk<?php echo $district['id'] ?>"><i class="fa fa-plus"> Add Taluk</i></button>

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
                    <th>Taluk Name</th>
                    <th>Status</th>
                
                  <?php if(in_array('updateDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                 <?php foreach($data as $row) { ?>
                      <tr>
					  	<td><?php echo $row->id; ?></td>
					  	<td><?php echo $row->taluk_name; ?></td>
					  	<td><?php echo $row->status; ?></td>

                   
                        <?php if(in_array('updateDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateDistrict', $user_permission)): ?>
						  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditTaluk<?php echo $row->id; ?>"><i class="fa fa-edit"> Edit</i></button>

                              <a href="<?php echo base_url('districts/panchayath/'.$row->id) ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Panchayath</a>
                          <?php endif; ?>
                          <?php if(in_array('deleteDistrict', $user_permission)): ?>
                            <a href="<?php echo base_url('districts/delete/'.$row->id) ?>" class="btn btn-default"><i class="fa fa-trash"></i> Default</a>


 <div class="modal fade" id="EditTaluk<?php echo $row->id; ?>">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Edit Taluk </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="<?php echo base_url('districts/edittaluk/'.$row->id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                           

						 <div class="form-group row">
		<label for="parent" class="col-sm-4 col-form-label"><span style="color:red"></span> District Name</label>
		<div class="col-sm-8">
            <select class="form-control select2bs4" name="parent" style="width: 100%;">
			     <?php foreach ($district_datas as $v): ?>
                     <option value="<?php echo $v['id'] ?>" <?php if($row->parent == $v['id']) { echo 'selected'; } ?> ><?php echo $v['district_name'] ?> </option> 
                  <?php endforeach ?>
				
			  </select>
		</div>
	</div>
	
				<div class="form-group row">
					<label for="taluk_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Taluk Name</label>
					<div class="col-sm-8">
						<input value="<?php echo $row->taluk_name; ?>" required="requiered" type="text" class="form-control" name="taluk_name" id="taluk_name" maxlength="50" placeholder="Taluk Name">
					</div>
				</div>
				  <div class="form-group row">
					<label for="status" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
					<div class="col-sm-8">
            <select class="form-control select2bs4" name="status" id="status"
			style="width: 100%;" required="required">
				        <option value="1" <?php if($row->status =="1") { echo "selected='selected'"; } ?>>Active</option>
                <option value="0" <?php if($row->status =="0") { echo "selected='selected'"; } ?>>Inactive</option>
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
				  
				  
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
				 <?php } ?>
                </tbody>
                </table>
				 <div class="modal fade" id="CreateTaluk<?php echo $district['id'] ?>">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Add Taluk </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="<?php echo base_url('districts/talukcreate') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                           
                  <input type="hidden" value="<?php echo $district['id'] ?>" name="parent" id="parent">
						
					<div class="form-group row">
					<label for="taluk_name" class="col-sm-4 col-form-label"><span style="color:red"></span>Taluk Name</label>
					<div class="col-sm-8">
						<input  required="requiered" type="text" class="form-control" name="taluk_name" id="taluk_name" maxlength="50" placeholder="Taluk Name">
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