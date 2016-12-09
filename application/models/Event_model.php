<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function getEventList()
    {
        $result = $this->db->get('events');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
        return $result;
    }


}