<!--header area start-->

<!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="support_info">
                            <p>Telephone Enquiry: <a href="tel:9081133075">9081133075</a></p>
                        </div>
                        <div class="top_right text-right">
                            <ul>
                                <?php
                                if ($this->session->userdata('member')) {
                                    ?>
                                    <li><a href="<?php echo base_url('member-logout'); ?>"><i class="fa fa-user"></i>&nbsp; Logout </a></li>
                                    <li><a href="<?php echo base_url('member-profile'); ?>"><i class="fa fa-user"></i>&nbsp; My Profile </a></li>
                                        <?php
                                    } else {
                                        ?>
                                    <li><a href="<?php echo base_url('login-register'); ?>"><i class="fa fa-user"></i>&nbsp; Login </a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>"><i class="fa fa-user"></i>&nbsp; Register </a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="search_container">
                            
                                
                                <div class="search_box" style="border: 1px solid lightblue">
                                        <input placeholder="Search product..." onkeypress="search_enter(event);" id="transcript" type="text">
                                        <button type="button"><i class="fa fa-microphone" onclick="startDictation()"></i></button>
                                        
                                    </div>
                                    
                        </div>

                        <div class="middel_right_info">
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
                            <div id="headercart_data">
                                <?php 
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
                                ?>
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a class="<?php if($this->session->userdata('upage') == "home"){echo "active";} ?>" href="<?php echo base_url('home'); ?>">Home</a>
                                    
                                </li>
                                <?php
                                        $main = $this->md->my_select('tbl_category','*',array('label'=>'main'));
                                        foreach($main as $maindata)
                                        {
                                    ?>
                                    
                                <li class="menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>collection/main-collection/<?php echo base64_encode(base64_encode($maindata->category_id)); ?>"><?php echo $maindata->name; ?></a>
                                    <ul class="sub-menu">
                                        <?php 
                                                    $wh['parent_id'] = $maindata->category_id;
                                                    $sub = $this->md->my_select('tbl_category','*',$wh);
                      
                                                    foreach($sub as $subdata)
                                                    {
                                                ?>
                                        <li class="menu-item-has-children">
                                            <a <?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>"><?php echo $subdata->name; ?></a>
                                            <ul class="sub-menu">
                                                <?php 
                                                            $c=0;
                                                            $whe['parent_id'] = $subdata->category_id;
                                                            $peta = $this->md->my_select('tbl_category','*',$whe);
                                                            foreach($peta as $petadata)
                                                            {
                                                                $c++;
                                                                if($c>5)
                                                                {
                                                                    break;
                                                                }
                                                        ?>
                                                <li><a href="<?php echo base_url(); ?>collection/peta-collection/<?php echo base64_encode(base64_encode($petadata->category_id)); ?>"><?php echo $petadata->name; ?></a></li>
                                                
                                                <?php 
                                                            }
                                                ?>
                                                <li><a href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>">View All <?php echo $subdata->name; ?></a></li>
                                            </ul>
                                        </li>
                                        <?php 
                                                    }
                                        ?>
                                        
                                    </ul>
                                </li>
                                
                                <?php
                                        }
                                ?>
                                    <li><a  href="<?php echo base_url(); ?>collection/todays-offer">Today's Offer</a></li>
                                    <li><a class="<?php if($this->session->userdata('upage') == "contact"){echo "active";} ?>" href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>
                 
                            </ul>
                            
                            
                        </div>
                        
                        
                        <div class="Offcanvas_footer">
                            <span><a href="mailto:mobvision752@gmail.com"><i class="fa fa-envelope-o"></i>&nbsp;mobvision752@gmail.com</a></span>
                            <ul>
                                <li class="facebook"><a href="https://www.facebook.com/Mob-Vision-103858612202831" target="_new" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/mob_vision" target="_new" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="https://www.instagram.com/mobvision__/" target="_new" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li class="linkedin"><a href="https://www.linkedin.com/in/mob-vision-84483322b/" title="linkedin" target="_new"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->


<header>
    <div class="main_header">
        <!--header top Laptop Screen start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <!--                    <div class="col-lg-6 col-md-6">
                                            <div class="support_info" style="display:flex">
                                                <p>Telephone Enquiry: <a href="tel:0123456789">0123456789</a></p>
                                            </div>
                                        </div>-->
                    <div class="col-lg-6 col-md-6">
                        <div class="top_left text-left">
                            <p><i class="fa fa-phone"></i> &nbsp; <a href="tel:9081133075">9081133075</a>&nbsp; &nbsp;|&nbsp; &nbsp; <i class="fa fa-envelope"></i> &nbsp; <a href="mailto:mobvision752@gmail.com">mobvision752@gmail.com</a></p>
                        </div>
                        <!--<div id="google_translate_element"></div>-->

                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                <?php
                                if ($this->session->userdata('member')) {
                                    ?>
                                    <li><a href="<?php echo base_url('member-logout'); ?>"><i class="fa fa-user"></i>&nbsp; Logout </a></li>
                                    <li><a href="<?php echo base_url('member-profile'); ?>"><i class="fa fa-user"></i>&nbsp; My Profile </a></li>
                                        <?php
                                    } else {
                                        ?>
                                    <li><a href="<?php echo base_url('login-register'); ?>"><i class="fa fa-user"></i>&nbsp; Login </a></li>
                                    <li><a href="<?php echo base_url('login-register'); ?>"><i class="fa fa-user"></i>&nbsp; Register </a></li>
                                    <?php
                                }
                                ?>
                                    

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->
        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/img/logo2/finallogo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <div class="search_container" >
                                
                                    
<!--                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>-->
                                    
                                    <div class="search_box" style="border: 1px solid lightblue;margin-right: 285px">
                                        <input placeholder="Search product..." onkeypress="search_enter(event);" id="transcript" type="text">
                                        <button type="button"><i class="fa fa-microphone" onclick="startDictation()"></i></button>
                                        
                                    </div>
                                    
                                
                                <script>
                                    function search_enter(event) 
                                    {
                                       var search_value = $("#transcript").val();
                                       
                                       var encoded = encodeURIComponent(search_value).replace(/%20/g, "-");
                                       
                                       if (event.keyCode == 13) 
                                       {
                                          alert(encoded);
                                          
                                          
                                      }
                                    }
                                </script>
                            </div>
                            <div class="middel_right_info">
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
                            </div>
                            <div id="headercart_data">
                                <?php 
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
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        <!--header bottom satrt-->
        <div class="main_menu_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a class="<?php if($this->session->userdata('upage') == "home"){echo "active";} ?>" href="<?php echo base_url('home'); ?>">home</a>                                     
                                    </li>
                                    <?php
                                        $main = $this->md->my_select('tbl_category','*',array('label'=>'main'));
                                        foreach($main as $maindata)
                                        {
                                    ?>
                                    
                                    <li class="mega_items "><a  href="<?php echo base_url(); ?>collection/main-collection/<?php echo base64_encode(base64_encode($maindata->category_id)); ?>"><?php echo $maindata->name; ?><i
                                                class="fa fa-angle-down "></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner" style="display:inline-flex">
                                                <?php 
                                                    $wh['parent_id'] = $maindata->category_id;
                                                    $sub = $this->md->my_select('tbl_category','*',$wh);
                      
                                                    foreach($sub as $subdata)
                                                    {
                                                ?>
                                                <li><a  href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>"><?php echo $subdata->name; ?></a>
                                                    <ul>
                                                        <?php 
                                                            $c=0;
                                                            $whe['parent_id'] = $subdata->category_id;
                                                            $peta = $this->md->my_select('tbl_category','*',$whe);
                                                            foreach($peta as $petadata)
                                                            {
                                                                $c++;
                                                                if($c>5)
                                                                {
                                                                    break;
                                                                }
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>collection/peta-collection/<?php echo base64_encode(base64_encode($petadata->category_id)); ?>"><?php echo $petadata->name; ?></a></li>
                                                        <?php 
                                                            }
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>">View All <?php echo $subdata->name; ?></a></li>

                                                    </ul>
                                                </li>
                                                <?php 
                                                    }
                                                ?>
                                                
                                            </ul>
                                        </div>
                                    </li>
                                    <?php 
                                        }
                                    ?>
                                   
                                    <!--<li><a href="about.html">about Us</a></li>-->
                                    <li><a  href="<?php echo base_url(); ?>collection/todays-offer">Today's Offer</a></li>
                                    <li><a class="<?php if($this->session->userdata('upage') == "contact"){echo "active";} ?>" href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div>
</header>
<!--header area end-->

<!--sticky header area start-->
<div class="sticky_header_area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/img/logo2/finallogo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="sticky_header_right menu_position">
                    <div class="main_menu">
                        <nav>
                                <ul>
                                    <li><a class="<?php if($this->session->userdata('upage') == "home"){echo "active";} ?>" href="<?php echo base_url('home'); ?>">home</a>                                     
                                    </li>
                                    <?php
                                        $main = $this->md->my_select('tbl_category','*',array('label'=>'main'));
                                        foreach($main as $maindata)
                                        {
                                    ?>
                                    
                                    <li class="mega_items"><a  href="<?php echo base_url(); ?>collection/main-collection/<?php echo base64_encode(base64_encode($maindata->category_id)); ?>"><?php echo $maindata->name; ?><i
                                                class="fa fa-angle-down <?php if($this->session->userdata('upage') == "main-collection"){echo "active";} ?>"></i></a>
                                        <div class="mega_menu" >
                                            <ul class="mega_menu_inner" style="display:inline-flex">
                                                <?php 
                                                    $wh['parent_id'] = $maindata->category_id;
                                                    $sub = $this->md->my_select('tbl_category','*',$wh);
                      
                                                    foreach($sub as $subdata)
                                                    {
                                                ?>
                                                <li><a href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>"><?php echo $subdata->name; ?></a>
                                                    <ul>
                                                        <?php 
                                                            $c=0;
                                                            $whe['parent_id'] = $subdata->category_id;
                                                            $peta = $this->md->my_select('tbl_category','*',$whe);
                                                            foreach($peta as $petadata)
                                                            {
                                                                $c++;
                                                                if($c>5)
                                                                {
                                                                    break;
                                                                }
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>collection/peta-collection/<?php echo base64_encode(base64_encode($petadata->category_id)); ?>"><?php echo $petadata->name; ?></a></li>
                                                        <?php 
                                                            }
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($subdata->category_id)); ?>">View All <?php echo $subdata->name; ?></a></li>

                                                    </ul>
                                                </li>
                                                <?php 
                                                    }
                                                ?>
                                                
                                            </ul>
                                        </div>
                                    </li>
                                    <?php 
                                        }
                                    ?>
                                   
                                    <!--<li><a href="about.html">about Us</a></li>-->
                                    <li><a  href="<?php echo base_url(); ?>collection/todays-offer">Today's Offer</a></li>
                                    <li><a class="<?php if($this->session->userdata('upage') == "contact"){echo "active";} ?>" href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>

                                </ul>
                            </nav>
                    </div>
                    <div id="stickey_headercart_data" class="middel_right_info">
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
                                ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--sticky header area end-->