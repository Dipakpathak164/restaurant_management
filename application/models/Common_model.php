<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model {

        /** Constructor **/
    function __construct()
        {
            parent::__construct();
        }
    
    public function get_profile($user_id) {
        $this->db->select('id, first_name, last_name, email, username, account_verified, created_on, last_login');
        $this->db->from('users');
        $this->db->where('id', $user_id); // Super Admin has ID = 1 as per migration file
        $this->db->where('active', ACTIVATE); // Ensure Super Admin is active
        $query = $this->db->get();
        return $query->row(); // Return single row as object
    }

    public function get_profile_email($email){
        $this->db->select('*'); // Select all columns from 'users' table
        $this->db->from('users'); // Only fetch data from 'users' table
        $this->db->where('email', $email);
        $data = $this->db->get()->result();
        return $data;
    }
    
    /* User Profile superadmin*/
    function get_user_details($user_id){
        $this->db->select('*,u.account_verified,u.email,u.first_name as first_name,u.last_name as last_name,gp.name as group_name,u.id as user_id,ug.group_id  as role_id');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups gp', 'gp.id = ug.group_id');
        $this->db->where('u.id',$user_id);
        $this->db->where('u.active',ACTIVATE);
        $data = $this->db->get()->row();
        return $data;
 }
    
}
