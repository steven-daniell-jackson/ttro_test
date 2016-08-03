<?php 

/*

Written by Steven Jackson - 3 August 2016

*/ 

require ("config.php");


// // If POST value is set. Assign to variable
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : null;
$image = isset($_POST['image']) ? $_POST['image'] : null;

echo $email;

$image_details = "123";
$confirm_number = gen_rand_confirm_link(13);

echo $confirm_number;

/*
**************************
	VALIDATION
**************************
*/




/*
**************************
	Mailing Script
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
	FUNCTIONS
**************************
*/

// COPIED FROM https://www.xeweb.net/2011/02/11/generate-a-random-string-a-z-0-9-in-php/
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
		$str .= $characters[$rand];
	}

	// Return value
	return $str;
}

?>