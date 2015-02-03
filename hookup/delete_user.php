<?php

$phoneNumber = $_POST['phone'];
$contactNumber = $_POST['contact_phone'];

if ($phoneNumber != "" && $contactNumber != ""){
	
    include_once('db_connect.php');

  	$delete_results = mysql_query("DELETE FROM contact_relation WHERE user_id = '".$phoneNumber."' and contact_id = '".$contactNumber."'");

    echo $delete_results;
	
}

?>