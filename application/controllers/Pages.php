<?php  

class Pages extends CI_Controller
{
    public function __construct()
    {
     parent:: __construct();
     date_default_timezone_set('Asia/kolkata');
     
//       offer
        $today = date('Y-m-d');
        $offer = $this->md->my_select('tbl_offer');
        
        foreach ($offer as $data)
        {
//            start offer
              $start_date = $data->start_date;
              
              if($today >= $start_date)
              {
                  $category_id = $data->category_id;
                  $min_price = $data->min_price;
                  $max_price = $data->max_price;

                  $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$data->offer_id));
                  
                  if($data->label == "all")
                  {
                      $wh['price >='] = $min_price;
                      $wh['price <='] = $max_price;
                      
                  }
                  else if($data->label == "main")
                  {
                       $wh['price >='] = $min_price;
                      $wh['price <='] = $max_price;
                      $wh['main_id'] = $category_id;
                  }
                  else if($data->label == "sub")
                  {
                      $wh['price >='] = $min_price;
                      $wh['price <='] = $max_price;
                      $wh['sub_id'] = $category_id;
                  }
                  else if($data->label == "peta")
                  {
                      $wh['price >='] = $min_price;
                      $wh['price <='] = $max_price;
                      $wh['peta_id'] = $category_id;
                  }

                 $this->md->my_update('tbl_product',array('offer_id'=>$data->offer_id),$wh);

              }
            
//            end offer
              $end_date = $data->end_date;
              
