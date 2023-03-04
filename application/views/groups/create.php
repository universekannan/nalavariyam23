  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Permission </h1>
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
            <h3 class="card-title">Users Permission </h3>
          </div>
          <!-- /.card-header -->
           <div class="card-body">
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>
 <div class="row mb-2">
          <div class="col-sm-6">
            <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
                </div>
          </div>
		  <div class="col-sm-3">
           <div class="form-group">
                  <label for="user_payment">User Payment</label>
                  <input type="text" class="form-control" id="user_payment" name="user_payment" placeholder="Enter User Payment">
                </div>
          </div>
		  		  <div class="col-sm-3">
           <div class="form-group">
                  <label for="renew_payment">User Renew Payment</label>
                  <input type="text" class="form-control" id="renew_payment" name="renew_payment" placeholder="Enter Renew Payment">
                </div>
          </div>
        </div>
                </div>
                <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
				   <th>Modules</th>
				   <th>Create</th>
				   <th>Update</th>
				   <th>View</th>
				   <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory"></td>
                      </tr>
                      <tr>
                        <td>Rates</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createRates"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateRates"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewRates"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteRates"></td>
                      </tr>
                      <tr>
                        <td>Slots</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSlots"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSlots"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSlots"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSlots"></td>
                      </tr>
                      <tr>
                        <td>Parking</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteParking"></td>
                      </tr>
                      <tr>
                        <td>Reports</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createReports"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateReports"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReports"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteReports"></td>
                      </tr>
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"></td>
                        <td> - </td>
                      </tr>                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <script type="text/javascript">
    $(document).ready(function() {
      $("#Setting").addClass('menu-open');
      $("#Settings").addClass('active');
      $("#UserSetting").addClass('active');
    });
  </script>
