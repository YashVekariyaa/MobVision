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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Locations</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">City</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-md-12 col-12 col-sm-12">
                            <?php
                                if (isset($editcity))
                                {
                                ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit City</h4>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" class="myform" novalidate="" method="post" action="" name="city">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Country</label>
                                                            <select class="form-control myform <?php
                                                            if(form_error('country')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" onchange="set_combo('state', this.value);" required="" name="country" >
                                                                <option value="">Select Country</option>
                                                                <?php
                                                                foreach ($country as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                    if (!isset($success) && set_select('country', $data->location_id)) {
                                                                        echo set_select('country', $data->location_id);
                                                                    }
                                                                    else
                                                                    {
                                                                            if( $data->location_id == $editstate[0]->parent_id )
                                                                         {
                                                                                echo "selected";
                                                                         }
                                                                     }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>  
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('country');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="edit" value="yes" class="btn btn-primary mt-1 mb-0">Edit</button>
                                                    <a href="<?php echo base_url('manage-city'); ?>" value="clear" class="btn btn-default mt-1 mb-0">Go Back</a><br><br>
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
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select State</label>
                                                            <select name="state" required="" id="state" class="form-control myform <?php
                                                            if (form_error('state')) {
                                                                echo "err-border";
                                                            }
                                                            ?>">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                if ($this->input->post('country')) {
                                                                    $wh['parent_id'] = $this->input->post('country');
                                                                    $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                    foreach ($records as $data) {
                                                                        ?>
                                                                        <option value="<?php echo $data->location_id; ?>"<?php
                                                                        if(!isset($success) && set_select('state', $data->location_id))
                                                                        {
                                                                            echo set_select('state', $data->location_id);
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                else
                                                                        {
                                                                            $wh['parent_id'] = $editstate[0]->parent_id;
                                                                            $records = $this->md->my_select('tbl_location','*',$wh);
                                                                            foreach ($records as $data)
                                                                        {
                                                                ?>
                                                                        <option value="<?php echo $data->location_id; ?>"<?php
                                                                        if(!isset($success) && set_select('state', $data->location_id))
                                                                        {
                                                                            echo set_select('state', $data->location_id);
                                                                        }
                                                                        else
                                                                        {
                                                                            if( $data->location_id == $editcity[0]->parent_id )
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('state');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card-body">                                                
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">City Name</label>
                                                            <input type="text" name="city" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php if (form_error('city')) {
                                                                    echo "err-border";
                                                                } ?>" id="exampleInputEmail1" placeholder="City Name" value="<?php
                                                            if (!isset($success) && set_value('city')) {
                                                                echo set_value('city');
                                                            }
                                                            else
                                                                    {
                                                                        echo $editcity[0]->name;
                                                                    }
                                                            ?>">
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('city');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>        
                                </div>
                            </div>
                            <?php
                                }
                                else
                                {
                                ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add New City</h4>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" class="myform" novalidate="" method="post" action="" name="city">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Country</label>
                                                            <select class="form-control myform <?php
                                                            if (form_error('country')) {
                                                                echo "err-border";
                                                            }
                                                            ?>" onchange="set_combo('state', this.value);" required="" name="country" >
                                                                <option value="">Select Country</option>
                                                                <?php
                                                                foreach ($country as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                    if (!isset($success) && set_select('country', $data->location_id)) {
                                                                        echo set_select('country', $data->location_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>  
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('country');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary mt-1 mb-0">Add</button>
                                                    <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button><br><br>
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
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select State</label>
                                                            <select name="state" required="" id="state" class="form-control myform <?php
                                                            if (form_error('state')) {
                                                                echo "err-border";
                                                            }
                                                            ?>">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                if ($this->input->post('country')) {
                                                                    $wh['parent_id'] = $this->input->post('country');
                                                                    $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                    foreach ($records as $data) {
                                                                        ?>
                                                                        <option value="<?php echo $data->location_id; ?>"<?php
                                                                        if(!isset($success) && set_select('state', $data->location_id))
                                                                        {
                                                                            echo set_select('state', $data->location_id);
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('state');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card-body">                                                
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">City Name</label>
                                                            <input type="text" name="city" required="" pattern="^[a-zA-Z ]+$" class="form-control <?php if (form_error('city')) {
                                                                    echo "err-border";
                                                                } ?>" id="exampleInputEmail1" placeholder="City Name" value="<?php
                                                            if (!isset($success) && set_value('city')) {
                                                                echo set_value('city');
                                                            }
                                                            ?>">
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('city');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>        
                                </div>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All City   
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('city/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-10p">Country</th>
                                                    <th class="wd-10p">State</th>
                                                    <th class="wd-10p">City</th>
                                                    <th class="wd-25p">Change</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                    $c=0;
                                                    foreach ($city as $data)
                                                    {
                                                        $c++;
                                                    ?>

                                                    <tr>
                                                        <td align="center"><?php echo $c; ?></td>
                                                        <td align="center" ><?php echo $data->country; ?></td>
                                                        <td align="center" ><?php echo $data->state; ?></td>
                                                        <td align="center" ><?php echo $data->name; ?></td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="<?php echo base_url(); ?>manage-city/<?php echo base64_encode(base64_encode($data->location_id)); ?>"><i class="fa fa-pencil" style=";font-size:15px" data-toggle="tooltip" data-placement="bottom" title="Edit Data"></i></a>
                                                        </td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="" onclick="delete_link('city/<?php echo base64_encode(base64_encode($data->location_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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