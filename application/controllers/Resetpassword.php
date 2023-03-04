<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
					    $this->load->library('form_validation');
			    $this->load->library('session');
                $this->load->helper(array('url', 'form'));
			    $this->load->model('model_auth');
		$this->load->library('mailer'); 
       
	}

	public function index()
	    {
		    $this->load->view('auth/reset_password',$data);
		}
		
	
	
	public function reset_password($id=0)
	{
			// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
				
			}   
			else{
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->model_auth->reset_password($id, $new_password);
				$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
				redirect('/');
			}
		}
		else{
			$result = $this->model_auth->check_password_reset_code($id);
			if($result){
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
			}
			else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('forgot_password'));
			}
		}
	}

}
