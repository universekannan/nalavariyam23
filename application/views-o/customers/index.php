<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">Customers Details </h3>
              <a href="<?php echo base_url('customers/create') ?>" class="btn btn-primary btn-sm float-sm-right" title="Add Customers"><i class="fas fa-plus"> Add</i> </a>

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
                  <th>S No</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->full_name_tamil; ?></td>
	  <td><?php echo $row->username; ?></td>
	  <td><?php echo $row->phone; ?></td>
	  <td><?php echo $row->status; ?></td>
                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                        <td>
		                  <a href="<?php echo base_url('customers/edit/'.$row->id) ?>" class="btn btn-primary btn-sm" title="Edit">  <i class="fa fa-edit"> Edit</i> </a>
					 </td>
                      <?php endif; ?>
					   <td>
		                  <a href="<?php echo base_url('service/indexs/'.$row->id) ?>" class="btn btn-primary btn-sm" title="Services">  <i class="fa fa-upload"> Services</i> </a>
                        </td>

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
		   