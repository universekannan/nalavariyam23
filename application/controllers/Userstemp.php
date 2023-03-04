<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		$this->load->model('model_auth');
		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('Model_service');
		$this->load->model('model_payments');
  
  
	}
	
	public function index()
	{
		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
        $referral_id = '1';
	    $this->data['data'] = $this->model_users->send_data_one('users','referral_id',$referral_id);
		
		$this->render_templates('users/index', $this->data);
	}

		public function alluser()
	{
		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $this->data['data'] = $this->model_users->send('users');
		
		$this->render_templates('users/alluser', $this->data);
	}
	
		public function mlm($service_id)
	{
	
		$Service_data = $this->Model_service->getServiceFile($service_id); 
		$this->data['Service_data'] = $Service_data;
		$group_id = $this->session->userdata('group_id');
		
        $users_id = $this->session->userdata('id');
		$Group_data = $this->Model_service->getGroupData($group_id); 
		$this->data['Group_data'] = $Group_data;
		
		$In_Payment = $this->model_payments->getInPayment($users_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($users_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
				 //print_r($user_data);die;

		$this->render_templates('users/mlm', $this->data);
	}

public function userpay()
	{

    $users_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($users_id);
	  $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($users_id);
	  $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;


if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')) {
$one_pay ='2';
} if(($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')) {
$one_pay ='3';
}

  $amount =$this->input->post('admin_amount');

  $data = array(
        'log_id'  => $users_id,
        'from_id' => $one_pay,
        'to_id'   => $users_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  //print_r($data);die;

  $insert = $this->db->insert('payment', $data);

  $datas = array(
        'log_id'  => $users_id,
        'from_id' => $users_id,
        'to_id'   => $one_pay,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'In Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($datas);die;
  $insert = $this->db->insert('payment', $datas);

 $from_to_date = date('y-m-d',strtotime('+ 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Active',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);

      redirect('users/viewcenter', 'refresh');

		$this->render_templates('users/paymlm', $this->data);
	}


public function freeuserpay()
	{
 $from_to_date = date('y-m-d',strtotime('- 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Inactive',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);

      redirect('users/viewcenter', 'refresh');

		$this->render_templates('users/paymlm', $this->data);
	}

		public function fffffff()
	{
	

        $users_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($users_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($users_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;

if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){

if($this->session->userdata('group_id') == '4') {
$one_pay ='2';
} if($this->session->userdata('group_id') == '5') {
$one_pay ='3';
}

if(($this->session->userdata('dist_id') == $this->input->post('dist_id') )) {
 $amount =$this->input->post('admin_amount');
} else{
 $amount =$this->input->post('admin_amount');
}

  $data = array(
        'log_id'  => $users_id,
        'from_id' => $one_pay,
        'to_id'   => $users_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  $insert = $this->db->insert('payment', $data);

  $datas = array(
        'log_id'  => $users_id,
        'from_id' => $users_id,
        'to_id'   => $one_pay,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'In Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $datas);

     $from_to_date = date('y-m-d',strtotime('+ 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Active',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);

} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){
if($this->session->userdata('group_id') == '6') {
$one_pay ="2";
} if($this->session->userdata('group_id') == '7') {
$one_pay ="3";
}

if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
	$amount =$this->input->post('admin_amount') / 2;
   } else{
	$amount =$this->input->post('admin_amount') / 2;
   }

$data = array(
	'log_id'  => $users_id,
	'from_id' => $one_pay,
	'to_id'   => $users_id,
	'amount'  => $amount,
	'ad_info' => $this->input->post('family_id'),
	'service_status' => 'Out Payment',
	'time' => date('h:i:sa'),
	'paydate' => date('Y-m-d')
	);
$insert = $this->db->insert('payment', $data);

$datas = array(
	'log_id'  => $users_id,
	'from_id' => $users_id,
	'to_id'   => $one_pay,
	'amount'  => $amount,
	'ad_info' => $this->input->post('family_id'),
	'service_status' => 'In Payment',
	'time' => date('h:i:sa'),
	'paydate' => date('Y-m-d')
	);
//print_r($data);die;
$insert = $this->db->insert('payment', $datas);

$one_pay = $this->session->userdata('referral_id');

  $data = array(
        'log_id'  => $users_id,
        'from_id' => $one_pay,
        'to_id'   => $users_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  $insert = $this->db->insert('payment', $data);

  $datas = array(
        'log_id'  => $users_id,
        'from_id' => $users_id,
        'to_id'   => $one_pay,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'In Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $datas);

     $from_to_date = date('y-m-d',strtotime('+ 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Active',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);

} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

if($this->session->userdata('group_id') == '10') {
$one_pay ='2';
} if($this->session->userdata('group_id') == '11') {
$one_pay ='3';
}

if($this->session->userdata('group_id') == '10') {
$one_pay = $this->session->userdata('referral_id');
} if($this->session->userdata('group_id') == '11') {
$one_pay = $this->session->userdata('referral_id');
}


if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
 $amount =$this->input->post('admin_amount');
} else{
 $amount =$this->input->post('admin_amount');
}

  $data = array(
        'log_id'  => $users_id,
        'from_id' => $one_pay,
        'to_id'   => $users_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  $insert = $this->db->insert('payment', $data);

  $datas = array(
        'log_id'  => $users_id,
        'from_id' => $users_id,
        'to_id'   => $one_pay,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'In Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $datas);

     $from_to_date = date('y-m-d',strtotime('+ 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Active',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);
   

} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){

if($this->session->userdata('group_id') == '8') {
$one_pay ='2';
} if($this->session->userdata('group_id') == '9') {
$one_pay ='3';
}

$sql="Select * from groups_list where id = '$group_id' order by id desc limit 1 ";  

$sql="Select * from users where id = '$group_id' order by id desc limit 1 ";    

$query = $this->db->query($sql);
$data = $query->row();
$admin_amount = $data->admin_amount;
$renew_payment = $data->renew_payment;
if($data){ 


if($this->session->userdata('group_id') == '8') {

} if($this->session->userdata('group_id') == '9') {

}


if(($this->session->userdata('panchayath_id') == $this->input->post('panchayath_id') )) {
 $amount =$this->input->post('admin_amount');
} else{
 $amount =$this->input->post('admin_amount');
}

  $data = array(
        'log_id'  => $users_id,
        'from_id' => $one_pay,
        'to_id'   => $users_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  $insert = $this->db->insert('payment', $data);

  $datas = array(
        'log_id'  => $users_id,
        'from_id' => $users_id,
        'to_id'   => $one_pay,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'In Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $datas);

     $from_to_date = date('y-m-d',strtotime('+ 365 day'));
     $customerID = $this->input->post('custmor_id');
     
    $datas = [
         'from_to_date' => $from_to_date,
         'status' => 'Active',
            ];

   $update = $this->model_users->update('users',$datas,'id',$customerID);
   }


if(($this->input->post('group_id') ==12) || ($this->input->post('group_id') ==13)) {

      redirect('users/viewcenter', 'refresh');

} if(($this->input->post('group_id') ==8) || ($this->input->post('group_id') ==9)) {

      redirect('users/viewpanchayathusers', 'refresh');

} if(($this->input->post('group_id') ==10) || ($this->input->post('group_id') ==11)) {

      redirect('users/viewblockuser', 'refresh');

} if(($this->input->post('group_id') ==6) || ($this->input->post('group_id') ==7)) {

      redirect('users/viewtalukusers', 'refresh');
}
     

		$this->render_templates('users/paymlm', $this->data);
	}
}

    public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'password' => $password,
        		'dist_id' => $this->input->post('dist_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
				'group_id' => $this->input->post('group_id'),
				'status' => $this->input->post('status'),
				'profile_photo' => 'logo.png',

        	);
//print_r($data);die;

        	$create = $this->model_users->create($data, $this->input->post('group_id'));
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
					if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users/viewdistrictusers/5', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers/5', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers/6', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers/7', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers/8', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers/9', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/viewcenter', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/viewcenter', 'refresh');
		        }
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;

            $this->render_template('users/create', $this->data);
        }	
	}
	

	public function edit()
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$id =  $this->uri->segment(4);
		if($id) {
 			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('full_name', 'First name', 'trim|required');
			$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'email' => $this->input->post('email'),
		        		'full_name' => $this->input->post('full_name'),
		        		'aadhaar_no' => $this->input->post('aadhaar_no'),
		        		'phone' => $this->input->post('phone'),
        		        'dist_id' => $this->input->post('dist_id'),
		        		'status' => $this->input->post('status'),
						'group_id' => $this->input->post('group_id'),
						'permanent_address_1' => $this->input->post('permanent_address_1'),
		        	);
//print_r($data);die;
	         $update = $this->model_users->update('users',$data,'id',$id);

			if(!empty($_FILES['photo']['name']))
				{
					if($_FILES['photo']['size']!=0)
					{
						if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/users/';
						  
							$image_details = getimagesize($_FILES['photo']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['photo']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/users/'.$newFileName;
	
								$update_data=array('prphoto' =>$photo_name);
	
								 $update = $this->model_users->updates('users',$update_data,'id',$id);
																	   
							}
						}
					}
				}
				if(!empty($_FILES['signature2']['name']))
				{
					if($_FILES['signature2']['size']!=0)
					{
						if(is_uploaded_file($_FILES['signature2']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'/assets/upload/off/';
						  
							$image_details = getimagesize($_FILES['signature2']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['signature2']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'/assets/upload/off/'.$newFileName;
	
								$update_data=array('signature2' =>$photo_name);
	
								 $update = $this->model_users->update('users',$update_data,'id',$id);
																	   
							}
						}
					}
				}

		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
                 if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/viewcenter', 'refresh');
				 } if($this->input->post('group_id') == '13') {
					redirect('users/viewcenter', 'refresh');
		        }
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'full_name' => $this->input->post('full_name'),
			        		'aadhaar_no' => $this->input->post('aadhaar_no'),
			        		'phone' => $this->input->post('phone'),
                     		'dist_id' => $this->input->post('dist_id'),
			        		'gender' => $this->input->post('gender'),
		        		    'status' => $this->input->post('status'),
						    'group_id' => $this->input->post('group_id'),

			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('group_id'));
			        	if($update == true) {
                        $this->session->set_flashdata('success', 'Successfully created');
                 if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/viewcenter', 'refresh');
				 } if($this->input->post('group_id') == '13') {
					redirect('users/viewcenter', 'refresh');
		        }
		        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
		        }
	        }
	        else {
	            // false case
			$referral_id = $this->session->userdata('id');
	        $this->data['group_data'] = $this->model_groups->getGroupData();
 if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
 			$this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);
 } else {
			$this->data['user_data'] = $this->model_users->send_data_two_row('users','id',$id,'referral_id',$referral_id);
 }
			$this->data['district_data'] = $this->model_users->getDistrict(0); 
			$this->data['taluk_data'] = $this->model_users->getTaluk(0);
			$this->data['panchayath_data'] = $this->model_users->getPanchayath(0);
			//print_r($panchayath_data);die;
			$this->render_template('users/edit', $this->data);	
	        }
		}	
	}
	public function get_sub_Taluk()
	{ 
		if( $this->input->post('district') >0 ){
			
		  $cat2_data = $this->model_users->getTaluk($this->input->post('district')); 

		  $return = '<option value="">Select Taluk</option>'; 

            foreach($cat2_data as $val) {   
				$return .= '<option value="'.$val['id'].'">'.$val['taluk_name'].'</option>';  
		    } 

		    echo $return; exit;
	    }
	}
	
	public function get_sub_President()
	{ 
		if( $this->input->post('taluk') >0 ){
		  $cat3_data = $this->model_users->getPanchayath($this->input->post('taluk')); 
		  $return = '<option value="">Select Panchayath</option>'; 

            foreach($cat3_data as $val) {   
				$return .= '<option value="'.$val['id'].'">'.$val['panchayath_name'].'</option>';
		    } 
		    echo $return; exit;
	    }
	}
	
	
	public function status()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $id =  $this->uri->segment(4);
		if($id) {
 			$this->form_validation->set_rules('from_to_date', 'Expired Date', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'from_to_date' => $this->input->post('from_to_date'),
		        		'status' => $this->input->post('status'),
		        	);
//print_r($data);die;
	         $update = $this->model_users->update('users',$data,'id',$id);
		        if($update == true) {
		        $this->session->set_flashdata('success', 'Successfully created');
				$groups =  $this->uri->segment(3);
                 if($groups == '1') {
					redirect('users', 'refresh');
				 } if($groups == '2') {
					redirect('users', 'refresh');
				 } if($groups == '3') {
					redirect('users', 'refresh');
		         } if($groups == '4') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($groups == '5') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($groups == '6') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($groups == '7') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($groups == '8') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($groups== '9') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($groups == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($groups == '11') {
					redirect('users/viewblockuser', 'refresh');
				 } if($groups == '12') {
					redirect('users/viewcenter', 'refresh');
				 } if($groups == '13') {
					redirect('users/viewcenter', 'refresh');
		        }
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
					$this->form_validation->set_rules('from_to_date', 'Expired Date', 'trim|required');
			        $this->form_validation->set_rules('status', 'Status', 'trim|required'); 

					if($this->form_validation->run() == TRUE) {

						$data = array(
			        		'from_to_date' => $this->input->post('from_to_date'),
		        		     'status' => $this->input->post('status'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('group_id'));
			        	if($update == true) {
                        $this->session->set_flashdata('success', 'Successfully created');
                if($groups == '1') {
					redirect('users', 'refresh');
				 } if($groups == '2') {
					redirect('users', 'refresh');
				 } if($groups == '3') {
					redirect('users', 'refresh');
		         } if($groups == '4') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($groups == '5') {
					redirect('users/viewdistrictusers', 'refresh');
				 } if($groups == '6') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($groups == '7') {
					redirect('users/viewtalukusers', 'refresh');
				 } if($groups == '8') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($groups== '9') {
					redirect('users/viewpanchayathusers', 'refresh');
				 } if($groups == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($groups == '11') {
					redirect('users/viewblockuser', 'refresh');
				 } if($groups == '12') {
					redirect('users/viewcenter', 'refresh');
				 } if($groups == '13') {
					redirect('users/viewcenter', 'refresh');
		        }
		        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
		        }
	        }
	        else {
	            // false case
	       $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);
			//print_r($panchayath_data);die;
			$this->render_template('users/status', $this->data);	
	        }
		}	
	}
		
	public function adddistrictuser()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            // true case
			$idname = $this->input->post('dist_id');
              $sql="Select * from district where id = $idname order by id";    
              $query = $this->db->query($sql);
              $data1 =  $query->row();
              $districtid = $data1->districtid;
            $uniqueId = rand(111111111, 999999999);
			$username =  'RJ' .$districtid. 'N' .$uniqueId;
			//print_r($username);die;
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $username,
        		'password' => $password,
        		'pas' =>  $this->input->post('password'),
        		'dist_id' => $this->input->post('dist_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('dist_id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
				'group_id' => $this->input->post('group_id'),
				'status' => $this->input->post('status'),
				'from_to_date' => $to_date = date('y-m-d',strtotime('- 2 day')),
        	);
//print_r($data);die;
        	$create = $this->model_users->create($data, $this->input->post('group_id'));
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
					redirect('users/viewdistrictusers', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
			$this->data['district_data'] = $this->model_users->getDistrictLimit(0); 

            $this->render_template('users/add-district-user', $this->data);
        }	
	}
	
	 public function viewdistrictusers()
	{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
if($this->session->userdata('group_id') == '2'){ 
		 
		$group_id = '4';

} if($this->session->userdata('group_id') == '3'){ 
 
        $group_id = '5';
 }

	    $this->data['data'] = $this->model_users->viewdistrictusers($group_id);

		$this->render_templates('users/view-district-user', $this->data);
	} 
	
	public function addtalukusers()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		
		$group_id_ajax =  $this->uri->segment(3);

		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
			$idname = $this->input->post('dist_id');
              $sql="Select * from district where id = $idname order by id";    
              $query = $this->db->query($sql);
              $data1 =  $query->row();
              $districtid = $data1->districtid;
            $uniqueId = rand(111111111, 999999999);
			$username =  'RJ' .$districtid. 'N' .$uniqueId;
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $username,
        		'password' => $password,
        		'pas' =>  $this->input->post('password'),
        		'dist_id' => $this->input->post('dist_id'),
        		'taluk_id' => $this->input->post('taluk_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
				'group_id' => $this->input->post('group_id'),
				'status' => 'Inactive',
				'from_to_date' => $to_date = date('y-m-d',strtotime('- 2 day')),
        	);
//print_r($data);die;
        	$create = $this->model_users->create($data, $this->input->post('group_id'));
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users/viewdistrictusers/5', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers/5', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers/6', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers/7', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers/8', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers/9', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/11', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/12', 'refresh');
		        }
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
			$this->data['district_data'] = $this->model_users->getdistrict(0); 
			$this->data['taluk_data'] = $this->model_users->getTalukLimit(0);
        	$this->data['group_data'] = $group_data;
			$this->data['group_id'] = $group_id_ajax;
			
            $this->render_template('users/add-taluk-user', $this->data);
        }	
	}
	
		public function get_sub_TalukLimit()
	{ 
		if( $this->input->post('cat1') >0 ){
			
			$group_id =  $this->uri->segment(3);

		  $cat2_data = $this->model_users->getTalukLimit($this->input->post('cat1'), $this->input->post('group_id')); 

		  $return = '<option value="">Select Taluk</option>'; 

            foreach($cat2_data as $val) {   
				$return .= '<option value="'.$val['id'].'">'.$val['taluk_name'].'</option>';  
		    } 

		    echo $return; exit;
	    }
	}
	
	public function viewtalukusers()
	{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;
 	    $this->data['data'] = $this->model_users->viewtalukusers();
		$this->render_templates('users/view-taluk-users', $this->data);
	} 
	
	public function addblockuser()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$group_id_ajax =  $this->uri->segment(3);
