<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login-Register - Mob Vision</title>
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
                                <li>Login - Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!-- customer login start -->
        <div class="customer_login mt-60">
            <div class="container">
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form">
                            <h2>Login</h2>
                            <p>If you have an account with us please login and enjoy shopping.</p>
                            <form action="" name="login" method="post" class="myform" novalidate="" >
                                <div>
                                    <label>Email</label>
                                    <input type="text"  name="lemail" required="" value="<?php 
                                    if($this->input->cookie('member_email'))
                                    {
                                        echo $this->input->cookie('member_email');
                                    }
                                    ?>"  >
                                </div><br>

                                <label>Password</label>
                                <div class="passwd" style="display:flex">
                                    <input  id="passw4" type="password"  required="" name="lps" value="<?php 
                                    if($this->input->cookie('member_password'))
                                    {
                                        echo $this->input->cookie('member_password');
                                    }
                                    ?>"  >
                                    <div class="input-group-addon" >
                                        <i class="fa fa-eye-slash mt-2" id="iconw4" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Show"></i>
                                    </div>                                             
                                </div>   
                                <br>
                                <div class="login_submit">
                                    <label for="remember">
                                        <input id="remember" type="checkbox" name="svp" value="yes" <?php 
                                    if($this->input->cookie('member_password'))
                                    {
                                        echo "checked";
                                    }
                                    ?> >
                                        Remember me
                                    </label>
                                    <a href="<?php echo base_url(); ?>forget-password">Lost your password?</a>
                                    <button type="submit" name="login" value="yes">login</button><br><br>
                                    
                                        
                                        <?php
                                            if (isset($error)) {
                                                ?>
                                    <span class="text-danger"><?php echo $error; ?></span>
                                                <?php
                                            }
                                            if (isset($success)) {
                                                ?>

                                    <span class="text-danger"><?php echo $success; ?></span>

                                                <?php
                                            }
                                            ?>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--login area start-->

                    <!--register area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form register">
                            <h2>Register</h2>
                            <p>Fill the following form and become our member and purchase your favorite product.</p>
                            <form action="" method="post" name="register" class="myform" novalidate=""  >
                                <div>
                                    <label>Name <span></span></label>
                                    <input type="text"  name="name" value="<?php if(!isset($success) && set_value('name'))
                                    {
                                        echo set_value('name');
                                    }
                                    ?>" class="form-group <?php if(form_error('name')) echo "err-border"; ?>" required="" pattern="^[a-zA-Z ]+$" >
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('name');
                                        ?>
                                    </p>
                                </div><br>
                                
                                <div>
                                    <label>Email <span></span></label>
                                    <input type="email" name="email" value="<?php if(!isset($success) && set_value('email'))
                                    {
                                        echo set_value('email');
                                    }
                                    ?>" class="form-group <?php if(form_error('email')) echo "err-border"; ?>" required="" >
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('email');
                                        ?>
                                    </p>
                                </div><br>
                                
                                <div>
                                    <label>Mobile No<span></span></label>
                                    <input type="numeric" name="mobile" required="" pattern="^[0-9]{10}$" value="<?php if(!isset($success) && set_value('mobile'))
                                    {
                                        echo set_value('mobile');
                                    }
                                    ?>" class="form-group <?php if(form_error('mobile')) echo "err-border"; ?>">
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('mobile');
                                        ?>
                                    </p>
                                </div><br>


                                <label>Password <span></span></label>
                                <div class="passwd" style="display:flex">
                                    <input  id="passw5" type="password" name="ps" required="" pattern="^[A-Za-z 0-9@]{8,16}$" value="<?php if(!isset($success) && set_value('ps'))
                                    {
                                        echo set_value('ps');
                                    }
                                    ?>" class="form-group <?php if(form_error('ps')) echo "err-border"; ?>" >
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash mt-2" id="iconw5"></i>
                                    </div>
                                    
                                </div>
                                <p class="err-msg">
                                        <?php 
                                        echo form_error('ps');
                                        ?>
                                    </p>

                                <br>
                                <label>Confirm Password <span></span></label>
                                <div class="passwd" style="display:flex">
                                    <input  id="passw6" type="password" name="cps" required="" class="form-group <?php if(form_error('cps')) echo "err-border"; ?>">
                                    
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash mt-2" id="iconw6"></i>
                                    </div> 
                                 </div>
                                <p class="err-msg">
                                        <?php 
                                        echo form_error('cps');
                                        ?>
                                </p>

                                 
                                <br>
                                <div class="login_submit" >
                                    <div class="login_submit" style="display: flex;">
                                        <label style="padding-top: 11px;">
                                            <input checked="" type="checkbox" disabled="" >
                                        
                                        </label>
                                    I accept all <a style="display: contents;color:blue" href="<?php echo base_url('terms-and-conditions'); ?>" target="_new">terms and conditions</a> and 
                                    <a style="display: contents;color:blue" href="<?php echo base_url('privacy-policy'); ?>" target="_new">privacy policy.</a> 
                                 </div>
                                    <button type="submit" name="register" value="yes">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--register area end-->
                </div>
            </div>
        </div>
        <!-- customer login end -->






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
        $this->load->view('footer');
        ?>

        <!-- modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li>
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                                       aria-controls="tab1" aria-selected="false"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                                       aria-controls="tab2" aria-selected="false"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                                       role="tab" aria-controls="tab3" aria-selected="false"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
                                                       aria-controls="tab4" aria-selected="false"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>Handbag feugiat</h2>
                                        </div>
                                        <div class="modal_price mb-10">
                                            <span class="new_price">$64.99</span>
                                            <span class="old_price">$78.99</span>
                                        </div>
                                        <div class="modal_description mb-15">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                                laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                                in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                                recusandae </p>
                                        </div>
                                        <div class="variants_selects">
                                            <div class="variants_size">
                                                <h2>size</h2>
                                                <select class="select_option">
                                                    <option selected value="1">s</option>
                                                    <option value="1">m</option>
                                                    <option value="1">l</option>
                                                    <option value="1">xl</option>
                                                    <option value="1">xxl</option>
                                                </select>
                                            </div>
                                            <div class="variants_color">
                                                <h2>color</h2>
                                                <select class="select_option">
                                                    <option selected value="1">purple</option>
                                                    <option value="1">violet</option>
                                                    <option value="1">black</option>
                                                    <option value="1">pink</option>
                                                    <option value="1">orange</option>
                                                </select>
                                            </div>
                                            <div class="modal_add_to_cart">
                                                <form action="#">
                                                    <input min="0" max="100" step="2" value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal_social">
                                            <h2>Share this product</h2>
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal area end-->

        <!--Footer Script-->
        <?php
        $this->load->view('footer_script');
        ?>



    </body>


</html>