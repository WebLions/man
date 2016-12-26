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

    public function getUserRequestAcc($id)
    {
        $where = array(
            'user_id' => $id,
            'condition_id !=' => CANCELED
        );
        $this->db->where($where);
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getUserRequestArr($id)
    {
        $r_list = $this->getUserRequestAcc($id);
        $userReq = array();
        foreach ($r_list as $request){
            $userReq[] = $request['event_id'];
        }
        return $userReq;
    }

    public function getDeclinedRequestList()
    {
        $this->db->where('condition_id', DECLINED);
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getApprovedRequestList()
    {
        $this->db->where('condition_id', APPROVED);
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

    public function cancelRequestMainpage($event_id, $uid)
    {
        $where = array(
            'event_id' => $event_id,
            'user_id' => $uid
        );
        $this->db->where($where);
        return $this->db->update($this->tableName, array('condition_id' => CANCELED));
    }

}