<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content area -->
<div class="content">





    <div class="row panel">
        <!-- CKEditor default -->
        <div class="panel1 panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Post List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <?php if (isset($list)) { ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Feature</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $html = '';
                        foreach ($list as $row) {
                            $html .='<tr>';
                            $html .='<td>' . $row['id'] . '</td>';
                            $html .='<td>' . $row['post_title'] . '</td>';
                            $html .='<td>' . $row['post_content'] . '</td>';
							$featureImg=$row['post_feature'];
							if($featureImg!='' || (!empty(trim($featureImg)))){
							$html .="<td>";
							$url=base_url()."/assets/upload/feature/$featureImg";
							$html .="<img src='".$url."' width='150px' />";
							$html .="</td>";
							} else {
							$html .='<td>No Feature Image</td>';
							}
                            
                            $html .='</tr>';
                        }
                        echo $html;
                        ?>

                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No record found';
                }
                ?>
            </div>

        </div>

    </div>
</div>



