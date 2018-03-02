<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	/**
	 * Users controller.
	 *	
	 */
	public function index()
	{
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		$data['title'] = ' Posts';		
		$this->template->title($data['title'])        
		         ->build('list', $data);
	}

	public function add()
	{
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('image', 'Image', 'required');
		if ($this->form_validation->run() == FALSE)
        {
        	$data['title'] = 'Add Post';
            
        }
        else
        {
        	$data['title'] = 'Added Post';
            
        }
        
		$this->template->title($data['title'])        
			         ->build('add', $data);
		
	}
}