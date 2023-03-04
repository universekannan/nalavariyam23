<?php 

class Wallet extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Wallet';
		$this->load->model('model_auth');
		$this->load->model('model_customer');
		$this->load->model('model_groups');
		$this->load->model('model_payments');
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
		
	    $service_status = 'service_status';
		$customer_id = $this->session->userdata('id');
		
		$In_Payment = $this->model_payments->getInPayment($customer_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($customer_id);
	    $this->data['Out_Payment'] = $Out_Payment;

		$wallet =  $Out_Payment;

	    $this->data['data'] = $this->model_customer->send_data_one('payment','to_id',$customer_id);
				//print_r($customer_id);die;

		$this->render_templates('wallet/index', $this->data);
	}

public function all()
	{
		
	    $service_status = 'service_status';
		$customer_id = $this->session->userdata('id');
		
		$In_Payment = $this->model_payments->getInPayment($customer_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($customer_id);
	    $this->data['Out_Payment'] = $Out_Payment;
				//print_r($Out_Payment);die;

		$wallet = $In_Payment - $Out_Payment;

	    $this->data['data'] = $this->model_customer->send_data('payment');

		$this->render_templates('wallet/all', $this->data);
	}

public function userwallet($customer_id)
	{
		if($customer_id) {
		$In_Payment = $this->model_payments->getInPayment($customer_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($customer_id);
	    $this->data['Out_Payment'] = $Out_Payment;
				//print_r($Out_Payment);die;

		$wallet = $In_Payment - $Out_Payment;

		$referral_id = $this->session->userdata('referral_id');
	    $this->data['data'] = $this->model_customer->send_data_two('payment','to_id',$customer_id,'from_id',$referral_id);
		$this->render_templates('wallet/userwallet', $this->data);
	}
}

	public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('transfer_payment', 'Transfer Payment', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $this->session->userdata('id'),
        		'from_id' => $this->session->userdata('id'),
				'to_id' => $this->input->post('user_id'),
				'amount' => $this->input->post('transfer_payment'),
				'service_status' => 'IN Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);

//print_r($data);die;
        	$create = $this->model_payments->creates($data);
			
			$data = array(
        		'log_id' => $this->session->userdata('id'),
        		'from_id' => $this->input->post('user_id'),
				'to_id' => $this->session->userdata('id'),
				'amount' => $this->input->post('transfer_payment'),
				'service_status' => 'Out Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);
//print_r($data);die;

        	$create = $this->model_payments->creates($data);

        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
					redirect('wallet/index', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('wallet/index', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('wallet/index', $this->data);
        }	
	}
	
	public function inset()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('amount', 'Transfer Payment', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $this->session->userdata('id'),
        		'from_id' => $this->session->userdata('id'),
				'to_id' => $this->session->userdata('id'),
				'amount' => $this->input->post('amount'),
				'service_status' => 'IN Payment',
				'ad_info' => 'Investment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);
//print_r($data);die;
        	$create = $this->model_payments->creates($data);
			
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
					redirect('wallet/index', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('wallet/index', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('wallet/index', $this->data);
        }	
	}
}