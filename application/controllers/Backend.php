<?php

class Backend extends CI_Controller
{
    public function state()
    {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);
        
        echo '<option value="">Select State</option>';
        foreach( $record as $data )
        {
?>
<option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
<?php
        }
    }
     public function city()
    {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);
        
        echo '<option value="">Select city</option>';
        foreach( $record as $data )
        {
?>
<option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
<?php
        }
    }
  
    
    public function sub()
    {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);
        
        echo '<option value="">Select Sub Category</option>';
        foreach( $record as $data )
        {
?>
<option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
<?php
        }
    }
    
     public function peta()
    {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);
        
        echo '<option value="">Select peta Category</option>';
        foreach( $record as $data )
        {
?>
<option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
<?php
        }
    }
    
    public function change_status() 
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if($action == "banner")
        {
            $wh['banner_id'] = $id;
            $status = $this->md->my_select('tbl_banner','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_banner',$ins,$wh);
        }
        else if
        ($action == "member")
        {
            $wh['member_id'] = $id;
            $status = $this->md->my_select('tbl_member','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_member',$ins,$wh);
        }   
        else if
        ($action == "product")
        {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_product',$ins,$wh);
        }
        else if($action == "promocode")
        {
            $wh['promocode_id'] = $id;
            $status = $this->md->my_select('tbl_promocode','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_promocode',$ins,$wh);
        }
        else if($action == "register")
        {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_register',$ins,$wh);
        }
        else if($action == "product")
        {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_product',$ins,$wh);
        }else if($action == "review")
        {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review','status',$wh)[0]->status;
            if($status == 1)
            {
                $ins['status'] = 0;
            }
            else
            {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_review',$ins,$wh);
        }

          
    }
    
    public function subscribe()
    {
        $wh['email'] = $this->input->post('email');
        
        $count = count($this->md->my_select('tbl_email_subscriber','*',$wh));
        
        if($count == 1)
        {
            echo 2;
        }
        else
        {
            echo $this->md->my_insert('tbl_email_subscriber',$wh);
        }
    }
    
