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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Banner</a></li>

                    </ol>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Banner    
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <form action="" method="post" novalidate="" class="myform" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" required="" class="form-control <?php if(form_error('title')){ echo "err-border"; } ?>" id="exampleInputEmail1" placeholder="Enter title" value="<?php 
                                               if( !isset($success) && set_value('title')) {
                                                   echo set_value('title');
                                               }
                                               ?>">
                                        <p class="err-msg">
                                            <?php 
                                                if(form_error('title'))
                                                {
                                                    echo form_error('title');
                                                }
                                            ?>
                                        </p>
               
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subtitle</label>
                                        <input type="text" name="subtitle" required="" class="form-control <?php if(form_error('subtitle')){ echo "err-border"; } ?>" id="exampleInputEmail1" placeholder="Enter subtitle" value="<?php 
                                                   if (!isset($success) && set_value('subtitle')) {
                                                   echo set_value('subtitle');
                                               }
                                               ?>">
                                        <p class="err-msg">
                                            <?php 
                                                if(form_error('subtitle'))
                                                {
                                                    echo form_error('subtitle');
                                                }
                                            ?>
                                        </p>
                                    </div>

                                    
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Banner</label>
                                       </div>
                                        <div class="form-group files mb-lg-0">
                                            <input accept="image/*" type="file" name="photo" id="setPhoto" class="form-control1custom-file-input" multiple="">
                                        </div>
                                        <br>
                                        <button type="submit" name="add" value="yes" class="btn btn-primary mt-1 mb-0">Add</button>
                                        <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button><br><br>
                                        <?php
                                            if (isset($error)) 
                                            {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                    <strong>Oops! <?php echo $error; ?></strong> 
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                            if (isset($success)) {
                                                ?>

                                                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                                    <strong>Yes! <?php echo $success; ?></strong>.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                            ?>   
                                    </form>
                                    <div style="margin-top: 10px">
                                        <img style="display: none" id="preview" class="img-thumbnail" width="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Banners   
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('banner/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Title</th>
                                                    <th class="wd-15p">Subtitle</th>
                                                    <th class="wd-20p">Banner</th>
                                                    <th class="wd-20p">Status</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                    $c = 0;
                                                    foreach($banner as $data)
                                                    {
                                                        $c++;
                                                    ?>

                                                    <tr align="center">
                                                        <td style="vertical-align:middle;" ><?php echo $c; ?></td>
                                                        <td style="vertical-align:middle;" ><?php echo $data->title; ?></td>
                                                        <td style="vertical-align:middle;" ><?php echo $data->subtitle; ?></td>
                                                        <td style="vertical-align:middle;" >
                                                            <a target="_new" href="<?php echo base_url().$data->path; ?>"><img src="<?php echo base_url().$data->path; ?>" width="50%"></a> 
                                                        </td>                                                  
                                                        <td><?php
                                                            if ($data->status == 1) {
                                                            ?>
                                                                <i class="fa fa-toggle-on" onclick="change_status('banner',<?php echo $data->banner_id ?>)" id="status_<?php echo $data->banner_id; ?>" style=" cursor:pointer;font-size:25px;color:#5458b3;" data-toggle="tooltip" data-placement="bottom" title="Active"></i>

                                                            <?php
                                                            } 
                                                            else {
                                                            ?>
                                                                <i class="fa fa-toggle-off" onclick="change_status('banner',<?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>" style=" cursor:pointer;font-size:25px;color:#000; " data-toggle="tooltip" data-placement="bottom" title="Deactive"></i>

                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="vertical-align:middle;" >
                                                            <a href="" onclick="delete_link('banner/<?php echo base64_encode(base64_encode($data->banner_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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
    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
</html>