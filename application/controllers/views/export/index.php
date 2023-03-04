<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Details </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		      	 <a href="<?php echo base_url('export/export_csv') ?>">Export</a><br><br>

   <!-- User Records --> 
   <table border='1' style='border-collapse: collapse;'> 
     <thead> 
      <tr> 
       <th>is</th> 
       <th>Name</th> 
       <th>Tamil</th> 
      </tr> 
     </thead> 
     <tbody> 
     <?php
	 if($usersData):    
     foreach($usersData as $k => $v): ?>
       <tr>
	  <td> <?php echo $v['id']; ?></td>
	  <td> <?php echo $v['full_name']; ?></td>
	  <td> <?php echo $v['full_name_tamil']; ?></td>
       </tr>
    <?php endforeach ?>
                  <?php endif; ?>
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
		   