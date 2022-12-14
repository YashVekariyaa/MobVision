<div class="dashboard_tab_button">
    <ul class="nav flex-column dashboard-list ">
        <div style="text-align: center;background: #000;color:#fff"><a href="#" class="nav-link-lg col-sm-12 col-md-12" aria-expanded="true">
                <div style="padding-top: 15px;padding-bottom: 15px">
                    <?php
                    $wh['register_id'] = $this->session->userdata('member');
                    $detail = $this->md->my_select('tbl_register', '*', $wh)[0];

                    if (strlen($detail->profile_pic) > 0) {
                        ?> 
                        <img style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;display: block;margin: auto" src="<?php echo base_url($detail->profile_pic); ?>" alt="<?php echo $detail->name; ?>" id="preview" />
                        <?php
                    } else {
                        ?>
                        <img style="width: 100px;height: 100px;object-fit: contain;border-radius: 100%;display: block;margin: auto" src="<?php echo base_url(); ?>admin_assets/img/blank.jpg" alt="profile-user" id="preview">
                        <?php
                    }
                    ?>


                </div>
                <div class="d-sm-none d-lg-inline-block text-center"><?php echo $detail->name; ?>
                    <div style="font-size: 11px;">Last seen: <?php echo date('d-m-Y h:i:s', strtotime($detail->last_login)); ?></div>
                    <div style="font-size: 11px;">Member Since: <?php echo date('d-m-Y ', strtotime($detail->join_date)); ?></div>
                </div>
            </a>
        </div> 
        <li><a href="<?php echo base_url('member-home'); ?>" class="nav-link <?php if($this->session->userdata('mpage') == "dashboard"){echo "active";} ?>">Dashboard</a></li>
        <li><a href="<?php echo base_url('member-profile'); ?>" class="nav-link <?php if($this->session->userdata('mpage') == "profile"){echo "active";} ?>">My Profile</a></li>
        <li><a href="<?php echo base_url('member-address'); ?>"  class="nav-link <?php if($this->session->userdata('mpage') == "address"){echo "active";} ?>">My Address</a></li>
        <li><a href="<?php echo base_url('member-review'); ?>"  class="nav-link <?php if($this->session->userdata('mpage') == "review"){echo "active";} ?>">My Review</a></li>
        <li><a href="<?php echo base_url('member-wishlist'); ?>" class="nav-link <?php if($this->session->userdata('mpage') == "wishlist"){echo "active";} ?>">My Wishlist</a></li>
        <li><a href="<?php echo base_url('member-orders'); ?>" class="nav-link <?php if($this->session->userdata('mpage') == "order"){echo "active";} ?>" >My Orders</a></li>
        <li><a href="<?php echo base_url('member-setting'); ?>" class="nav-link <?php if($this->session->userdata('mpage') == "setting"){echo "active";} ?>">Settings</a></li>
        <li><a href="<?php echo base_url('member-logout'); ?>" class="nav-link">logout</a></li>
    </ul>
</div>
