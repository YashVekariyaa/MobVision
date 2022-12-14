<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My Profile - Mob Vision</title>
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
                                <li>My Profile</li>
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
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="" method="post" novalidate="" class="myform" enctype="multipart/form-data">                                            
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-group <?php if (form_error('name')) echo "err-border"; ?>" required="" pattern="^[a-zA-Z ]+$" value="<?php
                                        if (!isset($success) && set_value('name')) {
                                            echo set_value('name');
                                        } else {
                                            echo $detail->name;
                                        }
                                        ?>">
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('name');
                                            ?>
                                        </p>
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-group <?php if (form_error('email')) echo "err-border"; ?>" required="" value="<?php
                                        if (!isset($success) && set_value('email')) {
                                            echo set_value('email');
                                        } else {
                                            echo $detail->email;
                                        }
                                        ?>">
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('email');
                                            ?>
                                        </p>
                                        <p class="err-msg">
                                            <?php
                                            if (isset($email_err)) {
                                                echo $email_err;
                                            }
                                            ?>
                                        </p>
                                        <label>Mobile No</label>
                                        <input type="text" name="mobile" class="form-group <?php if (form_error('mobile')) echo "err-border"; ?>" pattern="^[0-9]{10}$" required="" value="<?php
                                        if (!isset($success) && set_value('mobile')) {
                                            echo set_value('mobile');
                                        } else {
                                            echo $detail->mobile;
                                        }
                                        ?>">
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('mobile');
                                            ?>
                                        </p>
                                        <label>Gender</label>
                                        <div class="input-radio">
                                            <label><span class="custom-radio"><input type="radio" required="" value="male" name="gender" <?php
                                                    if (!isset($success) && set_radio('gender', 'male')) {
                                                        echo set_radio('gender', 'male');
                                                    } else {
                                                        if ($detail->gender == 'male') {
                                                            echo "checked";
                                                        }
                                                    }
                                                    ?> >Male</span></label>
                                            <label><span class="custom-radio"><input type="radio" required="" value="female" name="gender" <?php
                                                    if (!isset($success) && set_radio('gender', 'female')) {
                                                        echo set_radio('gender', 'female');
                                                    } else {
                                                        if ($detail->gender == 'female') {
                                                            echo "checked";
                                                        }
                                                    }
                                                    ?> >Female</span></label>
                                        </div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('gender');
                                            ?>
                                        </p>
                                        <br>
                                        <label>Date Of Birth</label>
                                        <input type="date" placeholder="MM/DD/YYYY" class="form-group <?php if (form_error('dob')) echo "err-border"; ?>" required="" name="dob" value="<?php
                                        if (!isset($success) && set_value('dob')) {
                                            echo set_value('dob');
                                        } else {
                                            echo $detail->birth_date;
                                        }
                                        ?>" >
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('dob');
                                            ?>
                                        </p>
                                        <p class="err-msg">
                                            <?php
                                            if (isset($dob_err)) {
                                                echo $dob_err;
                                            }
                                            ?>
                                        </p>

                                        <span class="example">
                                            (E.g.: 05/31/1970)
                                        </span>
                                        <br><br>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Choose Profile</label>
                                            <input class="form-control" type="file" name="photo" id="setPhoto">
                                        </div>
                                        <button type="submit" name="change" value="yes" class="btn btn-primary">Save Changes</button><br><br>
                                        <?php
                                        if (isset($error)) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops! <?php echo $error; ?></strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        if (isset($success)) {
                                            ?>

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Yes! <?php echo $success; ?></strong> 
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
            </div>
        </section>

        <!--chose us area start-->
        <div class="choseus_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;
                                   color: #0063d1" class="fa fa-rupee"></i><br>
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
                                <i style="font-size: 60px;
                                   color: #0063d1" class="fa fa-handshake-o" ></i><br>

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
                                <i style="font-size: 60px;
                                   color: #0063d1" class="fa fa-star-o" ></i><br>

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