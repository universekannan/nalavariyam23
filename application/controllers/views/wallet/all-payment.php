<div class="content-wrapper">
      <div class="card-header">
                <h3 class="card-title">Summary</h3>
				
                <!-- <a href="" data-toggle="modal" data-target="#ClearData" class="btn btn-primary btn-sm float-sm-right" title="Clear Payment Data   "><i class="fas fa-plus"> Clear Data </i> </a>-->
				 
				 
                 <a href="" data-toggle="modal" data-target="#Transfer" class="btn btn-primary btn-sm float-sm-right" title="Transfer"><i class="fas fa-plus"> Transfer</i> </a>
<?php if ($this->session->userdata('group_id') == '1'){ ?>
				<a href="" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm float-sm-right" title="Add Payment "><i class="fas fa-plus"> Add Payment</i> </a>
  <?php   } else { ?>

                 <a href="" data-toggle="modal" data-target="#addpaydate" class="btn btn-primary btn-sm float-sm-right" title="Add Payment "><i class="fas fa-plus"> Add Payment</i> </a>
  <?php   }  ?>

              </div>
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
                  <th>S No</th>
                  <th>From</th>
                  <th>TO</th>
                  <th>Tittels</th>
                  <th>DateTime</th>
                  <th>Data</th>
                  <th> Debit</th>
                  <th> Credit</th>

                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->to_id; ?></td>
	  <td><?php echo $row->from_id; ?></td>
      <td><?php echo $row->service_status; ?>, <?php echo $row->ad_info; ?>, <?php echo $row->ad_info2; ?>, RS<?php echo $row->amount; ?></td>

	  	 <td><?php $originalDate = $row->paydate;
$newDate = date("d-m-Y", strtotime($originalDate)); 
	  echo $newDate; ?>, <?php echo $row->time; ?></td>
	  <td>C<?php echo $row->customer_id; ?>, S<?php echo $row->service_id; ?></td>
	     <?php if($row->service_status == 'Out Payment') { ?>
	  <td><?php echo $row->amount; ?></td>
	  <td></td>
 <?php } else { ?>
	  <td></td>
	  <td><?php echo $row->amount; ?></td>
 <?php } ?>
<td> 
<?php if(!empty($row->pay_id)){ ?>
               <a href="<?php echo base_url('wallet/paymentdelete/') ?><?php echo $row->pay_id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-trash" title="Delete Service Payment  "> Delete </i></a>
 <?php } else { ?>
               <a href="<?php echo base_url('wallet/deletepay/') ?><?php echo $row->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-trash" title="Delete Other Delete Payment"> Delete </i></a>
 <?php } ?>

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