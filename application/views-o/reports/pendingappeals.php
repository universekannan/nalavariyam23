  <meta http-equiv="refresh" content="20"> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pending Appeals</h1>
          </div>
        </div>
      </div>
    </section>
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
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Diste</th>
                    <th>Date</th>
                    <th>Time</th>
                
                  <th>Aceion</th>
                </tr>
                </thead>
                <tbody>
                
                  <?php if($reports_completed_data): ?>                  
                    <?php 
					foreach ($reports_completed_data as $k => $v):
					//print_r($reports_completed_data); die;

					?>
                      <tr>
                        <td>NC<?php echo $v['customer_id']; ?></td>
                        <td><?php echo $v['service_id']; ?></td>
                        <td><?php echo $v['dist_id']; ?></td>
                        <td><?php echo $v['paydate']; ?></td>
                        <td><?php echo $v['time']; ?></td>
                    


                        <td>
                                     <a href="<?php echo base_url('reports/pendingappeal/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i>Change</a>
                          
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
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
  <!-- /.content-wrapper -->
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Setting").addClass('menu-open');
      $("#Settings").addClass('active');
      $("#PendingApply").addClass('active');
    });
  </script>
