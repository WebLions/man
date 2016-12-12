<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Event_model');
        $this->load->model('Request_model');
        $this->load->model('Category_model');
        $this->load->model('Condition_model');
        $this->load->model('Competition_model');
    }

    public function index()
    {
        $this->getUserEventList();
    }

    public function getUserEventList()
    {
        $uid = $_SESSION['user']['id'];
        $requestList = $this->Request_model->getUserRequestList($uid);
        foreach ($requestList as $k=>$request) {
            $requestList[$k]['condition'] = $this->Condition_model->getCondition($request['condition_id']);
            $requestList[$k]['user'] = $this->User_model->getUser($request['user_id']);
            $requestList[$k]['event'] = $this->Event_model->getEvent($request['event_id']);
            $requestList[$k]['event']['category'] = $this->Category_model->getCategory($requestList[$k]['event']['category_id']);
        }
        if(empty($requestList)){
            $requestList = FALSE;
        };
        $this->data['events'] = $requestList;
        $this->data['active'] = "account";
        $this->load->view('header', $this->data);
        $this->load->view('account/account');
        $this->load->view('footer');

    }

    public function cancelRequest()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Request_model->cancelRequest($post);
    }

}