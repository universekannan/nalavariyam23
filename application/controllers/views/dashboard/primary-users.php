 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
		<center><img src="<?php echo base_url('assets/dist/img/header.png') ?>"></center>
		<?php
$to_date = date("Y-m-d");
$from_date =date("Y-m-d",strtotime("- 365 day"));
$user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_date' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ ?>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
<?php $group_id = $this->session->userdata('group_id');
$sql="Select * from groups_list where id = '$group_id' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    $user_payment = $data->user_payment;
    $renew_payment = $data->renew_payment;
	 if($data){ 
      if($status = $this->session->userdata('status') == 'Inactive'){ ?>
            <center><h1>Your account has been expired</h1></br>
				<a href="<?php echo base_url('Payments/checks') ?>" class="btn btn-primary btn-sm" title="Pay"><i class="fas fa-rupee-sign"> Pay Now <?php echo $user_payment; ?></i> </a></br></br>
            </center>
     <?php } if($status = $this->session->userdata('status') == 'Active'){ ?>
            <center><h1>Your account has been expired</h1></br>
				<a href="<?php echo base_url('Payments/checks') ?>" class="btn btn-primary btn-sm" title="Pay"><i class="fas fa-rupee-sign"> Pay Now <?php echo $renew_payment; ?></i> </a></br></br>
            </center>	 
	 <?php } } ?>
          </div>
        </div>
      </div>
    </section>
      <?php  } else{ ?>
 <div class="row">
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $District; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>District Presidents</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>District Secretarys</p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
<?php if($this->session->userdata('group_id') == '2'){ ?>
              <a href="<?php echo base_url('users/viewdistrictusers/4') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
              <a href="<?php echo base_url('users/viewdistrictusers/5') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
<?php } ?>        
            </div>
          </div>
          <!-- ./col -->
<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Taluk; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>Taluk Presidents</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>Taluk Secretarys</p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
<?php if($this->session->userdata('group_id') == '2'){ ?>
              <a href="<?php echo base_url('users/viewtalukusers/6') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
              <a href="<?php echo base_url('users/viewtalukusers/7') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
<?php } ?>            </div>
          </div>
         <!-- ./col -->
<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Panchayath; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>Panchayath Presidents</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>Panchayath Secretarys</p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col --> 
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Block_User; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>Block Presidents</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>Block Secretarys</p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewblockuser') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
		<div class="row">
		
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $Center; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>Center</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>Center </p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewcenter') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $Customers; ?></h3>
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <p>Customers</p>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <p>Customers </p>
<?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('customers') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		<div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
			  <?php $wallet = $In_Payment - $Out_Payment; ?>
              <h3><?php echo(round($wallet)); ?></h3>
                <p>Wallet</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('wallet') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $SpecialUsers; ?></h3>
                <p>Special Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('users/superusers') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<?php if(in_array('viewNotipikesan', $user_permission)): ?>
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $Notipikesan; ?></h3>
                <p>Notipikesan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('notipikesan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<?php endif; ?>
        </div>
		<?php }?>
	 
       
 <div class="row">
 		  <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $Follow_Up; ?></h3>
                <p>Follow Up</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('users/followup') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <center>
                         <img src="https://nalavariyam.com/wp-content/uploads/2021/09/ramji.jpg" class="img-circle elevation-2"style="width:150px">
                <h3><p>K.Hawkins BE</p></h3>
				</center>
              </div>
              <a href="" class="small-box-footer"> State President</a>
            </div>
          </div>
          <!-- ./col -->
          
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
<center>
                         <img src="https://nalavariyam.com/wp-content/uploads/2021/09/sarita.jpg" class="img-circle elevation-2"style="width:150px">
                <h3><p>Mrs G. Saritha B.Sc</p></h3>
				</center>
              </div>
              <a href="" class="small-box-footer">State Secretary</a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
<center>
                         <img src="https://nalavariyam.com/wp-content/uploads/2021/09/rajam.jpg" class="img-circle elevation-2"style="width:150px">
                <h3><p>Mrs. G. Rajam</p></h3>
				</center>
              </div>
              <a href="" class="small-box-footer">State Treasurer  </a>
            </div>
          </div>
		 
          <!-- ./col -->
        </div>
		 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Dashboard").addClass('active');
    });
  </script>