<?php 
class Home extends MY_Controller
{
	public $data;
	public $user;
	function __construct()
	{
		parent::__construct();             
	}

	public function index()
	{

		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/slider.php',						
	    	'footer' => 'partials/footer.php'
			);			
		
		$this->loadtemplateview('home_v',$title='Home',$layout='home',$partials,$theme='frontend');			      
	    	 	
	}

	public function download()
	{
		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/widgets/work_slider.php',
			'screenshots' => 'partials/widgets/screenshots.php',
			'share' => 'partials/widgets/share.php',
			'support' => 'partials/widgets/support.php',
			'services' => 'partials/widgets/services.php',
			'purchase' => 'partials/widgets/purchase.php',
			'body' => 'partials/widgets/screenshots.php',
			'mobile' => 'partials/menu.php',			
	    	'footer' => 'partials/footer.php'
		);
					
		$this->data['title'] = 'GET IT NOW';
		$this->loadtemplateview('download',$title=$this->data['title'],$layout='default',$partials,$theme='frontend');			      
	    	 	
	}


	public function price()
	{
		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/widgets/work_slider.php',
			'screenshots' => 'partials/widgets/screenshots.php',
			'support' => 'partials/widgets/support.php',
			'services' => 'partials/widgets/services.php',
			'purchase' => 'partials/widgets/purchase.php',
			'body' => 'partials/widgets/pricing_table.php',
			'mobile' => 'partials/menu.php',			
	        'footer' => 'partials/footer.php'
			);
					
		$this->data['basic'] = (array)$this->aauth_package_model->get_by('name', 'Basic');
		$this->data['professional'] = (array)$this->aauth_package_model->get_by('name', 'Professional');
		$this->data['enterprise'] = (array)$this->aauth_package_model->get_by('name', 'Enterprise');
		$this->data['plus'] = (array)$this->aauth_package_model->get_by('name', 'Plus');
		
		$this->data['modules'] = package_modules();
		$this->data['title'] = 'Pricing';
		
		$this->loadtemplateview('pricing',$title=$this->data['title'],$layout='default',$partials,$theme='frontend');			      
	    	 	
	}

	public function howitworks(){
		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/widgets/work_slider.php',
			'purchase' => 'partials/widgets/purchase.php',
			'body' => 'partials/widgets/works.php',
			'mobile' => 'partials/menu.php',			
	    	'footer' => 'partials/footer.php'
			);
			
		$this->data['title'] = "How it works";
				
		$this->loadtemplateview('works',$title=$this->data['title'],$layout='default',$partials,$theme='frontend');			      
	  
	}

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