//    user change color images of product
    public function change_images()
    {
        $this->session->set_userdata('image_id',$this->input->post('id')); 
        $wh['image_id'] = $this->input->post('id');
        
?>
                  <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom text-center">
                                <?php
                                $paths = $this->md->my_select('tbl_product_image', '*', $wh)[0]->path;
                                $allpath = explode(",", $paths);
                                ?>
                                <a href="#">
                                    <img id="zoom1" src="<?php echo base_url() . $allpath[0]; ?>"
                                         data-zoom-image="<?php echo base_url() . $allpath[0]; ?>" alt="big-1" style="height: 400px;padding: 20px;object-fit: contain">
                                </a>
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    <?php
                                    foreach ($allpath as $single) {
                                        ?>
                                        <li style="height: 130px;">
                                            <a href="#" class="elevatezoom-gallery active" data-update=""
                                               data-image="<?php echo base_url() . $single; ?>"
                                               data-zoom-image="<?php echo base_url() . $single; ?>">
                                                <img src="<?php echo base_url() . $single; ?>" alt="zo-th-1" style="object-fit: contain;height: 130px;padding: 20px;" />
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>



    


<?php
 $this->load->view('footer_script');
                                    
    }
    
    public function wishlist() 
    {
        $wh['product_id'] = $this->input->post('pid');
        $wh['register_id'] = $this->session->userdata('member');
        
        $wish = count($this->md->my_select('tbl_wishlist','*',$wh));
        
        if($wish == 0)
        {
            $this->md->my_insert('tbl_wishlist',$wh);
        }
        else
        {
            $this->md->my_delete('tbl_wishlist',$wh);
        }
        
    }
    
    public function add_cart()
    {
        $pid = $this->input->post('pid');
        
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $pid;
        
        $product_data = $this->md->my_select('tbl_product','*',array('product_id'=>$pid))[0];
        
        if($this->session->userdata('image_id'))
        {
            $ins['image_id'] = $this->session->userdata('image_id');
        }
        else
        {            
            $image_data = $this->md->my_select('tbl_product_image','*',array('product_id'=>$pid))[0];
            $ins['image_id'] = $image_data->image_id;
        }
        
        $ins['gross_price'] = $product_data->price;
        
        if($product_data->offer_id > 0)
        {
            $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$product_data->offer_id))[0]->rate;
                    
            $discount = round(($product_data->price * $rate)/100);
            $net_price = round($product_data->price - $discount);
            $ins['discount'] = $discount;
            $ins['net_price'] = $net_price;
        }
        else
        {
            $ins['discount'] = 0;
            $ins['net_price'] = $product_data->price;
        }
        
        $ins['qty'] = 1;
        $ins['total_price'] = $ins['net_price'];
        
        $result =  $this->md->my_insert('tbl_cart',$ins);
        
        echo $result;
        
        if($result == 1)
        {
            $this->session->unset_userdata('image_id');
        }

    }
    
    
    public function header_cart() 
    { 
        if($this->session->userdata('member'))
        {
            $items = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('member')));
            $item_count = 0;
            $total = 0;
            foreach ($items as $single)
            {
               $item_count++;
               $total = $total + $single->total_price;
            }
    ?>
    <div class="mini_cart_wrapper">
        <a href="javascript:void(0)">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i><b>Rs.<?php echo $total; ?> /-</b> <i class="fa fa-angle-down"></i></a>
        <span class="cart_quantity"><?php echo $item_count; ?></span>
        <!--mini cart-->
        <div class="mini_cart">
            <?php 
                if($item_count == 0)
                {
                    ?>
            <div align="center">
                <i class="fa fa-shopping-bag" style="font-size: 80px" ></i>
            </div><br>
            <P align="center">Your Cart Is Empty.</p>
            <?php
                }
                else
                {
                    $c=0;
                    foreach ($items as $single)
                    {
                        $product = $this->md->my_select('tbl_product','*',array('product_id'=>$single->product_id))[0];
                        $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$single->image_id))[0]; 
                        $allpath = explode(",", $image->path);

                        $c++;
                        if($c > 2)
                        {
                            break;
                        }
            ?>
            <div class="cart_item">
                <div class="cart_img" style="width: 50px;">
                    <a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><img src="<?php echo base_url().$allpath[0]; ?>" style="width: 100px;" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><?php echo $product->name; ?></a>
                    <p><span>Rs.<?php echo $product->price; ?> /-</span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <?php 
                    }
                }
            ?>

            <div class="mini_cart_table">                                                         
                <div class="cart_total mt-10">
                    <span>Total:</span>
                    <span class="price">Rs.<?php echo $total; ?></span>
                </div>
            </div>

            <div class="mini_cart_footer">
                <div class="cart_button">
                    <a href="<?php echo base_url('view-cart'); ?>">View cart</a>
                </div>


            </div>

        </div>
        <!--mini cart end-->
    </div>
    <?php 
        }
        else
        {
    ?>
    <div class="mini_cart_wrapper">
        <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i>0 <i class="fa fa-angle-down"></i></a>

        <!--mini cart-->
        <div class="mini_cart">
            <div align="center">
                <i class="fa fa-shopping-bag" style="font-size: 80px" ></i>
            </div><br>
            <P align="center">Please Login To View Cart</p>
            <br>
           <div class="mini_cart_footer">
                <div class="cart_button">
                    <a href="<?php echo base_url('login-register'); ?>">Login</a>
                </div>


            </div>

        </div>
        <!--mini cart end-->
    </div>
    <?php 
        }
    }
    
    public function stickey_header_cart() 
    
    {
 ?>
<div class="header_wishlist">
                            <?php
                                if($this->session->userdata('member'))
                                {
                            ?>    
                            <a href="<?php echo base_url('member-wishlist'); ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <?php 
                                }
                                else
                                {
                            ?>
                            <a href="<?php echo base_url('login-register'); ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a>                            
                            <?php 
                                }
                            ?>
                        </div>
                        <?php
                        if ($this->session->userdata('member')) {
                            $items = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('member')));
                            $item_count = 0;
                            $total = 0;
                            foreach ($items as $single) {
                                $item_count++;
                                $total = $total + $single->total_price;
                            }
                            ?>
                        <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i><b>Rs.<?php echo $total; ?> /-</b> <i class="fa fa-angle-down"></i></a>
                                    <span class="cart_quantity"><?php echo $item_count; ?></span>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <?php 
                                            if($item_count == 0)
                                            {
                                                ?>
                                        <div align="center">
                                            <i class="fa fa-shopping-bag" style="font-size: 80px" ></i>
                                        </div><br>
                                        <P align="center">Your Cart Is Empty.</p>
                                        <?php
                                            }
                                            else
                                            {
                                                $c=0;
                                                foreach ($items as $single)
                                                {
                                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$single->product_id))[0];
                                                    $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$single->image_id))[0]; 
                                                    $allpath = explode(",", $image->path);
                                                    
                                                    $c++;
                                                    if($c > 2)
                                                    {
                                                        break;
                                                    }
                                        ?>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><img src="<?php echo base_url().$allpath[0]; ?>" style="width: 100px;" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><?php echo $product->name; ?></a>
                                                <p><span>Rs.<?php echo $product->price; ?> /-</span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        
                                        <div class="mini_cart_table">                                                         
                                            <div class="cart_total mt-10">
                                                <span>Total:</span>
                                                <span class="price">Rs.<?php echo $total; ?></span>
                                            </div>
                                        </div>

                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="<?php echo base_url('view-cart'); ?>">View cart</a>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <!--mini cart end-->
                                </div>
                        <?php 
                                    }
                                    else
                                    {
                                ?>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                                                    aria-hidden="true"></i>0 <i class="fa fa-angle-down"></i></a>
                                    
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                                    <div align="center">
                                                        <i class="fa fa-shopping-bag" style="font-size: 80px" ></i>
                                                    </div><br>
                                                    <P align="center">Please Login To View Cart</p>
                                                    <br>
                                                    <div class="mini_cart_footer">
                                                        <div class="cart_button">
                                                            <a href="<?php echo base_url('login-register'); ?>">Login</a>
                                                        </div>


                                                    </div>

                                                </div>                                    
                                    <!--mini cart end-->
                                </div>
                                <?php 
                                    }
                                ?>
