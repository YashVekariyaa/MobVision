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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">FAQ's</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if(isset($editfaqs))
                                {
                                ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit FAQ's</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" name="faqs" method="post" class="myform" novalidate="">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input name="question" required="" type="text" class="form-control <?php
                                            if (form_error('question')) {
                                                echo "err-border";
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('question')) {
                                                       echo set_value('question');
                                                   }
                                                   else 
                                                    {
                                                        echo $editfaqs[0]->question;
                                                    }
                                                   ?>">
                                            <p class="err-msg">
                                                <?php
                                                echo form_error("question");
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input name="answer" required="" type="text" class="form-control <?php
                                            if (form_error('answer')) {
                                                echo "err-border";
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('answer')) {
                                                       echo set_value('answer');
                                                   }
                                                   else 
                                                    {
                                                        echo $editfaqs[0]->answer;
                                                    }
                                                   ?>">
                                            <p class="err-msg">
                                                <?php
                                                echo form_error("answer");
                                                ?>
                                            </p>
                                            <button type="submit" name="edit" value="yes" class="btn btn-primary mt-3 mb-0">Edit</button>
                                            <a href="<?php echo base_url('manage-faqs'); ?>" value="clear" class="btn btn-default mt-3 mb-0">Go Back</a><br><br>
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
                                    <h4>Write FAQ's</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" name="faqs" method="post" class="myform" novalidate="">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input name="question" required="" type="text" class="form-control <?php
                                            if (form_error('question')) {
                                                echo "err-border";
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('question')) {
                                                       echo set_value('question');
                                                   }
                                                   ?>">
                                            <p class="err-msg">
                                                <?php
                                                echo form_error("question");
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input name="answer" required="" type="text" class="form-control <?php
                                            if (form_error('answer')) {
                                                echo "err-border";
                                            }
                                            ?>" value="<?php
                                                   if (!isset($success) && set_value('answer')) {
                                                       echo set_value('answer');
                                                   }
                                                   ?>">
                                            <p class="err-msg">
                                                <?php
                                                echo form_error("answer");
                                                ?>
                                            </p>
                                            <button type="submit" name="add" value="yes" class="btn btn-primary mt-3 mb-0">Add</button>
                                            <button type="reset" class="btn btn-danger mt-3 mb-0">Clear</button><br><br>
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
                                    <h4>View All FAQ's  
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('faqs/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-10p">Quesion-Answer</th>
                                                    <th class="wd-25p">Change</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $c = 0;
                                                foreach ($faqs as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr>
                                                        <td style="vertical-align: middle;" align="center" ><?php echo $c; ?></td>
                                                        <td align="left"><b>Q.&nbsp;<?php echo $data->question; ?></b> <br/>A. <?php echo $data->answer; ?></td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="<?php echo base_url(); ?>manage-faqs/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>" ><i class="fa fa-pencil" style=";font-size:15px" data-toggle="tooltip" data-placement="bottom" title="Edit Data"></i></a>
                                                        </td>
                                                        <td style="vertical-align: middle;" align="center">
                                                            <a href="" onclick="delete_link('faqs/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a>
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