<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller {

	
	public function index()
	{
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		$this->aauth->control("admin pages" );
		$data['title'] = ' Dashboard';		
		$this->template->title($data['title'])        
		     ->build('roles', $data);
	}
	public function edit($role_id)
	{
		if(!$this->aauth->is_loggedin()){ redirect('login'); exit; }
		$this->aauth->control("admin pages");
		$data['title'] = 'Edit User Roles';
		$data['role_id'] = $role_id;
		
		$this->template->title($data['title'])
		     ->build('edit_roles',$data);
	}
	public function doPermExist()
	{
		$this->aauth->control("admin pages");
		if(isset($_POST['role_name'])){
			if($this->roles_model->permExist($_POST['role_name'])){ 
				echo alert_user("Permission exist. Choose another name"); exit;
			}
			echo '<script>$("#name_feedback").toggle();</script>';
		}		
	}


	public function doRoleExist()
	{   $this->aauth->control("admin pages");
		if(isset($_POST['role_name'])){
			if($this->roles_model->groupExist($_POST['role_name'])){ 
				echo "Group exist"; exit;
			}
			echo '<script>$("#name_feedback").toggle();</script>';
		}		
	}
	public function perm_to_group()
	{ 
	    $this->aauth->control("admin pages");		
		if(isset($_POST['perm_id']) AND isset($_POST['role_id']))
		{
			$perm_id = $_POST['perm_id'];
			$role_id = $_POST['role_id'];

			if(isGroupAllowed($perm_id,$_POST['role_id']))
			{

				if($this->aauth->deny_group($role_id, $perm_id))
				{
					echo alert_user('Role Denied Permission','info');
				}
				exit;
			}
			if($this->aauth->allow_group($role_id, $perm_id))
					{
						echo alert_user('Role Permission Created','info');
					}
					exit;				
		}
			
	}
	public function addPerm()
	{ 
		$this->aauth->control("admin pages");
		if(isset($_POST['role_name']) AND isset($_POST['definition'])){
			if($this->aauth->create_perm($_POST['role_name'],$_POST['definition']))
			{  	echo alert_user($_POST['role_name'].' added successfully','info'); 
				echo "<script>$('#role_name').val('');$('#definition').val('');</script>";
			}else{ echo alert_user($_POST['role_name'].' exist!'); }
		}
		echo "Fill all the fields";
	}
	public function addRole()
	{ 
		$this->aauth->control("admin pages");
		if(isset($_POST['role_name']) AND isset($_POST['definition'])){
			if($this->aauth->create_group($_POST['role_name'],$_POST['definition']))
			{  	echo alert_user($_POST['role_name'].' added successfully','info'); 
				echo "<script>$('#role_name').val('');$('#definition').val('');</script>";
			}else{ echo alert_user($_POST['role_name'].' exist!'); }
		}
		echo "Fill all the fields";
	}


}
