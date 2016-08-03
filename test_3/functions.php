<?php 

/*
****************************************************

			IMAGE VALIDATION FUNCTIONS

****************************************************
*/

/*
**************************
	MAIN FUNCTION
**************************
*/

function image_validation($image) {

/****************************************************************************
 Additional layer of error handling incase the input in the DOM is modified 
 *****************************************************************************/
 // Located in functions.php
 $image_extension = image_extension_validator ($image);

/*****************************
  SIZE VALIDATION FUNCTION 
  ****************************/
  // See below
  image_file_size($image);


// Variables
  $image_new_path = dirname(__FILE__).'\images\\' . $image['name'];
  $image_temp_path = $image['tmp_name'];
  $arr_image_details = [];

// Check image dimensions
  $image_dimensions = getimagesize($image["tmp_name"]);
  $image_width = $image_dimensions[0];
  $image_height = $image_dimensions[1];



// Create /images/ directory if it does not exist
  if (!file_exists('images')) {
  	mkdir('images', 0777, true);
  }

/**********************************************
  RESIZE IMAGE AND COPY TO IMAGES DIRECTORY 
  *********************************************/
  // LSee below
  image_resize_and_copy($image_width, $image_height, $image_temp_path, $image_new_path, $image_extension);


// Image orientation
  $image_orientation = ($image_width > $image_height)? "Landscape": "Portait";


// Push details to array
  array_push($arr_image_details, $image_new_path);
  array_push($arr_image_details, $image_orientation);

// Return array
  return $arr_image_details;


}


/*****************************************************************************
 Additional layer of error handling incase the input in the DOM is modified 
 *****************************************************************************/
 function image_extension_validator ($image){

	// Acceptable file types (Can be move to global is required)
 	$arr_image_extension = ['jpg','png'];


// Get extension and convert to lower case
 	$extension = substr($image['name'], strpos($image['name'], '.') + 1);
 	$extension = strtolower($extension);


// Double check the extension name. Only accepts jpg and png
 	if ( !in_array($extension, $arr_image_extension) ) {
 		echo "ERROR - Incorrect format <br>";
 		echo "$extension is not the correct file type<br>";
 		echo "Needs to be either jpg or png";
 		exit();
 	}

 	return $extension;

 }


/********************************
  Scale Image height to 200 
 ********************************/
  function image_resize($width, $height, $target) {

  	$arr_return = [];

	//Gets the ratio of the the height

  	$percentage = ($target / $height);

	//Gets the new value and applies the percentage, then rounds the value
  	$width = round($width * $percentage);
  	$height = round($height * $percentage);

	//Push to Array

  	array_push($arr_return, $width);
  	array_push($arr_return, $height);

	//Return Array
  	return $arr_return;

  }


/**********************************************
  RESIZE IMAGE AND COPY TO IMAGES DIRECTORY 
  *********************************************/
  function image_resize_and_copy($image_width, $image_height, $image_temp_path, $image_new_path, $extension){

  	$arr_resized_image_dimensions = image_resize($image_width, $image_height, 200);

  	if ($extension == "png") {
	// Resize image and save to '/images/' directory
  		$src = imagecreatefrompng($image_temp_path);
  		$tmp = imagecreatetruecolor($arr_resized_image_dimensions[0],$arr_resized_image_dimensions[1]);
  		imagecopyresampled($tmp,$src,0,0,0,0,$arr_resized_image_dimensions[0],$arr_resized_image_dimensions[1], $image_width,$image_height);
  		imagepng($tmp, $image_new_path ,3);

  	} else {

 		// Resize image and save to '/images/' directory
  		$src = imagecreatefromjpeg($image_temp_path);
  		$tmp = imagecreatetruecolor($arr_resized_image_dimensions[0],$arr_resized_image_dimensions[1]);
  		imagecopyresampled($tmp,$src,0,0,0,0,$arr_resized_image_dimensions[0],$arr_resized_image_dimensions[1], $image_width,$image_height);
  		imagejpeg($tmp, $image_new_path ,3);
  	}



// Debug
  	// print_r($arr_resized_image_dimensions);



  }

/********************************
  SIZE VALIDATION FUNCTION 
  *******************************/

  function image_file_size($image){

	// Fixed - WAMP had a 2MB upload limit
  	$maxFileSize = MAX_IMAGE_SIZE_MB * 1024 * 1024;
  	if ($_FILES["image"]["size"] > $maxFileSize ) {
  		echo "ERROR - Image size is too big. <br>";
  		echo "Max image size is " . MAX_IMAGE_SIZE_MB ."mb<br>";
  		exit();
  	}

  }


/*
****************************************************

			END IMAGE VALIDATION FUNCTIONS

****************************************************
*/



/*
**************************
	SQL
**************************
*/


function sql_write_entry($email, $password, $arr_hobbies, $arr_image_details, $confirm_number){

$arr_hobbies = implode($arr_hobbies, ',');
$arr_image_details = implode($arr_image_details, ','); 

echo "here";
echo $confirm_number;

echo($arr_image_details);

print_r($arr_hobbies);
print_r($arr_image_details);

// Create instance of MySQLi
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// /* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

/* Create table if it does not exist  */
$mysqli->query("CREATE TABLE IF NOT EXISTS " . DB_TABLE . " (
user_id INT AUTO_INCREMENT,
  email VARCHAR(45) DEFAULT NULL,
  password VARCHAR(45) DEFAULT NULL,
  hobbies VARCHAR(45) DEFAULT NULL,
  image_details VARCHAR(45) DEFAULT NULL,
  confirm_number VARCHAR(45) DEFAULT NULL,
  active BOOLEAN DEFAULT NULL,
  PRIMARY KEY (user_id) )"
  );


// Insert entry into database
$mysqli->query("
	INSERT INTO entries(user_id, email, password, hobbies, image_details, confirm_number, active) 
	VALUES (NULL, '$email', '$password', '$arr_hobbies', '$arr_image_details', '$confirm_number', '0' )
	");

// Close connection
$mysqli->close();

}





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


function serialize_array($array){
$array = serialize($array);
}

?>