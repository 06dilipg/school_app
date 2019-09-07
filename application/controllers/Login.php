<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function select_get($username,$password)
    {
        if(!empty($username) && !empty($password)){
         echo    $email = urldecode($username);
         echo   $pass = urldecode($password);
           // $data = $this->db->get_where("school_table", ['email' => urldecode($username),'password' => urldecode($password)])->row_array();
        }else{
            $data = $this->db->get("products")->result();
        }
          redirect('Register/')
        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('products',$input);

        $this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
    }

    public function login_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->db->get_where("products", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("products")->result();
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('products', $input, array('id'=>$id));

        $this->response(['Product updated successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_delete($id)
    {
        $this->db->delete('products', array('id'=>$id));

        $this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
    }

}