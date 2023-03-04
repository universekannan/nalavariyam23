<div class="content-wrapper">
              <div class="card-header">
                <h3 class="card-title">View Services </h3>
          <a href="<?php echo base_url('bulk/orders') ?>" class="btn btn-primary btn-sm float-sm-right" title="Add service"><i class="fas fa-plus"> View Orders</i> </a>
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
                       
					   
            </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                    
                 </tbody>
          
		  
                </table>
               </br>
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pay">Oder Delivery</button>
                </div>
           <div class="modal fade" id="pay">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Delivery</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                  <form action="<?php echo base_url('bulk/orderclose/'.$customer_id) ?>" method="post"  class="form-horizontal">



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