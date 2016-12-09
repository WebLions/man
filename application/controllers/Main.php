<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index(){
        /*
         * Main page
         * url "/"
         * @array $data['status_list'] -> view
         */
        $this->load->view('header');
        $this->load->view('main/main');
        $this->load->view('footer');

    }

    public function contacts(){
        $this->load->view('header');
        $this->load->view('contacts/contacts');
        $this->load->view('footer');
        $this->load->view('modals/modal');
    }

}