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
		$this->data['custom_css'] = 'transparent';
		$partials = array(	
			'navbar' => 'partials/navbar.php',
			'meta' => 'partials/meta.php',
			'slider' => 'partials/slider.php',						
	    	'footer' => 'partials/footer.php'
			);			
		
		$this->loadtemplateview('home_v', $title='Home', $layout='home', $partials, $theme='frontend');			      
	    	 	
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
