<?php 

class Service extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Service';
		$this->load->model('Model_service');
		$this->load->model('model_groups');
		$this->load->model('model_users');
		$this->load->model('model_report');
		$this->load->model('model_districts');
		$this->load->model('model_customer');
		$this->load->model('model_payments');
		    $to_dates = date("Y-m-d");
//print_r($to_date);die;
    $from_date =date('Y-m-d',strtotime('- 365 day'));
    $user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_dates' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ 
  			redirect('dashboard', 'refresh');
      } 
	}

	public function index()
	{
		if(!in_array('viewService', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$service_data = $this->Model_service->getBulkServiceData();
		$this->data['service_data'] = $service_data;
		$this->render_template('service/index', $this->data);
	}
	
	public function create()
	{
		if(!in_array('createService', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('service_payment', 'Service Payment', 'required');
		$this->form_validation->set_rules('service_name', 'Service name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'service_payment' => $this->input->post('service_payment'),
        		'service_name' => $this->input->post('service_name'),
        		'status' => $this->input->post('status')
				        	);
        	$create = $this->Model_service->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('service', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('service/create', 'refresh');
        	}
        }
        else {
        $this->render_template('service/create', $this->data);	
        }
	}

	public function edit($id = null)
	{
		if(!in_array('updateDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		if($id) {
			$this->form_validation->set_rules('service_payment', 'Service Payment', 'required');
			$this->form_validation->set_rules('service_name', 'Service name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == TRUE) {
				// true case
				$data = array(
					'service_payment' => $this->input->post('service_payment'),
					'service_name' => $this->input->post('service_name'),
        	     	'marge_right' => $this->input->post('marge_right'),
        	    	'marge_bottom' => $this->input->post('marge_bottom'),		
        	    	'status' => $this->input->post('status'),
					);

	        $update = $this->Model_service->edit($data, $id);
			if(!empty($_FILES['photo']['name']))
				{
					if($_FILES['photo']['size']!=0)
					{
						if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/fromimg/';
						  
							$image_details = getimagesize($_FILES['photo']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'fom_' . $image_name . '' . date("siGdmy").''.$image_extension;

							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['photo']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/fromimg/'.$newFileName;
	                            $data=array('from_image' =>$photo_name);
								//print_r($update_data);die;

	                         	$update = $this->Model_service->edit($data, $id);
							}
						}
					}
				}
				
				
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('service', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('service/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $district_data = $this->Model_service->getServiceFile($id);
				$this->data['service'] = $district_data;
				$this->render_template('service/edit', $this->data);	
	        }
		}
	}
	
	public function servicedelete($id)
	{
        $customer =$this->uri->segment(4); 
		if($id) {
				$data = array(
					'customer_id' => $customer,
					'service_status' => "Paid",
					);
				//print_r($id);die();
				$update = $this->model_payments->update('payments',$data,'id',$id);
	        	redirect('service/indexs/'.$customer, 'refresh');
	            }
	}
	
	public function delete($id)
	{
		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->Model_service->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('service/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('service/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('service/delete', $this->data);
			}	
		}
	}
	
	public function indexs($id = null)
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
		  $this->render_template('service/indexs', $this->data);			
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
		
		  $this->render_template('service/edu', $this->data);	
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

		  $this->render_template('service/edunext', $this->data);			
	}

	public function renewal($id = null)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		   $service_id = $this->uri->segment('4');
		  $group_id = $this->session->userdata('group_id');
		  $log_id = $this->session->userdata('id');
		  $this->data['data'] = $this->model_customer->send_data_thre('payments','log_id',$log_id,'service_id',$service_id,'customer_id',$id);
	    $this->data['user_data'] = $this->model_users->send_data_row('users','id',$id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		
          $this->data['service_data'] = $this->model_users->send_data_row('service','id',$service_id); //test remu
		  
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		  $this->render_template('service/renewal', $this->data);			
	}

	public function image()
	{
		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$distID = $this->session->userdata('dist_id');
		$userId = $this->uri->segment('3');
		$result = $this->model_users->getCustomerData($userId); 
		$this->data['user_data'] = $result;
		$this->render_templates('service/image', $this->data);
	}
	
		public function test()
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$userId = $this->uri->segment('3');
		$serviceId = $this->uri->segment('4');
			
		$Work_data = $this->model_customer->getCustomerWorkData($userId); 
		$this->data['Work_data'] = $Work_data;

		$user_data = $this->model_customer->getCustomerData($userId); 
		$this->data['user_data'] = $user_data;

		$dist_id = $this->session->userdata('dist_id');
		$Signature_Data = $this->model_users->getSignatureData($dist_id);
		$this->data['Signature_Data'] = $Signature_Data; 
		//print_r($Signature_Data);die;

		$this->render_output('fome/'.$serviceId, $this->data);
		$this->deme('fome/deme1', $this->data);

	}
	
	public function edutest()
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$userId = $this->uri->segment('3');
		$serviceId = $this->uri->segment('4');
		$family_member_id = $this->uri->segment('5');
			
		$family_member_data = $this->model_customer->getCustomerFamilyData($family_member_id); 
		$this->data['family_member_data'] = $family_member_data;
		
		$Work_data = $this->model_customer->getCustomerWorkData($userId); 
		$this->data['Work_data'] = $Work_data;
			   //print_r($family_member_id);die;

		$user_data = $this->model_customer->getCustomerData($userId); 
		$this->data['user_data'] = $user_data;
		
		$dist_id = $this->session->userdata('dist_id');
		$Signature_Data = $this->model_users->getSignatureData($dist_id);
		$this->data['Signature_Data'] = $Signature_Data; 
			   //print_r($Signature_Data);die;

		$this->render_output('fome/'.$serviceId, $this->data);
		$this->deme('fome/deme', $this->data);

	}
	public function renewaltest()
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$userId = $this->uri->segment('3');
		$serviceId = $this->uri->segment('4');
		$family_member_id = $this->uri->segment('5');
			
		$family_member_data = $this->model_customer->getCustomerFamilyData($family_member_id); 
				$this->data['family_member_data'] = $family_member_data;
		$Work_data = $this->model_customer->getCustomerWorkData($userId); 
		$this->data['Work_data'] = $Work_data;
			   //print_r($family_member_data);die;

		$user_data = $this->model_customer->getCustomerData($userId); 

		$this->data['user_data'] = $user_data;
		$this->render_output('fome/'.$serviceId, $this->data);
		$this->deme('fome/dem2', $this->data);

	}
	
		public function save_image()
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		} 
		$userId = $this->uri->segment('3');
		$service_id = $this->uri->segment('4');
		$family_member_id = $this->uri->segment('5');

	   //print_r($userIds);die;
		$this->load->library('HtmlToJpeg');
		
		$render_js = base_url('assets/dist/js/render.js'); 
        $this->htmltojpeg->config['action_url'] = base_url('service/download/'."$userId/$service_id/$family_member_id");	
		$this->htmltojpeg->config['append_scripts'] = array($render_js);
		$this->htmltojpeg->config['folder'] = site_url().'assets/profile_image_copy';
		$user_data = $this->model_customer->getCustomerData($userId);
		$this->data['user_data'] = $user_data; 
		$dist_id = $this->session->userdata('dist_id');
		$Signature_Data = $this->model_users->getSignatureData($dist_id);
		$this->data['Signature_Data'] = $Signature_Data; 
			   //print_r($Signature_Data);die;
		$Work_data = $this->model_customer->getCustomerWorkData($userId); 
		$this->data['Work_data'] = $Work_data;
        $img_html = $this->load->view('fome/'.$service_id, $this->data, TRUE);
		$this->htmltojpeg->renderHtml($img_html); 	 
		$this->data['render_data'] = $this->htmltojpeg->output();
		$this->render_output('service/save_image', $this->data);
	}

		public function edut_save_image()
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		} 
		$userId = $this->uri->segment('3');
		$service_id = $this->uri->segment('4');
		$family_member_id = $this->uri->segment('5');

	   //print_r($userIds);die;
		$this->load->library('HtmlToJpeg');
		
		$render_js = base_url('assets/dist/js/render.js'); 
        $this->htmltojpeg->config['action_url'] = base_url('service/download/'."$userId/$service_id/$family_member_id");	
		$this->htmltojpeg->config['append_scripts'] = array($render_js);
		$this->htmltojpeg->config['folder'] = site_url().'assets/profile_image_copy';
		$user_data = $this->model_customer->getCustomerData($userId);
		$this->data['user_data'] = $user_data; 
		$dist_id = $this->session->userdata('dist_id');
		$Signature_Data = $this->model_users->getSignatureData($dist_id);
		$this->data['Signature_Data'] = $Signature_Data; 
			   //print_r($Signature_Data);die;
		$family_member_data = $this->model_customer->getCustomerFamilyData($family_member_id); 
		$this->data['family_member_data'] = $family_member_data;
		$Work_data = $this->model_customer->getCustomerWorkData($userId); 
		$this->data['Work_data'] = $Work_data;
        $img_html = $this->load->view('fome/'.$service_id, $this->data, TRUE);
		$this->htmltojpeg->renderHtml($img_html); 	 
		$this->data['render_data'] = $this->htmltojpeg->output();
		$this->render_output('service/save_image', $this->data);
	}

	public function download()
	{

		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');  
		}
				$userId = $this->session->userdata('id');

		//$userId = $this->uri->segment('3');
		$service_id = $this->uri->segment('4');
		$family_member_id = $this->uri->segment('5');
		$this->load->helper('url');
		$this->load->library('HtmlToJpeg');   
		$image_name = $this->htmltojpeg->saveImages(); 
		$user_profile_id = $this->uri->segment('3');
		$path = site_url().'assets/profile_image_copy/';
		 //print_r($service_id);die;
		
	    $paydate = date('y-m-d');
		$update_data = array('profile_image_copy' => $path.$image_name[0], 'service_status' => "Img", 'service_id' => "$service_id", 'customer_id' => "$user_profile_id", 'paydate' => "$paydate", 'ad_info' => "$family_member_id");
 //print_r($update_data);die;

		 $sql="Select * from payments where customer_id = $userId order by id desc limit 1 ";    
         $query = $this->db->query($sql);
         $data =  $query->row();
		 $paymentsId = $data->id; 
		$update = $this->Model_service->update('payments',$update_data,'id',$paymentsId);
		//$user_data = $this->model_users->edit($update_data,$user_profile_id); 
		
		 echo "<!DOCTYPE html>
		<html> 
			<head>
				<meta charset='UTF-8'>
				<meta http-equiv='Content-Type' content='text/html; charset=shift_jis'>
	            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
			</head>
			<body id='close-btn' onLoad = 'window.close();'>
			</body>
		 <script>	// Attach event listener to first close popup and then refresh page
        document.getElementById(
'close-btn').addEventListener('click', (e) => {
            document.getElementById(
'wrapper').style.visibility = 'hidden';
            window.location.reload();
        });
    </script>
		</html>";
		exit;
	}

	public function mlm($service_id)
	{
		if(!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
        $user_id  = $this->session->userdata('id');
		$this->form_validation->set_rules('new_payment', 'new_payment', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $user_id,
				'customer_id' => $user_id,
				'amount' => $this->input->post('new_payment'),
				'ad_info' => $this->input->post('family_id'),
				'service_status' => 'Out Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d'),
        	);
print_r($data);die;

        	$creates = $this->Model_payments->creates($data);
			
        	if($creates == true) {
				 $customer_id = $this->uri->segment(3);
        		$this->session->set_flashdata('success', 'Successfully created');
					redirect('service/indexs/'.$customer_id, 'refresh');
		        }
        	}
            $this->render_template('users/indexs', $this->data);
        
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function check()
	{
		// print_r($_POST);
		// print_r($_SESSION);
		$serive_data=$this->db->get_where('service',array('id'=>$_POST['id']))->row_array();
		// print_r($serive_data);die;

	    $amount = $serive_data['service_payment'];
	    $product_info = $serive_data['id'];
	    $customer_name = $_SESSION['full_name'];
	    $customer_emial = $_SESSION['email'];
	    $customer_mobile = $_SESSION['phone'];
	    $customerID = $_SESSION['id'];
	    $customer_address = 'Sample Address';
		
	        $success = base_url() . 'Status';  
	        $fail = base_url() . 'Status';
	        $cancel = base_url() . 'Status';
	        	    		//print_r($success);die;
	    	//payumoney details
	    
	    
	        $MERCHANT_KEY = MERCHANT_KEY; //change  merchant with yours
	        $SALT = SALT;  //change salt with yours 

	        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	        $udf1 = '';
	        $udf2 = '';
	        $udf3 = '';
	        $udf4 = '';
	        $udf5 = '';
	        
	         $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));


	         $data = array(
	            'mkey' => $MERCHANT_KEY,
	            'tid' => $txnid,
	            'hash' => $hash,
	            'amount' => $amount,           
	            'name' => $customer_name,
	            'productinfo' => $product_info,
	            'mailid' => $customer_emial,
	            'phoneno' => $customer_mobile,
	            'address' => $customer_address,
	            'action' => PAYU_BASE_URL,
	            'sucess' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel            
	        );
	        $this->load->view('confirmatio', $data);
	}
}