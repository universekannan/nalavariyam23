<?php

$wallet = $this->session->userdata('wallet');
$users_id = $this->session->userdata('id');
$paied = $wallet - $pai = $user_data['service_payment'] / $user_datas['customer_amound'];

$update = array('wallet' => "$paied");
 print_r($update);die;

$update = $this->Model_service->update('users',$update,'id',$users_id);

$sql="Select * from payments where customer_id = $userId order by id desc limit 1 ";    
         $query = $this->db->query($sql);
         $data =  $query->row();
		 $paymentsId = $data->id; 
 //print_r($paymentsId);die;
		$update = $this->Model_service->update('users',$update,'id',$paymentsId);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
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

} ?>