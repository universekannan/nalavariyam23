<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Summary</h3>
				 <a href="" data-toggle="modal" data-target="#Withdrawal" class="btn btn-primary btn-sm float-sm-right" title="Withdrawal Payment "><i class="fas fa-plus"> Withdrawal </i> </a>
				 <a href="" data-toggle="modal" data-target="#Transfer" class="btn btn-primary btn-sm float-sm-right" title="Add Presidents"><i class="fas fa-plus"> Transfer</i> </a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>S No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Tittels</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Credit</th>
                  <th>Debit</th>

                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
      <td><?php echo $row->log_id ; ?></td>
      <td><?php echo $row->to_id; ?></td>
      <td><?php echo $row->service_status; ?></td>
	  	 <td><?php $originalDate = $row->paydate;
$newDate = date("d-m-Y", strtotime($originalDate)); 
	  echo $newDate; ?></td>
	  <td><?php echo $row->time; ?></td>
	     <?php if($row->service_status == 'Out Payment') { ?>
	  <td><?php echo $row->amount; ?></td>
	  <td></td>
 <?php } else { ?>
	  <td></td>
	  <td><?php echo $row->amount; ?></td>
 <?php } ?>

</tr>
                    
                   <?php } ?>

                </tbody>
				     <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>Total</td>
                   <td><?php echo $wallet = $In_Payment - $Out_Payment; ?></td>
                      </tr>
              </table>
			  			  
<div class="modal fade" id="Transfer">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Payment Transfer</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment;
//print_r($data);die;

 if(($wallet) > 0){ ?>
<form action="<?php echo base_url('wallet/create') ?>" method="post"  class="form-horizontal">
<?php } else {?>
<?php } ?>
                <div class="form-group row">
					<label for="user_id" class="col-sm-12 col-form-label"><span style="color:red"></span> District</label>
						<select class="form-control select2bs4" name="user_id" style="width: 100%;" required="required">
							<option value="">Select User Name</option>
								 <?php 
							   $data = $this->model_users->getWalletUsers();
							   foreach($data as $row)
							  {  
							  echo '<option value="'.$row['id'].'">'.$row['phone'].' -> '.$row['full_name'].'</option>';
							  }?>
						</select>
				</div>	 
 				<div class="form-group row">
					<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
					<input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
				</div>
				
<?php  if(($wallet) > 0){ 
          echo "<div class='form-group row'>
					<label for='transfer_payment' class='col-sm-12 col-form-label'><span style='color:red'></span>Transfer Payment</label>
					<input required='requiered' type='text' class='form-control' name='transfer_payment' placeholder='Enter Transfer Payment'>
				</div>";
		} else {
         echo "";
 } ?>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php  if(($wallet) > 0){ 
		 echo "<button type='submit' class='btn btn-primary'>Transfer Now</button>";
		} else {
		 echo "<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>";
 } ?>
  </form>
</div>
</div>
</div>
</div> 

<div class="modal fade" id="Withdrawal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Withdrawal</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment;
//print_r($data);die;

 if(($wallet) > 0){ ?>
<form action="<?php echo base_url('wallet/create') ?>" method="post"  class="form-horizontal">
<?php } else {?>
<?php } ?>
              
 				<div class="form-group row">
					<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Wallet</label>
					<input value="<?php echo $wallet; ?>" type="text" class="form-control" name="wallet" id="wallet" readonly>
				</div>
 				<div class="form-group row">
					<label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Withdrawal Amount *</label>
					<input  type="number" class="form-control" name="tamount" id="tamount">
					<span class="alert alert-danger" id="error" style="display: none;">Insufficient balance</span>
				</div>
			 <div class="form-group row">
					<label for="tds" class="col-sm-12 col-form-label"><span style="color:red"></span>TDS Amount </label>
					<input value="" type="number" class="form-control" name="tds" id="tds" readonly>
				</div>
			 <div class="form-group row">
					<label for="nbalance1" class="col-sm-12 col-form-label"><span style="color:red"></span>New Balance</label>
					<input value="" type="number" class="form-control" name="nbalance1" id="nbalance1" readonly>
				</div>
                                     
                                        <input type="hidden" name="nbalance" id="nbalance1" value="0">      
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tpassword"> Transfer Password *</label>
                                            <input type="text" class="form-control"  required="required" name="tpassword" placeholder="Transfer Password">
                                        </div>
										
<?php  if(($wallet) > 0){ 
          echo "<div class='form-group row'>
					<label for='transfer_payment' class='col-sm-12 col-form-label'><span style='color:red'></span>Transfer Payment</label>
					<input required='requiered' type='text' class='form-control' name='transfer_payment' placeholder='Enter Transfer Payment'>
				</div>";
		} else {
         echo "";
 } ?>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php  if(($wallet) > 0){ 
		 echo "<button type='submit' class='btn btn-primary'>Transfer Now</button>";
		} else {
		 echo "<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>";
 } ?>
  </form>
</div>
</div>
</div>
</div> 
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

 <link rel="stylesheet" href="http://localhost/nalavariyam.org/org/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="http://localhost/nalavariyam.org/org/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="http://localhost/nalavariyam.org/org/assets/plugins/select2/js/select2.full.min.js"></script>

  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		 <script type="text/javascript">
    $("#tamount").keyup(function(){
        var getval = parseInt(this.value);
        var bal = parseInt($('#avilable_balance').val());
        var bal2 = parseInt($('#balance').val());
        if(getval) {
            if(bal < getval) {
                $("#error").css("display", "block");
                $('#nbalance').val(0); 
            } else {
                var tds = (getval/100) * 15;
                $('#tds').val(tds);
				var rebirth = (getval/100) * 10;
                $('#rebirth').val(rebirth);
                var myamount = getval - tds - rebirth;
                $('#myamount').val(myamount);


               var res = bal2 - getval;
                $('#nbalance').val(res); 
                $('#nbalance1').val(res); 
                $("#error").css("display", "none");
            }
        } else {
            $("#error").css("display", "none");
            $('#nbalance').val(0); 
        }
    });

    $('.submit-form').on('submit', function(){
        $('.submit-button').attr('disabled', 'true');
    })
</script>  