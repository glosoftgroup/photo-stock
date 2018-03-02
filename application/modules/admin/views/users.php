<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


		

					<!-- Main charts -->
					<div class="content-group">
								<div class="page-header page-header-inverse" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
									<div class="page-header-content">
										<div class="page-title">
											<h5>
												<i class="icon-arrow-left52 position-left"></i>
												<span class="text-semibold"> Users </span> - <?=siteinfo('name');?>
												<small class="display-block"><a href="<?=base_url('register');?>"><button class='btn btn-info btn-xl'>Add new</button></a></small>
											</h5>
										</div>

										<div class="heading-elements">
			                                <button class="btn btn-link btn-icon btn-sm heading-btn"><i class="icon-gear"></i></button>
										</div>
									</div>

									
								</div>
							</div>
					<div class="row">
						<div class="col-lg-12">
						   <!-- users tabe -->
                            <?php $this->load->view('admin/templates/users_table');?>
						   <!-- end users table  -->
						</div>						
					</div>
					<!-- /main charts -->


	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>pages/datatables_extension_buttons_html5.js"></script>