<div id="app">
    <div class="main-wrapper" >
        <nav class="navbar navbar-expand-lg main-navbar">
            <a class="header-brand" href="<?php echo base_url();?>admin-home">
                <img src="<?php echo base_url();?>admin_assets/img/brand/finallogo.png" class="header-brand-img" alt="Kharna-Admin  logo">
            </a>
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="ion ion-search"></i></a></li>
                </ul>
<!--                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit"><i class="ion ion-search"></i></button>
                </div>-->
            </form>
            <ul class="navbar-nav navbar-right">
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Messages
                            <div class="float-right">
                                <a href="#">View All</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content">
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <img alt="image" src="<?php echo base_url();?>admin_assets/img/avatar/avatar-1.jpg" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Stewart Ball</b>
                                            <p>Your template awesome</p>
                                        </div>
                                        <div class="time">6 hours ago</div>
                                    </div>

                                </div>
                            </a>
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <img alt="image" src="<?php echo base_url();?>admin_assets/img/avatar/avatar-2.jpg" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Jonathan North</b>
                                            <p>Your Order Shipped.....</p>
                                        </div>
                                        <div class="time">45 mins ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img alt="image" src="<?php echo base_url();?>admin_assets/img/avatar/avatar-4.jpg" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Victor Taylor</b>
                                            <p>Hi!, I' am web developer</p>
                                        </div>
                                        <div class="time"> 8 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img alt="image" src="<?php echo base_url();?>admin_assets/img/avatar/avatar-3.jpg" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Ruth	Arnold</b>
                                            <p>Hi!, I' am web designer</p>
                                        </div>
                                        <div class="time"> 3 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img alt="image" src="<?php echo base_url();?>admin_assets/img/avatar/avatar-5.jpg" class="rounded-circle dropdown-item-img">
                                <div class="dropdown-item-desc">
                                    <div class="dropdownmsg d-flex">
                                        <div class="">
                                            <b>Sam	Lyman</b>
                                            <p>Hi!, I' am java developer</p>
                                        </div>
                                        <div class="time"> 15 mintues ago</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
<!--                <li class="dropdown dropdown-list-toggle" style="padding-top:12px"><a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg beep"><i class="ion-ios-bell-outline"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications
                            <div class="float-right">
                                <a href="#">View All</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content">
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-users text-primary"></i>
                                <div class="dropdown-item-desc">
                                    <b>So many Users Visit your template</b>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-exclamation-triangle text-danger"></i>
                                <div class="dropdown-item-desc">
                                    <b>Error message occurred....</b>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-users text-warning"></i>
                                <div class="dropdown-item-desc">
                                    <b> Adding new people</b>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-shopping-cart text-success"></i>
                                <div class="dropdown-item-desc">
                                    <b>Your items Arrived</b>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-comment text-primary"></i>
                                <div class="dropdown-item-desc">
                                    <b>New Message received</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">67</span></div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-users text-primary"></i>
                                <div class="dropdown-item-desc">
                                    <b>So many Users Visit your template</b>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>-->
                <li class="dropdown dropdown-list-toggle" style="padding-top:12px;">
                    <a href="#" class="nav-link nav-link-lg full-screen-link">
                        <i class="ion-arrow-expand"  id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                        <?php
                        $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                        if (strlen($data->profile_pic) > 0) 
                            {   
                        ?>
                        <img src="<?php echo base_url().$data->profile_pic;?>" alt="profile-user" class="rounded-circle border border-info w-32" style="margin-top: -13px">
                        <?php
                            }
                            else
                            {
                            ?>
                        <img src="<?php echo base_url();?>admin_assets/img/blank.jpg" alt="profile-user" class="rounded-circle border border-info w-32" style="margin-top: -13px">
                        <?php 
                            }
                        ?>
                        <div class="d-sm-none d-lg-inline-block text-center" style="margin-top: 7px">Admin Panel
                            <p style="font-size: 11px;"><?php echo date('d-m-Y h:i:s', strtotime($data->last_login)); ?></p>
                        </div></a>                       
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url(); ?>admin-setting" class="dropdown-item has-icon">
                            <i class="ion ion-gear-a"></i> Settings
                        </a>
                        <a href="<?php echo base_url('admin-logout'); ?>" class="dropdown-item has-icon">
                            <i class="ion-ios-redo"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>