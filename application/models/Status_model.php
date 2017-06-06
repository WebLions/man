<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends MY_Model
{
    public function getStatusList()
    {
        $result = $this->db->get('statuses');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
        $list = array();
        foreach ($result as $value){
            $list[] = $value['status'];
        }
        return $list;
    }
}