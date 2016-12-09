<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');

    }

    public function index()
    {

        $this->getEventList();
    }

    public function getEventList()
    {
//        $events = $this->Event_model->getEventList();
//        $data = array("events"=>$events);

        $this->data['active'] = "home";
        $this->load->view('header', $this->data);
        $this->load->view('main/main');
        $this->load->view('footer');

//        $this->load->view('modals/modal');
    }

    public function getEvent($id)
    {

    }

    public function sendTicket()
    {

    }

    public function about()
    {
        $this->data['active'] = "about";
        $this->load->view('header', $this->data);
        $this->load->view('about/about');
        $this->load->view('footer');
    }

    public function contacts()
    {
        $this->data['active'] = "contacts";
        $this->load->view('header', $this->data);
        $this->load->view('contacts/contacts');
        $this->load->view('footer');
    }

}