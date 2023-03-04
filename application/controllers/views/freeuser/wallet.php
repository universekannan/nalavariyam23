<div class="content-wrapper">
      <div class="card-header">
                <h3 class="card-title">Summary</h3>
                 <a href="" data-toggle="modal" data-target="#addpaydate" class="btn btn-primary btn-sm float-sm-right" title="Add Payment "><i class="fas fa-plus"> Add Payment</i> </a>

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
                  <th>UserId</th>
                  <th>Tittels</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th> Debit</th>
                  <th> Credit</th>

                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?>
  <tr>
	  <td><?php echo $row->id; ?></td>
	  <td><?php echo $row->from_id; ?></td>
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
      <td></td>
                   <td>Total</td>
                   <td><?php echo $wallet = $In_Payment - $Out_Payment; ?></td>
                      </tr>
              </table>
			  			
						
<div class="modal fade" id="addpaydate">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Payment</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php 
   if ($this->session->userdata('group_id') == '1'){
$sql="Select * from `users` where `group_id` = '1' order by `id` desc limit 1 ";
 }else if ($this->session->userdata('group_id') == '2'){
$sql="Select * from `users` where `group_id` = '2' order by `id` desc limit 1 ";
 }else if ($this->session->userdata('group_id') == '3'){
$sql="Select * from `users` where `group_id` = '3' order by `id` desc limit 1 ";
    } else {
 $referral_id = $this->session->userdata('referral_id'); 
 $sql="Select * from `users` where `id` = $referral_id order by `id` desc limit 1 ";    
	}
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


</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
 <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>

