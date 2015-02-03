<?php
mysql_connect("203.124.112.41:3306","contacthookup","ContactHUp1!");
mysql_select_db("contacthookup");
$sql=mysql_query("INSERT INTO user VALUES ('4', 'Arpi', '0934546345', 'aaaa', '98374545')");
echo "bbb".$sql;
if(!$sql)
echo "Error in query: ".mysql_error();
mysql_close();
?> 

<!--$sql=mysql_query("INSERT INTO user VALUES ('5', '".$_REQUEST['name']."', '".$_REQUEST['phone']."')");--!>
