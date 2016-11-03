<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        /*
         * Main admin page
         * Url "/admin"
         * List of request from users
         */

        $this->load->model('Request_model');
        $this->data['request_list'] = $this->Request_model->getRequestList();

        $this->load->view('layouts/admin/header');
        $this->load->view('admin/admin', $this->data);
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

    public function post_login()
    {
        $post = $this->input->post();
        if (empty($post)) {
            return false;
        }
        if ($this->User_model->login($post['login'], $post['password'])) {
            $_SESSION['admin'] = true;
            redirect('/admin', 'refresh');
        } else {
            echo 'Ошибка авторизации';
        }

    }

    public function logout(){
        /*
         * Logout from admin page
         * Url "/admin/logout"
         */
        if(isset($_SESSION['admin']) && $_SESSION['admin'])
        {
            $_SESSION['admin'] = false;
        }
        redirect('/', 'refresh');
    }

    public function statuses(){
        /*
         * Statuses admin page
         * Url "/admin/statuses"
         * List of statuses like teacher, student etc
         */

        $this->load->model('Status_model');
        $this->data['status_list'] = $this->Status_model->getStatusList();

        $this->load->view('layouts/admin/header');
        $this->load->view('admin/statuses', $this->data);
        $this->load->view('layouts/admin/footer');

    }

//    public function add_status(){
//        /*
//         * Add status page
//         * Url "/admin/add_status"
//         */
//    }
//
//    public function edit_status(){
//        /*
//         * Edit status page
//         * Url "/admin/edit_page"
//         */
//    }
//
//    public function delete_status(){
//        /*
//         * Delete status page
//         * Url "/admin/delete_page"
//         */
//    }

}