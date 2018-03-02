<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		//$this->aauth->allow_user($_SESSION['id'],1);
		//if(!$this->aauth->is_allowed("view dashboard")){ redirect('home'); exit; }	

		$data['title'] = ' Dashboard';		
		
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
