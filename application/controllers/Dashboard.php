<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public $user_id;
    public $user_role;
    public $role_id;
    public $user_email;
    public $user_name;
    public $nick_name;
    public $company_id;

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
        date_default_timezone_set('Asia/Kolkata');
        /*check user logged_in*/
        $this->is_logged_in();

        $this->user_id = $this->session->userdata('user_id');
        $this->role_id = $this->session->userdata('user_role_id');

        $profile_variables = $this->get_profile($this->user_id);
        $data['profile_variables'] = $profile_variables;

        $this->load->vars($data);

        $this->user_id = $this->session->userdata('user_id');
        $this->role_id = $this->session->userdata('user_role_id');
        $this->user_email = $this->session->userdata('identity');
        $this->user_role = $this->session->userdata('user_role');
        // $this->company_id = $this->session->userdata('company_id');
        $this->user_name = $this->session->userdata('full_name');
        $this->nick_name = $this->session->userdata('nick_name');

    }

    function __destruct(){
        log_message('dev', '------------------------------------------');
        log_message('dev', '---------------API CALL ENDS--------------');
        log_message('dev', '------------------------------------------');
    }

    /*check if user already logged in or not*/
    private function is_logged_in(){
        if (!$this->session->userdata('is_logged_in')) {
            $this->logout();
        }
    }

    public function get_profile($user_id){

        $profile=$this->Common_model->get_user_details($user_id);
        if($profile){
            $user_data = array(
                'identity' => $profile->email,
                'is_logged_in' => TRUE,
                'nick_name' => $profile->first_name,
                'full_name' => ucwords($profile->first_name.' '.$profile->last_name),
                'user_id' => $profile->user_id,
                'user_role' => $profile->group_name,
                'user_role_id' => $profile->role_id,
            );
            $this->session->set_userdata($user_data);
        }

        return $profile;

    }

    /*check if any users want to do wrong with any wrong url or null url*/
    public function redirector($url = NULL){
//        if ($url == NULL) {
//            $referrer = $this->agent->referrer();
//        } else {
//            $referrer = base_url().$url;
//        }
        $referrer = base_url().$url;
        redirect($referrer,'refresh');
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
        $url = "login";
        $this->redirector($url);

    }

    public function permissionDenied(){

        $this->load->view('header');
        $this->load->view('user_view/no_access');
        $this->load->view('footer');

    }

    public function password_check($str)
    {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $str)) {

            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'Please add a Character, Number, Special character for strong password');
            return FALSE;
        }
    }

    /*function to change password*/
    public function change_password(){

        // Check validation for user input in login form
        $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
        $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim|max_length[20]|xss_clean');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]|max_length[20]|matches[confirm_password]|callback_password_check|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'confirm Password', 'trim|required|min_length[5]|max_length[20]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            //if any error comes while checking validations for change password
            $errors = validation_errors();
            $data = array(
                'status' => 401,
                'data' => $errors
            );
            echo json_encode($data);

        }else {

            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $identity = $this->session->userdata('identity');

            if ($old_password == $new_password) {
                $data = array(
                    'status' => 201,
                    'data' => 'Old Password and New Password cannot be the same'
                );
                echo json_encode($data);
                die();
            }

            //change password using ionauth
            $changed = $this->Ion_auth_model->change_password($identity, $old_password, $new_password);

            //if password changed successfully
            if($changed){

                $data = array(
                    'status' => 200,
                    'data' => "Password Changed Successfully"
                );
                echo json_encode($data);

            }else{
                //if error comes during password change
                $data = array(
                    'status' => 205,
                    'data' => 'Old Password Not Correct/'.strip_tags($this->Ion_auth_model->errors())
                );
                echo json_encode($data);

            }

        }

    }

   

    /*function to change password*/
    public function reset_password(){

        // Check validation for user input in login form
        $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]|max_length[20]|matches[confirm_password]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'confirm Password', 'trim|required|min_length[5]|max_length[20]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            //if any error comes while checking validations for change password
            $errors = validation_errors();
            $data = array(
                'status' => 401,
                'data' => $errors
            );
            echo json_encode($data);

        }else {

            $identity = $this->input->post('user_email');
            $new_password = $this->input->post('new_password');

            //change password using ionauth
            $changed = $this->Ion_auth_model->reset_password($identity, $new_password);

            //if password changed successfully
            if($changed){

                $data = array(
                    'status' => 200,
                    'data' => "Password Updated Successfully"
                );
                echo json_encode($data);

            }else{
                //if error comes during password change
                $data = array(
                    'status' => 205,
                    'data' => "Something Went Wrong, Please Try Again Later"
                );
                echo json_encode($data);

            }

        }

    }

    /*function to View Dashboard*/
    public function home(){
        $role_id = $this->role_id;
        $user_id = $this->user_id;
        $company_id = $this->Common_model->get_company_id_by_user($user_id);
        

        if($role_id == 2){
            $data["user_all_location"] = $this->Common_model->get_restaurant_location_by_company_id($company_id);
        }

        elseif($role_id == 3){
            $data["user_all_location"] = $this->Common_model->get_restaurant_locations_by_user($user_id);
        }

        else{
            $data["user_all_location"] = NULL;
        }

        $data["role_id"] = $this->role_id;
        $data["user_id"] = $this->user_id;
        $data["company_id"] = $company_id;
        $this->load->view('header');
        $this->load->view('admin/home',$data);
        $this->load->view('admin_footer');
    }

     /*===============Blogs================*/

    /*blog List View*/
    public function blogList()
    {

        $this->load->view('header');
        $this->load->view('admin/blogList');
        $this->load->view('admin_footer');
    }

    /*blog Ajax List*/
    public function blogAjaxList()
    {
        $searchData=$this->input->post('searchData');
        $searchStatus=$this->input->post('searchStatus');
        $limit=$this->input->post('limit');

        $total_count = $this->Common_model->getAllBlogCount($searchData,$searchStatus);
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $total_count;
        $config["per_page"] = $limit;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $pages = $this->uri->segment(3);
        if($pages){
            $page=$pages;
        }else{
            $page=1;
        }
        $offset = ($page - 1) * $config["per_page"];

        $blogList= $this->Common_model->getAllBlogList($searchData,$searchStatus,$limit,$offset);
        $html='';
        $count=0;
        if($blogList) {
            foreach ($blogList as $blogLists) {
                $blogFile=$blogLists->blog_image;
                if($blogFile){
                    $blogFile=IMAGE_BLOG_PATH.$blogLists->blog_image;
                }else{
                    $blogFile=IMAGE_PATH.'no_blogs.jpg';
                }
                $subTitle=substr($blogLists->blog_title, 0, 105).'...';
                $blog_id=base64_encode($blogLists->blog_id);

                $html .= '<tr>';
                $html .= '<td>' . ++$count . '</td>';
                $html .= '<td  width="10%"><img src="'.$blogFile.'" width="50%"></td>';
                $html .= '<td>' . $subTitle . '</td>';
                $html .= '<td>' . $blogLists->first_name . '</a></td>';
                $html .= '<td>' . date('d-m-Y',$blogLists->updation_time) . '</td>';
                if($blogLists->is_active!=DEACTIVATE) {
                    $html .= '<td><a href="' . base_url() . 'Dashboard/editBlog/' . $blog_id . '" title="Edit Blog"><span class="icon-edit-delete"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>&nbsp;&nbsp;<span class="icon-edit-delete deleteText"><i class="fas fa-trash" aria-hidden="true" data-toggle="modal" data-target="#blog_delete_modal" onclick="blog_name_alert(' . $blogLists->blog_id . ')"></i></span></td>';
                }
                $html .= '</tr>';
            }

            $pagination = $this->pagination->create_links();
            $status=200;
        }else{
            $status=201;
            $pagination='';
            $html='<tr><td colspan="10">No Blog found</td></tr>';
        }
        $data = array(
            'status' => $status,
            'data' => $html,
            'pagination'=>$pagination
        );
        echo json_encode($data);


    }

    /*portfolio Company Name*/
    public function blog_name_alert($blog_id = null){

        $where = array(
            'blog_id' => $blog_id
        );

        $get_detail = $this->Generic_model->getGenericData('blogs',$where);

        if($get_detail){

            echo json_encode($get_detail[0]->blog_title);

        }else{
            echo '';
        }

    }

    /*Delete portfolio Company*/
    public function removeBlog(){

        $blog_id = $this->input->post('blog_id');

        $removeData = $this->Generic_model->updateGenericData('blogs',array('blog_id' => $blog_id),array('is_active' => DEACTIVATE));
        if($removeData){
            $data = array(
                'status' => 200,
                'data' => 'Blog Deleted Successfully.'
            );
        }else{
            $data = array(
                'status' => 201,
                'data' => 'Failed to delete, try again later'
            );
        }
        echo json_encode($data);

    }

    /*New Blog View*/
    public function newBlog()
    {
        $data['category']=$this->Generic_model->getGenericData('category',array('is_active'=>ACTIVATE));
        $this->load->view('header');
        $this->load->view('admin/newBlog',$data);
        $this->load->view('admin_footer');
    }

    /*Add New Blog*/
    public function addBlog()
    {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('blogTitle', 'Title', 'trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('blogUrl', 'Url', 'trim|max_length[512]|xss_clean');
        $this->form_validation->set_rules('blogSeoDesp', 'Seo Description', 'trim|xss_clean');
        $this->form_validation->set_rules('blogDescription', 'Blog Description', 'required');
        $this->form_validation->set_rules('blogPublish', 'Blog Publish', 'trim|xss_clean');
        $this->form_validation->set_rules('commentPublish', 'Comment Publish', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $this->session->set_flashdata('error_message', $errors);
            redirect('Dashboard/newBlog');
        } else {

            $blogTitle              = $this->input->post('blogTitle');
            $blogUrl                = $this->input->post('blogUrl');
            $blogSeoDesp                = $this->input->post('blogSeoDesp');
            $blogDescription        = $this->input->post('blogDescription');
            $blogPublish            = $this->input->post('blogPublish');
            $commentPublish         = $this->input->post('commentPublish');
            $blogCategory           = $this->input->post('blogCategory');
            $blogFileImage='';
            if($_FILES['blogFile']){
                $filePath = 'blog/'.date('Y').'/'.date('m').'/';
                if (!is_dir($filePath)) {
                    mkdir($filePath, 0777, true);

                    chmod($filePath, 0777);

                }
                $fieldName = 'blogFile';
                $blogFileImage = single_image_local($_FILES['blogFile'], $fieldName, $filePath);
                if ($blogFileImage) {

                    chmod($blogFileImage, 0777);


                }
            }
            if(preg_match('/[^a-zA-Z0-9-]+/i', $blogUrl)) {
                $this->session->set_flashdata('error_message', 'Blog Url Has Special Characters');
                redirect('Dashboard/newBlog/');
            } else {
                $checkUrl=$this->Generic_model->getGenericData('blogs', array('blog_url' => $blogUrl));
                if(!$checkUrl) {
                    $blog_data = array(
                        'category_id' => $blogCategory,
                        'blog_title' => $blogTitle,
                        'blog_url' => $blogUrl,
                        'seo_description' => $blogSeoDesp,
                        'blog_description' => $blogDescription,
                        'blog_image' => $blogFileImage,
                        'comment_publish' => $commentPublish,
                        'creation_time' => time(),
                        'created_by' => $this->user_id,
                        'updation_time' => time(),
                        'updated_by' => $this->user_id,
                        'is_active' => $blogPublish
                    );
                    $blog=$this->Generic_model->addGenericData('blogs', $blog_data);
                    $blog_data_history = array(
                        'blog_id' => $blog,
                        'category_id' => $blogCategory,
                        'blog_title' => $blogTitle,
                        'blog_url' => $blogUrl,
                        'blog_description' => $blogDescription,
                        'blog_image' => $blogFileImage,
                        'comment_publish' => $commentPublish,
                        'creation_time' => time(),
                        'created_by' => $this->user_id,
                        'updation_time' => time(),
                        'updated_by' => $this->user_id,
                        'is_active' => $blogPublish
                    );
                    $blog=$this->Generic_model->addGenericData('blog_history', $blog_data_history);


                    if ($blog) {
                        $this->session->set_flashdata('success_message_add', 'Blog Added Successfully');
                        $blogId = base64_encode($blog);
                        redirect('Dashboard/editBlog/' . $blogId);
                    } else {
                        $this->session->set_flashdata('error_message', '<span class="blogWrong">Something went wrong, try again</span>');
                        redirect('Dashboard/blogList/');
                    }
                }else{
                    $blog = $this->session->set_flashdata('error_message', '<span class="blogUrlAlredy">URL Already Available</span>');
                    redirect('Dashboard/newBlog/');
                }
            }
        }



    }

    /*Edit Blog View*/
    public function editBlog($blogId=null)
    {
        if($blogId){
            $blogId=base64_decode($blogId);
            $this->session->set_userdata('editBlogId',$blogId);
            $data['category']=$this->Generic_model->getGenericData('category',array('is_active'=>ACTIVATE));
            $blog_detail=$this->Generic_model->getGenericData('blogs',array('blog_id'=>$blogId));
            if($blog_detail) {
                $data['blog'] = $blog_detail;
                $this->load->view('header');
                $this->load->view('admin/editBlog', $data);
                $this->load->view('admin_footer');
            }else{
                redirect('Dashboard/blogList');
            }
        }else{
            redirect('Dashboard/blogList');
        }

    }

    /*Update Blog*/
    public function updateBlog()
    {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('blogTitle', 'Title', 'trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('blogUrl', 'Url', 'trim|max_length[512]|xss_clean');
        $this->form_validation->set_rules('blogSeoDesp', 'Seo Description', 'trim|xss_clean');
        $this->form_validation->set_rules('blogDescription', 'Blog Description', 'required');
        $this->form_validation->set_rules('blogPublish', 'Blog Publish', 'trim|xss_clean');
        $this->form_validation->set_rules('commentPublish', 'Comment Publish', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $this->session->set_flashdata('error_message', $errors);
            redirect('Dashboard/newBlog');
        } else {
            $blogTitle              = $this->input->post('blogTitle');
            $blogUrl                = $this->input->post('blogUrl');
            $blogSeoDesp                = $this->input->post('blogSeoDesp');
            $blogDescription        = $this->input->post('blogDescription');
            $blogPublish            = $this->input->post('blogPublish');
            $commentPublish         = $this->input->post('commentPublish');
            $blogCategory           = $this->input->post('blogCategory');
            $blogId                 = $this->session->userdata('editBlogId');

            if(preg_match('/[^a-zA-Z0-9-]+/i', $blogUrl)) {
                $this->session->set_flashdata('error_message', 'Blog Url Has Special Characters');
                $blogId = base64_encode($blogId);
                redirect('Dashboard/editBlog/' . $blogId);
            } else {
                if($_FILES['blogFile']['name']!=''){
                    $filePath = 'blog/'.date('Y').'/'.date('m').'/';
                    if (!is_dir($filePath)) {
                        mkdir($filePath, 0777, true);

                        chmod($filePath, 0777);

                    }
                    $fieldName = 'blogFile';
                    $blogFileImage = single_image_local($_FILES['blogFile'], $fieldName, $filePath);
                    if ($blogFileImage) {
                        chmod($blogFileImage, 0777);
                    }
                    $checkUrl=$this->Generic_model->getGenericData('blogs', array('blog_id !=' => $blogId,'blog_url' => $blogUrl));
                    if(!$checkUrl) {
                        $blog_data_update = array(
                            'blog_title' => $blogTitle,
                            'blog_url' => $blogUrl,
                            'seo_description' => $blogSeoDesp,
                            'blog_description' => $blogDescription,
                            'blog_image' => $blogFileImage,
                            'comment_publish' => $commentPublish,
                            'updation_time' => time(),
                            'updated_by' => $this->user_id,
                            'is_active' => $blogPublish
                        );
                        $blog =$this->Generic_model->updateGenericData('blogs', array('blog_id' => $blogId),$blog_data_update);
                        $blog_data_history = array(
                            'blog_id' => $blogId,
                            'category_id' => $blogCategory,
                            'blog_title' => $blogTitle,
                            'blog_url' => $blogUrl,
                            'blog_description' => $blogDescription,
                            'blog_image' => $blogFileImage,
                            'comment_publish' => $commentPublish,
                            'creation_time' => time(),
                            'created_by' => $this->user_id,
                            'updation_time' => time(),
                            'updated_by' => $this->user_id,
                            'is_active' => $blogPublish
                        );
                        $blog=$this->Generic_model->addGenericData('blog_history', $blog_data_history);
                        if ($blog) {
                            $this->session->set_flashdata('error_message', '<span class="blogUpdatedSuccess">Blog Updated Successfully</span>');
                            $blogId = base64_encode($blogId);
                            redirect('Dashboard/editBlog/' . $blogId);
                        } else {
                            $this->session->set_flashdata('error_message', '<span class="blogWrong">Something went wrong, try again</span>');
                            redirect('Dashboard/blogList/');
                        }
                    }else{
                        $this->session->set_flashdata('error_message', '<span class="blogUrlAlredy">URL Already Available</span>');
                        redirect('Dashboard/blogList/');
                    }
                }else{
                    $checkUrl=$this->Generic_model->getGenericData('blogs', array('blog_id !=' => $blogId,'blog_url' => $blogUrl));
                    if(!$checkUrl) {
                        $blog_data_update = array(
                            'blog_title' => $blogTitle,
                            'blog_url' => $blogUrl,
                            'seo_description' => $blogSeoDesp,
                            'blog_description' => $blogDescription,
                            'category_id' => $blogCategory,
                            'comment_publish' => $commentPublish,
                            'updation_time' => time(),
                            'updated_by' => $this->user_id,
                            'is_active' => $blogPublish
                        );
                        $this->Generic_model->updateGenericData('blogs', array('blog_id' => $blogId),$blog_data_update);
                        $blog_data_history = array(
                            'blog_id' => $blogId,
                            'category_id' => $blogCategory,
                            'blog_title' => $blogTitle,
                            'blog_url' => $blogUrl,
                            'blog_description' => $blogDescription,
                            'comment_publish' => $commentPublish,
                            'creation_time' => time(),
                            'created_by' => $this->user_id,
                            'updation_time' => time(),
                            'updated_by' => $this->user_id,
                            'is_active' => $blogPublish
                        );
                        $blog=$this->Generic_model->addGenericData('blog_history', $blog_data_history);
                        if ($blog) {
                            $this->session->set_flashdata('success_message', '<span class="blogUpdatedSuccess">Blog Updated Successfully</span>');
                            $blogId = base64_encode($blogId);
                            redirect('Dashboard/editBlog/' . $blogId);
                        } else {
                            $this->session->set_flashdata('error_message', '<span class="blogWrong">Something went wrong, try again</span>');
                            redirect('Dashboard/blogList/');
                        }
                    }else{
                        $this->session->set_flashdata('error_message', '<span class="blogUrlAlredy">URL Already Available</span>');
                        redirect('Dashboard/blogList/');
                    }
                }
            }
        }
    }

    // blog Category page
    public function category()
    {
        $this->load->view('header');
        $this->load->view('admin/category');
        $this->load->view('admin_footer');
    }

    //Add New blog category
    public function addCategory()
    {
        // if ($this->session->userdata('acl_set_up') == CAN_ADD_EDIT || $this->session->userdata('acl_set_up') == ALL_ACCESS) {
        //this form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('categoryName', 'Category Name', 'required|max_length[32]|xss_clean');


        $htmlCategory = '<option value="" hidden>Select Category</option>';

        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $status = 205;
            $msg = $errors;
        } else {

            $categoryName = ucwords($this->input->post('categoryName'));

            $where = array(
                'category_name' => $categoryName,
            );

            $check = $this->Generic_model->getGenericData('category', $where);
            if ($check) {

                $update_detail = array('is_active' => ACTIVATE);
                // If Found same name then will update is_active
                $this->Generic_model->updateGenericData('category', $where, $update_detail);


            } else {
                $category_detail = array(
                    'category_name' => $categoryName,
                    'creation_time' => time(),
                    'created_by' => $this->user_id,
                    'is_active' => ACTIVATE,
                );
                $this->Generic_model->addGenericData('category', $category_detail);

            }

            $status = 200;
            $msg = 'New Category Added';



            $getCategory = $this->Generic_model->getGenericData('category', array('is_active' => ACTIVATE));

            if ($getCategory) {
                foreach ($getCategory as $getCategorys) {
                    $htmlCategory .= '<option value="' . $getCategorys->category_id . '">' . $getCategorys->category_name . '</option>';
                }
            } else {
                $htmlCategory .= '<option value="">No Category Found</option>';
            }


        }
        $data = array(
            'status' => $status,
            'data' => $msg,
            'htmlCategory' => $htmlCategory
        );

        echo json_encode($data);
        //  }else{
        //     $this->redirector('Dashboard/permissionDenied');
        // }
    }

    /*edit blog Category*/
    public function editCategory()
    {
        //if ($this->session->userdata('acl_set_up') == CAN_ADD_EDIT || $this->session->userdata('acl_set_up') == ALL_ACCESS) {

        $categoryId = $this->input->post('categoryId');
        if ($categoryId) {
            $category_detail = $this->Generic_model->getGenericData('category', array('category_id' => $categoryId));
            if ($category_detail) {
                $data = array(
                    'status' => 200,
                    'data' => $category_detail
                );
            } else {
                $data = array(
                    'status' => 401,
                    'data' => 'Something Went Wrong, Please Try Again Later.'
                );
            }
        } else {
            $data = array(
                'status' => 403,
                'data' => 'Please Select sub category Again.'
            );
        }
        echo json_encode($data);
        // }else{
        //     $this->redirector('Dashboard/permissionDenied');
        //  }
    }

    //Update blog category
    public function updateCategory()
    {
        //  if ($this->session->userdata('acl_set_up') == CAN_ADD_EDIT || $this->session->userdata('acl_set_up') == ALL_ACCESS) {
        //this form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('categoryName', 'Category Name', 'required|max_length[32]|xss_clean');



        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $data = array(
                'status' => 205,
                'data' => $errors
            );
        } else {

            $categoryName = ucwords($this->input->post('categoryName'));
            $categoryId = $this->input->post('categoryId');

            $where_active = array(
                'category_id' => $categoryId,
                'is_active' => ACTIVATE
            );



            $where = array('category_id !=' => $categoryId, 'category_name' => $categoryName);

            $check = $this->Generic_model->getGenericData('category', $where);
            if ($check) {
                if ($check[0]->is_active == ACTIVATE) {
                    $data = array(
                        'status' => 201,
                        'data' => 'Category Already Added'
                    );
                } else {

                    $update_detail = array('is_active' => ACTIVATE);
                    // If Found same name then will update is_active
                    $this->Generic_model->updateGenericData('category', array('category_id' => $categoryId), array('is_active' => ACTIVATE, 'category_name' => $categoryName));
                    $data = array(
                        'status' => 200,
                        'data' => 'Category Updated'
                    );
                }

            } else {
                $category_detail = array(
                    'category_name' => $categoryName,
                    'update_time' => time(),
                    'updated_by' => $this->user_id,
                    'is_active' => ACTIVATE,

                );
                $this->Generic_model->updateGenericData('category', array('category_id' => $categoryId), $category_detail);
                $data = array(
                    'status' => 200,
                    'data' => 'Category Updated'
                );
            }
        }

        echo json_encode($data);
        //  }else{
        //     $this->redirector('Dashboard/permissionDenied');
        //   }
    }

    //blog Category List
    public function allCategory(){
        $searchData=$this->input->post('searchData');
        $limit=$this->input->post('limit');

        $total_count = $this->Common_model->getAllCategoryCount($searchData);
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $total_count;
        $config["per_page"] = $limit;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $pages = $this->uri->segment(3);
        if($pages){
            $page=$pages;
        }else{
            $page=1;
        }
        $offset = ($page - 1) * $config["per_page"];

        $allCategorys= $this->Common_model->getAllCategoryList($searchData,$limit,$offset);
        $html='';
        $count=0;
        if($allCategorys) {
            foreach ($allCategorys as $allCategorys) {
                $html .= '<tr>';
                $html .= '<td>' . ++$count . '</td>';
                $html .= '<td id="cat_' . $allCategorys->category_id . '">' . $allCategorys->category_name . '</span></td>';

                $html .= '<td>';


                $html .= '<span class="icon-edit-delete editText" data-toggle="modal" data-target="#editCategory"><i class="fas fa-pencil-alt" title="Edit Category" onclick="editCategory(' . $allCategorys->category_id . ')" aria-hidden="true"></i></span>&nbsp;&nbsp;';



                $html .= '<span class="icon-edit-delete deleteText"><i class="fas fa-trash" title="Delete Category" data-toggle="modal" data-target="#deleteCategory"  aria-hidden="true" onclick="delete_blog_category_alert(' . $allCategorys->category_id . ')"></i></span>';

                $html.='</td>';
                $html.= '</tr>';
            }

            $pagination = $this->pagination->create_links();
            $status=200;
        }else{
            $status=201;
            $pagination='';
            $html='<tr><td colspan="3" class="text-center">No Category found</td></tr>';
        }
        $data = array(
            'status' => $status,
            'data' => $html,
            'pagination'=>$pagination
        );
        echo json_encode($data);

    }

	public function delete_blog_category_alert($category_id = null)
    {

        $where = array(
            'blog_category_id' => $category_id
        );

        $get_detail = $this->Generic_model->getGenericData('category', $where);

        if ($get_detail) {

            echo json_encode($get_detail[0]->category_name);
        } else {
            echo '';
        }
    }

    //Delete blog Category
    public function removeCategory(){
        $categoryId = $this->input->post('categoryId');

        $removeCategory = $this->Generic_model->updateGenericData('category', array('category_id' => $categoryId), array('is_active' => DEACTIVATE));
        if ($removeCategory) {
            $data = array(
                'status' => 200,
                'data' => 'Category Deleted'
            );
        } else {
            $data = array(
                'status' => 201,
                'data' => 'Failed to delete, try again later'
            );
        }

        echo json_encode($data);

    }


    /*===============Blogs END================*/

