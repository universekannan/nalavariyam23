<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Report';
		$this->load->model('model_report');
		$this->load->model('model_service');
		$this->load->model('model_users');
		$this->load->model('model_districts');
		    $to_dates = date("Y-m-d");
//print_r($to_date);die;
    $from_date =date('Y-m-d',strtotime('- 365 day'));
    $user_id = $this->session->userdata('id');
    $sql="Select * from users where id = '$user_id' and from_to_date>='$from_date' and from_to_date<='$to_dates' order by id desc limit 1 ";    
    $query = $this->db->query($sql);
    $data = $query->row();
    if(!empty($data)){ 
  			redirect('dashboard', 'refresh');
      } 
	}
	public function index($id = null)
	{
		if(!in_array('AllServices', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		 $log_id=$this->session->userdata('id');
		 $service_status= 'Img';

		$this->data['data'] = $this->model_report->send_data_two('payments','log_id',$log_id,'service_status',$service_status);

		$this->render_template('reports/completed', $this->data);
	}
	
	
		public function receipt($id = null)
	{
		if(!in_array('AllServices', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		 $log_id=$this->session->userdata('id');
		 $service_status= 'Img';

		$this->data['data'] = $this->model_report->send_data_two('payments','log_id',$log_id,'service_status',$service_status);

		$this->render_template('reports/receipt', $this->data);
	}
	
	
	public function cropimage()
	{
		if(!in_array('AllServices', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('reports/cropimage');
			        	    		//print_r($success);die;
	}

	public function indexs()
	{
		$id =  $this->uri->segment(3);
		$customer_id =  $this->uri->segment(4);
		$servicedata = $this->model_service->getServiceFile($id);

		$this->data['servicedata'] = $servicedata;
		$reportdata = $this->model_report->getData();
		$this->data['reportdata'] = $reportdata;
		$user_data = $this->model_users->getAdninData($id);
		$groups = $this->model_users->getUserGroup($id);
        $this->data['user_data'] = $user_data;

		$this->render_template('reports/indexs', $this->data);
	}
	
	public function output($id = null)
	{
		$servicedata = $this->model_service->getServiceFile($id);
		$this->data['servicedata'] = $servicedata;
		$this->render_template('reports/output', $this->data);
		
	}
	
	public function outputs($id = null)
	{
		$servicedata = $this->model_service->getServiceFile($id);
		$this->data['servicedata'] = $servicedata;
		$this->render_template('reports/outputs', $this->data);
		
	}
	
		public function completed($id = null)
	{
		 $log_id=$this->session->userdata('log_id');

		$this->data['data'] = $this->model_report->display_record('payments','log_id',$log_id);

		$this->render_template('reports/completed', $this->data);
	}
	
		public function adminpayment($dist_id = null)
	{
		$reports_completed_data = $this->model_report->getAdminPaymentData('$dist_id');
		$this->data['reports_completed_data'] = $reports_completed_data;
		$this->render_templates('reports/adminpayment', $this->data);
	}
	
		public function adminpayments($dist_id = null)
	{
		//var_dump($dist_id);
		//echo $dist_id;
        //$this->uri->segment('2');
        //$this->uri->segment(2);
       if($dist_id) {
		$adminpayment_data = $this->model_report->getAdminPaymentData('$dist_id');
		$result = array();
		foreach ($adminpayment_data as $k => $v) {
		$result[$k]['adminpayment_info'] = $v;
		}
		}
		$this->data['adminpayment_data'] = $result;
		$this->render_templates('reports/adminpayment', $this->data);
	}
	
		public function pending($id = null)
	{
		$reports_pending_data = $this->model_report->getReportsPendingData($id);
		$this->data['reports_pending_data'] = $reports_pending_data;
		$this->render_template('reports/pending', $this->data);
	}
	
	public function rettanapplys($id = null)
	{
		$reports_completed_data = $this->model_report->getReportsData($id);
		$this->data['reports_completed_data'] = $reports_completed_data;
		$this->render_templates('reports/rettanapplys', $this->data);
		
	}
	
     public function rettanapply($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('service_status', 'Status', 'required');
	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'service_status' => $this->input->post('service_status')
	        	);
	        	$update = $this->model_report->rettanapply($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('reports/rettanapplys', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('reports/rettanapply/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $reports_completed_data = $this->model_report->getReportsData($id);
				$this->data['reports_completed_data'] = $reports_completed_data;
				$this->render_templates('reports/rettanapply', $this->data);	
	        }
			
		}
		
	}
	   public function billcreate()
	{
		if($id = $this->input->post('id')) {
			//print_r($id);die;

			$this->form_validation->set_rules('adsional_amount', 'adsional_amount', 'required');
	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'adsional_amount' => $this->input->post('adsional_amount'),
	        		'bill' => 2
	        	);

			   //print_r($id);die;
	        	$update = $this->model_report->rettanapply($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('reports', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('reports/completed', 'refresh');
	        	}
	        }
	        else {
				$this->render_templates('reports/completed', $this->data);	
	        }
			
		}
		
	}
	
	public function pendingappeals($id = null)
	{
		$reports_completed_data = $this->model_report->getReportsDatas($id);
		$this->data['reports_completed_data'] = $reports_completed_data;
		$this->render_templates('reports/pendingappeals', $this->data);
		
	}

	public function bulkpurchase($id = null)
	{
		$reports_completed_data = $this->model_report->BulkpurchaseDatas($id);
		$this->data['reports_completed_data'] = $reports_completed_data;
		$this->render_templates('reports/bulkpurchase', $this->data);
		
	}
	public function paidappeals($id = null)
	{
		$reports_completed_data = $this->model_report->getPaymentsPaid($id);
		$this->data['reports_completed_data'] = $reports_completed_data;
		$this->render_templates('reports/paidappeals', $this->data);
		
	}
	
     public function pendingappeal($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('service_status', 'Status', 'required');
	        if ($this->form_validation->run() == TRUE) {
	            // true case
	        	$data = array(
	        		'service_status' => $this->input->post('service_status')
	        	);
	        	$update = $this->model_report->rettanapply($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('reports/pendingappeals', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('reports/pendingappeal/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $reports_completed_data = $this->model_report->getReportsData($id);
				$this->data['reports_completed_data'] = $reports_completed_data;
				$this->render_templates('reports/pendingappeal', $this->data);	
	        }
			
		}
		
	}
	public function paymentupload()
	{
    if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '12')){
$group_ids = '4';
  } if(($this->session->userdata('group_id') == '3') || ($this->session->userdata('group_id') == '5') || ($this->session->userdata('group_id') == '7') || ($this->session->userdata('group_id') == '9') || ($this->session->userdata('group_id') == '11') || ($this->session->userdata('group_id') == '13')){
$group_ids = '5';
}
		$customer_id = $this->input->post('customer_id');
		$serID = $this->input->post('ser_id');
		$userID = $this->session->userdata('id');
		$distID = $this->session->userdata('dist_id');
		$targetDir = "assets/upload/output/"; 
		$sql="Select * from service where id = $serID order by id desc limit 1 ";    
		$query = $this->db->query($sql);
		$data =  $query->row();
		//print_r($customer_id);die();

$sql="Select * from users where dist_id = $distID and group_id =$group_ids order by id desc limit 1 ";    
$query = $this->db->query($sql);
$datag =  $query->row();
$watermarkImagePath = $datag->signature2;

		//print_r($watermarkImagePath);die();
		 
		$statusMsg ='';
			if(!empty($_FILES["photo"]["name"])){ 
				// File upload path 
				$image_name = rand(10, 99);
				$fileName = site_url().'assets/upload/output/outputimage_' . $image_name . '' . date("siGdmy").''.basename($_FILES["photo"]["name"]); 
				$basename='outputimage_' . $image_name . '' . date("siGdmy").''. basename($_FILES['photo']['name']);
				$targetFilePath1 = $targetDir . $basename; 
				$targetFilePath = $fileName; 
						//print_r($fileName);die();

				$fileType = pathinfo($targetFilePath1,PATHINFO_EXTENSION); 
				// Allow certain file formats 
				$allowTypes = array('jpg','png','jpeg'); 

				if(in_array($fileType, $allowTypes)){ 
					// Upload file to the server 
					if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath1)){ 
						//print_r($fileType);die();

						// Load the stamp and the photo to apply the watermark to 
						$watermarkImg = imagecreatefrompng($watermarkImagePath); 
						switch($fileType){ 
							case 'jpg': 
								$im = imagecreatefromjpeg($targetFilePath1); 
								break; 
							case 'jpeg': 
								$im = imagecreatefromjpeg($targetFilePath1); 
								break; 
							case 'png': 
								$im = imagecreatefrompng($targetFilePath1); 
								break; 
							default: 
								$im = imagecreatefromjpeg($targetFilePath1); 
						} 
						 
						// Set the margins for the watermark 
						
		                $marge_right = $data->marge_right; 
		                $marge_bottom = $data->marge_bottom; 

						// Get the height/width of the watermark image 
						$sx = imagesx($watermarkImg); 
						$sy = imagesy($watermarkImg); 
						imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
						 
						// Save image and free memory 
						imagejpeg($im, $targetFilePath1); 
						imagedestroy($im); 
						if(file_exists($targetFilePath1)){ 
					$data = array(
						'from_image'   =>  $targetFilePath,
						'service_id' => $serID,
						'customer_id' => $customer_id,
						'ad_info' => $this->input->post('ad_info'),
						'family_user_id' => $this->input->post('family_user_id'),
						'log_id' => $userID,
						'service_status' => "Img"
						);
						//print_r($data);die();

						$imagename=$this->db->get_where("payments",array("customer_id"=>$userID))->row();
						 @unlink($imagename->from_image);

						  $sql="Select * from payments where customer_id = $customer_id  and service_status = 'Paid' order by id desc limit 1 ";
                          $query = $this->db->query($sql);
                          $datas =  $query->row();
                          $row_id = $datas->id;
						//print_r($row_id);die();

						$update = $this->model_report->update('payments',$data,'id',$row_id);
												
							$statusMsg = "The image with watermark has been uploaded successfully."; 
						}else{ 
							$statusMsg = "Image upload failed, please try again."; 
						}  
					}else{ 
						$statusMsg = "Sorry, there was an error uploading your file."; 
					} 
				}else{ 
					$statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
				} 
			}else{ 
				$statusMsg = 'Please select a file to upload.'; 
			} 
			redirect('service/indexs/'.$customer_id, 'refresh');
		}
		
public function tests($id = null)
	   {
		$servicedata = $this->model_service->getServiceFile($id);
		$this->data['servicedata'] = $servicedata;
		
		
		$user_data = $this->model_users->getAdninData($id);
		$groups = $this->model_users->getUserGroup($id);
		$this->data['user_data'] = $user_data;
		$this->render_template('service/test', $this->data);
		
	}

	public function test($id = null)
	{
		$distID = $this->session->userdata('dist_id');

		$servicedata = $this->model_service->getServiceFile($id);
		$this->data['servicedata'] = $servicedata;
		$user_data = $this->model_users->getAdninData($id);
		$this->data['user_data'] = $user_data;
		$dist_data = $this->model_districts->getServiceFile($distID);
		$this->data['dist_data'] = $dist_data;
		$this->render_template('service/test', $this->data);
		
	}
	
				public function payment()
	{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$dist_id =  $this->uri->segment(3);
	    $this->data['data'] = $this->model_report->display_record('payments','dist_id',$dist_id);
		$this->render_templates('reports/payment', $this->data);
	}
	public function centerspayment()
	{
		if(!in_array('viewUser', $this->permission)) {
		redirect('dashboard', 'refresh');
		}
		$log_id =  $this->uri->segment(3);
		$dist_id =  $this->uri->segment(4);
		
		$this->data['data'] = $this->model_report->display_records('payments','dist_id',$dist_id,'log_id',$log_id);

		$this->render_templates('reports/centerspayment', $this->data);
	}

}