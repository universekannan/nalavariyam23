<?php 

class Model_report extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getData() 
	{
		$sql = "SELECT * FROM payments";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getUser() 
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getReportsData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM payments WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payments WHERE service_status != 'Waiting'";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}
		public function getReportsDatas($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM payments WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payments WHERE service_status = 'Paid'";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}
	
			public function BulkpurchaseDatas($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM payments WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payments WHERE service_status = 'Bulk'";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}
	
	
		public function getPaymentsPaid($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM payments WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payments WHERE service_status = 'Paid'";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}
	
	public function getAdminPaymentData($dist_id = null) 
	{
		if($dist_id) {
		$sql = "SELECT * FROM payments WHERE dist_id = ?";
		$query = $this->db->query($sql, array($dist_id));
		return $query->result_array();
		
	   }
	   	$sql = "SELECT * FROM payments";
		$query = $this->db->query($sql);
		return $query->result_array();

	}
		
	public function getReportsPendingData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM payments WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM payments WHERE service_status = 'Active'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function rettanapply($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('payments', $data);
		return ($update == true) ? true : false;	
	}

	// Pazhani

	public function update($tble,$data,$field,$value){
		$this->db->where($field,$value);
	 $this->db->update($tble,$data);
	 return true;
	 
    }
	
	 	public function countInactiveData() 
	{
		$sql = "SELECT * FROM payments WHERE service_status = 'Inactive'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function countActiveData() 
	{
		$sql = "SELECT * FROM payments WHERE service_status = 'Active'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
    public function countCenterPayments($tablename,$filed,$value)
	{
     $this->db->where($filed,$value);
	 if ($query = $this->db->get($tablename))
	{
		return $query->num_rows();
	}
	else
	{
    echo "Query failed!";
	}
	}
	
		public function send_data_two($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
    $query=$this->db->get($tablename);
    return $query->result();
    }
	
	 public function display_record($tablename,$filed,$value)
    {
	$this->db->where($filed,$value);
    $query=$this->db->get($tablename);
    return $query->result();
    }
	
		public function display_records($tablename,$filed,$value,$filed1,$value1)
    {
	$this->db->where($filed,$value);
    $this->db->where($filed1,$value1);
    $query=$this->db->get($tablename);
    return $query->result();
    }
		public function create($data = '')
	{
		$create = $this->db->insert('payments', $data);
		return ($create == true) ? true : false;
	}

}