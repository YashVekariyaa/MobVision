<?php

class Member extends CI_Controller {

    public function __construct()
    {
     parent:: __construct();
     date_default_timezone_set('Asia/Kolkata');
    }
    
    public function logout() {
        //lastlogin update
        $wh['register_id'] = $this->session->userdata('member');
        $data['last_login'] = $this->session->userdata('member_lastlogin');

        $this->md->my_update('tbl_register', $data, $wh);

        $this->session->unset_userdata('member');
        $this->session->unset_userdata('member_lastlogin');

        redirect('login-register');
     }
    
    public function security()
    {
//        echo "<pre>";
//        print_r($this->session->userdata());
//        die();
        
        
        
        if(!$this->session->userdata('member'))
        {
            redirect('login-register');
        }
    }


    public function member_home() {
        $this->security();
        
        $this->session->set_userdata('mpage','dashboard');
        
        
        $this->load->view('member/member_home');
    }
    
    public function member_profile() {
        $this->security();
        $this->session->set_userdata('mpage','profile');
        
        $data = array();
        $wh['register_id'] = $this->session->userdata('member');
        $data['detail'] = $this->md->my_select('tbl_register','*',$wh)[0];

        if($this->input->post('change'))
        {   
            $this->form_validation->set_rules('name','','required|regex_match[/^[a-zA-Z ]+$/]',array('required'=>'Name is required.','regex_match'=>'please enter valid name.'));
            $this->form_validation->set_rules('email','','required|valid_email',array('required'=>'Email is required.','valid_email'=>'please enter valid email.'));
            $this->form_validation->set_rules('mobile','','required|regex_match[/^[0-9]{10}$/]',array('required'=>'mobile number is required.','regex_match'=>'please enter valid mobile number.'));
            $this->form_validation->set_rules('gender','','required',array('required'=>'Please select gender.'));
            $this->form_validation->set_rules('dob','','required',array('required'=>'please select date of birth.'));
            
            if($this->form_validation->run() == true)
            {
//                email
                $old_email = $data['detail']->email;
                $new_email = $this->input->post('email');
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_register` WHERE `email` != '".$old_email."' AND `email` = '".$new_email."';")[0]->cc;
                
               if($count == 0)
               {
//                  date of bith
                   $end_date = date('Y-m-d');
                   if($this->input->post('dob') >= $end_date)
                   {
                       $data['dob_err'] = 'please select valid date.';
                   }
                   else
                    {
                        $path = "";
                        
                        if(strlen($_FILES['photo']['name']) > 0)
                        {
                            $config['upload_path'] = './assets/profile/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['max_size'] = 1024 * 2;
                            $config['file_name'] = "profile_" . time();
                            $config['encrypt_name'] = true;

                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('photo'))
                            {
                                
                                $path = "assets/profile/".$this->upload->data('file_name');
                                
                                $old_path = $data['detail']->profile_pic;
                                if(strlen($old_path))
                                {
                                   unlink("./".$old_path);
                                }
                                
                            }
                            else 
                            {
                                $data['error'] = $this->upload->display_errors();
                            }
                            
                            
                        }
                        
                        $up['name'] = $this->input->post('name');
                        $up['email'] = $this->input->post('email');
                        $up['mobile'] = $this->input->post('mobile');
                        $up['birth_date'] = $this->input->post('dob');
                        $up['gender'] = $this->input->post('gender');
                        
                        if(strlen($path) > 0)
                        {
                            $up['profile_pic'] = $path;
                        }
                        
                        $result = $this->md->my_update('tbl_register',$up,$wh);
                        
                        if($result == 1)
                        {
                            $data['success'] = 'Profile Change Successfully.';
                        }
                    }
               }
               else
               {
                   $data['email_err'] = "email already registed.";
               }
               
            }
            

        }
        
        $data['detail'] = $this->md->my_select('tbl_register','*',$wh)[0];
        
        $this->load->view('member/member_profile',$data);
    }
    
    public function member_address()
    {
       $this->security();
       $data = array();
       $this->session->set_userdata('mpage','address');
       
       $data['country'] = $this->md->my_select('tbl_location','*',array('label'=>'country'));  
       $data['state'] = $this->md->my_select('tbl_location','*',array('label'=>'state')); 
       $data['city'] = $this->md->my_select('tbl_location','*',array('label'=>'city'));  
       
       if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Name is required.'));           
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select country.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select state.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please select city.'));
            $this->form_validation->set_rules('addresstype', '', 'required', array('required' => 'Address type is required.'));
            $this->form_validation->set_rules('address', '', 'required', array('required' => 'Address is required.'));
            
                //check - form validation
            if ($this->form_validation->run() == TRUE) {

               $ins['register_id'] = $this->session->userdata('member');
               $ins['location_id'] = $this->input->post('city');
               $ins['name'] = $this->input->post('name');
               $ins['address'] = $this->input->post('address');
               $ins['address_type'] = $this->input->post('addresstype');
               
               $result = $this->md->my_insert('tbl_shipment',$ins);
               if($result == 1)
               {
                   redirect('member-address');
//                   $data['success'] = "Record insert successfully.";
               }

                
            }
        }
        
        

        

        $wh['regiser_id'] = $this->session->userdata('member');
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['address'] = $this->md->my_select('tbl_shipment','*');     
        $this->load->view('member/member_address',$data);
    }

    
    public function member_setting() {
        $this->security();
       $this->session->set_userdata('mpage','setting');
        
        
        $data = array();
        if ($this->input->post('change_ps')) {
            $record = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
            $current_ps = $this->encryption->decrypt($record->password);
//            echo "$current_ps";
//            die();

            if ($current_ps == $this->input->post('ops'))
            {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 characters.', 'max_length' => 'Enter password between 8-16 characters.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Password does not match.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['register_id'] = $this->session->userdata('member');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_register', $ins, $wh);

                    if ($result == 1) {
                        $data['ps_success'] = "Password Changed Successfully.";

                        if ($this->input->cookie('member_password')) {
                            $expire = 60 * 60 * 24 * 365;
                            set_cookie('member_password', $this->input->post('nps'), $expire);
                        }
                    }
                }
            } else {
                $data['ps_error'] = "Old password does not match.";
            }
        }
        $this->load->view('member/member_setting',$data);
    }
    
    public function member_wishlist() 
    {
        $this->security();
        $data = array();
        $this->session->set_userdata('mpage','wishlist');
        
        
        $wh['register_id'] = $this->session->userdata('member');
        $data['wishlist'] = $this->md->my_select('tbl_wishlist','*',$wh);
        $this->load->view('member/member_wishlist',$data);
    }

    public function member_orders() 
    {
        $this->security();
        $data = array();
        $this->session->set_userdata('mpage','order');

        
        $id = $this->session->userdata('member');
        $data['bill_data'] = $this->md->my_query("SELECT * FROM `tbl_bill` WHERE `register_id` = $id ORDER BY `bill_id` DESC");
        $this->load->view('member/member_orders',$data);
    }
    
    public function member_order_detail() 
    {
        $this->security();
       $data = array();
       
       $wh['bill_id'] = base64_decode(base64_decode($this->uri->segment(2))) ; 
       $data['bill_detail'] = $this->md->my_select('tbl_bill','*',$wh)[0];
       
       
       $this->load->view('member/member_order_detail',$data);
    }

    public function member_review()
    {
        $this->security();
       $data = array(); 
       $this->session->set_userdata('mpage','review'); 
       
       $wh['register_id'] = $this->session->userdata('member');
       $data['review'] = $this->md->my_select('tbl_review','*',$wh);
       $this->load->view('member/member_review',$data);
        
    }
    
} 