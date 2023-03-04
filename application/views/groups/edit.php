<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <h1>  Permission</h1>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Users Permission</h3>
              </div>
			             <div class="card-body">

            <form role="form" action="<?php base_url('groups/update') ?>" method="post">
                <?php echo validation_errors(); ?>

               <div class="box-body">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input value="<?php echo $group_data['group_name']; ?>" type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
                </div>
          </div>
		  <div class="col-sm-3">
           <div class="form-group">
                  <label for="user_payment">User Payment</label>
                  <input value="<?php echo $group_data['user_payment']; ?>" type="text" class="form-control" id="user_payment" name="user_payment" placeholder="Enter User Payment">
                </div>
          </div> 
		   <div class="col-sm-3">
           <div class="form-group">
                  <label for="renew_payment">User Renew Payment</label>
                  <input value="<?php echo $group_data['renew_payment']; ?>" type="text" class="form-control" id="renew_payment" name="renew_payment" placeholder="Enter Renew Payment">
                </div>
          </div> 
        </div>
                </div>				
                  <?php $serialize_permission = unserialize($group_data['permission']); ?>
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				   <th>Modules</th>
				   <th>Create</th>
				   <th>Update</th>
				   <th>View</th>
				   <th>Delete</th>
				   <th>All</th>

                </tr>
                </thead>
                <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" <?php if($serialize_permission) {
                          if(in_array('createUser', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" <?php 
                        if($serialize_permission) {
                          if(in_array('updateUser', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" <?php 
                        if($serialize_permission) {
                          if(in_array('viewUser', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllUser" <?php 
                        if($serialize_permission) {
                          if(in_array('AllUser', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
					  <tr>
                        <td>Customer</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCustomer" <?php if($serialize_permission) {
                          if(in_array('createCustomer', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCustomer" <?php 
                        if($serialize_permission) {
                          if(in_array('updateCustomer', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCustomer" <?php 
                        if($serialize_permission) {
                          if(in_array('viewCustomer', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCustomer" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteCustomer', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllCustomer" <?php 
                        if($serialize_permission) {
                          if(in_array('AllCustomer', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
					   </tr>
					   <tr>
                       <td>Districts</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDistrict" <?php if($serialize_permission) {
                          if(in_array('createDistrict', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDistrict" <?php 
                        if($serialize_permission) {
                          if(in_array('updateDistrict', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDistrict" <?php 
                        if($serialize_permission) {
                          if(in_array('viewDistrict', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDistrict" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteDistrict', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllDistricts" <?php 
                        if($serialize_permission) {
                          if(in_array('AllDistricts', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
					  <td>Services</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createService" <?php if($serialize_permission) {
                          if(in_array('createService', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateService" <?php 
                        if($serialize_permission) {
                          if(in_array('updateService', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="viewService" <?php 
                        if($serialize_permission) {
                          if(in_array('viewService', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
						 
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteService" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteService', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllServices" <?php 
                        if($serialize_permission) {
                          if(in_array('AllServices', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
						 </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('createGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
						 
                          <td><input type="checkbox" name="permission[]" id="permission" value="AllGroups" <?php 
                        if($serialize_permission) {
                          if(in_array('AllGroups', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                       
                      <tr>
                        <td>Setting</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="UserSetting" <?php 
                        if($serialize_permission) {
                          if(in_array('UserSetting', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" <?php 
                        if($serialize_permission) {
                          if(in_array('updateSetting', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllSetting" <?php 
                        if($serialize_permission) {
                          if(in_array('AllSetting', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>AllPending</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="ViewPending" <?php 
                        if($serialize_permission) {
                          if(in_array('ViewPending', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllPending" <?php 
                        if($serialize_permission) {
                          if(in_array('AllPending', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
					   <tr>
                        <td>Completed</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="ViewCompleted" <?php 
                        if($serialize_permission) {
                          if(in_array('ViewCompleted', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllCompleted" <?php 
                        if($serialize_permission) {
                          if(in_array('AllCompleted', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
					 
                      <tr>
                        <td>AllProfile</td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="ProfileEdit" <?php 
                        if($serialize_permission) {
                          if(in_array('ProfileEdit', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" <?php 
                        if($serialize_permission) {
                          if(in_array('viewProfile', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllProfile" <?php 
                        if($serialize_permission) {
                          if(in_array('AllProfile', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
						 </tr> 
						 <tr>
                        <td>Notipikesan</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createNotipikesan" <?php if($serialize_permission) {
                          if(in_array('createNotipikesan', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateNotipikesan" <?php 
                        if($serialize_permission) {
                          if(in_array('updateNotipikesan', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewNotipikesan" <?php 
                        if($serialize_permission) {
                          if(in_array('viewNotipikesan', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteNotipikesan" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteNotipikesan', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="AllNotipikesan" <?php 
                        if($serialize_permission) {
                          if(in_array('AllNotipikesan', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                   				  
                   
 </tbody>
                </table>
              </div>
			   <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
              </div>
              <!-- /.card-body -->
            </div>
			
            </form>
            </form>
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
      $("#Setting").addClass('menu-open');
      $("#Settings").addClass('active');
      $("#UserSetting").addClass('active');
    });
  </script>
  

