<?php
/**
 * Writen by: Victor Tisnado - victortisnado.com
 * March 31, 2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends CI_Model {
	// Get entries from given table. Table columns can be passed as an array
	function get_table_entries($table_name, $choosen_fields = [], $filters = [])
	{
		$i = 0;
		$data = [];
		$entry = [];
		// Select only given columns
		if (!empty($choosen_fields)){
			foreach($choosen_fields as $choosen_field){
				$this->db->select($choosen_field);
			}
		}
		// Add filters given as array
		if (!empty($filters)){
			foreach($filters as $filter){
				$this->db->where($filter);
			}
		}
		$query = $this->db->get($table_name);
		
		$table_columns = $this->get_table_columns($table_name, $choosen_fields);
		
		foreach ($query->result() as $row):
		
			foreach ($table_columns as $table_column):
				$entry[$table_column] = $row->$table_column;
			endforeach;
			
			$data[$i] = $entry;
			$i++;
		endforeach;
		
		return $data;
	}



	// Get column names from given table. Table columns can be passed as an array
	function get_table_columns($table_name, $choosen_fields = [])
	{
		$fields = $this->db->list_fields($table_name);
		$table_columns = array();
		
		foreach ($fields as $field)
		{
			if (!empty($choosen_fields)){
				foreach($choosen_fields as $choosen_field){
					if ($field === $choosen_field){
						$table_columns[] = $field;
					}
				}
			}else{			
				$table_columns[] = $field;
			}
		}
		return $table_columns; 
	}

	
}
