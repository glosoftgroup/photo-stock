<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	function __construct()
	{
		parent::__construct();			
				
    }

    public function indexh()
    {
        echo 'sdf';
    }
    
	public function verification($user_id='',$ver_code='')
	{
		$data['title'] = 'Account Verification';
		$data['error'] = "Your account has been verified successfully";

		$this->aauth->verify_user($user_id, $ver_code);	  
		//$this->load->view('login/header',$data);
		$data['message'] = 'Your account has been verified.';
		$this->template->title($data['title'])	 
		     ->set_layout('login')   
		     ->build('verification', $data);
	}

	//reset password
	public function reset_password($user_id='',$ver_code='')
	{
		$data['title'] = 'Reset Password';
		$data['error'] = "Your account has been verified successfully";

		//$data['uni']   = $this->client_model->get_univerties();
		$this->aauth->reset_password($user_id, $ver_code);

		$data['message'] = 'Your password has been reset successfully. New password has been sent to your email';
		$this->template->title($data['title'])	 
		     ->set_layout('login')   
		     ->build('reset', $data);
	}
	
}
