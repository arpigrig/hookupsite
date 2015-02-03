<?php

$dbJSON = $_POST['dbJSON'];

$choices = json_decode(stripslashes($dbJSON),true);

$userPhoneNumber = $choices['user'];
$choices = $choices['choices'];

if ($userPhoneNumber != ""){
	
    include_once('db_connect.php');
    for($i=0;$i<sizeof($choices);$i++){
		$choice = $choices[$i];
		$choice_phoneNumber = $choice['phone'];
		$choice_name = $choice['name'];
		$choice_dinner = $choice['dinner'];
		$choice_date =  $choice['date'];
		$choice_sex =  $choice['sex'];
		$choice_is_synced =  $choice['is_synced'];
		
		$result = mysql_query("SELECT * FROM contact_relation WHERE user_id = '".$userPhoneNumber."' AND contact_id = '".$choice_phoneNumber."'");
		$row = mysql_fetch_array($result);
		$num_results = mysql_num_rows($result);
       
		if($num_results == 0){
			$result = mysql_query("INSERT INTO contact_relation (user_id,contact_id, dinner, date, sex, is_synced) 
								VALUES ('".$userPhoneNumber."', '".$choice_phoneNumber."', '".$choice_dinner."', '".$choice_date."', '".$choice_sex."', '".$choice_is_synced."')");
		}else{
            mysql_query("UPDATE contact_relation SET dinner = '".$choice_dinner."', date = '".$choice_date."', sex = '".$choice_sex."', is_synced = '".$choice_is_synced."' where user_id = '".$userPhoneNumber."' AND contact_id = '".$choice_phoneNumber."'");
		}
	}
							
	$sync_result = mysql_query("SELECT * FROM contact_relation WHERE contact_id = '".$userPhoneNumber."' and is_synced = 'F'");
	$results_array = array();
	
	while ($row = mysql_fetch_array($sync_result)) {
		$temp_array = array();
		
		$temp_array['user_id'] = $row{'user_id'};
		$temp_array['phone'] = $userPhoneNumber;
		$temp_array['name'] = "";
		$temp_array['dinner'] = $row{'dinner'};
		$temp_array['date'] = $row{'date'};
		$temp_array['sex'] = $row{'sex'};
		$temp_array['is_synced'] = $row{'is_synced'};
		
		array_push($results_array,$temp_array);
	}
	
   mysql_query("UPDATE contact_relation SET is_synced='T' WHERE contact_id = '".$userPhoneNumber."'"); 
                     
	$final_array = array();
	$final_array['choices'] = $results_array;
	
	header('Content-Type: application/json');
	echo json_encode($final_array);
}
?>
