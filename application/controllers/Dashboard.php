<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public $user_id;
    public $user_role;
    public $role_id;
    public $user_email;
    public $user_name;
    public $nick_name;

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id'); 
        if ($user_id) {
            $profile = $this->Common_model->get_profile($user_id); 
    
            if ($profile) {
                $this->session->set_userdata('profile_variables', $profile);
            }
        }
    }

    /*check if user already logged in or not*/
    private function is_logged_in()
    {
        if (!$this->session->userdata('is_logged_in')) {
            $this->logout();
        }
    }

    public function get_profile($user_id)
    {

        $profile = $this->Common_model->get_profile($user_id);
        if ($profile) {
            $user_data = array(
                'identity' => $profile->email,
                'is_logged_in' => TRUE,
                'nick_name' => $profile->first_name,
                'full_name' => ucwords($profile->first_name . ' ' . $profile->last_name),
                'user_id' => $profile->user_id,
                'user_role' => $profile->group_name,
                'user_role_id' => $profile->role_id,
            );
            $this->session->set_userdata($user_data);
        }

        return $profile;

    }


    /*check if any users want to do wrong with any wrong url or null url*/
    public function redirector($url = NULL)
    {
        //        if ($url == NULL) {
        //            $referrer = $this->agent->referrer();
        //        } else {
        //            $referrer = base_url().$url;
        //        }
        $referrer = base_url() . $url;
        redirect($referrer, 'refresh');
    }

    /*logout function to exit from website and destroy session data*/
    public function logout()
    {

        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $url = "login";
        $this->redirector($url);

    }

    public function permissionDenied()
    {

        $this->load->view('header');
        $this->load->view('user_view/no_access');
        $this->load->view('footer');

    }

    // Function to display customers list
    public function customers_list()
    {
        $data['profile_variables'] = $this->session->userdata('profile_variables');
        // Fetch customers data from the database
        $this->load->view('header');
        $this->load->view('admin/customers_list');
        $this->load->view('admin_footer');
    }
}