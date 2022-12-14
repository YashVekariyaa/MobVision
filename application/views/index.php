<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Mob Vision - Your Dream Phone Is Here</title>
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

        <!--slider area start-->
        <section class="slider_section slider_section_three mb-70">
            <div class="slider_area owl-carousel">
                <?php
                $slider = $this->md->my_select('tbl_banner', '*', array('status' => 1));
                foreach ($slider as $single) {
                    ?>
                    <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url() . $single->path; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider_content">
                                        <h2><?php echo $single->title; ?></h2>
                                        <p><?php echo $single->subtitle; ?></p>
                                        <a class="button" href="<?php echo base_url('collection'); ?>">shopping now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
        <!--slider area end-->

        <!--product area start-->
        <div class="product_area mb-46">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            <div>
                                <h3>Newly Added Products</h3>
                            </div><br>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">
                        <div class="product_tab_btn3">
                            <ul class="nav" role="tablist">
                                <?php
                                $c = 0;
                                $main = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
                                foreach ($main as $single) {
                                    $c++;
                                    ?>
                                    <li>
                                        <a <?php
                                        if ($c == 1) {
                                            echo 'class="active"';
                                        }
                                        ?> data-bs-toggle="tab" href="#tab<?php echo $single->category_id; ?>" role="tab"
                                            aria-controls="Bestseller" aria-selected="true">
                                                <?php echo $single->name; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <?php
                    $cc = 0;
                    foreach ($main as $single) {
                        $cc++;
                        ?>
                        <div class="tab-pane fade <?php
                        if ($cc == 1) {
                            echo "show active";
                        }
                        ?>" id="tab<?php echo $single->category_id; ?>" role="tabpanel">
                            <div class="product_carousel product_column5 owl-carousel">
                                <?php
                                $id = $single->category_id;
                                $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `main_id` = $id ORDER BY `product_id` DESC LIMIT 0,10");
                                foreach ($products as $data) {
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
                                                                <a onclick="add_wish(<?php echo $data->product_id; ?>)" id="wish_btn<?php echo $data->product_id; ?>" title="Add to Wishlist">
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
                                                        <!--                                                    <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                                                                                        data-bs-target="#modal_box" title="quick view"> <span
                                                                                                                        class="ion-ios-search-strong"></span></a></li>-->
                                                    </ul>
                                                </div>
                                                <div class="add_to_cart">
                                                    <?php
                                                    if ($image_detail->qty > 0) {
                                                        if ($this->session->userdata('member')) {

                                                            $whh['product_id'] = $data->product_id;
                                                            $whh['register_id'] = $this->session->userdata('member');

                                                            $cart_added = count($this->md->my_select('tbl_cart', '*', $whh));

                                                            if ($cart_added == 0) {
                                                                ?>
                                                                <a id="cart_btn<?php echo $data->product_id; ?>" title="add to cart">
                                                                    <span style="color:#fff" onclick="add_cart(<?php echo $data->product_id; ?>);">Add To Cart</span>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a title="added" style="color:#fff">Added</a>
                                                                <?php
                                                            }
                                                        } else {
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
                                                        <span class="current_price">RS. <?php echo number_format($new_price, 2); ?>/-</span>
                                                        <span class="old_price">RS. <?php echo number_format($data->price, 2); ?>/-</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="current_price">Rs.<?php echo number_format($data->price, 2); ?> /-</span>
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
                                                        $rate = $this->md->my_select('tbl_review', '*', array('product_id' => $data->product_id, 'status' => 1));

                                                        foreach ($rate as $ss) {
                                                            $total_rating += $ss->rating;
                                                            $total_person++;
                                                        }

                                                        if ($total_person > 0) {
                                                            $avg_rate = ceil($total_rating / $total_person);
                                                        } else {

                                                            $avg_rate = 0;
                                                        }

                                                        $fill_star = $avg_rate;
                                                        $blank_star = 5 - $fill_star;

//                                                        fill star loop
                                                        for ($i = 1; $i <= $fill_star; $i++) {
                                                            ?>
                                                            <li><a href="#"><i class="ion-android-star" ></i></a></li>
                                                            <?php
                                                        }

//                                                        blank star loop
                                                        for ($i = 1; $i <= $blank_star; $i++) {
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
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--product area end-->

        <!--banner area start-->
        <!--    <div class="banner_area banner_two mb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner mb-30">
                                <div class="banner_thumb">
                                    <a href="shop.html"><img src="assets/img/bg/banner4.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner mb-30">
                                <div class="banner_thumb">
                                    <a href="shop.html"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        <!--banner area end-->

        <!--product area start-->
        <section class="product_area product_deals_three mb-68">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <div class="deals_title_three">
                            <h2>Top Selling on Mob Vision</h2>
                            
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="row">

                            <div class="product_carousel product_deals_column4 owl-carousel">
                                <?php
                                $products = $this->md->my_query("SELECT p.* , t.`product_id` as tt , COUNT( t.`product_id` ) as cc FROM `tbl_transaction`as t, `tbl_product` AS p WHERE p.`product_id` = t.`product_id` GROUP BY `product_id` ORDER BY cc DESC LIMIT 0,5");

                                foreach ($products as $data) {
                                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                    $paths = explode(",", $image_detail->path);
                                    $single_path = $paths[0];
                                    ?>
                                    <div class="col-lg-3">

                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><img src="<?php echo base_url() . $single_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                                    <!--<a class="secondary_img"  href="product-details.html"><img src="<?php echo base_url() . $second_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>-->
                                                    <div class="label_product">
                                                        <?php
                                                        if ($image_detail->qty == 0) {
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
                                                                    <a onclick="add_wish(<?php echo $data->product_id; ?>)" id="wish_btn<?php echo $data->product_id; ?>" title="Add to Wishlist">
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
                                                            <!--                                                    <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                                                                                            data-bs-target="#modal_box" title="quick view"> <span
                                                                                                                            class="ion-ios-search-strong"></span></a></li>-->
                                                        </ul>
                                                    </div>
                                                    <div class="add_to_cart">
                                                        <?php
                                                        if ($image_detail->qty > 0) {
                                                            if ($this->session->userdata('member')) {

                                                                $whhere['product_id'] = $data->product_id;
                                                                $whhere['register_id'] = $this->session->userdata('member');

                                                                $cart_added = count($this->md->my_select('tbl_cart', '*', $whhere));

                                                                if ($cart_added == 0) {
                                                                    ?>
                                                                    <a id="cart_btn<?php echo $data->product_id; ?>" title="add to cart">
                                                                        <span style="color:#fff" onclick="add_cart(<?php echo $data->product_id; ?>);">Add To Cart</span>
                                                                    </a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a title="added" style="color:#fff">Added</a>
                                                                    <?php
                                                                }
                                                            } else {
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
                                                            <span class="current_price">RS. <?php echo number_format($new_price, 2); ?>/-</span>
                                                            <span class="old_price">RS. <?php echo number_format($data->price, 2); ?>/-</span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="current_price">Rs.<?php echo number_format($data->price, 2); ?> /-</span>
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
                                                            $rate = $this->md->my_select('tbl_review', '*', array('product_id' => $data->product_id, 'status' => 1));

                                                            foreach ($rate as $ss) {
                                                                $total_rating += $ss->rating;
                                                                $total_person++;
                                                            }

                                                            if ($total_person > 0) {
                                                                $avg_rate = ceil($total_rating / $total_person);
                                                            } else {

                                                                $avg_rate = 0;
                                                            }

                                                            $fill_star = $avg_rate;
                                                            $blank_star = 5 - $fill_star;

//                                                        fill star loop
                                                            for ($i = 1; $i <= $fill_star; $i++) {
                                                                ?>
                                                                <li><a href="#"><i class="ion-android-star" ></i></a></li>
                                                                <?php
                                                            }

//                                                        blank star loop
                                                            for ($i = 1; $i <= $blank_star; $i++) {
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
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--product area end-->

        <!--product area start-->
    <!--    <section class="product_area mb-46">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Top Selling on Mob Vision</h2>
                        </div>
                    </div>
                </div>
                <div class="product_slick product_slick_column5">
        <?php
        $products = $this->md->my_query("SELECT p.* , t.`product_id` as tt , COUNT( t.`product_id` ) as cc FROM `tbl_transaction`as t, `tbl_product` AS p WHERE p.`product_id` = t.`product_id` GROUP BY `product_id` ORDER BY cc DESC LIMIT 0,5");
        foreach ($products as $data) {
            $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
            $paths = explode(",", $image_detail->path);
            $single_path = $paths[0];
            ?>
                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img" href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><img src="<?php echo base_url() . $single_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                                                    <a class="secondary_img"  href="product-details.html"><img src="<?php echo base_url() . $second_path; ?>" style="height:250px;width: 100%;object-fit: contain;" alt="<?php echo $data->name; ?>"></a>
                                                                    <div class="label_product">
            <?php
            if ($image_detail->qty == 0) {
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
                                                                            <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box" title="quick view"> <span
                                                                                        class="ion-ios-search-strong"></span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="add_to_cart">
            <?php
            if ($image_detail->qty > 0) {
                if ($this->session->userdata('member')) {

                    $whh['product_id'] = $data->product_id;
                    $whh['register_id'] = $this->session->userdata('member');

                    $cart_added = count($this->md->my_select('tbl_cart', '*', $whh));

                    if ($cart_added == 0) {
                        ?>
                                                                                                                                    <a id="cart_btn<?php echo $data->product_id; ?>" title="add to cart">
                                                                                                                                        <span style="color:#fff" onclick="add_cart(<?php echo $data->product_id; ?>);">Add To Cart</span>
                                                                                                                                    </a>
                        <?php
                    } else {
                        ?>
                                                                                                                                    <a title="added" style="color:#fff">Added</a>
                        <?php
                    }
                } else {
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
                                                                                            <span class="current_price">RS. <?php echo number_format($new_price, 2); ?>/-</span>
                                                                                                      <span class="old_price">RS. <?php echo number_format($data->price, 2); ?>/-</span>
                <?php
            } else {
                ?>
                                                                                                      <span class="current_price">Rs.<?php echo number_format($data->price, 2); ?> /-</span>
                <?php
            }
            ?>
                                                                                                                                
                                                                        <span class="old_price">$86.00</span>
                                                                        <span class="current_price">$79.00</span>
                                                                    </div>
                                                                    <div class="product_ratings">
                                                                        <ul>
            <?php
            $total_rating = 0;
            $total_person = 0;
            $rate = $this->md->my_select('tbl_review', '*', array('product_id' => $data->product_id, 'status' => 1));

            foreach ($rate as $ss) {
                $total_rating += $ss->rating;
                $total_person++;
            }

            if ($total_person > 0) {
                $avg_rate = ceil($total_rating / $total_person);
            } else {

                $avg_rate = 0;
            }

            $fill_star = $avg_rate;
            $blank_star = 5 - $fill_star;

//                                                        fill star loop
            for ($i = 1; $i <= $fill_star; $i++) {
                ?>
                                                                                                <li><a href="#"><i class="ion-android-star" ></i></a></li>
                <?php
            }

//                                                        blank star loop
            for ($i = 1; $i <= $blank_star; $i++) {
                ?>
                                                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                <?php
            }
            ?>
                                                                            <span><?php echo $total_person; ?> Reviews</span>
                                                                        </ul>
                                                                    </div>
                                                                    
                                                                    text overflow hide
                                                                     style="white-space: nowrap;width: 100%;overflow: hidden;text-overflow:ellipsis"
                                                                     
                                                                     
                                                                    <h3 class="product_name grid_name"><a href="<?php echo base_url(); ?>product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo $data->name; ?></a></h3>
                                                                </div>
                                                            </figure>
                                                        </article>
            <?php
        }
        ?>
                </div>
            </div>
        </section>-->
        <!--product area end-->

        <!--banner area start-->
        <!--    <div class="banner_area mb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="shop.html"><img src="assets/img/bg/banner8.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        <!--banner area end-->

        <!--custom product area-->
    <!--    <section class="custom_product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        small product area
                        <div class="small_product_area">
                            <div class="section_title">
                                <h2><span> New Arrivals </span></h2>
                            </div>
                            <div class="small_product_container small_product_active">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product1.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product2.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product3.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product4.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Nullam maximus eget nisi
                                                    dignissim</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product5.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product6.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                                    commodo sit</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product7.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product8.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit vitae
                                                    neque ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product9.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product10.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Mirum est notare nibh
                                                    iaculis pretium</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product11.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product12.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque ultricies
                                                    suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product1.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product2.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product3.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product4.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Nullam maximus eget nisi
                                                    dignissim</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product5.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product6.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                                    commodo sit</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product7.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product8.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit vitae
                                                    neque ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product9.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product10.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Mirum est notare nibh
                                                    iaculis pretium</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product11.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product12.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque ultricies
                                                    suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        small product end
                    </div>
                    <div class="col-lg-4 col-md-12">
                        small product area
                        <div class="small_product_area">
                            <div class="section_title">
                                <h2><span> On sale Products </span></h2>
                            </div>
                            <div class="small_product_container small_product_active">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product14.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Eodem modo vel mattis
                                                    ante</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product16.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product17.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product18.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Laudantium dignissim
                                                    ipsum primis</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product20.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Cras neque honcus
                                                    consectetur</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product21.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product22.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque ultricies
                                                    suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product23.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product24.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product14.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Eodem modo vel mattis
                                                    ante</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product16.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product17.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product18.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Laudantium dignissim
                                                    ipsum primis</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product20.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Cras neque honcus
                                                    consectetur</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product21.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product22.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque ultricies
                                                    suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product23.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product24.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        small product end
                    </div>
                    <div class="col-lg-4 col-md-12">
                        small product area
                        <div class="small_product_area">
                            <div class="section_title">
                                <h2><span> Top rated Products </span></h2>
                            </div>
                            <div class="small_product_container small_product_active">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product11.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Auctor gravida enim quam
                                                    ut risus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product12.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product13.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit neque
                                                    ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product14.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product15.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product16.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product17.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Cras neque metus eugiat
                                                    felis sem</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product19.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Duis pulvinar obortis
                                                    elementum</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product20.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product21.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product11.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Auctor gravida enim quam
                                                    ut risus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product12.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product13.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit neque
                                                    ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product14.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product15.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product16.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product17.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Cras neque metus eugiat
                                                    felis sem</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product19.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Duis pulvinar obortis
                                                    elementum</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="assets/img/product/product20.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="assets/img/product/product21.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus
                                                    sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        small product end
                    </div>
                </div>
            </div>
        </section>-->
        <!--custom product end-->

        <!--brand area start-->
        <!--    <div class="brand_area brand_two mb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="brand_container owl-carousel">
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand1.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand4.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand5.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand6.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand7.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand8.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand9.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand10.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_items">
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                                    </div>
                                    <div class="single_brand">
                                        <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        <!--brand area end-->

        <!--footer area-->
        <?php
//    require_once 'footer.php';
        $this->load->view('footer');
        ?>

        <!-- modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li>
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                                       aria-controls="tab1" aria-selected="false"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                                       aria-controls="tab2" aria-selected="false"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                                       role="tab" aria-controls="tab3" aria-selected="false"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
                                                       aria-controls="tab4" aria-selected="false"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>Handbag feugiat</h2>
                                        </div>
                                        <div class="modal_price mb-10">
                                            <span class="new_price">$64.99</span>
                                            <span class="old_price">$78.99</span>
                                        </div>
                                        <div class="modal_description mb-15">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                                laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                                in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                                recusandae </p>
                                        </div>
                                        <div class="variants_selects">
                                            <div class="variants_size">
                                                <h2>size</h2>
                                                <select class="select_option">
                                                    <option selected value="1">s</option>
                                                    <option value="1">m</option>
                                                    <option value="1">l</option>
                                                    <option value="1">xl</option>
                                                    <option value="1">xxl</option>
                                                </select>
                                            </div>
                                            <div class="variants_color">
                                                <h2>color</h2>
                                                <select class="select_option">
                                                    <option selected value="1">purple</option>
                                                    <option value="1">violet</option>
                                                    <option value="1">black</option>
                                                    <option value="1">pink</option>
                                                    <option value="1">orange</option>
                                                </select>
                                            </div>
                                            <div class="modal_add_to_cart">
                                                <form action="#">
                                                    <input min="0" max="100" step="2" value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal_social">
                                            <h2>Share this product</h2>
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal area end-->

        <!--Footer Script-->
        <?php
//    require_once 'footer_script.php';
        $this->load->view('footer_script');
        ?>



    </body>


</html>