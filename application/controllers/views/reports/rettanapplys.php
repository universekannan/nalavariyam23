<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pending</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending</li>
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
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>District name</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Time</th>
                  <th>Aceion</th>
                </tr>
                </thead>
                <tbody>

	  
               <?php foreach($data as $row) { ?> 
  <tr>					
                        <td>NV<?php echo $row->log_id; ?></td>
                        <td><?php echo $row->district_name; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->paydate; ?></td>
                        <td><?php echo $row->time; ?></td>
                        <td>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#OutPut<?php echo $row->id; ?>"><i class="fa fa-eye"></i>  OutPut</button>
						   <div class="modal fade" id="OutPut<?php echo $row->id; ?>">
                              <div class="modal-dialog modal-xl">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title"><?php echo $row->service_name; ?> </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                <form action="<?php echo base_url('reports/rettanapply/'.$row->id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                       <div class="modal-body">
								 <div class="form-group text-center">
	   
									   <img src="<?php echo $row->from_image; ?>"
									   style="opacity: .8; width:700px;">

 </div>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
					
 <div class="form-group row">
					<label for="upi" class="col-sm-4 col-form-label"><span style="color:red"></span>Status</label>
<div class="col-sm-8">
             <select class="form-control select2bs4" name="service_status" id="service_status" required="requiered" style="width: 100%;" required="required">
 				<option value="<?php echo $row->service_status; ?>"><?php echo $row->service_status; ?></option>
				<option value="Img">Approve</option>
                <option value="Paid">Reject</option>
				
            </select>
					</div>
					</div>
					
				
					</div>
			
				                <div class="col-md-3"></div>

              </div>
            </div>
										  
										 
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type='submit' class='btn btn-primary'>Submit</button>
                                          </div>
										  </form>
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
  <!-- /.content-wrapper -->

