<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Event_model');
        $this->load->model('Request_model');
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
        foreach ($this->data['events'] as $k=>$event){
            $this->data['events'][$k]['category'] = $this->Category_model->getCategory($event['category_id']);
        }
        $this->data['active'] = "home";
        $this->load->view('header', $this->data);
        $this->load->view('main/main');
        $this->load->view('modals/signIn');
        $this->load->view('modals/signUp');
        $this->load->view('modals/success');
        $this->load->view('footer');

//        $this->load->view('modals/modal');
    }

    public function getEvent($id)
    {
        $event = $this->Event_model->getEvent($id);
        $event['category'] = $this->Category_model->getCategory($event['category_id']);
        $data = array("event"=>$event);
        $this->data['active'] = "home";
        $this->load->view('header', $this->data);
        $this->load->view('news/new', $data);
        $this->load->view('modals/signIn');
        $this->load->view('modals/signUp');
        $this->load->view('modals/success');
        $this->load->view('footer');

    }

    public function sendTicket()
    {
        if($this->User_model->checkAuth()){
            echo 'asdasdsad';
            $this->sendRequestData();
        }else{
            $this->showRegForm();
        }
    }

    public function sendRequestData()
    {
        $this->form_validation->set_rules('event_id', 'ID події', 'required');
        $post = $this->input->post(NULL, TRUE);
        if ($this->form_validation->run() == TRUE) {
            if(isset($_SESSION['user'])) {
                $post['user_id'] = $_SESSION['user']['id'];
                $this->Request_model->addRequest($post);
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    public function showRegForm()
    {

    }

    public function about()
    {
        $this->data['competitive_list'] = $this->Competition_model->getCompetitionList();
        $this->data['active'] = "about";
        $this->load->view('header', $this->data);
        $this->load->view('about/about');
        $this->load->view('modals/signIn');
        $this->load->view('modals/signUp');
        $this->load->view('footer');
    }

    public function contacts()
    {
        $this->data['active'] = "contacts";
        $this->load->view('header', $this->data);
        $this->load->view('contacts/contacts');
        $this->load->view('modals/signIn');
        $this->load->view('modals/signUp');
        $this->load->view('footer');
    }

}