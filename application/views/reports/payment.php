<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Payments Details </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Customer ID</th>
                    <th>Districts ID</th>
                    <th>Service ID</th>
                    <th>Status</th>
                    <th>Pameny Date</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>


                     <?php foreach($data as $row) { ?>
  <tr>

                        <td>NVC<?php echo $row->customer_id; ?></td>
                        <td>NVD<?php echo $row->dist_id; ?></td>
                        <td>NVS<?php echo $row->service_id; ?></td>
                        <td><?php echo $row->service_status; ?></td>
                        <td><?php echo $row->paydate; ?></td>


                        <td>
                          <?php if(in_array('updateUser', $user_permission)): ?>
		                  <a href="<?php echo base_url('reports/output/'.$row->service_id.'/'.$row->customer_id) ?>" class="btn btn-info" title="Edit">  <i class="fa fa-eye"> view</i> </a>
						  
		              
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
      $("#AdminView").addClass('active');
    });
  </script>
		   