<div class="content-wrapper">
  <div class="card-header">
<?php if($this->session->userdata('group_id') == '2'){ ?>
                <h3 class="card-title">District Presidents Details </h3>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
                <h3 class="card-title">District Secretarys Details </h3>
<?php } ?>

<a class="btn btn-primary  btn-sm float-sm-right" data-toggle="modal" data-target="#Add">Add</a>

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
                  <th> S No</th>
                  <th> District</th>
                  <th> Name</th>
                  <th> Email</th>
                  <th> Phone</th>
                  <th> Status</th>
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
	  <td> <?php echo $row->district_name; ?></td>
	  <td> <?php echo $row->full_name; ?></td>
	  <td> <?php echo $row->email; ?></td>
	  <td> <?php echo $row->phone; ?></td>
	  <td> <?php echo $row->status; ?></td>


                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>

<div class="btn-group">
<button type="button" class="btn btn-default">Action</button>
<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu" role="menu">

<a class="dropdown-item" href="<?php echo base_url('users/edit/'.$row->group_id.'/'.$row->id) ?>">Edit</a>
<a class="dropdown-item" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?>">View</a>

 <?php if (($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3'))  { ?>
<a class="dropdown-item" href="<?php echo base_url('users/status/'.$row->group_id.'/'.$row->id) ?>">Status</a>
<a class="dropdown-item" href="<?php echo base_url('wallet/userwallet/'.$row->id) ?>"> User Wallet</a>

<?php } if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')){ ?>

	  <a class="dropdown-item" data-toggle="modal" data-target="#pay<?php echo $row->id; ?>">Status</a>
<a class="dropdown-item" href="<?php echo base_url('wallet/userwallet/'.$row->id) ?>"> User Wallet</a>

	  <?php } ?>

</div>
</div>

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
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>UserName </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->username; ?> </label>
</div>
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>District </label>
<label for="" class="col-sm-8 col-form-label"><span style="color:red"></span><?php echo $row->district_name; ?> </label>
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
                      <center><a class="btn btn-info" href="https://api.whatsapp.com/send?phone=91<?php echo $row->phone; ?>&text=Sir, We are from NalaVariyam , Your Login UserName : <?php echo $row->username; ?>, Password : <?php echo $row->pas; ?>, Contact Us : Mobile 7598984380 Email : ramjitrust039@gmail.com, Websit : www.nalavariyam.com. I have attached your Login website  link below <?php echo base_url() ?>" data-action="share/whatsapp/share" target="_blank">Send Whatsapp</a><center>

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
			   <div class="modal fade" id="Add">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Assigned District User
</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<form action="<?php echo base_url('users/addassigneduser') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
 <?php echo validation_errors(); ?>
       <input type="hidden" name="group" value="<?php echo $this->uri->segment(3) ?>"/>
       <input type="hidden" name="user_id" value="<?php echo $this->uri->segment(4) ?>"/>

<div class="form-group row">
	<label for="district_user_id" class="col-sm-4 col-form-label"><span style="color:red"></span> District</label>
	<div class="col-sm-8">
            <select class="form-control select2bs4" name="district_user_id" style="width: 100%;" required="required">
			       <option value="">Select District Name</option>
<?php foreach($datas as $rows) { 
				  echo '<option value="'.$rows->id.'">'.$rows->district_name.'</option>';
				  }
	  ?>
		 </select>
	</div>
</div>	 
  <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type='submit' class='btn btn-primary'>Submit</button>
                           </form>
                           </div>
                         
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

  <script type="text/javascript">
    $(document).ready(function() {	  
      $("#User").addClass('menu-open');
      $("#Users").addClass('active');
      $("#CentersView").addClass('active');
    });
  </script>
		   