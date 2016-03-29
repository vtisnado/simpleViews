simpleViews
===========
Get all column names and data just knowing the table name.

Get all columns with the funcion **get_table_columns()** the only required parameter is the __table name__
Also you can pass and array of desired column names.

```
get_table_columns($table_name, $choosen_fields = [])
```

Get call table data with the function **get_table_entries()** the only required parameter is the __table name__
Optional you can pass and array of desired column names and array of filters in [Code Igniter DB Query Builder Class format](https://www.codeigniter.com/userguide3/database/query_builder.html).

```
get_table_entries($table_name, $choosen_fields = [], $filters = [])
```

