<?php

if(ENVIRONMENT == 'development'){
    /* developer mode */
    $config['developer_mode_on'] = true;
    define('EMAIL_ERRORS', TRUE);
} else {
    $config['developer_mode_on'] = false;
    define('EMAIL_ERRORS', TRUE);
}


/* Utility constants */
define('MB', 1024);
define('defaultCountry', 102);


/**
 * General configuration
 */

/**
 * Search Configuration
 */
define('SEARCH_DISTANCE', 10000);

/**
 * Default coverage area (km)
 * This distance would be used as a radius for searching mentors
 * This configuration can be changed by the administrator. Refer to SystemConfiguration hook for this.
 */


/**
 * chat configuration
 */
if(ENVIRONMENT == 'development')
    $config['chat_host'] = ""; //put production ip
else
    $config['chat_host'] = ""; //put local ip
$config['chat_port'] = "";
$config['media_allowed_file_types'] = "jpg|jpeg|bmp|png|gif|mp4|mkv|flv|avi|m4v|mov";
$config['document_allowed_file_types'] = "pdf|doc|docx|rtf|jpg|jpeg|bmp|png|gif|PDF";
$config['upload_max_file_size'] = 250 * MB;



/**
 * Google reCAPTCHA Key
 */
$config['re_captcha']='';


/**
 * Basic List for home screen
 */
define('QUERY_LIMIT',1000);
define('OFFSET_LIMIT',0);

define('WEBSITE_NAME', 'Restaurant Management');
/**
 * MAIL configurations
 */


/**
 * DO NOT EDIT
 *
 * These settings are based on definitions above
 *
 * If you really want to edit you better know what you are doing
 *
 */
if ($config['developer_mode_on']) {
    /*
     * This path for login page
     * */
    define('JS_PATH', $this->config['base_url'] . "debug/assets/js/");
    define('JS_EXT', ".js");
    define('CSS_PATH', $this->config['base_url'] . "debug/assets/css/");
    define('CSS_EXT', ".css");
    define('IMAGE_PATH', $this->config['base_url'] . "debug/assets/images/");
    define('FONT_AWESOME', $this->config['base_url'] . "debug/assets/font-awesome/css/");
    define('PLUGIN_PATH', $this->config['base_url'] . "debug/assets/plugins/");
    define('ASSETS_PATH', $this->config['base_url'] . "debug/assets/");
    define('UPLOAD_PATH', $this->config['base_url'] . "uploads/");
    define('DB_BACKUP_PATH', $this->config['base_url'] . "db/");
    define('FONT_PATH', $this->config['base_url'] . "debug/assets/fonts/");
    define('IMAGE_BLOG_PATH', $this->config['base_url'] . "");

} else {
    define('JS_PATH', $this->config['base_url'] . "debug/assets/js/");
    define('JS_EXT', ".min.js");
    define('CSS_PATH', $this->config['base_url'] . "debug/assets/css/");
    define('CSS_EXT', ".min.css");
    define('IMAGE_PATH', $this->config['base_url'] . "debug/assets/images/");
    define('PLUGIN_PATH', $this->config['base_url'] . "debug/assets/plugins/");
    define('FONT_PATH', $this->config['base_url'] . "debug/assets/fonts/");
}


//gender
define('MALE', '1');
define('FEMALE', '2');
define('OTHER', '3');
define('NOT_SHARE', '4');

/*
 * This Status for Activate or Deactivate Store From super admin
 */

define('DEACTIVATE',0);
define('ACTIVATE',1);
define('DRAFT',2);

/*settings for account activation*/
define('NOT_VERIFIED',0);
define('VERIFIED',1);

/**
 * USER GROUp CODES
 * This can be changed from database so please check before changing
 */
define('ADMIN',1);
define('COMPANY_ADMIN',2);
define('USERS',3);


/*error messages*/
define('SOMETHING_WRONG', 'Something Went Wrong, Please Try Again.');