//   Getbreadcrumbs
// public function get_locations_by_user_id(){
//     $user_id = $this->user_id;
//     $data["user_all_locations"] = $this->Common_model->get_restaurant_name_by_user($user_id);

// }

public function restaurant_onboarding()
    {
        $data['onboardings'] = $this->Common_model->get_onboardings();

        /*get setup*/
        $this->load->view('header');
        $this->load->view('admin/restaurant_onboarding',$data);
        $this->load->view('admin_footer');

    }

public function add_restaurant_onboarding()
    {
        /*get setup*/
        $this->load->view('header');
        $this->load->view('admin/add_restaurant_onboarding');
        $this->load->view('admin_footer');

    }

public function edit_restaurant_onboarding($onboarding_id)
    {
        /*get setup*/
        $data['onboarding'] = $this->Common_model->get_onboarding_by_id($onboarding_id);

        $this->load->view('header');
        $this->load->view('admin/edit_restaurant_onboarding',$data);
        $this->load->view('admin_footer');

    }
    



public function report_an_expense_list()
{
    $user_id=$this->user_id;
    $role_id=$this->role_id;

    if ($role_id == 1) {
        $data['expenses'] = $this->Common_model->get_expenses_list();
    } 
    elseif ($role_id == 2) {
        $company_id = $this->Common_model->get_company_id_by_user($user_id);
        $data['expenses'] =$this->Common_model->expenses_list_by_company($company_id);
    }else {
        $data['expenses'] = $this->Common_model->expenses_list($user_id);
    }

    $this->load->view('header');
    $this->load->view('admin/report_an_expense_list', $data);
    $this->load->view('admin_footer');
}








