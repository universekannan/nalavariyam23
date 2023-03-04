<link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
<section class="content">
   <div class="container">
   <div class="card">
   <div class="card-body">
   <center> <img src="<?php echo base_url('assets/dist/img/header.png') ?>" width="900"></center>
   <hr>
   <div class="row mb-4">
   <?php $users_id = $this->session->userdata('id'); 
      $sql="Select * from `users` where `id` = $users_id order by `id` desc limit 1";
      $query = $this->db->query($sql);
      $datagp =  $query->row();
      $full_name  = $datagp->full_name;
      $phone = $datagp->phone;
      $permanent_address_1= $datagp->permanent_address_1;
      ?>
   <div class="col-sm-6">
          <div><strong>Frem : </strong><?php echo $full_name; ?> </br><?php echo $permanent_address_1 ; ?></div>
   </div>
   <div class="col-sm-6" style="text-align: right;">
   <?php if($this->session->userdata('group_id') == '4'){ ?>
   <div>
   Phone : District Presidents</br>
   <?php } if($this->session->userdata('group_id') == '5'){ ?>
   <div>
   Phone : District Secretarys</br>
   <?php } if($this->session->userdata('group_id') == '6'){ ?>
   <div>
   Phone : Taluk Presidents</br>
   <?php } if($this->session->userdata('group_id') == '7'){ ?>
   <div>
      Phone : Taluk Secretarys</br>
      <?php } if($this->session->userdata('group_id') == '8'){ ?>
      <div>
         Phone : Panchayath Presidents</br>
         <?php } if($this->session->userdata('group_id') == '9'){ ?>
         <div>
            Phone : Panchayath Secretarys</br>
            <?php } if($this->session->userdata('group_id') == '10'){ ?>
            <div>
               Phone : Block Presidents</br>
               <?php } if($this->session->userdata('group_id') == '11'){ ?>
               <div>
                  Phone : Block Secretarys</br>
                  <?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){ ?>
                  <div>Phone : Center</br>
                     <?php } ?>
                     Phone : <?php echo $phone; ?>
                  </div>
               </div>
            </div>
            <hr>
            <?php $customer_id = $this->uri->segment(4); 
               $sql1="Select * from `users` where `id` = $customer_id order by `id` desc limit 1";
               $query = $this->db->query($sql1);
               $datas =  $query->row();
               $customer_name  = $datas->full_name;
               $customer_phone = $datas->phone;
               $customer_address_1= $datas->permanent_address_1;
               ?>
            <div class="row mb-4">
               <div class="col-sm-9">
                  <div>
                     <strong>Bill To : </strong><?php echo $customer_name; ?> </br><?php echo $customer_address_1; ?>.
                  </div>
               </div>
               <div class="col-sm-3">
                  <div style="text-align: right;">
                     <?php $pa_id =$this->uri->segment(4); 
                        $sql="Select * from payments where id= $pa_id order BY id DESC LIMIT 1";    
                        $query = $this->db->query($sql);
                        $data =  $query->row();
                        $invoiceid = $data->id;
                        $service_id = $data->service_id;
                        $amount = $data->amount;
                        $adsional_amount = $data->adsional_amount;
                        ?>
                     <strong>Quotation No : </strong> 00<?php echo $invoiceid; ?></br>
                     <strong>Invoice Date : </strong> <?php echo $date = date('Y-m-d'); ?>
                  </div>
               </div>
            </div>
            <div class="table-responsive-sm">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th class="center">#</th>
                        <th>Service Name</th>
                        <th class="right" style="text-align: right;">Amond</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="center">1</td>
<?php 
                        $sql="Select * from service where id= $service_id order BY id DESC LIMIT 1";    
                        $query = $this->db->query($sql);
                        $datas =  $query->row();
                        $service_name = $datas->service_name;
                        ?>
						
                        <td class="left strong"><?php echo $service_name; ?></td>
						
						
                        <td class="right" style="text-align: right;"><?php echo $amount; ?></td>
                     </tr>
                     <tr>
                        <td class="center">2</td>
                        <td class="left strong">Adsional Amount</td>
                        <td class="right" style="text-align: right;"><?php echo $adsional_amount; ?></td>
                     </tr>
                     <tr>
					 <?php $Total = $adsional_amount + $amount ?>
                        <td class="left"><h5><?php $get_amount= AmountInWords($Total);
                     echo '<b  id="header1">Amount in words : </b>'.$get_amount; ?></h5></td>
                        <td class="left" style="text-align: right;">Total</td>
                        <td class="right" style="text-align: right;"><?php echo $Total = $adsional_amount + $amount ?></td>
						
                     </tr>
                  </tbody>
               </table>
               <!-- <div class="callout">
                  <h5><?php $get_amount= AmountInWords($Total);
                     echo '<b  id="header1">Amount in words : </b>'.$get_amount; ?></h5>
               </div>

              <div class="row">
                  <div class="col-lg-9 col-sm-5">
                     <table class="table table-clear">
                        <tbody>
                           <tr>
                              <td class="left">
                                 </br>
                                 </br>
                                 </br>
                                 </br>
                                 </br>
                                 <strong>Receiver's Signature</strong>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-lg-3 col-sm-5 ml-auto">
                     <table class="table table-clear">
                        <tbody>
                           <tr>
                              <td class="right">
                                 </br>
                                 <img src="" width="150" class="right"></br>
                                 <strong>Authorised Signatory</strong>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>-->
			   	<div class="row no-print">
                <div class="col-12">
				<center><button onClick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print</button></center>

                </div>
              </div>
            </div>
         </div>
      </div>
</section>
</div>
<!-- /.container-fluid -->
<script src="<?php echo base_url('../assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<?php
   function AmountInWords(float $amount)
   {
      $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
      $amt_hundred = null;
      $count_length = strlen($num);
      $x = 0;
      $string = array();
      $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
       $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
       while( $x < $count_length ) {
         $get_divider = ($x == 2) ? 10 : 100;
         $amount = floor($num % $get_divider);
         $num = floor($num / $get_divider);
         $x += $get_divider == 10 ? 1 : 2;
         if ($amount) {
          $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
          $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
          $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
          '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
          '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
           }
      else $string[] = null;
      }
      $implode_to_Rupees = implode('', array_reverse($string));
      $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
      " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
      return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
   }
   ?>
?>
<script>
   $(function () {
     //Initialize Select2 Elements
     $('.select2').select2()
   
     //Initialize Select2 Elements
     $('.select2bs4').select2({
       theme: 'bootstrap4'
     })
</script>	
<script type="text/javascript">
   $(document).ready(function() {	  
     $("#Customer").addClass('menu-open');
     $("#Customers").addClass('active');
     $("#CustomerView").addClass('active');
   });
</script>