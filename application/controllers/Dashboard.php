<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Dashboard';
		$this->load->model('model_users');
		$this->load->model('model_customer');
		$this->load->model('model_payments');
	}

	public function index()
	{
	if ($this->session->userdata('group_id') == '1') {
		$referral_id = '1';
		$District_Presidents = '2';
		$District_Secretarys = '3';

	    $this->data['District_Presidents'] = $this->model_users->countUser('users','group_id',4);
	    $this->data['District_Secretarys'] = $this->model_users->countUser('users','group_id',5);
	    $this->data['Taluk_Presidents'] = $this->model_users->countUser('users','group_id',6);
	    $this->data['Taluk_Secretarys'] = $this->model_users->countUser('users','group_id',7);
	    $this->data['Panchayath_Presidents'] = $this->model_users->countUser('users','group_id',8);
	    $this->data['Panchayath_Secretarys'] = $this->model_users->countUser('users','group_id',9);
	    $this->data['Block_Presidents'] = $this->model_users->countUser('users','group_id',10);
	    $this->data['Block_Secretarys'] = $this->model_users->countUser('users','group_id',11);
	    $this->data['Center_Presidents'] = $this->model_users->countUser('users','group_id',12);
	    $this->data['Center_Secretarys'] = $this->model_users->countUser('users','group_id',13);

	    $this->data['Self_Customers'] = $this->model_users->countUser('users','group_id',11);

		$this->render_template('dashboard/superadmin', $this->data);
		
}  if(($this->session->userdata('group_id') == '2') || ($this->session->userdata('group_id') == '3')){
		
		$dist_id=$this->session->userdata('dist_id');
		$group_id=$this->session->userdata('group_id');
		$userID=$this->session->userdata('id');

	if($this->session->userdata('group_id') == '2'){
	    $District = '4';
	} else if($this->session->userdata('group_id') == '3'){
		$District = '5';
    }
	
	if($this->session->userdata('group_id') == '2'){
	    $Taluk = '6';
	} else if($this->session->userdata('group_id') == '3'){
		$Taluk = '7';
    }

	if($this->session->userdata('group_id') == '2'){
	    $Panchayath = '8';
	} else if($this->session->userdata('group_id') == '3'){
		$Panchayath = '9';
    }
	if($this->session->userdata('group_id') == '2'){
	    $Block_User = '10';
	} else if($this->session->userdata('group_id') == '3'){
		$Block_User = '11';
    }

	if($this->session->userdata('group_id') == '2'){
	    $Center = '12';
	} else if($this->session->userdata('group_id') == '3'){
		$Center = '13';
    }
	if($this->session->userdata('group_id') == '2'){
	    $Customers = '14';
	} else if($this->session->userdata('group_id') == '3'){
		$Customers = '15';
    }
	if($this->session->userdata('group_id') == '2'){
	    $SpecialUsers = '16';
        $Notipikesan = 'B';

	} else if($this->session->userdata('group_id') == '3'){
		$SpecialUsers = '17';
        $Notipikesan = 'B';

    }
	
        $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);

	$referral_id=$this->session->userdata('id');

        $this->data['District'] = $this->model_users->countUser('users','group_id',$District);
	    $this->data['Taluk'] = $this->model_users->countUser('users','group_id',$Taluk);
	    $this->data['Panchayath'] = $this->model_users->countUser('users','group_id',$Panchayath);
	    $this->data['Block_User'] = $this->model_users->countUser('users','group_id',$Block_User);
	    $this->data['Center'] = $this->model_users->countUser('users','group_id',$Center);
	    $this->data['Customers'] = $this->model_users->countUser('users','group_id',$Customers);
		
	    $this->data['SpecialUsers'] = $this->model_users->countUser('users','group_id',$SpecialUsers);

	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();

		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
				//print_r($Out_Payment);die;

		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/primary-users', $this->data);
	
} if(($this->session->userdata('group_id') == '4') || ($this->session->userdata('group_id') == '5')){
//Taluk Presidents - Limit
//Special user   (any Dist, Limit - Panchayath Presidents},(any Dist - Center}
//Customer
	
		$dist_id = $this->session->userdata('dist_id');
		$group_id = $this->session->userdata('group_id');
		$referral_id = $this->session->userdata('id');
//print_r($referral_id);die;

	if($this->session->userdata('group_id') == '4'){
	    $taluk = '6';
	} else if($this->session->userdata('group_id') == '5'){
		$taluk = '7';
    }

	if($this->session->userdata('group_id') == '4'){
	    $Panchayath = '8';
	} else if($this->session->userdata('group_id') == '5'){
		$Panchayath = '9';
    }
	if($this->session->userdata('group_id') == '4'){
	    $Block_User = '10';
	} else if($this->session->userdata('group_id') == '5'){
		$Block_User = '11';
    }

	if($this->session->userdata('group_id') == '4'){
	    $Center = '12';
	} else if($this->session->userdata('group_id') == '5'){
		$Center = '13';
    }
	
	if($this->session->userdata('group_id') == '4'){
	    $Customers = '14';
        $Notipikesan = 'C';

	} else if($this->session->userdata('group_id') == '5'){
		$Customers = '15';
        $Notipikesan = 'C';

    }
	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);
	
	    $this->data['Taluk'] = $this->model_users->countUsers('users','group_id',$taluk,'referral_id',$referral_id);
	    $this->data['Panchayath'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Panchayath);
	    $this->data['Block_User'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Block_User);
	    $this->data['Center'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Center);
	    $this->data['Customers'] = $this->model_users->countUsers('users','dist_id',$dist_id,'group_id',$Customers);
	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();

        $group_id = $this->session->userdata('group_id');
	    $this->data['user_data'] = $this->model_users->send_data_row('groups_list','id',$group_id);
				
		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;
		   
		$this->render_template('dashboard/district-users', $this->data);
			
} if(($this->session->userdata('group_id') == '6') || ($this->session->userdata('group_id') == '7')){
//Taluk Presidents
//Panchayath Presidents
//Center                                                   
//Customer 	
	
		$dist_id = $this->session->userdata('dist_id');
		$group_id = $this->session->userdata('group_id');
		$referral_id = $this->session->userdata('id');
//print_r($referral_id);die;

	if($this->session->userdata('group_id') == '6'){
	    $Panchayath = '8';
	} else if($this->session->userdata('group_id') == '7'){
		$Panchayath = '9';
    }

	if($this->session->userdata('group_id') == '6'){
	    $Centers = '12';
	} else if($this->session->userdata('group_id') == '7'){
		$Centers = '13';
    }
	
	if($this->session->userdata('group_id') == '6'){
	    $Customer = '14';
        $Notipikesan = 'D';

	} else if($this->session->userdata('group_id') == '7'){
		$Customer = '15';
        $Notipikesan = 'D';

    }	

	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);


	    $this->data['Panchayath'] = $this->model_users->countUsers('users','group_id',$Panchayath,'referral_id',$referral_id);
	    $this->data['Centers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Centers);
	    $this->data['Customers'] = $this->model_customer->countUsers('users','referral_id',$referral_id,'group_id',$Customer);
	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();

		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/taluk-users', $this->data);
		
		
} if(($this->session->userdata('group_id') == '8') || ($this->session->userdata('group_id') == '9')){
//Taluk Presidents
//Panchayath Presidents
//Center                                                   
//Customer 	
	
		$dist_id = $this->session->userdata('dist_id');
		$group_id = $this->session->userdata('group_id');
		$referral_id = $this->session->userdata('id');
//print_r($referral_id);die;


	if($this->session->userdata('group_id') == '8'){
	    $Centers = '12';
	} else if($this->session->userdata('group_id') == '9'){
		$Centers = '13';
    }
	
	if($this->session->userdata('group_id') == '8'){
	    $CustomerGroup = '14';
        $Notipikesan = 'E';

	} else if($this->session->userdata('group_id') == '9'){
		$CustomerGroup = '15';
        $Notipikesan = 'E';

    }
	
	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);

	    $this->data['Centers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Centers);
	    $this->data['Self_Customers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$CustomerGroup);
	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();

		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/panchayath-users', $this->data);
		
} if(($this->session->userdata('group_id') == '10') || ($this->session->userdata('group_id') == '11')){
//Taluk Presidents
//Panchayath Presidents
//Center                                                   
//Customer 	
	
		$dist_id = $this->session->userdata('dist_id');
		$group_id = $this->session->userdata('group_id');
		$referral_id = $this->session->userdata('id');
//print_r($referral_id);die;

	if($this->session->userdata('group_id') == '10'){
	    $Panchayath = '8';
	} else if($this->session->userdata('group_id') == '11'){
		$Panchayath = '9';
    }
	
	if($this->session->userdata('group_id') == '10'){
	    $Block_User = '10';
	} else if($this->session->userdata('group_id') == '11'){
		$Block_User = '11';
    }	
	if($this->session->userdata('group_id') == '10'){
	    $Centers = '12';
	} else if($this->session->userdata('group_id') == '11'){
		$Centers = '13';
    }
	
	if($this->session->userdata('group_id') == '10'){
	    $group_id = '14';
        $Notipikesan = 'F';

	} else if($this->session->userdata('group_id') == '11'){
		$group_id = '15';
        $Notipikesan = 'F';

    }	
		$this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);


	    $this->data['Panchayath'] = $this->model_users->countUsers('users','group_id',$Panchayath,'referral_id',$referral_id);
	    $this->data['Block_User'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Block_User);
	    $this->data['Centers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$Centers);
	    $this->data['Customers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$group_id);
	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();
		
	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);

		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/block-president', $this->data);
		
} if(($this->session->userdata('group_id') == '12') || ($this->session->userdata('group_id') == '13')){

//Center        

	if($this->session->userdata('group_id') == '12'){
	    $CustomerGroup = '14';
		$Notipikesan = 'G';
	} else if($this->session->userdata('group_id') == '13'){
		$CustomerGroup = '15';
        $Notipikesan = 'G';
    }

	
		$dist_id = $this->session->userdata('dist_id');
		$group_id = $this->session->userdata('group_id');
		$referral_id = $this->session->userdata('id');
//print_r($referral_id);die;


	$Centers = $this->session->userdata('group_id');
	
	    $this->data['Self_Customers'] = $this->model_users->countUsers('users','referral_id',$referral_id,'group_id',$CustomerGroup);
		
	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);
		
		
	    $this->data['Follow_Up'] = $this->model_users->coundFollowUp();

		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/centers-users', $this->data);

}  if(($this->session->userdata('group_id') == '16') || ($this->session->userdata('group_id') == '17')){
		
		$dist_id=$this->session->userdata('dist_id');
		$group_id=$this->session->userdata('group_id');
		$userID=$this->session->userdata('id');

	if($this->session->userdata('group_id') == '16'){
	    $District = '4';
        $Notipikesan = 'I';

	} else if($this->session->userdata('group_id') == '17'){
		$District = '5';
        $Notipikesan = 'I';

    }
	
		
	$user_id=$this->session->userdata('id');
	$referral_id=$this->session->userdata('id');

	    $this->data['District'] = $this->model_users->countUser('assigned_district','user_id',$user_id);

	    $this->data['Notipikesan'] = $this->model_users->countUser('notipikesan','user_type',$Notipikesan);


		$In_Payment = $this->model_payments->getInPayment($referral_id);
	    $this->data['In_Payment'] = $In_Payment;
		//print_r($wallet);die;
		$Out_Payment = $this->model_payments->getOutPayment($referral_id);
	    $this->data['Out_Payment'] = $Out_Payment;
				//print_r($Out_Payment);die;

		$wallet = $In_Payment - $Out_Payment;
		
		$this->render_template('dashboard/special-user', $this->data);
	
	} 		
}
	
	
	
	
	
	
	
	
	
	
	
	
}