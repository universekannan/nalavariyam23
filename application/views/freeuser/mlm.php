<?php
{
$customer_url =$this->uri->segment(4); 
$service_url =$this->uri->segment(3); 
$referral_id = $this->session->userdata('referral_id'); 
$login_id = $this->session->userdata('id'); 

$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$group_id = $datag->group_id;

$sql="Select * from groups_list where `id` = $group_id order by `id` desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$customer_amound = $datagp->customer_amound;
$user_percentage = $datagp->user_percentage;


if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){
$one_pay ='2';
} if(($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){
$one_pay ='3';
}

//<!---******************dist_id******************-->

if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
  if(($this->session->userdata('dist_id') == $this->input->post('dist_id') )) {

$wallet = $In_Payment - $Out_Payment;

$pay = $Service_data['service_payment'] / $Group_data['customer_amound'];
$pai = (round($pay));

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

$amount = $Service_data['service_payment'] / $Group_data['customer_amound'];
  $data = array(
        'log_id'  => $login_id,
        'from_id' => $one_pay,
        'to_id'   => $login_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $data);

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $one_pay,'amount' => $amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

} else{

$wallet = $In_Payment - $Out_Payment;

$pay = $Service_data['service_payment'] / $Group_data['customer_amound'];
$pai = (round($pay));

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;
$insert = $this->db->insert('payments', $data);


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
$user_amount = "120";
}
//print_r($user_amount);die;


$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }

}
//<!---******************taluk******************-->

} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){

 if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {

$wallet = $In_Payment - $Out_Payment;

$pay = $Service_data['service_payment'] / $Group_data['customer_amound'];
$pai = (round($pay));

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

$amount = $Service_data['service_payment'] / $Group_data['customer_amound'];
  $data = array(
        'log_id'  => $login_id,
        'from_id' => $one_pay,
        'to_id'   => $login_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $data);

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $one_pay,'amount' => $amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

} else{

$wallet = $In_Payment - $Out_Payment;

$pay = $Service_data['service_payment'] / $Group_data['customer_amound'];
$pai = (round($pay));

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

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

if ($query->num_rows == 2) {
 if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
$user_amount = "";
 } else {
$user_amount = "60";
}
}



$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }

}
//<!---******************Panchayath******************-->



} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
	
$wallet = $In_Payment - $Out_Payment;

$pay = $Service_data['service_payment'] / $Group_data['customer_amound'];
$pai = (round($pay));

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

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

if ($query->num_rows == 2) {
 if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
$user_amount = "45";
} else{
$user_amount = "60";
}
} if ($query->num_rows == 3) {
 if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
$user_amount = "40";
} else{
$user_amount = "30";
}}

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }


//<!---******************Block******************-->

} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){

if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {

$wallet = $In_Payment - $Out_Payment;

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

$amount = $Service_data['service_payment'] / $Group_data['customer_amound'];
  $data = array(
        'log_id'  => $login_id,
        'from_id' => $one_pay,
        'to_id'   => $login_id,
        'amount'  => $amount,
        'ad_info' => $this->input->post('family_id'),
        'service_status' => 'Out Payment',
        'time' => date('h:i:sa'),
        'paydate' => date('Y-m-d')
        );
//print_r($data);die;
  $insert = $this->db->insert('payment', $data);

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $one_pay,'amount' => $amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

} else{

$wallet = $In_Payment - $Out_Payment;

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

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

if ($query->num_rows == 2) {
 if(($this->session->userdata('taluk_id') == $this->input->post('taluk_id') )) {
$user_amount = "";
 } else {
$user_amount = "60";
}
}



$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }

}
//<!---******************Center******************-->

} if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){

$wallet = $In_Payment - $Out_Payment;

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];

$data = array(
      'amount'          => $pai,
      'ad_info'         => $this->input->post('ad_info'),
      'customer_id'     => $customer_url,
      'service_id'      => $service_url,
      'service_status'  => "Paid",
      'log_id'          => $login_id,
);
 //print_r($data);die;

$insert = $this->db->insert('payments', $data);

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

if ($query->num_rows == 2) {
if($this->session->userdata('status') == 'Active') {
                 $user_amount = "60";
 } else {
                 $user_amount = 75;
 }

} if ($query->num_rows == 3) {

if($this->session->userdata('status') == 'Active') {
                 $user_amount = "40";
 } else {
                 $user_amount = 50;
 }
  
} if ($query->num_rows == 4) {
	
if($this->session->userdata('status') == 'Active') {
                 $user_amount = "30";
 } else {
                 $user_amount = 37;
 } 
}

//print_r($user_amount); die;

$update_data = array('log_id' => $login_id,'from_id' => $login_id,'to_id' => $customer,'amount' => $user_amount,'ad_info' => 'Income','service_status' => 'IN Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));
//print_r($update_data);die;

$insert = $this->db->insert('payment', $update_data);

$update = array('log_id' => $login_id,'from_id' => $customer,'to_id' => $login_id,'amount' => $user_amount,'ad_info' => 'Fom Work','service_status' => 'Out Payment','time' => date('h:i:sa'),'paydate' => date('Y-m-d'));

$insert = $this->db->insert('payment', $update);
  }

}


redirect('freeuser/edu/'.$customer_url. '/' .$service_url, 'refresh');

}

?>