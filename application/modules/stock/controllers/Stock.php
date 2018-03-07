<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {
	public $data;
	public $user;

	function __construct()
	{
		parent::__construct();
		$this->load->model('aauth_post_model');            		
	}

	public function index(){

	}

	public function art($pk=FALSE,$slug=FALSE)
	{

		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/blank.php',						
	    	'footer' => 'partials/footer.php'
			);	

		$this->data['custom_css'] = 'my-custom-class';
		$this->data['post'] = (array)$this->aauth_post_model->get($pk);
		$this->data['post_id'] = $pk;
		
		$this->loadtemplateview('home_v',$title='Photo',$layout='default',$partials,$theme='frontend');			      
	    	 	
	}

	/* template loader */
	public function loadtemplateview($build='home_v',$title='Home',$layout=False,$partials=False,$theme=False)
	{

	    if($theme)
	    {
	      $this->template->set_theme($theme); 
	    }	
	    if($partials)
	    {	    
		    foreach ($partials as $key => $value)
		    {
				$this->template->set_partial($key, $value);
		    }	    
	    }
	    if($layout){
	    	$this->template->set_layout($layout);
	    }
		$this->template->title($title)	   
		     ->build($build, $this->data); 
	}
}