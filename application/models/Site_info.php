<?php
class Site_info extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	//get universities
	public function site_info($field){
		$query = $this->db->get_where('aauth_site_info');
		$result2 = $query->result_array();
		foreach ($result2 as $key2) {
		  $value = $key2[$field];
		}
		return $value;
	}	
  
}
?>