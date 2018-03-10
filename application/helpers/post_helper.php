<?php

if ( ! function_exists('post_categories'))
{	function post_categories($post_id)
	{ 
	  $ci=& get_instance(); 
	  $ci->load->model('Aauth_taxonomy_meta_model');
	  $post_toxi = $ci->Aauth_taxonomy_meta_model->get_many_by('post_id',$post_id);	

	  return (array)$post_toxi;
	}
}