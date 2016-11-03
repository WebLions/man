<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competition_model extends CI_Model
{
    public function getCompetitionList()
    {
        $result = $this->db->get('competitions');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
//        $result = $this->getTree($result);
        print_r($result);
        return $result;
    }

    private function getTree($data = array())
    {

    }
}