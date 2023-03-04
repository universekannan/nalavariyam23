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
                  <th> Login ID</th>
                  <th> Name</th>
                  <th> group_id</th>
                  <th> dist_id</th>
                  <th> Phone</th>
                  <th> Date</th>
                  <th> time</th>
                  <th> Actions</th>
                </tr>
                </thead>
                <tbody>
                     <?php
$sql="SELECT a.*,b.full_name, b.phone, b.group_id, b.dist_id FROM payment a, users b WHERE a.log_id = b.id and a.amount >= '30' and a.amount < 100 and a.log_id > 3 and a.paydate >= '2022-12-09' and a.service_status='Out Payment' and a.k_status='1' group by a.log_id, a.paydate ,a.time";
$query = $this->db->query($sql);
$result = $query->result();
  foreach($result as $row) { ?>
  <tr>
	  <td> <?php echo $row->log_id; ?></td>
	  <td> <?php echo $row->full_name; ?></td>
	  <td> <?php echo $row->group_id; ?></td>
	  <td> <?php echo $row->dist_id; ?></td>
	  <td> <?php echo $row->paydate; ?></td>
	  <td> <?php echo $row->time; ?></td>
	  <td> <?php echo $row->phone; ?></td>

                        <td>
		                  <a href="<?php echo base_url('users/editkannan/'.$row->id. '/' .$row->log_id) ?>" class="btn btn-primary btn-sm" title="Edit">  <i class="fa fa-edit"> Edit</i> </a>
						   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#CreateFome<?php echo $row->id; ?>"><i class="fa fa-image"> Active</i></button>
							  <div class="modal fade" id="CreateFome<?php echo $row->id; ?>">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Select Payment </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="<?php echo base_url('reports/paymentupload') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							  	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th> Login ID</th>
                  <th> Name</th>
                  <th> group_id</th>
                  <th> dist_id</th>
                  <th> Phone</th>
                  <th> Date</th>
                  <th> time</th>
                  <th> Actions</th>
                </tr>
                </thead>
                <tbody>
                     <?php
$sql="SELECT a.*,b.full_name, b.phone, b.group_id, b.dist_id FROM payment a, users b WHERE a.log_id = b.id and a.amount >= '30' and a.amount < 100 and a.log_id > 3 and a.paydate >= '2022-12-09' and a.service_status='Out Payment' and a.k_status='1' and a.log_id = $row->log_id and a.paydate = '$row->paydate' and a.time = '$row->time'";
$query = $this->db->query($sql);
$result = $query->result();
  foreach($result as $row) { ?>
  <tr>
	  <td> <?php echo $row->log_id; ?></td>
	  <td> <?php echo $row->full_name; ?></td>
	  <td> <?php echo $row->group_id; ?></td>
	  <td> <?php echo $row->dist_id; ?></td>
	  <td> <?php echo $row->paydate; ?></td>
	  <td> <?php echo $row->time; ?></td>
	  <td> <?php echo $row->phone; ?></td>
<td> 
                     <?php
$sql="SELECT a.*,b.full_name, b.phone, b.group_id, b.dist_id FROM payment a, users b WHERE a.log_id = b.id and a.amount >= '30' and a.amount < 100 and a.log_id > 3 and a.paydate >= '2022-12-09' and a.service_status='Out Payment' and a.k_status='1' and a.time = '$row->time'"; 
$query = $this->db->query($sql);
$query->num_rows();

if ($query->num_rows == 1) { ?>
		                  <a href="<?php echo base_url('users/editkannan/'.$row->id. '/' .$row->log_id) ?>" class="btn btn-primary btn-sm" title="Edit">  <i class="fa fa-edit"> Apply</i> </a>
 <?php } else { ?>
 		                  <a href="<?php echo base_url('users/editkannan/'.$row->id. '/' .$row->log_id) ?>" class="btn btn-primary btn-sm" title="Edit">  <i class="fa fa-edit"> Delit</i> </a>
 <?php }  ?>
</td> 
 <?php } ?>
 </tbody></table>
                           <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                 </div>
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
		   