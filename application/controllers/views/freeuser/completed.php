
<div class="content-wrapper">   
      <div class="card-header">
         <h3 class="card-title">Completed </h3>
      </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Customer ID</th>
                        <th>Districts ID</th>
                        <th>Service ID</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th>Actions</th>
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
                           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#OutPut<?php echo $row->id; ?>"><i class="fa fa-eye"></i>  OutPut</button>


                           <?php $log_id=$this->session->userdata('id');
                            $sql1="Select * from payments where service_status = 'Img' and log_id = $log_id order by id desc limit 1";
                            $query = $this->db->query($sql1);
                            $data1 =  $query->row();
                            $bill_status =  $row->bill;
                      if($bill_status == '1'){ ?>
                           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Billing<?php echo $row->id; ?>"><i class="fa fa-plus"></i>  Creat Bill</button>
                           <?php } else if($bill_status == ''){ ?>
						    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Billing<?php echo $row->id; ?>"><i class="fa fa-plus"></i>  Creat Bill</button>
                           <?php } else if($bill_status == '2'){ ?>
                           <a href="<?php echo base_url('freeuser/receipt/'.$row->customer_id.'/'.$row->id) ?>" class="btn btn-default"><i class="fa fa-eye"></i>  Bill</a>
                           <?php } ?>
                           <div class="modal fade" id="Billing<?php echo $row->id; ?>">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Service Billing </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="<?php echo base_url('freeuser/billcreate') ?>" method="post"  class="form-horizontal">
                                       <div class="modal-body">
                                          <div class="form-group row">
                                             <label for="service_payment" class="col-sm-12 col-form-label"><span style="color:red"></span>Service Payment</label>
                                             <input value="<?php echo $row->amount; ?>" name="amount" id="amount" type="text" class="form-control"  readonly>
                                            <input value="<?php echo $row->id; ?>" name="id" id="id" type="hidden" class="form-control"  readonly>

                                          </div>
                                          <div class="form-group row">
                                             <label for="adsenal_amount" class="col-sm-12 col-form-label"><span style="color:red"></span>Adsional  Payment</label>
                                             <input value="" type="text" name="adsional_amount" id="adsional_amount" class="form-control">
                                          </div>
										  <div class="form-group row">
                                             <label for="adsenal_amount" class="col-sm-12 col-form-label"><span style="color:red"></span>Reference ID</label>
                                             <input value="" type="text" name="reference_id" id="reference_id" class="form-control">
                                          </div>
										  
										   </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Next</button>
                                          </div>
                                    </form>
                                   
                                 </div>
                              </div>
                              </div>
							   <div class="modal fade" id="OutPut<?php echo $row->id; ?>">
                              <div class="modal-dialog modal-xl">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title"> Out Put </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                       <div class="modal-body text-center">
									   <img src="<?php echo $row->from_image; ?>"
									   style="opacity: .8; width:700px;">

                                          </div>
										 
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            </div>
         </div>
      </div>
</section>
</div>
<script type="text/javascript">
   $(document).ready(function() {
     $("#Report").addClass('menu-open');
     $("#Reports").addClass('active');
     $("#ViewCompleteds").addClass('active');
   });
</script>