<!doctype html>
<html class="no-js" lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My Orders - Mob Vision</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="<?php echo base_url(); ?>assets/css/invoice.css" rel="stylesheet" type="text/css"/>-->
    

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
                                <li>My Account</li>
                                <li>My Orders</li>
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
                    <div class="col-sm-12 col-md-9 col-lg-9 ">
                        <div class="row">
                        <p class="col-md-10">View Order Details</p>
                       <div class="pull-right col-md-2">
                           <button class="btn btn-primary" onclick="printDiv('printableArea')">Print Invoice</button>
                       </div>
                        </div>
                    <div class="card-body">                         
                        <div style="border: 1px solid #ddd" >
                                                
<!--<div class="container">
   <div class="col-md-12">
      <div class="invoice">
          begin invoice-company 
         <div class="invoice-company text-inverse f-w-600">
             <b>Mob Vision</b>
             <text><small class="pull-right" style="border: 2px dashed;padding: 2px;"><b>Invoice Number</b> # FAIGZ32200072956</small></text>
         </div>
         <div>
             <address><small><i>
                     <b>Ship-from Address:</b> Warehouse Saidham, G warehouse, At Village - Dohale, Post Padgha,, Opp Vaishnavdevi Mandir, Taluka Bhiwandi, 
                     Dist Thane, Bhiwandi, MAHARASHTRA, India - 421101, IN-MH
                     </i></small>
             </address>
         </div>
          end invoice-company 
          begin invoice-header 
         <div class="invoice-header">
             <div class="invoice-from">
                 <b>Order ID:</b> 3335344645785658<br>
                 <b>Order Date:</b> 07-10-2001<br>
                 <b>Invoice Date:</b> 07-10-2001<br>
                 <b>PAN:</b> AACCSDKA123<br>
            </div>
            <div class="invoice-from">
               <b>Bill To</b>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Jayen Savaliya</strong><br>
                  Street Address
                  City, Zip Code<br>
                  Phone: 992274638928
               </address>
            </div>
            <div class="invoice-to">
               <b>Ship To</b>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Jayen Savaliya</strong><br>
                  Street Address
                  City, Zip Code<br>
                  Phone: 992274638928
               </address>
            </div>
            <div class="invoice-date">
                <small><i>*Keep this invoice and manufacture box for warranty purpose</i></small>
               
            </div>
         </div>
          end invoice-header 
          begin invoice-content 
         <div class="invoice-content">
             begin table-responsive 
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">RATE</th>
                        <th class="text-center" width="10%">HOURS</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Website design &amp; development</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Branding</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">40</td>
                        <td class="text-right">$2,000.00</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Redesign Service</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td>
                     </tr>
                  </tbody>
               </table>
            </div>
             end table-responsive 
             begin invoice-price 
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">$4,500.00</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>PAYPAL FEE (5.4%)</small>
                        <span class="text-inverse">$108.00</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
               </div>
            </div>
<div class="" style="display: flow-root">
               <div class="pull-right">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                         <b>Grand Total</b>&nbsp;&nbsp;&nbsp;
                        <span class="text-inverse"><i class="fa fa-inr" aria-hidden="true"></i>4,500.00</span>
                     </div>
                      <small>Sports Lifestyle Private Limited</small>              
                  </div>
               </div>      
            </div>
<br>
<br>

<div class="">
    <div class="pull-right text-center">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                         
                         <img width="100px" src="<?php echo base_url(); ?>assets/img/logo2/finallogo.png" alt=""/>
                     </div>
                      <small style="color: gray">Thank You</small>
                     
                  </div>
               </div>
               
            </div>
             end invoice-price 
         </div>
          end invoice-content 
          begin invoice-note 
         <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div>
          end invoice-note 
          begin invoice-footer 
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
            </p>
         </div>
          end invoice-footer 
      </div>
   </div>
</div>-->


