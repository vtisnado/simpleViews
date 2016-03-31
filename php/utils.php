<?php
/**
 * Writen by: Victor Tisnado - victortisnado.com
 * March 31, 2016
 */

function get_table_entries($table_name, $choosen_fields = [], $filters = [])
{
	$j = 0;
	$data = [];
	$entry = [];
	
	// Select only given columns
	if (!empty($choosen_fields)){
		$fields = implode(",", $choosen_fields);
	}else{
		$fields = "*";
	}
	
	// Add filters given as array
	if (!empty($filters)){
		$filter = implode(" AND ", $filters);
	}else{
		$filter = '1=1';
	}

	$sql = mysql_query("SELECT ". $fields ." FROM " . $table_name . " WHERE ". $filter);
	$table_columns = get_table_columns($table_name, $choosen_fields);
	while($row = mysql_fetch_array($sql, MYSQL_NUM))
	{
		$i = 0;
		foreach ($table_columns as $table_column):
			$entry[$table_column] = $row[$i];
			$i++;
		endforeach;
		$data[$j] = $entry;
		$j++;

	}
	return $data;
}



function get_table_columns($table_name, $choosen_fields = [])
{
	$table_columns = array();
	$sql = mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" . $table_name . "'");
	while($row = mysql_fetch_array($sql, MYSQL_NUM))
	{
		if (!empty($choosen_fields)){
			foreach($choosen_fields as $choosen_field){
				if ($row[0] === $choosen_field){
					$table_columns[] = $row[0];
				}
			}
		}else{
			$table_columns[] = $row[0];
		}
	}
	return $table_columns;
}
