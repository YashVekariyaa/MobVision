<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
//        offer
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

    public function index() {

        $data = array();

        if ($this->input->post('login')) {
            $email = $this->input->post('email');
            $record = $this->md->my_select('tbl_admin_login', '*', array('email' => $email));
            $count = count($record);
            if ($count == 1) {
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('password') == $original_pass) {
                    if ($this->input->post('svp')) {
                        $expire = 60 * 60 * 24 * 365;
//                      $expire = 60 *1;

                        set_cookie('admin_email', $email, $expire);
                        set_cookie('admin_password', $original_pass, $expire);
                    } else {
                        if ($this->input->cookie('admin_email')) {
                            set_cookie('admin_email', '', -5);
                            set_cookie('admin_password', '', -5);
                        }
                    }
//                  verify detail into session
                    $this->session->set_userdata('admin', $record[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('y-m-d h:i:s'));

                    redirect('admin-home');
                } else {
                    $data['error'] = 'Invalid email or password.';
                }
            } else {
                $data['error'] = 'Invalid email or password.';
            }
        }


        $this->load->view('admin/index', $data);
    }

    public function logout() {
        //lastlogin update
        $wh['admin_id'] = $this->session->userdata('admin');
        $data['last_login'] = $this->session->userdata('admin_lastlogin');

        $this->md->my_update('tbl_admin_login', $data, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-login');
    }

    public function forget_password() {
        $data = $this->md->my_select('tbl_admin_login')[0];
        $email = $data->email;
        $ps = $this->encryption->decrypt($data->password);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'yvekariya8@gmail.com', // change it to yours
            'smtp_pass' => '9081133075', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        //$message = "Hello admin here is your password : $ps."; 
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('yvekariya8@gmail.com'); // change it to yours
        $this->email->to($email); // change it to yours
        $this->email->subject('Password recovery');
        $this->email->message("Hello admin here is your password : $ps");

        if ($this->email->send()) {
            redirect('admin-login/1');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function dashboard() {
        $this->security();
        $this->load->view('admin/dashboard');
    }

    public function manage_contact() {
        $this->security();
        $data = array();
        $data['contact'] = $this->md->my_select('tbl_contact_us', '*');
        $this->load->view('admin/manage_contact', $data);
    }

    public function manage_feedback() {
        $this->security();
        $data = array();
        $data['feedback'] = $this->md->my_select('tbl_feedback', '*');
        $this->load->view('admin/manage_feedback', $data);
    }

    public function manage_email_subscriber() {
        $this->security();
        $data = array();
        
        if($this->input->post('send'))
        {
            $this->form_validation->set_rules('subject','','required',array('required'=>'Subject is required.'));
            $this->form_validation->set_rules('message','','required',array('required'=>'Message is required.'));
            if($this->form_validation->run() == TRUE){
                $count=count($this->input->post('to'));
                
                if($count >0)
                {
                    $to = $this->input->post('to');
                    $subject=$this->input->post('subject');
                    $message=$this->input->post('message');
                    
                    $resulte=$this->md->my_mailer($to,$subject,$message);
                    if($resulte==1)
                    {
                        $data['success']='Email send successfully';
                    }
                    else
                    {
                       $data['error']='Email send successfully'; 
                    }

                }
                else
                {
                    $data['error']='Please select atlest one email.';
                }
            }

        }
        
        $data['email'] = $this->md->my_select('tbl_email_subscriber', '*');
        $this->load->view('admin/manage_email_subscriber',$data);
    }
   
    public function manage_banner() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Title is required.'));
            $this->form_validation->set_rules('subtitle', '', 'required', array('required' => 'Subtitle is required.'));

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './assets/banner/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = "banner_" . time();
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');
                    $ins['path'] = "assets/banner/" . $this->upload->data('file_name');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_banner', $ins);

                    if ($result == 1) {
                        $data['success'] = 'Banner Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }

        $data['banner'] = $this->md->my_select('tbl_banner');
        $this->load->view('admin/manage_banner', $data);
    }

    public function manage_member() {
        $this->security();
        
        $data['member'] = $this->md->my_select('tbl_register');
        $this->load->view('admin/manage_member',$data);
    }

    public function manage_about_us() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('about', '', 'required', array('required' => ' About us is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('about');
                $count = count($this->md->my_query("SELECT * from tbl_about_us WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                   $ins['data'] = $this->input->post('about');
                    $result = $this->md->my_insert('tbl_about_us', $ins);
                    if ($result == 1) {
                        $data['success'] =  'About us added successfully.';
                    }
                } 
            }
        }


        if ($this->uri->segment(2)) {
            $wh['about_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editabout'] = $this->md->my_select('tbl_about_us', '*', $wh);
        }
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('about', '', 'required', array('required' => ' About us is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('about');
                $count = count($this->md->my_query("select * from tbl_about_us WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('about');
                    $result = $this->md->my_update('tbl_about_us', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-about-us');
                    }
                } 
            }
        }
        $data['about'] = $this->md->my_select('tbl_about_us', '*');
        $this->load->view('admin/manage_about_us', $data);
    }

    public function manage_privacy_policy() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('privacy', '', 'required', array('required' => ' Privacy policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('privacy');
                $count = count($this->md->my_query("SELECT * from tbl_privacy_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('privacy');
                    $result = $this->md->my_insert('tbl_privacy_policy', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Privacy policy added successfully.';
                    }
                } else {
                    $data['error'] ='Privacy policy already added.';
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['policy_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editprivacy'] = $this->md->my_select('tbl_privacy_policy', '*', $wh);
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('privacy', '', 'required', array('required' => 'Privacy policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('privacy');
                $count = count($this->md->my_query("select * from tbl_privacy_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('privacy');
                    $result = $this->md->my_update('tbl_privacy_policy', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-privacy-policy');
                    }
                } else {
                    $data['error'] = 'Privacy Policy already added.';
                }
            }
        }

        $data['privacy'] = $this->md->my_select('tbl_privacy_policy', '*');
        $this->load->view('admin/manage_privacy_policy', $data);
    }

    public function manage_return_policy() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('return', '', 'required', array('required' => ' Return policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('return');
                $count = count($this->md->my_query("SELECT * from tbl_return_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('return');
                    $result = $this->md->my_insert('tbl_return_policy', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Return policy added successfully.';
                    }
                } else {
                    $data['error'] = 'Return policy already added.';
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['return_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editreturn'] = $this->md->my_select('tbl_return_policy', '*', $wh);
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('return', '', 'required', array('required' => ' Return policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('return');
                $count = count($this->md->my_query("select * from tbl_return_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('return');
                    $result = $this->md->my_update('tbl_return_policy', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-return-policy');
                    }
                } else {
                    $data['error'] = 'Return Policy already added.';
                }
            }
        }


        $data['return'] = $this->md->my_select('tbl_return_policy', '*');
        $this->load->view('admin/manage_return_policy', $data);
    }

    public function manage_terms_condition() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('term', '', 'required', array('required' => ' Terms and conditions are required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('term');
                $count = count($this->md->my_query("SELECT * from tbl_terms_conditions WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('term');
                    $result = $this->md->my_insert('tbl_terms_conditions', $ins);
                    if ($result == 1) {
                        $data['success'] =  'Terms and Conditions are added successfully.';
                    }
                } else {
                    $data['error'] = 'Terms and Conditions are already added.';
                }
            }
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('term', '', 'required', array('required' => 'Terms and conditions are required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('term');
                $count = count($this->md->my_query("select * from tbl_terms_conditions WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('term');
                    $result = $this->md->my_update('tbl_terms_conditions', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-terms-condition');
                    }
                } else {
                    $data['error'] = 'Terms and conditions are already added.';
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['term_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editterm'] = $this->md->my_select('tbl_terms_conditions', '*', $wh);
        }

        $data['term'] = $this->md->my_select('tbl_terms_conditions', '*');
        $this->load->view('admin/manage_terms_condition', $data);
    }

    public function manage_faqs() {
        $this->security();
        $data = array();
        //click event
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('question', '', 'required|is_unique[tbl_faqs.question]', array('required' => ' Question is required.', 'is_unique' => ' Question is already added.'));
            $this->form_validation->set_rules('answer', '', 'required', array('required' => ' Answer is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_faqs WHERE  question = '" . $question . "' AND answer = '" . $answer . "' "));
                if ($count == 0) {
                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_insert('tbl_faqs', $ins);
                    if ($result == 1) {
                        $data['success'] = 'FAQs added successfully.';
                    }
                } else {
                    $data['error'] = 'FAQs already added.';
                }
            }
        }
        $data['faqs'] = $this->md->my_select('tbl_faqs', '*', array('question', 'answer'));

        // click event of clear
        if ($this->uri->segment(2)) {
            $wh['faqs_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editfaqs'] = $this->md->my_select('tbl_faqs', '*', $wh);
        }

        //Update Record
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('question', '', 'required', array('required' => ' Question is required.'));
            $this->form_validation->set_rules('answer', '', 'required', array('required' => ' Answer is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_faqs WHERE  question = '" . $question . "' AND answer = '" . $answer . "' "));
                if ($count == 0) {
                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_update('tbl_faqs', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-faqs');
                    }
                } else {
                    $data['error'] = 'FAQs already added.';
                }
            }
        }

        $data['faqs'] = $this->md->my_select('tbl_faqs', '*');
        $this->load->view('admin/manage_faqs', $data);
    }

    public function manage_country() {
        $this->security();
        $data = array();

        //insert
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Country name is required.', 'regex_match' => 'Please enter valid country name.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $name = $this->input->post('country');
                $result = $this->md->my_query("select * from tbl_location where name='" . $name . "' and label = 'country'");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = $name . ' already exist.';
                } else {
                    $ins['name'] = $name;
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'country';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $ins['name'] . ' inserted successfully.';
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcountry'] = $this->md->my_select('tbl_location', "*", $wh);
        }
        // edit
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Country name is required.', 'regex_match' => 'Please enter valid country name.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $name = $this->input->post('country');
                $count = count($this->md->my_query("select * from tbl_location where name= '" . $country . "' and label = 'country'"));

                if ($count == 1) {
                    $data['error'] = '$country already exist';
                } else {
                    $ins['name'] = $name;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);

                    if ($result == 1) {
                        redirect('manage-country');
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            } else {
                $data['error'] = 'Enter valid country name.';
            }
        }

        $where['label'] = 'country';
        $data['allcountry'] = $this->md->my_select('tbl_location', '*', $where);
        $this->load->view('admin/manage_country', $data);
    }


    public function manage_state() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required.', 'regex_match' => 'Please enter valid state name.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $country = $this->input->post('country');
                $state = $this->input->post('state');
                $result = $this->md->my_query("select * from tbl_location where name= '" . $state . "' and parent_id = $country ");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = $state . ' already exist.';
                } else {
                    $ins['name'] = $state;
                    $ins['parent_id'] = $country;
                    $ins['label'] = 'state';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $ins['name'] . ' inserted successfully.';
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editstate'] = $this->md->my_select('tbl_location', "*", $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select a country.'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required.', 'regex_match' => 'Please enter valid country name.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $country = $this->input->post('country');
                $state = $this->input->post('state');
                $result = $this->md->my_query("select * from tbl_location where name= '" . $state . "' and parent_id = $country ");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = '$state already exist';
                } else {
                    $ins['name'] = $state;
                    $ins['parent_id'] = $country;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-state');
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            } else {
                $data['error'] = 'Select country name and enter valid state name.';
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_query("select c.name as country, s.* FROM `tbl_location` as c, `tbl_location` as s WHERE c.location_id = s.parent_id and s.label = 'state'");
        $this->load->view('admin/manage_state', $data);
    }

    public function manage_city() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required.', 'regex_match' => 'Please enter valid city.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_location WHERE  name = '" . $city . "' AND parent_id = '" . $state . "' "));
                if ($count == 0) {
                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;
                    $ins['label'] = 'city';
                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $city . ' added successfully.';
                    }
                } else {
                    $data['error'] = $city . ' already exist.';
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcity'] = $this->md->my_select('tbl_location', '*', $wh);
            $data['editstate'] = $this->md->my_select('tbl_location', '*', array('location_id' => $data['editcity'][0]->parent_id));
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required.', 'regex_match' => 'Please enter valid city.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_location WHERE  name = '" . $city . "' AND parent_id = '" . $state . "' "));
                if ($count == 0) {
                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;
                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-city');
                    }
                } else {
                    $data['error'] = $city . ' already added.';
                }
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['city'] = $this->md->my_query("SELECT c.name as country , s.name as state , ct.* FROM `tbl_location` as c , `tbl_location` as s , `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` AND s.`location_id` = ct.`parent_id`;");
        $this->load->view('admin/manage_city', $data);
    }

    public function manage_main_category() {
        $this->security();
        $data = array();

        //insert
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('main', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Main category is required.', 'regex_match' => 'Please enter valid main category name.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $name = $this->input->post('main');
                $result = $this->md->my_query("select * from tbl_category where name='" . $name . "' and label = 'main'");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = $name . ' Already exist.';
                } else {
                    $ins['name'] = $name;
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'main';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $ins['name'] . ' inserted successfully.';
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcate'] = $this->md->my_select('tbl_category', "*", $wh);
        }
        // edit
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('main', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'main category is required.', 'regex_match' => 'Please enter valid main category.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $name = $this->input->post('main');
                $count = count($this->md->my_query("select * from tbl_category where name= '" . $main . "' and label = 'main'"));

                if ($count == 1) {
                    $data['error'] = 'main category already exist.';
                } else {
                    $ins['name'] = $name;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);

                    if ($result == 1) {
                        redirect('manage-main-category');
                    } else {
                        $data['error'] = 'failed to insert' . $ins['name'];
                    }
                }
            } else {
                $data['error'] = 'Enter valid main category.';
            }
        }

        $where['label'] = 'main';
        $data['allcate'] = $this->md->my_select('tbl_category', '*', $where);

        $this->load->view('admin/manage_main_category', $data);
    }

    public function manage_sub_category() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Main category is required.'));
            $this->form_validation->set_rules('sub', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Sub category is required.', 'regex_match' => 'Please enter valid sub category.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $main = $this->input->post('main');
                $sub = $this->input->post('sub');
                $result = $this->md->my_query("select * from tbl_category where name= '" . $sub . "' and parent_id = $main ");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = $sub . ' sub category already exist';
                } else {
                    $ins['name'] = $sub;
                    $ins['parent_id'] = $main;
                    $ins['label'] = 'sub';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $ins['name'] . ' inserted successfully.';
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editsub'] = $this->md->my_select('tbl_category', "*", $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Please select a Main category.'));
            $this->form_validation->set_rules('sub', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Sub category is required.', 'regex_match' => 'Please enter valid sub category.'));

            if ($this->form_validation->run() == true) {
                // unique validation
                $main = $this->input->post('main');
                $sub = $this->input->post('sub');
                $result = $this->md->my_query("select * from tbl_category where name= '" . $sub . "' and parent_id = $main ");
                $rows = count($result);
                if ($rows == 1) {
                    $data['error'] = '$state already exist';
                } else {
                    $ins['name'] = $sub;
                    $ins['parent_id'] = $main;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-sub-category');
                    } else {
                        $data['error'] = 'failed to insert ' . $ins['name'];
                    }
                }
            } else {
                $data['error'] = 'Select country name and enter valid state name.';
            }
        }

        $data['main'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $data['sub'] = $this->md->my_query("select c.name as main, s.* FROM `tbl_category` as c, `tbl_category` as s WHERE c.category_id = s.parent_id and s.label = 'sub'");
        $this->load->view('admin/manage_sub_category', $data);
    }

    public function manage_peta_category() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Main category is required'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Sub category is required'));
            $this->form_validation->set_rules('peta', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Peta category is required', 'regex_match' => 'Please enter valid peta category.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {

                $sub = $this->input->post('sub');
                $peta = $this->input->post('peta');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_category WHERE  name = '" . $peta . "' AND parent_id = '" . $sub . "' "));
                if ($count == 0) {
                    $ins['name'] = $peta;
                    $ins['parent_id'] = $sub;
                    $ins['label'] = 'peta';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $peta . ' added successfully';
                    }
                } else {
                    $data['error'] = $peta . ' already added';
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editpeta'] = $this->md->my_select('tbl_category', '*', $wh);
            $data['editsub'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editpeta'][0]->parent_id));
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Main category is required'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Sub category is required'));
            $this->form_validation->set_rules('peta', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'peta category is required', 'regex_match' => 'Please enter valid peta category.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {

                $sub = $this->input->post('sub');
                $peta = $this->input->post('peta');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_category WHERE  name = '" . $peta . "' AND parent_id = '" . $sub . "' "));
                if ($count == 0) {
                    $ins['name'] = $peta;
                    $ins['parent_id'] = $sub;
                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-peta-category');
                    }
                } else {
                    $data['error'] = $peta . ' already added';
                }
            }
        }

        $data['main'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $data['peta'] = $this->md->my_query("SELECT c.name as main , s.name as sub , ct.* FROM `tbl_category` as c , `tbl_category` as s , `tbl_category` as ct WHERE c.`category_id` = s.`parent_id` AND s.`category_id` = ct.`parent_id`;");
        $this->load->view('admin/manage_peta_category', $data);
    }

    public function manage_add_new_product() {
        $this->security();
        $data = array();
       
//        remove all session
//        $this->session->sess_destroy();
//      
//      submit finish buttion
          if($this->input->post('finish'))
          {
              $wh['product_id'] = $this->session->userdata('last_product');
              $count = count($this->md->my_select('tbl_product_image','*',$wh));
              
              if($count > 0)
              {
                 $this->session->unset_userdata('last_product');
                 $this->session->set_userdata('product_form',1);                 
              }
              else
              {
                  $data['error'] = "You Did't Upload Atleast One Product Image.Please Upload Image to Finish Product Uploading.";
              }
              
          }
          
//         submit cancel uploading
          if($this->input->post('cancel'))
          {
              $wh['product_id'] = $this->session->userdata('last_product');
              
              $this->md->my_delete('tbl_product',$wh);
              $this->md->my_delete('tbl_product_image',$wh);
              
              $this->session->unset_userdata('last_product');
              $this->session->set_userdata('product_form',1);
              
          }
//      
//      set default 1st form
        if(!$this->session->userdata('product_form'))
            {
                $this->session->set_userdata('product_form',1);
            }
        
         if ($this->input->post('next')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Main category is required.'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Sub category is required.'));
            $this->form_validation->set_rules('peta', '', 'required', array('required' => 'Peta category is required.'));
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Product name is required.'));
            $this->form_validation->set_rules('code', '', 'required', array('required' => 'Product code is required.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Product price is required.','numeric'=>'Please enter valid price.'));
            $this->form_validation->set_rules('description', '', 'required', array('required' => 'Description is required.'));
            $this->form_validation->set_rules('specification', '', 'required', array('required' => 'Specification is required.'));
            
            //check - form validation
            if ($this->form_validation->run() == TRUE)
            {  
                $ins['main_id'] = $this->input->post('main');
                $ins['sub_id'] = $this->input->post('sub');
                $ins['peta_id'] = $this->input->post('peta');
                $ins['code'] = $this->input->post('code');
                $ins['name'] = $this->input->post('name');
                $ins['price'] = $this->input->post('price');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 1;
                $ins['offer_id'] = 0;
                
                if(!$this->session->userdata('last_product'))
                {
                    $result = $this->md->my_insert('tbl_product',$ins);
                }
                else
                {
                    $result = $this->md->my_update('tbl_product',$ins,array('product_id'=>$this->session->userdata('last_product')));                    
                }
                
                if($result == 1)
                {
                    $data['success'] = 1;
                    
                    $product_id = $this->md->my_query("SELECT MAX(`product_id`) AS mx FROM `tbl_product`")[0]->mx;                    
                    $this->session->set_userdata('last_product',$product_id);
                    
                    $this->session->set_userdata('product_form',2);
                    
                }    
            }      
         }
       
//         get recent add product detail
          if($this->session->userdata('last_product'))
            {
                $wh['product_id'] = $this->session->userdata('last_product');
                $data['productdetail'] = $this->md->my_select('tbl_product','*',$wh)[0];
            }
         
//         back to 1st form
         if($this->input->post('back'))
            {
                $this->session->set_userdata('product_form',1);
            }
            
        
//         submit add images
          if($this->input->post('add_image'))
          {
            $this->form_validation->set_rules('color', '', 'required', array('required' => 'Please select product color.'));
            $this->form_validation->set_rules('qty', '', 'required|numeric', array('required' => 'Please select product qty.','numeric' => 'Enter valid qty.'));
            
            if($this->form_validation->run() == true)
            {
//               Blank validation
                if(strlen($_FILES['photo']['name'][0]) > 0)
                {
//                   count no of files
                    $count = count($_FILES['photo']['name']);
                    
                    $product_path = "";
                    
//                    access file one by one
                    for($i=0;$i<$count;$i++)
                    {
//                        create single file array one by one
                        $_FILES['single']['name'] = $_FILES['photo']['name'][$i];
                        $_FILES['single']['error'] = $_FILES['photo']['error'][$i];
                        $_FILES['single']['size'] = $_FILES['photo']['size'][$i];
                        $_FILES['single']['type'] = $_FILES['photo']['type'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
                        
//                       create file configuration array and upload it
                            $config['upload_path'] = './assets/products/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['max_size'] = 1024 * 4;
                            $config['file_name'] = "product_" . time();
                            $config['encrypt_name'] = true;

                            $this->load->library('upload', $config);
                            
                            if($this->upload->do_upload('single'))
                            {
                                $path = "assets/products/".$this->upload->data('file_name');
                                $product_path .= $path.",";
                                $photo_success = 1;
                                $data['photo_error'][$i] = "Photo Upload Successfully.";   
                            }
                            else
                            {
                                $data['photo_error'][$i] = $this->upload->display_errors();
                            }

                    }
                    
                    if( isset($photo_success) && $photo_success == 1)
                    {
                        $product_path = rtrim($product_path,",");
                        
//                        store image details
                        $insm['product_id'] = $this->session->userdata('last_product');
                        $insm['color'] = $this->input->post('color');                      
                        $insm['qty'] = $this->input->post('qty');
                        $insm['path'] = $product_path;
                        
                        $result = $this->md->my_insert('tbl_product_image',$insm);
                        
                        if($result == 1)
                        {
                            $data['psuccess'] = "Product images upload successfully.";
                        }
                        
                    }
                    
                }
                else
                {
                    $data['error'] = "Please select atleast one photo.";
                }
            }
          }
          
        
            
        $data['main'] = $this->md->my_select('tbl_category','*',array('label'=>'main'));    
        $this->load->view('admin/manage_add_new_product',$data);
    }
    

    public function manage_view_all_product() {
        $this->security();
        $data = array();
        
        $data['products'] = $this->md->my_query("SELECT * FROM `tbl_product` ORDER BY `product_id` DESC");
        $this->load->view('admin/manage_view_all_product',$data);
    }

    public function manage_product_review() {
        $this->security();    
     
        $data = array();
        $data['review'] = $this->md->my_select('tbl_review');
        $this->load->view('admin/manage_product_review',$data);
    }

    public function manage_offers() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Offer name is required'));
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Rate is required', 'numeric' => 'Enter valid offer date.'));
            $this->form_validation->set_rules('min_price', '', 'required|numeric', array('required' => 'Min price is required', 'numeric' => 'Enter valid minimum price.'));
            $this->form_validation->set_rules('max_price', '', 'required|numeric', array('required' => 'Max price is required', 'numeric' => 'Enter valid maximum price.'));
            $this->form_validation->set_rules('start_date', '', 'required', array('required' => 'Start date is required'));
            $this->form_validation->set_rules('end_date', '', 'required', array('required' => 'End date is required'));

            if ($this->form_validation->run() == true) {
                $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
                if ($start_date < date('Y-m-d')) 
                {
                    $data['start_date_err'] = "Please select valid start date.";
                } 
                else 
                {
                    $end_date = date('Y-m-d', strtotime($this->input->post('end_date')));

                    if ($end_date < $start_date) {
                        $data['end_date_err'] = "Please select valid end date.";
                    } else {
                        $ins['name'] = $this->input->post('name');
                        $ins['rate'] = $this->input->post('rate');
                        $ins['min_price'] = $this->input->post('min_price');
                        $ins['max_price'] = $this->input->post('max_price');
                        $ins['start_date'] = $start_date;
                        $ins['end_date'] = $end_date;

                        if (!$this->input->post('main') && !$this->input->post('sub') && !$this->input->post('peta')) {
                            $ins['category_id'] = 0;
                            $ins['label'] = 'all';
                        } else if ($this->input->post('main') && !$this->input->post('sub') && !$this->input->post('peta')) {
                            $ins['category_id'] = $this->input->post('main');
                            $ins['label'] = 'main';
                        } else if ($this->input->post('main') && $this->input->post('sub') && !$this->input->post('peta')) {
                            $ins['category_id'] = $this->input->post('sub');
                            $ins['label'] = 'sub';
                        } else if ($this->input->post('main') && $this->input->post('sub') && $this->input->post('peta')) {
                            $ins['category_id'] = $this->input->post('peta');
                            $ins['label'] = 'peta';
                        }

                        $result = $this->md->my_insert('tbl_offer', $ins);

                        if ($result == 1) {
                            $data['success'] = "Offer Added Successfully.";
                        }
                    }
                }
            }
        }


        $where['label'] = 'main';
        $data['main'] = $this->md->my_select('tbl_category', '*', $where);
        $data['offer'] = $this->md->my_select('tbl_offer');

        $this->load->view('admin/manage_offers', $data);
    }

    public function manage_promocode() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('code', '', 'required|is_unique[tbl_promocode.code]', array('required' => 'Promo code name is required', 'is_unique' => 'Promo code is alredy added.'));
            $this->form_validation->set_rules('amount', '', 'required|numeric', array('required' => 'Amount is required', 'numeric' => 'Enter valid amount.'));
            $this->form_validation->set_rules('min_bill_price', '', 'required|numeric', array('required' => 'Min price is required', 'numeric' => 'Enter valid minimum bill price.'));

            if ($this->form_validation->run() == true) {


                $ins['code'] = $this->input->post('code');
                $ins['amount'] = $this->input->post('amount');
                $ins['min_bill_price'] = $this->input->post('min_bill_price');
                $ins['status'] = 1;

                $result = $this->md->my_insert('tbl_promocode', $ins);

                if ($result == 1) {
                    $data['success'] = "Promo code Added Successfully.";
                }
            }
        }

        $data['promocode'] = $this->md->my_select('tbl_promocode');
        $this->load->view('admin/manage_promocode', $data);
    }

    public function manage_setting() {
        $this->security();
        $data = array();

        if ($this->input->post('change_profile')) {
            $config['upload_path'] = './admin_assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 2;
            $config['file_name'] = "img_" . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $wh['admin_id'] = $this->session->userdata('admin');
                $path = $this->md->my_select('tbl_admin_login', 'profile_pic', $wh)[0]->profile_pic;
                if (strlen($path) > 0) {
                    unlink("./" . $path);
                }

                $ins['profile_pic'] = "admin_assets/img/" . $this->upload->data('file_name');
                $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                if ($result == 1) {
                    $data['profile_success'] = 'Profile Change Successfully.';
                }
            } else {
                $data['profile_error'] = $this->upload->display_errors();
            }
        }

        if ($this->input->post('change_ps')) {
            $record = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];
            $current_ps = $this->encryption->decrypt($record->password);
