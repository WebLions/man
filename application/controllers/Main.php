<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index(){
        /*
         * Main page
         * url "/"
         * @array $data['status_list'] -> view
         */
        $this->load->model('Status_model');
        $this->data['status_list'] = $this->Status_model->getStatusList();

        $this->load->view('layouts/header');
        $this->load->view('main/main', $this->data);
        $this->load->view('layouts/footer');
    }

    public function about(){
        /*
         * About MAN page
         * url "/about"
         * @array $data['status_list'] -> view
         */

        $this->load->model('Status_model');
        $this->data['status_list'] = $this->Status_model->getStatusList();


//        $this->load->view('layouts/header');
//        $this->load->view('main/about', $this->data);
//        $this->load->view('layouts/footer');
    }
}