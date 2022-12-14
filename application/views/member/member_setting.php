<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Setting - Mob Vision</title>
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
                                <li><a href="<?php base_url(); ?>home">home</a></li>
                                <li>My Account</li>
                                <li>Setting</li>
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
                        <div class="account_form">
                            <h2>Setting</h2>
                            <form method="post" action="" name="change_ps" class="myform" novalidate="" >
                                <label>Old Password</label>
                                <div class="passwd7" style="display:flex">
                                    <input  id="passw7" type="password" name="ops"  required="" value="<?php 
                                      if (!isset($ps_success) && set_value('ops')) {
                                       echo set_value('ops');
                                         }
                                        ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash mt-2" id="iconw7"></i>
                                    </div>                                             
                                </div><br>
                                
                                <label>New Password</label>
                                <div class="passwd8" style="display:flex">
                                    <input class="form-group <?php if(form_error('nps')){ echo "err-border"; } ?>" id="passw8" type="password" name="nps" required="" pattern="^[a-zA-Z0-9@ ]{8,16}$" value="<?php 
                                                    if( !isset($ps_success) && set_value('nps') )
                                                    {
                                                        echo set_value('nps');
                                                    }
                                                ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash mt-2" id="iconw8"></i>
                                    </div>                                             
                                </div><br>
                                
                                <label>Confirm Password</label>
                                <div class="passwd9" style="display:flex">
                                    <input class="form-control <?php if(form_error('cps')){ echo "err-border"; } ?>" id="passw9" type="password" name="cps" required="" pattern="^[a-zA-Z0-9@ ]{8,16}$" value="<?php 
                                                    if( !isset($ps_success) && set_value('cps') )
                                                    {
                                                        echo set_value('cps');
                                                    }
                                                ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash mt-2" id="iconw9"></i>
                                    </div>                                             
                                </div> 
                                <br>
                                <button type="submit" name="change_ps" value="yes">Save Changes</button><br><br>
                                <?php
                                 if (isset($ps_error) || form_error('nps') || form_error('cps')) 
                                  {
                                 ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Oops! <?php if(isset($ps_error)) { echo $ps_error; } ?></strong> 
                                    <?php
                                        echo form_error('nps');
                                        echo form_error('cps');
                                    ?>
                                    <button type="button" class="bt"  data-bs-dismiss="alert" aria-label="Close">X</button>
                                </div>
                                <?php
                                   }
                                if (isset($ps_success)) {
                                  ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Yes! <?php echo $ps_success; ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                  }
                                 ?>  

                                                                    
                            </form>
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



    </body>


</html>