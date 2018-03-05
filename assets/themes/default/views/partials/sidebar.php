<!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-default">
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-responsive" alt=""></a>
                        <h6><?=user_details($_SESSION['id'],'username');?></h6>
                        <span class="text-size-small"><?=user_details($_SESSION['id'],'email');?></span>
                    </div>
                                                
                    <div class="sidebar-user-material-menu">
                        <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                    </div>
                </div>
                
                <div class="navigation-wrapper collapse" id="user-nav">
                    <ul class="navigation">
                        <li

                        ><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                       
                        <li>
                        <a href="<?=base_url('user/profile/').$_SESSION['id'];?>"><i class="icon-cog5"></i> <span>Account settings</span></a>
                        </li>
                        <li>
                        <a href="<?=base_url('login/logout');?>"><i class="icon-switch2"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="<?=base_url('admin');?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        <!-- users -->
                        <li
                        <?php echo preg_match('/^(users)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>
                        >
                            <a href="<?=base_url('users');?>"><i class="icon-users"></i>
                             <span>Users</span>
                            </a>
                            <ul>
                                <li
                                <?php echo preg_match('/^(users)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>
                                >
                                <a href="<?=base_url('users');?>"">List</a>
                                </li>
                                <li
                                <?php echo preg_match('/^(register)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>
                                >
                                <a href="<?=base_url('register');?>"">Add Users</a>
                                </li>
                            </ul>
                        </li> 
                        <!-- ./users -->
                        <li>
                            <a href="#"><i class="icon-droplet2"></i>
                             <span>Posts</span>
                            </a>
                            <ul>
                                <li <?php echo preg_match('/^(post)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>>
                                <a href="<?=base_url('post');?>">List</a>
                                </li>
                                <li <?php echo preg_match('/^(add)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>>
                                <a href="<?=base_url('post/add');?>">Add Post</a>
                                </li>
                            </ul>
                        </li>                      

                    </ul>
                </div>
            </div>
            <!-- /main navigation -->

        </div>
    </div>
    <!-- /main sidebar -->
