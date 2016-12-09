<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Category_model');
        $this->load->model('Competition_model');
    }

    public function index()
    {
        $this->getEventList();
    }

    public function getEventList()
    {
        $this->data['events'] = $this->Event_model->getEventList();
        $this->data['active'] = "home";
        $this->load->view('header', $this->data);
        $this->load->view('main/main');
        $this->load->view('footer');

//        $this->load->view('modals/modal');
    }

    public function getEvent($id)
    {
        $event = $this->Event_model->getEvent($id);
        $event['category'] = $this->Category_model->getCategory($event['category_id']);
        debug($event);


//        $data = array("events"=>$event);

//        $this->load->view('header');
//        $this->load->view('main/main', $data);
//        $this->load->view('footer');

    }

    public function sendTicket()
    {
        $post = $this->input->post(NULL, TRUE);

    }

    public function about()
    {
        $this->data['competitive_list'] = $this->Competition_model->getCompetitionList();
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