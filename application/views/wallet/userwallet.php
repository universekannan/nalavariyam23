<div class="content-wrapper">
      <div class="card-header">
                <h3 class="card-title">User Wallet Summary</h3>
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