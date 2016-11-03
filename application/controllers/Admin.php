<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        /*
         * Main admin page
         * Url "/admin"
         * List of request from users
         */
        echo 'testadmin';

        $this->load->view('layouts/admin/header');
        $this->load->view('admin/admin');
        $this->load->view('layouts/admin/footer');
    }

    public function login(){
        /*
         * Login admin page
         * Url "/admin/login"
         */

        $this->load->view('layouts/admin/header');
        $this->load->view('admin/login');
        $this->load->view('layouts/admin/footer');
    }

    public function logout(){
        /*
         * Logout from admin page
         * Url "/admin/logout"
         */
    }

    public function statuses(){
        /*
         * Statuses admin page
         * Url "/admin/statuses"
         * List of statuses like teacher, student etc
         */
        echo 'statusesadmin';

        $this->load->view('layouts/admin/header');
        $this->load->view('admin/statuses');
        $this->load->view('layouts/admin/footer');

    }

    public function add_status(){
        /*
         * Add status page
         * Url "/admin/add_status"
         */
    }

    public function edit_status(){
        /*
         * Edit status page
         * Url "/admin/edit_page"
         */
    }

    public function delete_status(){
        /*
         * Delete status page
         * Url "/admin/delete_page"
         */
    }

}