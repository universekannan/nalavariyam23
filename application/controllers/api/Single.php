<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Single extends REST_Controller {
    
	
    public function __construct() {
       parent::__construct();
       $this->load->database();

    }
	$id = $this->session->userdata('id');
  	public function index_get($id = 0)
	{			
        if(!empty($id)){
            $data = $this->db->get_where("users", ['id' => $id])->row_array();
			
        }else{
            $data = $this->db->get("users")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    
}