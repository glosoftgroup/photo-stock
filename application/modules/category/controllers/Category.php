<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller{ 
	/**
	 * categories controller.
	 *	
	 */

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('aauth_post_model');
		$this->load->model('aauth_categorie_model');
		$this->load->model('aauth_taxonomy_meta_model');
	}

	public function index($value='')
	{
		# code...
		accessPermission('view dashboard');
		unset($_SESSION['post_id']);
		$data['title'] = ' Categories';		
		$this->template->title($data['title'])        
		         ->build('list', $data);
	}

	public function get_list($num=20,$start=0)
    {
    	$search = '';
    	$date = '';
    	if(isset($_GET['page_size'])){
    		$num = $_GET['page_size'];
    	}
    	if(isset($_GET['q'])){
    		$search = $_GET['q'];
    	}
    	if(isset($_GET['page'])){
    		$start = $_GET['page']-1;
    	}
    	if(isset($_GET['date'])){    		
    		$date = $_GET['date'];
    		if($date== 'null'){
    			$date = False;
    		}
    	}

        // accessPermisson('view dashboard');
        $data['logs']['results'] = $this->aauth_categorie_model->get_instances($num,
        	$start, $search, $date);
        $data['logs']['total'] = $this->aauth_categorie_model-> get_total($num, $start, $search, $date); //sizeof($data['logs']['results']);
        if(sizeof($data['logs']['results']) > 0){
        	$data['logs']['total_pages'] = $data['logs']['total']/$num;
        	if($data['logs']['total_pages'] <=0){
        		$data['logs']['total_pages'] = 1;
        	}
        }else{
        	$data['logs']['total_pages'] = 1;
        }
        
        echo json_encode($data['logs']);
    }

    // add Category
    public function add($edit=FALSE)
    {
        
        accessPermission('view dashboard');
        if($edit){
            set_sessionData('post_id',$edit);
            $data['pk'] = $edit;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Category Details';            
        }
        else
        {
            $data['title'] = 'Category Details';
            
            $details = array(
                'name'=> $this->input->post('name')
            );     
            $insert_id = $this->aauth_categorie_model->insert($details, FALSE);
              
        }

        $this->template->title($data['title'])        
                       ->build('add', $data);
        
    }


}