public function edit_report_expense($expense_id) {
    $data['expense'] = $this->Common_model->get_expense_by_id($expense_id);
    // Fetch related data based on expense type
    switch ($data['expense']['expense_type']) {
        case '2':
            $data['invoice'] = $this->Common_model->get_invoice_by_expense_id($expense_id);
            break;
        case '1':
            $data['salary'] = $this->Common_model->get_salary_by_expense_id($expense_id);
            break;
        case '3':
            $data['one_time'] = $this->Common_model->get_one_time_expense_by_expense_id($expense_id);
            break;
        case '4':
            $data['other'] = $this->Common_model->get_other_expense_by_expense_id($expense_id);
            break;
    }

  
    // Load the view and pass the data
    $this->load->view('header');
    $this->load->view('admin/edit_report_expense', $data);
    $this->load->view('admin_footer');
}



public function report_an_expense()
{
    $user_id = $this->user_id;
    $role_id = $this->role_id;
    
    if ($role_id == 3) {
        $data['prefill'] = true;
        // $data['restaurant_name'] = $this->Common_model->get_restaurant_name_by_user($user_id);
        $restaurant_details = $this->Common_model->get_restaurant_name_by_user($user_id);

    // Check if the details are found
    if ($restaurant_details) {
        $data['restaurant_name'] = $restaurant_details->restaurant_name;
        $data['restaurant_details_id'] = $restaurant_details->restaurant_details_id; // This should be the correct ID
    }
        $data['email'] = $this->user_email;  
    } elseif ($role_id == 2) {
        $company_id = $this->Common_model->get_company_id_by_user($user_id);
        $data['restaurants'] =$this->Common_model->get_restaurants_by_company($company_id);

    }

    $data['expenses'] = $this->Common_model->get_expenses();

    $this->load->view('header');
    $this->load->view('admin/report_an_expense', $data);
    $this->load->view('admin_footer');
}




public function customers()
{
    /* get setup */
    $data['customers'] = $this->Common_model->get_company(); 

  
    $this->load->view('header');
    $this->load->view('admin/customers', $data);
    $this->load->view('admin_footer');
}

    

public function add_restaurant(){
       $this->load->view('header');
       $this->load->view('admin/add_restaurant');
       $this->load->view('admin_footer');
}

public function comp_users(){
    $session_user_id = $this->user_id; 

    $company_id = $this->Common_model->get_company_id_by_user($session_user_id);
    
    $data['users'] = $this->Common_model->get_users_by_company_and_group($company_id);
    $data['companies'] = $this->Common_model->get_companies();

    $this->load->view('header');
    $this->load->view('admin/comp_users', $data);
    $this->load->view('admin_footer');
}

public function company_users(){
    $data['companies'] = $this->Common_model->get_company_names();
    $data['users'] = $this->Common_model->get_users_and_company_details();


    $this->load->view('header');
    $this->load->view('admin/company_users',$data);
    $this->load->view('admin_footer');
}

public function view_locations(){
    $user_id=$this->user_id;
    
    $company_id = $this->Common_model->get_company_id_by_user($user_id);
    $data['restaurants'] = $this->Common_model->get_restaurants_by_company_id($company_id);
        
    $this->load->view('header');
    $this->load->view('admin/view_locations',$data);
    $this->load->view('admin_footer');
}

