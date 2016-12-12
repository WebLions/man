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

    public function getUserRequestList($id)
    {
        $this->db->where('user_id', $id);
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getDeclinedRequestList()
    {
        $this->db->where('condition_id', DECLINED);
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getUnreadRequestList()
    {
        $this->db->where('condition_id', UNREAD);
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
        return $this->db->update($this->tableName, array('condition_id' => APPROVED));
    }

    public function declineRequest($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName, array('condition_id' => DECLINED));
    }

    public function cancelRequest($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName, array('condition_id' => CANCELED));
    }

}