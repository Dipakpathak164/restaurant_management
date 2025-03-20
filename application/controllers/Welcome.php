<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public $user_id;
    public $role_id;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

        $this->user_id = $this->session->userdata('user_id');
        $this->role_id = $this->session->userdata('user_role_id');
    }

    function __destruct()
    {
    }

    public function employer_after_signup(){

        $this->load->view('website/web_header');
        $this->load->view('website/employer_after_signup');
        $this->load->view('website/web_footer');

    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index(){
        $meta_data['title'] ='<title>Home | Restaurant management</title>';
        $this->load->view('website/web_header', $meta_data);
        $this->load->view('website/home');
        $this->load->view('website/web_footer');
    }

    public function product_details(){
        $this->load->view('website/web_header');
        $this->load->view('website/product_details');
        $this->load->view('website/web_footer');
    }
    /*View All Sub Categories Search for Home*/
 
  
 	/*Robot Page*/
	public function robot()
	{
		$this->load->view('website/robot');
	}

	/*Sitemap Page*/
	public function sitemap()
	{
		$this->load->view('website/sitemap');
	}

    public function all_state_list(){

        $state_id=$this->input->post('state_id');
        $country_id=$this->input->post('country_id');

        $state_detail = $this->Common_model->alphabetic_states($country_id);

        $html='<option value="" style="display:none;" selected>Select State</option>';
        if($state_detail) {
            for ($i = 0; $i < count($state_detail); $i++) {

                if ($state_id == $state_detail[$i]->state_id) {
                    $html.='<option value="'.$state_detail[$i]->state_id.'" selected>'.$state_detail[$i]->state_name.'</option>';
                } else {
                    $html.='<option value="'.$state_detail[$i]->state_id.'">'.$state_detail[$i]->state_name.'</option>';
                }

            }

        } else{
            $html='<option>No State Found</option>';
        }

        $data = array(
            'status' => 200,
            'data' => $html,
        );
        echo json_encode($data);

    }

    public function all_city_list(){

        $state_id=$this->input->post('state_id');
        $city_id=$this->input->post('city_id');

        $cities_detail = $this->Common_model->alphabetic_cities($state_id);

        $html='<option value="" style="display:none;" selected>Select</option>';
        if($cities_detail) {
            for ($i = 0; $i < count($cities_detail); $i++) {

                if ($city_id == $cities_detail[$i]->city_id) {
                    $html.='<option value="'.$cities_detail[$i]->city_id.'" selected>'.$cities_detail[$i]->city_name.'</option>';
                } else {
                    $html.='<option value="'.$cities_detail[$i]->city_id.'">'.$cities_detail[$i]->city_name.'</option>';
                }

            }

        } else{
            $html='<option>No Data Found</option>';
        }

        $data = array(
            'status' => 200,
            'data' => $html,
        );
        echo json_encode($data);

    }

    public function contact_us()
    { 
        $data['title'] = '<title>Contact Us | Getbreadcrumbs</title>
        <meta name="description" content="">
        <meta property="og:title" content="Contact Us | Getbreadcrumbs">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="'.base_url().'contact-us" />
        <meta name="twitter:description" content="">
        <meta name="twitter:title" content="Contact Us | Getbreadcrumbs" />';

        $country_detail = $this->Generic_model->getGenericData('country');
        $data_view['country_detail'] = $country_detail;

        $this->load->view('website/web_header',$data);
        $this->load->view('website/contact_us',$data_view);
        $this->load->view('website/web_footer');
    }

    public function submit_contact_us(){

        // Check validation for user input
        $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
        $this->form_validation->set_rules('contact_fname', 'Name', 'required|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('contact_email', 'Email', 'trim|min_length[10]|max_length[64]|xss_clean');
        $this->form_validation->set_rules('contact_phone', 'Phone', 'required|min_length[10]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('state_id', 'State', 'required|xss_clean');
        $this->form_validation->set_rules('city_id', 'City', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $errors = validation_errors();
            $data = array(
                'status' => 401,
                'data' => $errors
            );
            echo json_encode($data);


        }else {

            $contact_fname = $this->input->post('contact_fname');
            $contact_email = $this->input->post('contact_email');
            $contact_phone = $this->input->post('contact_phone');
            $contact_message = $this->input->post('contact_message');
            $state_id = $this->input->post('state_id');
            $city_id = $this->input->post('city_id');
            $lead_url = $this->input->post('lead_url');
            $ip_address         = $this->input->ip_address();

            $add_detail = array(
                'enquiry_name_pop_up' => $contact_fname,
                'enquiry_phone_pop_up' => $contact_phone,
                'enquiry_email_pop_up' => $contact_email,
                'enquiry_message_pop_up' => $contact_message,
                'creation_time' => time(),
                'is_active' => ACTIVATE,
            );
            $this->Generic_model->addGenericData('enquiry_form', $add_detail);

            $get_detail = $this->Generic_model->getGenericData('state', array('state_id'=>$state_id));

            $city_detail = $this->Generic_model->getGenericData('city', array('city_id'=>$city_id));

            rest_client($contact_fname,$contact_email,$contact_phone,'',$contact_message,$lead_url,$ip_address,$get_detail[0]->state_name,$city_detail[0]->city_name);

            /*send email to admin*/
            $email_data =  array(
                'name' => $contact_fname,
                'email' => $contact_email,
                'phone' => $contact_phone,
                'message' => $contact_message,
                'ip_address' => $ip_address,
                'lead_url' => $lead_url,

            );

            $message = $this->load->view('email_templates/contact_us', $email_data, true);
            /*send Notify email*/
            $urls = base_url(). 'Ashynch_task/send_email';
            $param1 = array(
                'send_to' => ADMIN_EMAILS,
                'message' => $message,
                'subject' => WEBSITE_NAME.' | Contact Us'. " | ".date('d-m-y H:i A',time())
            );
            $this->asynch_task->do_in_background($urls, $param1);

            /*send email to who submit*/
            $message = $this->load->view('email_templates/contact_us_confirm', $email_data, true);

            /*send Notify email*/
            $urls = base_url(). 'Ashynch_task/send_email';
            $param1 = array(
                'send_to' => $contact_email,
                'message' => $message,
                'subject' => WEBSITE_NAME.' | Feedback'. " | " .date('d-m-y H:i A',time()),
            );
            $this->asynch_task->do_in_background($urls, $param1);

            $data = array(
                'status' => 200,
                'data' => "Thanks For Contacting Us! We Will Be In Touch With You Shortly."
            );


        }
        echo json_encode($data);
    }

    public function services()
    {
        $data['title'] = '<title>Services |  Getbreadcrumbs</title>
        <meta name="description" content="">
        <meta property="og:title" content="Services |  Getbreadcrumbs">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="'.base_url().'contact-us" />
        <meta name="twitter:description" content="">
        <meta name="twitter:title" content="Services |  Getbreadcrumbs" />';

        $country_detail = $this->Generic_model->getGenericData('country');
        $data_view['country_detail'] = $country_detail;

        $this->load->view('website/web_header',$data);
        $this->load->view('website/services',$data_view);
        $this->load->view('website/web_footer');
    }

    public function thankyou()
    {
        $this->load->view('website/web_header');
        $this->load->view('website/thankyou');
        $this->load->view('website/web_footer');
    }

  
    public function our_team()
    {

        $data['title'] = '<title>Our Team | Getbreadcrumbs</title>
        <meta name="description" content="">
        <meta property="og:title" content="Our Team | Getbreadcrumbs">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="'.base_url().'our-team" />
        <meta name="twitter:description" content="">
        <meta name="twitter:title" content="Our Team | Getbreadcrumbs" />';

        $this->load->view('website/web_header',$data);
        $this->load->view('website/our_team');
        $this->load->view('website/web_footer');
    }

    public function about_us()
    {
        $data['title'] = '<title>About Us | Getbreadcrumbs</title>
        <meta name="description" content="">
        <meta property="og:title" content="About Us | Getbreadcrumbs">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="'.base_url().'about-us" />
        <meta name="twitter:description" content="">
        <meta name="twitter:title" content="About Us | Getbreadcrumbs" />';

        $this->load->view('website/web_header',$data);
        $this->load->view('website/about_us');
        $this->load->view('website/web_footer');
    }
    public function error_page()
    {
        $this->load->view('website/web_header');
        $this->load->view('website/error_page');
        $this->load->view('website/web_footer');
    }

    public function faq_content()
    {
        $this->load->view('website/web_header');
        $this->load->view('website/faq_content');
        $this->load->view('website/web_footer');
    }

    public function privacy_policy()
    {
        $this->load->view('website/web_header');
        $this->load->view('website/privacy_policy');
        $this->load->view('website/web_footer');
    }
    
    public function terms_condition()
    {
        $this->load->view('website/web_header');
        $this->load->view('website/terms_condition');
        $this->load->view('website/web_footer');
    }

    /*check if any users want to do wrong with any wrong url or null url*/
    public function redirector($url = NULL)
    {
        if ($url == NULL) {
            $referrer = $this->agent->referrer();
        } else {
            $referrer = base_url() . $url;
        }
        redirect($referrer, 'refresh');
    }


     /*=================BLOGS IN WEBSITE================*/

    /*blogs*/
    public function blogs(){

        $blogList= $this->Common_model->getAllBlogList($searchData=null,$searchStatus = null,$category_id = null,$date_range = null,$limit=4,$offset=null);
        $this->session->unset_userdata('checkAdded');
        $datap['blogList'] = $blogList;

        $category=$this->Generic_model->getGenericData('category',array('is_active'=>ACTIVATE));
        $datap['category'] = $category;

        $data['title'] = '<title>Matrix Venture Studio</title>';
        $data['metatags'] = '<meta name="description" content="" />
                                <meta property="og:title" content="">
                                <meta property="og:description" content="">
                                <meta property="og:type" content="website">
								<meta property="og:url" content="'.base_url().'blogs">
                                <meta property="og:image" content="'.IMAGE_PATH.'logo.png" />
                                <meta name="twitter:card" content="summary_large_image" />
                                <meta name="twitter:description" content="" />
                                <meta name="twitter:title" content="Matrix Venture Studio" />
                                <meta name="twitter:site" content="@TECHASOFT_BNGLR" />
                                <meta name="twitter:image" content="'.IMAGE_PATH.'logo.png" />
                                <link rel="canonical" href="'.base_url().'blogs" />';
        $this->load->view('website/web_header',$data);
        $this->load->view('website/blogs',$datap);
        $this->load->view('website/web_footer');
    }

    /*post*/
    public function post($blogUrl=null){
        $checkAdded=$this->session->userdata('checkAdded');
        //  $blog_id = base64_decode($blogId);
        $getBlog = $this->Generic_model->getGenericData('blogs', array('blog_url'=>$blogUrl,'is_active' => ACTIVATE));
        if ($getBlog) {

            if($checkAdded!=1) {
                //$blog_id=base64_decode($blogId);


                $total_view = $getBlog[0]->total_view;
                if ($total_view > 0) {
                    $total_views = $total_view + 1;
                } else {
                    $total_views = 1;
                }
                $this->Generic_model->updateGenericData('blogs', array('blog_url' => $blogUrl), array('total_view' => $total_views));
                $this->session->set_userdata('checkAdded', 1);
            }
            $blogList= $this->Generic_model->joinGenericData('blogs','created_by',$attr=null,'users','id',array('blog_url'=>$blogUrl,'is_active' => ACTIVATE));

            $datap['blogList'] = $blogList;
            $blog_id=$blogList[0]->blog_id;
            $datap['blog_id'] = $blog_id;
            $data['title'] = '<title>'.$blogList[0]->blog_title.'</title>';
            /*show data in header*/


            $data['metatags'] = '<meta name="description" content="'.$blogList[0]->seo_description.'" />
                            <meta name="keywords" content="'.$blogList[0]->blog_title.'" />
                            <meta property="og:title" content="'.$blogList[0]->blog_title.'">
                            <meta property="og:description" content="'.$blogList[0]->seo_description.'">
                            <meta property="og:type" content="website">
                            <meta property="og:url" content="'.base_url().'post/'.$blogList[0]->blog_url.'">
                            <meta property="og:image" content="'.base_url().$blogList[0]->blog_image.'" />
                            <meta name="twitter:image" content="'.base_url().$blogList[0]->blog_image.'" />
                            <meta name="twitter:card" content="summary_large_image" />
                            <meta name="twitter:description" content="'.$blogList[0]->seo_description.'" />
                            <meta name="twitter:title" content="'.$blogList[0]->blog_title.'" />
                            <link rel="canonical" href="'.base_url().'post/'.$blogList[0]->blog_url.'" />';

            $blog_list = $this->Common_model->get_recent_blogs($getBlog[0]->blog_id,$limit=4,$offset=null);
            $datap['blog_list'] = $blog_list;

            $this->load->view('website/web_header',$data);
            $this->load->view('website/post', $datap);
            $this->load->view('website/web_footer');
        } else {
            redirect('');
        }

    }

    /*blog Ajax List*/
    public function blogAjaxList(){
        $searchData = $this->input->post('searchData');
        $searchStatus = $this->input->post('searchStatus');
        $category_id = $this->input->post('category_id');
        $date_range = $this->input->post('date_range');
        $limit = $this->input->post('limit');

        $total_count = $this->Common_model->getAllBlogCount($searchData,$searchStatus);

        // $config = array();
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
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // $pages = $this->uri->segment(3);
        $page = $this->uri->segment(3);

        // if ($pages) {
        //     $page = $pages;
        // } else {
        //     $page = 1;
        // }
        $offset = ($page - 1) * $config["per_page"];

        $blogList = $this->Common_model->getAllBlogList($searchData,$searchStatus, $limit, $offset);
        // var_dump($offset);
        // var_dump(count($blogList));
        // die();

        $html = '';
        $count = 0;
        if ($blogList) {
            foreach ($blogList as $blogLists) {
                $blogFile =$blogLists->blog_image;
                if ($blogFile) {
                    $blogFile = $blogLists->blog_image;
                } else {
                    $blogFile = IMAGE_PATH . 'no_blogs.jpg';
                }


                if (strlen($blogLists->blog_title) > 60) {
                    $subTitle = substr($blogLists->blog_title, 0, 60) . '...';
                } else {
                    $subTitle = $blogLists->blog_title;
                }

                if (strlen($blogLists->blog_description) > 140) {
                    $subDescription = substr(strip_tags($blogLists->blog_description), 0, 140) . '...';
                } else {
                    $subDescription = $blogLists->blog_description;
                }
                $blog_url=$blogLists->blog_url;


                $html .= '<div class="col-md-4 px-2 py-3">';
                $html .= '<div class="card all-blog-cards">';
                $html .= ' <a  href="'.base_url().'post/'.$blog_url.'"><img class="blog_sec_img img-fluid" src="'.$blogFile.'" alt="'.$subTitle.'"></a>';
                $html .= '<div class="card-body all-card-box p-2">';
                if ($blogLists->category_id) {
                    $html .= '<div class="category blogs">';
                    $html .= '<a href="'.base_url().'post/'.$blog_url.'" style="font-size:14px"> '.$blogLists->category_name.'</a>';
                    $html .= '<p class="date meta-last">' . date('d-m-Y', $blogLists->creation_time) . '</p>';
                    $html .= '</div>';
                } else {
                    $html .= ' <div class="category blogs">';
                    $html .= '<a href="#">Uncategorised</a>';
                    $html .= '</div>';
                }
                $html .= '<div class="card-title blog_title mb-0" style="height: 130px">';
                $html .= '<a href="'.base_url().'post/'.$blog_url.'">';
                $html .= '<h3 class="blog-titles mb-0 font-weight-bold" style="color: #000000;text-align: justify; height:60px"> ' . $subTitle . '</h3>';
                $html .= '</a>';
                $html .='<p class="mb-0" style="font-size: 16px;text-align: justify">'. $subDescription .'</p>';
                $html .= '</div>';
                $html .= '<div class="row sharelinks-blogs">';
                $html .= '<div class="col-12" style="text-align: right">';
                // $html .='<a href="https://www.facebook.com/sharer/sharer.php?u='.base_url().'post/'.$blog_url.'" target="_blank"><img src="'.IMAGE_PATH.'Insta.svg" alt="" class="blog_social_media_icons pr-2 w-75"></a>';
                // $html .='<a href="https://www.youtube.com/intent/tweet?url='.base_url().'post/'.$blog_url.'&text='.$subTitle.'" target="_blank"><img src="'.IMAGE_PATH.'Youtube.svg" alt="" class="blog_social_media_icons pr-2 w-75"></a>';
                $html .='<a href="https://www.linkedin.com/shareArticle?mini=true&url='.base_url().'post/'.$blog_url.'&title='.$subTitle.'&source=SushantTravels" target="_blank"><img src="'.IMAGE_PATH.'linkedin.svg" style="width: 30px;" alt="" class="blog_social_media_icons pr-2 w-75"></a>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';

            }

            $pagination = $this->pagination->create_links();
            $status = 200;
        } else {
            $status = 201;
            $pagination = '';
            $html = '<tr><td colspan="10">No Blog found</td></tr>';
        }

        $view_more = '';
        if (($offset + $limit) < $total_count) {
            $view_more = '<button type="button" class="btn btn-lightblue btn-readmore mt-4" onclick="read_more_blog();">
                        Read More
                    </button>';
        }

        $view_less = '';
        if ($offset > 0) {
            $view_less = '<button type="button" class="btn btn-lightblue btn-readmore mt-4" onclick="read_less_blog();">
                        Read Less
                    </button>';
        }

        $data = array(
            'status' => $status,
            'data' => $html,
            'pagination' => $pagination,
            'view_more' => $view_more,
            'view_less' => $view_less

        );
        
        echo json_encode($data);
    }

    public function blogAjaxListSearch(){
        $searchData = $this->input->post('searchData');
        $searchStatus = $this->input->post('searchStatus');
        $category_id = $this->input->post('category_id');
        $date_range = $this->input->post('date_range');

        $blogList = $this->Common_model->getAllBlogListSearch($searchData,$searchStatus,$category_id,$date_range);
        $html = '';
        $count = 0;
        if ($blogList) {
            foreach ($blogList as $blogLists) {
                $blogFile =$blogLists->blog_image;
                if ($blogFile) {
                    $blogFile = $blogLists->blog_image;
                } else {
                    $blogFile = IMAGE_PATH . 'noImage.png';
                }


                if (strlen($blogLists->blog_title) > 105) {
                    $subTitle = substr($blogLists->blog_title, 0, 105) . '...';
                } else {
                    $subTitle = $blogLists->blog_title;
                }

                if (strlen($blogLists->blog_description) > 180) {
                    $subDescription = substr(strip_tags($blogLists->blog_description), 0, 180) . '...';
                } else {
                    $subDescription = $blogLists->blog_description;
                }
                $blog_url=$blogLists->blog_url;

                $html .= '<div class="col-md-6 col-lg-4 mb-4 px-2" style="height: 525px; border-radius: 14px;">
                     <div class="card latest__blog_card">
                          <a href="'.base_url().'post/'.$blog_url.'">
                               <img src="'.$blogFile.'" class="w-100 card-image-top" alt="blog">
                          </a>
                         <div class="card-body p-2">
                             <div class="blog-category">
                                <a href="'.base_url().'post/'.$blog_url.'" style="font-size: 13px;">'.$blogLists->category_name.'</a>
                                <p>'.date('d', $blogLists->creation_time).' '.date('M', $blogLists->creation_time).', '.date('Y', $blogLists->creation_time).'</p>
                             </div> 
                              <div class="card_title" style="height: 130px;">
                              <a href="'.base_url().'post/'.$blog_url.'">
                                  <h3 style="height:60px" class="blog-titles">
                                    '.$subTitle.'
                                </h3>
                              </a>
                              <p style="font-size: 14px; text-align: justify;">'.$subDescription.'</p>
                            </div>
                         </div>
                          <div class="blog_footer d-flex justify-content-between align-items-end mb-1">
                                <a href="https://www.facebook.com/clairvoyancetech1" class="ml-2">
                                  <img src="'.IMAGE_PATH.'facebook_blog.svg" class="" alt="blog" style="width: 75%;">
                              </a>
                              <a href="https://twitter.com/Clairvoyancetec" class="ml-2">
                                  <img src="'.IMAGE_PATH.'twitter_blog.svg" class="" alt="blog" style="width: 75%;">
                              </a>
                              <a href="https://www.linkedin.com/company/clairvoyance-tech" class="ml-2">
                                  <img src="'.IMAGE_PATH.'linkedin_png.png" class="" alt="blog" style="width: 75%;">
                              </a>
                              
                          </div>
                     </div>
                 </div>';
            }

            $pagination = $this->pagination->create_links();
            $status = 200;
        } else {
            $status = 201;
            $pagination = '';
            $html = '<tr><td colspan="10">No Blog found</td></tr>';
        }
        $data = array(
            'status' => $status,
            'data' => $html,
            'pagination' => $pagination
        );
        echo json_encode($data);
    }

    public function latest_blogs(){

        $blogList = $this->Common_model->get_home_blogs();
        $html = '';
        $count = 0;
        if ($blogList) {
            foreach ($blogList as $blogLists) {
                $blogFile =$blogLists->blog_image;
                if ($blogFile) {
                    $blogFile = $blogLists->blog_image;
                } else {
                    $blogFile = IMAGE_PATH . 'noImage.png';
                }


                if (strlen($blogLists->blog_title) > 105) {
                    $subTitle = substr($blogLists->blog_title, 0, 105) . '...';
                } else {
                    $subTitle = $blogLists->blog_title;
                }

                if (strlen($blogLists->blog_description) > 180) {
                    $subDescription = substr(strip_tags($blogLists->blog_description), 0, 180) . '...';
                } else {
                    $subDescription = $blogLists->blog_description;
                }
                $blog_url=$blogLists->blog_url;

                $html .= '<div class="col-md-6 col-lg-4 mb-4 px-2">
                     <div class="card latest__blog_card" style="height: 480px; border-radius: 14px;">
                           <a href="'.base_url().'post/'.$blog_url.'">
                               <img src="'.$blogFile.'" class="w-100 card-image-top" alt="blog" style="border-top-left-radius: 14px; border-top-right-radius: 14px;">
                           </a>
                           <div class="card-body p-2">
                             <div class="blog-category">
                                <a href="'.base_url().'post/'.$blog_url.'" style="font-size: 13px;">'.$blogLists->category_name.'</a>
                                <p>'.date('d', $blogLists->creation_time).' '.date('M', $blogLists->creation_time).', '.date('Y', $blogLists->creation_time).'</p>
                             </div> 
                              <div class="card_title" style="height: 130px;">
                              <a href="'.base_url().'post/'.$blog_url.'">
                                  <h3 style="height:60px" class="blog-titles">
                                    '.$subTitle.'
                                </h3>
                              </a>
                              <p style="font-size: 14px; text-align: justify;">'.$subDescription.'</p>
                            </div>
                         </div>
                          <div class="blog_footer d-flex justify-content-between align-items-end mb-1">
                                <a href="https://www.facebook.com/clairvoyancetech1" class="ml-2">
                                  <img src="'.IMAGE_PATH.'facebook_blog.svg" class="" alt="blog" style="width: 75%;">
                              </a>
                              <a href="https://twitter.com/Clairvoyancetec" class="ml-2">
                                  <img src="'.IMAGE_PATH.'twitter_blog.svg" class="" alt="blog" style="width: 75%;">
                              </a>
                              <a href="https://www.linkedin.com/company/clairvoyance-tech" class="ml-2">
                                  <img src="'.IMAGE_PATH.'linkedin_png.png" class="" alt="blog" style="width: 75%;">
                              </a>
                              
                          </div>
                     </div>
                 </div>';
            }

            $status = 200;
        } else {
            $status = 201;
            $html = '<tr><td colspan="10">No Blog found</td></tr>';
        }
        $data = array(
            'status' => $status,
            'data' => $html,
        );
        echo json_encode($data);
    }

public function  onboarding_questionnarie(){
    $data['title'] = '<title>Breadcrumbs AI Onboarding Questionnaire</title>';
    $this->load->view('website/web_header',$data);
    $this->load->view('website/onboarding_questionnarie');
    $this->load->view('website/web_footer');
}

public function  report_an_expense(){
    $data['title'] = '<title>Breadcrumbs - Report an Expense</title>';
    $this->load->view('website/web_header',$data);
    $this->load->view('website/report_an_expense');
    $this->load->view('website/web_footer');
}

    /*=================END BLOGS IN WEBSITE================*/




















    public function company_onboarding() {
        if ($this->input->post()) {
            // Step 1: Save company details
            $company_data = array(
                'first_name' => $this->input->post('quest_fname'),
                'last_name' => $this->input->post('quest_lname'),
                'email' => $this->input->post('quest_email'),
                'phone_number' => $this->input->post('quest_phone'),
                'preferred_contact_method' => $this->input->post('contactMethod'),
                'other_contact_method' => $this->input->post('other_contact_method'),
                'company_name' => $this->input->post('company_name'),
                'restaurant_count' => $this->input->post('restaurant'),              
                'is_toast' => $this->input->post('isToast'),
                'ssh_data_export' => $this->input->post('sshDataExport'),
                'help_turn_on' => $this->input->post('helpTurnOn'),
                'other_platform' => $this->input->post('other_platform'),
                'creation_time' => time(),
                'is_active' => ACTIVATE,
                'is_published' => DEACTIVATE

            );



            $company_id = $this->Common_model->save_company($company_data);

            if ($company_id) { 
                $restaurant_count = $this->input->post('restaurant');
               for ($i = 1; $i <= $restaurant_count; $i++) {   
                $restaurant_data = array(
                    'company_id' => $company_id,
                    'restaurant_name' => $this->input->post("restaurant_name_$i"),
                    'location' => $this->input->post("restaurant_location_$i"),
                    'revenue_jan_target' => $this->input->post("revenue_jan_target_$i"),
                    'revenue_feb_target' => $this->input->post("revenue_feb_target_$i"),
                    'revenue_mar_target' => $this->input->post("revenue_march_target_$i"),
                    'revenue_apr_target' => $this->input->post("revenue_apr_target_$i"),
                    'revenue_may_target' => $this->input->post("revenue_may_target_$i"),
                    'revenue_jun_target' => $this->input->post("revenue_jun_target_$i"),
                    'revenue_jul_target' => $this->input->post("revenue_july_target_$i"),
                    'revenue_aug_target' => $this->input->post("revenue_aug_target_$i"),
                    'revenue_sep_target' => $this->input->post("revenue_sep_target_$i"),
                    'revenue_oct_target' => $this->input->post("revenue_oct_target_$i"),
                    'revenue_nov_target' => $this->input->post("revenue_nov_target_$i"),
                    'revenue_dec_target' => $this->input->post("revenue_dec_target_$i"),
                    'labor_perct_target' => $this->input->post("labor_perct_target_$i"),
                    'foh_labor' => $this->input->post("foh_labor_$i"),
                    'boh_labor' => $this->input->post("boh_labor_$i"),
                    'salary_include' => $this->input->post("salaryInclude_$i"),
                    'foh_amount' => $this->input->post("foh_amount_$i"),
                    'boh_amount' => $this->input->post("boh_amount_$i"),
                    'cogs_target' => $this->input->post("cogsTarget_$i"),
                    'food_cogs' => $this->input->post("food_cogs_$i"),
                    'pastry_cogs' => $this->input->post("pastry_cogs_$i"),
                    'beer_cogs' => $this->input->post("beer_cogs_$i"),
                    'wine_cogs' => $this->input->post("wine_cogs_$i"),
                    'liquor_cogs' => $this->input->post("liquor_cogs_$i"),
                    'bev_coffee_cogs' => $this->input->post("bev_coffee_cogs_$i"),
                    'smallware_cogs' => $this->input->post("smallware_cogs_$i"),
                    'other_cogs' => $this->input->post("other_cogs_$i"),
                    'creation_time' => time(),
                    'update_time' => time(),
                'is_active' => ACTIVATE,                               
                );


                $this->Common_model->save_restaurant($restaurant_data);
            }
                // Set success message
                $this->session->set_flashdata('success', 'Company onboarding was successful!');
            } else {
                // Set error message
                $this->session->set_flashdata('error', 'Something went wrong! Please try again.');
            }
 
            redirect('welcome/onboarding_questionnarie');
        }
    }


    public function clear_flashdata() {
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
    }

}
