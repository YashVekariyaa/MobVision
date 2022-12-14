<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact Us - Mob Vision</title>
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
                                <li>contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        
                                            
        <!--contact map start-->
        <div class="contact_map mt-60">
            <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.2686793104444!2d72.91775951451717!3d21.181483085915872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0452fffffffff%3A0xffed0ea399687a7a!2sAmbaba%20Commerce%20College!5e0!3m2!1sen!2sin!4v1644071520881!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!--contact map end-->

        <!--contact area start-->
        <div class="contact_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message content">
                            <h3>Get in touch</h3>
                            <p>Fill The following form and seatback relax 
                                we will contact with you within 24 hours via Email.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325, Gujarat</li>
                                <li><i class="fa fa-envelope-o"> </i> Email: <a
                                        href="mailto:mobvision752@gmail.com">mobvision752@gmail.com </a>
                                </li>
                                <li><i class="fa fa-phone"></i> Phone:<a href="tel: 9081133075"> 9081133075 </a> </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                        
                    
                    
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message">
                            <h3>Contact Us</h3>
                            <form method="post" action="" required="" name="contact"  class="myform" novalidate="" onsubmit=" return (grecaptcha.getResponse(widgetId1) == '')? false : true;">
                                    <label>Name</label>
                                    <input name="name" required="" pattern="[/^[a-zA-z ]+$/]" placeholder="Name" type="text" class=" myform <?php
                                               if (form_error('name')) {
                                               echo "err-border";
                                           }
                                           ?>">
                                    <p class="err-msg">
                                        <?php
                                         {
                                            echo form_error('name');
                                          }
                                        ?>
                                    </p>
                                
                                    <br>
                                    <label>Email</label>
                                    <input name="email" required="" placeholder="Email " type="email" class="myform <?php
                                               if (form_error('email')) {
                                               echo "err-border";
                                           }
                                           ?>">
                                    <p class="err-msg">
                                        <?php
                                         {
                                            echo form_error('email');
                                          }
                                        ?>
                                    </p>
                                    
                                    <br>
                                    <label>Mobile No</label>
                                    <input name="mobile" placeholder="Mobile No" required=""  pattern="[/^[0-9]{10}$/]" type="mobile" class=" myform <?php
                                               if (form_error('mobile')) {
                                               echo "err-border";
                                           }
                                           ?>">
                                    <p class="err-msg">
                                        <?php
                                         {
                                            echo form_error('mobile');
                                          }
                                        ?>
                                    </p>
                                    
                                    <br>
                                    <label>Subject</label>
                                    <input name="subject" placeholder="Subject" required="" type="text" class="myform <?php
                                               if (form_error('subject')) {
                                               echo "err-border";
                                           }
                                           ?>" >
                                    <p class="err-msg">
                                        <?php
                                         {
                                            echo form_error('subject');
                                          }
                                        ?>
                                    </p>
                                    
                                    
                                    <br>   
                                <div class="contact_textarea">
                                    <label>Message</label>
                                    <textarea placeholder="Message" name="message" required="" class=" myform <?php
                                               if (form_error('message')) {
                                               echo "err-border";
                                           }
                                           ?>"></textarea>
                                    <p class="err-msg">
                                        <?php
                                         {
                                            echo form_error('message');
                                          }
                                        ?>
                                    </p>
                                </div>
                                    
                                    <!--<div id="example1" ></div><br>-->
                                    
                                    <button type="submit" name="add" value="yes">Send</button><br><br>
                                    <?php
                                            if (isset($error)) 
                                            {
                                                ?>
                                    <span class="text-danger"><?php echo $error; ?></span>   
                                                <?php
                                            }
                                            if (isset($success)) {
                                                ?>

                                    <span class="text-success"><?php echo $success; ?></span>   
                                                
                                            <?php
                                            }
                                            ?>
                                    
                                   <input type="hidden" value="<?php echo "Address : Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325, Gujarat, \n  Phone : 9081133075, \n  Email : mobvision752@gmail.com"; ?>" name="qrvalue">
                                    <br>
                                    <div id="qrcode"></div>
                                    <a id="get_img" style="display: none" download="">Download</a>
                            </form>
                        </div>
                                    
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        





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

        

        <!--Footer Script-->
        <?php
        $this->load->view('footer_script');
        ?>

    </body>


</html>