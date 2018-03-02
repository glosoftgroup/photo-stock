<?php

class MY_Controller extends MX_Controller
{
	public $user;
	public $data;
	function __construct()
	{
	  parent::__construct();

	  // load libraries
	  //$this->load->library('ion_auth');
	  $this->load->library("geolib/geolib");
	    // $data = $this->geolib->ip_info();
		// $data = $this->geolib->ip_info("197.237.245.52");
		// // print_r($data);
		// die();
	    // $data = $this->geolib->convert_currency("USD", "GBP", 800);
		
		if(ENVIRONMENT == 'production'){
			 //   minify dom
			 $this->load->library('CI_Minifier');
			 $this->ci_minifier->enable_obfuscator();
			 $this->ci_minifier->set_domparser(2);
			 $this->ci_minifier->init(1); 
		}
	 

     //set default theme & layout
		$this->template->set_theme('default'); 
		if($this->aauth->is_loggedin())
		{ 
		      
	      $this->template->set_partial('sidebar', 'partials/sidebar.php')
				  	->set_partial('breadcrumb', 'partials/breadcrumb.php')
				  	->set_partial('meta', 'partials/meta.php')
					->set_partial('footer', 'partials/footer.php')
					->set_partial('navbar', 'partials/navbar.php')
					->set_partial('top', 'partials/top.php');			
			
		}
     // set logged in user
   //   if ($this->ion_auth->logged_in())
   //    {                  
	  //  //$this->user = $this->ion_auth->user();
	  // }
	}
}
