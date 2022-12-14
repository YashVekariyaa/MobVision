<!DOCTYPE html>
<html lang="en">

    <!--Head-->
    <?php
    $this->load->view('admin/head');
    ?>

    <body class="app" >

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
                    <!--<li class="breadcrumb-item"><a href="#" class="text-muted">Ho</a></li>-->
                    <li class="breadcrumb-item active text-" aria-current="page">Dashboard</li>
                </ol>

                

                <div class="row ">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pages</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Contact Us</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $contact = count( $this->md->my_select('tbl_contact_us') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="contact"></h3>
                                                    <a href="<?php echo base_url('manage-contact-us'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Feedback</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $feedback = count( $this->md->my_select('tbl_feedback') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="feedback" ></h3>
                                                    <a href="<?php echo base_url('manage-feedback'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Email Subscriber</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $email = count( $this->md->my_select('tbl_email_subscriber') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="email"></h3>
                                                    <a href="<?php echo base_url('manage-email-subscriber'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Banner</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $banner = count( $this->md->my_select('tbl_banner') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="banner"></h3>
                                                    <a href="<?php echo base_url('manage-banner'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Member</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $member = count( $this->md->my_select('tbl_register') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="member"></h3>
                                                    <a href="<?php echo base_url('manage-member'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>About Us</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $about = count( $this->md->my_select('tbl_about_us') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="about"></h3>
                                                    <a href="<?php echo base_url('manage-about-us'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Privacy Policy</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $privacy = count( $this->md->my_select('tbl_privacy_policy') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="privacy"></h3>
                                                    <a href="<?php echo base_url('manage-privacy-policy'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Return Policy</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $return = count( $this->md->my_select('tbl_return_policy') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="return"></h3>
                                                    <a href="<?php echo base_url('manage-return-policy'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Terms and Conditions</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $terms = count( $this->md->my_select('tbl_terms_conditions') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="terms"></h3>
                                                    <a href="<?php echo base_url('manage-terms-conditions'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>FAQ's</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $faqs = count( $this->md->my_select('tbl_faqs') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="faqs"></h3>
                                                    <a href="<?php echo base_url('manage-faqs'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Locations</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Country</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $country = count( $this->md->my_select('tbl_location','*',array('label'=>'country')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="country" ></h3>
                                                    <a href="<?php echo base_url('manage-country'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>State</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $state = count( $this->md->my_select('tbl_location','*',array('label'=>'state')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="state" ></h3>
                                                    <a href="<?php echo base_url('manage-state'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>City</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $city = count( $this->md->my_select('tbl_location','*',array('label'=>'city')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="city"></h3>
                                                    <a href="<?php echo base_url('manage-city'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>              

                <div class="row ">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Category</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Main Category</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $main = count( $this->md->my_select('tbl_category','*',array('label'=>'main')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="main"></h3>
                                                    <a href="<?php echo base_url('manage-main-category'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Sub Category</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $sub = count( $this->md->my_select('tbl_category','*',array('label'=>'sub')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="sub"></h3>
                                                    <a href="<?php echo base_url('manage-sub-category'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Peta Category</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $peta = count( $this->md->my_select('tbl_category','*',array('label'=>'peta')) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="peta"></h3>
                                                    <a href="<?php echo base_url('manage-peta-category'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Add New Product</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $addproduct = count( $this->md->my_select('tbl_product') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="addproduct"></h3>
                                                    <a href="<?php echo base_url('manage-add-new-product'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>View All Product</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $viewproduct = count( $this->md->my_select('tbl_product_image') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="viewproduct"></h3>
                                                    <a href="<?php echo base_url('manage-view-all-product'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Product Reviews</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $reviewproduct = count( $this->md->my_select('tbl_review') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="reviewproduct"></h3>
                                                    <a href="<?php echo base_url('manage-product-review'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Product Offers</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $productoffer = count( $this->md->my_select('tbl_offer') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="productoffer"></h3>
                                                    <a href="<?php echo base_url('manage-offers'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Promo Code</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $promocode = count( $this->md->my_select('tbl_promocode') );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="promocode"></h3>
                                                    <a href="<?php echo base_url('manage-promocode'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>  

                <div class="row ">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Orders</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Pending Orders</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $porder = count( $this->md->my_select('tbl_bill','*',array('status'=>0)) );
                                                    ?>
                                                    <h3 class="mb-2 text-dark" id="porder"></h3>
                                                    <a href="<?php echo base_url('manage-pending-orders'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Confirm Orders</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $conorder = count( $this->md->my_select('tbl_bill','*',array('status'=>1)) );

                                                    ?>

                                                    <h3 class="mb-2 text-dark" id="conorder"></h3>
                                                    <a href="<?php echo base_url('manage-confirm-orders'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5>Cancel Orders</h5>
                                                <div class="text-center">
                                                    <?php
                                                        $corder = count( $this->md->my_select('tbl_bill','*',array('status'=>2)) );

                                                    ?>

                                                    <h3 class="mb-2 text-dark" id="corder"></h3>
                                                    <a href="<?php echo base_url('manage-cancel-orders'); ?>">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div> 
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
<script type="text/javascript">

set_counter( 'feedback' , <?php echo $feedback; ?> );
set_counter( 'contact' , <?php echo $contact; ?> );
set_counter( 'email' , <?php echo $email; ?> );
set_counter( 'banner' , <?php echo $banner; ?> );
set_counter( 'member' , <?php echo $member; ?> );
set_counter( 'about' , <?php echo $about; ?> );
set_counter( 'privacy' , <?php echo $privacy; ?> );
set_counter( 'return' , <?php echo $return; ?> );
set_counter( 'terms' , <?php echo $terms; ?> );
set_counter( 'faqs' , <?php echo $faqs; ?> );

set_counter( 'addproduct' , <?php echo $addproduct; ?> );
set_counter( 'viewproduct' , <?php echo $viewproduct; ?> );
set_counter( 'reviewproduct' , <?php echo $reviewproduct; ?> );
set_counter( 'productoffer' , <?php echo $productoffer; ?> );
set_counter( 'promocode' , <?php echo $promocode; ?> );

set_counter( 'country' , <?php echo $country; ?> );
set_counter( 'state' , <?php echo $state; ?> );
set_counter( 'city' , <?php echo $city; ?> );

set_counter( 'main' , <?php echo $main; ?> );
set_counter( 'sub' , <?php echo $sub; ?> );
set_counter( 'peta' , <?php echo $peta; ?> );


set_counter( 'porder' , <?php echo $porder; ?> );
set_counter( 'conorder' , <?php echo $conorder; ?> );
set_counter( 'corder' , <?php echo $corder; ?> );

</script>

</body>

</html>