<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Districts extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Districts';
		$this->load->model('model_districts');	
		$this->load->model('model_users');	
	}
	public function index()
	{
		if(!in_array('viewDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$districts_data = $this->model_districts->getDistrictsData();
		$this->data['districts_data'] = $districts_data;
		$this->render_templates('districts/index', $this->data);
		
	}
	public function create()
	{
		if(!in_array('createDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('district_name', 'district name', 'required');

        if ($this->form_validation->run() == TRUE) {
        $parent = $this->input->post('parent');
            // true case
        	$data = array(
        		'district_name' => $this->input->post('district_name'),
        		'status' => '1'
        	);
			$create = $this->model_districts->create($data);
        	   if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('districts', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('districts/create/', 'refresh');
        	}
        }
        else {
        	$this->render_template('districts/create', $this->data);	
        }
		
	}
	
	
	
	public function edit($id = null)
	{
		if(!in_array('updateDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('district_name', 'District name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
        		    'district_name' => $this->input->post('district_name'),
        		    'status' => $this->input->post('status')
	        	);
//print_r($data);die();
	        	$update = $this->model_districts->update('district',$data,'id',$id);

	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('districts', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('districts/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $district_data = $this->model_districts->getServiceFile($id);
				$this->data['district'] = $district_data;
				$this->render_template('districts/edit', $this->data);	

	        }
		}
	}
	
	
	public function taluk($id = null)
	{
		if(!in_array('viewDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
	         	    $this->data['data'] = $this->model_districts->send_data_one('taluk','parent',$id);
			        $this->data['district_datas'] = $this->model_users->getDistrict(0); 

					$taluk_data = $this->model_districts->gettaluk($id);
					$this->data['taluk_data'] = $taluk_data;
					
					$district_data = $this->model_districts->getServiceFile($id);
					$this->data['district'] = $district_data;
				$this->render_templates('districts/taluk', $this->data);	
	      
	}
	

	public function talukcreate()
	{
		if(!in_array('createDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('taluk_name', 'taluk name', 'required');

        if ($this->form_validation->run() == TRUE) {
        $parent = $this->input->post('parent');
            // true case
        	$data = array(
        		'taluk_name' => $this->input->post('taluk_name'),
        		'parent' => $parent,
        		'status' => 1
        	);
			$create = $this->model_districts->talukcreate($data);
        	   if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('districts/taluk/'.$parent, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('districts/taluk/'.$parent, 'refresh');
        	}
        }
        else {
        	$this->render_template('districts/taluk', $this->data);	
        }
		
	}
	
	public function edittaluk($id = null)
	{
		if(!in_array('updateDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('taluk_name', 'District name', 'required');

	        if ($this->form_validation->run() == TRUE) {
				$parent = $this->input->post('parent');

	            // true case
	        	$data = array(
        		    'taluk_name' => $this->input->post('taluk_name'),
        		    'parent' => $parent,
        		    'status' => $this->input->post('status')
	        	);
//print_r($data);die();
	        	$update = $this->model_districts->update('taluk',$data,'id',$id);

	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('districts/taluk/'.$parent, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('districts/taluk/'.$parent, 'refresh');
	        	}
	        }
		}
	}
	
	public function panchayath($id = null)
	{
		if(!in_array('viewDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
	         	    $this->data['data'] = $this->model_districts->send_data_one('panchayath','parent',$id);
			        $this->data['taluk_datas'] = $this->model_users->getTaluk(0); 

					$panchayath_data = $this->model_districts->gettaluk($id);
					$this->data['panchayath'] = $panchayath_data;
				$this->render_templates('districts/panchayath', $this->data);	
	      
	}
	

	public function panchayathcreate()
	{
		if(!in_array('createDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('panchayath_name', 'panchayath name', 'required');

        if ($this->form_validation->run() == TRUE) {
        $parent = $this->input->post('parent');
            // true case
        	$data = array(
        		'panchayath_name' => $this->input->post('panchayath_name'),
        		'parent' => $parent,
        		'status' => 1
        	);
			$create = $this->model_districts->panchayathcreate($data);
        	   if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('districts/panchayath/'.$parent, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('districts/panchayath/'.$parent, 'refresh');
        	}
        }
        else {
        	$this->render_template('districts/panchayath', $this->data);	
        }
		
	}
	
	
	public function editpanchayath($id = null)
	{
		if(!in_array('updateDistrict', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('panchayath_name', 'District name', 'required');

	        if ($this->form_validation->run() == TRUE) {
				$parent = $this->input->post('parent');

	            // true case
	        	$data = array(
        		    'panchayath_name' => $this->input->post('panchayath_name'),
        		    'parent' => $parent,
        		    'status' => $this->input->post('status')
	        	);
//print_r($data);die();
	        	$update = $this->model_districts->update('panchayath',$data,'id',$id);

	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('districts/panchayath/'.$parent, 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('districts/panchayath/'.$parent, 'refresh');
	        	}
	        }
		}
	}
	public function getUserData() {
		$query = $this->db->get('user');
		return $query->result_array();
	}


	public function signature($id = null)
	{
		if(!in_array('AllDistricts', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('district_name', 'District name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
        		    'district_name' => $this->input->post('district_name'),
        		    'status' => $this->input->post('status')
	        	);
//print_r($data);die();
	        	$update = $this->model_districts->update('district',$data,'id',$id);

				if(!empty($_FILES['photo']['name']))
				{
					if($_FILES['photo']['size']!=0)
					{
						if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/off/';
						  
							$image_details = getimagesize($_FILES['photo']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['photo']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/off/'.$newFileName;
	
								$update_data=array('signature' =>$photo_name);
	
								 $update = $this->model_districts->update('district',$update_data,'id',$id);
																	   
							}
						}
					}
				}

				
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
                 if($this->session->userdata('group_id') == '2'){
	        		redirect('users/viewdistrictusers/4', 'refresh');
				 }if($this->session->userdata('group_id') == '3'){
	        		redirect('users/viewdistrictusers/5', 'refresh');
				 }
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('districts/signature/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $district_data = $this->model_districts->getServiceFile($id);
				$this->data['district'] = $district_data;
				$this->render_template('districts/signature', $this->data);	

	        }
		}
	}
}