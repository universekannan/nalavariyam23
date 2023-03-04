<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">View Services </h3>
                <?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ ?>
              <a href="<?php echo base_url('service/create') ?>" class="btn btn-primary btn-sm float-sm-right" title="Add service"><i class="fas fa-plus"> Add</i> </a>
<?php } ?>
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
                    <th>Services</th>
                
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($service_data): ?>                  
                    <?php foreach ($service_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['service_name']; ?></td>
                        <td><?php echo $v['status']; ?></td>

                        <?php if(in_array('viewService', $user_permission) || in_array('updateService', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                       
						 <td>
						
                          <?php if(in_array('updateService', $user_permission)): ?>
						  
                            <a href="<?php echo base_url('service/edit/'.$v['id']) ?>" class="btn btn-info"><i class="fa fa-edit"title="Edit"> </i></a>
							
                          <?php endif; ?>
                          <?php if(in_array('deleteService', $user_permission)): ?>
                            <a href="<?php echo base_url('service/delete/'.$v['id']) ?>" class="btn btn-danger" title="Delete">  <i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                 </tbody>
                </table>
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
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesView").addClass('active');
    });
  </script>