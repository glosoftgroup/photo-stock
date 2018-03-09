<?php $this->load->model('Aauth_taxonomy_meta_model');

$post_toxi = $this->Aauth_taxonomy_meta_model->get_many('post_id',80);
echo json_encode($post_toxi);
echo $this->db->last_query();

?>