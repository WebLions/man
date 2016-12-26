<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->check_admin();

        $this->load->model('Event_model');
        $this->load->model('Request_model');
        $this->load->model('Category_model');
        $this->load->model('Condition_model');
        $this->load->model('Competition_model');

        $this->data['type'] = 'admin';

    }

    public function index()
    {
        $this->data['active'] = "admin";
        $this->data['events'] = $this->getRequestList();
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/admin');
        $this->load->view('footer');
    }
    public function eventsStatus()
    {
        $this->data['active'] = "status";
        $this->data['declined'] = $this->getDeclinedRequestList();
        $this->data['approved'] = $this->getApprovedRequestList();
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/events_status');
        $this->load->view('footer');
    }
    public function eventsList()
    {
        $this->data['active'] = "events";
        $this->getEventList();
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/events');
        $this->load->view('footer');
    }

    public function getRequestList()
    {
        $requestList = $this->Request_model->getUnreadRequestList();
        foreach ($requestList as $k=>$request){
            $requestList[$k]['condition'] = $this->Condition_model->getCondition($request['condition_id']);
            $requestList[$k]['user'] = $this->User_model->getUser($request['user_id']);
            $requestList[$k]['event'] = $this->Event_model->getEvent($request['event_id']);
            $requestList[$k]['event']['category'] = $this->Category_model->getCategory($requestList[$k]['event']['category_id']);
        }
        return $requestList;
    }

    public function getDeclinedRequestList()
    {
        $requestList = $this->Request_model->getDeclinedRequestList();
        foreach ($requestList as $k=>$request){
            $requestList[$k]['condition'] = $this->Condition_model->getCondition($request['condition_id']);
            $requestList[$k]['user'] = $this->User_model->getUser($request['user_id']);
            $requestList[$k]['event'] = $this->Event_model->getEvent($request['event_id']);
            $requestList[$k]['event']['category'] = $this->Category_model->getCategory($requestList[$k]['event']['category_id']);
        }
        return $requestList;
    }

    public function getApprovedRequestList()
    {
        $requestList = $this->Request_model->getApprovedRequestList();
        foreach ($requestList as $k=>$request){
            $requestList[$k]['condition'] = $this->Condition_model->getCondition($request['condition_id']);
            $requestList[$k]['user'] = $this->User_model->getUser($request['user_id']);
            $requestList[$k]['event'] = $this->Event_model->getEvent($request['event_id']);
            $requestList[$k]['event']['category'] = $this->Category_model->getCategory($requestList[$k]['event']['category_id']);
        }
        return $requestList;
    }

    public function approve_request($id)
    {
        if(empty($id)){
            return false;
        }
        $this->Request_model->approveRequest($id);
        header('Location: /admin');
    }

    public function decline_request($id)
    {
        if(empty($id)){
            return false;
        }
        $this->Request_model->declineRequest($id);
        header('Location: /admin');
    }

    public function getEventList()
    {
        $this->data['events'] = $this->Event_model->getEventList();
        foreach ($this->data['events'] as $k=>$event){
            $this->data['events'][$k]['category'] = $this->Category_model->getCategory($event['category_id']);
        }

    }

    public function add_event()
    {
        if(empty($_POST)){
            $this->viewEventForm();
        }else{
            $this->getEventData();
        }
    }

    public function viewEventForm()
    {
        $this->data['categories'] = $this->Category_model->getCategories();
        $this->data['active'] = "events";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/add_page');
        $this->load->view('footer');
    }

    public function getEventData()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Event_model->addEvent($post);
        header('Location: /events');
    }

    public function edit_event($id)
    {
        $this->data['categories'] = $this->Category_model->getCategories();
        $this->data['event'] = $this->Event_model->getEvent($id);
        $this->data['active'] = "events";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/edit_page');
        $this->load->view('footer');
    }

    public function getEditEventData()
    {
        $post = $this->input->post(NULL, TRUE);
        if(empty($post)){
            return false;
        }
        $this->Event_model->editEvent($post);
        header('Location: /events');
    }

    public function delete_event($id)
    {
        if(empty($id)){
            return false;
        }
        $this->Event_model->deleteEvent($id);
        header('Location: /admin');

    }

    private function check_admin()
    {
        if(!$this->User_model->checkAdmin()){
            header('Location: /');
        }
    }


}