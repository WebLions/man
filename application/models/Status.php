<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Model
{
    public function getStatusList()
    {
        $result = $this->db->get('statuses');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
        return $result;
    }
}