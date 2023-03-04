<?php 

class Payments extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
        $this->load->database();
		$this->data['page_title'] = 'Payment';
		$this->load->model('model_payments');
		$this->load->model('model_users');
    $this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));

     }
	 

public function index()
	{
		$amount =  $this->input->post('new_payment');
	    $product_info = 'IN Payment';
	    $customer_name = $_SESSION['full_name'];
	    $customer_emial = $_SESSION['email'];
	    $customer_mobile = $_SESSION['phone'];
	    $customerID = $_SESSION['id'];
	    $customer_address = 'Sample Address';
	    
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

            $success = base_url() . 'Payment/indexs/'.$customerID. '/' .$amount;
	        $fail = base_url() . 'Status';
	        $cancel = base_url() . 'Status';
			
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
	
public function checks()
	{
 $group_id = $this->session->userdata('group_id');
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
	 //print_r($amount);die;

		$amount =  $amount;
	    $product_info = 'Bulk Purchas';
	    $customer_name = $_SESSION['full_name'];
	    $customer_emial = $_SESSION['email'];
	    $customer_mobile = $_SESSION['phone'];
	    $customerID = $_SESSION['id'];
	    $customer_address = 'Sample Address';
	    
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

            $success = base_url() . 'Payment/index/'.$customerID. '/' .$group_id;
	        $fail = base_url() . 'Status';
	        $cancel = base_url() . 'Status';
			
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



		public function bulkpay()
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

      redirect('users/viewtalukusers', 'refresh');

		$this->render_templates('users/paymlm', $this->data);
	}
	
	
		public function bulkpurchase()
	{

     $login_id = $this->session->userdata('id');
     $group_id = $this->session->userdata('group_id');
		$In_Payment = $this->model_payments->getInPayment($login_id);
	  $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($login_id);
	  $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;


 if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){ 
 $customer ='2';
 $to_id ='4';

 } if(($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){ 
 $customer ='3';
 $to_id ='5';

 }
 
 
  $amount = $this->input->post('admin_amount');
  
  $data = array(
        'log_id'  => $login_id,
        'amount'  => $amount,
        'to_id'   => $to_id,
        'status'  => 'Pending',
        'time'    => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
  //print_r($data);die;

    $insert = $this->db->insert('confirm_order', $data);
    $last_id = $this->db->insert_id();

    $data = array(
        'user_id'  => $login_id,
        'order_id' => $last_id,
        'status'  => 'Completed',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );	
   $status = 'Pending';
  //print_r($data);die;

 $update = $this->model_users->order_update('order_service',$data,'user_id',$login_id,'status',$status);
  
 if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){
	 
	 
$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);

 } else{ 

$sql="with recursive cte (id, group_id, referral_id) as (
  select     id,
             group_id,
             referral_id
  from       users
  where      id = $referral_id
  union all
  select     p.id,
             p.group_id,
             p.referral_id
  from       users p
  inner join cte
          on p.id = cte.referral_id
)
select * from cte;";  
  
$query = $this->db->query($sql);
$query->num_rows();
$result = $query->result();

//print_r($result); die;
  foreach($result as $row) { 
$customer = $row->id;

if ($query->num_rows == 1) {
$user_amount = $amount;
} if ($query->num_rows == 2) {
$user_amount = $amount / 2;
} if ($query->num_rows == 3) {
$user_amount = $amount / 3;
} if ($query->num_rows == 4) {
$user_amount = $amount / 4;
}

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }
  

	}
	      redirect('bulk', 'refresh');

	}
	
}