public function view_restaurants($comp_onboarding_id){
    
    $data['restaurants'] = $this->Common_model->get_restaurants_by_company_id($comp_onboarding_id);
        
    $this->load->view('header');
    $this->load->view('admin/view_restaurants',$data);
    $this->load->view('admin_footer');
}

public function edit_location_details($restaurant_details_id){
    $data['restaurant'] = $this->Common_model->get_restaurant_by_id($restaurant_details_id);
    $this->load->view('header');
    $this->load->view('admin/edit_location_details',$data);
    $this->load->view('admin_footer');
}

public function add_users(){
    $this->load->view('header');
    $this->load->view('admin/add_users');
    $this->load->view('admin_footer');
}

public function domo_dashboard(){
    $this->load->view('header');
    $this->load->view('admin/domo_dashboard');
    $this->load->view('admin_footer');
}

public function domo_dashboard2(){
    $this->load->view('header');
    $this->load->view('admin/domo_dashboard2');
    $this->load->view('admin_footer');
}


public function addRestaurant()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('restaurantCode', 'Restaurant Code', 'trim|required|max_length[100]|xss_clean|is_unique[restaurants.restaurant_code]');
        $this->form_validation->set_rules('restaurantName', 'Name', 'trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('dashboardUrl', 'Dashboard URL', 'trim|valid_url|max_length[512]|xss_clean');
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|valid_email|max_length[128]|xss_clean');
        $this->form_validation->set_rules('contactPhone', 'Contact Phone', 'trim|numeric|max_length[15]|xss_clean');
        $this->form_validation->set_rules('managerEmail', 'Manager Email', 'trim|valid_email|max_length[128]|xss_clean');
        $this->form_validation->set_rules('managerPhone', 'Manager Phone', 'trim|numeric|max_length[15]|xss_clean');
    
        $htmlRestaurant = '<option value="" hidden>Select Restaurant</option>';
    
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $status = 205;
            $msg = $errors;
        } else {
            $restaurantCode = $this->input->post('restaurantCode');
            $restaurantName = $this->input->post('restaurantName');
            $dashboardUrl   = $this->input->post('dashboardUrl');
            $contactEmail   = $this->input->post('contactEmail');
            $contactPhone   = $this->input->post('contactPhone');
            $managerEmail   = $this->input->post('managerEmail');
            $managerPhone   = $this->input->post('managerPhone');
    
            $where = array(
                'restaurant_code' => $restaurantCode,
            );
    
            $check = $this->Generic_model->getGenericData('restaurants', $where);
            if ($check) {
                // If Found same code, update 'is_active'
                $update_detail = array('is_active' => ACTIVATE);
                $this->Generic_model->updateGenericData('restaurants', $where, $update_detail);
            } else {
                // Insert new restaurant
                $restaurantData = array(
                    'restaurant_code' => $restaurantCode,
                    'restaurant_name' => $restaurantName,
                    'dashboard_url'   => $dashboardUrl,
                    'contact_email'   => $contactEmail,
                    'contact_phone'   => $contactPhone,
                    'manager_email'   => $managerEmail,
                    'manager_phone'   => $managerPhone,
                    'creation_time' => time(),
                    'created_by' => $this->user_id,
                    'is_active' => ACTIVATE,
                );
                $this->Generic_model->addGenericData('restaurants', $restaurantData);
            }
    
            $status = 200;
            $msg = 'New Restaurant Added';
    
            // Fetch updated restaurant list
            $getRestaurants = $this->Generic_model->getGenericData('restaurants', array('is_active' => ACTIVATE));
    
            if ($getRestaurants) {
                foreach ($getRestaurants as $restaurant) {
                    $htmlRestaurant .= '<option value="' . $restaurant->restaurant_id . '">' . $restaurant->restaurant_name . '</option>';
                }
            } else {
                $htmlRestaurant .= '<option value="">No Restaurant Found</option>';
            }
        }
    
        $data = array(
            'status' => $status,
            'data' => $msg,
            'htmlRestaurant' => $htmlRestaurant
        );
    
        echo json_encode($data);
    }

    
public function allRestaurants()
    {
        $searchData = $this->input->post('searchData');
        $limit = $this->input->post('limit');
    
        // Fetch total count of restaurants
        $total_count = $this->Common_model->getAllRestaurantCount($searchData);
    
        // Pagination configuration
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $total_count;
        $config["per_page"] = $limit;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
    
        $this->pagination->initialize($config);
    
        // Determine the current page and offset
        $pages = $this->uri->segment(3);
        $page = $pages ? $pages : 1;
        $offset = ($page - 1) * $config["per_page"];
    
        // Fetch restaurant data
        $allRestaurants = $this->Common_model->getAllRestaurantList($searchData, $limit, $offset);
        $html = '';
        $count = $offset;
    
        if ($allRestaurants) {
            foreach ($allRestaurants as $restaurant) {
                $html .= '<tr>';
                // $html .= '<td>' . ++$count . '</td>';
                $html .= '<td id="restaurant_' . $restaurant->restaurant_id . '">' . $restaurant->restaurant_name . '</td>';
                $html .= '<td>' . $restaurant->restaurant_code . '</td>';
                $html .= '<td class="overflow_td">' . $restaurant->dashboard_url . '</td>';
                $html .= '<td>' . $restaurant->contact_email . '<br>' . $restaurant->contact_phone . '</td>';
                $html .= '<td>' . $restaurant->manager_email . '<br>' . $restaurant->manager_phone . '</td>';
                $html .= '<td  class="text-success">' . ($restaurant->is_active == 1 ? 'Active' : 'Deactive') . '</td>';
                $html .= '<td>';
                $html .= '<a href="' . base_url() . 'Dashboard/edit_restaurant/' . $restaurant->restaurant_id . '" class="icon-edit-delete editText"  ><i class="fas fa-pencil-alt" title="Edit Restaurant"  aria-hidden="true"></i></a>&nbsp;&nbsp;';
                $html .= '<span class="icon-edit-delete deleteText"><i class="fas fa-trash" title="Delete Restaurant" data-toggle="modal" data-target="#deleteRestaurant" aria-hidden="true" onclick="delete_restaurant_alert(' . $restaurant->restaurant_id . ')"></i></span>';
                $html .= '</td>';
                $html .= '</tr>';
            }
    
            $pagination = $this->pagination->create_links();
            $status = 200;
        } else {
            $status = 201;
            $pagination = '';
            $html = '<tr><td colspan="5" class="text-center">No restaurants found</td></tr>';
        }
    
        // Prepare response
        $data = array(
            'status' => $status,
            'data' => $html,
            'pagination' => $pagination
        );
    
        echo json_encode($data);
    }

public function delete_restaurant_alert($restaurant_id = null)
    {

        $where = array(
            'restaurant_id' => $restaurant_id
        );

        $get_detail = $this->Generic_model->getGenericData('restaurants', $where);

        if ($get_detail) {

            echo json_encode($get_detail[0]->restaurant_name);
        } else {
            echo '';
        }
    }

    //Delete Restaurant 
public function removeRestaurant(){
        $restaurant_id = $this->input->post('restaurant_id');

        $removeRestaurant = $this->Generic_model->updateGenericData('restaurants', array('restaurant_id' => $restaurant_id), array('is_active' => DEACTIVATE));
        if ($removeRestaurant) {
            $data = array(
                'status' => 200,
                'data' => 'Restaurant Deleted'
            );
        } else {
            $data = array(
                'status' => 201,
                'data' => 'Failed to delete, try again later'
            );
        }

        echo json_encode($data);

    }

public function edit_restaurants(){
    $this->load->view('header');
        $this->load->view('admin/edit_restaurant');
        $this->load->view('admin_footer');
}

public function edit_restaurant($restaurant_id = null)
    {
        // Check if restaurant ID is provided
        if (!$restaurant_id) {
            $this->session->set_flashdata('error', 'Invalid Restaurant ID.');
            redirect('Dashboard/allRestaurants'); // Redirect to the listing page
        }
    
        // Fetch the restaurant details from the database
        $restaurant_detail = $this->Generic_model->getGenericData('restaurants', array('restaurant_id' => $restaurant_id));
    
        if (!$restaurant_detail) {
            $this->session->set_flashdata('error', 'Restaurant not found.');
            redirect('Dashboard/allRestaurants'); // Redirect to the listing page
        }
    
        // Pass the data to the view
        $data['restaurant'] = $restaurant_detail[0]; // Assuming `getGenericData` returns an array
        $this->load->view('header');
        $this->load->view('admin/edit_restaurant', $data);
        $this->load->view('admin_footer');
    }

