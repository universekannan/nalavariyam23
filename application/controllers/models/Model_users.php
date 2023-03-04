<?php 

class Model_users extends CI_Model
{
	private $_countryID;
    private $_stateID;
	public function __construct()
	{
		parent::__construct();
	}
	
    public function viewdistrictusers($group_id)
    {
	   $this->db->select("users.*,district.district_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
       $this->db->where('users.group_id',$group_id);
	   $query=$this->db->get();
	   return $query->result();

   }

   public function viewassigneddistrictusers()
    {
		$user_id =$this->uri->segment(4); 
	   $this->db->select("users.*,district.district_name");
	   $this->db->from("users");
	   $this->db->join("assigned_district", "assigned_district.district_user_id=users.id");
	   $this->db->join("district", "district.id=users.dist_id");
       $this->db->where('assigned_district.user_id',$user_id);
	   $query=$this->db->get();
	   return $query->result();
   }



   public function viewdistrictassignedusers()
    {
if($this->session->userdata('group_id') == '16'){ 
		$group_id = '4';
} if($this->session->userdata('group_id') == '17'){ 
 
        $group_id = '5';
 }
 
	   $user_id = $this->session->userdata('id');
	   $this->db->select("users.*,district.district_name");
	   $this->db->from("users");
	   $this->db->join("assigned_district", "assigned_district.district_user_id=users.id");
	   $this->db->join("district", "district.id=users.dist_id");
       $this->db->where('assigned_district.user_id',$user_id);
       $this->db->where('users.group_id',$group_id);
	   $query=$this->db->get();
	   return $query->result();
   }
   
   
       public function viewtalukusers()
    {
	 $referral_id = $this->session->userdata('id');

if($this->session->userdata('group_id') == '2'){ 
		$group_id = '6';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
} if($this->session->userdata('group_id') == '3'){ 
        $group_id = '7';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
 }
 
if($this->session->userdata('group_id') == '4'){ 
		$group_id = '6';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '5'){ 
        $group_id = '7';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
 }
	   $query=$this->db->get();
	   return $query->result();

   }

       public function viewblockuser()
    {
		 $dist_id = $this->session->userdata('dist_id');
		 $referral_id = $this->session->userdata('id');
		 $taluk_id = $this->session->userdata('taluk_id');
if($this->session->userdata('group_id') == '2'){ 
		$group_id = '10';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
} if($this->session->userdata('group_id') == '3'){ 
        $group_id = '11'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
	   
} if($this->session->userdata('group_id') == '4'){ 
		$group_id = '10';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '5'){ 
        $group_id = '11'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
 }
	   $query=$this->db->get();
	   return $query->result();
    }
	
       public function viewpanchayathusers()
    {
		 $referral_id = $this->session->userdata('id');
	   	 $dist_id = $this->session->userdata('dist_id');
	     $taluk_id = $this->session->userdata('taluk_id');
 if($this->session->userdata('group_id') == '1'){ 
       $group_id = '1';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
	   
} if($this->session->userdata('group_id') == '2'){ 
	   $group_id = '8';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
	   
} if($this->session->userdata('group_id') == '3'){ 
 
       $group_id = '9'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
	   
} if($this->session->userdata('group_id') == '4'){ 
		$group_id = '8';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '5'){ 
        $group_id = '9'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '6'){ 
        $group_id = '8'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
} if($this->session->userdata('group_id') == '7'){ 
        $group_id = '9'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
} if($this->session->userdata('group_id') == '10'){ 
        $group_id = '8'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
} if($this->session->userdata('group_id') == '11'){ 
        $group_id = '9'; 
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

        }
	   $query=$this->db->get();
	   return $query->result();
   }


       public function viewcenter()
    {
		 $referral_id = $this->session->userdata('id');
	   	 $dist_id = $this->session->userdata('dist_id');
	     $taluk_id = $this->session->userdata('taluk_id');
	     $panchayath_id = $this->session->userdata('panchayath_id');
if($this->session->userdata('group_id') == '2'){ 
        $group_id = '12';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);

} if($this->session->userdata('group_id') == '3'){ 
        $group_id = '13';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
	   
 } if($this->session->userdata('group_id') == '4'){
        //print_r($referral_id);die;

		$group_id = '12';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '5'){
        $group_id = '13';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
	   
} if ($this->session->userdata('group_id') == '6'){
        $group_id = '12';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
	   
} if ($this->session->userdata('group_id') == '7'){
        $group_id = '13';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
	   
} if ($this->session->userdata('group_id') == '8'){
        $group_id = '12';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if ($this->session->userdata('group_id') == '9'){
        $group_id = '13';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
	   
} if ($this->session->userdata('group_id') == '10'){ 
        $group_id = '12';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if ($this->session->userdata('group_id') == '11'){ 
        $group_id = '13';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
}
	   $query=$this->db->get();
	   return $query->result();
   }
   
      public function viewcustomers()
    {
		$referral_id = $this->session->userdata('id');
	   	 $dist_id = $this->session->userdata('dist_id');
	     $taluk_id = $this->session->userdata('taluk_id');
	     $panchayath_id = $this->session->userdata('panchayath_id');
if($this->session->userdata('group_id') == '2'){ 
        $group_id = '114';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);

} if($this->session->userdata('group_id') == '3'){ 
        $group_id = '15';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
	   
 } if($this->session->userdata('group_id') == '4'){
        //print_r($referral_id);die;

		$group_id = '14';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if($this->session->userdata('group_id') == '5'){
        $group_id = '15';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
	   
} if ($this->session->userdata('group_id') == '6'){
        $group_id = '14';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.taluk_id',$taluk_id);
	   
} if ($this->session->userdata('group_id') == '7'){
        $group_id = '15';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.taluk_id',$taluk_id);
	   
} if ($this->session->userdata('group_id') == '8'){
        $group_id = '14';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.taluk_id',$taluk_id);

} if ($this->session->userdata('group_id') == '9'){
        $group_id = '15';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.taluk_id',$taluk_id);
	   
} if ($this->session->userdata('group_id') == '10'){ 
        $group_id = '14';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);

} if ($this->session->userdata('group_id') == '11'){ 
        $group_id = '15';
	   $this->db->select("users.*,district.district_name,taluk.taluk_name,panchayath.panchayath_name");
	   $this->db->from("users");
	   $this->db->join("district", "users.dist_id=district.id");
	   $this->db->join("taluk", "users.taluk_id=taluk.id");
	   $this->db->join("panchayath", "users.panchayath_id=panchayath.id");
       $this->db->where('users.group_id',$group_id);
       $this->db->where('users.referral_id',$referral_id);
}
	   $query=$this->db->get();
	   return $query->result();
   }

	public function send_data_one($tablename,$filed,$value)
	{
	$this->db->where($filed,$value);
	$query=$this->db->get($tablename);
	return $query->result();
	}
	
	public function send_data_row($tablename,$filed,$value)
	{
	$this->db->where($filed,$value);
	$query=$this->db->get($tablename);
	return $query->row_array();
	}

public function send_data_two_row($tablename,$filed,$value,$fileds,$values)
	{
	$this->db->where($filed,$value);
	$this->db->where($fileds,$values);
	$query=$this->db->get($tablename);
	return $query->row_array();
	}

	public function send_data_two($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
    $query=$this->db->get($tablename);
    return $query->result();
    }
	
	public function getUsersData($userId = null) 
	{
		if($userId) {
		$referral_id = $this->session->userdata('id');
			$sql = "SELECT * FROM users WHERE id = ? and referral_id = '$referral_id'";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
		$sql = "SELECT * FROM users WHERE group_id = ?";
		$query = $this->db->query($sql, array('2'));
		return $query->result_array();
	}
	
		public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}

	public function getdistrict() {
		$query = $this->db->get('district');
		return $query->result_array();
	}
	
	public function getUsers() {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function getWalletUsers() {
		$referral_id = $this->session->userdata('id');
		$sql = "SELECT * FROM users WHERE referral_id = ?";
		$query = $this->db->query($sql, array($referral_id));
		return $query->result_array();
	}
	
	public function getTaluk($parent = 0) 
	{ 
	       $where = '';
		   if($parent > 0){
			   $where = " and parent = $parent ";
		   }
			$sql = "SELECT * FROM taluk WHERE status = 1 $where";
			$query = $this->db->query($sql);
			return $query->result_array();
	}
	
	public function getPanchayath($parent = 0) 
	{
		    $where = '';
		   if($parent > 0){
			   $where = " and parent = $parent ";
		   }
			$sql = "SELECT * FROM panchayath WHERE status = 1 $where";
			//echo $sql;
			$query = $this->db->query($sql);
			return $query->result_array();
	}

	public function getDistrictLimit()
	{
	$group_id =  $this->uri->segment(3);
if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6')){ 
    $sql="select id,district_name from district where id not in (select distinct dist_id from users where group_id = $group_id)";
} if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7')){ 
    $sql="select id,district_name from district where id not in (select distinct dist_id from users where group_id = $group_id)";
}
    $query = $this->db->query($sql);
	return $query->result_array();
	}

	
	public function getTalukLimit($parent = 0, $group_id = 0) 
	{
		//print_r($group_id);die;
	      $where = '';
		   if($parent > 0){
			$where = " and parent = '$parent' ";
		   }
if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4')){ 
	 $sql="select id,taluk_name from taluk where id not in (select distinct taluk_id from users where group_id = $group_id ) $where";
} if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5')){ 
	 $sql="select id,taluk_name from taluk where id not in (select distinct taluk_id from users where group_id = $group_id ) $where";
 }
         $query = $this->db->query($sql);
         return $query->result_array();
	}
	
	public function getPanchayathLimit($parent = 0, $group_id = 0) 
	{
				//print_r($group_id);die;

		    $where = '';
		   if($parent > 0){

			   $where = " and parent = $parent ";
		   } 
	     $sql="select id,panchayath_name from panchayath where id not in (select distinct panchayath_id from users where group_id = '$group_id' ) $where";
			//echo $sql;
			$query = $this->db->query($sql);
			return $query->result_array();
	}


	public function getSignatureData($dist_id) 
	{
		if($dist_id) {
if (($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')) {
        $group_id = '4';
		$sql = "SELECT * FROM `users` WHERE `dist_id` = '$dist_id' and `group_id` = '$group_id'";
		
} if (($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')) {
        $group_ids = '5';
		$sql = "SELECT * FROM `users` WHERE `dist_id` = '$dist_id' and `group_id` = '$group_ids'";
		//echo "$sql";
}
		$query = $this->db->query($sql, array());
		return $query->row_array();

		}
	}


       public function followUp()
    {
	 $referral_id = $this->session->userdata('id');
	 $dist_id = $this->session->userdata('dist_id');
	 $taluk_id = $this->session->userdata('taluk_id');
	 $panchayath_id = $this->session->userdata('panchayath_id');
    //$from_date =date('Y-m-d',strtotime('- 365 day'));
    //$user_id = $this->session->userdata('id');
    //$sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_dates' 
    $followdate =date('Y-m-d',strtotime('- 30 day'));
	$date = date('Y-m-d');
	
if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date'";
} else if(($this->session->userdata('group_id') == 4) || ($this->session->userdata('group_id') == 5)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id'";
} else if(($this->session->userdata('group_id') == 6) || ($this->session->userdata('group_id') == 7) || ($this->session->userdata('group_id') == 10) || ($this->session->userdata('group_id') == 11)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id' and a.taluk_id='$taluk_id'";
} else if(($this->session->userdata('group_id') == 8) || ($this->session->userdata('group_id') == 9) || ($this->session->userdata('group_id') == 12) || ($this->session->userdata('group_id') == 13)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id' and a.panchayath_id='$panchayath_id'";
}
       $query = $this->db->query($sql);
	   return $query->result();

   }

       public function coundFollowUp()
    {
	 $referral_id = $this->session->userdata('id');
	 $dist_id = $this->session->userdata('dist_id');
	 $taluk_id = $this->session->userdata('taluk_id');
	 $panchayath_id = $this->session->userdata('panchayath_id');
    //$from_date =date('Y-m-d',strtotime('- 365 day'));
    //$user_id = $this->session->userdata('id');
    //$sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_dates' 
    $followdate =date('Y-m-d',strtotime('- 30 day'));
	$date = date('Y-m-d');
	
if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date'";
} else if(($this->session->userdata('group_id') == 4) || ($this->session->userdata('group_id') == 5)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id'";
} else if(($this->session->userdata('group_id') == 6) || ($this->session->userdata('group_id') == 7) || ($this->session->userdata('group_id') == 10) || ($this->session->userdata('group_id') == 11)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id' and a.taluk_id='$taluk_id'";
} else if(($this->session->userdata('group_id') == 8) || ($this->session->userdata('group_id') == 9) || ($this->session->userdata('group_id') == 12) || ($this->session->userdata('group_id') == 13)){ 
	   $sql = "select a.*,b.district_name,c.taluk_name from users a,district b,taluk c where a.dist_id=b.id and a.taluk_id=c.id and a.followdate >='$followdate' and a.followdate <='$date' and a.dist_id='$dist_id' and a.panchayath_id='$panchayath_id'";
}
       $query = $this->db->query($sql);
		return $query->num_rows();

	}
	









	public function send($tablename)
	{
	$query=$this->db->get($tablename);
	return $query->result();
	}
	
		public function getPublicsData() 
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array('1'));
		return $query->result_array();
		
	}


	public function getfamilyData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM family_member WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}
	
	public function getCenterData() 
	{
		$logID = $this->session->userdata('id');
		$groupId = ('3');
		$sql = "SELECT * FROM users WHERE log_id = ? AND group_id = ?";
		$query = $this->db->query($sql, array($logID,$groupId));
		return $query->result_array();
		
	}

		public function getAdminCustomerData() 
	{
		$logID = $this->session->userdata('id');
		$sql = "SELECT * FROM users WHERE log_id = ? and status ='Active' ";
		$query = $this->db->query($sql, array($logID));
		return $query->result_array();
	}
	
	public function getUserGroupddd($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();
			
			$group_id = $result['group_id'];
			$g_sql = "SELECT * from groups_list WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}
	public function getUserGroup($group_id) 
	{
		if($group_id) {
			$sql = "SELECT * from groups_list WHERE id = ?";
			$query = $this->db->query($sql, array($group_id));
			$result = $query->row_array();
		
		}
	}
	
	
	public function create($data = '', $group_id = null)
	{
		if($data && $group_id) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'user_id' => $user_id,
				'group_id' => $group_id
			);

			$group_data = $this->db->insert('user_group', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}
	
		public function createinfo($data = '')
	{
		$create = $this->db->insert('customer_info', $data);
		return ($create == true) ? true : false;
	}
	
	
		public function insert($tble,$data)
	{
		$create = $this->db->insert($tble,$data);
		return ($create == true) ? true : false;	
	}
//superadmin

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users WHERE status = ?";
		$query = $this->db->query($sql, array('Active'));
		return $query->num_rows();
	}
	
		public function countTotalAdmin($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function countPublicData()
	{
		$sql = "SELECT * FROM users WHERE group_id != '2'";
	    $query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	public function countTotalDistUsers($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
///Admin
		public function countAdminUsers($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function countCenterUsers($tablename,$filed,$value,$filed1,$value1)
	{
     $this->db->where($filed,$value);
     $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}

	public function countCenterPublic($tablename,$filed,$value,$filed1,$value1)
	{
     $this->db->where($filed,$value);
     $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function countAdminPayments($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
//
	public function countPublicUsers($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	public function countActivePublic($tablename,$filed,$value,$filed1,$value1)
	{
     $this->db->where($filed,$value);
     $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
    public function countTotalFollow($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function countTotalFollows($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	

	
		public function countTotalCenter($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	public function countTotalPayments($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}

	public function countDubil($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function update($tble,$data,$field,$value)
	{
	$this->db->where($field,$value);
		$update = $this->db->update('users', $data);
		return ($update == true) ? true : false;	
	}
	

	
	public function bulkpurchase($tble,$datas,$field,$value)
	{
	$this->db->where($field,$value);
	$update = $this->db->update($tble, $datas);
	return ($update == true) ? true : false;	
	}

	public function updates($tble,$update_data,$field,$value)
	{
	$this->db->where($field,$value);
		$update = $this->db->update('users', $update_data);
		return ($update == true) ? true : false;	
	}
	
	public function order_update($tble,$data,$field,$value,$field1,$value1)
	{
	$this->db->where($field,$value);
	$this->db->where($field1,$value1);
		$update = $this->db->update('order_service', $data);
		return ($update == true) ? true : false;	
	}
	
	public function orderclos_update($tble,$data,$field,$value,$field1,$value1)
	{
	$this->db->where($field,$value);
	$this->db->where($field1,$value1);
		$update = $this->db->update('confirm_order', $data);
		return ($update == true) ? true : false;	
	}
	
	
    public function family_data($tablename,$filed,$value)
    {
	$this->db->where($filed,$value);
    $query=$this->db->get($tablename);
    return $query->result();
    }

    public function create_family($data = '')
	{
		$create = $this->db->insert('family_member', $data);
		return ($create == true) ? true : false;
	}
     
	 public function create_bank_details($data = '')
	{
		$create = $this->db->insert('users', $data);
		return ($create == true) ? true : false;
	}

	//dasbode

	public function countUser($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
	public function countUsers($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
		public function getAdninData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE group_id = ?";
		$query = $this->db->query($sql, array('2'));
		return $query->result_array();
		
	}
	
}
