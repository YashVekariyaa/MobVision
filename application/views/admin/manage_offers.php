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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Product Offers</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add New Offers</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" class="myform" novalidate="" action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Offer Name</label>
                                                        <input type="text" required="" name="name" class="form-control myform <?php
                                                        if (form_error('name')) {
                                                            echo "err-border";
                                                        }
                                                        ?>" id="exampleInputEmail1" placeholder="Offer Name" value="<?php
                                                               if (!isset($success) && set_value('name')) {
                                                                   echo set_value('name');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('name')) {
                                                                echo form_error('name');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Offer Rate</label>
                                                        <input type="text" required="" pattern="^[0-9]+$" name="rate" class="form-control myform <?php
                                                        if (form_error('rate')) {
                                                            echo "err-border";
                                                        }
                                                        ?>" id="exampleInputEmail1" placeholder="Offer Rate" value="<?php
                                                               if (!isset($success) && set_value('rate')) {
                                                                   echo set_value('rate');
                                                               }
                                                               ?>">
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('rate')) {
                                                                echo form_error('rate');
                                                            }
                                                            ?>
                                                        </p>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Min Price</label>
                                                                <input type="text" required="" pattern="^[0-9]+$" name="min_price" class="form-control myform <?php
                                                                if (form_error('min_price')) {
                                                                    echo "err-border";
                                                                }
                                                                ?>"  placeholder="Min Price" value="<?php
                                                                       if (!isset($success) && set_value('min_price')) {
                                                                           echo set_value('min_price');
                                                                       }
                                                                       ?>" >
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('min_price')) {
                                                                        echo form_error('min_price');
                                                                    }
                                                                    ?>
                                                                </p>

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Max Price</label>
                                                                <input type="text" required="" pattern="^[0-9]+$" name="max_price" class="form-control myform <?php
                                                                if (form_error('max_price')) {
                                                                    echo "err-border";
                                                                }
                                                                ?>" id="exampleInputEmail1" placeholder="Max Price" value="<?php
                                                                       if (!isset($success) && set_value('max_price')) {
                                                                           echo set_value('max_price');
                                                                       }
                                                                       ?>"> 
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('max_price')) {
                                                                        echo form_error('max_price');
                                                                    }
                                                                    ?>
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Start Date</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" required="" name="start_date" class="form-control pull-right myform <?php
                                                                    if (form_error('start_date')) {
                                                                        echo "err-border";
                                                                    }
                                                                    ?>" id="datepicker1" value="<?php
                                                                           if (!isset($success) && set_value('start_date')) {
                                                                               echo set_value('start_date');
                                                                           }
                                                                           ?>" >

                                                                </div>
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('start_date')) {
                                                                        echo form_error('start_date');
                                                                    }
                                                                    ?>
                                                                </p><!-- comment -->
                                                                <p class="err-msg" style="color:red">
                                                                    <?php
                                                                    if (isset($start_date_err)) {
                                                                        echo $start_date_err;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">End Date</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" required="" name="end_date" class="form-control pull-right myform <?php
                                                                    if (form_error('end_date') || isset($end_date_err)) {
                                                                        echo "err-border";
                                                                    }
                                                                    ?>" id="datepicker2" value="<?php
                                                                           if (!isset($success) && set_value('end_date')) {
                                                                               echo set_value('end_date');
                                                                           }
                                                                           ?>" >

                                                                </div>
                                                                <p class="err-msg" style="color:red">
                                                                    <?php 
                                                                        if(form_error('end_date'))
                                                                        {
                                                                        echo form_error('end_date');
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p class="err-msg" style="color:red">
                                                                    <?php
                                                                    if (isset($end_date_err)) {
                                                                        echo $end_date_err;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary mt-1 mb-0">Add</button>
                                                    <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Main Category</label>
                                                        <select class="form-control myform <?php
                                                        if (form_error('main')) {
                                                            echo "err-border";
                                                        }
                                                        ?>" onchange="set_combo('sub', this.value);" required="" name="main" >
                                                            <option value="">Select Main Category</option> 
                                                            <?php
                                                            foreach ($main as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('main', $data->category_id)) {
                                                                    echo set_select('main', $data->category_id);
                                                                }
                                                                ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?> 
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('main');
                                                            ?>
                                                        </p>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub Category</label>
                                                        <select class="form-control myform <?php
                                                        if (form_error('sub')) {
                                                            echo "err-border";
                                                        }
                                                        ?>" name="sub" required="" id="sub" onchange="set_combo('peta', this.value);" >
                                                            <option value="">Select Sub Category</option>
                                                            <?php
                                                            if ($this->input->post('main')) {
                                                                $wh['parent_id'] = $this->input->post('main');
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>"<?php
                                                                    if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                        echo set_select('sub', $data->category_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>    

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Peta Category</label>
                                                        <select class="form-control myform <?php
                                                        if (form_error('peta')) {
                                                            echo "err-border";
                                                        }
                                                        ?>" id="peta" name="peta" required="" >
                                                            <option value="">Select Peta Category</option>

                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Offers  
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-10p">Name</th>
                                                    <th class="wd-10p">Rate</th>
                                                    <th class="wd-25p">Start Date</th>
                                                    <th class="wd-25p">End Date</th>
                                                    <th class="wd-25p">Min Price</th>
                                                    <th class="wd-25p">Max Price</th>
                                                    <th class="wd-25p">Main Category</th>
                                                    <th class="wd-25p">Sub Category</th>
                                                    <th class="wd-25p">Peta Category</th>
                                                    <th class="wd-25p">Status</th>
                                                    <th class="wd-25p">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                    $c=0;
                                                  foreach($offer as $data){
                                                      $c++;
                                                      ?>
                                                    <tr>
                                                        <td align="center"><?php echo $c; ?></td>
                                                        <td align="center" ><?php echo $data->name; ?></td>
                                                        <td align="center" ><?php echo $data->rate; ?></td>
                                                        <td align="center" ><?php echo date('d-m-Y', strtotime($data->start_date)); ?></td>
                                                        <td align="center" ><?php echo date('d-m-Y', strtotime($data->end_date)); ?></td>
                                                        <td align="center" ><?php echo $data->min_price; ?></td>
                                                        <td align="center" ><?php echo $data->max_price; ?></td>
                                                        <?php 
                                                            if($data->label == 'all')
                                                            {
                                                        ?>
                                                        <td align="center" >All</td>
                                                        <td align="center" >All</td>
                                                        <td align="center" >All</td>
                                                        <?php 
                                                            }
                                                            else if($data->label == 'main')
                                                            {
                                                                $main = $this->md->my_select('tbl_category','*',array('category_id'=>$data->category_id))[0]->name;
                                                        ?>
                                                        <td align="center" ><?php echo $main;  ?></td>
                                                        <td align="center" >-</td>
                                                        <td align="center" >-</td>
                                                        <?php 
                                                            }
                                                            else if($data->label == 'sub')
                                                            {     
                                                                $record = $this->md->my_query("SELECT m.name AS main, s.name AS sub FROM `tbl_category` AS s, `tbl_category` AS m WHERE m. `category_id` =s.`parent_id` AND s.`category_id`=".$data->category_id."")[0];
                                                                
                                                        ?>
                                                        <td align="center" ><?php echo $record->main; ?></td>
                                                        <td align="center" ><?php echo $record->sub; ?></td>
                                                        <td align="center" >-</td>
                                                        <?php 
                                                            }
                                                            else if($data->label == 'peta')
                                                            {     
                                                                $record = $this->md->my_query("SELECT m.name AS main , s.name AS sub , p.name AS peta FROM `tbl_category` AS m , `tbl_category` AS s , `tbl_category` AS p WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id` = ".$data->category_id.";")[0];
                                                        ?>
                                                        <td align="center" ><?php echo $record->main; ?></td>
                                                        <td align="center" ><?php echo $record->sub; ?></td>
                                                        <td align="center" ><?php echo $record->peta; ?></td>
                                                        <?php 
                                                            }
                                                        ?>
                                                        <td>
                                                            <?php 
                                                                if($data->end_date < date('Y-m-d'))
                                                                {
                                                                ?>
                                                                <span class="alert alert-danger">Expire</span>
                                                                <?php
                                                                    }
                                                                    else if($data->status == 1)
                                                                    {
                                                                    ?>
                                                                <span class="alert alert-success">Running</span>
                                                                <?php
                                                                    }
                                                                     else if ($data->start_date > date('Y-m-d'))
                                                                    {
                                                                    ?>
                                                                 <span class="alert alert-primary">Upcoming</span>
                                                                 <?php 
                                                                    }
                                                                 ?>
  
                                                                
                                                            
<!--                                                            <span class="alert alert-primary alert-outline">Upcoming</span>
                                                            <span class="alert alert-success alert-outline">Running</span>
                                                            <span class="alert alert-danger alert-outline">Expire</span>-->

                                                        </td>   
                                                        <td align="center"><a href="" onclick="delete_link('offer/<?php echo base64_encode(base64_encode($data->offer_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a></td>
                                                        <!--<td align="center"><a href=""><i class="fa fa-toggle-on" style="font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a></td>-->
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

    <script>
        $(function () {
            $("#datepicker1").datepicker();
        });
        $(function () {
            $("#datepicker2").datepicker();
        });
    </script>
</html>