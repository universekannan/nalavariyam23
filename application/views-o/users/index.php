<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Details </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th> S No</th>
                  <th> Name</th>
                  <th> Email</th>
                  <th> Phone</th>
                  <th> Status</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th> Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td> <?php echo $row->id; ?></td>
	  <td> <?php echo $row->full_name; ?></td>
	  <td> <?php echo $row->email; ?></td>
	  <td> <?php echo $row->phone; ?></td>
	  <td> <?php echo $row->status; ?></td>
                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateUser', $user_permission)): ?>
		                  <a href="<?php echo base_url('users/edit/'.$row->id) ?>" class="btn btn-primary btn-sm" title="Edit">  <i class="fa fa-edit"> Edit</i> </a>
					
					
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>

                      </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		   