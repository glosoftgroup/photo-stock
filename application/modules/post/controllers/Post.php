<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	/**
	 * post controller.
	 *	
	 */
	function __construct()
	{
		parent::__construct(); 
		$this->load->model('aauth_post_model');
		$this->load->model('Aauth_categorie_model');
		$this->load->model('Aauth_taxonomy_meta_model');

	}

	
	public function index($slug=FALSE)
	{		
		
		accessPermission('view dashboard');
		unset($_SESSION['post_id']);
		$data['title'] = ' Posts';		
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
        $data['logs']['results'] = $this->aauth_post_model->get_posts($num,
        	$start, $search, $date);
        $data['logs']['total'] = $this->aauth_post_model-> get_posts_total($num, $start, $search, $date); //sizeof($data['logs']['results']);
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

    public function search($num=20,$start=0,$category_id=FALSE)
    {
    	$search = '';
    	$date = '';
    	$category = '';

    	if(isset($_GET['page_size'])){
    		$num = $_GET['page_size'];
    	}
    	if(isset($_GET['q'])){
    		$search = trim($_GET['q']);
    	}
    	if(isset($_GET['page'])){
    		$start = $_GET['page']-1;
    	}
    	if(isset($_GET['category'])){    		
    		$category = $_GET['category'];
    		if($category == ''){
    			$category = False;
    		}
    	}

        $data['logs']['results'] = $this->aauth_post_model->get_posts_per_category($num,
        	$start, $search, $category);
        $data['logs']['total'] = $this->aauth_post_model-> get_posts_total($num, $start, $search, $category); //sizeof($data['logs']['results']);
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

    public function load_more($num=5,$start=0)
    {
    	$search = '';
    	if(isset($_GET['q'])){
    		$search = $_GET['q'];
    	}
        // accessPermisson('view dashboard');
        $data['logs']['results'] = $this->aauth_post_model->get_posts($num,$start, $search);
        echo json_encode($data['logs']);
    }

    public function list_categories(){
		$categories = $this->Aauth_categorie_model->get_all();
		$results = array();
		foreach ($categories as $key => $value) {
			# format keys
			$results[$key]['id'] = $value->name;
			$results[$key]['text'] = $value->name;
		}
		echo json_encode($results);
		
	}

	public function load_categories(){
		$categories = $this->aauth_post_model->get_category_have_post(20);
		
		// echo '<pre>';
		// print_r($categories);
		// echo '</pre>';
		$results = array();
		foreach ($categories as $key => $value) {
			# format keys
			$results[$key]['id'] = $value->id;
			$results[$key]['text'] = $value->name;
		}
		echo json_encode($results);
		
	}

    // get cubrid_is_instance(conn_identifier, oid)
    public function get($edit=FALSE){
    	accessPermisson('view dashboard');
    	if($edit){
    		$row = $this->aauth_post_model->get($edit);
    		$post_toxi = $this->Aauth_taxonomy_meta_model->get_many_by('post_id',(int)$edit);
    		$categories = array();
    		foreach ($post_toxi as $key=>$value) {
    			# populate categories.
    			$categories[$key]['id'] = $value->category_name;
    			$categories[$key]['text'] = $value->category_name;
    		}
    		$data['results'] = (array)$row;
    		$data['results']['categories'] = $categories;
    		echo json_encode($data);
    	}else{
    		echo json_encode(array('message'=>'Post id required'));
    	}
    }

    // delete cubrid_is_instance(conn_identifier, oid)
    public function destroy_instance($edit=FALSE){
    	accessPermisson('view dashboard');
    	if($edit){
    		$delete_id = $this->aauth_post_model->delete($edit);
    		echo json_encode(array('message'=>$delete_id));
    	}else{
    		echo json_encode(array('message'=>'Post id required'));
    	}
    }

	public function add($edit=FALSE)
	{
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		if($edit){
			set_sessionData('post_id',$edit);
			$data['pk'] = $edit;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == FALSE)
        {
        	$data['title'] = 'Post Details';            
        }
        else
        {
        	$data['title'] = 'Post Details';
        	$categories = json_decode($this->input->post('categories'
        		));
        	$details = array(
            	'title'=> $this->input->post('title'),
            	'body'=>  $this->input->post('body')
            );     
	     	if(isset($_SESSION['post_id'])){
	     		$row = $this->aauth_post_model->get($_SESSION['post_id']);
	            	if(sizeof($row) <= 0){
	            		$insert_id = $this->aauth_post_model->insert($details, FALSE);
	            		set_sessionData('post_id',$insert_id);		
	            	}
	            $insert_id = $this->aauth_post_model->update($_SESSION['post_id'],$details);
	        }else{
	        	$insert_id = $this->aauth_post_model->insert($details, FALSE);
	        	set_sessionData('post_id',$insert_id);
	        } 
	        // insert categories
    		$this->update_categories($categories, $_SESSION['post_id']);  
        }

        $this->template->title($data['title'])        
			         ->build('add', $data);
		
	}

	public function update_categories($categories=FALSE,$post_id=FALSE)
	{
		if(!$post_id){
			return FALSE;
		}
		if(!$categories){
			return FALSE;
		}

		// delete post taxonomy
		// get all taxomies by category & post
		$arr = array('post_id'=>$post_id);
		$taxonomies = $this->Aauth_taxonomy_meta_model->get_many_by($arr);

		// delete all and update with newly selected			
		if(sizeof($taxonomies) > 0)
		{
			foreach ($taxonomies as $toxi) {
				# delete them all :()
				$delete_id = $this->Aauth_taxonomy_meta_model->delete( $toxi->id);
			}
		}

		// update post taxonomy
		foreach ($categories as $value) {
			# check if category exists else create
			$row = $this->Aauth_categorie_model->get_by('name', $value);
			// if empty create new category
			if(sizeof($row) <= 0)
			{
				$details = array('name'=>$value);
				$category_id = $this->Aauth_categorie_model->insert($details, FALSE);
			}else{
				$category_id = $row->id;
			}		

			$arr = array(
				'category_id'=>$category_id, 
				'category_name'=>$value,
				'post_id'=>$post_id
			);
			// add taxonomy based on this category and taxonomy
			$insert_id = $this->Aauth_taxonomy_meta_model->insert($arr, FALSE);
			// return $insert_id;

		}

	}
		
	// create upload directory
    public function set_upload_path($dirpath) {
        $dirpath = APPPATH . '../uploads/';
        // create upload path
        makedirs($dirpath);
        // create timestamp path
        $timestamp = date('Y_M');
        $dirpath .= $timestamp . '/';
        makedirs($dirpath);
        return $dirpath;
	}   

	public function upload_file($edit=FALSE)
	{
	    $status = "";
	    $msg = "";
	    $file_element_name = 'file';
	    $upload_path = $this->set_upload_path($dirpath = APPPATH . '../uploads/');	     
	    if ($status != "error")
	    {
	        $config['upload_path'] = $upload_path;
	        $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|jpeg|xls|docx|xlsx';
	        $config['max_size'] = 15024 * 8;
	        $config['encrypt_name'] = FALSE;
	 		$file_id = 0;
	        $this->load->library('upload', $config);
	 
	        if (!$this->upload->do_upload($file_element_name))
	        {
	            $status = 'error';
	            $msg = $this->upload->display_errors('', '');
	        }
	        else
	        {
	            $data = $this->upload->data();
	            $full_path = "uploads/"  . date('Y_M') . '/' . $this->upload->data()['orig_name'];	            

	            

	            $details = array(
	            	'file_name'=> $data['file_name'], 
	            	'file_type'=>  $data['file_type'],
	            	'file_size' => $data['file_size'],
	            	'full_path' => $full_path,
	            	'server_path' => $data['full_path']
	            );

	            $file_path = $data['file_path'];
	            $thumb = thumb($data['full_path'], 700, 580);
	            //$path = pathinfo($data['full_path']);
	            // print_r($path);
	            $details['thumbnail'] = "uploads/" . date('Y_M') . DIRECTORY_SEPARATOR .$thumb;
	            $thumb = $file_path .$thumb;

	            

	            // add water mark
	            $config['image_library'] = 'GD2';
	            $config['source_image'] = $thumb;
				$config['wm_type'] = 'overlay';
				$config['wm_overlay_path'] = 'assets/ibm.png';
				$config['wm_vrt_alignment'] = 'middle'; 
		        $config['wm_hor_alignment'] = 'center';
		        $config['wm_hor_offset'] = '10';
		        $config['wm_vrt_offset'] = '10';
				

				$this->image_lib->initialize($config);

				// $this->image_lib->watermark();
				if(!$this->image_lib->watermark()){
			    	echo $this->image_lib->display_errors();
			    }

	            if($edit){
					set_sessionData('post_id',$edit);
				}

	            if(isset($_SESSION['post_id'])){
	            	$row = $this->aauth_post_model->get($_SESSION['post_id']);
	            	if(sizeof($row) <= 0){
	            		$insert_id = $this->aauth_post_model->insert($details, FALSE);
	            		set_sessionData('post_id',$insert_id);	
	            	}
	            	$insert_id = $this->aauth_post_model->update($_SESSION['post_id'],$details);
	            }else{
	            	$insert_id = $this->aauth_post_model->insert($details, FALSE);
	            }				
	            
	            if($insert_id)
	            {
	            	set_sessionData('post_id',$insert_id);
	                $status = "success";
	                $msg = "File successfully uploaded";
	                $details['id'] = $insert_id;
	                echo json_encode($details);
	            }
	            else
	            {
	                $status = "error";
	                $msg = "Something went wrong when saving the file, please try again.";
	            }
	            $size = filesize($data['full_path'])/1000;
	            // delete file
	            // unlink($data['full_path']);
	        }
	    }
	    //echo json_encode(array('status'=>$status, 'msg'=>$msg, 'attachid' => $file_id, 'id' => '1', 'name' => $data['file_name'], 'type'=> $data['file_type'], 'size' => $size));
	}


        
		
}