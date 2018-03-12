<?php 
class Aauth_post_model extends MY_Model
{
    // get categories that have posts
    public function get_category_have_post($num=10,$start=0){
        $this->load->model('aauth_categorie_model');
        $this->db->select('*');
        $this->db->from('aauth_categories a');        
        $this->db->join('aauth_taxonomy_metas b', 'b.category_id = a.id', 'left');         
        $query = $this->db->limit($num, $start)->get();
        // $query->result();
        $numbers = array();
        foreach($query->result_array() as $key=>$value)
        {
            $numbers[$key]= $value['category_id'];
            // $numbers[$key]['name']= $value['name'];

        }
        $numbers = array_unique($numbers);
        //return $query->result(); //$numbers;
        return $this->aauth_categorie_model->get_many($numbers);
    }

    // getpost per category
    public function get_posts_per_category($num=5,$start=0, $search=FALSE, $category_par=FALSE){
        $this->db->select('*');
        $this->db->from('aauth_posts a');
        if($search){
            if( !is_numeric($search)){
                $this->db->like('a.title',$search); 
            }            
        }
        $this->db->join('aauth_taxonomy_metas b', 'b.post_id = a.id', 'left');
        if($search){
            if( !is_numeric($search)){
                $this->db->or_like('b.category_name',$search); 
            }            
        }         
        if($category_par){
            if( is_numeric($category_par) ){
              $this->db->where('b.category_id',$category_par);  
          }else{
            $this->db->like('b.category_name',$category_par);
          }
        
        }        
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