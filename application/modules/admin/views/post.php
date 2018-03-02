<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content area -->
<div class="content">





    <div class="row panel">
        <!-- CKEditor default -->
        <div class="panel1 panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">New Post</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <?php echo form_open_multipart('post/add'); ?>
            <div class="col-md-12">
                <div class="form-group">
                    <p><?php echo $error; ?></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">

                    <label for="title">Title:</label>
                    <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Enter title" value="<?php echo $this->input->post('post_title'); ?>">
                    <span class="help-block text-danger"><?php echo form_error('post_title') ?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control tinymce " name="post_content" id="post_content" placeholder="Enter description" ><?php echo $this->input->post('post_content'); ?></textarea>
                    <span class="help-block text-danger"><?php echo form_error('post_content') ?></span>
                </div>
            </div>
            <script>
//                CKEDITOR.replace('post_content', {
//                    extraPlugins: 'imageuploader'
//                });
//                
                CKEDITOR.replace('post_content' ,{
        filebrowserImageBrowseUrl : "<?= js_url(); ?>ckeditor/plugins/imageuploader/imgbrowser.php"
    });
            </script>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="post_feature">Set Feature Image:</label>
                    <input type="file" name="post_feature" id="post_feature" class="form-control" value="<?php echo $this->input->post('post_feature'); ?>"/>
                    <span class="help-block text-danger"><?php echo form_error('post_feature') ?></span>

                </div>
            </div>         
            <div id="elfinder"></div>

            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-default btn-success"/>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>

<!-- Element where elFinder will be created (REQUIRED) -->