public function updateRestaurant()
{
    // Set form validation rules
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('restaurant_name', 'Restaurant Name', 'required|max_length[100]|xss_clean');
    $this->form_validation->set_rules('restaurantCode', 'Restaurant ID/Code', 'required|max_length[50]|xss_clean');
    $this->form_validation->set_rules('dashboardUrl', 'Dashboard URL', 'valid_url|xss_clean');
    $this->form_validation->set_rules('contactEmail', 'Contact Email', 'valid_email|xss_clean');
    $this->form_validation->set_rules('contactPhone', 'Contact Phone', 'max_length[15]|xss_clean');
    $this->form_validation->set_rules('managerEmail', 'Manager Email', 'valid_email|xss_clean');
    $this->form_validation->set_rules('managerPhone', 'Manager Phone', 'max_length[15]|xss_clean');

    if ($this->form_validation->run() == FALSE) {
        // Validation failed
        $errors = validation_errors();
        $data = array(
            'status' => 205,
            'data' => $errors
        );
    } else {
        // Get the posted data
        $restaurant_id = $this->input->post('restaurant_id');
        $restaurant_name = ucwords($this->input->post('restaurant_name'));
        $restaurant_code = $this->input->post('restaurantCode');
        $dashboard_url = $this->input->post('dashboardUrl');
        $contact_email = $this->input->post('contactEmail');
        $contact_phone = $this->input->post('contactPhone');
        $manager_email = $this->input->post('managerEmail');
        $manager_phone = $this->input->post('managerPhone');

        // Check if the restaurant name or code already exists
        $where = array(
            'restaurant_id !=' => $restaurant_id,
            'restaurant_name' => $restaurant_name
        );

        $where_code = array(
            'restaurant_id !=' => $restaurant_id,
            'restaurant_code' => $restaurant_code
        );

        $check_name = $this->Generic_model->getGenericData('restaurants', $where);
        $check_code = $this->Generic_model->getGenericData('restaurants', $where_code);

        if ($check_name || $check_code) {
            if (($check_name && $check_name[0]->is_active == ACTIVATE) || ($check_code && $check_code[0]->is_active == ACTIVATE)) {
                $data = array(
                    'status' => 201,
                    'data' => 'Restaurant Name or Code Already Exists'
                );
            } else {
                // Update `is_active` for an existing, inactive restaurant
                if ($check_name) {
                    $this->Generic_model->updateGenericData(
                        'restaurants',
                        array('restaurant_id' => $check_name[0]->restaurant_id),
                        array('is_active' => ACTIVATE, 'restaurant_name' => $restaurant_name)
                    );
                }

                if ($check_code) {
                    $this->Generic_model->updateGenericData(
                        'restaurants',
                        array('restaurant_id' => $check_code[0]->restaurant_id),
                        array('is_active' => ACTIVATE, 'restaurant_code' => $restaurant_code)
                    );
                }

                $data = array(
                    'status' => 200,
                    'data' => 'Restaurant Reactivated and Updated'
                );
            }
        } else {
            // Update restaurant details
            $restaurant_detail = array(
                'restaurant_name' => $restaurant_name,
                'restaurant_code' => $restaurant_code,
                'dashboard_url' => $dashboard_url,
                'contact_email' => $contact_email,
                'contact_phone' => $contact_phone,
                'manager_email' => $manager_email,
                'manager_phone' => $manager_phone,
                'update_time' => time(),
                'updated_by' => $this->user_id,
                'is_active' => ACTIVATE
            );

            $this->Generic_model->updateGenericData('restaurants', array('restaurant_id' => $restaurant_id), $restaurant_detail);

            $data = array(
                'status' => 200,
                'data' => 'Restaurant Updated Successfully'
            );
        }
    }

    echo json_encode($data);
}




    /*==========CUSTOMER===========*/

    /*function to View Dashboard*/
    public function customer(){

        /*Get all Country List*/
        $country_data = $this->Generic_model->getGenericData('country',array('is_active'=>ACTIVATE));
        $data['country_data'] = $country_data;


        $this->load->view('header');
        $this->load->view('admin/customer',$data);
        $this->load->view('footer');
    }

    //Add New Company
    public function add_company()
    {
        // Form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('comp_email', 'Customer Email', 'max_length[128]|xss_clean');
        $this->form_validation->set_rules('comp_name', 'Customer Name', 'required|xss_clean');
        $this->form_validation->set_rules('comp_phone', 'Customer Phone', 'max_length[16]|xss_clean');
        $this->form_validation->set_rules('comp_country_id', 'Country', 'required|xss_clean');
    
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $data = array(
                'status' => 205,
                'data' => $errors
            );
        } else {
            $comp_email = strtolower($this->input->post('comp_email'));
            $comp_name = $this->input->post('comp_name');
            $comp_phone = $this->input->post('comp_phone');
            $company_country = $this->input->post('comp_country_id'); // Country ID from dropdown
    
            $check_comp_name = $this->Generic_model->getGenericData('company', array('company_name' => $comp_name, 'is_active' => ACTIVATE));
            if (!$check_comp_name) {
                // Add company details
                $company_detail = array(
                    'company_name' => $comp_name,
                    'company_phone' => $comp_phone,
                    'company_email' => $comp_email,
                    'company_country_id' => $company_country,
                    'created_by' => $this->user_id,
                    'creation_time' => time(),
                    'updated_by' => $this->user_id,
                    'update_time' => time(),
                    'is_active' => ACTIVATE,
                );
    
                $company_id = $this->Generic_model->addGenericData('company', $company_detail);
    
                // Handle restaurant data
                $restaurants = json_decode($this->input->post('restaurant_names'));
                $urls = json_decode($this->input->post('restaurant_urls'));
                $statuses = json_decode($this->input->post('restaurant_statuses'));
    
                if ($restaurants) {
                    for ($i = 0; $i < count($restaurants); $i++) {
                        $restaurant_data = array(
                            'company_id' => $company_id,
                            'restaurant_name' => $restaurants[$i],
                            'restaurant_url' => $urls[$i],
                            'is_active' => ACTIVATE ,
                            'is_published' => ($statuses[$i] == 'activate' ? ACTIVATE : DEACTIVATE),

                            'created_by' => $this->user_id,
                            'creation_time' => time(),
                            'updated_by' => $this->user_id,
                            'update_time' => time(),
                        );
                        $this->Generic_model->addGenericData('comp_restaurant', $restaurant_data);
                    }
                }
    
                $data = array(
                    'status' => 200,
                    'data' => 'Company and Restaurants Added Successfully.'
                );
            } else {
                $data = array(
                    'status' => 403,
                    'data' => 'Company Name Already Added.'
                );
            }
        }
    
        echo json_encode($data);
    }

   
    

    

    
    
    
    
    

    /*edit Sub Admin*/
    public function edit_company(){
        $company_id = $this->input->post('company_id');
        if($company_id){

            $get_detail = $this->Common_model->get_customer_details($company_id);
            if($get_detail){

                if ($get_detail[0]->customer_logo) {
                    $image = UPLOAD_PATH.$get_detail[0]->customer_logo;
                } else {
                    $image = IMAGE_PATH.'codi_img.png';
                }

                $data = array(
                    'status' => 200,
                    'data' => $get_detail,
                    'image' => $image,
                );
            }else{
                $data = array(
                    'status' => 401,
                    'data' => 'Something Went Wrong, Please Try Again Later.',
                );
            }
        }
        echo json_encode($data);
    }

    //View all company List
    public function all_company_list(){

        $limit=$this->input->post('limit');
        $searchkeyword=$this->input->post('searchkeyword');

        $total_count = $this->Common_model->all_company_list_count($searchkeyword);
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $total_count;
        $config["per_page"] = $limit;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item page-link">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item page-link" aria-hidden="true">';
        $config['next_tag_close']   =  '</li>';
        $config['prev_tag_open']    = '<li class="page-item page-link">';
        $config['prev_tag_close']   =  '</li>';
        $config['first_tag_open']   = '<li class="page-item page-link">';
        $config['first_tag_close']  =  '</li>';
        $config['last_tag_open']    = '<li class="page-item page-link">';
        $config['last_tag_close']   =  '</li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);
        $offset = ($page - 1) * $config["per_page"];

        $allCompanies= $this->Common_model->all_company_list($limit,$offset,$searchkeyword);
        $html='';
        $count=$offset;
        if($allCompanies) {
            foreach($allCompanies as $allCompanies){

                $html.='<tr>';
                $html.='<td>'.$allCompanies->customer_id.'</td>';
                $html.='<td>'.$allCompanies->customer_name.'</td>';
                $html.='<td>'.$allCompanies->customer_email.'</td>';
                $html.='<td>'.$allCompanies->customer_phone.'</td>';
                $html.='<td>'.$allCompanies->short_name.'</td>';
                $html.='<td>'.date('m-d-Y h:i A',$allCompanies->update_time).'</span></td>';
                $html .= '<td><span class="pr-2 edit-btn"><i class="fas fa-pencil-alt" aria-hidden="true" title="Edit"  data-toggle="modal" data-target="#modal_edit_user" onclick="edit_company(' . $allCompanies->customer_id . ')" style="cursor: pointer"></i></span>';
                $html .= '<span class="delete-btn" data-toggle="modal" data-target="#delete_company" onclick="delete_company_alert(' . $allCompanies->customer_id . ')"><i class="fas fa-trash text-danger" title="Delete" style="cursor: pointer"></i></span';
                $html .= '</td>';
                $html.='</tr>';
            }

            $pagination=$this->pagination->create_links();

        } else{
            $pagination='';
            $html='<tr><td colspan="9">No Customers Found</td></tr>';
        }

        $data = array(
            'status' => 200,
            'data' => $html,
            'pagination'=>$pagination,
            'total_count'=>$total_count
        );
        echo json_encode($data);

    }

    //Update Company
    public function update_company()
    {
        //this form validation
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('comp_name', 'Customer Name', 'required|xss_clean');
        $this->form_validation->set_rules('comp_phone', 'Customer Phone ', 'max_length[16]|xss_clean');
        $this->form_validation->set_rules('comp_country_id', 'Country', 'xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $data = array(
                'status' => 205,
                'data' => $errors
            );
        } else {
            $company_id = $this->input->post('company_id');
            $comp_name = $this->input->post('comp_name');
            $comp_phone = $this->input->post('comp_phone');
            $company_country = $this->input->post('comp_country_id');
            $comp_email = $this->input->post('comp_email');

            $check_comp_name=$this->Generic_model->getGenericData('customer', array('customer_name' => $comp_name,'customer_id !=' => $company_id,'is_active' => ACTIVATE));
            if(!$check_comp_name) {

                $company_detail = $this->Generic_model->getGenericData('customer',array('customer_id' => $company_id));

                $comp_logo = $company_detail[0]->customer_logo;
                if (!empty($_FILES['comp_logo']['name'])) {
                    $comp_logo = upload_file('comp_logo');
                }

                $update_detail = array(
                    'customer_name' => $comp_name,
                    'customer_country_id' => $company_country,
                    'customer_phone' => $comp_phone,
                    'customer_email' => $comp_email,
                    'customer_logo' => $comp_logo,
                );
                $where = array(
                    'customer_id' => $company_id,
                );
                $this->Generic_model->updateGenericData('customer', $where, $update_detail);

                $data = array(
                    'status' => 200,
                    'data' => 'Customer Updated Successfully.'
                );

            } else {
                $data = array(
                    'status' => 403,
                    'data' => 'Customer Name Already Added.'
                );
            }
        }
        echo json_encode($data);
    }

    /*Company Name*/
    public function company_name($company_id = null){

        $where = array(
            'customer_id' => $company_id
        );

        $get_detail = $this->Generic_model->getGenericData('customer',$where);

        if($get_detail){

            echo json_encode($get_detail[0]->customer_name);

        }else{
            echo '';
        }

    }

    /*Delete Company*/
    public function delete_company(){

        $company_id = $this->input->post('company_id');

        $removeData = $this->Generic_model->updateGenericData('customer',array('customer_id' => $company_id),array('is_active' => DEACTIVATE));
        if($removeData){
            $data = array(
                'status' => 200,
                'data' => 'Customer Deleted Successfully.'
            );
        }else{
            $data = array(
                'status' => 201,
                'data' => 'Failed to delete, try again later'
            );
        }
        echo json_encode($data);

    }





    /*==========COMPANY===========*/



    public function get_restaurants() {
        $session_user_id = $this->user_id; 
    $company_id = $this->Common_model->get_company_id_by_user($session_user_id);
        log_message('debug', 'Company ID: ' . $company_id);  
        if ($company_id) {
            $restaurants = $this->Common_model->get_restaurants_by_company($company_id);
            echo json_encode($restaurants);
        } else {
            echo json_encode([]);
        }
    }


    public function add_user() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $session_user_id = $this->user_id; 

    $company_id = $this->Common_model->get_company_id_by_user($session_user_id);
            $first_name = ucwords($this->input->post('first_name'));
            $email = strtolower($this->input->post('email'));
            $password = 12345;

            $data = [
                // 'user_id' => $this->user_id,
                'first_name' => $this->input->post('f_name'),
                'last_name' => $this->input->post('l_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'account_verified' => 1,
                'active' => 1,
                
            ];

            $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = 3));

            if ($status) {
                
                $data = [
                    'user_id' => $status,    
                    'company_id' => $company_id ,
                    'comp_restaurant_id' => $this->input->post('restaurant'),
                    'update_time' => time(),
                    'updated_by' => $this->user_id,
                    'is_active' => ACTIVATE,
                ];

                $this->Common_model->insert_user($data);

            
            } else {
                $this->session->set_flashdata('error', 'Failed to submit the claim. Please try again.');
            }

            redirect('Dashboard/comp_users'); 
        }
    }

    public function deactivate_company($company_id) {
        $updated_by = $this->session->userdata('user_id'); 
        $result = $this->Common_model->deactivate_company($company_id, $updated_by);

    
        if ($result) {
            $result = $this->Common_model->deactivate_company_and_users($company_id, $updated_by);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to deactivate the company']);
        }
    }
    

    public function deactivate_user($user_id) {
       
    
        $result = $this->Common_model->deactivate_user($user_id);

    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to deactivate the company']);
        }
    }


   

    public function company_onboarding()
    {
        $data = [
            'first_name' => $this->input->post('quest_fname'),
            'last_name' => $this->input->post('quest_lname'),
            'email' => $this->input->post('quest_email'),
            'phone' => $this->input->post('quest_phone'),
            'contact_method' => $this->input->post('contactMethod'),
            'other_contact_method' => $this->input->post('other_contact_method'),
            'multiple_restaurants' => $this->input->post('multipleRestaurant'),
            'restaurant_name' => $this->input->post('quest_restaurant_name'),
            'is_toast_pos' => $this->input->post('isToast'),
            'ssh_data_export' => $this->input->post('sshDataExport'),
            'help_turn_on_ssh' => $this->input->post('helpTurnOn'),
            'monthly_forecast' => $this->input->post('monthlyForecast'),
            'revenue_jan_target' => $this->input->post('revenue_jan_target'),
            'revenue_feb_target' => $this->input->post('revenue_feb_target'),
            'revenue_mar_target' => $this->input->post('revenue_march_target'),
            'revenue_apr_target' => $this->input->post('revenue_apr_target'),
            'revenue_may_target' => $this->input->post('revenue_may_target'),
            'revenue_jun_target' => $this->input->post('revenue_jun_target'),
            'revenue_jul_target' => $this->input->post('revenue_july_target'),
            'revenue_aug_target' => $this->input->post('revenue_aug_target'),
            'revenue_sep_target' => $this->input->post('revenue_sep_target'),
            'revenue_oct_target' => $this->input->post('revenue_oct_target'),
            'revenue_nov_target' => $this->input->post('revenue_nov_target'),
            'revenue_dec_target' => $this->input->post('revenue_dec_target'),
            'labor_target' => $this->input->post('laborTarget'),
            'overall_labor_target' => $this->input->post('labor_perct_target'),
            'foh_labor_target' => $this->input->post('foh_labor'),
            'boh_labor_target' => $this->input->post('boh_labor'),
            'salary_include' => $this->input->post('salaryInclude'),
            'foh_salary_amount' => $this->input->post('foh_amount'),
            'boh_salary_amount' => $this->input->post('boh_name'),
            'cogs_target' => $this->input->post('cogsTarget'),
            'food_cogs' => $this->input->post('food_cogs'),
            'pastry_cogs' => $this->input->post('pastry_cogs'),
            'beer_cogs' => $this->input->post('beer_cogs'),
            'wine_cogs' => $this->input->post('wine_cogs'),
            'liquor_cogs' => $this->input->post('liquor_cogs'),
            'bev_coffee_cogs' => $this->input->post('bev_coffee_cogs'),
            'smallware_cogs' => $this->input->post('smallware_cogs'),
            'other_cogs' => $this->input->post('other_cogs'),
            'other_platform' => $this->input->post('other_platform'),
                'creation_time' => time(),
                'update_time' => time(),
                'created_by' => $this->session->userdata('user_id'),
                'updated_by' => $this->session->userdata('user_id'),
                'is_active' => ACTIVATE,
        ];

        $this->Common_model->insertData($data);

        $this->session->set_flashdata('success', 'Form submitted successfully!');
        redirect('Dashboard/restaurant_onboarding');
    }

















    // report expense /////////////////////////////////








    public function save_expense()
    {
        $restaurant_name = $this->input->post('restaurant_name');
        $restaurant_id = $this->input->post('restaurant_id');
        $email = $this->input->post('email');
        $expense_date = $this->input->post('expense_date');
        $expense_type = $this->input->post('expense_types');



        $report_expense_data = [
            'restaurant_name' => $restaurant_name,
            'restaurant_id' => $restaurant_id,            
            'email' => $email,
            'expense_date' => $expense_date,
            'expense_type' => $expense_type,
            'creation_time' => time(),
            'update_time' => time(),
            'created_by' => $this->session->userdata('user_id'),
            'updated_by' => $this->session->userdata('user_id'),
            'is_active' => ACTIVATE,
        ];

        $report_expense_id = $this->Common_model->insert_report_expense($report_expense_data);
        

        switch ($expense_type) {
            case '2':
                if (!empty($_FILES['invoice_file']['name'])) {
                    $invoice = upload_file('invoice_file');
                    
                    if ($invoice === 'No file selected.') {
                        log_message('error', 'No file selected for upload.');
                    } elseif (strpos($invoice, 'File upload failed:') === 0) {
                        log_message('error', 'File upload failed: ' . $invoice);
                    } else {
                        $invoice_data = [
                            'invoice_file' => $invoice,
                            // 'invoice_date' => $this->input->post('invoice_date'),
                            'beer_expense' => $this->input->post('beerAmount'),
                            'liquor_expense' => $this->input->post('liquorAmount'),
                            'wine_expense' => $this->input->post('wineAmount'),
                            'beverage_expense' => $this->input->post('naBeverageAmount'),
                            'food_expense' => $this->input->post('foodAmount'),
                            'pastry_expense' => $this->input->post('pastryAmount'),
                            'retail_expense' => $this->input->post('retailAmount'),
                            'expense_id' => $report_expense_id,
                        ];
                
                        $this->Common_model->insert_invoice($invoice_data);
                    }
                }
                
                break;

            case '1':
                $salary_data = [
                    'yearly_salary' => $this->input->post('salaryAmount'),
                    'expense_id' => $report_expense_id,
                ];
                $this->Common_model->insert_salary($salary_data);
                break;

            case '3':
                $one_time_data = [
                    'one_time_category' => $this->input->post('oneTimeCategory'),
                    'one_time_amount' => $this->input->post('oneTimeAmount'),
                    'expense_id' => $report_expense_id,
                ];
                $this->Common_model->insert_one_time_expense($one_time_data);
                break;

            case '4':
                $other_data = [
                    'other_expense_description' => $this->input->post('otherExpense'),
                    'other_expense_amount' => $this->input->post('otherExpenseAmount'),
                    'expense_id' => $report_expense_id,
                ];
                $this->Common_model->insert_other_expense($other_data);
                break;
        }

        redirect('Dashboard/report_an_expense_list');  
    }

    public function get_restaurants_by_company_id() {
        $company_id = $this->input->get('company_id');
    
        if (!$company_id) {
            echo json_encode([]);
            return;
        }
    
        $restaurants = $this->Common_model->get_restaurants_by_company($company_id);
    
        // Return the  as a JSON response
        echo json_encode($restaurants);
    }
    


    public function edit_expense($expense_id){
    $expense = $this->Common_model->get_expense_by_id($expense_id);

    if (empty($expense)) {
        redirect('Dashboard/report_an_expense_list');
        return;
    }

    $restaurant_name = $this->input->post('restaurant_name');
    $email = $this->input->post('email');
    $expense_date = $this->input->post('expense_date');
    $expense_type = $this->input->post('expense_type');

    // Prepare data for report_expense table
    $report_expense_data = [
        'restaurant_name' => $restaurant_name,
        'email' => $email,
        'expense_date' => $expense_date,
        'expense_type' => $expense_type,
        'update_time' => time(),
        'updated_by' => $this->session->userdata('user_id'),
    ];

    // Update report expense
    $this->Common_model->update_report_expenses($expense_id, $report_expense_data);

    // Handle different types of expenses
    switch ($expense_type) {
        case '2': // Invoice
            $invoice_data = [
                'invoice_file' => $this->input->post('invoice_file'),
                'invoice_date' => $this->input->post('invoice_date'),
                'beer_expense' => $this->input->post('beerAmount'),
                'liquor_expense' => $this->input->post('liquorAmount'),
                'wine_expense' => $this->input->post('wineAmount'),
                'beverage_expense' => $this->input->post('naBeverageAmount'),
                'food_expense' => $this->input->post('foodAmount'),
                'pastry_expense' => $this->input->post('pastryAmount'),
                'retail_expense' => $this->input->post('retailAmount'),
            ];
            $this->Common_model->update_invoice($expense_id, $invoice_data);
            break;

        case '1': // Salary
            $salary_data = [
                'yearly_salary' => $this->input->post('salaryAmount'),
            ];
            $this->Common_model->update_salary($expense_id, $salary_data);
            break;

        case '3': // One-time expense
            $one_time_data = [
                'one_time_category' => $this->input->post('oneTimeCategory'),
                'one_time_amount' => $this->input->post('oneTimeAmount'),
            ];
            $this->Common_model->update_one_time_expense($expense_id, $one_time_data);
            break;

        case '4': // Other expense
            $other_data = [
                'other_expense_description' => $this->input->post('otherExpense'),
                'other_expense_amount' => $this->input->post('otherExpenseAmount'),
            ];
            $this->Common_model->update_other_expense($expense_id, $other_data);
            break;
    }

    // Redirect to the expense list page after updating
    redirect('Dashboard/report_an_expense_list');
}

        
        

    private function upload_invoice()
    {
        // Upload the invoice file
        if ($_FILES['invoiceFile']['name'] != '') {
            $config['upload_path'] = './uploads/invoices/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx|xls|xlsx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('invoiceFile')) {
                $upload_data = $this->upload->data();
                return $upload_data['file_name'];
            } else {
                // Handle error
                return null;
            }
        }
        return null;
    }


    public function deactivate_restaurant_onboarding() {
        $restaurant_id = $this->input->post('restaurant_id');
    
        if ($restaurant_id) {
            $this->db->where('comp_onboarding_id', $restaurant_id);
            $this->db->update('comp_onboarding', ['is_active' => 0]); // Set 'is_active' to 0 for deactivation
    
            if ($this->db->affected_rows() > 0) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }






    public function deactivate_expense() {
        // Get the expense ID from POST data
        $expense_id = $this->input->post('expense_id');
        
        // Check if expense_id is provided
        if (!$expense_id) {
            echo json_encode(['success' => false, 'message' => 'No expense ID provided']);
            return;
        }
        
        // Attempt to update the record in the database
        try {
            $data = array(
                'is_active' => 0,
            );
            
            $this->db->where('report_expense_id', $expense_id);
            $query = $this->db->get('report_expense');
            
            if ($query->num_rows() == 0) {
                echo json_encode(['success' => false, 'message' => 'Expense not found']);
                return;
            }
    
            // Perform the update
            $this->db->where('report_expense_id', $expense_id);
            $this->db->update('report_expense', $data);
            
            if ($this->db->affected_rows() > 0) {
                // Success
                echo json_encode(['success' => true]);
            } else {
                // If no rows were affected, there might be an issue with the query
                echo json_encode(['success' => false, 'message' => 'No changes made']);
            }
    
        } catch (Exception $e) {
            // Log the error for debugging
            log_message('error', 'Error deactivating expense: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'An error occurred while deleting the expense.']);
        }
    }









// Controller
public function get_user_by_id() {
    $user_id = $this->input->get('user_id');
    $user_data = $this->Common_model->get_user_by_id($user_id);
    echo json_encode($user_data);
}

public function get_restaurant() {
    $company_id = $this->input->post('company_id');
    $restaurants = $this->Common_model->get_restaurants_by_companys($company_id);
    echo json_encode($restaurants);
}




public function edit_user() {
    $user_id = $this->input->post('user_id');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');
    $designation = $this->input->post('designation');
    $company_id = $this->input->post('company_id');
    $restaurant_id = $this->input->post('edit_restaurant_id');
    $user_role = $this->input->post('user_role');

    $data = [
        'username' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone' => $phone,
        'designation' => $designation,
    ];

    $this->Common_model->update_user($user_id, $data);

    $company_restaurant_data = [
        'company_id' => $company_id,
        'comp_restaurant_id' => $restaurant_id,
    ];

    $this->Common_model->update_company_user($user_id, $company_restaurant_data);

    redirect('Dashboard/comp_users');
}



//////////////////////////////  update customers ////////////

public function get_company_details() {
    $company_id = $this->input->get('company_id');
    
    $company = $this->Common_model->get_company_by_id($company_id);
    
    $restaurants = $this->Common_model->get_restaurant_by_company($company_id);
    $countries = $this->Common_model->get_all_countries();


    $response = [
        'company' => $company,
        'restaurants' => $restaurants,
        'countries' => $countries // Add countries to the response

    ];

    // Return the data as JSON
    echo json_encode($response);
}




public function edit_customer() {
    $company_id = $this->input->post('company_id');
    $company_name = $this->input->post('comp_name');
    $company_email = $this->input->post('comp_email');
    $company_phone = $this->input->post('comp_phone');
    $country_id = $this->input->post('comp_country_id');
    
    $this->Common_model->update_company($company_id, $company_name, $company_email, $company_phone, $country_id);

    $restaurants = json_decode($this->input->post('restaurants'), true);
    foreach ($restaurants as $restaurant) {
        if ($restaurant['id']) {
            $this->Common_model->update_restaurant($restaurant['id'], $restaurant['name'], $restaurant['url'], $restaurant['status']);
        } else {
            // Add new restaurant
            $this->Common_model->add_restaurant($company_id, $restaurant['name'], $restaurant['url'], $restaurant['status']);
        }
    }

    echo json_encode(['status' => 'success']);
}




public function deactivate_restaurant()
{
    $restaurant_id = $this->input->post('restaurant_id');  // Get the restaurant_id from the AJAX request

    if (!$restaurant_id) {
        echo json_encode(['status' => 'error', 'message' => 'Restaurant ID is required']);
        return;
    }

    $result = $this->Common_model->deactivate_restaurant($restaurant_id);

    // Return the result from the model to the user
    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to deactivate restaurant']);
    }
}














    
    
    //////////////////////////////////// edit onboarding ////////////////////////////


    public function update_restaurant_onboarding($onboarding_id) {
        // Validate form data (you can add more validation rules as needed)
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the edit page with errors
            $this->edit_restaurant_onboarding($onboarding_id);
        } else {
            // If validation passes, prepare data for update
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'contact_method' => $this->input->post('contact_method'),
                'other_contact_method' => $this->input->post('other_contact_method'),
                'multiple_restaurants' => $this->input->post('multiple_restaurants'),
                'restaurant_name' => $this->input->post('restaurant_name'),
                'is_toast_pos' => $this->input->post('is_toast_pos'),
                'ssh_data_export' => $this->input->post('ssh_data_export'),
                'help_turn_on_ssh' => $this->input->post('help_turn_on_ssh'),
                'monthly_forecast' => $this->input->post('monthly_forecast'),
                'revenue_jan_target' => $this->input->post('revenue_jan_target'),
                'revenue_feb_target' => $this->input->post('revenue_feb_target'),
                'revenue_mar_target' => $this->input->post('revenue_mar_target'),
                'revenue_apr_target' => $this->input->post('revenue_apr_target'),
                'revenue_may_target' => $this->input->post('revenue_may_target'),
                'revenue_jun_target' => $this->input->post('revenue_jun_target'),
                'revenue_jul_target' => $this->input->post('revenue_jul_target'),
                'revenue_aug_target' => $this->input->post('revenue_aug_target'),
                'revenue_sep_target' => $this->input->post('revenue_sep_target'),
                'revenue_oct_target' => $this->input->post('revenue_oct_target'),
                'revenue_nov_target' => $this->input->post('revenue_nov_target'),
                'revenue_dec_target' => $this->input->post('revenue_dec_target'),
                'labor_target' => $this->input->post('labor_target'),
                'overall_labor_target' => $this->input->post('overall_labor_target'),
                'foh_labor_target' => $this->input->post('foh_labor_target'),
                'boh_labor_target' => $this->input->post('boh_labor_target'),
                'salary_include' => $this->input->post('salary_include'),
                'foh_salary_amount' => $this->input->post('foh_salary_amount'),
                'boh_salary_amount' => $this->input->post('boh_salary_amount'),
                'cogs_target' => $this->input->post('cogs_target'),
                'food_cogs' => $this->input->post('food_cogs'),
                'pastry_cogs' => $this->input->post('pastry_cogs'),
                'beer_cogs' => $this->input->post('beer_cogs'),
                'wine_cogs' => $this->input->post('wine_cogs'),
                'liquor_cogs' => $this->input->post('liquor_cogs'),
                'bev_coffee_cogs' => $this->input->post('bev_coffee_cogs'),
                'smallware_cogs' => $this->input->post('smallware_cogs'),
                'other_cogs' => $this->input->post('other_cogs'),
                'other_platform' => $this->input->post('other_platform')
            );

            $this->Common_model->update_onboarding($onboarding_id, $data);

            $this->session->set_flashdata('success', 'Onboarding data updated successfully!');

            redirect('Dashboard/restaurant_onboarding');
        } 
    

 
        }
    
    
    


        
    
        public function export_expense_report() {
            $user_id = $this->user_id;
            $role_id = $this->role_id;
        
            if ($role_id == 1) {
                $get_emp_data = $this->Common_model->get_expenses_list_for_csv();
            } 
            elseif ($role_id == 2) {
                $company_id = $this->Common_model->get_company_id_by_user($user_id);
                $get_emp_data =$this->Common_model->expenses_list_by_company_for_csv($company_id);
            }else {
                $get_emp_data = $this->Common_model->expenses_list_for_csv($user_id);
            }
        
            // Log the data to check its contents
            log_message('error', print_r($get_emp_data, true));
        
            // Check if the data is empty or does not contain the required keys
            if (empty($get_emp_data)) {
                die("No data found.");
            }
        
            $this->excel->setActiveSheetIndex(0);
            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
        
            $this->excel->getActiveSheet()->setTitle('EXPENSE REPORT');
            PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
            $exceldata = array();
        
            $row = array(
                'A' => 'Restaurant Name', 
                'B' => 'Expense Date',
                'C' => 'Beer Expense',
                'D' => 'Liquor Expense',
                'E' => 'Wine Expense',
                'F' => 'Beverage Expense',
                'G' => 'Food Expense',
                'H' => 'Pastry Expense',
                'I' => 'Retail Expense',
            );
            $exceldata[] = $row;
        
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:I1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '02428d')
                    ),
                    'font' => array(
                        'color' => array('rgb' => 'ffffff')
                    ),
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => 'FFFFFF')
                        )
                    )
                )
            );
        
            for ($i = 0; $i < count($get_emp_data); $i++) {
                $row = array(
                    'A' => $get_emp_data[$i]['restaurant_name'], 
                    'B' => $get_emp_data[$i]['expense_date'],
                    'C' => $get_emp_data[$i]['beer_expense'],
                    'D' => $get_emp_data[$i]['liquor_expense'],
                    'E' => $get_emp_data[$i]['wine_expense'],
                    'F' => $get_emp_data[$i]['beverage_expense'],
                    'G' => $get_emp_data[$i]['food_expense'],
                    'H' => $get_emp_data[$i]['pastry_expense'],
                    'I' => $get_emp_data[$i]['retail_expense'],

                );
                $exceldata[] = $row;
            }
        
            $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A1');
            $this->excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);
        
            // Auto size columns for each worksheet
            foreach (range('A', $this->excel->getActiveSheet()->getHighestDataColumn()) as $col) {
                $this->excel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }
        
            $filename = 'EXPENSE_REPORT.xls'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
        
            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        
            ob_end_clean();
            ob_start();
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
        }


  



        public function approve_restaurant_onboarding() {
            $onboarding_id = $this->input->post('onboarding_id');
        
            if ($onboarding_id) {
                $approved = $this->Common_model->approve_restaurant($onboarding_id);
        
                if ($approved) {

                    $onboarding_data = $this->Common_model->get_onboarding_details($onboarding_id);
                    log_message('info', 'Onboarding Data: ' . print_r($onboarding_data, true)); // This logs the onboarding data
        
                    // Check if the data exists for the given onboarding_id
                    if ($onboarding_data) {
                        $first_name = ucwords($onboarding_data->first_name);
                        $last_name = ucwords($onboarding_data->last_name);
                        $email = strtolower($onboarding_data->email);
                        $phone = $onboarding_data->phone_number;
        
                        $password = 12345; // Default password (can be changed as per your requirements)
                        $data = [
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'phone' => $phone,
                            'account_verified' => 1,
                            'active' => 1,
                        ];
        
                        $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = 2));

        
                        if ($status) {
                            $company_id = $onboarding_data->comp_onboarding_id;
                            $user_data = [
                                'user_id' => $status,
                                'company_id' =>  $company_id,
                                'update_time' => time(),
                                'updated_by' => $this->user_id,
                                'is_active' => ACTIVATE,
                            ];
        
                            $this->Common_model->insert_user($user_data);
                            echo json_encode(['status' => 'success', 'message' => 'Restaurant approved and user created successfully']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to create the user']);
                        }
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Onboarding data not found']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to approve restaurant']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
            }
        }


        // public function update_company_by_id($company_id) {
        //     $company_data = array(
        //         'first_name' => $this->input->post('quest_fname'),
        //         'last_name' => $this->input->post('quest_lname'),
        //         'email' => $this->input->post('quest_email'),
        //         'phone_number' => $this->input->post('quest_phone'),
        //         'preferred_contact_method' => $this->input->post('contactMethod'),
        //         'other_contact_method' => $this->input->post('other_contact_method'),
        //         'company_name' => $this->input->post('company_name'),
        //         'restaurant_count' => $this->input->post('restaurant'),              
        //         'is_toast' => $this->input->post('isToast'),
        //         'ssh_data_export' => $this->input->post('sshDataExport'),
        //         'help_turn_on' => $this->input->post('helpTurnOn'),
        //         'other_platform' => $this->input->post('other_platform'),
        //     );
    
        //     // Update company data
        //     $this->Common_model->update_company($company_id, $company_data);
    
        //     // Update restaurant data (loop through restaurants and update their details)
        //     $restaurant_count = $this->input->post('restaurant');
        //     for ($i = 1; $i <= $restaurant_count; $i++) {
        //         $restaurant_data = array(
        //             'restaurant_name' => $this->input->post("restaurant_name_$i"),
        //             'location' => $this->input->post("restaurant_location_$i"),
        //             'revenue_jan_target' => $this->input->post("revenue_jan_target_$i"),
        //             'revenue_feb_target' => $this->input->post("revenue_feb_target_$i"),
        //             'revenue_mar_target' => $this->input->post("revenue_march_target_$i"),
        //             'revenue_apr_target' => $this->input->post("revenue_apr_target_$i"),
        //             'revenue_may_target' => $this->input->post("revenue_may_target_$i"),
        //             'revenue_jun_target' => $this->input->post("revenue_jun_target_$i"),
        //             'revenue_jul_target' => $this->input->post("revenue_july_target_$i"),
        //             'revenue_aug_target' => $this->input->post("revenue_aug_target_$i"),
        //             'revenue_sep_target' => $this->input->post("revenue_sep_target_$i"),
        //             'revenue_oct_target' => $this->input->post("revenue_oct_target_$i"),
        //             'revenue_nov_target' => $this->input->post("revenue_nov_target_$i"),
        //             'revenue_dec_target' => $this->input->post("revenue_dec_target_$i"),
        //             'labor_perct_target' => $this->input->post("labor_perct_target_$i"),
        //             'foh_labor' => $this->input->post("foh_labor_$i"),
        //             'boh_labor' => $this->input->post("boh_labor_$i"),
        //             'salary_include' => $this->input->post("salaryInclude_$i"),
        //             'foh_amount' => $this->input->post("foh_amount_$i"),
        //             'boh_amount' => $this->input->post("boh_amount_$i"),
        //             'food_cogs' => $this->input->post("food_cogs_$i"),
        //             'pastry_cogs' => $this->input->post("pastry_cogs_$i"),
        //             'beer_cogs' => $this->input->post("beer_cogs_$i"),
        //             'wine_cogs' => $this->input->post("wine_cogs_$i"),
        //             'liquor_cogs' => $this->input->post("liquor_cogs_$i"),
        //             'bev_coffee_cogs' => $this->input->post("bev_coffee_cogs_$i"),
        //             'smallware_cogs' => $this->input->post("smallware_cogs_$i"),
        //             'other_cogs' => $this->input->post("other_cogs_$i"),
        //         );
    
        //         // Update restaurant data
        //         $this->Common_model->update_restaurant($company_id, $restaurant_data);
        //     }
    
        //     // Redirect after updating
        //     redirect('company/edit_company/' . $company_id);
        // }

        public function update_location_details() {
            $restaurant_details_id = $this->input->post('restaurant_details_id');
    
            $data = array(
                'restaurant_name' => $this->input->post('restaurant_name'),
                'location' => $this->input->post('restaurant_location'),
                'revenue_jan_target' => $this->input->post('revenue_jan_target'),
                'revenue_feb_target' => $this->input->post('revenue_feb_target'),
                'revenue_mar_target' => $this->input->post('revenue_mar_target'),
                'revenue_apr_target' => $this->input->post('revenue_apr_target'),
                'revenue_may_target' => $this->input->post('revenue_may_target'),
                'revenue_jun_target' => $this->input->post('revenue_jun_target'),
                'revenue_jul_target' => $this->input->post('revenue_jul_target'),
                'revenue_aug_target' => $this->input->post('revenue_aug_target'),
                'revenue_sep_target' => $this->input->post('revenue_sep_target'),
                'revenue_oct_target' => $this->input->post('revenue_oct_target'),
                'revenue_nov_target' => $this->input->post('revenue_nov_target'),
                'revenue_dec_target' => $this->input->post('revenue_dec_target'),
                'labor_perct_target' => $this->input->post('labor_perct_target'),
                'foh_labor' => $this->input->post('foh_labor'),
                'boh_labor' => $this->input->post('boh_labor'),
                'salary_include' => $this->input->post('editSalaryInclude'),
                'cogs_target' => $this->input->post("editCogsTarget"),

                'foh_amount' => $this->input->post('foh_amount'),
                'boh_amount' => $this->input->post('boh_amount'),
                'food_cogs' => $this->input->post('food_cogs'),
                'pastry_cogs' => $this->input->post('pastry_cogs'),
                'beer_cogs' => $this->input->post('beer_cogs'),
                'wine_cogs' => $this->input->post('wine_cogs'),
                'liquor_cogs' => $this->input->post('liquor_cogs'),
                'bev_coffee_cogs' => $this->input->post('bev_coffee_cogs'),
                'smallware_cogs' => $this->input->post('smallware_cogs'),
                'other_cogs' => $this->input->post('other_cogs'),
                'update_time' => time(),
                'updated_by' => $this->user_id,


            );
    
            $this->Common_model->update_restaurant($restaurant_details_id, $data);
    if($this->role_id ==1){redirect('Dashboard/customers');}else{redirect('Dashboard/view_locations');}
            
        }

        public function get_restaurant_by_company_id() {
         $company_id = $this->input->post('company_id'); // Get the selected restaurant_id from the POST request
        
            if ($company_id) {
              $locations = $this->Common_model->get_locations_by_restaurant($company_id);
                if (!empty($locations)) {
                    echo json_encode($locations); // Return locations as JSON
                } else {
                    log_message('debug', 'No locations found for restaurant_id: ' . $restaurant_id);
                    echo json_encode([]); // Return empty array if no locations are found
                }
            } else {
                echo json_encode([]); // Return empty array if no restaurant_id is provided
            }
        }

        public function create_user() {
            $f_name = $this->input->post('f_name');
            $l_name = $this->input->post('l_name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $company_id = $this->input->post('company_id');
            $user_type = $this->input->post('user_type');
        
            if ($user_type=='admin') {
               
        
                        $password = 12345; // Default password (can be changed as per your requirements)
                        $data = [
                            'first_name' => $f_name,
                            'last_name' => $l_name,
                            'email' => $email,
                            'phone' => $phone,
                            'account_verified' => 1,
                            'active' => 1,
                        ];
        
                        $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = 2));

        
                        if ($status) {
                            $user_data = [
                                'user_id' => $status,
                                'company_id' =>  $company_id,
                                'update_time' => time(),
                                'updated_by' => $this->user_id,
                                'is_active' => ACTIVATE,
                            ];
        
                            $this->Common_model->insert_user($user_data);
                            redirect('Dashboard/company_users');
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to create the user']);
                        }
                    
               
            } else {
                $restaurant_id = $this->input->post('restaurant_id');

                $password = 12345; // Default password (can be changed as per your requirements)
                $data = [
                    'first_name' => $f_name,
                    'last_name' => $l_name,
                    'email' => $email,
                    'phone' => $phone,
                    'account_verified' => 1,
                    'active' => 1,
                ];

                $status = $this->ion_auth->register($email, $password, $email, $data, array($group_id = 3));


                if ($status) {
                    $user_data = [
                        'user_id' => $status,
                        'company_id' =>  $company_id,
                        'comp_restaurant_id' => $restaurant_id,
                        'update_time' => time(),
                        'updated_by' => $this->user_id,
                        'is_active' => ACTIVATE,
                    ];

                    $this->Common_model->insert_user($user_data);
                    redirect('Dashboard/company_users');
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to create the user']);
                }            }
        }
    //==================== Report Revenue =================
    public function report_revenue(){
        $this->load->view('header');
        $this->load->view('admin/report_revenue');
        $this->load->view('admin_footer');
    }
        
        
        


        

        
        
        

    
    
    
    }



