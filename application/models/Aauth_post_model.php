<?php 
class Aauth_post_model extends MY_Model
{

	//query logs
    public function get_posts($num = 5, $start = 0, $search=False, $date=False) {
        $this->db->select();
       
        if ($search) {
            $this->db->like('title', $search);
        }

        if($date){
            $this->db->like('timestamp', $date);
        }
        
        $start *= $num;
        $q = $this->db->from('aauth_posts')
                      ->limit($num, $start)
                      ->order_by('id', 'DESC')->get();
        return $q->result_array();
    }

    //query logs
    public function get_posts_total($num = 5, $start = 0, $search = False, $date=False) {
        $this->db->select();
       
        if ($search) {
            $this->db->like('title', $search);
        }

        if ($date) {
            $this->db->like('timestamp', $date);
        }
        
        $start *= $num;
        $q = $this->db->from('aauth_posts')
                      //->limit($num, $start)
                      ->order_by('id', 'DESC')->get();
        return $q->num_rows();
    }

}