<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->getRequestList();
    }

    public function getRequestList()
    {

    }

    public function approve_request()
    {

    }

    public function decline_request()
    {

    }

    public function create_event()
    {
        if(empty($_POST)){
            $this->viewAdminForm();
        }else{
            $this->getAdminData();
        }
    }

    public function edit_event()
    {
        if(empty($_POST)){
            $this->viewAdminForm();
        }else{
            $this->getAdminData();
        }
    }

    public function delete_event()
    {

    }

}