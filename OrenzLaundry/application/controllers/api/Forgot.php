<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Forgot extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_forgot','forgot');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
    }

    public function index_post()
    {
        $request = $this->input->post(null,true);
        $forgot = $this->forgot->run($request);

        if($forgot){
            $this->set_response([
                'status' => TRUE,
                'message' => 'Kode berhasil dikirim, silahkan cek email anda'
            ], REST_Controller::HTTP_NOT_FOUND);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}

/* End of file Forgot.php */
