simpleViews
===========
Get all column names and data entries just with the table name.

The function **get_table_columns()** returns an array of column names. The only required parameter is the __table name__
Also you can pass and array of desired column names if you know them already.

```
get_table_columns($table_name, $choosen_fields = [])
```

Get all entries with the function **get_table_entries()** the only required parameter is the __table name__
Optional you can pass an array of desired column names and/or an array of filters. The filters should be in [Code Igniter DB Query Builder Class format](https://www.codeigniter.com/userguide3/database/query_builder.html) in the Codeigniter version.

```
get_table_entries($table_name, $choosen_fields = [], $filters = [])
```

You can choose between the traditional PHP (php/utils.php) or Codeigniter version (codeigniter/model.php).
