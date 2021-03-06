<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function login()
    {
        if(empty($_POST)){
            $this->viewLoginForm();
        }else{
            $this->getLoginData();
        }
    }

    public function viewLoginForm()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/login_page');
        $this->load->view('auth/footer');
    }

    public function getLoginData()
    {
        $this->form_validation->set_rules('email', 'Пошта', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        $post = $this->input->post(NULL, TRUE);
        if ($this->form_validation->run() == TRUE){
            //Post is okay
            if($this->User_model->login($post['email'], $post['password']) ){
                header('Location: /account');
            }else{
                header('Location: /');
            }
        }else{
            $this->session->set_flashdata('flashError', 'Заповнені не всі поля.');
        }
    }

    public function logout()
    {
        if($this->User_model->logout()){
            header('Location: /');
        };

    }

    public function sign_up()
    {
        if(empty($_POST)){
            $this->viewSignUpForm();
        }else{
            $this->getSignUpData();
        }
    }

    public function viewSignUpForm()
    {

    }

    public function getSignUpData()
    {
        $post = $this->input->post(NULL, TRUE);
        $uid = $this->User_model->addUser($post);
        $_SESSION['user']['id'] = $uid;
        header('Location: /account');
    }

    public function admin_login()
    {
//        if(empty($_POST)){
//            $this->viewAdminForm();
//        }else{
            $this->getAdminData();
//        }
    }

    public function viewAdminForm()
    {
        $this->load->view('modals/signIn');
    }

    public function getAdminData()
    {
        $this->form_validation->set_rules('login', 'Пошта', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        $post = $this->input->post(NULL, TRUE);
        if ($this->form_validation->run() == TRUE){
            //Post is okay
            if( $this->User_model->loginAdmin($post['login'], $post['password']) ){
                header('Location: /admin');
            }else{
                header('Location: /');
            }
        }else{
            $this->session->set_flashdata('flashError', 'Заповнені не всі поля.');
        }

    }


}