<?php 

/*
**************************
	FUNCTIONS
**************************
*/




/*
**************************
	SQL
**************************
*/

// Insert entry into database
// $mysqli->query("
// 	INSERT INTO entries(user_id, email, password, hobbies, image_details, confirm_number, active) 
// 	VALUES (NULL, '$email', '$password', '$hobbies', '$image', '123', '0' )
// 	");

// Close connection
// $mysqli->close();



/*
**************************
	Mailing Function
**************************
*/

// Check on Dev server
	// $to = $admin_email; 
	// $email_subject = "Test 3 - Form Submission";
	// $email_body = "Registration link. \n \n".
	// " Please click the below link to activate your account"; 
	
	// $headers = "From: $from_email\n"; 
	// $headers .= "Reply-To: $from_email";
	
	// mail($to,$email_subject,$email_body,$headers);



// Redirect to Thank you page after submission
// header("Location: ");






/*
**************************
	OTHER
**************************
*/


// Genrate Random String
function gen_rand_confirm_link($length) {

	$str = "";

	// Combines character range into a characters  array
	$arr_characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	
	// Gets the total number of characters in the array
	$arr_max = count($arr_characters) - 1;

	// Loops through the array depending on $length
	for ($i = 0; $i < $length; $i++) {

		// Chooses a rand number within the array and concatenates the $str variable
		$rand = mt_rand(0, $arr_max);
		$str .= $arr_characters[$rand];
	}

	// Return value
	return $str;
}

 ?>