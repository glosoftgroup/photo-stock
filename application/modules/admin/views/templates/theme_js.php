<script type="text/javascript">
    <?php foreach ($this->user_model->list_columns('aauth_users') as $column) { ?>    	
   
    <?php $url = base_url('index.php/Users/updateUserDetails/'.$column->name); ?>
	 var <?='url'.$column->name;?> = "<?php echo $url; ?>";
	 

	$('#<?=$column->name;?>').focusout(function(){		
	    var <?=$column->name;?> = $('#<?=$column->name;?>').val();
	    var user_id = $('#user_id').val();
	    if (!<?=$column->name;?>) {
	            $('#alert').html('<?=$column->name;?> not set');
	            return false;
	        }
	   $.post(<?='url'.$column->name;?>,{user_id:user_id,<?=$column->name;?>:<?=$column->name;?>},function(result){              
                $( "#alert" ).html(result);
                //$("div.messages").load(location.href + " div.messages");              

            });
	});	
	<?php } ?>
</script>
<script type="text/javascript">
	$('#updatePassword').click(function(){		
		var currentPassword = $('#currentPassword').val();
		var newPassword = $('#newPassword').val();
		var repeatnewPassword = $('#repeatnewPassword').val();
		<?php if($user_id == get_sessionData('id')){ ?>
		if (!currentPassword) {
	            $('#updatePasswordMessage').html("<div><span class=' alert alert-danger'>Current password not set</span></div>");
	            return false;
	        }
	    <?php }?>
	    if (!newPassword) {
	            $('#updatePasswordMessage').html("<span class=' alert alert-danger'>New password not set</span>");
	            return false;
	        }
	    if (!repeatnewPassword) {
	            $('#updatePasswordMessage').html("<div><span class=' alert alert-danger'>Repeat new password not set</span></div>");
	            return false;
	        }
	     if(newPassword != repeatnewPassword ){
	     	$('#updatePasswordMessage').html("<div><span class=' alert alert-danger'>New password & Repeat password not matching</span></div>");
	            return false;
	     }
	     var urlresetpassword = "<?=base_url('users/updatePassword');?>";
	     var user_id = "<?=$user_id;?>";
	     $.post(urlresetpassword,{currentPassword:currentPassword,newPassword:newPassword,user_id,user_id},function(result){              
                $( "#updatePasswordMessage" ).html(result);
         }); 
	});
</script>
<script type="text/javascript">
    <?php  $url_ = base_url('index.php/Register/check_password');?>
    $('#repeatnewPassword').focusout(function(event) {        
         var url_    = "<?php echo $url_;?>";
         var pass1 = $('#newPassword').val();             
         var pass2 = $('#repeatnewPassword').val();             
         $.post(url_,{pass1:pass1,pass2:pass2},function(result){              
                $( "#updatePasswordMessage" ).html(result);
         });        
    }); 
//-->
</script>
<script type="text/javascript" src="<?=js_url();?>plugins/forms/styling/switch.min.js"></script>
<script>
$(function() {
    $(".switch").bootstrapSwitch();
  });
</script>

<script type="text/javascript" src="<?=js_url();?>/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="<?=js_url();?>/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="<?=js_url();?>/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="<?=js_url();?>/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="<?=js_url();?>/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="<?=js_url();?>/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="<?=js_url();?>/plugins/pickers/daterangepicker.js"></script>


<script type="text/javascript" src="<?=js_url();?>/core/app.js"></script>
<script type="text/javascript" src="<?=js_url();?>/pages/dashboard.js"></script>
