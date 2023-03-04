<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class Payment extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->data['page_title'] = 'Payment';

        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
		$this->load->model('model_users');
		$this->load->model('model_payments');

     }
	 
	 public function index()
	 {
		// print_r($customer_id);die;
 $group_id = $this->uri->segment(4);
 $customerID = $this->uri->segment(3);
$sql="Select * from groups_list where id = '$group_id' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    $user_payment = $data->user_payment;
    $renew_payment = $data->renew_payment;
	 if($data){ 
      if($status = $this->session->userdata('status') == 'Inactive'){ 
          $amount = $user_payment;	 
      } if($status = $this->session->userdata('status') == 'Active'){ 
          $amount = $renew_payment;	 
	 } } 
	 		   $from_to_date = date('y-m-d',strtotime('+ 365 day'));
               $amount = $amount;	 
		  $data = [
	       'customer_id' => $customerID,
	       'amount' => $amount,
	       'service_status' => "Paid",
           'time' => date('h:i:sa'),
           'paydate' => date('Y-m-d')
            ];
							//print_r($data);die;

		$datas = [
	       'from_to_date' => $from_to_date,
	       'status' => 'Active',
            ];
				 //print_r($data);die;

     $insert = $this->db->insert('payments', $data);
	 $update = $this->model_users->update('users',$datas,'id',$customerID);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
	 	redirect('service/indexs/'.$customer_id, 'refresh'); 
		}
		
		 public function indexs()
	 {
		// print_r($customer_id);die;
    $inamount = $this->uri->segment(4);
    $customerID = $this->uri->segment(3);
		  $data = [
	       'customer_id' => $customerID,
	       'amount' => $inamount,
	       'service_status' => "IN Payment",
	       'ad_info' => "Online Payment",
           'time' => date('h:i:sa'),
           'paydate' => date('Y-m-d')
            ];
							//print_r($data);die;

		$datas = [
	       'wallet' => $sumamount
            ];
				 //print_r($data);die;

     $insert = $this->db->insert('payment', $data);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
	 	redirect('service/indexs/'.$customerID, 'refresh'); 
		}
		
}