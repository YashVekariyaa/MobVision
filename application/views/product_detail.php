<?php // $this->session->unset_userdata('image_id');
?>
<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $detail->name; ?> - Mob Vision</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Header links-->
        <?php
//        require_once 'header_link.php';
        $this->load->view('header_link');
        ?>
        
        <style type="text/css">
            /* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
    
        </style>

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
                                <li><a href="<?php echo base_url(); ?>collection">Collection</a></li>
                                <li><?php echo $detail->name; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--product details start-->
        <div class="product_details variable_product mt-60 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6" id="color_preview">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom text-center">
                                <?php
                                $img  = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0];
                                $path = $img->path;
                                $allpath = explode(",", $path);
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
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right">
                            <form action="#">

                                <h1><?php echo $detail->name; ?></h1>
<!--                                <div class="product_nav">
                                    <ul>
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>-->
                                <div class=" product_ratting">
                                    <ul>
                                                    <?php
                                                        $total_rating = 0;
                                                        $total_person = 0;
                                                        $rate = $this->md->my_select('tbl_review','*',array('product_id'=>$detail->product_id,'status'=>1));
                                                        
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
                                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
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
                                                    &nbsp;&nbsp;<span>(<?php echo $total_person; ?> Reviews)</span>
                                                </ul>
                                </div>
                                <div class="price_box">
                                    <?php
                                    if ($detail->offer_id > 0) {
                                        $old_price = $detail->price;

                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $detail->offer_id))[0]->rate;

                                        $new_price = round($old_price - (($old_price * $rate) / 100));
                                        ?>
                                        <span class="current_price">Rs.<?php echo $new_price; ?> /-</span>
                                        <span class="old_price">Rs.<?php echo $detail->price; ?> /-</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="current_price">Rs.<?php echo $detail->price; ?> /-</span>
                                       <!--<span class="old_price">$80.00</span>-->
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div> 
                                    Product Code: <?php echo $detail->code; ?>                     
                                </div>
                                <div id="stock_status"> 
                                    <?php 
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
                                    ?>
                                </div>
                                <div class="product_desc">
                                    <p><?php echo $detail->description; ?></p>
                                </div>
                                <div class="product_variant color">
                                    <h3>Available Options</h3>
                                    <label>color</label>
                                    <ul>
                                        <?php 
                                            $color = $this->md->my_select('tbl_product_image','*',array('product_id'=>$detail->product_id));
                                            $cc=0;
                                            foreach ($color as $single)
                                            {
                                                $cc++;
                                        ?>
                                        <li onclick="change_images(<?php echo $single->image_id; ?>);cart_btn(<?php echo $single->image_id; ?>);" style="background:<?php echo $single->color; ?>;<?php if($cc == 1) echo "border:2px solid black"; ?>;" title="<?php echo $single->color; ?>"><a href="#"></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                </div>


                                <div class="product_variant quantity">
                                    <?php
                                            if ($this->session->userdata('member')) {
                                            $where['product_id'] = $detail->product_id;
                                            $where['register_id'] = $this->session->userdata('member');

                                            $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                                            ?>
                                    <a class="button" onclick="add_wishh(<?php echo $detail->product_id; ?>)" id="detail_wish" style="cursor:pointer;color:white">
                                       <?php
                                           if( $wish_added == 1)
                                             {
                                             ?>
                                        <i class="fa fa-heart margin-right-5" style="color:red"></i> Added in Wish List
                                          <?php
                                                    }
                                                    else 
                                                    {
                                                ?>
                                                <i class="fa fa-heart-o margin-right-5"></i> Add to Wish List
                                                <?php
                                                    }
                                                ?>
                                            </a> 
                                    <?php
                                            }
                                            ?>
                                    &nbsp;
                                    
                                    <div id="cart_btn_area">
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
                                                        <a class="button" type="submit" style="background: #000"> Added</a>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a class="button" onclick="add_cart_detail(<?php echo $detail->product_id; ?>);" type="submit" style="color:white">Add To Cart</a>
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
                                    </div>
                                </div>
                                

                            </form>

<!--                            <div class="product_d_meta">
                                <span>SKU: N/A</span>
                                <span>Category: <a href="#">Clothings</a></span>
                                <span>Tags:
                                    <a href="#">Creams</a>
                                    <a href="#">Lotions</a>
                                </span>
                            </div>
                            <div class="priduct_social">
                              -->
                <!--URL of Product-->
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_kqkq"></div>
                
                <?php
                    $currentURL = current_url(); //http://myhost/main

                    $params   = $_SERVER['QUERY_STRING']; //my_id=1,3

                    $fullURL = $currentURL . '?' . $params; 

//                    echo $fullURL;   //http://myhost/main?my_id=1,3
                ?>
                <!--Qr Code-->
<!--                <input type="hidden" value="<?php echo "Product : $detail->name; \n Price : number_format($detail->price,2);  \n URL Link -" .$fullURL; ?>" name="qrvalue">
                                    
                                    <div id="qrcode"></div>
                                    <a id="get_img" style="display: none" download="">Download</a></div>-->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--product details end-->

        <!--product info start-->
        <div class="product_d_info mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                           aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                           aria-selected="false">Specification</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                           aria-selected="false">Reviews</a>
                                    </li>
                                    <?php 
                                    if($this->session->userdata('member'))
                                    {
                                    ?>
                                    <li>
                                        
                                        <a data-bs-toggle="tab" href="#review" role="tab" aria-controls="reviews"
                                           aria-selected="false">Add Reviews</a>
                                    </li>
                                    <?php 
                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p><?php echo $detail->description; ?></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <?php
                                                    echo $detail->specification;
                                                    ?>                                               
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>                                
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        
                                        <?php 
                                                $review = $this->md->my_select('tbl_review','*',array('product_id'=>$detail->product_id,'status'=>1));
                                                
                                                if(count($review) > 0)
                                                {
                                                    
                                                
                                                
                                                foreach($review as $dd)
                                                {
                                                    $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$dd->register_id))[0];
                                            ?>
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <?php 
                                                    if(strlen($user_info->profile_pic) > 0)
                                                    {
                                                    ?>
                                                 <img src="<?php echo base_url().$user_info->profile_pic; ?>" alt="" style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;border:1px solid #dfdfdf;display: block;margin: auto" >
                                                   <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <img src="<?php echo base_url(); ?>assets/img/blank.jpg" alt="" style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;border:1px solid #dfdfdf;display: block;margin: auto" >
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                            
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="star_rating">
                                                        
                                                        <ul>
                                                            <?php 
                                                            $fill_star = $dd->rating;
                                                            $blank_star = 5 - $fill_star;
                                                            
                                                            for($i=1;$i<=$fill_star;$i++)
                                                            {
                                                        ?>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <?php 
                                                                }
                                                                
                                                              for($i=1;$i<=$blank_star;$i++)

                                                                {
                                                            ?>
                                                            <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </ul>
                                                        
                                                        <span><?php echo date('d-m-Y h:i:s' ); ?></span>
                                                                                                            
                                                    </div>
                                                    <p><strong><?php echo $user_info->name; ?> </strong> </p>
                                                    <span><?php echo $dd->msg; ?></span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <?php 
                                                }
                                               }
                                                else
                                                {
                                                    echo "<h2 style='color:#ddd;'>No Reviews Yet.</h2>";
                                                }
                                            ?>
                                        

                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="review" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        
                                        <div class="comment_title">
                                            <h2>Add a review </h2><br>
                                            
                                            </div>
                                        <div class="img-circle pull-left">
                                            <?php 
                                                $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member')))[0];
                                                
                                                if(strlen($user_info->profile_pic) > 0 )
                                                {
                                            ?>
                                            <img src="<?php echo base_url().$user_info->profile_pic; ?>" style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;border:1px solid #dfdfdf;display: block;margin: auto;margin-right: 35px;" >
                                            <?php 
                                                }
                                                else
                                                {    
                                            ?>
                                            <img src="<?php echo base_url(); ?>assets/img/blank.jpg" style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;border:1px solid #dfdfdf;display: block;margin: auto;margin-right: 35px;" >
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        
                                        <div class="product_ratting mb-10">
                                            <h3>Your rating</h3>
                                            <input type="hidden" id="rate-value" />
                                                 <div class='rating-stars'>
                                                     
                                                    <ul id='stars'>
                                                      <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                    </ul>
                                                 </div>

                                        </div>
                                        <div class="product_review_form">
                                            
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea  id="review-msg"></textarea>
                                                    </div>
<!--                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" type="text">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" type="text">
                                                    </div>-->
                                        <div>
                                                <button class="col-2" type="submit" onclick="add_review(<?php echo $detail->product_id; ?>);">Submit</button>
                                        </div>
                                        <div id="msg">
                                        </div>   
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

        <!--Related product area start-->
        <section class="product_area related_products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products </h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                <?php
                $whh['peta_id'] = $detail->peta_id;
                $whh['product_id !='] = $detail->product_id;
                $whh['status'] = 1;

                $related = $this->md->my_select('tbl_product', '*', $whh);

                foreach ($related as $data) {
                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                    $paths = explode(",", $image_detail->path);
                    $single_path = $paths[0];
                    ?>

                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><img src="<?php echo base_url() . $single_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                    <!--<a class="secondary_img"  href="product-details.html"><img src="<?php echo base_url() . $second_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>-->
                                    <div class="label_product">
                                    <?php
                                    if ($image_detail->qty == 0) {
                                        ?>
                                            <span class="btn btn-sm btn-danger" style="margin-right:15px;font-size: 10px;">Not Available</span>
                                                  <?php
                                                   } else {
                                                   ?>
                                            <span class="btn btn-sm btn-success" style="margin-right:15px;font-size: 10px;">Available</span>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="action_links">
                                        <ul>
                                                <?php
                                                if ($this->session->userdata('member')) {
                                                    $where['product_id'] = $data->product_id;
                                                    $where['register_id'] = $this->session->userdata('member');

                                                    $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                                                    ?>
                                                    <li class="wishlist">
                                                        <a onclick="add_wish( <?php echo $data->product_id; ?> )" id="wish_btn<?php echo $data->product_id; ?>" title="Add to Wishlist">
                                                            <?php
                                                            if ($wish_added == 1) {
                                                                ?>
                                                                <i class="fa fa-heart" style="color:#f53127" aria-hidden="true"></i>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <i class="fa fa-heart-o" style="color:white" aria-hidden="true"></i>
                                                                <?php
                                                            }
                                                            ?>
                                                        </a>
                                                    </li>
                                                            <?php
                                                        } else {
                                                            ?>
                                                    <li class="wishlist"><a href="<?php echo base_url('login-register'); ?>" title="Add to Wishlist"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li> 
                                                    <?php
                                                }
                                                ?>
                                                <li class="detail"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" title="detail"><span
                                                            class="fa fa-info"></span></a></li>
                                            </ul>
                                    </div>
                                    
                                   <div class="add_to_cart">
                                                <?php
                                                    if ($image_detail->qty > 0) 
                                                    {
                                                        if ($this->session->userdata('member')) 
                                                        {
                                                            
                                                            $whhh['product_id'] = $data->product_id;
                                                            $whhh['register_id'] = $this->session->userdata('member');
                                                            
                                                            $cart_added = count($this->md->my_select('tbl_cart','*',$whhh));
                                                            
                                                            
                                                            
                                                            if($cart_added == 0)
                                                            {
                                                                ?>
                                                <a id="cart_btnn<?php echo $data->product_id; ?>" title="add to cart">
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
                                        if ($data->offer_id > 0) {
                                            $old_price = $data->price;

                                            $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;

                                            $new_price = round($old_price - (($old_price * $rate) / 100));
                                            ?>
                                            <span class="current_price">RS. <?php echo  $new_price; ?>/-</span>
                                            <span class="old_price">RS. <?php echo $data->price; ?>/-</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="current_price">Rs.<?php echo $data->price; ?> /-</span>
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
                                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
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
                                                    <span>(<?php echo $total_person; ?> Reviews)</span>
                                                </ul>
                                    </div>

                                    <!--text overflow hide-->
                                    <!--style="white-space: nowrap;width: 100%;overflow: hidden;text-overflow:ellipsis"-->


                                    <h3 class="product_name grid_name"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo $data->name; ?></a></h3>
                                </div>
                            </figure>
                        </article>
    <?php
}
?>

                </div>
            </div>
        </section>
        <!--Related product area end-->


        <!--Recent View product area start--> 
<?php
if ($this->session->userdata('member')) {
    $where['product_id'] = $detail->product_id;
    $where['register_id'] = $this->session->userdata('member');

    $count = count($this->md->my_select('tbl_recent_view', '*', $where));

    if ($count == 0) {
        $this->md->my_insert('tbl_recent_view', $where);
    }
    ?>
            <section class="product_area upsell_products">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section_title">
                                <h2>Recent View Products </h2>
                            </div>
                        </div>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
            <?php
            $recent = $this->md->my_query("SELECT * FROM `tbl_recent_view` WHERE  `register_id` = '" . $this->session->userdata('member') . "'  AND `product_id` != '" . $detail->product_id . "' ORDER BY `view_id` DESC");

            foreach ($recent as $single) {
                $data = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                $paths = explode(",", $image_detail->path);
                $single_path = $paths[0];
                ?>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><img src="<?php echo base_url() . $single_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                        <!--<a class="secondary_img"  href="product-details.html"><img src="<?php echo base_url() . $second_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>-->
                                        <div class="label_product">
        <?php
        if ( $image_detail->qty === 0) {
            ?>
                                                <span class="btn btn-sm btn-danger" style="margin-right:15px;font-size: 10px;">Out Of Stock</span>
                                <?php
                            } else {
                                ?>
                                                <span class="btn btn-sm btn-success" style="margin-right:15px;font-size: 10px;">In Stock</span>
                                <?php
                            }
                            ?>

                                        </div>
                                        <div class="action_links">
                                        <ul>
                                                <?php
                                                if ($this->session->userdata('member')) {
                                                    $where['product_id'] = $data->product_id;
                                                    $where['register_id'] = $this->session->userdata('member');

                                                    $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                                                    ?>
                                                    <li class="wishlist">
                                                        <a onclick="add_wish( <?php echo $data->product_id; ?> )" id="wish_btn<?php echo $data->product_id; ?>" title="Add to Wishlist">
                                                            <?php
                                                            if ($wish_added == 1) {
                                                                ?>
                                                                <i class="fa fa-heart" style="color:#f53127" aria-hidden="true"></i>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <i class="fa fa-heart-o" style="color:white" aria-hidden="true"></i>
                                                                <?php
                                                            }
                                                            ?>
                                                        </a>
                                                    </li>
                                                            <?php
                                                        } else {
                                                            ?>
                                                    <li class="wishlist"><a href="<?php echo base_url('login-register'); ?>" title="Add to Wishlist"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li> 
                                                    <?php
                                                }
                                                ?>
                                                <li class="detail"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" title="detail"><span
                                                            class="fa fa-info"></span></a></li>
                                            </ul>
                                    </div>
                                    
                                        <div class="add_to_cart">
                                                <?php
                                                    if ($image_detail->qty > 0) 
                                                    {
                                                        if ($this->session->userdata('member')) 
                                                        {
                                                            
                                                            $whhhh['product_id'] = $data->product_id;
                                                            $whhhh['register_id'] = $this->session->userdata('member');
                                                            
                                                            $cart_added = count($this->md->my_select('tbl_cart','*',$whhhh));
                                                            
                                                            
                                                            
                                                            if($cart_added == 0)
                                                            {
                                                                ?>
                                                <a id="cart_btnn<?php echo $data->product_id; ?>" title="add to cart">
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
        if ($data->offer_id > 0) {
            $old_price = $data->price;

            $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;

            $new_price = round($old_price - (($old_price * $rate) / 100));
            ?>
                                                <span class="current_price">RS. <?php echo $new_price; ?>/-</span>
                                                <span class="old_price">RS. <?php echo $data->price; ?>/-</span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="current_price">Rs.<?php echo $data->price; ?> /-</span>
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
                                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
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
                                                    <span>(<?php echo $total_person; ?> Reviews)</span>
                                                </ul>
                                        </div>

                                        <!--text overflow hide-->
                                        <!--style="white-space: nowrap;width: 100%;overflow: hidden;text-overflow:ellipsis"-->


                                        <h3 class="product_name grid_name"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo $data->name; ?></a></h3>
                                    </div>
                                </figure>
                            </article>
                                            <?php
                                        }
                                        ?>

                    </div>
                </div>
            </section>
    <?php
}
?>
        <!--Recent View product area end-->


        <!--footer area-->
<?php
$this->load->view('footer');
?>



        <!--Footer Script-->
<?php
$this->load->view('footer_script');
?>

        <script>
            $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    
    $("#rate-value").attr('value',ratingValue);    
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
        </script>

    </body>
    

</html>