              if($today > $end_date)
              {
                $this->md->my_update('tbl_product',array('offer_id'=>0),array('offer_id'=>$data->offer_id));
                $this->md->my_update('tbl_offer',array('status'=>0),array('offer_id'=>$data->offer_id));
              }
        }

    }


    public function index()
    {
       $this->session->set_userdata('upage','home');
 
        
       $this->load->view('index');
    }
    
    public function about_us()
    {
       $data['about'] = $this->md->my_select('tbl_about_us');
       $this->load->view('about_us',$data);
    }
    
    public function privacy_policy()
    {
       $data['privacy'] = $this->md->my_select('tbl_privacy_policy');
       $this->load->view('privacy_policy',$data);
    }
    
    public function return_policy()
    {
       $data['return'] = $this->md->my_select('tbl_return_policy');
       $this->load->view('return_policy',$data);
    }
    
    public function terms_and_conditions()
    {
       $data['terms'] = $this->md->my_select('tbl_terms_conditions');
       $this->load->view('terms_and_conditions',$data);
    }
    
    public function faqs()
    {
       $data['faqs'] = $this->md->my_select('tbl_faqs','*');
       $this->load->view('faqs',$data);
    }
    
    public function contact_us()
    {
       $data = array();
       
       $this->session->set_userdata('upage','contact');


        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter Email', 'valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Phone Number Is Required.', 'regex_match' => 'Please Enter Valid Number.'));
            $this->form_validation->set_rules('subject', '', 'required', array('required' => 'Please Enter Subject.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message'));
            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('mobile');
                $ins['subject'] = $this->input->post('subject');
                $ins['message'] = $this->input->post('message');
                $result = $this->md->my_insert('tbl_contact_us', $ins);

                if ($result == 1) {
                    $data['success'] = " Added Successfully.";
                } else {
                    $data['error'] = "Something Wrong!";
                }
            } else {
                $data['error'] = "Something Wrong!";
            }
        } 
       $this->load->view('contact_us',$data);
    }
    
    public function feedback()
    {
        $data = array();

        if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message'));
            if ($this->form_validation->run() == TRUE)
            {

                $ins['name'] = $this->input->post('name');
                $ins['message'] = $this->input->post('message');
                $result = $this->md->my_insert('tbl_feedback', $ins);

                if ($result == 1)
                {
                    $data['success'] = " Added Successfully.";
                } 
                else 
                {
                    $data['error'] = "Something Wrong!";
                }
            }
            else
            {
                $data['error'] = "Something Wrong!";
            }
        }
       $this->load->view('feedback',$data);
    }
    
    public function login_register()
    {
       $data= array();
       if($this->input->post('register'))
       {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[tbl_register.email]', array('required' => 'Please Enter Email', 'valid_email' => 'Please Enter Valid Email.','is_unique' => 'Please Enter unique Email.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Phone Number Is Required.', 'regex_match' => 'Please Enter Valid Number.'));
            $this->form_validation->set_rules('ps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter Password.','min_length' => 'Please Enter Password between 8-16.','max_length' => 'Please Enter Password between 8-16'));
            $this->form_validation->set_rules('cps', '', 'required|matches[ps]', array('required' => 'Please Enter Password.','matches' => 'Password does not match.'));
                
            if ($this->form_validation->run() == TRUE)
            {
                $ins['name']= $this->input->post('name');
                $ins['email']= $this->input->post('email');
                $ins['mobile']= $this->input->post('mobile');
                $ins['password']= $this->encryption->encrypt($this->input->post('ps'));
                $ins['join_date']= date('Y-m-d');
                $ins['status']= 1;
                
                $result  = $this->md->my_insert('tbl_register',$ins);
                
                if($result == 1)
                {
                    $id = $this->md->my_query("SELECT MAX(`register_id`) AS mx FROM `tbl_register`")[0]->mx;
                    
                    $this->session->set_userdata('member',$id);
                    $this->session->set_userdata('member_lastlogin',date('Y-m-d h:i:s'));
                    
                    
                    redirect('member-home');
                }


                                

            }
       }
       
       if($this->input->post('login'))
       {
            $email = $this->input->post('lemail');
            $record = $this->md->my_select('tbl_register', '*', array('email' => $email));
            $count = count($record);
            if ($count == 1) {
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('lps') == $original_pass) {
//                    verify status
                    if($record[0]->status == 1)
                    {
                         if ($this->input->post('svp')) {
                        $expire = 60 * 60 * 24 * 365;
//                      $expire = 60 *1;

                        set_cookie('member_email', $email, $expire);
                        set_cookie('member_password', $original_pass, $expire);
                    } else {
                        if ($this->input->cookie('member_email')) {
                            set_cookie('member_email', '', -5);
                            set_cookie('member_password', '', -5);
                        }
                    }
//                  verify detail into session
                    $this->session->set_userdata('member', $record[0]->register_id);
                    $this->session->set_userdata('member_lastlogin', date('y-m-d h:i:s'));

                    redirect('member-home');
                    }
                    else
                    {
                        $data['error'] = "Your Account is inactive. please contact admin for activation.. ";
                    }
                    
//                   
                } else {
                    $data['error'] = 'Invalid email or password.';
                }
            } else {
                $data['error'] = 'Invalid email or password.';
            }
       }
       $this->load->view('login_register',$data);
    }
    
    public function forget_password ()
    {
        $data = array();
        if($this->input->post('send'))
        {
            $wh['email'] = $this->input->post('email');
            $record = $this->md->my_select('tbl_register','*',$wh);
            
            if(count($record) > 0)
            {
                
                $ps = $this->encryption->decrypt($record[0]->password);
                
                $name = $record[0]->name;
                $email = $record[0]->email;
                
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
            <td style="padding-right: 0px;padding-left: 0px;" align="center">

              <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636374086763-hero.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>

            </td>
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
            <center><strong>Hello '.$name.',<br/> Your Registered Password is</strong></center>
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
            <strong><span style="text-decoration: underline;">'.$ps.'</span></strong>
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
                  
                $subject = "Password Recovery";
                
                $result =  $this->md->my_mailer($email , $subject , $msg);
                
                if($result == 1)
                {
                    $data['success'] = "Email Send Successfully. Please check your inbox.";
                }
            }
            else
            {
                $data['error'] = 'This email is not registered.';
            }
                    
        }
        
       $this->load->view('forget_password',$data);
    }
    
    
        
    public function collection()
    {
       
        
        
       $this->load->view('collection');
    }
    
    public function product_detail()
    {
        $data = array();
        if(!$this->uri->segment(2))
        {
            redirect('home');
        }
        else
        {
            $id = base64_decode(base64_decode($this->uri->segment(2)));
            
            $wh['product_id'] = $id;
            $data['detail'] = $this->md->my_select('tbl_product','*',$wh)[0];
            
        }
        
       $this->load->view('product_detail',$data);
    }
    
    public function view_cart()
    {
        $data = array();
       if(!$this->session->userdata('member'))
       {
           redirect('login-register');
       }
       
       
       $this->load->view('view_cart',$data);
    }
    
    public function checkout() 
    {
        
       $data = array();
       
//       Check CArt is Empty Or NOt
       $wh['register_id'] = $this->session->userdata('member');
       $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
       
      $cart_items = count($data['cart_data']);
      if($cart_items == 0)
      {
          redirect('view-cart');
      }
      
//      pay button click
       if($this->input->post('pay'))
       {
           if($this->input->post('paytype'))
           {
               $this->session->set_userdata('paytype',$this->input->post('paytype'));
           }
           
           if(!$this->session->userdata('shipment_id'))
           {
               $data['ship_err'] = "Please Select Delivery Location.";
           }
           
           if(!$this->session->userdata('paytype'))
           {
               $data['pay_err'] = "Please Select Payment Mode.";
           }

           if(!isset($data['ship_err'])  && !isset($data['pay_err']))
           {
//               genertate otp for cash on deleviery
                if($this->session->userdata('paytype') == "cod" )
                {
                    $otp = rand(100000 , 999999);
                    $this->session->set_userdata('otp',$otp);
                    $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
                    $email = $member->email;
                    $name = $member->name;
                    $subject = "One Time Password For Order Confirmation.";
//                    $msg = "Hello, $name, Your One Time Password(OTP) for recent order is : $otp ";
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
            <td style="padding-right: 0px;padding-left: 0px;" align="center">

              <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636374086763-hero.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>

            </td>
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
            <center><strong>Hello '.$name.',<br/> Here Is Your One Time Password(OTP)</strong></center>
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
            <strong><span style="text-decoration: underline;">'.$otp.'</span></strong>
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
                    $this->md->my_mailer($email , $subject , $msg );
                    
                }
                
                redirect('order-confirmation');
                
           }

       }
       $this->load->view('checkout',$data);
    }
    
    public function order_success() 
    {
       $data = array();
      
//      Check CArt is Empty Or NOt
       $wh['register_id'] = $this->session->userdata('member');
       $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);       
       $cart_items = count($data['cart_data']);
        if($cart_items == 0)
      {
          redirect('view-cart');
      }  
        
        
