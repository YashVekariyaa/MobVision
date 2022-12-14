<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <!--shipping area start-->
            <section class="shipping_area shipping_two">
                <div class=" row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="<?php echo base_url() ?>assets/img/about/shipping1.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>7-day Returns</h2>
                                <p>Return in 7-days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <i style="font-size: 40px;color: #0063d1" class="fa fa-money" ></i>
                                <!--<img src="assets/img/about/shipping2.png" alt="">-->
                            </div>
                            <div class="shipping_content">
                                <h2>Cash on Delivery</h2>
                                <p>Cash on Delivery Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <i style="font-size: 40px;color: #0063d1" class="fa fa-tag"></i>
                                <!--<img src="assets/img/about/shipping3.png" alt="">-->
                            </div>
                            <div class="shipping_content">
                                <h2>Best Price</h2>
                                <p>We Give Best Price</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="<?php echo base_url() ?>assets/img/about/shipping4.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Payment Secure</h2>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--shipping area end-->
            <div class="footer_top_inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="<?php echo base_url() ?>home"><img src="<?php echo base_url() ?>assets/img/logo2/finallogo.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>At Mob Vision you will find quality products from top brands 
                                    at consistency low prices. We are offering a wide range of smartphones.</p>
                                <p><span>Address: </span> Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325, Gujarat</p>
                                <p><span>Mobile: </span><a href="tel:9081133075">9081133075</a> – <a
                                        href="tel:7405742354">7405742354</a> </p>
                                <p><span>Email: </span><a href="mailto:mobvision752@gmail.com">mobvision752@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Our Pages</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                                    <li><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
                                    <li><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>return-policy">Return Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>terms-and-conditions">Terms & Conditions</a></li>
                                    <li><a href="<?php echo base_url(); ?>faqs">FAQ's</a></li>
                                    <li><a href="<?php echo base_url(); ?>feedback">Feedback</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>My Account</h3>
                            <div class="footer_menu">
                                <ul>
                                    <?php 
                                        if($this->session->userdata('member'))
                                        {
                                        ?>    
                                        
                                    
                                    <li><a href="<?php echo base_url('member-logout'); ?>">Logout</a></li>
                                    <li><a href="<?php echo base_url('member-profile'); ?>">My Profile</a></li>
                                    <li><a href="<?php echo base_url('member-home'); ?>">My Account</a></li>
                                    <li><a href="<?php echo base_url('member-wishlist'); ?>">My Wishlist</a></li>
                                    <li><a href="<?php echo base_url('member-orders'); ?>">My Order History</a></li>
                                    <li><a href="<?php echo base_url('member-address'); ?>">My Shipping Address</a></li>
                                    
                                    
                                    <?php 
                                        }
                                        else
                                        {   
                                    ?>
                                    <li><a href="<?php echo base_url('login-register'); ?>">Login</a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>">Register</a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>">My Account</a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>">My Wishlist</a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>">My Order History</a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>">My Shipping Address</a></li>
                                    
                                    <?php 
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Follow Us</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="https://www.facebook.com/Mob-Vision-103858612202831" target="_blank" title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="https://twitter.com/mob_vision" target="_blank" title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="https://www.instagram.com/mobvision__/" target="_blank" title="instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="https://www.linkedin.com/in/mob-vision-84483322b/" target="_blank" title="linkedin"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>
                                
                            </div>
                            
                            <div id="google_translate_element"></div>
                            <br>
                            <div class="subscribe_form">
                                <h3>Subscribe Now</h3>
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                           placeholder="Your email address..." />
                                    <button id="mc-submit" type="button" onclick="subscribe();">Subscribe</button>
                                </form>
                                <p style="color:blue;padding: 5px;" id="msg">
                                </p>

                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p class="copyright-text">Copyright &copy; Mob Vision <?php echo date('Y'); ?> Made By 
                            <a href="https://www.instagram.com/theyashvekariya_/"
                               target="_blank">Yash</a> And <a href="https://www.instagram.com/jayan_savaliya/" 
                               target="_blank">Jayen
                            </a> 
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->