//print_r($group_id_ajax);die;

		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
			$idname = $this->input->post('dist_id');
              $sql="Select * from district where id = $idname order by id";    
              $query = $this->db->query($sql);
              $data1 =  $query->row();
              $districtid = $data1->districtid;
            $uniqueId = rand(111111111, 999999999);
			$username =  'RJ' .$districtid. 'N' .$uniqueId;
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $username,
        		'password' => $password,
        		'pas' =>  $this->input->post('password'),
        		'dist_id' => $this->input->post('dist_id'),
        		'taluk_id' => $this->input->post('taluk_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
				'group_id' => $this->input->post('group_id'),
				'status' => 'Inactive',
				'from_to_date' => $to_date = date('y-m-d',strtotime('- 2 day')),
        	);
//print_r($data);die;
        	$create = $this->model_users->create($data, $this->input->post('group_id'));
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				   if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/viewblockuser', 'refresh');
		        }
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/addblockuser/'.$group_id_ajax, 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
			$this->data['district_data'] = $this->model_users->getdistrict(0); 
			$this->data['taluk_data'] = $this->model_users->getTalukLimit(0);
        	$this->data['group_data'] = $group_data;
			$this->data['group_id'] = $group_id_ajax;
			
            $this->render_template('users/add-block-user', $this->data);
        }	
	}
	
		public function viewblockuser()
		{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;

 	    $this->data['data'] = $this->model_users->viewblockuser();
		$this->render_templates('users/view-block-user', $this->data);
	} 
	
	public function addpanchayathusers()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
			$group_id_ajax =  $this->uri->segment(3);

		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');
		$this->form_validation->set_rules('panchayath_id', 'Panchayath', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
			$idname = $this->input->post('dist_id');
              $sql="Select * from district where id = $idname order by id";    
              $query = $this->db->query($sql);
              $data1 =  $query->row();
              $districtid = $data1->districtid;
            $uniqueId = rand(111111111, 999999999);
			$username =  'RJ' .$districtid. 'N' .$uniqueId;
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $username,
        		'password' => $password,
        		'pas' =>  $this->input->post('password'),
        		'dist_id' => $this->input->post('dist_id'),
        		'taluk_id' => $this->input->post('taluk_id'),
        		'panchayath_id' => $this->input->post('panchayath_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
				'group_id' => $this->input->post('group_id'),
				'status' => 'Inactive',
				'from_to_date' => $to_date = date('y-m-d',strtotime('- 2 day')),
        	);
//print_r($data);die;
        	$create = $this->model_users->create($data, $this->input->post('group_id'));
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users/viewdistrictusers/5', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers/5', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers/6', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers/7', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers/8', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers/9', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/11', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/12', 'refresh');
		        }
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/add-panchayath-user', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
			$this->data['district_data'] = $this->model_users->getDistrict(0); 
			$this->data['taluk_data'] = $this->model_users->getTaluk(0);
			$this->data['panchayath_data'] = $this->model_users->getPanchayathLimit(0);
			
        	$this->data['group_data'] = $group_data;
			$this->data['group_id'] = $group_id_ajax;

            $this->render_template('users/add-panchayath-user', $this->data);
        }	
	}
	
	
	
	
		public function viewpanchayathusers()
	{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;

  	    $this->data['data'] = $this->model_users->viewpanchayathusers();
		$this->render_templates('users/view-panchayath', $this->data);
	}
	
	public function addcenterusers()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
			$group_id_ajax =  $this->uri->segment(3);

		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhaar No', 'trim|required');
		$this->form_validation->set_rules('panchayath_id', 'Panchayath', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
			$idname = $this->input->post('dist_id');
              $sql="Select * from district where id = $idname order by id";    
              $query = $this->db->query($sql);
              $data1 =  $query->row();
              $districtid = $data1->districtid;
            $uniqueId = rand(111111111, 999999999);
			$username =  'RJ' .$districtid. 'N' .$uniqueId;
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $username,
        		'password' => $password,
        		'pas' =>  $this->input->post('password'),
        		'dist_id' => $this->input->post('dist_id'),
        		'taluk_id' => $this->input->post('taluk_id'),
        		'panchayath_id' => $this->input->post('panchayath_id'),
        		'email' => $this->input->post('email'),
        		'log_id' => $this->session->userdata('id'),
        		'referral_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
				'group_id' => $this->input->post('group_id'),
				'status' => 'Inactive',
				'from_to_date' => $to_date = date('y-m-d',strtotime('- 2 day')),
				);
