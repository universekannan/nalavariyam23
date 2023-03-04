<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">Notipikesan Details </h3>
                  <?php if(in_array('createNotipikesan', $user_permission)): ?>

              <a href="<?php echo base_url('notipikesan/create') ?>" class="btn btn-primary btn-sm float-sm-right" title="Add Customers"><i class="fas fa-plus"> Add</i> </a>
                  <?php endif; ?> 
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
                  <th>Notipikesan </th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Users</th>
                 <?php endif; ?>
                  <th>Status</th>
                  <th>View</th>
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
						  <td><?php echo $row->notipikesan_name; ?></td>
						  <td><?php echo $row->from_date; ?></td>
						  <td><?php echo $row->to_date; ?></td>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

						  <td><?php echo $row->user_type; ?></td>
                  <?php endif; ?>
						  <td><?php echo $row->status; ?></td>
						  <td>
	<a href="" data-toggle="modal" data-target="#adds<?php $row->id ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"> View</i></a>

	
<div class="modal fade" id="adds<?php $row->id; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Notipikesan</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<center>
<?php echo $row->notipikesan_name; ?></br>
<?php echo $row->notipikesan_details; ?></br>
<img style="width:200px" src="<?php echo $row->notipikesan_img; ?>"/></center>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> 

                        </td>
						  
						<?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                        <td>
		                  <a href="<?php echo base_url('notipikesan/edit/'.$row->id) ?>" class="btn btn-primary btn-sm" title="Services">  <i class="fa fa-edit"> Edit</i> </a>
                        </td>
						 <?php endif; ?>

                      </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		   