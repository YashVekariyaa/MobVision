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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Country</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Country</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Add New Country</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Country">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-1 mb-0">Add</button>
                                        <button type="reset" class="btn btn-danger mt-1 mb-0">Clear</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Country   
                                    </h4>
                                    <button type="button" class="btn btn-danger mconbtn">Delete All Banners</button>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-20p">Country</th>
                                                    <th class="wd-20p">Change</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                for ($i = 1; $i <= 30; $i++):
                                                    ?>

                                                    <tr>
                                                        <td align="center"><?php echo $i; ?></td>
                                                        <td align="center">India</td>
                                                        <td style="vertical-align: middle; font-size:15px; cursor: pointer" align="center"   ><i class="fa fa-pencil"></i> </td>
                                                        <td align="center"><a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a></td>
                                                    </tr>
                                                    <?php
                                                endfor;
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