<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->data['type'] = 'admin';
    }

    public function index()
    {
        $this->data['active'] = "admin";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/admin');
        $this->load->view('footer');
        $this->getRequestList();
    }
    public function eventsStatus()
    {
        $this->data['active'] = "status";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/events_status');
        $this->load->view('footer');
        $this->getRequestList();
    }
    public function eventsList()
    {
        $this->data['active'] = "events";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/events');
        $this->load->view('footer');
        $this->getRequestList();
    }
    public function addEvent()
    {
        $this->data['active'] = "events";
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/add_page');
        $this->load->view('footer');
        $this->getRequestList();
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
    }

    public function approve_request()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Request_model->approveRequest($post);
    }

    public function decline_request()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Request_model->declineRequest($post);
    }

    public function create_event()
    {
        if(empty($_POST)){
            $this->viewEventForm();
        }else{
            $this->getEventData();
        }
    }

    public function getEventList()
    {
        $this->data['events'] = $this->Event_model->getEventList();
        foreach ($this->data['events'] as $k=>$event){
            $this->data['events'][$k]['category'] = $this->Category_model->getCategory($event['category_id']);
        }

    }

    public function viewEventForm()
    {

    }

    public function getEventData()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Event_model->addEvent($post);
    }

    public function edit_event()
    {
        if(empty($_POST)){
            $this->viewEditEvent();
        }else{
            $this->getEditEventData();
        }
    }

    public function viewEditEvent()
    {
        $id = $this->input->post('id', TRUE);
        $event = $this->Event_model->getEvent($id);
    }

    public function getEditEventData()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->Event_model->editEvent($post);
    }

    public function delete_event()
    {
        $id = $this->input->post('id', TRUE);
        $this->Event_model->deleteEvent($id);
    }

}