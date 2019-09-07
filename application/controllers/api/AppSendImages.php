<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class AppSendImages extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
		
    }

    public function index_get($name)
	{
	  $file_extension = strtolower(substr(strrchr($name,"."),1));
	  
	switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    default:
}

header("Content-type: ". $ctype);
echo file_get_contents("E:\\schoolimgs\\".$name);
	}
//https://stackoverflow.com/questions/27688232/php-display-image-without-html
}
?>