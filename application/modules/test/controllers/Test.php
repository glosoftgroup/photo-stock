<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('aauth_post_model');            		
	}

	public function index(){
		$this->load->view('test');
	}
}