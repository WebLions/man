<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    /**
     * @var string $tableName - default table name for queries in DB
     *
     * Redefine in children class
     */
    protected $tableName;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Select all data in table without options
     * @param bool | array
     * @return array
     */
    public function selectAll($orderBy = null)
    {
        if(!empty($orderBy)){
            if(is_array($orderBy)){
                foreach ($orderBy as $sortColumn => $sortType){
                    $this->db->order_by($sortColumn, $sortType);
                }
            }
        }
        $data = $this->db
            ->get($this->tableName)
            ->result_array();
        return $data;
    }

    /**
     * @param array %whereArr(
     *  'where_key' => 'where_value',
     *  'other_where_key' => 'other_where_value',
     *   etc
     * )
     * @param string $select = '*' by default
     * @param null | string $table - custom query table
     * @return bool|array
     */
    public function selectWhere(array $whereArr, $select = '*', $table = null)
    {
        if(empty($whereArr)){
            return false;
        }
        return $this->db
            ->select($select)
            ->where($whereArr)
            ->get($table ?? $this->tableName)
            ->result_array();
    }

    public function selectWhereIn($whereKey, $whereArr)
    {
        if(!$whereArr || !$whereKey){
            return false;
        }
        $this->db->where_in($whereKey, $whereArr);
        return $this->db->get($this->tableName)->result_array();
    }

    /**
     * @param array $data (
     * 'insert_key' => 'insert_value'
     * )
     * @return bool
     */
    public function insert(array $data)
    {
        if(empty($data)){
            return false;
        }
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    /**
     * @param array $whereArr (
     *  'where_key' => 'where_value',
     *  'other_where_key' => 'other_where_value',
     *   etc
     * )
     * @param array $data (
     * 'insert_key' => 'insert_value'
     * )
     * @param $table - custom table
     * @return bool
     */
    public function update(array $whereArr, array $data, $table = NULL)
    {
        if(empty($whereArr) || empty($data)){
            return false;
        }
        $this->db->where($whereArr);
        return $this->db->update($table ?? $this->tableName, $data);
    }

    public function delete(array $whereArr, $table = null)
    {
        if(empty($whereArr)){
            return false;
        }
        $table = $table ?? $this->tableName;
        $this->db->where($whereArr);
        return $this->db->delete($table);
    }

    public function selectById($id)
    {
        if (empty($id)) {
            return false;
        }
        $data = $this->selectWhere(['id' => $id]);
        return count($data) ? $data[0] : false;
    }


    public function deleteById($id)
    {
        if(empty($id)){
            return false;
        }
        return $this->delete(['id' => $id]);
    }

    public function updateById($id, $data)
    {
        if(empty($id)){
            return false;
        }
        return $this->update(['id' => $id], $data);
    }

    public function updateBatch(string $field, array $dataArr, $table = NULL)
    {
        if(empty($field) || empty($dataArr)){
            return false;
        }
        return $this->db->update_batch($table ?? $this->tableName, $dataArr, $field);
    }
}