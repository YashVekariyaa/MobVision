<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Feedback - Mob Vision</title>
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
                                <li>feedback</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <section class="about_section mt-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <figure>
                            <figcaption class="about_content">
                                <h1>Feedback</h1>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>


        <!--contact area start-->
        <div class="contact_area">
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message form">
                            <!--<h3 style="margin-top: 15px">Feedback</h3>-->
                            <form method="post" action="" novalidate="" name="feedback" class="myform" required="" >
                                
                                    <label>Name</label>
                                    <input name="name" placeholder="Name" required="" class="myform <?php if(form_error('name')) echo "err-border"; ?>" type="text"><br><br>
                                    <p class="err-msg">
                                        <?php 
                                        {
                                        echo form_error('name');    
                                        }
                                        ?>
                                    </p>
                                <div class="contact_textarea">
                                    <label>Message</label>
                                    <textarea placeholder="Message" name="message"  required="" class="myform <?php if(form_error('message')) echo "err-border"; ?>"></textarea>
                                    <p class="err-msg">
                                        <?php 
                                        {
                                        echo form_error('message');
                                        }
                                        ?>
                                    </p>
                                    
                                </div>
                                    <button type="submit" name="add" value="yes"> Send</button><br><br>
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
                                    
                                    
                                <!--<p class="form-messege"></p>-->
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