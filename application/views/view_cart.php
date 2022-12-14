<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shopping Cart - Mob Vision</title>
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
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->
        <div id="cartdata">
        <?php
            $wh['register_id'] = $this->session->userdata('member');
            $cartdata = $this->md->my_select('tbl_cart','*',$wh);
            
            if(count($cartdata) > 0)
            {
                ?>
        <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">No</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Gross Price</th>
                                            <th class="product-price">Discount</th>
                                            <th class="product-price">Net Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $gtotal = 0;
                                            $c = 0;
                                            foreach($cartdata as $single)
                                            {
                                                $c++;
                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$single->product_id))[0];
                                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$single->image_id))[0]; 
                                                $allpath = explode(",", $image->path);
                                                
                                                $gtotal = $gtotal + $single->total_price;
                                            
                                        ?>
                                        <tr>
                                            <td class="product-price"><?php echo $c; ?></td>
                                            <td class="product_thumb" style="height: 100px;width: 100px"><a target="_new" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><img
                                                        src="<?php echo base_url().$allpath[0]; ?>" alt=""></a></td>
                                            <td class="product_name"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><?php echo substr( $product->name,0,50); ?>..</a></td>
                                            <td class="product_name">Rs.<?php echo number_format( $single->gross_price,2); ?>/-</td>
                                            <td class="product_name">Rs.<?php echo number_format( $single->discount,2); ?>/-</td>
                                            
                                            <td class="product-name">Rs.<?php echo number_format( $single->net_price,2); ?>/-</td>
                                            <td class="product_quantity"><label>Quantity</label> 
                                                <?php 
                                                    $qty = $image->qty;
                                                    
                                                    if($qty > 5)
                                                    {
                                                        $max = 5;
                                                    }
                                                    else
                                                    {
                                                        $max = $qty;
                                                    }
                                                ?>
                                                <input min="1"
                                                    max="<?php echo $max; ?>" value="<?php echo $single->qty; ?>" type="number" onchange="change_qty(<?php echo $single->cart_id ?>, this.value);">
                                            </td>
                                            <td class="product_total">Rs.<?php echo number_format( $single->total_price,2); ?>/-</td>
                                            <td class="product_remove">
                                                <a class="remove" style="color:red" title="remove" onclick="remove_cart(<?php echo $single->cart_id; ?>)"><i class="fa fa-trash-o"></i></a>
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
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Grand Total</p>
                                        <p class="cart_amount">Rs.<?php echo number_format($gtotal,2); ?>/-</p>
                                        <?php 
                                            $this->session->set_userdata('bill_amount',$gtotal);
                                        ?>
                                    </div>
                                    
                                    <div class="checkout_btn">
                                        <a target="_new" href="<?php echo base_url('collection'); ?>">Continue Shopping</a>
                                        <a target="_new" href="<?php echo base_url('checkout'); ?>">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!--shopping cart area end -->
                <?php
            }
            else
            {
                $name = $this->md->my_select('tbl_register','*',$wh)[0]->name;
                ?>
                <div class="shopping_cart_area mt-60">
        <div class="container" align="center">
            <div class="row">
                <div>
                    <i class="fa fa-shopping-bag" style="font-size: 150px;color:#ddd"></i>
                </div>
                <div style="color:#ddd"><br>
                    <h2><b>Hi <?php echo $name; ?>,<br>Your Shopping Cart is Empty.</b></h2>
                </div>
            </div><br><br>
            <div class="btn btn-primary" >
                <a style="color:#fff" href="<?php echo base_url(); ?>collection">Continue Shopping</a>
            </div>

        </div><br>
    </div>
                <?php
            }
        ?>
        </div>
        

       

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