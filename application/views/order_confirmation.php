<?php

$productinfo = "Mob Vision";
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;

//set bill amount
$bill_amount = ($this->session->userdata('bill_amount') + 100);

//check promocode is applied or not
if($this->session->userdata('promocode_id'))
{
    $wh['promocode_id'] = $this->session->userdata('promocode_id');
    $promo_data = $this->md->my_select('tbl_promocode','*',$wh)[0];
    $bill_amount = ($bill_amount - $promo_data->amount);
}

$total = ($bill_amount * 100); //paisa
$amount = $total;
$merchant_order_id = "mob_".date('Y-m-d').time();


//set user info
$member = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member')))[0];

$card_holder_name = $member->name;
$email = $member->email;
$phone = $member->mobile;
$name = APPLICATION_NAME;
$return_url = site_url().'pages/callback';
?>
<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Order Confirmation - Mob Vision</title>
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
        

        <!--Order Success area start-->
        <div class="error_section">
            <form action="" method="post" name="confirmation">
                <?php 
                   if($this->session->userdata('paytype') == "online")
                   {
                ?>
        <div class="container align-items-center">
            <div class="row" >
                <div class="col-md-4 container" style="border:1px solid #ddd;border-radius: 5px">
                    <div class="error_form" style="margin: 22px;" >
                        <div style="animation-delay: 0.75s;" class="animated zoomIn d-flex justify-content-center">
                            <h3 ><b>ORDER <br> CONFIRMATION</b></h3><br>
                        </div><br>
                        <div class="animated flipInX d-flex justify-content-center" style="animation-delay : 2s;">
                        <p>Click On PayNow button for confirm your order with Mob Vision.</p>
                        </div>
                        <div>
                        <a href="<?php echo base_url('checkout') ?>" >Back To Checkout</a>
                        <input  id="submit-pay" type="button" onclick="razorpaySubmit(this);" value="Pay Now" class="button"> 
                        </div>
                    </div>
                </div>
                
            </div>
            <?php 
                   }
                   else if($this->session->userdata('paytype') == "cod")
                   {
                       $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
                    $email = $member->email;
            ?>
            <div class="row" >
                <div class="col-md-4 container" style="border:1px solid #ddd;border-radius: 5px">
                    <div style="margin: 22px;" >
                        <h3 align="center"><b>ORDER <br> CONFIRMATION</b></h3><br>
                        <p>Please Enter One Time Password for confirm order. <b><?php echo $email; ?></b></p>
                        <div>
                            <input class="pull-center form-control" name="otp" type="text" placeholder="Enter Email OTP" >
                        </div>
                        <div>
                            <a class="pull-right" href="<?php echo base_url('resend-otp'); ?>" >Resend Email OTP ?</a>
                        </div>
                        <div class="error_form" style="display:inline-block;">
                            <a href="<?php echo base_url('checkout') ?>" >Back To Checkout</a>
                            <button name="verify" value="yes" class="button">Pay Now</button>
                        </div><br><br>
                        <?php 
                            if(isset($error))
                            {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops! <?php  echo $error; ?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                
            </div>
            <?php 
                   }
            ?>
        </div>
            </form>
            
            <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
            </form>
            
    </div>
        <!--Order Success area end-->
        
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
        
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
          var razorpay_options = {
            key: "<?php echo $key_id; ?>",
            amount: "<?php echo $total; ?>",
            name: "<?php echo $name; ?>",
            description: "Order # <?php echo $merchant_order_id; ?>",
            netbanking: true,
            currency: "<?php echo $currency_code; ?>",
            prefill: {
              name:"<?php echo $card_holder_name; ?>",
              email: "<?php echo $email; ?>",
              contact: "<?php echo $phone; ?>"
            },
            notes: {
              soolegal_order_id: "<?php echo $merchant_order_id; ?>",
            },
            handler: function (transaction) {
                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                document.getElementById('razorpay-form').submit();
            },
            "modal": {
                "ondismiss": function(){
//                    location.reload()
                        window.location = "<?php echo base_url('order-fail'); ?>"
                }
            }
          };
          var razorpay_submit_btn, razorpay_instance;

          function razorpaySubmit(el){
            if(typeof Razorpay == 'undefined'){
              setTimeout(razorpaySubmit, 200);
              if(!razorpay_submit_btn && el){
                razorpay_submit_btn = el;
                el.disabled = true;
                el.value = 'Please wait...';  
              }
            } else {
              if(!razorpay_instance){
                razorpay_instance = new Razorpay(razorpay_options);
                if(razorpay_submit_btn){
                  razorpay_submit_btn.disabled = false;
                  razorpay_submit_btn.value = "Pay Now";
                }
              }
              razorpay_instance.open();
            }
          }  
        </script>



    </body>


</html>