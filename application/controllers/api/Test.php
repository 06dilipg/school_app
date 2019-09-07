<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Test extends REST_Controller {

    public function __construct() {
        parent::__construct();
       
    }


    public function index_get()
    {
        $myObj = new stdClass();
			$myObj->status = "ok";
			echo json_encode($myObj);
       
    }

	
}