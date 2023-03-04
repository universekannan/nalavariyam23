<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Family Member Details </h3>
				<ol class="float-sm-right">
						<a href="<?php echo base_url('freeuser/family/') ?><?php echo $this->uri->segment(3); ?>"  class="btn btn-info">Go to Family</a>
                </ol>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>Name</th>
                  <th>Aadhaar No</th>
                  <th>Relationship</th>
                    <th>Pay</th>

                  <th style="width: 160px">Acehen</th>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->family_member_name; ?></td>
	  <td><?php echo $row->aadhaar_no; ?></td>
	  <td><?php echo $row->n_relationship; ?></td>
 <td>
<?php if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                             ?>  Rs                         
<?php }else if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
	
  if($this->session->userdata('status') == 'Active') {
	  
   if($this->session->userdata('dist_id') == $user_data['dist_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
 ?>  Rs
<?php } if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

  if($this->session->userdata('status') == 'Active') {
	  
  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
							  ?>  Rs
<?php } if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
	
  if($this->session->userdata('status') == 'Active') {
	  
  if($this->session->userdata('taluk_id') == $user_data['taluk_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
  ?>  Rs
							  
<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){


  if($this->session->userdata('status') == 'Active') {
	  
 if($this->session->userdata('panchayath_id') == $user_data['panchayath_id'] ) {
                                   $pay = $v['service_payment'] / $user_datas['customer_amound'];
                                    echo(round($pay));
                              } else {
                                    echo $pay = $v['service_payment'];
                              }
 } else {
                                    echo $pay = 150;
 }
  ?>  Rs
  <?php } ?>
                           </td>
 <td>
<?php $customer_id =$this->uri->segment(3); 
$service_id = $this->uri->segment(4); ?>
      <a href="<?php echo base_url('freeuser/edunext/'.$customer_id) ?>/<?php echo $service_id; ?>/<?php echo $row->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right " title="Next"> Next</i></a>  
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
		   