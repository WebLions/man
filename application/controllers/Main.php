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
        $this->load->model('Competition_model');

        $this->data['status_list'] = $this->Status_model->getStatusList();

        $this->load->view('header');
        $this->load->view('main/main', $this->data);
        $this->load->view('footer');

        $this->load->view('modals/modal');

    }

    public function about(){

        /*
         * About MAN page
         * url "/about"
         * @array $data['status_list'] -> view
         * @array $data['competitive_list'] -> view
         */

        $this->load->model('Competition_model');
        $this->load->model('Status_model');

        $this->data['status_list'] = $this->Status_model->getStatusList();
        $this->data['competitive_list'] = $this->Competition_model->getCompetitionList();

        $this->load->view('header');
        $this->load->view('about/about', $this->data);
        $this->load->view('footer');
        $this->load->view('modals/modal');

    }
    public function contacts(){
        $this->load->view('header');
        $this->load->view('contacts/contacts');
        $this->load->view('footer');
        $this->load->view('modals/modal');
    }

}