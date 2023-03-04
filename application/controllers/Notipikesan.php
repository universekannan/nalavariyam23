<?php 

class Notipikesan extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Notipikesan';
		$this->load->model('model_auth');
		$this->load->model('model_notipikesan');
		$this->load->model('model_groups');
		$this->load->model('model_users');
 
	}

	public function index()
	{
		if(!in_array('viewNotipikesan', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
 if($this->session->userdata('group_id') == '1'){
	    $this->data['data'] = $this->model_notipikesan->send_data('notipikesan');
} else {
	

if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){ 
$user_type = 'B';
} if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){ 
$user_type = 'C';
} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){ 
$user_type = 'D';
} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){ 
$user_type = 'E';
} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){ 
$user_type = 'F';
} if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){ 
$user_type = 'G';

}

$this->data['data'] = $this->model_notipikesan->send_data_one('notipikesan','user_type',$user_type);
}

		$this->render_templates('notipikesan/index', $this->data);
	
	}
	
	public function create()
	{
		if(!in_array('createNotipikesan', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('notipikesan_name', 'notipikesan_name', 'required');

        if ($this->form_validation->run() == TRUE) {

        	$data = array(

        		'notipikesan_name' => $this->input->post('notipikesan_name'),
        		'from_date' => $this->input->post('from_date'),
        		'to_date'   => $this->input->post('to_date'),
        		'user_type'  => $this->input->post('user_type'),
        		'notipikesan_details' => $this->input->post('notipikesan_details'),
        		'status' => $this->input->post('status'),
        	);
			   $create = $this->db->insert('notipikesan', $data);
               $insert_id = $this->db->insert_id();

               if(!empty($_FILES['notipikesan_img']['name']))
				{
					if($_FILES['notipikesan_img']['size']!=0)
					{
						if(is_uploaded_file($_FILES['notipikesan_img']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/notipikesan_img/';
						  
							$image_details = getimagesize($_FILES['notipikesan_img']['tmp_name']);
							
							$image_extension = image_type_to_extension($image_details[2]);
			  
							$image_name = rand(10, 99);
							
							$newFileName =  'notipikesan_img_' . $image_name . '' . date("siGdmy").''.$image_extension;
							
							$newTempName = $uploaddir . $newFileName;                 
							
							if (move_uploaded_file($_FILES['notipikesan_img']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/notipikesan_img/'.$newFileName;
	
								$datas=array('notipikesan_img' =>$photo_name);
				//print_r($update_data);die; 

								 $update = $this->model_users->bulkpurchase('notipikesan',$datas,'id',$insert_id);
							}
						}
					}
				}
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('notipikesan', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('notipikesan/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;
			$this->render_template('notipikesan/create', $this->data);
        }			
	}

	public function edit($id)
	{
		if(!in_array('updateNotipikesan', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
		$this->form_validation->set_rules('notipikesan_name', 'notipikesan_name', 'required');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(  
        		'notipikesan_name' => $this->input->post('notipikesan_name'),
        		'from_date' => $this->input->post('from_date'),
        		'to_date'   => $this->input->post('to_date'),
        		'user_type'  => $this->input->post('user_type'),
        		'notipikesan_details' => $this->input->post('notipikesan_details'),
        		'status' => $this->input->post('status'),
		        	);
//print_r($data);die;

	        $update = $this->model_notipikesan->update('notipikesan',$data,'id',$id);
               if(!empty($_FILES['notipikesan_img']['name']))
				{
					if($_FILES['notipikesan_img']['size']!=0)
					{
						if(is_uploaded_file($_FILES['notipikesan_img']['tmp_name'])) 
						{
							$uploaddir = FCPATH.'assets/upload/notipikesan_img/';
							$image_details = getimagesize($_FILES['notipikesan_img']['tmp_name']);
							$image_extension = image_type_to_extension($image_details[2]);
							$image_name = rand(10, 99);
							$newFileName =  'signature_' . $image_name . '' . date("siGdmy").''.$image_extension;
							$newTempName = $uploaddir . $newFileName;
							if (move_uploaded_file($_FILES['notipikesan_img']['tmp_name'], $newTempName)) 
							{
								$photo_name = site_url().'assets/upload/notipikesan_img/'.$newFileName;
								$datas=array('notipikesan_img' =>$photo_name);
								 $update = $this->model_users->bulkpurchase('notipikesan',$datas,'id',$id);

							}
						}
					}
				}
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('notipikesan', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('notipikesan/edit/'.$id, 'refresh');
		        	}
		        }
			        else {
			            // false case
					$this->data['notipikesan_row'] = $this->model_users->send_data_row('notipikesan','id',$id);
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;

					$this->render_template('notipikesan/edit', $this->data);	
			        }	

		        }
	        }
	
	
}