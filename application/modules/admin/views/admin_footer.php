<!-- Footer -->
					<div class="footer text-muted">
						&copy; <?php date('Y');?>. <a href="<?=base_url();?>"><?=siteinfo('name');?></a> 
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<!-- Theme JS files -->
	<?php if(isset($user_id)){ $data['user_id'] = $user_id;}else{ $data['user_id'] = 0;} ?>
	<?php $this->load->view('admin/templates/theme_js',$data);?>
	<!-- /theme JS files -->

</body>
</html>