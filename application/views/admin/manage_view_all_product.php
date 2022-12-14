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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">View All Product</a></li>

                    </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Product    
                                    </h4>
                                    
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Product Image</th>
                                                    <th class="wd-15p">Product Name</th>
                                                    <th class="wd-15p">Price</th>
                                                    <th class="wd-15p">View Details</th>                                                    
                                                    <th class="wd-25p">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                            $c=0;
                                                            foreach ($products as $data){  
                                                            $c++;
                                                            
//                                                            image detail
                                                            $allpath = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->path;
                                                            $paths = explode("," ,$allpath);
                                                            $single = $paths[0];
                                                    ?>

                                                    <tr>
                                                        <td style="vertical-align: middle;"align="center"><?php echo $c; ?></td>
                                                        <td align="center"><a data-toggle="tooltip" data-placement="bottom" target="_new" title="<?php echo $data->name; ?>" href="<?php echo base_url().$single; ?>">
                                                                <img src="<?php echo base_url().$single; ?>" alt="<?php echo $data->name; ?>"  width="100px" height=""></a></td>
                                                        <td style="vertical-align: middle;"align="center"><?php echo $data->name; ?></td>
                                                        <td style="vertical-align: middle;"align="center"><?php echo $data->price; ?></td>
                                                        
                                                        <td style="vertical-align: middle;"align="center">
                                                            <?php 
                                                                if($data->status == 1)
                                                                {
                                                                
                                                             ?>
                                                            <a data-toggle="tooltip" target="_new" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" data-placement="bottom" title="Click For More Details" style="cursor: pointer">View Details</a>
                                                            <?php 
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Active TO View More Details" style="cursor: pointer">View Details</a>
                                                                <?php 
                                                            }
                                                            ?>
                                                        </td>                                                        
                                                        <td style="vertical-align: middle;" align="center"><?php
                                                            if ($data->status == 1) {
                                                            ?>
                                                                <i class="fa fa-toggle-on" onclick="change_status('product',<?php echo $data->product_id; ?>)" id="status_<?php echo $data->product_id; ?>" style=" cursor:pointer;font-size:25px;color:#5458b3;" data-toggle="tooltip" data-placement="bottom" title="Active"></i>

                                                            <?php
                                                            } 
                                                            else {
                                                            ?>
                                                                <i class="fa fa-toggle-off" onclick="change_status('product',<?php echo $data->product_id; ?>)" id="status_<?php echo $data->product_id; ?>" style=" cursor:pointer;font-size:25px;color:#000; " data-toggle="tooltip" data-placement="bottom" title="Deactive"></i>

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