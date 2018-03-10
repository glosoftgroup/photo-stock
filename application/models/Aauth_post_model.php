<?php 
class Aauth_post_model extends MY_Model
{

    // getpost per category
    public function get_posts_per_category($category_id=FALSE,$num=5,$start=0, $search=FALSE){
        $this->db->select('*');
        $this->db->from('aauth_taxonomy_metas a');
        $this->db->where('a.category_id',$category_id);
        $this->db->join('aauth_posts b', 'b.id = a.post_id', 'left'); 
        $query = $this->db->limit($num, $start)->get();
        return $query->result();
    }

	//query logs
    public function get_posts($num = 5, $start = 0, $search=FALSE, $date=FALSE) {
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
        $results = array();
        foreach ($q->result_array() as $key => $value) {
            $results[$key] = $value;
            $results[$key]['categories'] = post_categories($value['id']);

        }
        return $results;
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