<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://nalavariyam.com/app/dashboard" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/logo.png') ?>" alt="Nalavariyam Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nalavariyam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('full_name'); ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<?php if($this->session->userdata('group_id') == '1'){ ?>
	  <li class="nav-item">
            <a id="Dashboard" href="<?php echo base_url('dashboard/superadmin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
           Dashboard
              </p>
            </a>
      </li>
<?php } if($this->session->userdata('group_id') == '2'){ ?>
		<li class="nav-item">
            <a id="Dashboard" href="<?php echo base_url('dashboard/admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
           Dashboard
              </p>
            </a>
      </li>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
					<li class="nav-item">
            <a id="Dashboard" href="<?php echo base_url('dashboard/center') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
           Dashboard
              </p>
            </a>
      </li>
<?php } if($this->session->userdata('group_id') == '5'){ ?>
					<li class="nav-item">
            <a id="Dashboard" href="<?php echo base_url('dashboard/superuser') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
           Dashboard
              </p>
            </a>
      </li>
<?php } ?>
<?php if($this->session->userdata('status') == 'Active'){ ?>

<?php if(in_array('createDistrict', $user_permission) || in_array('updateDistrict', $user_permission) || in_array('ViewDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
          <li id="District" class="nav-item">
            <a id="Districts" href="" class="nav-link">
			  <i class="nav-icon fas fa-atlas"></i>
              <p>
              Districts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   <?php if(in_array('createDistrict', $user_permission)): ?>
              <li class="nav-item">
                <a id="DistrictsCreate" href="<?php echo base_url('districts/create') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add District</p>
                </a>
              </li>
    <?php endif; ?>
    <?php if(in_array('updateDistrict', $user_permission) || in_array('viewDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
          	<li class="nav-item">
                <a id="viewDistricts" href="<?php echo base_url('districts/view') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Districts</p>
                </a>
              </li>
    <?php endif; ?>

            </ul>
          </li>
<?php endif; ?>
<?php if(in_array('createService', $user_permission) || in_array('viewService', $user_permission) || in_array('viewApplicant', $user_permission) || in_array('updateService', $user_permission) || in_array('deleteService', $user_permission)): ?>

		   <li id="Service" class="nav-item">
            <a id="Services" href="" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
              Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   <?php if(in_array('createService', $user_permission)): ?>
              <li class="nav-item">
                <a id="ServicesCreate" href="<?php echo base_url('service/create') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Service</p>
                </a>
              </li>
    <?php endif; ?>
    <?php if(in_array('updateService', $user_permission) || in_array('viewService', $user_permission) || in_array('viewApplicant', $user_permission) || in_array('deleteService', $user_permission)): ?>
          	<li class="nav-item">
			<a id="ServicesView" href="<?php echo base_url('service/view') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Services</p>
                </a>
              </li>
			  <?php endif; ?>
            </ul>
          </li>
		   <?php endif; ?>

<?php if(in_array('createCustomer', $user_permission) || in_array('viewCustomer',  $user_permission) || in_array('updateCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>

		   <li id="Customer" class="nav-item">
            <a id="Customers" href="" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
              Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<?php if(in_array('createCustomer', $user_permission)): ?> 
             <li class="nav-item">
                <a id="CustomerCreate" href="<?php echo base_url('users/customer') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
    <?php endif; ?>
<?php if(in_array('viewCustomer',  $user_permission) || in_array('updateCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>
<?php if($this->session->userdata('group_id') == '2'){ ?>

		    <li class="nav-item">
			<a id="CustomerView" href="<?php echo base_url('users/viewpublic') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
<?php } if($this->session->userdata('group_id') == '6'){ ?>

		    <li class="nav-item">
			<a id="CustomerView" href="<?php echo base_url('users/centercustomer') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
<?php } if($this->session->userdata('group_id') == '3'){ ?>
		    <li class="nav-item">
			<a id="CustomerView" href="<?php echo base_url('users/centercustomer') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
<?php } ?>
			  <?php endif; ?>
            </ul>
          </li>
<?php endif; ?>
<?php if($this->session->userdata('group_id') == '3'){ ?>
		<li id="BulkPurchase" class="nav-item">
            <a id="BulkPurchases" href="<?php echo base_url('payments/bulkpurchases') ?>" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
             Bulk Purchase 
              </p>
            </a>
         </li>
<?php } if($this->session->userdata('group_id') == '0'){ ?>
		<li id="LifetimePayment" class="nav-item">
            <a id="LifetimePayments" href="" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
             Lifetime Payment 
              </p>
            </a>
         </li>
<?php } ?>
<?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('ViewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

		  <li id="User" class="nav-item">
            <a id="Users" href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
             Users 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   <?php if(in_array('createUser', $user_permission)): ?>              <li class="nav-item">
                <a id="UsersCreate" href="<?php echo base_url('users/create') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
    <?php endif; ?>
    <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

<?php if($this->session->userdata('group_id') == '1'){ ?>

			  <li class="nav-item">
			<a id="AdminView" href="<?php echo base_url('users/admin') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Admin</p>
                </a>
              </li>
			<li class="nav-item">
			<a id="CentersView" href="<?php echo base_url('users/centers') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Centers</p>
                </a>
              </li>
			  <li class="nav-item">
			<a id="SuperuserView" href="<?php echo base_url('users/superuser') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View SuperUsers</p>
                </a>
              </li>
			  <li class="nav-item">
			<a id="SpecialUsersView" href="<?php echo base_url('users/specialusers') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View SpecialUsers</p>
                </a>
              </li>
			  <li class="nav-item">
			<a id="PublicsView" href="<?php echo base_url('users/publics') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Publics</p>
                </a>
              </li>
<?php } if($this->session->userdata('group_id') == '2'){ ?>
		     <li class="nav-item">
			 <a id="CentersView" href="<?php echo base_url('users/viewcenter') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
<?php } if($this->session->userdata('group_id') == '6'){ ?>
		     <li class="nav-item">
			 <a id="CentersView" href="<?php echo base_url('users/viewspecialusers') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
<?php } if($this->session->userdata('group_id') == '5'){ ?>
		     <li class="nav-item">
			 <a id="CentersView" href="<?php echo base_url('users/viewsupercenter') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Centers</p>
                </a>
              </li>
	
<?php } ?>

			   <?php endif; ?>
   
            </ul>
          </li>
<?php endif; ?>
<?php if(in_array('UserSetting', $user_permission) || in_array('RettanApply', $user_permission) || in_array('updateSetting', $user_permission)): ?>
		  <li id="Setting" class="nav-item">
            <a id="Settings" href="" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
              Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   <?php if(in_array('UserSetting', $user_permission)): ?>              <li class="nav-item">
                <a id="UserSetting" href="<?php echo base_url('groups/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Setting</p>
                </a>
              </li>
    <?php endif; ?>
    <?php if(in_array('updateSetting', $user_permission)): ?>
              <li class="nav-item">
			  <a id="PendingApply" href="<?php echo base_url('reports/pendingappeals') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Apply</p>
                </a>
              </li>

			  <li class="nav-item">
			  <a id="RettanApply" href="<?php echo base_url('reports/rettanapplys') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rettan Apply</p>
                </a>
              </li>
			  <li class="nav-item">
			  <a id="BulkPurchases" href="<?php echo base_url('reports/bulkpurchase') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bulk Purchase</p>
                </a>
              </li>
               <li class="nav-item">
                <a id="CustomerCreate" href="<?php echo base_url('users/customer1') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
			<?php endif; ?>  
            </ul>
          </li>
		  <?php endif; ?>
		   <?php } ?>
<?php if(in_array('ProfileEdit', $user_permission) || in_array('updateSetting', $user_permission) || in_array('ViewDistrict', $user_permission) || in_array('deleteDistrict', $user_permission)): ?>
		  <li id="Profile" class="nav-item">
            <a id="Profiles" href="" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
           Profiles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   <?php if(in_array('ProfileEdit', $user_permission)): ?>              <li class="nav-item">
                <a id="ProfileEdits" href="<?php echo base_url('users/profile') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
    <?php endif; ?>
       <li class="nav-item">
                <a id="Password" href="<?php echo base_url('users/change_pwd') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
         <li class="nav-item">
                <a id="Logout" href="<?php echo base_url('auth/logout') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>logout</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>