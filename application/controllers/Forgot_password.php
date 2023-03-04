<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_auth');
		$this->load->library('mailer'); 
       
	}

	public function index()
	{
		$this->load->view('auth/forgot_password');
		
	}
	
	public function forget_password()
	{
		if($this->input->post('submit')){
		
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			
			$email = $this->input->post('email');
            
			$response = $this->model_auth->check_user_mail($email); 
			
			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['id']);
				$this->model_auth->update_reset_code($pwd_reset_code, $response['id']);

				$name = $response['full_name'];
				$email = $response['email'];
				$reset_link = base_url('resetpassword/reset_password/'.$pwd_reset_code);
				$body = $this->mailer->pwd_reset_link($name,$reset_link);

				$this->load->helper('email_helper');
				$to = $email;
				$subject = 'Reset your password';
				$message =  $body ;
				$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
				if($email){
					
					$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');
					redirect(base_url('forgot_password'));
				}
				else{
					$this->session->set_flashdata('error', 'There is the problem on your email');
					redirect(base_url('forgot_password'));
				}
			}
			else{
				$this->session->set_flashdata('error', 'The Email that you provided are invalid');
				redirect(base_url('forgot_password'));
			}
		}
		else{
			$data['title'] = 'Forget Password';
			$this->load->view('auth/forgot_password');
		}
	}
}