//     check order sucess or not
       if($this->session->userdata('status') != 1)
        {
            redirect('order-fail');
        }
        else
        {
                
//            generate bill
            $ins['register_id'] = $this->session->userdata('member');
            $ins['shipment_id'] = $this->session->userdata('shipment_id');
            if($this->session->userdata('promocode_id'))
            {
               $ins['promocode_id'] = $this->session->userdata('promocode_id');
            }
            else
            {
               $ins['promocode_id'] = 0;                
            }
            
            $ins['bill_date'] = date('Y-m-d');
            $ins['amount'] = $this->session->userdata('bill_amount');
            
            $ins['pay_type'] = $this->session->userdata('paytype');
            
            if($this->session->userdata('paytype') == "online")
            {
               $ins['payment_id'] = $this->session->userdata('razorpay_payment_id');
               $ins['order_id'] = $this->session->userdata('merchant_order_id');               
            }
            else
            {
               $ins['payment_id'] = ''; 
               $ins['order_id'] = "mob_".date('Y-m-d').time();                               
            }
            $ins['status'] = 0;
            
            $result = $this->md->my_insert('tbl_bill',$ins);
            if($result == 1)
            {
                $bill_id = $this->md->my_query("SELECT MAX(`bill_id`) as mx FROM `tbl_bill`")[0]->mx;
                
                $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('member')));
                foreach ($cartdata as $item)
                {
//                  store data into transaction
                    $ins2['bill_id'] = $bill_id;
                    $ins2['product_id'] = $item->product_id;
                    $ins2['image_id'] = $item->image_id;
                    $ins2['gross_price'] = $item->gross_price;
                    $ins2['discount'] = $item->discount;
                    $ins2['net_price'] = $item->net_price;
                    $ins2['qty'] = $item->qty;
                    $ins2['total_price'] = $item->total_price;
                    
                    $this->md->my_insert('tbl_transaction',$ins2);
                            
//                    get quantity
                      $old_qty = $this->md->my_select("tbl_product_image",'*',array('image_id'=>$item->image_id))[0]->qty;
                    
//                    update quantity
                      $qty = $item->qty;
                      $current_qty = $item->qty;
                      $new_qty = $old_qty - $current_qty;
                      
                      $this->md->my_update('tbl_product_image',array('qty'=>$new_qty),array('image_id'=>$item->image_id));
                              
//                    remove data from cart
                      $this->md->my_delete('tbl_cart',array('cart_id'=>$item->cart_id));       
                              
                      
                        
                }
            }
        }
        
        if($this->session->userdata('paytype') == "online")
        {
            $data['payment_id'] = $this->session->userdata('razorpay_payment_id');            
        }
        $data['order_id'] = $ins['order_id'];               
        $data['paytype'] = $this->session->userdata('paytype');
        
