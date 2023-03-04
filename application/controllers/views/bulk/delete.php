

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center> 
      <h1>
        Delete
        <small>Orders</small>
      </h1>
    </center>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
           <div class="row">
        <div class="col-md-3">  </div>
        <div class="col-md-6">
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <h1>Do you really want to remove ?</h1>

          <form action="<?php echo base_url('bulk/delete/'.$id) ?>" method="post">
            <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
            <a href="<?php echo base_url('bulk') ?>" class="btn btn-warning">Cancel</a>
          </form>

        </div>
                <div class="col-md-3">  </div>

        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