<?php
    }
    
    public function change_qty()
    {
        $wh['cart_id'] = $this->input->post('cart_id');
        $qty = $this->input->post('qty');
        
        $cartinfo = $this->md->my_select('tbl_cart','*',$wh)[0];
        
        $net_price = $cartinfo->net_price;
        
        $total = $net_price * $qty;
        
        $up['total_price'] = $total;
        $up['qty'] = $qty;
        
        echo $this->md->my_update('tbl_cart',$up,$wh);
        
    }
    
    public function cartdata()
    {
        ?>
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
                                            <td class="product_thumb"><a target="_new" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($single->product_id)); ?>"><img
                                                        src="<?php echo base_url().$allpath[0]; ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo substr( $product->name,0,50); ?>..</a></td>
                                            <td class="product_name"><a href="#">Rs.<?php echo $single->gross_price; ?>/-</a></td>
                                            <td class="product_name"><a href="#">Rs.<?php echo $single->discount; ?>/-</a></td>
                                            
                                            <td class="product-price">Rs.<?php echo  $single->net_price; ?>/-</td>
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
                                            <td class="product_total">Rs.<?php echo $single->total_price; ?>/-</td>
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
                                        <p>Total</p>
                                        <p class="cart_amount">Rs.<?php echo $gtotal; ?>/-</p>
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
        <?php
    }
    
