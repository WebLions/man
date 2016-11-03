<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model
{
    public function getRequestList()
    {
        $result = $this->db->get('requests');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
        return $result;
    }
}