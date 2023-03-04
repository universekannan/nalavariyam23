<style>
img{
max-width:400px;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1>  </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><?php echo $servicedata['service_name']; ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
			  
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
    max-width:500px;
    padding: 0rem;
}
.image2 {
  position: absolute;
  top: 650px;
  left: 200px;
  max-width:200px;
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
  <img class="image1" src="<?php echo $servicedata['from_image'] ?>" />
  <img style ="position: absolute; marge_bottom: <?php echo $servicedata['marge_bottom'] ?>px; marge_left: <?php echo $servicedata['marge_right'] ?>px; max-width:170px;" src="<?php echo base_url('assets/upload/off/1.png') ?>" />

</div>
              </div>
 



              <div class="col-md-6">
                  </div>
              </div>
            </div>
          </div>
         </div>
       </div>
   <script type="text/javascript">
    $(document).ready(function() {
      $("#Service").addClass('menu-open');
      $("#Services").addClass('active');
      $("#ServicesCreate").addClass('active');
    });
  </script>