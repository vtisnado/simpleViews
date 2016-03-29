<?php
// Work in progress

function get_table_entries($table_name, $choosen_fields = [], $filters = [])
{
// Working in this function. Come back later.

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
