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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Feedback</a></li>

                    </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Feedbacks    
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('feedback/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Name</th>
                                                    <th class="wd-10p">Message</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $c=0;
                                                foreach ($feedback as $data){
                                                    $c++;
                                                    ?>

                                                    <tr>
                                                        <td style="vertical-align: middle;" align="center" ><?php echo $c; ?></td>
                                                        <td style="vertical-align: middle;" align="center" ><?php echo $data->name; ?></td>
                                                        <td style="vertical-align: middle;" align="center" ><?php echo $data->message; ?></td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="" onclick="delete_link('feedback/<?php echo base64_encode(base64_encode($data->feedback_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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