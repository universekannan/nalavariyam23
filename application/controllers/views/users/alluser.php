<div class="content-wrapper">   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                          </div>
              <!-- /.card-header -->
              <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th> S No</th>
                  <th> Referral</th>
                  <th> Group</th>
                  <th> District</th>
                  <th> Taluk</th>
                  <th> Name</th>

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th> Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                     <?php
  foreach($data as $row) { ?> 
  <tr>
    <td> <?php echo $row->id; ?></td>
    <td> <?php echo $row->referral_id; ?></td>
    <td> <?php echo $row->group_id; ?></td>
    <td> <?php echo $row->dist_id  ; ?></td>
    <td> <?php echo $row->taluk_id; ?></td>
    <td> <?php echo $row->full_name; ?></td>

                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>

                          <?php if(in_array('updateUser', $user_permission)): ?>
                <a href="<?php echo base_url('wallet/userwallet/') ?><?php echo $row->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-upload" title="Push to Government Website"> Wa </i></a>

             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?>"><i class="fa fa-eye">View</i> </button>

                          <?php endif; ?>
                        </td>
                      <?php endif; ?>

                      </tr>
            <div class="modal fade" id="modal-default<?php echo $row->id; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><?php echo $row->full_name; ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<span class="dropdown-item dropdown-header">
<img src="<?php echo base_url('assets/dist/img/'.$row->profile_photo) ?>"  class="img-circle elevation-2 " style="width: 25%; height: auto;">
</span>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->id; ?> </label>
</div>

<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>District </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->dist_id; ?> </label>
</div>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Taluk </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->taluk_id; ?> </label>
</div>

<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Email </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->email; ?> </label>
</div>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Password </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->pas; ?> </label>
</div>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Phone </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->phone; ?> </label>
</div>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Status </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->status; ?> </label>
</div>

</div>
<div class="modal-footer justify-content-between">
<a type="" class=""></a>
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>

</div>
            <?php } ?>
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
      $("#UsersView").addClass('active');
    });
  </script>
       