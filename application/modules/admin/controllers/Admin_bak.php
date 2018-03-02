<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Aauth_sm_model');
		$this->load->model('Aauth_sms_model');
		$this->load->model('Aauth_browser_model');
		$this->load->model('Aauth_call_model');
		$this->load->model('Aauth_device_model');
		$this->load->model('Aauth_gp_model');
	}

	public function index()
	{
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		//$this->aauth->allow_user($_SESSION['id'],1);
		if(!$this->aauth->is_allowed("view dashboard")){ redirect('home'); exit; }	

		$data['title'] = ' Dashboard';		
		
		 /* *
		  * get monthly reports
		  * :params table name
		  * :returns 12 long array 
		  **/		
		$data['sms_monthly'] = monthly_stats('aauth_sms');
		$data['calls_monthly'] = monthly_stats('aauth_calls');
		$data['browser_monthly'] = monthly_stats('aauth_browsers');
		$data['gps_monthly'] = monthly_stats('aauth_gps');
		
		
		$data['sms']   = $this->Aauth_sm_model->get_many_by('user',get_sessionData());
		$data['browser']   = $this->Aauth_browser_model->get_many_by('user',get_sessionData());
		$data['calls'] = $this->Aauth_call_model->get_many_by('user',get_sessionData());
		$data['gps'] = $this->Aauth_gp_model->get_many_by('user',get_sessionData());
		$data['device'] = $this->Aauth_device_model->get_many_by('user',get_sessionData());
		$arr = monthly_stats_alpa('aauth_sms');
		$data['arr'] = json_encode($arr);
		$this->template->title($data['title'])       
		     ->build('dashboard', $data);
	}

	public function data($table)
	{
		accessPermisson('view dashboard');
		if(!$table){
			$table = 'aauth_sms';
		}
		
		$months = array( '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
		$arr = monthly_stats_d3('aauth_sms');
		echo json_encode($arr);
	}
}
