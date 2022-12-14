<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My Address - Mob Vision</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Header links-->
        <?php
//        require_once 'header_link.php';
        $this->load->view('header_link');
        ?>

    </head>

    <body>

        <!--Header Area-->
        <?php
//    require_once 'header.php';
        $this->load->view('header');
        ?>

        
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="<?php base_url(); ?>home">home</a></li>
                                <li>My Account</li>
                                <li>My Address</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        
        <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        
                        <!-- Nav tabs -->
                        <?php 
                                require_once 'membermenu.php';
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">                         
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="" method="post" novalidate="" class="myform" enctype="multipart/form-data">                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div>
                                                 <label>Name</label>
                                                 <input type="text" name="name" placeholder="Name" class="form-control myform <?php 
                                                    if(form_error('name')){
                                                        echo "err-border";
                                                    }
                                                 ?>" required="" >
                                                    </div>
                                                    <p class="err-msg">
                                                         <?php
                                                           echo form_error('name');
                                                          ?>
                                                    </p>
                                                            <br>
                                                  <label>Country</label>
                                                  <select class="form-control form-select myform <?php
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
                                            </div><br>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="district">State</label>
                                                  <select name="state" required="" id="state"  class="form-control form-select myform <?php
                                                            if (form_error('state')) {
                                                                echo "err-border";
                                                            }
                                                            ?>"onchange="set_combo('city', this.value);" required="" name="state">
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
                                            </div><br>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="district">City</label>
                                                  <select name="city" required="" id="city" class="form-control form-select myform <?php
                                                            if (form_error('city')) {
                                                                echo "err-border";
                                                            }
                                                            ?>">
                                                                <option value="">Select City</option>
                                                                
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('city');
                                                                ?>
                                                            </p>
                                                </div>
                                            </div><br>
                                            <label>Address Type</label>
                                            <div class="input-radio">
                                                <label><span class="custom-radio"><input type="radio" required="" value="office" name="addresstype">Office</span></label>
                                                <label><span class="custom-radio"><input type="radio" required="" value="home" name="addresstype">Home</span></label>
                                            </div>
                                            <p class="err-msg">
                                                <?php
                                                  echo form_error('addresstype');
                                                ?>
                                            </p>
                                            <br>
                                            
                                            
                                            <label>Address</label>
                                            <textarea placeholder="Message" name="address" required="" class="form-control myform <?php 
                                                if(form_error('address')){
                                                    echo "err=border";
                                                }
                                            ?> "></textarea>
                                            <p class="err-msg">
                                                <?php
                                                   echo form_error('address');
                                                ?>
                                            </p>
                                            <br>
                                            <button type="submit" name="add" value="yes" class="btn btn-primary">Add</button>
                                            <button type="reset" value="yes" class="btn btn-danger">Clear</button><br><br>
                                           
                                            
                                            <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $c=0;
                                                $whh['register_id'] = $this->session->userdata('member');
                                                $address = $this->md->my_select('tbl_shipment','*',$whh);
                                                
                                                foreach($address as $data){
                                                 $c++;   
                                                 ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $data->name; ?></td>
                                                <td><?php echo $data->address; ?></td>
                                                <td>
                                                    <a onclick="delete_link('address/<?php echo base64_encode(base64_encode($data->shipment_id)); ?>')"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="coursor:pointer;color:red">
                                                        <i class="fa fa-trash-o" style="font-size: 20px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                                    
                                        </form>
                                    </div>
                                </div>
                        
                        
                                
                            
                    </div>

                    </div>
                </div>
            </div>
        
    </section>

        <!--chose us area start-->
        <div class="choseus_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-rupee"></i><br>
                                <!--<img src="assets/img/about/About_icon1.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>Money Back Guarantee</h3>
                                <p>We Give You Money Back Guarantee on Defective and Wrong Products. </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-handshake-o" ></i><br>

                                <!--<img src="assets/img/about/About_icon2.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>Best Deal</h3>
                                <p>We Give Best Deal To Our Customer.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <i style="font-size: 60px;color: #0063d1" class="fa fa-star-o" ></i><br>

                                <!--<img src="assets/img/about/About_icon3.png" alt="">-->
                            </div>
                            <div class="chose_content">
                                <h3>High Quality</h3>
                                <p>We Use High Materials On Our Products And We Give Our Customer High Quality Product. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--chose us area end-->


        <!--footer area-->
        <?php
//    require_once 'footer.php';
        $this->load->view('footer');
        ?>

        
<!--!--Delete Data Modal Address-->-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle" style="color:red"></i> Confirmation?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You sure want to Delete it?
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
        <a id="delete_link" type="button" class="btn btn-danger">Yes, Delete it</a>
      </div>
    </div>
  </div>
</div>

        
        <!--Footer Script-->
        <?php
//    require_once 'footer_script.php';
        $this->load->view('footer_script');
        ?>

 
    </body>


</html>