<?php 

class Freeuser extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';
		$this->load->model('model_auth');		
		$this->load->model('Model_service');
		$this->load->model('model_groups');
		$this->load->model('model_users');
		$this->load->model('model_report');
		$this->load->model('model_districts');
		$this->load->model('model_customer');
		$this->load->model('model_payments');
		
		
if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11')) {
	  			redirect('dashboard', 'refresh');
}
	}

	public function index()
	{
		if(!in_array('viewCustomer', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$dist_id = $this->session->userdata('dist_id');
		$referral_id = $this->session->userdata('id');

if ($this->session->userdata('group_id') == '1') {

	    $group_id = '14';
	    $this->data['data'] = $this->model_customer->send_data_one('users','group_id',$group_id);
		
} if (($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3'))  {

	if($this->session->userdata('group_id') == '2'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '3'){
		$group_id = '15';
    }
	
	    $this->data['data'] = $this->model_customer->send_data_one('users','group_id',$group_id);

} if (($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5'))  {

	if($this->session->userdata('group_id') == '4'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '5'){
		$group_id = '15';
    }
	    $this->data['data'] = $this->model_customer->send_data_two('users','group_id',$group_id,'referral_id',$referral_id);
	
} if (($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7'))  {

	if($this->session->userdata('group_id') == '6'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '7'){
		$group_id = '15';
    }
	    $this->data['data'] = $this->model_customer->send_data_two('users','group_id',$group_id,'referral_id',$referral_id);
} if (($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9'))  {

	if($this->session->userdata('group_id') == '8'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '9'){
		$group_id = '15';
    }
	    $this->data['data'] = $this->model_customer->send_data_two('users','group_id',$group_id,'referral_id',$referral_id);
} if (($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11'))  {

	if($this->session->userdata('group_id') == '10'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '11'){
		$group_id = '15';
    }
	    $this->data['data'] = $this->model_customer->send_data_two('users','group_id',$group_id,'referral_id',$referral_id);
} if (($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13'))  {

	if($this->session->userdata('group_id') == '12'){
	    $group_id = '14';
	} else if($this->session->userdata('group_id') == '13'){
		$group_id = '15';
    }
	    $this->data['data'] = $this->model_customer->send_data_two('users','group_id',$group_id,'referral_id',$referral_id);
		
	}
		$this->render_templates('freeuser/index', $this->data);
	
	}

public function wallet()
	{

	    $service_status = 'service_status';
		$customer_id = $this->session->userdata('id');
		
		$In_Payment = $this->model_payments->getInPayment($customer_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($customer_id);
	    $this->data['Out_Payment'] = $Out_Payment;
				//print_r($Out_Payment);die;

		$wallet =  $Out_Payment;

	    $this->data['data'] = $this->model_customer->send_data_one('payment','to_id',$customer_id);

		$this->render_templates('wallet/index', $this->data);
	}
	
public function service($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		  $group_id = $this->session->userdata('group_id');
		  $service_data = $this->Model_service->getServiceData($id);
		  $this->data['service_data'] = $service_data;
		  $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;

		  $this->render_template('freeuser/service', $this->data);			
	}
	
	
	
	public function search()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

			$this->render_template('freeuser/search', $this->data);
        }			

	public function result()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('aadhaar_no', 'Aadhar No.', 'trim|required');
   
        $aadhaar_no = $this->input->post('aadhaar_no');
         $this->data['data'] = $this->model_customer->send_data_one('users','aadhaar_no',$aadhaar_no);

			$this->render_template('freeuser/result', $this->data);
        }		
	
	public function create()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('group_id', 'Group', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('dist_id', 'Dist Id', 'trim|required');
		$this->form_validation->set_rules('aadhaar_no', 'Aadhar No.', 'trim|required|is_unique[users.aadhaar_no]');

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
        		'referral_id' => $this->session->userdata('id'),
        		'log_id' => $this->session->userdata('id'),
        		'full_name' => $this->input->post('full_name'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
				'group_id' => $this->input->post('group_id'),
				'gender' => $this->input->post('gender'),
				'status' => 'Active',
				'followdate' => $this->input->post('followdate'),
				'follow_message' => $this->input->post('follow_message'),
				'pas' => $this->input->post('phone'),
				'full_name_tamil' => $this->input->post('full_name_tamil'),
        		'dist_id' => $this->input->post('dist_id'),
				'taluk_id' => $this->input->post('taluk_id'),
				'panchayath_id' => $this->input->post('panchayath_id'),
        		'date' => $date = date('Y-m-d'),
				'profile_photo' => 'logo.png',
        	);

        	$create = $this->model_customer->create($data, $this->input->post('group_id'));

        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('customers', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('freeuser/create', 'refresh');
        	}
        }
        else {
            // false case
			$dist_id = $this->session->userdata('dist_id');
			$this->data['district_row'] = $this->model_users->send_data_row('district','id',$dist_id);
			$this->data['district_data'] = $this->model_customer->getDistrict(0); 
			$this->data['taluk_data'] = $this->model_customer->getTaluk(0);
			$this->data['panchayath_data'] = $this->model_customer->getPanchayath(0);
					//print_r($user_data);die;

			$this->render_template('freeuser/create', $this->data);
        }			
	}
	

	public function edit($customer_id)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($customer_id) {
		$this->form_validation->set_rules('aadhaar_no', 'Aadhar No.', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
                    $password = $this->password_hash($this->input->post('phone'));
        	$data = array(  
        		'password' => $password,
        		'log_id' => $this->session->userdata('id'),
        		'aadhaar_no' => $this->input->post('aadhaar_no'),
        		'phone' => $this->input->post('phone'),
				'group_id' => $this->input->post('group_id'),
				'followdate' => $this->input->post('followdate'),
				'follow_message' => $this->input->post('follow_message'),
				'pas' => $this->input->post('phone'),
				'full_name_tamil' => $this->input->post('full_name_tamil'),
        		'dist_id' => $this->input->post('dist_id'),
				'taluk_id' => $this->input->post('taluk_id'),
				'panchayath_id' => $this->input->post('panchayath_id'),
				'gender' => $this->input->post('gender'),
				'date' => $date = date('Y-m-d'),
		        	);
//print_r($data);die;

	        $update = $this->model_customer->update('users',$data,'id',$customer_id);

		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('customers', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('freeuser/edit/'.$customer_id, 'refresh');
		        	}
		        }
			        else {
			            // false case
					$dist_id = $this->session->userdata('dist_id');

					$user_data = $this->model_customer->getCustomerData($customer_id);
					$this->data['user_data'] = $user_data;
					$this->data['district_row'] = $this->model_users->send_data_row('district','id',$dist_id);
					
	         		$this->data['district_data'] = $this->model_customer->getDistrict(0); 
			        $this->data['taluk_data'] = $this->model_customer->getTaluk(0);
			        $this->data['panchayath_data'] = $this->model_customer->getPanchayath(0);

					$this->render_template('freeuser/edit', $this->data);	
			        }	

		        }
	        }
	
    public function get_sub_Taluk()
	{ 
		if( $this->input->post('district') >0 ){
			
		  $cat2_data = $this->model_customer->getTaluk($this->input->post('district')); 

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
		  $cat2_data = $this->model_customer->getPanchayath($this->input->post('taluk')); 

		  $return = '<option value="">Select Panchayath</option>'; 

            foreach($cat2_data as $val) {   
				$return .= '<option value="'.$val['id'].'">'.$val['panchayath_name'].'</option>';
		    } 
		    echo $return; exit;
	    }
	}


	public function family($customer_id = null)
	{
		if(!in_array('viewCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
      if($customer_id) {
		$this->form_validation->set_rules('family_member_name', 'Family Member Name', 'required');
		$this->form_validation->set_rules('family_relationship', 'Family Relationship', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $this->session->userdata('id'),
         		'family_member_name' => $this->input->post('family_member_name'),
        		'family_relationship' => $this->input->post('family_relationship'),
				'aadhaar_no' => $this->input->post('aadhaar_no'),
				'date' => $date = date('Y-m-d'),
				'customer_id' => $this->uri->segment(3)
        	);

        	$create = $this->model_customer->create_family($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('freeuser/family/'.$customer_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('freeuser/family', 'refresh');
        	}
        }
        else {
            // false case

        	$this->data['data'] = $this->model_customer->family_data('family_member','customer_id',$customer_id);
            $this->render_template('freeuser/family', $this->data);
        }	
	  }
	}
	
	 
	public function editfamily($family_id = null,$customer_id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
//print_r($customer_id);die;

		if($family_id) {
		$this->form_validation->set_rules('family_member_name', 'Family Member Name', 'required');
		$this->form_validation->set_rules(' ', 'Family Relationship', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $this->session->userdata('id'),
        		'log_id' => $this->session->userdata('id'),
         		'family_member_name' => $this->input->post('family_member_name'),
        		'family_relationship' => $this->input->post('family_relationship'),
				'aadhaar_no' => $this->input->post('aadhaar_no'),
				'date' => $date = date('Y-m-d'),
		        	);

	        	    $update = $this->model_customer->update('family_member',$data,'id',$family_id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('freeuser/family/'.$customer_id, 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('freeuser/editfamily/'.$family_id, 'refresh');
		        	}
		        }
			        else {
			            // false case
				$status = 'Active';
				$this->data['data'] = $this->model_customer->send_data_one('family_member','customer_id',$customer_id);
				// print_r($family_id);die;

				$user_data = $this->model_customer->getfamilyData($family_id);
				$this->data['user_data'] = $user_data;
					
			    $this->render_template('freeuser/editfamily', $this->data);	
			        }	
		        }
	        }
			
			
			
			
	public function nominee($customer_id = null)
	{
		if(!in_array('viewCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$family_id = $this->uri->segment(4);
		if($customer_id) {
			$this->form_validation->set_rules('nominee_name', 'Nominee Name', 'required');
		$this->form_validation->set_rules('n_relationship', 'Nominee Relationship', 'required');
	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        	'nominee_name' => $this->input->post('nominee_name'),
				'n_relationship' => $this->input->post('n_relationship'),
				'date' => $date = date('Y-m-d'),
        		'log_id' => $this->session->userdata('id')
	        	);
	        	$update = $this->model_customer->update('users',$data,'id',$customer_id);
			if(!empty($_FILES['n_document']['name']))
				{
			     if($_FILES['n_document']['size']!=0)
					{
						if(is_uploaded_file($_FILES['n_document']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/n_document/';
							
							$image_details = getimagesize($_FILES['n_document']['tmp_name']);
							$image_extension = image_type_to_extension($image_details[2]);
							$image_name = rand(10, 99);
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							$newTempName = $uploaddir . $newFileName;                 
							if (move_uploaded_file($_FILES['n_document']['tmp_name'], $newTempName)) 
						  	{
						   $photo_name = site_url().'assets/upload/n_document/'.$newFileName;
						   $update_data=array('n_document' =>$photo_name);
						  
							$update = $this->model_customer->update('users',$update_data,'id',$customer_id);
							}
						}
					}
			    } 					
				
				
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('freeuser/family/'.$customer_id, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('freeuser/nominee/'.$customer_id, 'refresh');
	        	}
	        }
	        else {
			$user_data = $this->model_customer->getfamilyData($family_id);
		    $this->data['user_data'] = $user_data;
        	$customer_data = $this->model_customer->getCustomerData($customer_id);
        	$this->data['customer_data'] = $customer_data;
        	$this->render_template('freeuser/nominee', $this->data);	

	        }
		}
	}
	

public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	
	
	public function edu($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		   $service_id = $this->uri->segment('4');
		  $group_id = $this->session->userdata('group_id');

		  $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);

		  $this->data['data'] = $this->model_customer->send_data_ones('family_member','customer_id',$id);
		  
          $this->data['service_data'] = $this->model_users->send_data_row('service','id',$service_id); 

		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);
		  
		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		
		  $this->render_template('freeuser/edu', $this->data);	
	}
	
	public function edudownload($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		   $service_id = $this->uri->segment('5');
		   $ad_info = $this->uri->segment('3');
		  $group_id = $this->session->userdata('group_id');
		  $this->data['data'] = $this->model_customer->send_data_two('payments','service_id',$service_id,'ad_info',$ad_info);
		 $this->render_template('service/edudownload', $this->data);	
		  
	}
		
	public function edunext($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		   $service_id = $this->uri->segment('4');
		  $group_id = $this->session->userdata('group_id');
		  //$this->data['data'] = $this->model_customer->send_data_one('payments','customer_id',$id);



		  $this->data['data'] = $this->model_customer->send_data_one('service_limit','service_id',$service_id);


	    $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		
          $this->data['service_data'] = $this->model_users->send_data_row('service','id',$service_id); //test remu
		  
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		  $this->render_template('freeuser/edunext', $this->data);			
	}

	public function renewal($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		   $service_id = $this->uri->segment('4');
		  $group_id = $this->session->userdata('group_id');
		  $this->data['data'] = $this->model_customer->send_data_one('payments','customer_id',$id);
	    $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		
          $this->data['service_data'] = $this->model_users->send_data_row('service','id',$service_id); //test remu
		  
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		  $this->render_template('freeuser/renewal', $this->data);			
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

		$this->render_templates('freeuser/mlm', $this->data);
	}

	public function paymentupload()
	{
    if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){
$group_ids = '4';
  } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){
$group_ids = '5';
}
		$customer_id = $this->input->post('customer_id');
		$customer_group_id = $this->input->post('customer_group_id');
		$serID = $this->input->post('ser_id');
		$userID = $this->session->userdata('id');
		$distID = $this->session->userdata('dist_id');
		$targetDir = "assets/upload/output/"; 
		$sql="Select * from service where id = $serID order by id desc limit 1 ";    
		$query = $this->db->query($sql);
		$data =  $query->row();
		//print_r($customer_id);die();

$sql="Select * from users where dist_id = $distID and group_id =$group_ids order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$watermarkImagePath = $datag->signature2;

		//print_r($watermarkImagePath);die();
		 
		$statusMsg ='';
			if(!empty($_FILES["photo"]["name"])){ 
				// File upload path 
				$image_name = rand(10, 99);
				$fileName = site_url().'assets/upload/output/outputimage_' . $image_name . '' . date("siGdmy").''.basename($_FILES["photo"]["name"]); 
				$basename='outputimage_' . $image_name . '' . date("siGdmy").''. basename($_FILES['photo']['name']);
				$targetFilePath1 = $targetDir . $basename; 
				$targetFilePath = $fileName; 
						//print_r($fileName);die();

				$fileType = pathinfo($targetFilePath1,PATHINFO_EXTENSION); 
				// Allow certain file formats 
				$allowTypes = array('jpg','png','jpeg'); 

				if(in_array($fileType, $allowTypes)){ 
					// Upload file to the server 
					if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath1)){ 
						//print_r($fileType);die();

						// Load the stamp and the photo to apply the watermark to 
						$watermarkImg = imagecreatefrompng($watermarkImagePath); 
						switch($fileType){ 
							case 'jpg': 
								$im = imagecreatefromjpeg($targetFilePath1); 
								break; 
							case 'jpeg': 
								$im = imagecreatefromjpeg($targetFilePath1); 
								break; 
							case 'png': 
								$im = imagecreatefrompng($targetFilePath1); 
								break; 
							default: 
								$im = imagecreatefromjpeg($targetFilePath1); 
						} 
						 
						// Set the margins for the watermark 
						
		                $marge_right = $data->marge_right; 
		                $marge_bottom = $data->marge_bottom; 

						// Get the height/width of the watermark image 
						$sx = imagesx($watermarkImg); 
						$sy = imagesy($watermarkImg); 
						imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
						 
						// Save image and free memory 
						imagejpeg($im, $targetFilePath1); 
						imagedestroy($im); 
						if(file_exists($targetFilePath1)){ 
					$data = array(
						'from_image'   =>  $targetFilePath,
						'service_id' => $serID,
						'customer_id' => $customer_id,
						'customer_group_id' => $customer_group_id,
						'ad_info' => $this->input->post('ad_info'),
						'family_user_id' => $this->input->post('family_user_id'),
						'log_id' => $userID,
						'service_status' => "Pending",
						'dist_id' => $this->session->userdata('dist_id')
						);
						//print_r($data);die();

						$imagename=$this->db->get_where("payments",array("customer_id"=>$userID))->row();
						 @unlink($imagename->from_image);

						  $sql="Select * from payments where customer_id = $customer_id  and service_status = 'Paid' order by id desc limit 1 ";
                          $query = $this->db->query($sql);
                          $datas =  $query->row();
                          $row_id = $datas->id;
						//print_r($row_id);die();

						$update = $this->model_report->update('payments',$data,'id',$row_id);
												
							$statusMsg = "The image with watermark has been uploaded successfully."; 
						}else{ 
							$statusMsg = "Image upload failed, please try again."; 
						}  
					}else{ 
						$statusMsg = "Sorry, there was an error uploading your file."; 
					} 
				}else{ 
					$statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
				} 
			}else{ 
				$statusMsg = 'Please select a file to upload.'; 
			} 
			redirect('freeuser/service/'.$customer_id, 'refresh');
		}
		
			public function reports()
	{

$dist_id = $this->session->userdata('dist_id');
$log_id=$this->session->userdata('id');
$service_status= 'Img';

		$this->data['data'] = $this->model_report->send_data_two('payments','log_id',$log_id,'service_status',$service_status);
	
		$this->render_templates('freeuser/completed', $this->data);
	}
		
		public function receipt($id = null)
	{
		if(!in_array('AllServices', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		 $log_id=$this->session->userdata('id');
		 $service_status= 'Img';
		$this->data['data'] = $this->model_report->send_data_two('payments','log_id',$log_id,'service_status',$service_status);
		$this->render_output('freeuser/receipt', $this->data);
	}
	
	   public function billcreate()
	{
		if($id = $this->input->post('id')) {
			//print_r($id);die;

			$this->form_validation->set_rules('adsional_amount', 'adsional_amount', 'required');
	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'adsional_amount' => $this->input->post('adsional_amount'),
	        		'reference_id' => $this->input->post('reference_id'),
	        		'bill' => 2
	        	);

			   //print_r($id);die;
	        	$update = $this->model_report->rettanapply($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('freeuser/reports', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('freeuser/completed', 'refresh');
	        	}
	        }
	        else {
				$this->render_templates('freeuser/completed', $this->data);	
	        }
		}
	}
	
		public function followup()
	{

		$referral_id = $this->session->userdata('referral_id');
    //$from_date =date('Y-m-d',strtotime('- 365 day'));
    //$user_id = $this->session->userdata('id');
    //$sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_dates' 
	$followdate	 = date('Y-m-d');
	    $this->data['data'] = $this->model_users->followUp('users');
		//print_r($wallet);die;
		$this->render_templates('users/follow-up', $this->data);
	}
	
	public function addfollowup()
	{

		if($id == $this->input->post('user_id')) {
			$this->form_validation->set_rules('followdate', 'followdate', 'trim|required');
			$this->form_validation->set_rules('follow_message', 'follow_message', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
	            // true case
		        	$data = array(
		        		'followdate' => $this->input->post('followdate'),
		        		'follow_message' => $this->input->post('follow_message'),
		        		'full_name' => $this->input->post('full_name'),
						'log_id' => $this->session->userdata('id'),
		        	);
		        	$update = $this->model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/followup/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/followup/', 'refresh');
		        	}
		        }
				
		}
	}
}