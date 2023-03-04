
<div class="content-wrapper">
            <div class="card-header">
               <h3 class="card-title">Add Customer Details</h3>
                <br>
              
            </div>
               <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">

            <!-- /.card-header -->
            <div class="card-body">
 <?php echo validation_errors(); ?>
                <div id="accordion">
                  <div class="card card-primary">
                     
                     <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                    <form action="<?php base_url('bulk/cart') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Services</th>
                   <th>Fees</th>
                   <th>Quantity</th>
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($service_data): ?>                  
                    <?php foreach ($service_data as $k => $v): ?>
                     <form action="<?php base_url('bulk/cart') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['service_name']; ?></td>

                        
						   <td>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                             ?>  Rs                         
<?php }else if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              ?>  Rs
<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              ?>  Rs
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                             ?>  Rs
							  
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){

                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                               ?>  Rs
  <?php } ?>
                           </td>
 <td>
                          <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
                          <input value="<?php echo $v['id']; ?>" type="hidden" name="service_id" id="service_id">
						   </td>
                          <input value="<?php echo $pay; ?>" type="hidden" name="service_payment" id="service_payment">

                         </td>
                        <td>
                        <div class="col-md-12 text-center">
                          <input required="required" class="btn btn-info" type="submit" name="submit" value="Add Cart"/>
                        </div>
                       </td>
                      </tr>
                     </form>
                    <?php endforeach ?>
                  <?php endif; ?>
                 </tbody>
                </table>












                              
                  </div>
                
               </div>
            </div>
         </div>
      </div>
</div>
</section>
<script type="text/javascript">
   $(document).ready(function() {
      $("#Customer").addClass('menu-open');
      $("#Customers").addClass('active');
      $("#CustomerCreate").addClass('active');
    });
</script>