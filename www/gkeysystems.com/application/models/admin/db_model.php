<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_Model extends CI_Model {


	function get($table){
		$query=$this->db->get($table);

		return $query->result_array();
	}
	
	function getData($table,$where = array())
	{	
		$this->db->where($where);			
		$query = $this->db->get($table);

		return $query->result_array();		
	}

    function getDataJoin($table, $table_join, $where = array())
    {
        if (!empty($table_join)){
            $this->db->select($table.'.*,'.$table_join.'.answered_id as answer_id,'.$table_join.'.message as answer_message,'.$table_join.'.date as answer_date');
            $this->db->from($table);
            $this->db->join($table_join, $table_join.'.'.$table.'_id = '.$table.'.id');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }else{
            return $this->getData($table, $where);
        }
    }

	function getDataOrderBy($table)
	{
		$this->db->order_by("id", "desc"); 
		$result = $this->db->get($table);

		return $result->result_array();
	}

	function insert($table,$reg)
	{
		$result=$this->db->insert($table, $reg);

		return $result;
	}

	function update($table,$id,$update)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table,$update);

		return $result; 
	}
	function updateComm($table,$id,$update)
	{
		$this->db->where('id_statement', $id);
		$result = $this->db->update($table,$update);

		return $result; 
	}

	function remove($table,$id)
    {
        $result = $this->db->delete($table, $id);
        return $result;
    }
//for ($i = 0; $i <30; $i++ ){
//            $this->insert($table, array('name' => 'test'.$i, 'message' => 'hello'.$i, ));
//        }
//        die('xs');


}
