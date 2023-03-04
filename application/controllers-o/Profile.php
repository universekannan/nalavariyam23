<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		//$this->load->library('session');

	}

	//-------------------------------------------------------------------------
	public function index()
	{
		
			$this->load->view('auth/change_pwd');
		
	}

	//-------------------------------------------------------------------------
	public function change_pwd()
	{
		$this->load->library('session');
		  
		$user = $this->session->userdata('user');
		$id=$user['id'];
		
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->auth_model->get_user_detail();
				
				$this->load->view('auth/change_pwd');
				
			} 
			else{
				$data = array(
					'password' => $this->password_hash($this->input->post('password');
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('forgot_password'));
				}
			}
		}
		else{
			
			$this->load->view('auth/change_pwd');
		}
	}
}

?>	