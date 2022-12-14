<?php
    if($this->uri->segment(2) == 'main-collection' || $this->uri->segment(2) == 'sub-collection' || $this->uri->segment(2) == 'peta-collection')
    {
        $id  = base64_decode(base64_decode($this->uri->segment(3)));
        $title = $this->md->my_select('tbl_category','*',array('category_id'=>$id))[0]->name;
    }
    else if($this->uri->segment(2) == 'todays-offer')
    {
       $title = "Today's Offer";

    }
    else if($this->uri->segment(2) == 'search')
    {
       $val = str_replace("-", " ", $this->uri->segment(3)); 
       $title = 'Search result for "'.$this->uri->segment(3).'"';

    }
    else
    {
       $title = "All Products";

    }
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title; ?> - Mob Vision</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Header links-->
        <?php
//        require_once 'header_link.php';
        $this->load->view('header_link');
        ?>

    </head>

    <body onload="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');">

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
                                <li>Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--shop  area start-->
        <div class="shop_area shop_reverse mt-60 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <form id="filter-data">
                        <!--sidebar widget start-->
                        <aside class="sidebar_widget">
                            <div class="widget_inner">
                                <div class="widget_list widget_categories">
                                    <?php 
                                        if($this->uri->segment(2) == "")
                                        {
                                           $where['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));

                                    ?>
                                    <h2>Main Categories</h2>
                                    <ul style="height: 100px;overflow-y: scroll;">
                                        <?php
                                          $main = $this->md->my_select('tbl_category','*',$where);

                                            foreach($main as $main_data)
                                            {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>collection/main-collection/<?php echo base64_encode(base64_encode($main_data->category_id)); ?>"><?php echo $main_data->name; ?></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                    <?php 
                                        }
                                        else if($this->uri->segment(2) == "main-collection")
                                        {
                                            $where['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));
                                    ?>
                                    <h2>Sub Categories</h2>
                                    <ul style="height: 100px;overflow-y: scroll;">
                                        <?php
                                            $sub = $this->md->my_select('tbl_category','*',$where);
                                            foreach($sub as $sub_data)
                                            {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>collection/sub-collection/<?php echo base64_encode(base64_encode($sub_data->category_id)); ?>"><?php echo $sub_data->name; ?></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                    <?php 
                                        }
                                        else if($this->uri->segment(2) == "sub-collection")
                                        {
                                         $where['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));

                                    ?>
                                    <h2>Peta Categories</h2>
                                    <ul style="height: 300px;overflow-y: scroll;">
                                        <?php
                                            $peta = $this->md->my_select('tbl_category','*',$where);

                                            foreach($peta as $peta_data)
                                            {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>collection/peta-collection/<?php echo base64_encode(base64_encode($peta_data->category_id)); ?>"><?php echo $peta_data->name; ?></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                    <?php 
                                        }
                                    ?>
                                </div>
                                
                                <div class="widget_list widget_categories">
                                    <h2>Colors</h2>
                                    <ul style="height: 300px;overflow-y: scroll;">
                                        <?php 
                                            $color = $this->md->my_query("SELECT DISTINCT `color` FROM `tbl_product_image`");
                                            foreach($color as $name)
                                            {
                                        ?>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="color[]" value="<?php echo $name->color; ?>"> &nbsp;<?php echo $name->color; ?></label></li>
                                        <?php
                                            }   
                                        ?>
                                    </ul>
                                </div>
                                
                                <!--Price-->
                                <div class="widget_list widget_categories">
                                    <h2>Price</h2>
                                    <ul style="height: 300px;overflow-y: scroll;">
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="0" > &nbsp;Less then 10000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="10000"> &nbsp;10000-20000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="20000"> &nbsp;20000-30000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="30000"> &nbsp;30000-40000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="40000"> &nbsp;40000-50000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="50000"> &nbsp;50000-60000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="60000"> &nbsp;60000-70000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="70000"> &nbsp;70000-80000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="80000"> &nbsp;80000-90000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="90000"> &nbsp;90000-100000</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="price[]" value="100000"> &nbsp;More then 100000</label></li>

                                    </ul>
                                </div>
                                
                                <!--Offers-->
                                <div class="widget_list widget_categories">
                                    <h2>Offer</h2>
                                    <ul style="height: 300px;overflow-y: scroll;">
                                        
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="offer[]" value="1"> &nbsp;In offer</label></li>
                                        <li><label><input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="offer[]" value="0"> &nbsp;Not in offer</label></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <!--sidebar widget end-->
                        </form>
                    </div>
                    <div class="col-lg-9 col-md-12" >
                        <!--shop wrapper start-->
                        <!--shop toolbar start-->
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">

                                <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                        title="3"></button>

<!--                                <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                        title="4"></button>-->

<!--                                <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                        title="List"></button>-->
                            </div>
                            <div class=" ">
                               <!--class="niceselect_option"-->
                               <select class="form-select" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>',this.value)" >

                                        <option value="12" selected="">Show 12 Products</option>
                                        <option value="18">Show 18 Products</option>
                                        <option value="24">Show 24 Products</option>
                                        
                                    </select>
                                
                            </div>
                                  
                        </div>
                        <div id="product-data">
                        <!--shop toolbar end-->
                        
                        </div>
<!--                        <div class="shop_toolbar t_bottom">
                            <div class="pagination">
                                <ul>
                                    
                                    <li class="next current"><a href="#">next</a></li>
                                    
                                </ul>
                            </div>
                        </div>-->
                        <!--shop toolbar end-->
                        <!--shop wrapper end-->
                    </div>
                </div>
            </div>
        </div>
    <!--shop  area end-->
       



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