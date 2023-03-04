 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
		<center><img src="<?php echo base_url('assets/dist/img/header.png') ?>"></center>
		<?php
$to_date = date("Y-m-d");
$from_date =date('Y-m-d',strtotime('- 365 day'));
$user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_date' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ ?>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1>Your account has been expired</h1></br>
				<a href="<?php echo base_url('') ?>" class="btn btn-primary btn-sm" title="Pay"><i class="fas fa-rupee-sign"> Pay Now</i> </a></br></br>
            </center>
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
              <h3><?php echo $District_Presidents; ?></h3>

                <p>District Presidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewdistrictusers/4') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		  
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $District_Secretarys; ?></h3>
                <p>District Secretarys</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewdistrictusers/5') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Taluk_Presidents; ?></h3>

                <p>Taluk Presidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewtalukusers/6') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Taluk_Secretarys; ?></h3>

                <p>Taluk Secretarys</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/viewtalukusers/7') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col --> <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Panchayath_Presidents; ?></h3>

                <p>Panchayath Presidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/panchayath/8') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col --> <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Panchayath_Secretarys; ?></h3>

                <p>Panchayath Secretarys</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/panchayath/9') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col --> <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Block_Presidents; ?></h3>

                <p>Block Presidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/allsuperuser') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Block_Secretarys; ?></h3>

                <p>Block Secretarys</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/allsuperuser') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Center_Presidents; ?></h3>

                <p>Center Presidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/allsuperuser') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Center_Secretarys; ?></h3>

                <p>Center Secretarys</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('users/allsuperuser') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $Self_Customers; ?></h3>

                <p>Self Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('customers/allselfcustomers') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
		 
        </div>
		      <?php  } ?>

 <div class="row">
 
         <div class="col-lg-4 col-6">
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
          
		   <div class="col-lg-4 col-6">
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
		  <div class="col-lg-4 col-6">
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