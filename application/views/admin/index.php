<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mob Vision - Admin Panel</title>

        <!--Favicon -->
        <link rel="icon" href="<?php echo base_url(); ?>admin_assets/img/favicon.png" type="image/x-icon"/>


        <!--Bootstrap.min css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/css/bootstrap.min.css">

        <!--Icons css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/icons.css">

        <!--Style css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/style.css">

        <!--mCustomScrollbar css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

        <!--Sidemenu css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/toggle-menu/sidemenu.css">

    </head>

    <body class="bg-primary">
        <div id="app">
            <section class="section section-2">
                <div class="container">
                    <div class="row">
                        <div class="single-page single-pageimage construction-bg cover-image " data-image-src="<?php echo base_url(); ?>admin_assets/img/news/img14.jpg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="wrapper wrapper2">
                                        <form  class="card-body myform" tabindex="500" action="" method="post" name="login" novalidate="">
                                            <h3>Login</h3>
                                            <div class="mail">
                                                <label>Email</label>
                                                <input type="email" name="email" required="" value="<?php
                                            
                                                    if ($this->input->cookie('admin_email')) {
                                                    echo $this->input->cookie('admin_email');
                                                }
                                                ?>">
                                            </div>
                                            <div class="passwd" style="display:flex;margin-bottom: 0px">
                                                <label>Password</label>
                                                <input class="form-control" name="password" required="" id="pass" type="password" value="<?php
                                                
                                                       if ($this->input->cookie('admin_password')) {
                                                           echo $this->input->cookie('admin_password');
                                                       }
                                                       ?>" >
                                                
                                                <div class="input-group-addon" style="cursor: pointer">
                                                    <i class="fa fa-eye-slash mt-2" id="icon"></i>
                                                </div>                                             
                                            </div>

                                            <div style="display: flex;margin-bottom: 0px;margin-left: 0px;">
                                                 <input class="form-check" name="svp" value="yes" style="width: 15px" type="checkbox" <?php 
                                                    if($this->input->cookie('admin_email'))
                                                    {
                                                        echo 'checked';
                                                    }   
                                                 ?> >
                                                <div style="margin: 10px;cursor: pointer">
                                                    Remember me
                                                </div>
                                            </div>
                                            
                                            <div class="submit">
                                                <button class="btn btn-primary btn-block" name="login" value="yes" href="">Login</button><br>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops! <?php echo $error; ?></strong> 
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php
                                                }
                                                 
                                                if ($this->uri->segment(2) == 1) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Ok !</strong> Please Check Your Email. 
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <p class="mb-2"><a href="<?php echo base_url('admin-forget-password'); ?>" >Forgot Password ?</a></p>
                                           <!--<p class="text-dark mb-0">Don't have account?<a href="register.html" class="text-primary ml-1">Sign UP</a></p>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="log-wrapper text-center">
                                        <img src="<?php echo base_url(); ?>admin_assets/img/brand/whit.png" class="image mb-2 mt-4 mt-lg-0 " alt="logo">
                                        <p>Welcome back to Admin Panel.</p>

                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>
            </section>
        </div>

        <!--Jquery.min js-->
        <script src="<?php echo base_url(); ?>admin_assets/js/jquery.min.js"></script>

        <!--popper js-->
        <script src="<?php echo base_url(); ?>admin_assets/js/popper.js"></script>

        <!--Tooltip js-->
        <script src="<?php echo base_url(); ?>admin_assets/js/tooltip.js"></script>

        <!--Bootstrap.min js-->
        <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--Jquery.nicescroll.min js-->
        <script src="<?php echo base_url(); ?>admin_assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

        <!--Scroll-up-bar.min js-->
        <script src="<?php echo base_url(); ?>admin_assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

        <script src="<?php echo base_url(); ?>admin_assets/js/moment.min.js"></script>

        <!--mCustomScrollbar js-->
        <script src="<?php echo base_url(); ?>admin_assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url(); ?>admin_assets/plugins/toggle-menu/sidemenu.js"></script>

        <!--Scripts js-->
        <script src="<?php echo base_url(); ?>admin_assets/js/scripts.js"></script>

        <!--custom js-->
        <script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>




    </body>

</html>