<div class="alert alert-info fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Check your Email!</strong> Your new password has been sent to <?=$email;?>
</div>
<span id='reset_area'>
  <?php 
  if (isset($_SESSION['university'])) {
  	$url_ = base_url('xproject/search_items');
  } else {
  	$url_ = base_url();
  }
  
  ?>
  <li class="previous"><a href="<?=$url_;?>"><span aria-hidden="true">&larr;</span> Back to Unimarket</a></li>
</span> 