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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Product Reviews</a></li>

                    </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Product Review    
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('review/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">User</th>
                                                    <th class="wd-15p">Product</th>
                                                    <th class="wd-20p">Review</th>
                                                    <th class="wd-15p">Rate</th>
                                                    <th class="wd-25p">Status</th>
                                                    <th class="wd-10p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $c=0;
                                                foreach ($review as $data)
                                                {
                                                    
                                                $c++;
                                                $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                $imageinfo = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0];
                                                
                                                $userinfo = $this->md->my_select('tbl_register','*',array('register_id'=>$data->register_id))[0];

                                                
                                                $allpath = explode(",", $imageinfo->path);
                                                
                                                    ?>

                                                    <tr>
                                                        <td style="vertical-align: middle" align="center"><?php echo $c; ?></td>
                                                        <td style="vertical-align: middle;" >
                                                            <?php
                                                                if(strlen ($userinfo->profile_pic) > 0  )
                                                                {
                                                            ?>
                                                            <img src="<?php echo base_url().$userinfo->profile_pic; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $userinfo->name; ?>" alt="<?php echo $userinfo->name; ?>" class="rounded-circle w-50"  style="cursor: pointer;width: 100px;height: 100px;object-fit: contain;border-radius: 100%;display: block;margin: auto">
                                                            <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <img src="<?php echo base_url(); ?>admin_assets/img/blank.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $userinfo->name; ?>" alt="profile-user" class="rounded-circle w-50"  style="cursor: pointer;width: 200px;height: 100px;border-radius: 100%;display: block;margin: auto">
                                                            <?php 
                                                                }
                                                            ?>                                                                
                                                        </td>
                                                        <td align="center"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($productinfo->product_id)); ?>" target="_new"><img data-toggle="tooltip" data-placement="bottom" title="<?php echo $productinfo->name; ?>" src="<?php echo base_url().$allpath[0]; ?>" width="100px" height=""></a></td>
                                                        <td style="vertical-align: middle" align="center"><?php echo $data->msg; ?></td>
                                                        <td style="vertical-align: middle;font-size: 10px;color:goldenrod"><span data-toggle="tooltip" data-placement="bottom" title="5 Star">
                                                                <?php
                                                                    $rate = $data->rating;
                                                                    $blank = 5 - $rate;
                                                                    
//                                                                    fill star
                                                                    for($i=1;$i<=$rate;$i++)
                                                                    {
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php 
                                                                    }
                                                                    
//                                                                    blank star
                                                                    for($i=1;$i<=$blank;$i++)
                                                                    {
                                                                        
                                                                ?>
                                                                <i class="fa fa-star-o"></i>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td style="vertical-align: middle;" align="center"><?php
                                                            if ($data->status == 1) {
                                                            ?>
                                                                <i class="fa fa-toggle-on" onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>" style=" cursor:pointer;font-size:25px;color:#5458b3;" data-toggle="tooltip" data-placement="bottom" title="Active"></i>

                                                            <?php
                                                            } 
                                                            else {
                                                            ?>
                                                                <i class="fa fa-toggle-off" onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>" style=" cursor:pointer;font-size:25px;color:#000; " data-toggle="tooltip" data-placement="bottom" title="Deactive"></i>

                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="vertical-align: middle"align="center">
                                                            <a href="" data-toggle="modal" data-target="#exampleModal" onclick="delete_link('review/<?php echo base64_encode(base64_encode($data->review_id)); ?>')"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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