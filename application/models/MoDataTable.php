<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MoDataTable extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($table,$column_order,$column_search,$col_where , $where ,$order,$joinTable, $joinCol)
    {
        if ($column_order != null){
            $this->db->select($column_order);
        }
        if ($col_where != 'not')
        {
        	if  (is_array($col_where)) {
		        foreach ($col_where as $key => $value) {
		            if (is_array($col_where[$key])){
                        foreach ($col_where[$key] as $key1 => $value1) {
                            if ($key1 == 0){
                                $this->db->where($col_where[$key][$key1] , $where[$key][$key1]);
                            }else{
                                $this->db->or_where($col_where[$key][$key1] , $where[$key][$key1]);
                            }
                        }
                    }else{
                        $this->db->where($col_where[$key] , $where[$key]);
                    }
		        }
	        }else{
		        $this->db->where($col_where , $where);
	        }
        }
         $this->db->from($table);
        if ($joinTable != null){
            if  (is_array($joinTable)) {
                foreach ($joinTable as $key => $value) {
                    $this->db->join($joinTable[$key] , $joinCol[$key]);
                }
            }else{
                $this->db->join($joinTable,$joinCol);
            }
        }
        $i = 0;
        foreach ($column_search as $item) // loop column
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($column_search) - 1 == $i) {//last loop
	                $this->db->group_end(); //close bracket
                }
            }else{
            	break;
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($order))
        {
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table,$column_order,$column_search,$col_where , $where , $order ,$joinTable = null , $joinCol = null)
    {
        $this->_get_datatables_query($table,$column_order,$column_search,$col_where , $where ,$order,$joinTable, $joinCol);
        if(isset($_POST['length']) && $_POST['length'] != -1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
//        var_dump($this->db->last_query());exit;
        return $query->result();
    }

    function count_filtered($table,$column_order,$column_search,$col_where,$where,$order,$joinTable = null, $joinCol = null)
    {
        $this->_get_datatables_query($table,$column_order,$column_search,$col_where , $where ,$order,$joinTable, $joinCol);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table,$col_where , $where,$joinTable = null, $joinCol = null)
    {
        if ($col_where != 'not')
        {
            if  (is_array($col_where)) {
                foreach ($col_where as $key => $value) {
                    if (is_array($col_where[$key])){
                        foreach ($col_where[$key] as $key1 => $value1) {
                            if ($key1 == 0){
                                $this->db->where($col_where[$key][$key1] , $where[$key][$key1]);
                            }else{
                                $this->db->or_where($col_where[$key][$key1] , $where[$key][$key1]);
                            }
                        }
                    }else{
                        $this->db->where($col_where[$key] , $where[$key]);
                    }
                }
            }else{
                $this->db->where($col_where , $where);
            }
        }
        $this->db->from($table);
        if ($joinTable != null && $joinCol != null){
            if  (is_array($joinTable)) {
                foreach ($joinTable as $key => $value) {
                    $this->db->join($joinTable[$key] , $joinCol[$key]);
                }
            }else{
                $this->db->join($joinTable,$joinCol);
            }
        }
        return $this->db->count_all_results();
    }
}