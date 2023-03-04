<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">View Services </h3>
          <a href="<?php echo base_url('bulk/cart') ?>" class="btn btn-primary btn-sm float-sm-right" title="Add service"><i class="fas fa-plus"> Add</i> </a>
              </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                <?php $customer_id =$this->uri->segment(3); ?>

            <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>#</th>
                   <th>Services</th>
                   <th>Payment</th>
                   <th>Quantity</th>
                   <th>Total</th>
                   <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($service_data): ?>                  
                    <?php foreach ($service_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['service_name']; ?></td>
                        <td><?php echo $v['service_payment']; ?></td>
                        <td><?php echo $v['quantity']; ?></td>
                        <td><?php echo $v['sum_pr_payment']; ?></td>
<?php echo $service_id = $v['service_id']; ?>
                        <td>
             <div class="col-md-12 text-center">
                              <a href="<?php echo base_url('bulk/delete/') ?><?php echo $v['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-trash" title="Push to Government Website"> Delete </i></a>
                        </div>
            </td>
            </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                    
                 </tbody>
           <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
            <?php $pay = $ordersum_row; ?>
                         <td><?php echo $ordersum_row; ?></td>
                     </tr>
                </table>
               </br>
              			   <?php if($service_data) { ?>  
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay">Pay Now </button>
                </div>
			   <?php } else {?>
			   <?php }?>
           <div class="modal fade" id="pay">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Payment </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <?php $wallet = $In_Payment - $Out_Payment; ?>
                                       <?php  if(($pay - $wallet) > 0){ 
                                        $referral_id = $this->session->userdata('referral_id'); 
                                      $sql="Select * from `users` where `id` = $referral_id order by `id` desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$full_name  = $datagp->full_name;
$phone = $datagp->phone;
$upi = $datagp->upi;
$payment_qr_oode = $datagp->payment_qr_oode; ?>
<center>
<?php echo $full_name; ?></br>
<?php echo $phone; ?></br>
<?php echo $upi; ?></br>
<img style="width:200px" src="<?php echo $payment_qr_oode; ?>"/></center>
<?php } else{ ?>
<form action="<?php echo base_url('payments/bulkpurchase/'.$service_id) ?>/<?php echo $customer_id ?>" method="post"  class="form-horizontal">
<input type="hidden" value="" name="family_id" id="family_id">
<input type="hidden" value="NULL" name="ad_info" id="ad_info">
<div class="form-group row">
<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
<input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
</div>
<div class="form-group row">
<label for="service_payment" class="col-sm-12 col-form-label"><span style="color:red"></span> Payment</label>
<input value="<?php echo $pay; ?>" name="admin_amount" type="text" class="form-control"  readonly>
    </div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Next</button>
</form>
</div>
<?php } ?>
</div>
</div>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesView").addClass('active');
    });
  </script>