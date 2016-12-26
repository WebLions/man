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
        $userReq = $this->getUserRequests();
        $this->data['userReq'] = $userReq;

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
        $userReq = $this->getUserRequests();
        $this->data['userReq'] = $userReq;
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
            $this->sendRequestData();
        }else{
            return false;
        }
    }

    public function sendRequestData()
    {
        $post = $this->input->post(NULL, TRUE);
        if(empty($post)){
            return FALSE;
        }
            if(isset($_SESSION['user'])) {
                $post['user_id'] = $_SESSION['user']['id'];
                $this->Request_model->addRequest($post);
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

    protected function getUserRequests()
    {
        if(!$this->User_model->checkAuth()){
            return false;
        }
        $uid = $_SESSION['user']['id'];
        $userReq = $this->Request_model->getUserRequestArr($uid);
        return $userReq;
    }

    public function cancelUserReq()
    {
        $post = $this->input->post('id', TRUE);
        if(empty($post)){
            return 'Empty id!';
        }
        $this->Request_model->cancelRequestMainpage($post, $_SESSION['user']['id']);
    }
}