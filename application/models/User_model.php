<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $tableName = 'users';

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
        $admin = $this->getUser(1);
        if(empty($admin)){
            return false;
        }
        if(password_verify($password, $admin['password']) AND $login == $admin['email']){
            $_SESSION['admin'] = true;
            $_SESSION['user'] = true;
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
        return $this->selectById($id);
    }

}