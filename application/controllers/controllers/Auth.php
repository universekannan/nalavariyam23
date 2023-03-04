<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{
		$this->logged_in();
		$this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
           	$email_exists = $this->model_auth->check_email($this->input->post('email'));

           	if($email_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

           		if($login) {

           			$logged_in_sess = array(
           				'id'           => $login['id'],
				        'log_id'       => $login['log_id'],
				        'referral_id'  => $login['referral_id'],
				        'group_id'     => $login['group_id'],
				        'dist_id'      => $login['dist_id'],
				        'taluk_id'     => $login['taluk_id'],
				        'panchayath_id'=> $login['panchayath_id'],
				        'full_name'    => $login['full_name'],
				        'email'        => $login['email'],
				        'cpassword'    => $login['cpassword'],
				        'profile_photo'=> $login['profile_photo'],
				        'status'       => $login['status'],
				        'logged_in'    => TRUE
					);
				    
					$this->session->set_userdata($logged_in_sess);
					if($this->session->userdata('status') == 'Active'){
						redirect('dashboard', 'refresh');
					} else if($this->session->userdata('status') == 'Inactive'){
						redirect('dashboard', 'refresh');
					}
           		}
           		else {
           			$this->data['errors'] = 'Incorrect email / Password Combination';
           			$this->load->view('auth/login', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'email does not exists';

           		$this->load->view('auth/login', $this->data);
           	}	
        }
        else {
            // false case
            $this->load->view('auth/login');
        }	
	}
	
		

	
	
	 public function register()
	 {

		   if ($this->input->post('register')) 
		  {
			  
		       $this->form_validation->set_rules('fname','Full Name','trim|required');
			   $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
			   $this->form_validation->set_rules('another','another','trim|required|min_length[12]');
			   $this->form_validation->set_rules('mobile','mobile','trim|required|min_length[10]');
			   $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
               $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			   $password = $this->password_hash($this->input->post('password'));
				  if ($this->form_validation->run() == FALSE) 
				   {
					$data = array(
						'errors' => validation_errors(), 
					);
					   $this->session->set_flashdata('errors', $data['errors']);
					
						redirect('auth/register');	 
					}
					else
					{ 

						 $data = array(
						'dist_id' => $this->input->post('dist_name'),
						'full_name' => $this->input->post('fname'),
						'another' => $this->input->post('another'),
						'email' => $this->input->post('email'),
						'password' =>  $password,
						'phone' => $this->input->post('mobile'),
						'date' => date('Y-m-d'),
						'group_id' =>  '3',
						'status' =>  'Inactive',
						 );

				       $insert = $this->model_auth->insert_user($data);
                       $data = array(
		     	       'user_id' =>$insert,
					   'group_id' =>'3',
                           );
					   $insertgroup = $this->model_auth->insert_usergroup($data);	 					
				    if($insert) 
				    {  
                      $message  = "Successfully registered with the sysytem ";
                      $this->session->set_flashdata('msg', $message); 
					  $data["user_id"] = $insert;  
					  redirect('');		  	  
                   }else{
                    
                       $error = "Error, Cannot insert new user details!";
                       $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                       redirect('auth/register');
				    	}
				}
			}
	
		else
		{
			
			 $this->load->view('auth/register');
		}
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	
	public function checkPayment()
	{
		$payment_exists = $this->model_auth->check_payment_user($this->input->post('customerId'));
		return $payment_exists;
	}

		public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	
	public function change_pwd()
	{
		
		$user_id = $this->session->userdata('id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->model_auth->get_user_detail();
			
		        $this->render_template('auth/change_pwd', $data);
				
			}
			else{
				
				$data = array(
					'pas' =>  $this->input->post('password'),
					'password' => $this->password_hash($this->input->post('password'))
				);
				 $id=$user_id;
		     
				$data = $this->security->xss_clean($data);
				$result = $this->model_auth->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('users/change_pwd'),'refresh');
					
				}
			}
		}
		else{
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;	
		$this->render_template('auth/change_pwd', $this->data);
	}


    }
}

