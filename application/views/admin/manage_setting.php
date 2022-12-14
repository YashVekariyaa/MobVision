<!DOCTYPE html>
<html lang="en">

    <!--Head-->
    <?php
    $this->load->view('admin/head');
    ?>
    <div>
        <div>
            <div id="spinner"></div>

            <!--Header-->
            <?php
            $this->load->view('admin/header');
            ?>

            <!--menu-->
            <?php
            $this->load->view('admin/menu');
            ?>

            <div class="app-content">
                <section class="section">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Settings</a></li>
                    </ol>
                </section>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Change Profile    
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <form action="" class="myform" method="post" enctype="multipart/form-data"><br>
                                        <div align="center" style="margin-top: -9px">
                                            <?php
                                            $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                                            if (strlen($data->profile_pic) > 0) {
                                                ?>
                                                <img src="<?php echo base_url() . $data->profile_pic; ?>" alt="profile-user" class="rounded-circle" alt="Profile" height="150px" id="preview">
                                                <?php
                                            } else {
                                                ?>

                                            <img src="<?php echo base_url(); ?>admin_assets/img/blank.jpg" class="rounded-circle" alt="Profile" height="150px" id="preview" /> <br/><br/>
                                            <?php 
                                            }
                                            ?>
                                        </div><br>
                                        <input accept="image/*" class="form-control" type="file" name="photo"  id="setPhoto"><br>
                                        
<!--                                        <div class="form-group files mb-lg-0">
                                            <input accept="image/*" type="file" name="photo" id="setPhoto" class="form-control2custom-file-input" multiple="" style="padding: 142px 0px 85px 35%">
                                        </div>-->
                                        <button type="submit" name="change_profile" value="yes" class="btn btn-primary mt-3 ml-2 mb-0 w-100">Change Profile</button><br><br>
                                        <?php
                                            if (isset($profile_error)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show ml-3" role="alert">
                                                    <strong>Oops! <?php echo $profile_error; ?></strong> 
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                            if (isset($profile_success)) {
                                                ?>

                                                <div class="alert alert-success alert-dismissible fade show ml-3" role="alert">
                                                    <strong>Yes! <?php echo $profile_success; ?></strong>.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                            ?>                                    
                                        <div style="margin-top: 10px">
                                            <img style="display: none" id="preview" class="img-thumbnail" width="100px">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Change Password   
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" name="change_ps" class="myform" novalidate="">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <div class="passwd" style="display:flex">
                                                <input class="form-control" id="passw1" name="ops" required="" type="password" value="<?php 
                                                    if( !isset($ps_success) && set_value('ops') )
                                                    {
                                                        echo set_value('ops');
                                                    }
                                                ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-eye-slash mt-2" id="iconw1"></i>
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <div class="passwd" style="display:flex">
                                                <input class="form-control <?php if(form_error('nps')){ echo "err-border"; } ?>" name="nps" required="" pattern="^[a-zA-Z0-9@ ]{8,16}$" id="passw2" type="password" value="<?php 
                                                    if( !isset($ps_success) && set_value('nps') )
                                                    {
                                                        echo set_value('nps');
                                                    }
                                                ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-eye-slash mt-2" id="iconw2"></i>
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="passwd" style="display:flex">
                                                <input class="form-control <?php if(form_error('cps')){ echo "err-border"; } ?>" name="cps" required="" pattern="^[a-zA-Z0-9@ ]{8,16}$" id="passw3" type="password">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-eye-slash mt-2" id="iconw3"></i>
                                                </div>                                             
                                            </div>
                                        </div>
                                        <button type="submit" name="change_ps" value="yes" class="btn btn-primary mt-2  w-100">Change Password</button><br><br>
                                        <?php
                                            if (isset($ps_error) || form_error('nps') || form_error('cps')) 
                                            {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                    <strong>Oops! <?php if(isset($ps_error)) { echo $ps_error; } ?></strong> 
                                                    <?php
                                                        echo form_error('nps');
                                                        echo form_error('cps');
                                                    ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                            if (isset($ps_success)) {
                                                ?>

                                                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                                    <strong>Yes! <?php echo $ps_success; ?></strong>.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
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
<!--                <div class="row">
                    <div class="col-6">
                        <form method="post" action="" class="myform" name="change" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Change Profile</h4> <br/>
                                    <div align="center" style="margin-top: -9px">
                                        <img src="<?php echo base_url(); ?>admin_assets/img/avatar/avatar-1.jpg" class="rounded-circle" alt="Profile" height="150px" id="blah"/> <br/><br/>
                                    </div>
                                    <input class="form-control" type="file" name="photo" id="imgInp, custom_input">
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary col-12 waves-effect waves-light">Change Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>-->



            

        </div>
            <!--Footer-->
            <?php
            $this->load->view('admin/footer');
            ?>
    </div>

    <!--Footer script-->
    <?php
    $this->load->view('admin/footer_script');
    ?>
    <script>       
    imgInp.onchange = evt => 
    {
        const [file] = imgInp.files
        if (file) 
        {
        blah.src = URL.createObjectURL(file)
        }
    }
    </script>
</html>