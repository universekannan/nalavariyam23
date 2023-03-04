<?php {
$customer_id =$this->uri->segment(4); 

		$this->form_validation->set_rules('new_payment', 'Transfer Payment', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
        		'log_id' => $this->session->userdata('id'),
				'customer_id' => $this->session->userdata('id'),
				'amount' => $this->input->post('new_payment'),
				'ad_info' => $this->input->post('family_id'),
				'service_status' => 'Out Payment',
				'time' => date('h:i:sa'),
				'paydate' => date('Y-m-d')
				);

print_r($data);die;
             $insert = $this->db->insert('payment', $data);
}


$users_id = $this->session->userdata('id');
$wallet = $In_Payment - $Out_Payment; 

$paied = $wallet - $pai = $Service_data['service_payment'] / $Group_data['customer_amound'];
$data = array('wallet' => "$paied");
 //print_r($update);die;
 

$data = array(
            'amount'          => $pai,
            'ad_info'         => $this->input->post('ad_info'),
			'customer_id'     => $this->session->userdata('id'),
			'service_id'      => $this->uri->segment(3),
			'service_status'  => "Paid",
			'log_id'          => $this->session->userdata('id'),
);
 //print_r($data);die;
             $insert = $this->db->insert('payments', $data);

		
		
		
		
		
		
$referral_id = $this->session->userdata('referral_id'); 

$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$group_id = $datag->group_id;

$sql="Select * from groups_list where id = $group_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datagp =  $query->row();
$group_id = $datagp->customer_amound;
$service_id =$this->uri->segment(3); 
//print_r($group_id);die;

$sql="Select * from service where id = $service_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$xy =  $query->row();
$group_id2 = $xy->service_payment; 

if ($datag->group_id == '8') {
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data1 = $query->row();
$user1ww = $data1->id; //out 1
$user1 = $data1->referral_id; 
$wallet1 = $data1->wallet; 

$sql="Select * from users where id = $user1 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound1 =  $group_id2 / $group_id + $wallet1; 
$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data1 = array('wallet' => $amound1);
$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data1,'id',$user1ww);
$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);

} if ($datag->group_id == '9') {
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data1 = $query->row();
$user1ww = $data1->id; //out 1
$user1 = $data1->referral_id; 
$wallet1 = $data1->wallet; 

$sql="Select * from users where id = $user1 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound1 =  $group_id2 / $group_id + $wallet1; 
$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data1 = array('wallet' => $amound1);
$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data1,'id',$user1ww);
$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);


} if ($datag->group_id == '10') {

$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;
//print_r($data2->id);die;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);

} if ($datag->group_id == '11') {
	
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;
//print_r($data2->id);die;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);

} if ($datag->group_id == '6') {
	
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);
//print_r($update_data4);die;

} if ($datag->group_id == '7') {
	
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data2 = $query->row();
$user2ww = $data2->id;  //out 3
$user2 = $data2->referral_id;
$wallet2 = $data2->wallet;
//print_r($data2->id);die;

$sql="Select * from users where id = $user2 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound2 =  $group_id2 / $group_id + $wallet2; 
$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data2 = array('wallet' => $amound2);
$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data2,'id',$user2ww);
$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);

} if ($datag->group_id == '4') {

$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);
//print_r($update_data4);die;

} if ($datag->group_id == '5') {
	
$sql="Select * from users where id = $referral_id order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data3 =  $query->row();
$user3ww = $data3->id;  //out 4
$user3 = $data3->referral_id;
$wallet3= $data3->wallet;

$sql="Select * from users where id = $user3 order by id desc limit 1 ";    
$query = $this->db->query($sql);
$data4 =  $query->row();
$user4ww = $data4->id;
$user4 = $data4->referral_id;  //out 4
$wallet4 = $data4->wallet;  //out 4

$amound3 =  $group_id2 / $group_id + $wallet3; 
$amound4 =  $group_id2 / $group_id + $wallet4; 

$update_data3 = array('wallet' => $amound3);
$update_data4 = array('wallet' => $amound4);

$update = $this->model_users->update('users',$update_data3,'id',$user3ww);
$update = $this->model_users->update('users',$update_data4,'id',$user4ww);
}
redirect('service/indexs/'.$customer_id, 'refresh');

} ?>