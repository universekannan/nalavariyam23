<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {

		public function __construct(){
			parent::__construct();
			  
			    $this->load->library('form_validation');
			    $this->load->library('session');
                $this->load->helper(array('url', 'form'));
			    $this->load->model('model_auth');
		}

	public function index()
	{

          $data['bankdata'] = $this->model_auth->getdistrict();
          $this->load->view('register/register',$data);
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
					
						redirect('/register');	 
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
					  redirect('/');		  	  
                   }else{
                    
                       $error = "Error, Cannot insert new user details!";
                       $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                       redirect('/');
				    	}
				}
			}
	
		else
		{
			
			 $this->load->view('register/register');
		}
	}
	
	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	 
}
