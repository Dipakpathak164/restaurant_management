<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public $company_id;
    public $user_id;
    public $group_id;

    function __construct()
    {
        parent::__construct();

        log_message('dev', '------------------------------------------');
        log_message('dev', '--------------API CALL STARTS-------------');
        log_message('dev', '------------------------------------------');
        logHttpRequests();
        if(EMAIL_ERRORS) {
            set_error_handler('errorHandler');
        }
        $this->company_id = $this->session->userdata('company_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->group_id = $this->session->userdata('user_role_id');

        date_default_timezone_set('Asia/Calcutta');
    }

    function __destruct(){
        log_message('dev', '------------------------------------------');
        log_message('dev', '---------------API CALL ENDS--------------');
        log_message('dev', '------------------------------------------');
    }

    public function job_login(){

        $session_data = array(
            'job_login' => ACTIVATE,
        );
        $this->session->set_userdata($session_data);
    }

    public function emp_login(){

        $this->session->unset_userdata('job_login');
    }

    /*This Function to show admin login page */
    public function login(){
        //check if user already logged in
        // $this->load->view('website/web_header');
        $session_data = $this->session->userdata('is_logged_in') ;
        if(isset($session_data)){

            if ($this->group_id == ADMIN) {
                $url = base_url() . 'Dashboard/restaurants';
            } elseif ($this->group_id == COMPANY_ADMIN) {
                $url = base_url() . 'Dashboard/home';
            } elseif ($this->group_id == USERS) {
                $url = base_url() . 'Dashboard/home';
            } else {
                $url = base_url();
            }

            redirect($url);

        }else{
            $this->load->view('login');
        }
        // $this->load->view('website/web_footer');
    }

    /*Verify Admin login Username and password from this login function */
    public function check_login(){
        $company_url = $this->session->userdata('company_url');
        // Check validation for user input in login form
        $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
        $this->form_validation->set_rules('email', 'Email/Emp-id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //if any error comes while checking validations for admin login
            $this->session->set_flashdata('error_message','Please Check Your Email-id or Password');
            $this->login();

        }else{
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

                $user_detail = $this->Common_model->get_profile_email($username);

                if($user_detail){
                    $status = $this->ion_auth->login($user_detail[0]->id, $password, FALSE);
                }else{
                    $this->session->set_flashdata('error_message','Please Check Login Credentials');

                    $url = base_url() .'login';

                    redirect($url);
                }
            }else{

                $this->session->set_flashdata('error_message', 'Please Check Login Credentials');
                $url = base_url();
                redirect($url);
            }
            if($status){

                // account_verified : 0 means account Deactivated, 1 mean activate account
                $user_detail = $this->Generic_model->getGenericData('users',array('id' => $user_detail[0]->id, 'account_verified' =>1));
                if($user_detail) {
                    $users_groups = $this->Generic_model->getGenericData('users_groups',array('user_id' => $user_detail[0]->id));
                    $user_role = $this->Generic_model->getGenericData('groups',array('id' => $users_groups[0]->group_id));

                    $this->user_id = $user_detail[0]->id;
                    $this->group_id = $user_role[0]->id;

                    //set session data here
                    $session_data = array(
                        'identity' => $username,
                        'auth_token' => $user_detail[0]->auth_token,
                        'nick_name' => $user_detail[0]->first_name,
                        'full_name' => ucwords($user_detail[0]->first_name.' '.$user_detail[0]->last_name),
                        'user_id' => $user_detail[0]->id,
                        'user_role' => $user_role[0]->name,
                        'user_role_id' => $user_role[0]->id,
                        'is_logged_in' => TRUE,
                    );
                    $this->session->set_userdata($session_data);

                    if ($this->group_id == ADMIN) {
                        $url = base_url() . 'Dashboard/restaurant_onboarding';
                    } elseif ($this->group_id == COMPANY_ADMIN) {
                        $url = base_url() . 'Dashboard/home';
                    } elseif ($this->group_id == USERS) {
                        $url = base_url() . 'Dashboard/home';
                    } else {
                        $url = base_url();
                    }

                    redirect($url);

                }else{

                    //Account not active back to login page
                    $errors = 'Account Deactivated';
                    $this->session->set_flashdata('error_message',$errors);
                    $url = base_url() . 'login';
                    redirect($url);

                }

            }else{

                //if wrong username and password send back to login page
                $errors = strip_tags($this->ion_auth->errors());
                $this->session->set_flashdata('error_message',$errors);

                $url = base_url() .'login';

                redirect($url);

            }
        }

    }

    public function password_check($str){
        if (preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)",$str) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $str)) {

            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'Please add 1 Upper Case, 1 Lower Case, 1 Number, 1 Special character for strong password');
            return FALSE;
        }
    }

    //Register
    public function employee_register(){
        //this form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('first_name', 'Name', 'required|min_length[2]|max_length[128]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|max_length[128]|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check|xss_clean');
        $this->form_validation->set_rules('verify_password', 'Confirm password', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $data = array(
                'status' => 205,
                'data' => $errors
            );
        } else {

            $first_name = ucwords($this->input->post('first_name'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $verify_password = $this->input->post('verify_password');

            if ($password != $verify_password) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Do Not Match'
                );
                echo json_encode($data);
                die();
            }

            if(!preg_match('/[A-Z]/', $password)){
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Upper Case'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/[a-z]/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Lower Case'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/\d/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Number'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/[^a-zA-Z\d]/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Special Character'
                );
                echo json_encode($data);
                die();
            }

            //send otp in email of user
            $otp =  mt_rand(1000,9999);

            /*get last generated po id*/
            $last_po = $this->Common_model->last_emp_id();

            /*if user added multiple address then change merchant id*/
            if($last_po){
                if (strpos($last_po[0]->emp_id, 'TJEMP') !== false) {
                    $last_po_number = substr($last_po[0]->emp_id, 5);
                    $new_emp_id = 'TJEMP' . sprintf('%01d', intval($last_po_number) + 1);
                }else{
                    $last_po_number = substr($last_po[0]->emp_id, 3);
                    $new_emp_id = 'TJEMP' . sprintf('%01d', intval($last_po_number) + 1);
                }
            }else{
                $new_emp_id = 'TJEMP1';
            }

            $data = array(
                'first_name' => $first_name,
                'email' => $email,
                'active' => DEACTIVATE,
                'account_verified' => DEACTIVATE,
                'activation_code' =>  $otp,
                'emp_id' =>  $new_emp_id,
                'last_otp' =>  time(),
                'last_login' => time(),
            );

            $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = EMPLOYER));
            if ($status) {

                $email_data = array(
                    'first_name' => $first_name,
                    'otp' => $otp,
                );

                $email_message = $this->load->view('email_templates/verification_email',$email_data,true);

                $subject = WEBSITE_NAME. ' One Time Password ';

                $urls = base_url(). 'Ashynch_task/send_email';
                $param1 = array(
                    'send_to' => $email,
                    'message' => $email_message,
                    'subject' => $subject." | ".date('d-m-y H:i A',time()),
                );
                $this->asynch_task->do_in_background($urls, $param1);


                $data = array(
                    'status' => 200,
                    'data' => 'Please verify with OTP sent on your Email',
                    'user_id' => $status
                );

            } else {
                $errors = strip_tags($this->ion_auth->errors());
                $data = array(
                    'status' => 201,
                    'data' => $errors
                );
            }
        }
        echo json_encode($data);
    }

    //Register
    public function job_seeker_register(){
        //this form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('first_name', 'Name', 'required|min_length[2]|max_length[128]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|max_length[128]|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check|xss_clean');
        $this->form_validation->set_rules('verify_password', 'Confirm password', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $data = array(
                'status' => 205,
                'data' => $errors
            );
        } else {

            $first_name = ucwords($this->input->post('first_name'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $verify_password = $this->input->post('verify_password');

            if ($password != $verify_password) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Do Not Match'
                );
                echo json_encode($data);
                die();
            }

            if(!preg_match('/[A-Z]/', $password)){
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Upper Case'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/[a-z]/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Lower Case'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/\d/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Number'
                );
                echo json_encode($data);
                die();
            } elseif (!preg_match('/[^a-zA-Z\d]/', $password)) {
                $data = array(
                    'status' => 403,
                    'data' => 'Password Requires 1 Special Character'
                );
                echo json_encode($data);
                die();
            }

            //send otp in email of user
            $otp =  mt_rand(1000,9999);

            /*get last generated id*/
            $last_po = $this->Common_model->last_job_id();

            if($last_po){
                if (strpos($last_po[0]->job_seeker_id, 'TJJS') !== false) {
                    $last_po_number = substr($last_po[0]->job_seeker_id, 4);
                    $new_emp_id = 'TJJS' . sprintf('%01d', intval($last_po_number) + 1);
                }else{
                    $last_po_number = substr($last_po[0]->job_seeker_id, 3);
                    $new_emp_id = 'TJJS' . sprintf('%01d', intval($last_po_number) + 1);
                }
            }else{
                $new_emp_id = 'TJJS1';
            }

            $data = array(
                'first_name' => $first_name,
                'email' => $email,
                'active' => DEACTIVATE,
                'account_verified' => DEACTIVATE,
                'activation_code' =>  $otp,
                'job_seeker_id' =>  $new_emp_id,
                'last_otp' =>  time(),
                'last_login' => time(),
            );

            $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = JOB_SEEKER));
            if ($status) {

                $email_data = array(
                    'first_name' => $first_name,
                    'otp' => $otp,
                );

                $email_message = $this->load->view('email_templates/verification_email',$email_data,true);

                $subject = WEBSITE_NAME. ' One Time Password ';

                $urls = base_url(). 'Ashynch_task/send_email';
                $param1 = array(
                    'send_to' => $email,
                    'message' => $email_message,
                    'subject' => $subject." | ".date('d-m-y H:i A',time()),
                );
                $this->asynch_task->do_in_background($urls, $param1);


                $data = array(
                    'status' => 200,
                    'data' => 'Please verify with OTP sent on your Email',
                    'user_id' => $status
                );

            } else {
                $errors = strip_tags($this->ion_auth->errors());
                $data = array(
                    'status' => 201,
                    'data' => $errors
                );
            }
        }
        echo json_encode($data);
    }

    /*Verify OTP*/
    public function verify_otp(){
        $otp = $this->input->post('otp');
        $user_id = $this->input->post('user_id');

        $where = array(
            'id' => $user_id,
            'activation_code' =>  $otp,
        );
        $found =  $this->Generic_model->getGenericData('users',$where);
        if($found) {
            $curDate = time();
            $lastOtp = $found[0]->last_otp;
            $diff = $curDate - $lastOtp;
            $hours = floor($diff / (60 * 60));
            if($hours > 24){
                $data = array(
                    'status' => 206,
                    'data' => 'OTP Expired'
                );
                echo json_encode($data);
            }else {

                $user_detail = $this->Generic_model->getGenericData('users',array('id' => $user_id));

                /*get the Customer template and replace parms with data*/
                $subject = WEBSITE_NAME. ' Account Creation';

                //send email using asynch task
                $email_data = array(
                    'name' => $user_detail[0]->first_name,
                );
                $set_message = $this->load->view('email_templates/register_template', $email_data, true);

                /*send_email($email, $subject, $message);*/

                //send email using asynch task
                $urls = base_url() . 'Ashynch_task/send_email';
                $param1 = array(
                    'send_to' => $user_detail[0]->email,
                    'message' => $set_message,
                    'subject' => $subject,
                );
                $this->asynch_task->do_in_background($urls, $param1);


                $users_groups = $this->Generic_model->getGenericData('users_groups', array('user_id' => $user_detail[0]->id));
                $user_role = $this->Generic_model->getGenericData('groups', array('id' => $users_groups[0]->group_id));

                if ($user_role[0]->id == EMPLOYER) {

                    $update_data = array(
                        'active' => ACTIVATE,
                        'account_verified' => DEACTIVATE,
                    );
                    $where = array(
                        'id' => $user_id
                    );
                    $this->Generic_model->updateGenericData('users', $where, $update_data);

                    //set session data here
                    $session_data = array(
                        'identity' => $user_detail[0]->email,
                        'auth_token' => $user_detail[0]->auth_token,
                        'is_logged_in' => false,
                        'nick_name' => $user_detail[0]->first_name . ' ' . $user_detail[0]->last_name,
                        'full_name' => $user_detail[0]->first_name . ' ' . $user_detail[0]->last_name,
                        'phone_no' => $user_detail[0]->phone,
                        'user_id' => $user_detail[0]->id,
                        'user_role' => $user_role[0]->description,
                        'user_role_id' => $user_role[0]->id,
                        'login_group_id' => $user_role[0]->id,
                    );
                    $this->session->set_userdata($session_data);

                    $url = base_url().'Welcome/employer_after_signup';
                } else {

                    $update_data = array(
                        'active' => ACTIVATE,
                        'account_verified' => ACTIVATE,
                    );
                    $where = array(
                        'id' => $user_id
                    );
                    $this->Generic_model->updateGenericData('users', $where, $update_data);

                    $add_detail = array(
                        'user_id' => $user_id,
                        'profile_title' => '',
                        'profile_summary' => '',
                        'resume' => '',
                        'is_complete' => DEACTIVATE,
                        'creation_time' => time(),
                        'created_by' => $this->user_id,
                        'update_time' => time(),
                        'updated_by' => $this->user_id,
                        'is_active' => ACTIVATE,
                    );
                    $this->Generic_model->addGenericData('job_seeker_profile', $add_detail);


                    //set session data here
                    $session_data = array(
                        'identity' => $user_detail[0]->email,
                        'auth_token' => $user_detail[0]->auth_token,
                        'is_logged_in' => true,
                        'nick_name' => $user_detail[0]->first_name . ' ' . $user_detail[0]->last_name,
                        'full_name' => $user_detail[0]->first_name . ' ' . $user_detail[0]->last_name,
                        'phone_no' => $user_detail[0]->phone,
                        'user_id' => $user_detail[0]->id,
                        'user_role' => $user_role[0]->description,
                        'user_role_id' => $user_role[0]->id,
                        'login_group_id' => $user_role[0]->id,
                    );
                    $this->session->set_userdata($session_data);

                    $url = base_url().'job-seeker-profile';
                }

                $data = array(
                    'status' => 200,
                    'data' => $url
                );
                echo json_encode($data);
            }

        }else {

            $data = array(
                'status' => 403,
                'data' => 'Incorrect OTP'
            );
            echo json_encode($data);
        }
    }

    /*Resend OTP*/
    public function resend_otp(){

        $user_id = $this->input->post('user_id');

        $where = array(
            'id' => $user_id
        );
        $found =  $this->Generic_model->getGenericData('users',$where);

        if($found){

            //send otp in email of user
            $otp =  mt_rand(1000,9999);

            $data = array(
                'activation_code' =>  $otp,
                'last_otp' =>  time()
            );
            $this->Generic_model->updateGenericData('users',array('id' => $found[0]->id),$data);

            $email_data =  array(
                'first_name' => $found[0]->first_name,
                'email' => $found[0]->email,
                'phone' => $found[0]->phone,
                'otp' => $otp,
            );
            $message = $this->load->view('email_templates/verification_email', $email_data, true);

            $subject = WEBSITE_NAME. ' One Time Password ';

            $urls = base_url(). 'Ashynch_task/send_email';
            $param1 = array(
                'send_to' => $found[0]->email,
                'message' => $message,
                'subject' => $subject." | ".date('d-m-y H:i A',time()),
            );
            $this->asynch_task->do_in_background($urls, $param1);

            $data = array(
                'status' => 200,
                'data' => 'Please verify with OTP sent on your Email'
            );
            echo json_encode($data);

        }else{

            $data = array(
                'status' => 403,
                'data' => '* Record Not Exist, Please Check Your Details.'
            );
            echo json_encode($data);
        }


    }

    /*forgot  password*/
    public function forgotPassword(){
        $company_url = $this->session->userdata('company_url');
        $email = $this->input->post('email');
        if($email){

            //send verification email to User
            $basic_info = $this->Generic_model->getGenericData('users', array('email' => $email));
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $basic_info = $this->Common_model->get_profile_email($email,$company_url);
                if(!$basic_info){
                    $data=array('data'=>'Wrong Email Id','status'=>201);
                }
            }else{
                if($company_url) {
                    $basic_info = $this->Common_model->get_profile_emp_id($email, $company_url);
                    if (!$basic_info) {
                        $data=array('data'=>'Wrong Email Id','status'=>201);
                    }
                }else{
                    $data=array('data'=>'Wrong Email Id','status'=>201);
                }
            }

            if($basic_info){
                //generate new password and send email
                $password = random_string('numeric',6);
                $changed = $this->Ion_auth_model->reset_password($basic_info[0]->email , $password);
                if($changed) {

                    $user_detail = $this->Generic_model->getGenericData('users',array('email' => $email));


                    $this->Generic_model->updateGenericData('users', array('email' => $email),array('account_verified' => 1));
                    $get_profile = $this->Common_model->get_profile($basic_info[0]->id);

                    $data['first_name'] = $basic_info[0]->first_name;
                    $data['last_name'] = $basic_info[0]->last_name;
                    $data['email'] = $basic_info[0]->email;
                    $data['password'] = $password;
                    $data['message']='We have received your request to reset your password. Please use below credential to login';
                    $message = $this->load->view('email_templates/forgetPassword', $data, true);

                    $urls = base_url() . 'Ashynch_task/send_email';
                    $param1 = array(
                        'send_to' => $basic_info[0]->email,
                        'message' => $message,
                        'subject' => 'Forgot Password'
                    );
                    $this->asynch_task->do_in_background($urls, $param1);


                    //if email sent successfully
                    $data=array('data'=>'Please check your email, credential sent','status'=>200);
                }else{

                    //if wrong username and password send back to login page
                    $data=array('data'=>'Wrong Email Id','status'=>201);
                }

            }else{

                //if wrong username and password send back to login page
                $data=array('data'=>'Wrong Email Id','status'=>201);
            }
        }else{

            //if wrong username and password send back to login page
            $data=array('data'=>'Wrong Email ID','status'=>201);
        }

        echo json_encode($data);
    }

    /*logout function to exit from website and destroy session data*/
    public function logout(){

        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $url = base_url().'login';
        $this->redirector($url);
    }

    /*check if any users want to do wrong with any wrong url or null url*/
    public function redirector($url = NULL){
        if ($url == NULL) {
            $referrer = $this->agent->referrer();
        } else {
            $referrer = base_url().$url;
        }
        redirect($referrer,'refresh');
    }

}
