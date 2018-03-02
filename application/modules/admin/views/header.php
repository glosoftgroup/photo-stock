<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title; ?> | <?= siteinfo('name'); ?></title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?= css_url(); ?>/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?= css_url(); ?>/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= css_url(); ?>/core.css" rel="stylesheet" type="text/css">
        <link href="<?= css_url(); ?>/components.css" rel="stylesheet" type="text/css">
        <link href="<?= css_url(); ?>/colors.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?= js_url(); ?>/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?= js_url(); ?>/core/libraries/bootstrap.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?= js_url(); ?>/core/app.js"></script>
        <!-- /theme JS files -->
        <!-- TinyMce plugin -->
<!--        <script type="text/javascript" src="<?= js_url(); ?>/plugins/tinymce/tinymce.min.js"></script>-->
<!--        <script type="text/javascript" src="<?= js_url(); ?>/plugins/tinymce/tinymce.init.js"></script>-->
        <script type="text/javascript" src="<?= js_url(); ?>/ckeditor/ckeditor.js"></script>
        <script>
//        
//        tinymce.init({
//        selector: "textarea.tinymce",
//        plugins: "image,link,media,anchor,code",
//        file_browser_callback: elFinderBrowser,
//        relative_urls: false,
//        remove_script_host: false,
//        convert_urls: true,
//    });
//
//    function elFinderBrowser(field_name, url, type, win) {
//        tinymce.activeEditor.windowManager.open({
//            file: "<?= js_url(); ?>plugins/elFinder/elfinder.html", // use an absolute path!
//            title: 'elFinder 2.0',
//            width: 900,
//            height: 450,
//            resizable: 'yes'
//        }, {
//            setUrl: function (url) {
//                win.document.getElementById(field_name).value = url;
//            }
//        });
//        return false;
//    }




        </script>
        <!-- TinyMce plugin -->
    </head>

    <body class="navbar-top">

        <!-- Main navbar -->
        <?php $this->load->view('admin/templates/main_navbar'); ?>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <?php $this->load->view('admin/templates/main_sidebar'); ?>
                <!-- /main sidebar -->
                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content">