//    User Remove Cart
    public function remove_cart()
    {
        $wh['cart_id'] = $this->input->post('cart_id');
        echo $this->md->my_delete('tbl_cart',$wh);
    }
    
    public function cart_btn()
    {
        $wh['image_id'] = $this->input->post('id');
        $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
     ?>
    <?php 
                                            if($img->qty > 0)
                                            {
                                                if($this->session->userdata('member'))
                                                {
                                                    $ww['register_id'] = $this->session->userdata('member');
                                                    $ww['image_id'] = $img->image_id;
                                                    
                                                    $cart_added = count($this->md->my_select('tbl_cart','*',$ww));
                                                    
                                                    if($cart_added == 1)
                                                    {
                                                        ?>
                                                        <a class="button" type="submit" style="background: #000">Added</a>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a class="button" type="submit" onclick="add_cart_detail(<?php echo $img->product_id; ?>);" style="color:white">Add To Cart</a>
                                                        <?php
                                                    }
                                                }
                                                else 
                                                {
                                                ?>
                                        <a class="button" type="submit" href="<?php echo base_url('login-register'); ?>" style="color:white">Add To Cart</a>
                                                <?php  
                                                }
                                           }
                                        ?>
    <?php
    }
    
    public function stock_status() 
    {
        $wh['image_id'] = $this->input->post('id');
        $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
        
        if($img->qty > 0)
                                        {
                                    ?>
                                    <p>Availability : <span style="color:green"> In Stock</span></p> 
                                    <?php 
                                        }
                                        else
                                        {
                                    ?>
                                    <p>Availability : <span style="color:red"> Out Of Stock</span></p> 
                                    <?php 
                                        }
    }
    
     
    public function select_address()
 {
       $id = $this->input->post('id');
        $this->session->set_userdata('shipment_id', $id);

        $whh['register_id'] = $this->session->userdata('member');
        $shipment = $this->md->my_select('tbl_shipment', '*', $whh);

        foreach ($shipment as $data) {
            ?>
                                    <div class="col-md-6">
                                                    <div style="margin:10px 0px;border: 1px solid #ddd;padding: 2px 10px;text-align: center;min-height: 200px">
                                                        <h6 style="margin-top:30px;margin-bottom: 5px;text-transform: capitalize"><?php echo $data->name; ?></h6>
                                                        <p style="text-transform: capitalize">(<?php echo $data->address_type; ?>)</p>
                                                        <p style="color:#000;min-height: 50px"><?php echo $data->address; ?></p>
                                                        <?php
                                                        if ($this->session->userdata('shipment_id') == $data->shipment_id) {
                                                            ?>
                                                            <a class="btn-round button" style="margin-bottom: 20px;font-size: 14px;color:white;background: #000;">Deliver Hear</a>
                                                            <?php
                                                        } else {
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
                         
        <?php
    }
    

//    apply promocode
    public function apply_code()
    {
        $wh['code'] = $this->input->post('code');
        $wh['min_bill_price <='] = ($this->session->userdata('bill_amount') + 100);
        $wh['status'] = 1;
        
        $data = $this->md->my_select('tbl_promocode','*',$wh);
        $valid_code = count($data);
        
       if($valid_code == 1)
       {
           $this->session->set_userdata('promocode_id',$data[0]->promocode_id);
           echo 1;
       }
       else
       {
           echo 0;
       }
        
    }
    
    public function order_summary()
    {
        ?>
        
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
                                                    
                                                    
                                                    <button href="" class="button" style="outline: none" name="pay" type="submit" value="yes">You Pay: <b>Rs.<?php echo $gtotal; ?> /-</b></button>
                                                    
                                                </div>

                                            </div>

                                        
                            
        
        <?php
    }
    
    public function order_status()
    {
//        update order status
        $data['status'] = $this->input->post('status');
        $wh['bill_id'] = $this->input->post('bill_id');
        
        $this->md->my_update('tbl_bill',$data,$wh);
        
//        send mail
        $bill = $this->md->my_select('tbl_bill','*',$wh)[0];
        $to = $this->md->my_select('tbl_register','*',array('register_id'=>$bill->register_id))[0]->email;
        $whh['register_id'] = $this->session->userdata('member');
        $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
//        $email = $member->email;
        $name = $member->name;
        if($this->input->post('status') == 1)
        {
            $subject = "Order Accepted";
            $msg = '<!DOCTYPE HTML>
        <html>
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>

            <style type="text/css">
              @media only screen and (min-width: 570px) {
          .u-row {
            width: 550px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }

          .u-row .u-col-100 {
            width: 550px !important;
          }

        }

        @media (max-width: 570px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }

        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }

        p {
          margin: 0;
        }

        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }

        * {
          line-height: inherit;
        }

        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }

        @media (max-width: 480px) {
          .hide-mobile {
            max-height: 0px;
            overflow: hidden;
            display: none !important;
          }

        }
        table, td { color: #000000; } a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: auto !important; } #u_content_image_1 .v-src-max-width { max-width: 60% !important; } #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 80% !important; } #u_content_menu_1 .v-container-padding-padding { padding: 26px 10px 10px !important; } #u_content_menu_1 .v-layout-display { display: block !important; } #u_content_menu_1 .v-padding { padding: 5px 14px !important; } }
            </style>



        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css"><!--<![endif]-->

        </head>

        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #afadc9;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #038cfe;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #038cfe;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

        <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              <h1 style="color:white">Mob Vision</h1>
            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>



        <div class="u-row-container" style="padding: 0px;background-color: transparent:border">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->

        <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 25px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 5px;font-family:arial,helvetica,sans-serif;" align="left">

          <h2 style="margin: 0px; color: #141414; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: "Open Sans",sans-serif; font-size: 28px;">
            <center><strong>Congratulations! ,'.$name.'<br/> Your order is confirmed.</strong></center>
          </h2>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left">

          <h1 style="margin: 0px; color: #3b4d63; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 41px;">
            <strong><span style="text-decoration: underline;"></span></strong>
          </h1>

              </td>
            </tr>
          </tbody>
        </table>
        

            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>

        </html>';
            
        }
        else
        {
            $subject = "Order Cancel";
            $msg = '<!DOCTYPE HTML>
        <html>
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>

            <style type="text/css">
              @media only screen and (min-width: 570px) {
          .u-row {
            width: 550px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }

          .u-row .u-col-100 {
            width: 550px !important;
          }

        }

        @media (max-width: 570px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }

        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }

        p {
          margin: 0;
        }

        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }

        * {
          line-height: inherit;
        }

        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }

        @media (max-width: 480px) {
          .hide-mobile {
            max-height: 0px;
            overflow: hidden;
            display: none !important;
          }

        }
        table, td { color: #000000; } a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: auto !important; } #u_content_image_1 .v-src-max-width { max-width: 60% !important; } #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 80% !important; } #u_content_menu_1 .v-container-padding-padding { padding: 26px 10px 10px !important; } #u_content_menu_1 .v-layout-display { display: block !important; } #u_content_menu_1 .v-padding { padding: 5px 14px !important; } }
            </style>



        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css"><!--<![endif]-->

        </head>

        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #afadc9;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #038cfe;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #038cfe;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

        <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              <h1 style="color:white">Mob Vision</h1>
            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>



        <div class="u-row-container" style="padding: 0px;background-color: transparent:border">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->

        <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 25px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 5px;font-family:arial,helvetica,sans-serif;" align="left">

          <h2 style="margin: 0px; color: #141414; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: "Open Sans",sans-serif; font-size: 28px;">
            <center><strong>Hello ,'.$name.'<br/> Your order has been canceled.</strong></center>
          </h2>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left">

          <h1 style="margin: 0px; color: #3b4d63; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 41px;">
            <strong><span style="text-decoration: underline;"></span></strong>
          </h1>

              </td>
            </tr>
          </tbody>
        </table>
        

            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>

        </html>';
        }
        $this->md->my_mailer($to,$subject,$msg);
        
