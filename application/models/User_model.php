<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $admin_login = 'admin';
    private $admin_password = '$2y$10$NU7cso/T4vaTjhmbaAyj8OwkO2Qnct9E2hpm2Zbp4cP8vcLMpw0Ya';

    private $tableName = 'users';

    public function login($email, $password)
    {
        if(!isset($email, $password)){
            return false;
        }
        $this->db->where('email', $email);
        $user = $this->db->get($this->tableName);
        $user = $user->row_array();
        if(password_verify($password, $user['password'])) {
                $_SESSION['user']['id'] = $user['id'];
                return true;
        }else{
            return false;
        }
    }

    public function loginAdmin($login, $password)
    {
        if(password_verify($password, $this->admin_password) AND $login == $this->admin_login){
            $_SESSION['admin'] = true;
            return true;
        }else{
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        return true;
    }

    public function checkAuth()
    {
        if(isset($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }

    public function checkAdmin()
    {
        if(isset($_SESSION['admin'])){
            return true;
        }else{
            return false;
        }
    }

    public function addUser($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->insert($this->tableName, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function getUser($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->tableName);
        $result = $result->row_array();
        return $result;
    }
}