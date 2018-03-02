<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('siteinfo')){function siteinfo($info){ $ci =& get_instance(); return $ci->site_info->site_info($info); }	
}
if ( ! function_exists('user_details'))
{ 
	function user_details($user_id,$field){
		$ci =& get_instance();
		return $ci->user_model->get_user_info($user_id,$field);	}
}

if ( ! function_exists('get_sessionData'))
{
    function get_sessionData($key='id'){  $ci =& get_instance(); return $ci->session->userdata($key); }
}
if ( ! function_exists('set_sessionData'))
{	function set_sessionData($key,$value){ $ci=& get_instance(); $newdata = array($key  => $value);
	  $ci->session->set_userdata($newdata);	}
}
if ( ! function_exists('alert_user'))
{	
	function alert_user($error,$type = 'danger'){ ?>
	 <div class='alert alert-<?=$type;?> fade in'>
	  <span class='fg-<?=$type;?>'><?=$error;?></span>
	</div>
	 <?php	}
}
if ( ! function_exists('isyourProfile'))
{
	function isyourProfile($user_id=''){ if($user_id == get_sessionData('id')){ return TRUE;	}else{ return FALSE; } 	}
}
if ( ! function_exists('isGroupAllowed'))
{
	function isGroupAllowed($perm,$group_id)
	{
		$ci=& get_instance();
		return $ci->aauth->is_group_allowed($perm,$group_id);
	}
}
if ( ! function_exists('accessPermission'))
{
	function accessPermission($perm_per=FALSE,$redirect_to='login')
	{
		$ci=& get_instance();
		if($perm_per != FALSE)
		{
			if(!$ci->aauth->is_loggedin()){ redirect($redirect_to); exit; }
		    if(!$ci->aauth->is_allowed($perm_per)){ redirect($redirect_to); exit; }
		}
		
	}
}
if ( ! function_exists('accessPermisson'))
{
	function accessPermisson($perm_per=FALSE,$redirect_to='login')
	{
		$ci=& get_instance();
		if($perm_per != FALSE)
		{
			if(!$ci->aauth->is_loggedin()){ redirect($redirect_to); exit; }
		    if(!$ci->aauth->is_allowed($perm_per)){ redirect($redirect_to); exit; }
		}
		
	}
}
if ( ! function_exists('color'))
{
	function color($priority =0)
	{
			switch ($priority) {
			case 1:
				echo 'bg-danger-400';
				break;
			case 2:
				 echo 'bg-warning-400';
				break;
			case 3:
				 echo 'bg-pink-400';
				break;
			 case 4:
				 echo 'bg-info-400';
				break;
			default:
				 echo 'bg-black-400';
		}
	}
function priorityName($priority =0)
{
	switch ($priority) {
		case 1:
			echo 'Critical';
			break;
		case 2:
			echo 'High';
			break;
		case 3:
			echo 'Medium';
			break;
		case 4:
			echo 'Low';
			break;
		default:
			echo '';
		}
	}
}

/*
 * create login fast url
 */
if ( ! function_exists('login_fast_link'))
{
	function login_fast_link($user_id=FALSE,$redirect='admin')
	{
		if(!$user_id){
			if(isset($_SESSION['id']))
			{
				$user_id = $_SESSION['id'];
			}else{
				return base_url('login');
			}
			
		}
		$user_id += 8342;
		return base_url('login/login_fast/'.$user_id).'/'.$redirect.'/';
	}
}




// ------------------------------------------------------------------------

/* End of file site_helper.php */
/* Location: ./application/helpers/site_helper.php */