//        refresh table
        $bill_data = $this->md->my_select('tbl_bill','*',array('status'=>0));
        
?>
<thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Order Detail</th>
                                                    <th class="wd-15p">Product Detail</th>
                                                    <th class="wd-20p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $c = 0;
                                                foreach ($bill_data as $bdata)
                                                {
                                                    $c++;
                                                    $name = $this->md->my_select('tbl_register','*',array('register_id'=>$bdata->register_id))[0]->name;
                                                    $address = $this->md->my_select('tbl_shipment','*',array('shipment_id'=>$bdata->shipment_id))[0]->address;
                                                
                                                    ?>
                                                    <tr>
                                                        <td style="vertical-align: top" align="center"><?php echo $c; ?></td>
                                                        <td style="text-align: left;vertical-align: top;" >
                                                            <p><b>Name : </b> <?php echo $name; ?></p>
                                                            <p><b>Address : </b> <?php echo $address; ?> </p>                                                            
                                                            <p><b>Date : </b> <?php echo date('d-m-Y', strtotime($bdata->bill_date)); ?> </p>
                                                            <p><b>Order ID : </b> <?php echo $bdata->order_id; ?></p>
                                                            <?php 
                                                                if($bdata->pay_type == "cod")
                                                                {
                                                            ?>
                                                            <p><b>Payment Mod : </b> Cash On Delivery</p> 
                                                            <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <p><b>Payment Mod : </b> Online Payment</p>
                                                            <p><b>Payment ID : </b> <?php echo $bdata->payment_id; ?></p>
                                                            <?php 
                                                                }
                                                            ?>
                                                            <p><b>Amount : </b> Rs. <?php echo $bdata->amount; ?> /-</p>
                                                            <p><b>Shipping Charge : </b> Rs. 100 /-</p>
                                                            <?php 
                                                                $amt=0;
                                                                if($bdata->promocode_id > 0)
                                                                {
                                                                    $promo_data = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bdata->promocode_id))[0];
                                                                    $code = $promo_data->code;
                                                                    $amt = $promo_data->amount;
                                                            ?>
                                                            <p><b>Promocode ( <?php echo $code; ?> ) : </b> Rs. <?php echo $amt; ?> /-</p>
                                                            <?php 
                                                                }
                                                                $total = ($bdata->amount + 100) - $amt;
                                                            ?>
                                                            <p><b>Total : </b> Rs. <?php echo $total; ?> /-</p>

                                                        </td>
                                                        <td style="text-align: left;vertical-align: top;" >
                                                            <?php 
                                                                $tran_data = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$bdata->bill_id));
                                                                foreach ($tran_data as $tdata)
                                                                {
                                                                    $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                                    $imageinfo = $this->md->my_select('tbl_product_image','*',array('image_id'=>$tdata->image_id))[0];
                                                                    
                                                                    $allpath = explode(",", $imageinfo->path);
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a target="_new" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>" ><img src="<?php echo base_url().$allpath[0]; ?>"  alt="<?php echo $productinfo->name; ?>" style="width: 100%;height: 200px"></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p><a target="_new" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($tdata->product_id)); ?>"><?php echo substr($productinfo->name,0,50); ?>..</a> </p>
                                                                    <p>Gross Price : Rs. <?php echo $tdata->gross_price; ?> /-</p>
                                                                    <p>Discount : Rs. <?php echo $tdata->discount; ?> /-</p>
                                                                    <p>Net Price : Rs. <?php echo $tdata->net_price; ?> /-</p>
                                                                    <p>Qty :  <?php echo $tdata->qty; ?></p>
                                                                    <p>Total : Rs. <?php echo $tdata->total_price; ?> /-</p>
                                                                    
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </td>
                                                        <td style="vertical-align: top;" align="center" >
                                                            <button class="btn btn-success" onclick="order_status(<?php echo $bdata->bill_id; ?>,1);">Accept</button><br><br>
                                                            <button class="btn btn-danger" onclick="order_status(<?php echo $bdata->bill_id; ?>,2);">Cancel</button>   
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                                                   
<?php                            
        
    }

    
    public function add_review()
    {
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $this->input->post('pid');
        $ins['rating'] = $this->input->post('rate');
        $ins['msg'] = $this->input->post('msg');
        $ins['date'] = date('Y-m-d h:i:s');
        $ins['status'] = 0;
        
        echo $this->md->my_insert('tbl_review',$ins);
    }
    
    public function product_data()
    {
//        echo "<pre>";
//        print_r($this->input->post());
        
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        
        $filter_data = $this->input->post('filter_data');
        $color = array();
        $price = array();
        $offer = array();
        
        if( isset($filter_data) && count($filter_data) > 0)
        {
            foreach ($filter_data as $single)
            {
                if($single['name'] == "color[]")
                {
                    array_push($color,$single['value']);
                }
                else if($single['name'] == "price[]")
                {
                    array_push($price, $single['value']);
                }
                else if($single['name'] == "offer[]")
                {
                    array_push($offer, $single['value']);
                }
            }
        }
       
        
        
        
        
?>
<div class="row shop_wrapper">
                            <?php 
                                    if($action == 'main-collection')
                                    {
                                        $id = base64_decode(base64_decode($id));
                                        $sql = "SELECT * FROM `tbl_product` WHERE `main_id` = $id AND `status` = 1 ";
                                      
                                    }
                                    else if($action == 'sub-collection')
                                    {
                                        $id = base64_decode(base64_decode($id));
                                        $sql = "SELECT * FROM `tbl_product` WHERE `sub_id` = $id AND `status` = 1 ";                                    
                                    }
                                    else if($action == 'peta-collection')
                                    {
                                        $id = base64_decode(base64_decode($id));   
                                        $sql = "SELECT * FROM `tbl_product` WHERE `peta_id` = $id AND `status` = 1 ";                        
                                    }
                                    else if($action == 'todays-offer')
                                    {
                                        $sql = "SELECT * FROM `tbl_product` WHERE `offer_id` > 0 AND `status` = 1";                        
                                    }
                                    else if($action == 'search')
                                    {
                                        $id = str_replace("-", " ", $id);
                                        $sql = "SELECT * FROM `tbl_product` WHERE `name` LIKE '%".$id."%' AND `status` = 1";                        
                                    }
                                    else
                                    {
                                        $sql = "SELECT * FROM `tbl_product` WHERE `status` = 1";
                                    }
                                    
                                    $color_str = implode("','", $color);
                                    
                                    if(count($color) > 0)
                                    {
                                        $sql.=" AND `product_id` IN (SELECT `product_id` FROM `tbl_product_image` WHERE `color` IN ('".$color_str."')) ";
                                    }
                                    
                                    if(count($price) > 0)
                                    {
                                        $sql .= " AND ( ";
                                        foreach ($price as $single)
                                        {
                                            if($single >= 100000)
                                            {
                                                $min_price = $single;
                                                $max_price = 500000;
                                            }
                                            else
                                            {
                                                $min_price = $single;
                                                $max_price = $single + 10000;
                                            }
                                            $sql .= "( `price` BETWEEN $min_price AND $max_price ) OR ";
                                        }
                                        $sql = rtrim($sql," OR ");
                                        $sql.= " )";
                                    }
                                    
                                    if(count($offer) > 0)
                                    {
                                        $sql.= " AND ( ";
                                        if(in_array("1", $offer))
                                        {
                                            $sql.= " `offer_id` > 0 OR ";
                                        }
                                        if(in_array("0", $offer))
                                        {
                                            $sql.= " `offer_id` = 0 OR ";
                                        }
                                        $sql = rtrim($sql," OR ");
                                        $sql.= "  )";
                                        
                                    }
                                    
                                    $temp = $this->md->my_query($sql);
                                    $total_product = count($temp);
//                                    echo $total_product;
                                    
                                    $sql .= " order by `product_id` DESC limit 0,$limit ";
                                    
                                    
//                                    echo $sql;
//                                    die();
                                    
                                    $products = $this->md->my_query($sql);
                                    
                                    if($total_product > 0)
                                    {
                                        
                                   
                                    
                                    foreach($products as $data)
                                    {
                                        $image_detail = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0];
                                        $paths = explode(",",$image_detail->path);
                                        $single_path = $paths[0];
//                                      $second_path = $paths[1];
                                ?>
                            <div class="col-lg-4 col-md-4 col-12 ">
                                
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><img src="<?php echo base_url().$single_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                            <div class="label_product">
                                                <?php 
                                                    if($image_detail->qty == 0)
                                                    {
                                                ?>
                                                <span class="btn btn-sm btn-danger" style="margin-right:15px;font-size: 10px;">Out Of Stock</span>
                                                <?php
                                                    }
                                                    else
                                                    {  
                                                    ?>
                                                <span class="btn btn-sm btn-success" style="margin-right:15px;font-size: 10px;">In Stock</span>
                                                    <?php 
                                                    }
                                                    ?>
                                               
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <?php 
                                                    if($this->session->userdata('member'))
                                                    {
                                                        $where['product_id'] = $data->product_id;
                                                        $where['register_id'] = $this->session->userdata('member'); 
                                                        
                                                        $wish_added = count($this->md->my_select('tbl_wishlist','*',$where));
                                                      ?>
                                                    <li class="wishlist">
                                                        <a onclick="add_wish( <?php echo $data->product_id; ?> )" id="wish_btn<?php echo $data->product_id; ?>" title="Add to Wishlist">
                                                            <?php 
                                                                if( $wish_added == 1)
                                                                {
                                                            ?>
                                                            <i class="fa fa-heart" style="color:#f53127" aria-hidden="true"></i>
                                                            <?php 
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <i class="fa fa-heart-o" style="color:white" aria-hidden="true"></i>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </a>
                                                    </li>
                                                    <?php 
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                      <li class="wishlist"><a href="<?php echo base_url('login-register'); ?>" title="Add to Wishlist"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li> 
                                                                <?php 
                                                    }
                                                                ?>
                                                    <li class="detail"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" title="detail"><span
                                                                class="fa fa-info"></span></a></li>
<!--                                                    <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#modal_box" title="quick view"> <span
                                                                class="ion-ios-search-strong"></span></a></li>-->
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                <?php
                                                    if ($image_detail->qty > 0) 
                                                    {
                                                        if ($this->session->userdata('member')) 
                                                        {
                                                            
                                                            $whh['product_id'] = $data->product_id;
                                                            $whh['register_id'] = $this->session->userdata('member');
                                                            
                                                            $cart_added = count($this->md->my_select('tbl_cart','*',$whh));
                                                            
                                                            
                                                            
                                                            if($cart_added == 0)
                                                            {
                                                                ?>
                                                <a id="cart_btn<?php echo $data->product_id; ?>" title="add to cart">
                                                    <span style="color:#fff" onclick="add_cart(<?php echo $data->product_id; ?>);">Add To Cart</span>
                                                </a>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                <a title="added" style="color:#fff">Added</a>
                                                            <?php

                                                            }
                                                            
                                                        }
                                                        
                                                        else
                                                        {
                                                            ?>
                                                        <a href="<?php echo base_url('login-register'); ?>" title="add to cart">Add To Cart</a>
                                                            <?php
                                                        }
                                                    }
                                                        ?>
                                            </div>
                                        </div>
                                        <div class="product_content grid_content">
                                            <div class="price_box">
                                                <?php 
                                                        if($data->offer_id > 0)
                                                        {
                                                            $old_price = $data->price;
                                                            
                                                            $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$data->offer_id))[0]->rate;
                                                            
                                                            $new_price = round($old_price - (($old_price * $rate)/100));
                                                          ?>
                                                <span class="current_price">RS. <?php echo number_format($new_price , 2); ?>/-</span>
                                                          <span class="old_price">RS. <?php echo number_format( $data->price , 2 ); ?>/-</span>
                                                        <?php 
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                          <span class="current_price">Rs.<?php echo number_format( $data->price,2 ); ?> /-</span>
                                                        <?php 

                                                        }
                                                    ?>
                                                        <!--                                                
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>-->
                                            </div>
                                            <div class="product_ratings">
                                                <ul>
                                                    <?php
                                                        $total_rating = 0;
                                                        $total_person = 0;
                                                        $rate = $this->md->my_select('tbl_review','*',array('product_id'=>$data->product_id,'status'=>1));
                                                        
                                                        foreach ($rate as $ss)
                                                        {
                                                            $total_rating += $ss->rating;
                                                            $total_person++;
                                                        }
                                                        
                                                        if($total_person > 0)
                                                        {
                                                            $avg_rate = ceil( $total_rating / $total_person );
                                                        }
                                                        else
                                                        {
                                                            
                                                            $avg_rate = 0;
                                                        }
                                                        
                                                        $fill_star = $avg_rate;
                                                        $blank_star = 5 - $fill_star;
                                                        
//                                                        fill star loop
                                                        for($i=1;$i<=$fill_star;$i++)
                                                        {
                                                    ?>
                                                    <li><a href="#"><i class="ion-android-star" ></i></a></li>
                                                    <?php 
                                                        }
                                                        
//                                                        blank star loop
                                                        for($i=1;$i<=$blank_star;$i++)
                                                        {
                                                    ?>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <?php 
                                                        }
                                                    ?>
                                                    <span><?php echo $total_person; ?> Reviews</span>
                                                </ul>
                                            </div>
                                            
                                            <!--text overflow hide-->
                                             <!--style="white-space: nowrap;width: 100%;overflow: hidden;text-overflow:ellipsis"-->
                                             
                                             
                                            <h3 class="product_name grid_name"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo $data->name; ?></a></h3>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            <?php 
                                    }
                                    if($total_product > $limit)
                                    {
                                        $limit += 3;
                                    ?>
                                    <!--Pagination-->
                                    <div class="">
                                        <div class="" align="center"> 
                                            

                                                <a  class="btn btn-primary" onclick="product_data('<?php echo $action; ?>','<?php echo base64_encode(base64_encode($id)); ?>','<?php echo $limit; ?>');" style="border-radius: 30px" >View More Products</a>
                                                
                                            
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    }
                                    else
                                    {
                                        echo "<div class='text-center' style='color:#ddd'><h1>No Product Found.</h1></div>";
                                    }
                            ?>
                            
                   
                        </div>                                            
<?php
        
    }
}


//for email format
//<td style="padding-right: 0px;padding-left: 0px;" align="center">
//
//            <img align="center" border="0" src="" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>
//            
//            </td>