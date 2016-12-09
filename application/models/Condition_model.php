<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condition_model extends CI_Model
{
    private $tableName = 'conditions';

    public function getCondition($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->tableName);
        $result = $result->row_array();
        return $result['condition_name'];
    }
}