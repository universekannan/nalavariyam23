

<?php
		$userId = $this->uri->segment('3');
		$service_id = $this->uri->segment('4');


if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
free
} if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
free
} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){
free
} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
free
} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){
free
} if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){
//Dist
	$district_id = $this->session->userdata('referral_id');
	
    $sql="Select * from users where id ='$district_id' and group_id='4' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    $district_users_id = $data->id; 
	$primary_users = $data->referral_id; 
	$primary_group_id = $data->group_id; 

	} 

} 
?>