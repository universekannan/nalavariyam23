<?php 

class Backup extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
        $this->load->database();
		$this->data['page_title'] = 'Backup';
		$this->load->model('Model_backup');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));

     }
	 
	public function index(){
        $data = array();
        
        //get files from database
        $data['files'] = $this->Model_backup->getRows();
        
        //load the view
		$this->render_template('backup/index', $this->data);
    }
    
    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->Model_backup->getRows(array('id' => $id));
            
            //file path
            $file = base_url().'assets/upload/backup/'.$fileInfo['file_name'];
              //print_r($file);die;

            //download file from directory
            force_download($file, NULL);
        }
    }
}



