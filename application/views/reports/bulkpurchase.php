  <meta http-equiv="refresh" content="20"> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bulk Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bulk Purchase</li>
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
                <h3 class="card-title">Bulk Fome Purchase</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Amount</th>	
                    <th>Date</th>
                    <th>Time</th>
                 <?php if(in_array('updateDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
                  <th>Aceion</th>
                  <?php endif; ?>
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
                        <td><?php echo $v['amount']; ?></td>
                        <td><?php echo $v['paydate']; ?></td>
                        <td><?php echo $v['time']; ?></td>
						 <td>
                          <?php if(in_array('updateDistrict', $user_permission)): ?>
                                     <a href="<?php echo base_url('reports/pendingappeal/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i>Change</a>
                          <?php endif; ?>
                          
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
      $("#BulkPurchases").addClass('active');
    });
  </script>
