<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	/**
	 * Users controller.
	 *	
	 */
	public function index()
	{
		// $perm = $this->aauth->allow_user($this->aauth->get_user()->id, 'admin pages');
		// echo $this->aauth->get_user()->id;
		// $this->aauth->add_member(2,1);
		// return false;
		
		
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		$data['title'] = ' Users';		
		$this->template->title($data['title'])        
		         ->build('users', $data);
	}

	/*
	 * refresh payment section
	 */
	public function payment()
	{
		$data['track'] = 'payment';
		if(isset($_POST['template']))
		{
		 $this->load->view($_POST['template'],$data);	
		}else{
		 $this->load->view('payment',$data);	
		}
		
	}

	public function profile($user_id = 0)
	{
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		$data['title'] = ' Dashboard';
		if($user_id == 0){ $user_id = get_sessionData('id');}
		$data['user_id'] = $user_id;
		
		$this->template->title($data['title'])        
		         ->build('user_profile', $data);
	}
	
	public function updateProfile(){
	  if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
      if(isset($_POST['user_id']))
      { 
      
        $profile = array();  	

        $details = array(
        	       'full_name',
        	       'address',
        	       'city',
        	       'phone',
        	       'postal_code',
        	       'county' );
        foreach ($details as $key) {
          if(isset($_POST[$key]))
           {
             $profile[$key] = str_replace(' ','_',$_POST[$key]); 
           }
        }

        // update
        if($this->user_model->update_profile($_POST['user_id'],$profile))
		{ echo alert_user(humanize($field.' updated successfully'),'info'); }else
		{ echo 'Error while updating'; }
        // ./update

      }
				
	}
	public function updateUserDetails($field='')
	{
		if(!$this->aauth->is_admin()){ echo "Permission Denied!"; return FALSE;}
		#update fullname
		if($field != '')
		{
			if(isset($_POST[$field]))
			{ 
				//echo $_POST['full_name'];
				if(isset($_POST['user_id']))
				{
					//echo $_POST['user_id'];
					$profile = array(
			   			$field => str_replace(' ','_',$_POST[$field]),			   			
			   		);
			   		if($this->user_model->update_profile($_POST['user_id'],$profile))
			   			{ echo alert_user(humanize($field.' updated successfully'),'info'); }else
			   			{ echo 'Error while updating'; }
				}
			}
		}
		
	}

	function updatePassword(){
		if(isset($_POST['currentPassword']) AND isset($_POST['user_id']) AND isset($_POST['newPassword']) )
			{ 				
			   $currentPassword = $this->aauth->hash_password($_POST['currentPassword'], $_POST['user_id']);
		       $real_password = $this->user_model->get_user_info($_POST['user_id'],'pass');
		       $newpassword  = $this->aauth->hash_password($_POST['newPassword'], $_POST['user_id']);       
		       if($currentPassword != $real_password){ 
		       	$message = 'Wrong current password';
		       	header('HTTP/1.1 500 Internal Server Error');
               header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message'=> $message))); 

		       }
		       if($newpassword == $real_password){ 
		       	$message = alert_user('Choose another password. New password is equal to old password');
		       	header('HTTP/1.1 500 Internal Server Error');
                header('Content-Type: application/json; charset=UTF-8');
               die(json_encode(array('message'=> $message,'code'=>1337)));
              }
		       if($this->user_model->update_password($_POST['user_id'],$newpassword)){ echo alert_user('Password updated successfully','info'); }
		   }
		if(isset($_POST['user_id']) AND isset($_POST['newPassword']) )
			{
				$newpassword  = $this->aauth->hash_password($_POST['newPassword'], $_POST['user_id']);
				if($this->user_model->update_password($_POST['user_id'],$newpassword)){ echo alert_user('Password updated successfully','info'); }
			}
	}
}
