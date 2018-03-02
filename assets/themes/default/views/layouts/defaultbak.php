<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
    <head>
       <meta charset="utf-8">
       <title><?php echo $template['title']; ?></title>
        <!-- Global stylesheets -->
       <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
       <?=theme_css("icons/icomoon/styles.css");?>
       <?=theme_css("bootstrap.css");?>
       <?=theme_css("core.css");?>
       <?=theme_css("components.css");?>
       <?=theme_css("extras/animate.min.css");?>
       <?=theme_css('urlive/bootstrap-linkpreview.css'); ?>
       <?=theme_css("colors.css");?>
       <?=theme_css('bubble/bubbly.css');?>
        <!-- /global stylesheets -->
       <?=theme_css('custom.css');?>
       

        <!-- Core JS files -->
       <?=theme_js("plugins/loaders/pace.min.js");?>
       <?=theme_js("core/libraries/jquery.min.js");?>
       <?=theme_js("core/libraries/bootstrap.min.js");?>
       <?=theme_js("plugins/loaders/blockui.min.js");?>

       <?=theme_js("plugins/ui/nicescroll.min.js");?>
       <?=theme_js("plugins/ui/drilldown.js");?>
        <!-- /core JS files -->

        <!-- Theme JS files -->
       <?=theme_js("plugins/buttons/hover_dropdown.min.js");?>
       <?=theme_js("plugins/ui/jquery-validation/jquery.validate.js");?>
       <?=theme_js("plugins/notifications/jgrowl.min.js");?>
       <?=theme_js("plugins/slimscroll/jquery.slimscroll.min.js");?>
       <?=theme_js("plugins/list/list.min.js");?>
       
       
       <?=theme_js("core/app.js");?>
       <?=theme_js("pages/layout_sidebar_sticky_custom.js");?>
        <!-- /theme JS files -->

        <!-- /core JS files -->

        <!-- Theme JS files -->
        <?=theme_js("plugins/forms/styling/uniform.min.js");?>

        <!-- customjs -->
        <?=theme_js('sms/sms.js');?>
        <script type="text/javascript">
          $(function(){

            $('.thread-list').slimScroll({
              height : '450px',
              alwaysVisible : true,
            });            

          });
      </script>
        <!-- ./customerjs -->
        <style type="text/css">
    .page-containerh {
  
  background: #8300FF;
  background: -moz-radial-gradient(center, ellipse cover, #8300FF 0%, #000 100%);
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #8300FF), color-stop(100%, #000));
  background: -webkit-radial-gradient(center, ellipse cover, #8300FF 0%, #000 100%);
  background: -o-radial-gradient(center, ellipse cover, #8300FF 0%, #000 100%);
  background: -ms-radial-gradient(center, ellipse cover, #8300FF 0%, #000 100%);
  background: radial-gradient(ellipse at center, #8300FF 0%, #000 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8300FF', endColorstr='#000', GradientType=1 ); }
</style>
  </head>
  <body class="navbar-top-md-md" > 
   <!-- Fixed navbars wrapper -->
   <div class="navbar-fixed-top">       
    <?php echo $template['partials']['top']; ?>
    <?php echo $template['partials']['navbar']; ?>  
   </div>
    <!-- echo $template['partials']['breadcrumb']; ?> -->
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <?php echo $template['partials']['sidebar']; ?>
            <?php echo $template['body']; ?>
        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->          
    <?php echo $template['partials']['footer']; ?>
  </body>
</html>
