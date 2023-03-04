<?php if($this->session->userdata('dist_id') == $this->input->post('dist_id') ) {

$amount = $Service_data['service_payment'] / $Group_data['customer_amound'];
        	$data = array(
        'log_id' => $this->session->userdata('id'),
				'customer_id' => $this->session->userdata('id'),
				'amount' => $amount,
				'ad_info' => $this->input->post('family_id'),
				'service_status' => 'Out Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);

//print_r($data);die;
$insert = $this->db->insert('payment', $data);
		
$users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment;

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];

$customer_id =$this->uri->segment(4); 

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
			'customer_id'     => $this->session->userdata('id'),
			'service_id'      => $this->uri->segment(3),
			'service_status'  => "Paid",
			'log_id'          => $this->session->userdata('id'),
);
 //print_r($data);die;

//$create = $this->Model_payments->create($data);

redirect('service/indexs/'.$customer_id, 'refresh');

} else {
                               
$customer_url =$this->uri->segment(4); 
$service_id =$this->uri->segment(3); 
$referral_id = $this->session->userdata('referral_id'); 
$customer_id = $this->session->userdata('id'); 

//print_r($amount);die;

$amount = $Service_data['service_payment'] / $Group_data['customer_amound'];
  $data = array(
        'log_id' => $this->session->userdata('id'),
				'customer_id' => $this->session->userdata('id'),
				'amount' => $amount,
				'ad_info' => $this->input->post('family_id'),
				'service_status' => 'Out Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);
//print_r($data);die;
  $insert = $this->db->insert('payment', $data);
		
$users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment;

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
			'customer_id'     => $this->session->userdata('id'),
			'service_id'      => $this->uri->segment(3),
			'service_status'  => "Paid",
			'log_id'          => $this->session->userdata('id'),
);
 //print_r($data);die;

//$create = $this->Model_payments->create($data);

$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$group_id = $datag->group_id;

$sql="Select * from groups_list where `id` = $group_id order by `id` desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$customer_amound = $datagp->customer_amound;
$user_percentage = $datagp->user_percentage;


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

if ($query->num_rows == 4) {
$user_amount = $user_percentage;
} if ($query->num_rows == 3) {
if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')) {
$user_amount = "40";
} else {
$user_amount = $user_percentage;
}

} if ($query->num_rows == 2) {
if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')) {
$user_amount = "45";
} else {
$user_amount = "60";
}

}
 
$update_data = array('log_id' => $customer_id,'customer_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update_data);
  }
  redirect('service/indexs/'.$customer_url, 'refresh');

} 



?>