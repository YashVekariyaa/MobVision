<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
                <?php
                        $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                        if (strlen($data->profile_pic) > 0) 
                            {   
                        ?>
                        <img src="<?php echo base_url().$data->profile_pic;?>" alt="profile-user" class="avatar-md rounded-circle" style="margin-top: -1px">
                        <?php
                            }
                            else
                            {
                            ?>
                        <img src="<?php echo base_url();?>admin_assets/img/blank.jpg" alt="profile-user" class="avatar-md rounded-circle" style="margin-top: -1px">
                        <?php 
                            }
                        ?>
<!--                        <div class="d-sm-none d-lg-inline-block text-center" style="margin-top: 7px">Admin Panel
                            <p style="font-size: 11px;"><?php echo date('d-m-Y h:i:s', strtotime($data->last_login)); ?></p>
                        </div>-->
                <!--<img alt="image" src="<?php echo base_url(); ?>admin_assets/img/avatar/avatar-1.jpg" class="avatar-md rounded-circle">-->
                <span class="ml-2 d-lg-block">
                    <span class="text-white app-sidebar__user-name mt-5">Admin Panel</span><br>
                    <span class="text-muted app-sidebar__user-name text-sm"><?php echo date('d-m-Y h:i:s', strtotime($data->last_login)); ?></span>
                </span>
            </a>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="<?php echo base_url(); ?>admin-home"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="widgets.php"><i class="side-menu__icon fa fa-file"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item"  href="<?php echo base_url(); ?>manage-contact-us"><span>Contact Us</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-feedback"><span>Feedback</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-email-subscriber"><span>Email Subscriber</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-banner"><span>Banner</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-member"><span>Member</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-about-us"><span>About Us</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-privacy-policy"><span>Privacy Policy</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-return-policy"><span>Return Policy</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-terms-condition"><span>Terms and Conditions</span></a></li>
                <li><a class="slide-item" href="<?php echo base_url(); ?>manage-faqs"><span>FAQ's</span></a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon  fa fa-map-marker"></i><span class="side-menu__label">Locations</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo base_url(); ?>manage-country" class="slide-item">Country</a></li>
                <li><a href="<?php echo base_url(); ?>manage-state" class="slide-item">State</a></li>
                <li><a href="<?php echo base_url(); ?>manage-city" class="slide-item">City</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-th-list"></i><span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo base_url(); ?>manage-main-category" class="slide-item">Main Category</a></li>
                <li><a href="<?php echo base_url(); ?>manage-sub-category" class="slide-item">Sub Category</a></li>
                <li><a href="<?php echo base_url(); ?>manage-peta-category" class="slide-item">Peta Category</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-archive"></i><span class="side-menu__label">Product</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo base_url(); ?>manage-add-new-product" class="slide-item">Add New Product</a></li>
                <li><a href="<?php echo base_url(); ?>manage-view-all-product" class="slide-item">View All Product</a></li>
                <li><a href="<?php echo base_url(); ?>manage-product-review" class="slide-item">Product Reviews</a></li>
                <li><a href="<?php echo base_url(); ?>manage-offers" class="slide-item">Product Offers</a></li>
                <li><a href="<?php echo base_url(); ?>manage-promocode" class="slide-item">Promo Code</a></li>
            </ul>
        </li>
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon  fa fa-shopping-bag"></i><span class="side-menu__label">Orders</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo base_url(); ?>manage-pending-orders" class="slide-item">Pending Orders</a></li>
                <li><a href="<?php echo base_url(); ?>manage-confirm-orders"" class="slide-item">Confirm Orders</a></li>
                <li><a href="<?php echo base_url(); ?>manage-cancel-orders"" class="slide-item">Cancel Orders</a></li>                
            </ul>
        </li>

        
        
        <li>
            <a class="side-menu__item" href="<?php echo base_url(); ?>admin-setting"><i class="side-menu__icon fa fa-cog"></i><span class="side-menu__label">Settings</span></a>
        </li> 
        
        <li>
            <a class="side-menu__item" href="<?php echo base_url('admin-logout'); ?>"><i class="side-menu__icon fa fa-sign-out"></i><span class="side-menu__label">Log Out</span></a>
        </li> 

        <!--
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-paw"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="icons-ion.html" class="slide-item"> Ion Icons</a></li>
                <li><a href="icons-fontawesome.html" class="slide-item"> Font Awesome</a></li>
                <li><a href="icons-feather.html" class="slide-item"> Feather Awesome</a></li>
                <li><a href="icons-materialdesign.html" class="slide-item"> Material Design</a></li>
                <li><a href="icons-themify.html" class="slide-item"> Themify</a></li>
                <li><a href="icons-simpleline.html" class="slide-item"> Simple line</a></li>
                <li><a href="icons-pe7.html" class="slide-item"> pe7</a></li>
                <li><a href="icons-flag.html" class="slide-item"> Flag Icons</a></li>
                <li><a href="icons-weather.html" class="slide-item"> Weather Icons</a></li>
                <li><a href="icons-typicons.html" class="slide-item"> Typicons</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-table"></i><span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="table.html" class="slide-item">Basic Tables</a></li>
                <li><a href="datatables.html" class="slide-item"> Data Tables</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Forms</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="formelements.html" class="slide-item"> Form Elements</a></li>
                <li><a href="formadvanced.html" class="slide-item"> Advanced Form</a></li>
                <li><a href="formeditor.html" class="slide-item"> Form Editor</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-bar-chart"></i><span class="side-menu__label">Charts</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="chartjs.html" class="slide-item">Chart Js</a></li>
                <li><a href="flotcharts.html" class="slide-item"> Flot Charts</a></li>
                <li><a href="barcharts.html" class="slide-item"> Bar Charts</a></li>
                <li><a href="echart.html" class="slide-item"> ECharts</a></li>
                <li><a href="chartist.html" class="slide-item"> Chartist</a></li>
                <li><a href="morris.html" class="slide-item"> Morris Charts</a></li>
                <li><a href="othercharts.html" class="slide-item"> Other Charts</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-map"></i><span class="side-menu__label">Maps</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="maps.html" class="slide-item"> Google Maps</a></li>
                <li><a href="vector-map.html" class="slide-item">Vector Maps</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-pie-chart"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="profile.html" class="slide-item"> Profile</a></li>
                <li><a href="pricing-tables.html" class="slide-item"> Pricing Tables</a></li>
                <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                <li><a href="shop.html" class="slide-item"> Shop</a></li>
                <li><a href="shop-cart.html" class="slide-item"> Shop Cart</a></li>
                <li><a href="terms.html" class="slide-item"> Terms and Conditions</a></li>
                <li><a href="register.html" class="slide-item"> Register</a></li>
                <li><a href="login.html" class="slide-item"> Login</a></li>
                <li><a href="forgot.html" class="slide-item"> Forgot Password</a></li>
                <li><a href="reset.html" class="slide-item"> Reset Password</a></li>
                <li><a href="under-construction.html" class="slide-item"> Under Construction</a></li>
                <li><a href="lockscreen.html" class="slide-item"> Lock Screen</a></li>
                <li><a href="404.html" class="slide-item"> 404</a></li>
                <li><a href="505.html" class="slide-item"> 505</a></li>
                <li><a href="emptypage.html" class="slide-item"> Empty  Page</a></li>
            </ul>
        </li>-->
    </ul>
</aside>