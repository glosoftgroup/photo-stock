<?php 
class Aauth_categorie_model extends MY_Model
{
	//query logs
    public function get_instances($num = 5, $start = 0, $search=FALSE, $date=FALSE) {
        $this->db->select();
       
        if ($search) {
            $this->db->like('name', $search);
        }        
        
        $start *= $num;
        $q = $this->db->from('aauth_categories')
                      ->limit($num, $start)
                      ->order_by('id', 'DESC')->get();
        $results = array();
        foreach ($q->result_array() as $key => $value) {
            $results[$key] = $value;
            $results[$key]['categories'] = post_categories($value['id']);

        }
        return $results;
    }

    //query logs
    public function get_total($num = 5, $start = 0, $search = False, $date=False) {
        $this->db->select();
       
        if ($search) {
            $this->db->like('name', $search);
        }
        
        
        $start *= $num;
        $q = $this->db->from('aauth_categories')
                      //->limit($num, $start)
                      ->order_by('id', 'DESC')->get();
        return $q->num_rows();
    }


}