//        unset unnessasary session
         $this->session->unset_userdata('bill_amount');
         $this->session->unset_userdata('shipment_id');
         $this->session->unset_userdata('paytype');
         $this->session->unset_userdata('promocode_id');
         $this->session->unset_userdata('razorpay_payment_id');
         $this->session->unset_userdata('merchant_order_id');
         $this->session->unset_userdata('status');
         
       $this->load->view('order_success',$data);
    }
    
    public function order_fail() 
    {
        $data = array();
        
        
//       Check CArt is Empty Or NOt
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);

        $cart_items = count($data['cart_data']);
        if($cart_items == 0)
        {
            redirect('view-cart');
        }
        
        
        if($this->session->userdata('status') == 1)
        {
            redirect('order-success');
        }
        else
        {

            $data['razorpay_payment_id'] =  $this->session->userdata('razorpay_payment_id');
            $data['merchant_order_id'] =  $this->session->userdata('merchant_order_id');

        }
        
       $this->load->view('order_fail',$data);
    }
    
    public function order_confirmation() 
    {
        $data = array();
        
       
        
//      Check CArt is Empty Or NOt
       $wh['register_id'] = $this->session->userdata('member');
       $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
       
      $cart_items = count($data['cart_data']);
      if($cart_items == 0)
      {
          redirect('view-cart');
      }
//        cod verify
        if($this->input->post('verify'))
        {
            $send_otp = $this->session->userdata('otp');
            $user_otp = $this->input->post('otp');
            
            if($user_otp == $send_otp)
            {
               $this->session->unset_userdata('otp');
               
               $this->session->set_userdata('status',1);
               
               redirect('order-success');                
            }
            else
            {
                $data['error'] = "OTP Not Match.";
            }
        }
      
//      razorpay parameter
        $data['return_url'] = site_url().'pages/callback';
        $data['surl'] = site_url('order-success');
        $data['furl'] = site_url('order-fail');
        $data['currency_code'] = 'INR';
      
       $this->load->view('order_confirmation',$data);
    }


    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() 
    {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id')))
        {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            
//            set id in session
            $this->session->set_userdata('razorpay_payment_id',$this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id',$this->input->post('merchant_order_id'));
            
            
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
//                check success or not
                if($http_status == 0)
                {
                    $this->session->set_userdata('status',1);
                }
                else
                {
                    $this->session->set_userdata('status',0);
                }
                
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                   // echo "<pre>";print_r($response_array);exit;
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
        
    
    public function resend_otp() 
    {
        if(!$this->session->userdata('member'))
        {
            redirect('login-register');
            
        }
        
//        Check CArt is Empty Or NOt
        $wh['register_id'] = $this->session->userdata('member');
       $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
       
        $cart_items = count($data['cart_data']);
        if($cart_items == 0)
        {
            redirect('view-cart');
        }
        
//        generate otp and send mail
        $otp = rand(100000 , 999999);
                    $this->session->set_userdata('otp',$otp);
                    $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
                    $email = $member->email;
                    $name = $member->name;
                    $subject = "One Time Password For Order Confirmation.";
//                  $msg = "Hello, $name, Your One Time Password(OTP) for recent order is : $otp ";
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
            <td style="padding-right: 0px;padding-left: 0px;" align="center">

              <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636374086763-hero.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>

            </td>
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
            <center><strong>Hello '.$name.',<br/> Here Is Your One Time Password(OTP)</strong></center>
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
            <strong><span style="text-decoration: underline;">'.$otp.'</span></strong>
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
                    $this->md->my_mailer($email , $subject , $msg );
                    
                    redirect('order-confirmation');
                    
    }
    
    public function page_not_found()
    {
        $this->load->view('page_not_found');
    }

}


