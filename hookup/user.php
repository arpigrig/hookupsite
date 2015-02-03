<?php

$phoneNumber = $_POST['phone'];
$name = "";
$email = "";

if ($phoneNumber != ""){
	
    include_once('db_connect.php');

    $result = mysql_query("SELECT * FROM user WHERE phone = ".$phoneNumber);
	$row = mysql_fetch_array($result);
	$num_results = mysql_num_rows($result);
 
    if($num_results == 0){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
		}
		if(isset($_POST['email'])){
			$email = $_POST['email'];
		}
        $code = rand(1000, 9999);
		$insert_results = mysql_query("INSERT INTO user (phone, code, name, email) VALUES ('".$phoneNumber."', ".$code.", '".$name."', '".$email."')");
	}else{
        $code = $row[CODE];
	}
    
  #  $result = mysql_query("SELECT code FROM user WHERE phone = ".$phoneNumber);
  #  $row = mysql_fetch_array($result);
  #	 $num_results = mysql_num_rows($result);
  #  $code = $row{'code'};
  #  if($num_results > 0){
    #	$to = $phoneNumber."@blueskyfrog.com".","
	#		.$phoneNumber."@optusmobile.com.au".","
	#		.$phoneNumber."@voicestream.net".","
	#		.$phoneNumber."@slinteractive.com.au".","
	#		.$phoneNumber."@sms.comviq.se".","
	#		.$phoneNumber."@sms.tele2.se".","
	#		.$phoneNumber."@europolitan.se".","
	#		.$phoneNumber."@sms.3rivers.net".","
	#		.$phoneNumber."@paging.acswireless.com".", grigoryan.arpi@gmail.com".","
	#		.$phoneNumber."@advantagepaging.com";

 	#	$subject = "ContactHookUp verification code";
 	#	$body = "Hi! Your verification code is ".$row{'code'}."!";
 	#	if (mail($to, $subject, $body)) {
  	
 	#	}
	
  # }
    echo $code;
	
}

?>