//print_r($data);die;
        	$create = $this->model_users->create($data, $this->input->post('group_id'));
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				if($this->input->post('group_id') == '1') {
					redirect('users', 'refresh');
				 } if($this->input->post('group_id') == '2') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '3') {
					redirect('users/viewdistrictusers/5', 'refresh');
		         } if($this->input->post('group_id') == '4') {
					redirect('users/viewdistrictusers/4', 'refresh');
				 } if($this->input->post('group_id') == '5') {
					redirect('users/viewdistrictusers/5', 'refresh');
				 } if($this->input->post('group_id') == '6') {
					redirect('users/viewtalukusers/6', 'refresh');
				 } if($this->input->post('group_id') == '7') {
					redirect('users/viewtalukusers/7', 'refresh');
				 } if($this->input->post('group_id') == '8') {
					redirect('users/viewpanchayathusers/8', 'refresh');
				 } if($this->input->post('group_id') == '9') {
					redirect('users/viewpanchayathusers/9', 'refresh');
				 } if($this->input->post('group_id') == '10') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '11') {
					redirect('users/viewblockuser', 'refresh');
				 } if($this->input->post('group_id') == '12') {
					redirect('users/viewcenter', 'refresh');
				 } if($this->input->post('group_id') == '13') {
					redirect('users/viewcenter', 'refresh');
		        }
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/addcenterusers/'.$group_id_ajax, 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
			$this->data['district_data'] = $this->model_users->getDistrict(0);
			$this->data['taluk_data'] = $this->model_users->getTaluk(0);
			$this->data['panchayath_data'] = $this->model_users->getPanchayathLimit(0);
			
        	$this->data['group_data'] = $group_data;
			$this->data['group_id'] = $group_id_ajax;
            $this->render_template('users/add-center-users', $this->data);
        }	
	}
	
	public function get_sub_PresidentLimit()
	{ 
		if( $this->input->post('taluk') >0 ){
		  $group_id =  $this->uri->segment(3);
		  $cat2_data = $this->model_users->getPanchayathLimit($this->input->post('taluk'), $this->input->post('group_id')); 
		  $return = '<option value="">Select Panchayath</option>'; 
            foreach($cat2_data as $val) {   
				$return .= '<option value="'.$val['id'].'">'.$val['panchayath_name'].'</option>';
		    } 
		    echo $return; exit;
	    }
	}

		public function viewcenter()
	{
		
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		
		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;

		$this->data['data'] = $this->model_users->viewcenter();
		$this->render_templates('users/view-center-users', $this->data);
	}

	
	
	
	
	
	
		public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	
	public function delete($id)
	{

		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	public function profile()
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
			$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('full_name', 'First name', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
		        	$data = array(
		        		'full_name' => $this->input->post('full_name'),
		        		'phone' => $this->input->post('phone'),
		        		'aadhaar_no' => $this->input->post('aadhaar_no'),
		        		'gender' => $this->input->post('gender'),
						'permanent_address_1' => $this->input->post('permanent_address_1'),
						'upi' => $this->input->post('upi'),
						'status' => $this->input->post('status'),
		        	);

//print_r($data);die;
	         $update = $this->model_users->update('users',$data,'id',$id);

			if(!empty($_FILES['photo']['name']))
				{
					if($_FILES['photo']['size']!=0)
					{
						if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/users/';
						  
							$image_details = getimagesize($_FILES['photo']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['photo']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/users/'.$newFileName;
	
								$update_data=array('prphoto' =>$photo_name);
	
								 $update = $this->model_users->updates('users',$update_data,'id',$id);
																	   
							}
						}
					}
				}
				if(!empty($_FILES['signature2']['name']))
				{
					if($_FILES['signature2']['size']!=0)
					{
						if(is_uploaded_file($_FILES['signature2']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'/assets/upload/off/';
						  
							$image_details = getimagesize($_FILES['signature2']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['signature2']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'/assets/upload/off/'.$newFileName;
	
								$update_data=array('signature2' =>$photo_name);
	
								 $update = $this->model_users->update('users',$update_data,'id',$id);
																	   
							}
						}
					}
				}
				if(!empty($_FILES['upi_qr']['name']))
				{
					if($_FILES['upi_qr']['size']!=0)
					{
						if(is_uploaded_file($_FILES['upi_qr']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/upi_qr/';
						  
							$image_details = getimagesize($_FILES['upi_qr']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'upi_qr_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['upi_qr']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/upi_qr/'.$newFileName;
	
								$update_data=array('payment_qr_oode' =>$photo_name);
	
								 $update = $this->model_users->updates('users',$update_data,'id',$id);
							}
						}
					}
				}
                    if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/profile', 'refresh');
		        	}
					
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/profile', 'refresh');
		        	}
	        }
	        else {
	            // false case
			$id = $this->session->userdata('id');
	        $this->data['group_data'] = $this->model_groups->getGroupData();
			$this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);

			$this->data['district_data'] = $this->model_users->getDistrict(0); 
			$this->data['taluk_data'] = $this->model_users->getTaluk(0);
			$this->data['panchayath_data'] = $this->model_users->getPanchayath(0);
			//print_r($panchayath_data);die;
			$this->render_template('users/profile', $this->data);	
	        }
		}	
	}

	public function setting()
	{

		if(!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'full_name' => $this->input->post('full_name'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
						'log_id' => $this->session->userdata('id'),
						'group_id' => $this->input->post('group_id'),
		        	);

		        	$update = $this->model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'full_name' => $this->input->post('full_name'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
					     	'log_id' => $this->session->userdata('id'),
					      	'group_id' => $this->input->post('group_id'),

			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('group_id'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	}

public function change_pwd()
	{
		
		$user_id = $this->session->userdata('id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->model_auth->get_user_detail();
			
		        $this->render_template('auth/change_pwd', $data);
			}
			else{
				$data = array(
				    'pas' =>  $this->input->post('password'),
					'password' => $this->password_hash($this->input->post('password'))
				);
				 $id=$user_id;
		     
				$data = $this->security->xss_clean($data);
				$result = $this->model_auth->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('users/change_pwd'),'refresh');
					
				}
			}
		}
		else{
		$group_id = $this->session->userdata('id');
		$is_admin = ($group_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;	
		$this->render_template('auth/change_pwd', $this->data);
	}


    }

}