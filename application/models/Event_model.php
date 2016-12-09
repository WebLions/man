<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    private $tableName = 'events';

    public function getEventList()
    {
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getEvent($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function addEvent($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function editEvent($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update($this->tableName, $data);
    }

    public function deleteEvent($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->tableName);
    }
}