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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Promo Code</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-md-12 col-12 col-sm-12">
                            
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Promo Code</h4>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" class="myform" novalidate="" method="post" action="" name="promocode">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Code Name</label>
                                                            <input type="text" class="form-control myform <?php if (form_error('code')) {
                                                            echo "err-border";
                                                        } ?>"  placeholder="Enter code name" name="code">
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('code');
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
                                                            <label for="exampleInputEmail1">Amount</label>
                                                            <input type="text" pattern="^[0-9]+$" class="form-control myform <?php if (form_error('amount')) {
                                                            echo "err-border";
                                                        } ?>" name="amount" placeholder="Enter amount ">
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('amount');
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
                                                            <label for="exampleInputEmail1">Minimum Bill Price</label>
                                                            <input type="text" pattern="^[0-9]+$" class="form-control myform <?php if (form_error('min_bill_price')) {
                                                            echo "err-border";
                                                        } ?>" name="min_bill_price" placeholder="Enter Minimum Bill Price">
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('min_bill_price');
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
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Promo Code    
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Code</th>
                                                    <th class="wd-15p">Amount</th>
                                                    <th class="wd-20p">Min Bill Price</th>
                                                    <th class="wd-25p">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                    $c = 0;
                                                    foreach($promocode as $data)
                                                    {
                                                        $c++;
                                                    ?>


                                                    <tr align="center">
                                                        <td ><?php echo $c; ?></td>
                                                        <td style="vertical-align:middle;" ><?php echo $data->code; ?></td>
                                                        <td style="vertical-align:middle;" ><?php echo $data->amount; ?></td>
                                                        <td style="vertical-align:middle;" ><?php echo $data->min_bill_price; ?></td>
                                                        <td><?php
                                                            if ($data->status == 1) {
                                                            ?>
                                                                <i class="fa fa-toggle-on" onclick="change_status('promocode',<?php echo $data->promocode_id ?>)" id="status_<?php echo $data->promocode_id; ?>" style=" cursor:pointer;font-size:25px;color:#5458b3;" data-toggle="tooltip" data-placement="bottom" title="Active"></i>

                                                            <?php
                                                            } 
                                                            else {
                                                            ?>
                                                                <i class="fa fa-toggle-off" onclick="change_status('promocode',<?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>" style=" cursor:pointer;font-size:25px;color:#000; " data-toggle="tooltip" data-placement="bottom" title="Deactive"></i>

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