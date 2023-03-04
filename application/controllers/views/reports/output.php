 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
         <style>
.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
    webkit-flex: 1 1 auto;
    ms-flex: 1 1 auto;
    flex: 1 1 auto;
    max-width:800px;
    padding: 0rem;
}

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
<div class="parent">
  <?php
    $customer_id =  $this->uri->segment(4);
    $sql="Select * from payments where customer_id = $customer_id order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data =  $query->row();
  ?>
  <img class="image1" src="<?php echo $data->from_image; ?>" />
 
</div>
<br>
<br>
          </div>
          </div>
		  <p><?php echo $servicedata['upload'] ?></p>
</br>
<a href="<?php echo $servicedata['submitting_url']; ?>" target="_blank"><?php echo $servicedata['submitting_url']; ?></a>

		   <center><a href="<?php echo $data->from_image; ?>" download> <button class="btn"><i class="fa fa-download"></i> Download</a></button> </center>
          </div>
          </div>
    </section>
	   <script type="text/javascript">
    $(document).ready(function() {
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesCreate").addClass('active');
    });
  </script>