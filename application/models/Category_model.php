<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
    protected $tableName = 'categories';

    public function getCategory($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->tableName);
        $result = $result->row_array();
        return $result['category'];
    }

    public function getCategories()
    {
        $result = $this->db->get($this->tableName);
        $result = $result->result_array();
        return $result;
    }

    public function getCategoryList()
    {
        $result = $this->selectAll();
        $result = buildTree($result);
        return $result;
    }
}