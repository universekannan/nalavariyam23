<?php 

class Bulk extends Admin_Controller 
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
		$this->load->model('Model_service');
		$this->load->model('model_payments');

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
		$group_id = $this->session->userdata('group_id');
		$service_data = $this->Model_service->getServiceOderData();
		$this->data['service_data'] = $service_data;
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;
		
		$ordersum_row = $this->Model_service->ordersum();
	    $this->data['ordersum_row'] = $ordersum_row;

		$order_row = $this->Model_service->countOrder();
	    $this->data['order_row'] = $order_row;

		$this->render_templates('bulk/index', $this->data);
	
	}

	public function search()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

			$this->render_template('customers/search', $this->data);
        }			

	public function service()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$service_data = $this->Model_service->getUserData();
		$this->data['service_data'] = $service_data;
			$this->render_template('bulk/service', $this->data);
        }		
	
	public function cart()
	{
		if(!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('service_id', 'Service', 'required');
         $sum_pr_payment = $this->input->post('quantity') * $this->input->post('service_payment');
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'user_id' => $this->session->userdata('id'),
        		'dist_id' => $this->session->userdata('dist_id'),
        		'quantity' => $this->input->post('quantity'),
        		'service_id' => $this->input->post('service_id'),
        		'service_payment' => $this->input->post('service_payment'),
        		'sum_pr_payment' => $sum_pr_payment, 
				'status' => 'Pending',
        		'paydate' => $date = date('Y-m-d')
        	);
//print_r($data);die;
               $insert = $this->db->insert('order_service', $data);
        	if($insert == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('bulk', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('bulk/cart', 'refresh');
        	}
        }
        else {
            // false case
			
		$service_data = $this->Model_service->getBulkServiceData();
		$this->data['service_data'] = $service_data;
		
		$group_id = $this->session->userdata('group_id');

		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);
			$this->render_template('bulk/service', $this->data);
        }			
	}
	
public function orders()
	{
		if(!in_array('viewCustomer', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$dist_id = $this->session->userdata('dist_id');
		$referral_id = $this->session->userdata('id');
		$group_id = $this->session->userdata('group_id');
		
		$Orders_data = $this->Model_service->getBullkOderData();
		$this->data['Orders_data'] = $Orders_data;
		
		  $this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);
		  
		$service_data = $this->Model_service->getServiceOderData();
		$this->data['service_data'] = $service_data;
		
		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		
		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;
		
		$ordersum_row = $this->Model_service->ordersum();
	    $this->data['ordersum_row'] = $ordersum_row;

		$this->render_templates('bulk/orders', $this->data);
	
	}
	
	public function vieworders($id)
	{
		if(!in_array('viewCustomer', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$dist_id = $this->session->userdata('dist_id');
		$referral_id = $this->session->userdata('id');
		$group_id = $this->session->userdata('group_id');
		$service_data = $this->Model_service->getServiceOderData($id);
		$this->data['service_data'] = $service_data;
		$this->data['user_datas'] = $this->Model_service->send_data_row('groups_list','id',$group_id);

		$user_id = $this->session->userdata('id');
		$In_Payment = $this->model_payments->getInPayment($user_id);
	    $this->data['In_Payment'] = $In_Payment;

		$Out_Payment = $this->model_payments->getOutPayment($user_id);
	    $this->data['Out_Payment'] = $Out_Payment;

		$wallet = $In_Payment - $Out_Payment;
		//print_r($wallet);die;
		
		$ordersum_row = $this->Model_service->ordersum();
	    $this->data['ordersum_row'] = $ordersum_row;

		$this->render_templates('bulk/vieworders', $this->data);
	}
	
	
public function orderclose($order_id = '')
	{
$order_id =$this->uri->segment(3);
		if(!in_array('viewCustomer', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		
    $data = array(
        'status'  => 'Delivery',
        'date' => date('Y-m-d')
        );	
   $status = 'Pending';
  //print_r($order_id);die;

 $update = $this->model_users->orderclos_update('confirm_order',$data,'id',$order_id,'status',$status);
		if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('bulk', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('bulk/orderclose/'.$id, 'refresh');
        	}

	}
	
public function delete($id)
	{
		
		if($id) {
			if($this->input->post('confirm')) {
				
					$delete = $this->model_payments->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('bulk', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('bulk/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('bulk/delete', $this->data);
			}	
		}
	}
}