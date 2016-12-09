<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model
{
    private $tableName = 'requests';

    public function getRequestList()
    {
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function addRequest($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function approveRequest($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName, array('condition_id' => 2));
    }

    public function declineRequest($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName, array('condition_id' => 3));
    }

}