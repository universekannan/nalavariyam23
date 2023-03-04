<?php 

class Customers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';
		$this->load->model('model_auth');
		$this->load->model('model_customer');
		$this->load->model('model_groups');
		$this->load->model('model_users');
	 $to_date = date("Y-m-d");
    $from_date =date('Y-m-d',strtotime('- 365 day'));
    $user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_date' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ 
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
		$this->render_templates('customers/index', $this->data);
	
	}

	public function search()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

			$this->render_template('customers/search', $this->data);
        }			

	public function result()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('aadhaar_no', 'Aadhar No.', 'trim|required');
   
        $aadhaar_no = $this->input->post('aadhaar_no');
         $this->data['data'] = $this->model_customer->send_data_one('users','aadhaar_no',$aadhaar_no);

			$this->render_template('customers/result', $this->data);
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
        		redirect('customers/create', 'refresh');
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

			$this->render_template('customers/create', $this->data);
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
		        		redirect('customers/edit/'.$customer_id, 'refresh');
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

					$this->render_template('customers/edit', $this->data);	
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
        		redirect('customers/family/'.$customer_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customers/family', 'refresh');
        	}
        }
        else {
            // false case

        	$this->data['data'] = $this->model_customer->family_data('family_member','customer_id',$customer_id);
            $this->render_template('customers/family', $this->data);
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
		        		redirect('customers/family/'.$customer_id, 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('customers/editfamily/'.$family_id, 'refresh');
		        	}
		        }
			        else {
			            // false case
				$status = 'Active';
				$this->data['data'] = $this->model_customer->send_data_one('family_member','customer_id',$customer_id);
				// print_r($family_id);die;

				$user_data = $this->model_customer->getfamilyData($family_id);
				$this->data['user_data'] = $user_data;
					
			    $this->render_template('customers/editfamily', $this->data);	
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
	        		redirect('customers/family/'.$customer_id, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('customers/nominee/'.$customer_id, 'refresh');
	        	}
	        }
	        else {
			$user_data = $this->model_customer->getfamilyData($family_id);
		    $this->data['user_data'] = $user_data;
        	$customer_data = $this->model_customer->getCustomerData($customer_id);
        	$this->data['customer_data'] = $customer_data;
        	$this->render_template('customers/nominee', $this->data);	

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
	
}