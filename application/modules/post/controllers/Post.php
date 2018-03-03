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
		$data['title'] = ' Posts';		
		$this->template->title($data['title'])        
		         ->build('list', $data);
	}

	public function get_list($num=5,$start=0)
    {
        accessPermisson('view dashboard');
        $data['logs']['results'] = $this->aauth_post_model->get_posts($num,
        	$start);
        if(sizeof($data['logs']['results']) > 0){
        	$data['logs']['total_pages'] = sizeof($data['logs']['results'])/5;
        }else{
        	$data['logs']['total_pages'] = 1;
        }
        
        echo json_encode($data['logs']);
    }

	public function add()
	{
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == FALSE)
        {
        	$data['title'] = 'Add Post';
            
        }
        else
        {
        	$data['title'] = 'Add Post';

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

	public function upload_file()
	{
	    $status = "";
	    $msg = "";
	    $file_element_name = 'file';
	    $upload_path = $this->set_upload_path($dirpath = APPPATH . '../uploads/');	     
	    if ($status != "error")
	    {
	        $config['upload_path'] = $upload_path;
	        $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|jpeg|xls|docx|xlsx';
	        $config['max_size'] = 1024 * 8;
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
	            	'full_path' => $full_path
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
	    echo $msg;
	    echo $status;
	    //echo json_encode(array('status'=>$status, 'msg'=>$msg, 'attachid' => $file_id, 'id' => '1', 'name' => $data['file_name'], 'type'=> $data['file_type'], 'size' => $size));
	}

        
		
}