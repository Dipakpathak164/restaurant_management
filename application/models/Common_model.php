<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{

    /** Constructor **/
    function __construct()
    {
        parent::__construct();
    }

     /* User Profile */
    function get_profile($user_id){
        $this->db->select('u.account_verified,u.phone as user_phone,u.email as user_email,u.first_name as first_name,u.last_name as last_name,gp.name as group_name,u.id as user_id,u.auth_token,ug.group_id as role_id');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups gp', 'gp.id = ug.group_id');
        $this->db->where('u.id',$user_id);
        $this->db->where('u.active',ACTIVATE);
        $data = $this->db->get()->row();
        return $data;
    }

    function emp_detail($user_id){
        $this->db->select('cu.emp_job_title_id,cu.emp_grade_id,u.employee_id,er.role_name,ol.location_name,d.department_name,c.current_cycle_id AS current_cycle_id,c.company_id AS company_id,c.comp_color AS comp_color,c.comp_name AS comp_name,c.comp_logo AS comp_logo,u.account_verified,u.phone as user_phone,u.email as user_email,u.first_name as first_name,u.last_name as last_name,u.user_profile,gp.name as group_name,u.id as user_id,ug.group_id  as role_id');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('company_users cu', 'cu.user_id = u.id');
        $this->db->join('company c', 'c.company_id = cu.company_id');
        $this->db->join('groups gp', 'gp.id = ug.group_id');
        $this->db->join('department d', 'd.department_id = u.department_id','left');
        $this->db->join('emp_roles er', 'er.emp_roles_id = u.emp_roles_id','left');
        $this->db->join('office_location ol', 'ol.office_location_id = u.office_location_id','left');
        $this->db->where('u.id',$user_id);
        $this->db->where('cu.is_active',ACTIVATE);
        $data = $this->db->get()->result();
        return $data;
    }

    function get_profile_email($email){
        $this->db->select('*,u.id AS id');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id','left');
        $this->db->join('groups gp', 'gp.id = ug.group_id');
        $this->db->where('u.email',$email);
        $data = $this->db->get()->result();
        return $data;
    }

    function get_profile_emp_id($emp_id){
        $this->db->select('*,u.id AS id');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id','left');
        $this->db->join('groups gp', 'gp.id = ug.group_id');
        $this->db->where('u.employee_id',$emp_id);
        $data = $this->db->get()->result();
        return $data;
    }

    function get_employee($user_id){
        $this->db->select('*,u.id AS user_id,u.account_verified');
        $this->db->from('users u');
        $this->db->where('u.id',$user_id);
        $data = $this->db->get()->row();
        return $data;
    }

    /* User Profile superadmin*/
    function get_user_details($user_id){
           $this->db->select('*,u.profile_img, u.city_id, u.state_id, u.country_id, u.phone, u.account_verified,u.email,u.first_name as first_name,u.last_name as last_name,gp.name as group_name,u.id as user_id,ug.group_id  as role_id');
           $this->db->from('users u');
           $this->db->join('users_groups ug', 'ug.user_id = u.id');
           $this->db->join('groups gp', 'gp.id = ug.group_id');
           $this->db->where('u.id',$user_id);
           $this->db->where('u.active',ACTIVATE);
           $data = $this->db->get()->row();
           return $data;
    }
   /*=========Blogs==============*/

    /*get all get Blog List */
    function getAllBlogCount($searchData = null,$searchStatus = null){
        $this->db->select('*,bg.is_active as is_active,bg.updation_time as updation_time');
        $this->db->from('blogs bg');
        $this->db->join('category c', 'c.category_id=bg.category_id','left');
        $this->db->join('users u', 'u.id=bg.updated_by');
        if($searchData){
            $this->db->where("(`bg.blog_title` LIKE '%$searchData%' OR `bg.blog_description` LIKE '%$searchData%')");
        }
        if($searchStatus){
            $this->db->where('bg.is_active',$searchStatus);
        }else{
            $this->db->where('bg.is_active',ACTIVATE);
        }
        $this->db->where('bg.is_active',ACTIVATE);

        return $this->db->get()->num_rows();
    }

    /*get all get Blog List */
    function getAllBlogList($searchData,$searchStatus,$limit,$offset){
        $this->db->select('*,bg.is_active as is_active,bg.updation_time as updation_time,bg.creation_time as creation_time');
        $this->db->from('blogs bg');
        $this->db->join('category c', 'c.category_id=bg.category_id','left');
        $this->db->join('users u', 'u.id=bg.updated_by');
        if($searchData){
            $this->db->where("(`bg.blog_title` LIKE '%$searchData%' OR `bg.blog_description` LIKE '%$searchData%')");
        }
        if($searchStatus){
            $this->db->where('bg.is_active',$searchStatus);
        }else{
            $this->db->where('bg.is_active ',ACTIVATE);
        }
        $this->db->where('bg.is_active ',ACTIVATE);
        $this->db->order_by('bg.blog_id ','DESC');

        if($limit){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();
    }

    /*get all Category*/
    function getAllCategoryCount($searchData = null){
        $this->db->select('c.category_id');
        $this->db->from('category c');
        if($searchData){
            $this->db->where("(`c.category_name` LIKE '%$searchData%')");
        }
        $this->db->where('c.is_active',ACTIVATE);

        return $this->db->get()->num_rows();
    }

    /*get all get Blog List */
    function getAllCategoryList($searchData,$limit,$offset){
        $this->db->select('*');
        $this->db->from('category c');
        if($searchData){
            $this->db->where("(`c.category_name` LIKE '%$searchData%')");
        }
        $this->db->limit($limit,$offset);
        $this->db->order_by('c.category_id ','DESC');
        $this->db->where('c.is_active ',ACTIVATE);
        return $this->db->get()->result();
    }

    /*get all get Blog List */
    function getAllBlogListSearch($searchData,$searchStatus,$category_id,$date_range){
        $this->db->select('*,bg.is_active as is_active,bg.updation_time as updation_time');
        $this->db->from('blogs bg');
        $this->db->join('category c', 'c.category_id=bg.category_id','left');
        $this->db->join('users u', 'u.id=bg.updated_by');
        if($searchData){
            $this->db->where("(`bg.blog_title` LIKE '%$searchData%' OR `bg.blog_description` LIKE '%$searchData%')");
        }if($searchStatus){
            $this->db->where('bg.is_active',$searchStatus);
        }else{
            $this->db->where('bg.is_active ',ACTIVATE);
        }
        if($category_id){
            $this->db->where('bg.category_id',$category_id);
        }
        if($date_range){
            $date_from =  substr($date_range, 0, -13);
            $date_to =  substr($date_range, -10, 13);

            $from=strtotime(date('d-m-Y 00:00:00',strtotime($date_from)));
            $this->db->where('bg.creation_time >=',$from);

            $to=strtotime(date('d-m-Y 23:59:59',strtotime($date_to)));
            $this->db->where('bg.creation_time <=',$to);

        }
        $this->db->order_by('bg.blog_id ','DESC');
        return $this->db->get()->result();
    }

    /*get recent 4 Blogs List */
    function get_recent_blogs($blog_id,$limit,$offset){
        $this->db->select('bg.blog_id,bg.blog_title,bg.blog_url,bg.blog_image,');
        $this->db->from('blogs bg');
        $this->db->where('bg.is_active',ACTIVATE);
        $this->db->where('bg.blog_id !=',$blog_id);
        $this->db->order_by('bg.blog_id ','DESC');

        if($limit){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();
    }

    /*get recent home blogs List */
    function get_home_blogs(){
        $this->db->select('bg.blog_id,bg.blog_title,bg.blog_url,bg.blog_description,bg.blog_image,c.category_name,bg.creation_time');
        $this->db->from('blogs bg');
        $this->db->join('category c', 'c.category_id=bg.category_id','left');
        $this->db->where('bg.is_active',ACTIVATE);
        $this->db->order_by('bg.blog_id ','DESC');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    /*=========Blogs END==============*/

    function alphabetic_states($country_id){
        $this->db->select('*');
        $this->db->from('state s');
        $this->db->where('s.country_id', $country_id);
        $this->db->order_by('s.state_name','ASC');
        return $this->db->get()->result();
    }

    function alphabetic_cities($state_id){
        $this->db->select('*');
        $this->db->from('city c');
        $this->db->where('c.state_id', $state_id);
        $this->db->order_by('c.city_name','ASC');
        //$this->db->where('c.is_active', DEACTIVATE);

        return $this->db->get()->result();
    }

    /* Get total count of restaurants */
    function getAllRestaurantCount($searchData = null) {
        $this->db->select('r.restaurant_id');
        $this->db->from('restaurants r');
        if ($searchData) {
            $this->db->where("(`r.restaurant_name` LIKE '%$searchData%' OR `r.restaurant_code` LIKE '%$searchData%')");
        }
         $this->db->where('r.is_active', ACTIVATE);

        return $this->db->get()->num_rows();
     }

/* Get all restaurants list with pagination */
     function getAllRestaurantList($searchData, $limit, $offset) {
         $this->db->select('*');
         $this->db->from('restaurants r');
        if ($searchData) {
            $this->db->where("(`r.restaurant_name` LIKE '%$searchData%' OR `r.restaurant_code` LIKE '%$searchData%')");
        }
         $this->db->limit($limit, $offset);
         $this->db->order_by('r.restaurant_id', 'DESC');
         $this->db->where('r.is_active', ACTIVATE);
        return $this->db->get()->result();
}














public function get_companies() {
    $this->db->select('company_id, company_name');
    $this->db->from('company');
    $this->db->where('is_active', ACTIVATE);

    $query = $this->db->get();
    return $query->result_array();
}

public function get_restaurants_by_company($company_id) {
    $this->db->select('restaurant_details_id, restaurant_name');
    $this->db->from('restaurant_details');
    $this->db->where('company_id', $company_id);
    // $this->db->where('is_active', ACTIVATE);
    // $this->db->where('is_published', ACTIVATE);


    $query = $this->db->get();
    return $query->result_array();
}

// public function get_restaurant


public function insert_user($data) {
    return $this->db->insert('company_users', $data);
}

public function get_company_id_by_user($user_id) {
    $this->db->select('company_id');
    $this->db->from('company_users');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row()->company_id;
    }
    return null; // If no company is found for the user
}


public function get_users_by_company_and_group($company_id) {
    $this->db->select('users.*, company.company_name');
    $this->db->from('users');
    $this->db->join('company_users', 'company_users.user_id = users.id', 'left');
    $this->db->join('company', 'company.company_id = company_users.company_id', 'left');
    $this->db->where('company_users.company_id', $company_id);
    $this->db->where('users.id IN (SELECT user_id FROM users_groups WHERE group_id = 3)');
    
    $query = $this->db->get();
    return $query->result_array();
}




// public function get_company() {
//     $this->db->select('co.comp_onboarding_id, co.first_name, co.last_name, co.email, co.phone_number, co.company_name, 
//                        co.restaurant_count,co.update_time, cu.user_id, u.first_name as user_first_name, u.last_name as user_last_name,
//                        u.email as user_email, u.phone as user_phone,u.active');
//     $this->db->from('comp_onboarding co');
    
//     $this->db->join('company_users cu', 'co.comp_onboarding_id = cu.company_id', 'left');
    
//     $this->db->join('users u', 'cu.user_id = u.id', 'left');
    
//     $this->db->join('users_groups ug', 'u.id = ug.user_id', 'left');
//     $this->db->where('ug.group_id', 2);  
    
//     $query = $this->db->get();
    
//     if ($query->num_rows() > 0) {
//         return $query->result();  // Return all results as an array of objects
//     } else {
//         return false;  // No companies found
//     }
// }

public function get_company() {
    $this->db->select('co.comp_onboarding_id, co.first_name, co.last_name, co.email, co.phone_number, co.company_name, 
                       co.restaurant_count,co.update_time,co.is_active');
    $this->db->from('comp_onboarding co');
    
    
    $this->db->where('co.is_published', 1);  
    
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->result();  // Return all results as an array of objects
    } else {
        return false;  // No companies found
    }
}


public function deactivate_company($company_id, $updated_by) {
    $data = [
        'is_active' => 0,                 
       
    ];

    $this->db->where('comp_onboarding_id', $company_id);
    return $this->db->update('comp_onboarding', $data);  

}

public function deactivate_company_and_users($company_id, $updated_by) {
    // Step 1: Get all user_ids for the given company_id from the company_users table
    $this->db->select('user_id');
    $this->db->from('company_users');
    $this->db->where('company_id', $company_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $user_ids = array_column($query->result_array(), 'user_id');

        foreach ($user_ids as $user_id) {
            $this->deactivate_user($user_id, $updated_by);
        }
    }


    return true;
}





public function deactivate_user($user_id) {
    $data = [
        'active' => 0,                 
       
    ];

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);  
}

public function insertData($data)
{
    $data = array_map(function($value) {
        return ($value === null) ? '' : $value;
    }, $data);

    $this->db->insert('company_onboarding', $data);
}








// report expense /////////////////////////////////



    // Get all report expenses
    public function get_report_expenses()
    {
        $query = $this->db->get('report_expense');
        return $query->result_array();
    }

    // Get a single report expense by ID
    public function get_report_expense($id)
    {
        $query = $this->db->get_where('report_expense', array('id' => $id));
        return $query->row_array();
    }

    // Update report expense by ID
    public function update_report_expense($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('report_expense', $data);
    }

    // Delete report expense by ID
    public function delete_report_expense($id)
    {
        return $this->db->delete('report_expense', array('id' => $id));
    }

    public function get_onboardings() {    
        $this->db->where('is_active', 1);
        $this->db->where('is_published', 0);

        $query = $this->db->get('comp_onboarding'); 
    
        return $query->result(); 
    }



    public function insert_report_expense($data)
    {
        $this->db->insert('report_expense', $data);
        return $this->db->insert_id();  // Return the report_expense_id
    }

    public function insert_invoice($data)
    {
        $data['expense_id'] = $this->db->insert_id(); // Add the report_expense_id for the relationship
        $this->db->insert('invoice', $data);
    }

    public function insert_salary($data)
    {
        $data['expense_id'] = $this->db->insert_id(); // Add the report_expense_id for the relationship
        $this->db->insert('salary', $data);
    }

    public function insert_one_time_expense($data)
    {
        $data['expense_id'] = $this->db->insert_id(); // Add the report_expense_id for the relationship
        $this->db->insert('one_time_expense', $data);
    }

    public function insert_other_expense($data)
    {
        $data['expense_id'] = $this->db->insert_id(); // Add the report_expense_id for the relationship
        $this->db->insert('other', $data);
    }


    public function get_expenses() {
        $this->db->select('report_category_id, report_category_name');
        $this->db->from('report_category');
    
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_expenses_list() {
        $this->db->where('report_expense.is_active', 1);
        $this->db->select('report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                       report_expense.report_expense_id, report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*,restaurant_details.restaurant_name');
        $this->db->from('report_expense');
        $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

        $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');

        $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left');  // Add this line to join with report_category
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function expenses_list($user_id) {
        $this->db->where('report_expense.created_by', $user_id);
        $this->db->where('report_expense.is_active', 1);
        $this->db->select('restaurant_details.restaurant_name,report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                       report_expense.report_expense_id, report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*');
        $this->db->from('report_expense');
        $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

        $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');

        $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left');  // Add this line to join with report_category
        
        $query = $this->db->get();
        return $query->result_array();
    }
    


    




    // ///////////////////////////////////////////////////////////////////////////////////




    public function get_user_by_id($user_id) {
        $this->db->select('users.*, company_users.company_id, company_users.comp_restaurant_id'); 
        $this->db->from('users'); 
        $this->db->join('company_users', 'users.id = company_users.user_id', 'left');
        $this->db->where('users.id', $user_id); 
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row_array(); 
        } else {
            return false; 
        }
    }
    

   
    
    public function get_restaurants_by_companys($company_id) {
        $this->db->where('company_id', $company_id);
        return $this->db->get('comp_restaurant')->result_array();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function update_company_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('company_users', $data);
    }
        
public function get_customers() {
    $this->db->select('company_id, company_name');
    $query = $this->db->get('company');  
    return $query->result_array();  // Return as an array of customers
}

public function get_restaurants() {
    $this->db->select('comp_restaurant_id, restaurant_name');
    $query = $this->db->get('comp_restaurant'); 
    return $query->result_array(); 
}
    
    
///////////////////////////update customers //////////////////////////



public function get_restaurant_by_company($company_id) {
    $this->db->select('*');
    $this->db->from('comp_restaurant');
    $this->db->where('company_id', $company_id);
    $this->db->where('is_active', ACTIVATE); 
    // Execute the query and get the results
    $query = $this->db->get();

    // Check if there are results and return them
    if ($query->num_rows() > 0) {
        return $query->result_array(); // Return restaurants as an array
    } else {
        return []; // Return an empty array if no restaurants are found
    }
}
// Common_model.php
public function get_all_countries() {
    $this->db->select('*');
    $this->db->from('country');
    $query = $this->db->get();
    return $query->result_array(); // Return an array of country records
}



public function save_company($data) {
    $this->db->insert('comp_onboarding', $data);
    return $this->db->insert_id(); 
}

public function save_restaurant($data) {
    $this->db->insert('restaurant_details', $data);
}











// Function to add a new restaurant
public function add_restaurant($company_id, $name, $url, $status) {
    // Prepare the data to insert
    $data = [
        'company_id' => $company_id,
        'restaurant_name' => $name,
        'restaurant_url' => $url,
        'is_active' => ($status == 'activate') ? 1 : 0
    ];

    // Insert the new restaurant
    $this->db->insert('comp_restaurant', $data); // Assuming 'restaurants' is the table name
}

// Function to delete a restaurant (if necessary)
public function delete_restaurant($restaurant_id) {
    // Delete the restaurant from the database
    $this->db->where('comp_restaurant_id', $restaurant_id);
    $this->db->delete('comp_restaurant'); // Assuming 'restaurants' is the table name
}








public function get_onboarding_by_id($onboarding_id) {
    $this->db->where('company_onboarding_id', $onboarding_id);
    $query = $this->db->get('company_onboarding'); // Replace with your table name

    return $query->row_array();
}

public function update_onboarding($onboarding_id, $data) {
    $this->db->where('company_onboarding_id', $onboarding_id);
    return $this->db->update('company_onboarding', $data); // Replace with your table name
}




public function get_expense_by_id($expense_id) {
    $this->db->select('report_expense.email, report_expense.expense_date, report_expense.expense_type, 
                       report_expense.report_expense_id, report_expense.is_active, restaurant_details.restaurant_name');

    
    $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');
    
    $this->db->where('report_expense.report_expense_id', $expense_id);
    
    $query = $this->db->get('report_expense');

    return $query->row_array();
}





public function get_invoice_by_expense_id($expense_id) {
    $this->db->where('expense_id', $expense_id);
    $query = $this->db->get('invoice');
    return $query->row_array();
}

public function get_salary_by_expense_id($expense_id) {
    $this->db->where('expense_id', $expense_id);
    $query = $this->db->get('salary');
    return $query->row_array();
}

public function get_one_time_expense_by_expense_id($expense_id) {
    $this->db->where('expense_id', $expense_id);
    $query = $this->db->get('one_time_expense');
    return $query->row_array();
}

public function get_other_expense_by_expense_id($expense_id) {
    $this->db->where('expense_id', $expense_id);
    $query = $this->db->get('other');
    return $query->row_array();
}












// ///////////////////////////////////////////


// Update the report_expense table
public function update_report_expenses($expense_id, $data)
{
    $this->db->where('report_expense_id', $expense_id);
    return $this->db->update('report_expense', $data);
}

// Update the invoice data
public function update_invoice($expense_id, $data)
{
    $this->db->where('expense_id', $expense_id);
    return $this->db->update('invoice', $data);
}

// Update the salary data
public function update_salary($expense_id, $data)
{
    $this->db->where('expense_id', $expense_id);
    return $this->db->update('salary', $data);
}

// Update the one-time expense data
public function update_one_time_expense($expense_id, $data)
{
    $this->db->where('expense_id', $expense_id);
    return $this->db->update('one_time_expense', $data);
}

// Update the other expense data
public function update_other_expense($expense_id, $data)
{
    $this->db->where('expense_id', $expense_id);
    return $this->db->update('other', $data);
}




public function deactivate_restaurant($restaurant_id)
    {
        $data = [
            'is_active' => DEACTIVATE  
        ];

        $this->db->where('comp_restaurant_id', $restaurant_id);  
        $update = $this->db->update('comp_restaurant', $data);  
        return $update;
    }


    public function get_all_expenses()
    {
        $this->db->where('report_expense.is_active', 1);
        $this->db->select('report_expense.*, report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*');
        $this->db->from('report_expense');
        $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');

        $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left');  // Add this line to join with report_category
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function approve_restaurant($onboarding_id) {
        $this->db->where('comp_onboarding_id', $onboarding_id);
        $this->db->update('comp_onboarding', array('is_published' => 1));

        return $this->db->affected_rows() > 0;  // Returns true if rows are affected, meaning the update succeeded
    }
    public function get_onboarding_details($onboarding_id) {
        $this->db->where('comp_onboarding_id', $onboarding_id);
        $query = $this->db->get('comp_onboarding');
        return $query->row();  // Return the first row of the result
    }

    public function restaurants_by_company($company_id)
{
    $this->db->select('*');
    $this->db->from('restaurant_details');
    $this->db->where('company_id', $company_id);
    $query = $this->db->get();

    return $query->result_array(); // Return the restaurants as an array
}



public function get_restaurant_name_by_user($user_id)
{
    $this->db->select('comp_restaurant_id');
    $this->db->from('company_users');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $company_user = $query->row(); 

        $restaurant_id = $company_user->comp_restaurant_id;

        $this->db->select('restaurant_details_id, restaurant_name');
        $this->db->from('restaurant_details');
        $this->db->where('restaurant_details_id', $restaurant_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    return null; 
}






public function expenses_list_by_company($company_id)
{
    $this->db->select('restaurant_details_id');
    $this->db->from('restaurant_details');
    $this->db->where('company_id', $company_id); 
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $restaurant_ids = array_map(function($row) {
            return $row['restaurant_details_id']; 
        }, $query->result_array());

        $this->db->select('restaurant_details.restaurant_name,report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                       report_expense.report_expense_id,report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*');  // Select relevant columns, including the joined category name
        $this->db->from('report_expense');
        $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

        
        $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left'); 
        $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');
        $this->db->where_in('restaurant_id', $restaurant_ids); 
        $this->db->where('report_expense.is_active', 1); // Ensure we only get active expenses


        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result_array(); 
        } else {
            return [];
        }
    }

    return []; 
}



public function get_expenses_list_for_csv() {
    $this->db->where('report_expense.is_active', 1);
    $this->db->where('report_expense.expense_type', 2);

    $this->db->select('report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                   report_expense.report_expense_id, report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*,restaurant_details.restaurant_name');
    $this->db->from('report_expense');
    $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

    $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');

    $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left');  // Add this line to join with report_category
    
    $query = $this->db->get();
    return $query->result_array();
}
public function expenses_list_for_csv($user_id) {
    $this->db->where('report_expense.created_by', $user_id);
    $this->db->where('report_expense.expense_type', 2);
    $this->db->where('report_expense.is_active', 1);
    $this->db->select('restaurant_details.restaurant_name,report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                   report_expense.report_expense_id, report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*');
    $this->db->from('report_expense');
    $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

    $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
    $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');

    $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left');  // Add this line to join with report_category
    
    $query = $this->db->get();
    return $query->result_array();
}
public function expenses_list_by_company_for_csv($company_id)
{
    $this->db->select('restaurant_details_id');
    $this->db->from('restaurant_details');
    $this->db->where('company_id', $company_id); 
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $restaurant_ids = array_map(function($row) {
            return $row['restaurant_details_id']; 
        }, $query->result_array());

        $this->db->select('restaurant_details.restaurant_name,report_expense.email, report_expense.expense_date, report_expense.expense_type,report_expense.creation_time, 
                       report_expense.report_expense_id,report_category.report_category_name, invoice.*, other.*, salary.*,one_time_expense.*');  // Select relevant columns, including the joined category name
        $this->db->from('report_expense');
        $this->db->join('restaurant_details', 'restaurant_details.restaurant_details_id = report_expense.restaurant_id', 'left');

        
        $this->db->join('report_category', 'report_category.report_category_id = report_expense.expense_type', 'left'); 
        $this->db->join('invoice', 'invoice.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('salary', 'salary.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('other', 'other.expense_id = report_expense.report_expense_id', 'left');
        $this->db->join('one_time_expense', 'one_time_expense.expense_id = report_expense.report_expense_id', 'left');
        $this->db->where_in('restaurant_id', $restaurant_ids); 
        $this->db->where('report_expense.is_active', 1); 
        $this->db->where('report_expense.expense_type', 2);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result_array(); 
        } else {
            return [];
        }
    }

    return []; 
}


public function get_company_by_id($company_id) {
    $query = $this->db->get_where('comp_onboarding', array('company_id' => $company_id));
    return $query->row_array(); // Fetch single row
}

public function get_restaurants_by_company_id($company_id) {
    $query = $this->db->get_where('restaurant_details', array('company_id' => $company_id));
    return $query->result_array(); // Fetch multiple rows
}

public function get_restaurant_by_id($restaurant_details_id) {
    $this->db->where('restaurant_details_id', $restaurant_details_id);
    $query = $this->db->get('restaurant_details');
    return $query->row_array();
}

public function update_company($company_id, $data) {
    $this->db->where('company_id', $company_id);
    $this->db->update('comp_onboarding', $data);
}

public function update_restaurant($restaurant_details_id, $data) {
    $this->db->where('restaurant_details_id', $restaurant_details_id);
    $this->db->update('restaurant_details', $data);
}

public function get_company_names() {
    $this->db->select('comp_onboarding_id, company_name');
    $this->db->where('is_published', ACTIVATE);
    $query = $this->db->get('comp_onboarding');
    return $query->result(); 
}
public function get_restaurant_by_company_id($company_id) {
    $this->db->select('restaurant_details_id, restaurant_name');
    $this->db->where('company_id', $company_id);
    $query = $this->db->get('restaurant_details');
    return $query->result(); // returns the list of restaurants for the given company
}

public function get_restaurant_location_by_company_id($company_id) {
    $this->db->select('location');
    $this->db->where('company_id', $company_id);
    $query = $this->db->get('restaurant_details');
    return $query->result_array();
}

public function get_locations_by_restaurant($company_id) {
    $this->db->select('restaurant_details_id, restaurant_name');
    $this->db->where('company_id', $company_id);
    $query = $this->db->get('restaurant_details'); // Adjust this to use the correct table for locations if necessary
    
    return $query->result() ? $query->result() : [];
}

public function get_restaurant_locations_by_user($user_id) {
    $this->db->select('rd.location');
    $this->db->from('company_users cu');
    $this->db->join('restaurant_details rd', 'cu.comp_restaurant_id = rd.restaurant_details_id', 'inner');
    $this->db->where('cu.user_id', $user_id);
    
    $query = $this->db->get();
    
    return $query->result_array();
}


public function get_users_and_company_details() {
    $this->db->select('u.id as user_id,u.active, u.first_name, u.last_name, u.email, u.phone, c.company_name,ug.group_id');
    $this->db->from('users u');
    $this->db->join('users_groups ug', 'u.id = ug.user_id'); // Join the user_groups table to get the group_id
    $this->db->join('company_users cu', 'u.id = cu.user_id'); // Join the company_users table to link users to companies
    $this->db->join('comp_onboarding c', 'cu.company_id = c.comp_onboarding_id'); // Join the comp_onboarding table to get the company name
    $this->db->where_in('ug.group_id', [2, 3]); // Only fetch users with group_id 2 or 3
    // $this->db->where('u.is_active', 1); // Optionally, you can also filter only active users
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array(); // Return the result as an array
    } else {
        return []; // Return an empty array if no results
    }
}


















}


/**
 * End of model
 */
