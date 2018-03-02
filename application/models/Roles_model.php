<?php
class Roles_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	#ccheck whether permission exist
	public function permExist($group_name){
		$query = $this->db->get_where('aauth_perms', array('name' => $group_name));
		if ($query->num_rows() < 1)
		 {
			return false;
		 }else{ return True;}
	}
	
	public function groupExist($group_name){
		$query = $this->db->get_where('aauth_groups', array('name' => $group_name));
		if ($query->num_rows() < 1)
		 {
			return false;
		 }else{ return True;}
	}
	public function get_roles($group_id){
		$query = $this->db->get_where('aauth_groups', array('id' => $group_id));
		return $query->result_array();
	}	
  
}
?>