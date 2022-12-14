<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout - Mob Vision</title>
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
                                <li><a href="<?php echo base_url(); ?>home">home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--Checkout area start-->
        <div class="Checkout_section mt-60">
        <div class="container">
            <form method="post" action="" name="checkout">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        
                            <h3>Billing Details</h3>
                            <div style="border: 1px solid #ddd; padding: 30px;">
                                <h5 style="margin-bottom: 20px;">Select Delivery Location</h5>
                            <div class="row" id="shipment_area" style="margin-left: 10px;">
                                <?php
                                $whh['register_id'] = $this->session->userdata('member');
                                $shipment = $this->md->my_select('tbl_shipment','*',$whh);
                                
                                                                
                                foreach ($shipment as $data)
                                {
                                    ?>
                            <div class="col-md-6">
                                <div style="margin:10px 0px;border: 1px solid #ddd;padding: 2px 10px;text-align: center;min-height: 200px">
                                    <h6 style="margin-top:30px;margin-bottom: 5px;text-transform: capitalize"><?php echo $data->name; ?></h6>
                                    <p style="text-transform: capitalize">(<?php echo $data->address_type; ?>)</p>
                                    <p style="color:#000;min-height: 50px"><?php echo $data->address; ?></p>
                                    <?php 
                                        if($this->session->userdata('shipment_id') == $data->shipment_id )
                                        {
                                    ?>
                                    <a class="btn-round button" style="margin-bottom: 20px;font-size: 14px;color:white;background: #000;">Deliver Hear</a>
                                    <?php 
                                        }
                                        else
                                        {
                                    ?>
                                    <a class="btn-round button" onclick="select_address(<?php echo $data->shipment_id; ?>);" style="margin-bottom: 20px;font-size: 14px;color:white">Click To Select</a>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                                <?php
                                }
                                ?>
                                <div class="col-md-6" >
                                <div style="margin:10px 0px;border: 1px solid #ddd;padding: 2px 10px;text-align: center">
                                    <h1 style="margin-top:30px;margin-bottom: 10px;"><i class="fa fa-plus"></i></h1>
                                    <p style="color:#000;"></p>
                                    <a style="margin-bottom: 20px;font-size: 14px;" href="<?php echo base_url(); ?>member-address" target="_new" >Add New Address</a>
                                </div>
                            </div>
                            </div><br>
                                <div>
                                    <div>
                                        <b>Select Payment Method</b>
                                    </div>
                                    <div class="panel-default">
                                    
                                    <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">
                                        <label><input name="paytype" value="cod" <?php 
                                            if($this->session->userdata('paytype') && $this->session->userdata('paytype') == 'cod')
                                            {
                                                echo "checked";
                                            }
                                        ?> type="radio" data-bs-target="createp_account">Cash On Delivery</label>
                                    </label> &nbsp;
                                    
                                    <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">
                                        <label><input name="paytype" value="online" <?php 
                                            if($this->session->userdata('paytype') && $this->session->userdata('paytype') == 'online')
                                            {
                                                echo "checked";
                                            }
                                        ?> type="radio" data-bs-target="createp_account">Online Payment</label>
                                    </label>
                                </div>
                                </div><br> 
                                <b>Promocode</b> (optional)
                                <div class="row">
                                    <div style="display:flex;">
                                        
                                <div class="col-md-4">
                                    <div>
                                        <div>
                                            <input type="text" id="code" placeholder="Enter Code Here">
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <br>
                                    <a class="button" onclick="apply_code();" style="color:#fff;" type="submit">Apply Promocode</a> 
                                    <p id="codemsg">
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <div class="row" style="margin-left: 75px;height: 200px;overflow-y: auto;overflow-x: hidden;">
                                            <?php 
                                                $ftotal = $this->session->userdata('bill_amount') + 100;
                                                
                                                $wh2['min_bill_price <='] = $ftotal;
                                                $wh2['status'] = 1;
                                                
                                                $promocode = $this->md->my_select('tbl_promocode','*',$wh2);
                                                
                                                foreach ($promocode as $data)
                                                {
                                            ?>
                                            <div class="col-md-8">
                                                <p >Rs. <?php echo $data->amount; ?> off on minimum purchase of Rs. <?php echo $data->min_bill_price; ?> bill amount.</p>
                                            </div>
                                            <div class="col-md-4">
                                                <span style="border: 1px solid blue;padding: 10px;border-radius: 3px;font-size: 12px;font-weight: bold;margin-top: 5px;"><?php echo $data->code; ?></span>
                                            </div>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                </div>
                                    <br>
                            
                                
                         </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-4" id="order_summary">
                        
                            <h3>Your order</h3>
                                            <?php 
                                            $wh['register_id'] = $this->session->userdata('member');
                                            $cartdata = $this->md->my_select('tbl_cart','*',$wh);
                                            
                                            if(count($cartdata) > 0 )
                                            {
                                            $c = 0;
                                            $gtotal = 0;
                                            $total = 0;
                                            foreach($cartdata as $single)
                                            {
                                                $c++;
                                                $total += $single->total_price;
                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$single->product_id))[0];
                                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$single->image_id))[0]; 
                                                $allpath = explode(",", $image->path);
                                                $gtotal = $gtotal + $single->total_price;
                                            
                                        ?>
                            
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="<?php echo base_url().$allpath[0]; ?>" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#"><?php echo $product->name; ?></a>
                                                    <p>Qty: <?php echo $single->qty; ?> <br>  <span>Rs. <?php echo $product->price; ?> </span>/-</p>
                                                </div>                                                
                                            </div>
                                            <?php 
                                                }
                                            }
                                            ?>

                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Total:</span>
                                                    <span class="price">Rs. <?php echo $total; ?>/-</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <?php 
                                                        $gtotal = $total + 100;
                                                    ?>
                                                    <span><b>+</b> Shipping Charge:</span>
                                                    <span class="price">Rs.100/-</span>
                                                </div>
                                                <?php 
                                                    if($this->session->userdata('promocode_id'))
                                                    {
                                                        $wh3['promocode_id'] = $this->session->userdata('promocode_id');
                                                        $code = $this->md->my_select('tbl_promocode','*',$wh3)[0];
                                                        
                                                        $gtotal = $gtotal - $code->amount;
                                                ?>
                                                <div class="cart_total mt-10">
                                                    <span><b>-</b> Promocode ( <?php echo $code->code; ?> ):</span>
                                                    <span class="price">Rs. <?php echo $code->amount; ?>/-</span>
                                                </div>

                                                <?php 
                                                    }
                                                ?>
                                            </div>
                            
                                           <div class="mini_cart_footer">
                                                
                                                <div class="cart_button">
                                                    
                                                    
                                                    <button href="" class="button" style="outline: none" name="pay" type="submit" value="yes">You Pay: <b>Rs.<?php echo $gtotal; ?> /-</b></button><br><br>
                                                    <?php 
                                                        if(isset($ship_err))
                                                        {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops! <?php echo $ship_err; ?></strong> 
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php 
                                                        }
                                                        if(isset($pay_err))
                                                        {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops! <?php echo $pay_err; ?> </strong> 
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>

                                            </div>

                                        
                            
                        
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
         <!--Checkout area end-->
        
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

        

        <!--Footer Script-->
        <?php
//    require_once 'footer_script.php';
        $this->load->view('footer_script');
        ?>



    </body>


</html>