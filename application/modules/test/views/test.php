<?php $this->load->model('Aauth_post_model');

$categories = $this->aauth_post_model->get_category_have_post(20);
		
		echo '<pre>';
		print_r($categories);
		echo '</pre>';
echo $this->db->last_query();

?>