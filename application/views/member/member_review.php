<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My Review - Mob Vision</title>
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
                                <li>My Review</li>
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
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc wishlist">
                                        <div class="cart_page table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product_thumb">No</th>
                                                        <th class="product_name">Product</th>
                                                        <th class="product-price">Message</th>
                                                        <th class="product_quantity">Rating</th>
                                                        <th class="product_total">Status</th>
                                                        <th class="product_remove">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                            $j=0;
                                                            foreach ($review as $data){  
                                                            $j++;
                                                            
                                                             $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                $imageinfo = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0];
                                                
                                                $userinfo = $this->md->my_select('tbl_register','*',array('register_id'=>$data->register_id))[0];

                                                
                                                $allpath = explode(",", $imageinfo->path);
                                                

                                                    ?>

                                                    <tr>
                                                        <td class="product_quantity"><?php echo $j; ?></td>
                                                        <td class="product_thumb"><a href=""><img src="<?php echo base_url().$allpath[0]; ?>" alt=""></a></td>                                                        
                                                        <td class="product_name"><a href=""><?php echo $data->msg; ?></a></td> 
                                                          <td style="vertical-align: middle;font-size: 10px;color:goldenrod"><span data-toggle="tooltip" data-placement="bottom" title="5 Star">
                                                                <?php
                                                                    $rate = $data->rating;
                                                                    $blank = 5 - $rate;
                                                                    
//                                                                    fill star
                                                                    for($i=1;$i<=$rate;$i++)
                                                                    {
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php 
                                                                    }
                                                                    
//                                                                    blank star
                                                                    for($i=1;$i<=$blank;$i++)
                                                                    {
                                                                        
                                                                ?>
                                                                <i class="fa fa-star-o"></i>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </span>
                                                        </td>
                                                         <td class="product-price">
                                                            <?php 
                                                                if($data->status == 0)
                                                                {
                                                                    echo '<span class="btn btn-primary">deactive</span>';
                                                                }
                                                                elseif ($data->status == 1) 
                                                                {
                                                                    echo '<span class="btn btn-success">active</span>';
                                                                }
                                                                                                                      
                                                            ?>
                                                        </td>
                                                        <td class="product_remove">
                                                            <a onclick="delete_link('reviewm/<?php echo base64_encode(base64_encode($data->review_id)); ?>')"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="coursor:pointer;color:red">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
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

                        </form>




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

        
        
<!--Delete Data Modal Wishlist-->
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