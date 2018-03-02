<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	/**************
	 *get total users from aauth users table
	 *
	 ****************/
	public function get_users_count(){		
		$this->db->select('id')->from('aauth_users')->where('banned',0);			
		$query = $this->db->get();
		return $query->num_rows();
	}
	/**************
	 *get user info by id
	 *
	 ****************/
    public function get_user_info($user_id,$field){
		$query = $this->db->get_where('aauth_users', array('id' => $user_id));
		$result2 = $query->result_array();
		$value = '';
		foreach ($result2 as $key2) {
		  $value = $key2[$field];
		}
		return $value;
	}
	/**************
	 *Update profile
	 *update  user details
	 ****************/
	 public function update_profile($user_id,$profile){
		$this->db->where('id', $user_id);
        $this->db->update('aauth_users', $profile); 
        return true;
	}
	/**************
	 *Update password
	 *
	 ****************/
	public function update_password($user_id,$pass){
		$this->db->where('id', $user_id);
        $this->db->update('aauth_users', array('pass'=>$pass)); 
        return true;
	}

	/**************
	 *list table columns
	 *
	 ****************/
	 public function list_columns($table){		
        return $fields = $this->db->field_data($table);
	}	
  
}
?>