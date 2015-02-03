<?php
	/* Send an SMS using Twilio. You can run this file 3 different ways:
	 *
	 * - Save it as sendnotifications.php and at the command line, run 
	 *        php sendnotifications.php
	 *
	 * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
	 *   in a web browser.
	 * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
	 *   directory to the folder containing this file, and load 
	 *   localhost:8888/sendnotifications.php in a web browser.
	 */

	// Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
	// and move it into the folder containing this file.
	require "twilio-php/Services/Twilio.php";

	// Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
	$AccountSid = "ACae26566ec01a4c3a3c755aebd50a64fc";
	$AuthToken = "f00553d703d2e2755623c4fcd37dd7bb";

	// Step 3: instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken);

    $phoneNumber = $_POST['phone'];
    if ($phoneNumber != ""){
    
        include_once('db_connect.php');
	
    	$result = mysql_query("SELECT code FROM user WHERE phone = '".$phoneNumber."'");
	    $row = mysql_fetch_array($result);
	    $num_results = mysql_num_rows($result);
    
    	if($num_results > 0){
	    
	// Step 4: make an array of people we know, to send them a message. 
	// Feel free to change/add your own phone number and name here.



	// Step 5: Loop over all our friends. $number is a phone number above, and 
	// $name is the name next to it

		$sms = $client->account->sms_messages->create(

		// Step 6: Change the 'From' number below to be a valid Twilio number 
		// that you've purchased, or the (deprecated) Sandbox number
			"+17068904986", 

         #   "+15005550006",
			// the number we are sending to - Any phone number
			$phoneNumber,

			// the sms body
			"Hi! Your Contact HookUp verification code is ".$row{'code'}.""
		);
        
        echo $sms->sid;

		// Display a confirmation message on the screen
		echo $row{'code'};
	
    }
}


?>