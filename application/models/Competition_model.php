<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competition_model extends MY_Model
{
    protected $tableName = 'competitions';

    public function getCompetitionList()
    {
        $result = $this->db->get('competitions');
        if(empty($result)){
            return false;
        }
        $result = $result->result_array();
        $result = $this->setKeysId($result);
        $result = $this->buildTree($result);
        return $result;
    }

    private function buildTree($array = array(), $pid = 'id_parent')
    {
        $tree = array();
        foreach ($array as $key => $value){
            if($value[$pid] == 0){
                $tree[$key] = $value;
            }
            else{
                $parent = $value[$pid];
                $tree[$parent][$key] = $value;
            }
        }
        return $tree;
    }

    private function setKeysId($oldArr = array(), $key = 'id')
    {
        $newArr = array();
        foreach ($oldArr as $value){
            $newArr[$value[$key]] = $value;
        }
        return $newArr;
    }
}