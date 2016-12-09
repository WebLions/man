<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($login, $password)
    {
        if(!isset($login, $password)){
            return false;
        }
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $user = $this->db->get('users');
        if ($user->result_id->num_rows){
            return true;
        }
        else return false;
    }

    public function checkAuth()
    {
        if(isset($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }
}