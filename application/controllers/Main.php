<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index(){
        /*
         * Main page
         * url "/"
         */
        echo 'index';
        $this->load->model('Status_model');
        $this->data['statuses'] = $this->Status->getStatusList();

        $this->load->view('header');
        $this->load->view('main/main', $this->data);
        $this->load->view('footer');
    }

    public function about(){
        /*
         * About MAN page
         * url "/about"
         */

        $this->load->model('Status_model');
//        $this->data['statuses'] = $this->Status->getStatusList();

        $this->load->model('Competition_model');
        $competitions = $this->Competition_model->getCompetitionList();
        var_dump($competitions);

//        $this->load->view('layouts/header');
//        $this->load->view('about/about', $this->data);
//        $this->load->view('layouts/footer');
    }
}