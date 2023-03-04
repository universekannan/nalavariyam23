<?php 

class Payu extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		$this->load->model('model_auth');
		$this->load->model('model_users');
		$this->load->model('model_groups');
     
	}
	
	public function makepay()
	{
		
		$data['key'] = $this->config->item('MERCHANT_KEY');
		$data['salt'] =  $this->config->item('SALT');
		$data['payu_base_url'] =  $this->config->item('PAYU_BASE_URL');    
		$data['success_url'] =  $this->config->item('SUCCESS_URL');   
		$data['fail_url'] = $this->config->item('FAIL_URL'); 

        $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$data['email'] = 'p.nagulsamy@gmail.com';
		$data['mobile'] = '9789049093';
		$data['firstName'] = 'Nagulsamy';
		$data['lastName'] =  'P';
		$data['totalCost'] = '1'; 
		$data['udf1'] = 'Customer id';
		
		$hash_string = $data['key']."|".$data['txnid'] ."|".$data['totalCost']."|"."productinfo|".$data['firstName']."|".$data['email']."|".$data['udf1'] ."||||||||||".$data['salt'];
		
		$data['hash'] = strtolower(hash('sha512', $hash_string));
		
		$data['action'] = $data['payu_base_url'] . '/_payment';

         $this->load->view('payment/payu/payu_pay_form', $data); 		
		 
		 
		 
	}
	
	
       public function usercheck()
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
 }
 }
	    $amount =  '$amount';
	    $product_info = 'User';
	    $customer_id = $this->session->userdata('id');
	    $customer_name = $this->session->userdata('full_name');
	    $customer_emial = $this->session->userdata('emial');
	    $customer_mobile = $this->session->userdata('phone');
	    $customer_address = 'New Center';
	    
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
			 
	        //$success = base_url() . 'Status';  
            $success = base_url() . 'payment/usercheck/'.$customer_id;

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
	            'action' => "https://secure.payu.in", //for live change action  https://secure.payu.in
	            'sucess' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel            
	        );
	        $this->load->view('confirmation', $data);   
     
	}

    public function success()
	{
		//phpinfo();
		$status = $_POST["status"];
		$firstname = $_POST["firstname"];
		$amount = $_POST["amount"];
		$txnid = $_POST["txnid"];
		$posted_hash = $_POST["hash"];
		$key = $_POST["key"];
		$productinfo = $_POST["productinfo"];
		$email = $_POST["email"];
		$udf1 = $_POST["udf1"];
		$salt = $this->config->item('SALT');
		 
		If (isset($_POST["additionalCharges"])) {
			$additionalCharges = $_POST["additionalCharges"];
		$retHashSeq = $additionalCharges . '|' . $salt . '|' . $status .'|'.$udf1.'||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			
		} else {
		 
			$retHashSeq = $salt . '|' . $status . '|'.$udf1.'||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
		}
		$hash = hash("sha512", $retHashSeq);
		 
		if($status == 'success'){
			 echo $udf1,"<br>";
			 echo $status, "=", $amount;
		}
		
		else{
			 echo "payment failuer";
		}
		
		 
		 echo "<h3>Thank You For Order . Your order status is " . $status . ".</h3>";
			echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
			echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		 
		/*if ($hash != $posted_hash) {
			echo "Invalid Transaction. Please try again";
		} else {
		 
			echo "<h3>Thank You For Order . Your order status is " . $status . ".</h3>";
			echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
			echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		}*/
          
	}

    public function failure()
	{
          $status=$_POST["status"];
			$firstname=$_POST["firstname"];
			$amount=$_POST["amount"];
			$txnid=$_POST["txnid"];
			$posted_hash=$_POST["hash"];
			$key=$_POST["key"];
			$productinfo=$_POST["productinfo"];
			$email=$_POST["email"];
			$salt=$this->config->item('SALT');
			If (isset($_POST["additionalCharges"])) {
				$additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|'.$udf1.'||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;        
			 } else {      
				$retHashSeq = $salt.'|'.$status.'|'.$udf1.'||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			$hash = hash("sha512", $retHashSeq); 

                    echo "<h3>Your order status is ". $status .".</h3>";
				echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
			
			/*if ($hash != $posted_hash) {
				echo "Invalid Transaction,Your Transaction Has been failed. Please try again";
			} else {
				echo "<h3>Your order status is ". $status .".</h3>";
				echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
			} */
	}	
		
}