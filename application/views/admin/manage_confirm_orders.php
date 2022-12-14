<!DOCTYPE html>
<html lang="en">

    <!--Head-->
    <?php
    $this->load->view('admin/head');
    ?>
    <div>
        <div>



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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Orders</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Confirm Orders</a></li>
                    </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View All Confirm Orders    
                                    </h4>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive" >
                                        <table id="example" class="table table-striped table-bordered border-t0   w-100" >
                                            <thead  align="center">
                                                <tr>
                                                    <th class="wd-15p">No</th>
                                                    <th class="wd-15p">Order Detail</th>
                                                    <th class="wd-15p">Product Detail</th>
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


</html>