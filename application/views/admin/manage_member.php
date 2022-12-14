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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Pages</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Member</a></li>

                    </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Members    
                                    </h4>
                                    <!--<a class="btn btn-danger mconbtn" href="" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>-->
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Profile</th>
                                                    <th class="wd-15p">Name</th>
                                                    <th class="wd-20p">Email</th>
                                                    <th class="wd-15p">Mobile</th>                                                    
                                                    <th class="wd-25p">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $c=0;
                                                foreach($member as $data){
                                                 $c++;   
                                                 ?>
                                                    <tr align="center">
                                                        <td><?php echo $c; ?></td>
                                                        <td >
                                                            <?php 
                                                                if(strlen($data->profile_pic) > 0)
                                                                {
                                                                    ?>
                                                                
                                                                   <img src="<?php echo base_url().$data->profile_pic; ?>" width="100px" style="cursor:pointer" data-toggle="tooltip" data-placement="bottom" title="<?php echo $data->name; ?>">
                                                                   <?php
                                                                }
                                                                
                                                                else
                                                                {
                                                                ?>    
                                                                   <img src="<?php echo base_url(); ?>admin_assets/img/blank.jpg" width="100px" style="cursor:pointer" data-toggle="tooltip" data-placement="bottom" title="<?php echo $data->name; ?>">
                                                                   <?php
                                                                }
                                                            ?>
                                                           
                                                          
                                                        </td>

                                                        <td style="vertical-align:middle;" align="center"><?php echo $data->name; ?></td>
                                                        <td style="vertical-align:middle;" align="center" ><a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a></td>
                                                        <td style="vertical-align:middle;" align="center" ><?php echo $data->mobile; ?></td>
                                                        
                                                        <td style="vertical-align:middle;" align="center">
                                                            <?php
                                                            if ($data->status == 1) {
                                                            ?>
                                                                <i class="fa fa-toggle-on" onclick="change_status('register',<?php echo $data->register_id ?>)" id="status_<?php echo $data->register_id; ?>" style=" cursor:pointer;font-size:25px;color:#5458b3;" data-toggle="tooltip" data-placement="bottom" title="Active"></i>

                                                            <?php
                                                            } 
                                                            else {
                                                            ?>
                                                                <i class="fa fa-toggle-off" onclick="change_status('register',<?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>" style=" cursor:pointer;font-size:25px;color:#000; " data-toggle="tooltip" data-placement="bottom" title="Deactive"></i>

                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>


                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

            <!--Footer-->
            <?php
            $this->load->view('admin/footer');
            ?>

        </div>
    </div>

    <!--Footer script-->
    <?php
    $this->load->view('admin/footer_script');
    ?>


</html>