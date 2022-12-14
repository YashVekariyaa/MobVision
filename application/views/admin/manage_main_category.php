<!DOCTYPE html>
<html lang="en">

    <!--Head-->
    <?php
    $this->load->view('admin/head');
    ?>
    <div>
        <div>
            <style>

                .myform input:focus:valid
                {
                    border: 2px solid green;
                }

            </style>



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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Category</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Main Category</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($editcate)) {
                                ?>
                            <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Main Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" class="myform" novalidate="" method="post" action="" name="main">
                                            <div class="">
                                                <div class="form-group">
                                                    <label>Edit Main Category</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" name="main" required="" pattern="^[a-zA-Z ]+$" value="<?php
                                                    if (!isset($success) && set_value('main'))
                                                        echo set_value('main');
                                                    else 
                                                        echo $editcate[0]->name;
                                                    
                                                    ?>" <?php if (form_error('main')) echo "err-border"; ?>">
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('main');
                                                        ?>
                                                    </p>

                                                </div>
                                            </div>
                                            <button  name="edit" value="yes" class="btn btn-primary mt-1 mb-0">Edit</button>
                                            <a href="<?php echo base_url('manage-main-category'); ?>" value="clear" class="btn btn-default mt-1 mb-0">Go Back</a><br><br>
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
                                            if (isset($success)) {
                                                ?>

                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Yes! <?php echo $success; ?></strong>.
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
                            <?php
                            } else {
                                ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4> Add New Main Category</h4>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" class="myform" novalidate="" method="post" action="" name="main">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Add Main Category</label>
                                                <input type="text" id="exampleInputEmail1" placeholder="Category Name"  name="main" required="" pattern="^[a-zA-Z ]+$" value="<?php
                                                if (!isset($success) && set_value('main'))
                                                    echo set_value('main');
                                                ?>" class="form-control <?php if (form_error('main')) echo "err-border"; ?>" >
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('main');
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <button  name="add" value="yes" class="btn btn-primary mt-1 mb-0">Add</button>
                                        <button type="reset" value="reset" class="btn btn-danger mt-1 mb-0">Clear</button><br><br>
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
                                        if (isset($success)) {
                                            ?>

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Yes! <?php echo $success; ?></strong>.
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
                             <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Main Category   
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('main/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-20p">Main Category</th>
                                                    <th class="wd-20p">Change</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $i = 0;
                                                foreach($allcate as $main) {
                                                    $i++;
                                                    ?>

                                                    <tr>
                                                        <td align="center"><?php echo $i; ?></td>
                                                        <td align="center"><?php echo $main->name; ?></td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="<?php echo base_url(); ?>manage-main-category/<?php echo base64_encode(base64_encode($main->category_id)); ?>" ><i class="fa fa-pencil" style=";font-size:15px" data-toggle="tooltip" data-placement="bottom" title="Edit Data"></i></a></td>
                                                        <td align="center">
                                                            <a href="" onclick="delete_link('main/<?php echo base64_encode(base64_encode($main->category_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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