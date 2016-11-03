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
        $list = array();
        foreach ($result as $value){
            $list[] = $value['status'];
        }
        return $list;
    }

    private function getTree($data = array())
    {

    }
}