<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Users extends REST_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
  
	public function index_get($id = 0)
	{
        if(!empty($id)){
        $data = $this->db->join('family_member e','e.customer_id = p.id')
         ->join('district	d','d.id = p.dist_id')
		 ->get_where('users p', array('p.id' => $id))->row_array();
        } 
		else {
            $data = $this->db->get("users")->result();
        }
	   $this->response($data, REST_Controller::HTTP_OK);	
	}
}