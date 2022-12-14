<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Member - Mob Vision</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Header links-->
        <?php
//        require_once 'header_link.php';
        $this->load->view('header_link');
        ?>

    </head>

    <body>

        <!--Header Area-->
        <?php
//    require_once 'header.php';
        $this->load->view('header');
        ?>

        
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>home">home</a></li>
                                <li>My Account</li>
                                <li>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        
        <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        
                        <!-- Nav tabs -->
                        <?php 
                                require_once 'membermenu.php';
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        Dashboard
                        <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>My Address</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $address = count( $this->md->my_select('tbl_shipment','*',$whh) );
                                                    ?>
                                                    <?php 
                                                                if( $address >= 1)
                                                                {
                                                            ?>
                                                    <h3 class="mb-2 text-dark" id="address"></h3>
                                                    <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <h3 class="mb-2 text-dark">0</h3>
                                                            <?php 
                                                                }
                                                            ?>
                                                    <a href="<?php echo base_url('member-address'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>My Review</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $review = count( $this->md->my_select('tbl_review','*',$whh) );
                                                    ?>
                                                    <?php 
                                                                if( $review >= 1)
                                                                {
                                                            ?>
                                                    <h3 class="mb-2 text-dark" id="review" ></h3>
                                                    <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <h3 class="mb-2 text-dark">0</h3>
                                                            <?php 
                                                                }
                                                            ?>
                                                    <a href="<?php echo base_url('member-review'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>My Wishlist</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $wishlist = count( $this->md->my_select('tbl_wishlist','*',$whh) );
                                                    ?>
                                                        <?php 
                                                                if( $wishlist >= 1)
                                                                {
                                                            ?>
                                                            <h3 class="mb-2 text-dark" id="wishlist"></h3>
                                                            <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <h3 class="mb-2 text-dark">0</h3>
                                                            <?php 
                                                                }
                                                            ?>
                                                    <a href="<?php echo base_url('member-wishlist'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>My Orders</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $order = count( $this->md->my_select('tbl_bill','*',$whh) );
                                                    ?>
                                                    <?php 
                                                                if( $order >= 1)
                                                                {
                                                            ?>
                                                    <h3 class="mb-2 text-dark" id="order"></h3>
                                                    <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <h3 class="mb-2 text-dark">0</h3>
                                                            <?php 
                                                                }
                                                            ?>
                                                    <a href="<?php echo base_url('member-orders'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!--chose us area start-->
        <div class="choseus_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-rupee"></i><br>
                                <!--<img src="assets/img/about/About_icon1.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>Money Back Guarantee</h3>
                                <p>We Give You Money Back Guarantee on Defective and Wrong Products. </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-handshake-o" ></i><br>

                                <!--<img src="assets/img/about/About_icon2.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>Best Deal</h3>
                                <p>We Give Best Deal To Our Customer.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-star-o" ></i><br>

                                <!--<img src="assets/img/about/About_icon3.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>High Quality</h3>
                                <p>We Use High Materials On Our Products And We Give Our Customer High Quality Product. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--chose us area end-->


        <!--footer area-->
        <?php
//    require_once 'footer.php';
        $this->load->view('footer');
        ?>

        
        <!--Footer Script-->
        <?php
//    require_once 'footer_script.php';
        $this->load->view('footer_script');
        ?>

<script type="text/javascript">

set_counter( 'address' , <?php echo $address; ?> );
set_counter( 'review' , <?php echo $review; ?> );
set_counter( 'wishlist' , <?php echo $wishlist; ?> );
set_counter( 'order' , <?php echo $order; ?> );

</script>
    </body>


</html>