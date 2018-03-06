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
	}
	
	public function index()
	{
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		unset($_SESSION['post_id']);
		$data['title'] = ' Posts';		
		$this->template->title($data['title'])        
		         ->build('list', $data);
	}

	public function get_list($num=5,$start=0)
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

    // get cubrid_is_instance(conn_identifier, oid)
    public function get($edit=FALSE){
    	accessPermisson('view dashboard');
    	if($edit){
    		$row = $this->aauth_post_model->get($edit);
    		$data['results'] = $row;
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
		$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == FALSE)
        {
        	$data['title'] = 'Post Details';            
        }
        else
        {
        	$data['title'] = 'Post Details';

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
        }

        $this->template->title($data['title'])        
			         ->build('add', $data);
		
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