//            echo "$current_ps";
//            die();

            if ($current_ps == $this->input->post('ops')) {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 characters.', 'max_length' => 'Enter password between 8-16 characters.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Password does not match.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['admin_id'] = $this->session->userdata('admin');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        $data['ps_success'] = "Password Changed Successfully.";

                        if ($this->input->cookie('admin_password')) {
                            $expire = 60 * 60 * 24 * 365;
                            set_cookie('admin_password', $this->input->post('nps'), $expire);
                        }
                    }
                }
            } else {
                $data['ps_error'] = "Old password does not match.";
            }
        }
        $this->load->view('admin/manage_setting', $data);
    }
    
    
    
    public function delete() {
        $action = $this->uri->segment(2);
        $id = base64_decode(base64_decode($this->uri->segment(3)));
        if ($action == 'country') {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-country');
            } else {
                $this->md->my_truncate('tbl_location');
                redirect('manage-country');
            }
        } elseif ($action == 'main') {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-main-category');
            } else {
                $this->md->my_truncate('tbl_category');
                redirect('manage-main-category');
            }
        } elseif ($action == 'state') {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-state');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'state'));
                redirect('manage-state');
            }
        } elseif ($action == 'sub') {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-sub-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'sub'));
                redirect('manage-sub-category');
            }
        } else if ($action == "about") {
            if ($id > 0) {
                $this->md->my_delete('tbl_about_us', array('about_id' => $id));
                redirect('manage-about-us');
            } else {
                $this->md->my_truncate('tbl_about_us');
                redirect('manage-about-us');
            }
        } else if ($action == "privacy") {
            if ($id > 0) {
                $this->md->my_delete('tbl_privacy_policy', array('policy_id' => $id));
                redirect('manage-privacy-policy');
            } else {
                $this->md->my_truncate('tbl_privacy_policy');
                redirect('manage-privacy-policy');
            }
        } else if ($action == "return") {
            if ($id > 0) {
                $this->md->my_delete('tbl_return_policy', array('return_id' => $id));
                redirect('manage-return-policy');
            } else {
                $this->md->my_truncate('tbl_return_policy');
                redirect('manage-return-policy');
            }
        } else if ($action == "term") {
            if ($id > 0) {
                $this->md->my_delete('tbl_terms_conditions', array('term_id' => $id));
                redirect('manage-terms-condition');
            } else {
                $this->md->my_truncate('tbl_terms_conditions');
                redirect('manage-terms-condition');
            }
        } else if ($action == "faqs") {
            if ($id > 0) {
                $this->md->my_delete('tbl_faqs', array('faqs_id' => $id));
                redirect('manage-faqs');
            } else {
                $this->md->my_truncate('tbl_faqs');
                redirect('manage-faqs');
            }
            
        }
        if($action == "offer")
        {
            $this->md->my_update('tbl_product',array('offer_id'=>0),array('offer_id'=>$id));
            $this->md->my_delete('tbl_offer',array('offer_id'=>$id));
            redirect('manage-offers');

        }
        else if ($action == "city") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-city');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'city'));
                redirect('manage-city');
            }
        } else if ($action == "peta") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-peta-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'peta'));
                redirect('manage-peta-category');
            }
        } else if ($action == "contact") {
            if ($id > 0) {
                $this->md->my_delete('tbl_contact_us', array('contact_id' => $id));
                redirect('manage-contact-us');
            } else {
                $this->md->my_truncate('tbl_contact_us', array('label' => 'contact'));
                redirect('manage-contact-us');
            }
        } else if ($action == "feedback") {
            if ($id > 0) {
                $this->md->my_delete('tbl_feedback', array('feedback_id' => $id));
                redirect('manage-feedback');
            } else {
                $this->md->my_truncate('tbl_feedback', array('label' => 'feedback'));
                redirect('manage-feedback');
            }
        }
        if ($action == 'banner') {
            if ($id > 0) {

                $wh['banner_id'] = $id;
                $path = $this->md->my_select('tbl_banner', 'path', $wh)[0]->path;
                unlink("./" . $path);

                $this->md->my_delete('tbl_banner', $wh);
                redirect('manage-banner');
            } else  {
                $all = $this->md->my_select('tbl_banner');
                foreach ($all as $data) {
                    unlink("./" . $data->path);
                }
                $this->md->my_truncate('tbl_banner');
                redirect('manage-banner');
            }
        }else if ($action == "email") {
            if ($id > 0) {
                $this->md->my_delete('tbl_email_subscriber', array('subscriber_id' => $id));
                redirect('manage-email-subscriber');
            } else {
                $this->md->my_truncate('tbl_email_subscriber');
                redirect('manage-email-subscriber');
            }
        }else if ($action == "wishlist") {
            if ($id > 0) {
                $this->md->my_delete('tbl_wishlist', array('wish_id' => $id));
                redirect('member-wishlist');
            } 
        }else if ($action == "address") {
            if ($id > 0) {
                $this->md->my_delete('tbl_shipment', array('shipment_id' => $id));
                redirect('member-address');
            } 
        }else if ($action == "review") {
            if ($id > 0) {
                $this->md->my_delete('tbl_review', array('review_id' => $id));
                redirect('manage-product-review');
            }  else {
                $this->md->my_truncate('tbl_review');
                redirect('manage-product-review');
            }
        }else if ($action == "reviewm") {
            if ($id > 0) {
                $this->md->my_delete('tbl_review', array('review_id' => $id));
                redirect('member-review');
            } 
        }

    }
    
    public function demo()
    {
        $to=array('yvekariya8@gmail.com','jynsavaliya@gmail.com');
        echo $this->md->my_mailer($to,"demo mail" ,"This mail is sent by my project" );
    }
    
    
    public function manage_pending_orders()
    {
       $data = array(); 
       
       $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>0));
       $this->load->view('admin/manage_pending_orders',$data);

    }
    
    public function manage_confirm_orders()
    {
        $data = array();
        $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>1));
        $this->load->view('admin/manage_confirm_orders',$data);
    }
    
    public function manage_cancel_orders()
    {
        $data = array();
        $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>2));                
        $this->load->view('admin/manage_cancel_orders',$data);
    }

}
