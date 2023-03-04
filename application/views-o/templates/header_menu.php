<body class="hold-transition sidebar-collapse dark-mode layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-dark">
<div class="container">
<a href="" class="navbar-brand">
<img src="<?php echo base_url('assets/dist/img/logo.png') ?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8; width:40px;">
<span class="brand-text font-weight-light">NalaVariyam</span>
</a>
<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <ul class="navbar-nav">
     	  <li class="nav-item">
            <a id="Dashboard" href="<?php echo base_url('dashboard') ?>" class="nav-link">
              <p>
           Dashboard
              </p>
            </a>
      </li>
<?php if(in_array('createDistrict', $user_permission) || in_array('updateDistrict', $user_permission) || in_array('ViewDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
<li class="nav-item dropdown">
<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Districts</a>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
 <?php if(in_array('createDistrict', $user_permission)): ?>
<li><a href="<?php echo base_url('districts/create') ?>" class="dropdown-item">Add District</a></li>
    <?php endif; ?>
    <?php if(in_array('updateDistrict', $user_permission) || in_array('viewDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
<li><a href="<?php echo base_url('districts') ?>" class="dropdown-item">View District</a></li>
    <?php endif; ?>
	</ul>
</li>
<?php endif; ?>
<?php if(in_array('createService', $user_permission) || in_array('viewService', $user_permission) || in_array('viewApplicant', $user_permission) || in_array('updateService', $user_permission) || in_array('deleteService', $user_permission)): ?>
<?php if(($this->session->userdata('group_id') == '1') || ($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ ?>

 <li class="nav-item">
            <a id="service" href="<?php echo base_url('service') ?>" class="nav-link">
              <p>
           Services
              </p>
            </a>
      </li>
<?php } ?>
<?php endif; ?>





<?php if(in_array('createCustomer', $user_permission) || in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission) || in_array('AllCustomer', $user_permission)): ?>
<li class="nav-item dropdown">
<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Customers</a>

<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
   <li class="nav-item">
   <?php 
if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')) {
$to_date = date("Y-m-d");
$from_date =date('Y-m-d',strtotime('- 365 day'));
$user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_date' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ ?>
             <li><a href="<?php echo base_url('freeuser') ?>" class="dropdown-item">Customers</a></li>

     <?php } else{ ?>
           	 <li><a href="<?php echo base_url('customers') ?>" class="dropdown-item">Customers</a></li>
	 <?php } ?>
	 <?php } ?>
 <?php 

if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')){ ?>
           	 <li><a href="<?php echo base_url('customers') ?>" class="dropdown-item">Customers</a></li>
			 
<li><a href="<?php echo base_url('bulk') ?>" class="dropdown-item">Bulk Purchas </a></li>
<li><a href="<?php echo base_url('reports') ?>" class="dropdown-item">Billing </a></li>
 <?php } ?>


<?php if(($this->session->userdata('group_id') == '1') || ($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ ?>
 <li><a href="<?php echo base_url('bulk/orders') ?>" class="dropdown-item">Bulk Orders </a></li>

<li><a href="<?php echo base_url('customers/search') ?>" class="dropdown-item">Search</a></li>
<li><a href="<?php echo base_url('customers') ?>" class="dropdown-item"> Customers</a></li>
<li><a href="<?php echo base_url('customers/allcustomers') ?>" class="dropdown-item">All Customers</a></li>

<?php } ?>
</ul>
</li>

<?php endif; ?>






<?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('ViewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
<li class="nav-item dropdown">
<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Users</a>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
   <?php if(in_array('createUser', $user_permission)): ?>
   <li class="nav-item">
<?php if($this->session->userdata('group_id') == '1'){ ?>

<li><a href="<?php echo base_url('users') ?>" class="dropdown-item">View Users</a></li>

<?php } if($this->session->userdata('group_id') == '2'){ ?>

<li><a href="<?php echo base_url('users/alluser') ?>" class="dropdown-item">View  Alluser   </a></li>
<li><a href="<?php echo base_url('wallet/all') ?>" class="dropdown-item">View  all wallet   </a></li>

<li><a href="<?php echo base_url('users/viewdistrictusers') ?>" class="dropdown-item">View District Presidents   </a></li>
<li><a href="<?php echo base_url('users/viewtalukusers') ?>" class="dropdown-item">View Taluk Presidents   </a></li>
<li><a href="<?php echo base_url('users/viewblockuser') ?>" class="dropdown-item">View Block Presidents
</a></li>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">Panchayath Presidents   </a></li>
<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '3'){ ?>
<li><a href="<?php echo base_url('users/alluser') ?>" class="dropdown-item">View  Alluser   </a></li>
<li><a href="<?php echo base_url('wallet/all') ?>" class="dropdown-item">View  all wallet   </a></li>

<li><a href="<?php echo base_url('users/viewdistrictusers') ?>" class="dropdown-item">View District Secretarys </a></li>
<li><a href="<?php echo base_url('users/viewtalukusers') ?>" class="dropdown-item">View Taluk Secretarys   </a></li>
<li><a href="<?php echo base_url('users/viewblockuser') ?>" class="dropdown-item">View Block Secretarys
</a></li>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">Panchayath Secretarys   </a></li>

<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '4'){ ?>

<li><a href="<?php echo base_url('users/viewtalukusers') ?>" class="dropdown-item">View Taluk Presidents   </a></li>
<li><a href="<?php echo base_url('users/viewblockuser') ?>" class="dropdown-item">View Block Presidents</a></li>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">Panchayath Presidents   </a></li>

<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '5'){ ?>
<li><a href="<?php echo base_url('users/viewtalukusers') ?>" class="dropdown-item">View Taluk Secretarys   </a></li>
<li><a href="<?php echo base_url('users/viewblockuser') ?>" class="dropdown-item">View Block Secretarys</a></li>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">Panchayath Secretarys   </a></li>
<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '6'){ ?>

<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">View Panchayath Presidents   </a></li>
<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '7'){ ?>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">View Panchayath Secretarys   </a></li>
<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '8'){ ?>

<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '9'){ ?>
<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>

<?php } if($this->session->userdata('group_id') == '10'){ ?>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">View Panchayath Presidents   </a></li>

<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>
<?php } if($this->session->userdata('group_id') == '11'){ ?>
<li><a href="<?php echo base_url('users/viewpanchayathusers') ?>" class="dropdown-item">View Panchayath Secretarys   </a></li>

<li><a href="<?php echo base_url('users/viewcenter') ?>" class="dropdown-item">View Center</a></li>
<?php } ?> 
   <?php endif; ?>
    <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
	
    <?php endif; ?>
	</ul>
</li>
<?php endif; ?>
<?php if(in_array('UserSetting', $user_permission) || in_array('updateSetting', $user_permission) || in_array('updateSetting', $user_permission)): ?>
 <li class="nav-item">
            <a id="Setting" href="<?php echo base_url('groups/index') ?>" class="nav-link">
              <p>
           Setting
              </p>
            </a>
      </li>
<?php endif; ?>
<?php if(in_array('createCustomer', $user_permission) || in_array('updateDistrict', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>

   <?php 
if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')) {
$to_date = date("Y-m-d");
$from_date =date('Y-m-d',strtotime('- 365 day'));
$user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_date' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ ?>
 <li class="nav-item">
	<a id="wallet" href="<?php echo base_url('freeuser/wallet') ?>" class="nav-link"><p>Wallet</p></a>
</li>
     <?php } else{ ?>
 <li class="nav-item">
	<a id="wallet" href="<?php echo base_url('wallet') ?>" class="nav-link"><p>Wallet</p></a>
</li>
	 <?php } ?>
	 <?php } ?>
	 
 <?php 
if(($this->session->userdata('group_id') == '1') || ($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')){ ?>
         <li class="nav-item">
	<a id="wallet" href="<?php echo base_url('wallet') ?>" class="nav-link"><p>Wallet</p></a>
</li>
 <?php } ?>
 
<?php endif; ?>
<li class="nav-item d-none d-sm-inline-block">
        <a href="tel:7598984380" class="nav-link">+91 7598984380 { 24/7 } </a></li>
    </ul>

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#all"><i class="fa fa-eye"></i> </button>


  


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-user"></i>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">
<img src="<?php echo $this->session->userdata('profile_photo'); ?>"  class="img-circle elevation-2 " style="width: 25%; height: auto;">
</span>

<div class="dropdown-divider"></div>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"><?php echo $this->session->userdata('full_name'); ?>, ID : N <?php echo $this->session->userdata('id'); ?>, User : <?php echo $this->session->userdata('group_id'); ?> </a>
<div class="dropdown-divider"></div>
<div class="dropdown-item">
<a class="btn btn-default  text-muted text-sm" href="<?php echo base_url('users/change_pwd') ?>">Change Password</a>

<a class="btn btn-default float-right text-muted text-sm" href="<?php echo base_url('auth/logout') ?>">Logout</a>
<div class="dropdown-divider"></div>
<?php if($this->session->userdata('group_id') == '1'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"> Super Admin</a>
<?php } if($this->session->userdata('group_id') == '2'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"> Presidents</a>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"> Secretarys</a>
<?php } if($this->session->userdata('group_id') == '4'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">  District Presidents</a>
<?php } if($this->session->userdata('group_id') == '5'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">  District Secretarys</a>
<?php } if($this->session->userdata('group_id') == '6'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
Taluk Presidents</a>
<?php } if($this->session->userdata('group_id') == '7'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
Taluk Secretarys</a>
<?php } if($this->session->userdata('group_id') == '8'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"> Panchayath Presidents</a>
<?php } if($this->session->userdata('group_id') == '9'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer" >Panchayath Secretarys</a>
<?php } if($this->session->userdata('group_id') == '10'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
Block Presidents</a>
<?php } if($this->session->userdata('group_id') == '11'){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
Block Secretarys</a>

<?php } if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
 Center</a>
<?php } if(($this->session->userdata('group_id') == '14') || ($this->session->userdata('group_id') == '15')){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer">
Special Customer</a>
<?php } if(($this->session->userdata('group_id') == '16') || ($this->session->userdata('group_id') == '17')){ ?>
<a href="<?php echo base_url('users/profile') ?>" class="dropdown-item dropdown-footer"> Customers</a>
<?php } ?>
</div>
</div>
</li>

    </ul>
  </nav>
<br>

<div class="modal fade" id="all">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">தொழிற்சங்க விபரம்</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
<?php $dist_id = $this->session->userdata('dist_id'); 
if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ 
   $group_id = '4';
} if(($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ 
   $group_id = '5';
}
$sql="Select * from `users` where `dist_id` = $dist_id and `group_id`='$group_id' order by `id` desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$full_name  = $datagp->full_name;
$phone = $datagp->phone;  ?>
<center>
தமிழ்நாடு ராம்ஜி கட்டுமானம் மற்றும் அமைப்புசார்ந்த அமைப்புசாரா பொது தொழிலாளர்கள் நலசங்கம்</br>
பதிவு எண் : 713/KKM</br>
இபடிவம் தேதி : 11/2/2022</br></br>
<?php echo $full_name; ?></br>
<?php echo $phone; ?></center>

                                 </div>
                                 <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Active</button>
                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>