<div class="wishlist-body-dtt" style="border: 1px solid #ddd;padding: 10px;margin-bottom: 10px;" id="printableArea">
                                            <h3 align="center">Tax Invoice</h3>
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <h5><b>Sold By: Mob Vision</b></h5>
                                                    <p><b>Ship-from Address :</b> Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325, Gujarat. </p>
                                                    <p><b>GSTIN</b> - 27AAKCS9251N1ZK</p>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <span style="border: 1px dotted black; padding: 4px;" ><b>Invoice Number</b> <?php echo $bill_detail->bill_id; ?></span>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p style="margin: 0px;"><b>Order ID : <?php echo $bill_detail->order_id; ?></b></p>
                                                    <p style="margin: 0px;"><b>Order Date :</b> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date));  ?></p>
                                                    <p style="margin: 0px;"><b>Invoice Date :</b> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date)); ?></p>
                                                    <p style="margin: 0px;"><b>PAN :</b> MOB348651561</p>
                                                    
                                                    <?php 
                                                        if($bill_detail->pay_type == "online")
                                                        {
                                                    ?>
                                                    <p style="margin: 0px;"><b>Payment Mode :</b> Online</p>
                                                    <?php
                                                        }
                                                        else
                                                        {    
                                                    ?>
                                                    <p style="margin: 0px;"><b>Payment Mode :</b> Cash On Delievery</p>
                                                    <?php 
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$bill_detail->register_id))[0];
                                                        $ship_info = $this->md->my_select('tbl_shipment','*',array('shipment_id'=>$bill_detail->shipment_id))[0];
                                           
                                                    ?>
                                                    <p style="margin: 0px;"><b>Bill To <?php echo $user_info->name; ?> </b></p>
                                                    <p style="margin: 0px;"><?php echo $ship_info->address; ?>
                                                    </p>
                                                    <p>Phone : <?php echo $user_info->mobile; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p style="margin: 0px;"><b>Ship To <?php echo $ship_info->name; ?> </b></p>
                                                    <p style="margin: 0px;"><?php echo $ship_info->address; ?>
                                                    </p>
                                                    <p>Phone : <?php echo $user_info->mobile; ?></p>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table border="1">
                                                        <thead>
                                                            
                                                            <tr>
                                                                <th style="padding : 10px">No</th>      
                                                                <th style="padding : 10px" >Product</th>
                                                                <th style="padding : 10px">Gross Amount ₹</th>
                                                                <th style="padding : 10px">Discount ₹</th>
                                                                <th style="padding : 10px">Net Price ₹</th>
                                                                <th style="padding : 10px">Qty</th>
                                                                <th style="padding : 10px">Total ₹</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $c=0;
                                                                $w['bill_id'] = $bill_detail->bill_id;
                                                                $trans_detail = $this->md->my_select('tbl_transaction','*',$w);
                                                                foreach($trans_detail as $trans)
                                                                {
                                                                    $c++;
                                                                    $name = $this->md->my_select('tbl_product','*',array('product_id'=>$trans->product_id))[0]->name;
                                                            ?>
                                                            <tr>
                                                                <td style="padding : 10px"><?php echo $c; ?></td>
                                                                <td style="padding : 10px">
                                                                    <?php echo $name; ?>
                                                                </td>
                                                                <td style="padding : 10px">
                                                                    <?php echo $trans->gross_price; ?>
                                                                </td>
                                                                <td style="padding : 10px"><?php echo $trans->discount; ?></td>
                                                                <td style="padding : 10px"><?php echo $trans->net_price; ?></td>
                                                                <td style="padding : 10px"><?php echo $trans->qty; ?></td>
                                                                <td style="padding : 10px"><?php echo $trans->total_price; ?></td>
                                                                
                                                            </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        <hr>
                                                            <tr>
                                                                <td style="padding : 10px"></td>
                                                                <td style="padding : 10px"></td>
                                                                <td style="padding : 10px"></td>
                                                                <td style="padding : 10px"></td>
                                                                <td style="padding : 10px"></td>
                                                                <td style="text-align: right;padding : 10px">
                                                                    <h5>Sub Total : </h5>
                                                                    <h6>+ Shipping Charge :</h6>
                                                                    <?php
                                                                        if($bill_detail->promocode_id > 0)
                                                                        {
                                                                            $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bill_detail->promocode_id))[0];
                                                                    ?>
                                                                    <h6>- Promocode ( <?php echo $promocode->code; ?> ) </h6>
                                                                    <?php 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td style="padding : 10px;">
                                                                    <h5>Rs.<?php  echo $bill_detail->amount; ?>/-</h5>
                                                                    
                                                                    <h5>Rs.100/-</h5>
                                                                    <?php 
                                                                    $amount = 0;
                                                                    if($bill_detail->promocode_id > 0)
                                                                        {
                                                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bill_detail->promocode_id))[0];
                                                                        $amount = $promocode->amount;
                                                                    ?>
                                                                    <h5>Rs.<?php echo $promocode->amount; ?></h5>
                                                                    <?php 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8" align="right">
                                                                    <?php 
                                                                        $gtotal = ($bill_detail->amount + 100 )- $amount;
                                                                    ?>
                                                                    <h5><b>Grand Total : </b>Rs.<?php echo $gtotal; ?>/-</h5>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8" align="right">Mob Vision</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img src="<?php echo base_url();?>assets/images/signature.jpg" style="width: 100px;text-align: left;" alt="signature" align="left" />
                                                </div>
                                                <div class="col-md-12">
                                                    <font>Authorized Signatory</font>
                                                </div>
                                            </div>
                                            <hr/>
                                        </div>

                        </div>
                            


                    </div>
                    
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

        

        
        <!--Footer Script-->
        <?php
//    require_once 'footer_script.php';
        $this->load->view('footer_script');
        ?>
        
        <script type="text/javascript">
           function printDiv(divName) {
                 var printContents = document.getElementById(divName).innerHTML;
                 var originalContents = document.body.innerHTML;

                 document.body.innerHTML = printContents;

                 window.print();

                 document.body.innerHTML = originalContents;
            }
        </script>
        
    </body>


</html>