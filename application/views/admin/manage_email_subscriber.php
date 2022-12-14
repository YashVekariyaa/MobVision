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
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Email Subscriber</a></li>

                    </ol>
                    <form action="" method="post" name="subscribe" class="myform" novalidate="">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Subscriber    
                                    </h4>
                                    <a class="btn btn-danger mconbtn" href="" onclick="delete_link('email/<?php echo base64_encode(base64_encode(0)); ?>')" data-toggle="modal" data-target="#exampleModal">Delete All Records</a>
                                </div>
                                <div class="card-body ">
                                    <!--<form action="" method="post" name="email">-->
                                    <div class="table-responsive">
                                        <table id="example" class="table table table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr >
                                                    <th>
                                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless text-center ml-4">
                                                            <input class="custom-control-input" id="checkAll" type="checkbox"> <label class="custom-control-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th class="wd-20p">Email</th>
                                                    <th class="wd-25p">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                            $c=0;
                                                            foreach ($email AS $data){
                                                            $c++;    
                                                                 
                                                    ?>

                                                    <tr>
                                                        <td align="center">
                                                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                <input name="to[]" value="<?php echo $data->email ?>" class="custom-control-input" id="checkAll-<?php echo $c; ?>" type="checkbox"> <label class="custom-control-label" for="checkAll-<?php echo $c; ?>"></label>
                                                            </div>
                                                        </td>
                                                        <td align="center"><a href="mailto:Jayen@gmail.com"><?php echo $data->email; ?></a></td>
                                                        <td align="center"><a href="" onclick="delete_link('email/<?php echo base64_encode(base64_encode($data->subscriber_id)); ?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o" style="color:red;font-size:20px" data-toggle="tooltip" data-placement="bottom" title="Remove Data"></i></a></td>

                                                    </tr>
                                                    <?php
                                                            }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--</form>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Send Email    
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    
                                        <div class="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject</label>
                                                <input type="text" required="" name="subject" class="form-control myform <?php if(form_error('subject')) echo "err-border"; ?>" id="exampleInputEmail1" placeholder="Enter subject" value="<?php
                                                       if(!isset($success) && set_value('subject'))
                                                       {
                                                           echo set_value('subject');
                                                       }
                                                       ?>">
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('subject');
                                                    ?>
                                                    </p>
                                            </div>
                                            <label for="exampleInputEmail1">Write Email</label>
                                            <textarea id="editor1" name="message"><?php
                                                       if(!isset($success) && set_value('message'))
                                                       {
                                                           echo set_value('message');
                                                       }
                                                       ?></textarea>
                                            <p class="err-msg">
                                                    <?php
                                                    echo form_error('message');
                                                    ?>
                                                    </p>
                                        </div><br>
                                        <button type="submit" name="send" value="yes" class="btn btn-primary mt-1 mb-0">Send</button>
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
                        </div>
                        

                    </div>
                   </form>

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