<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">View Bullk  Orders </h3>
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
                   <th>Full Name</th>
                   <th>UserID</th>
                   <th>Amount</th>
                   <th>Paydate</th>
                   <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($Orders_data): ?>                  
                    <?php foreach ($Orders_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['full_name']; ?></td>
                        <td><?php echo $v['log_id']; ?></td>
                        <td><?php echo $v['amount']; ?></td>
                        <td><?php echo $v['paydate']; ?></td>
                        <td>
						          <a href="<?php echo base_url('bulk/vieworders/'.$v['log_id']) ?>" class="btn btn-primary btn-sm float-sm-right" title="Add service"><i class="fas fa-eye"> View Orders</i> </a>

            </td>
            </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                    
                 </tbody>
          
		  
                </table>
               </br>

           <div class="modal fade" id="View">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Select Pament </h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
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
                    <form action="<?php base_url('bulk/cart') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['service_name']; ?></td>
                        <td><?php echo $v['service_payment']; ?></td>
                        <td><?php echo $v['quantity']; ?></td>
                        <td><?php echo $v['sum_pr_payment']; ?></td>
<?php echo $service_id = $v['service_id']; ?>
                        <td>
             <div class="col-md-12 text-center">
                          <input required="required" class="btn btn-info" type="submit" name="submit" value="Delite"/>
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
                  </form>
                </table>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Next</button>
</form>
</div>
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