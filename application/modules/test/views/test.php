<?php $this->load->model('Aauth_post_model');

$post_toxi = $this->Aauth_post_model->get_posts_per_category(9);
echo json_encode($post_toxi);
echo $this->db->last_query();

?>