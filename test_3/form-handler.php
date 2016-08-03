<?php 

/*

Written by Steven Jackson - 3 August 2016

*/ 

require_once ("config.php");
require_once ("functions.php");


// // If POST value is set. Assign to variable
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : null;
$arr_image_details = isset($_FILES['image']) ? image_validation($_FILES['image']) : null;


$confirm_number = gen_rand_confirm_link(13);
// echo $confirm_number;


// Debug 
print_r($arr_image_details);
echo "<br><br>";

/*
**************************
	IMAGE VALIDATION
**************************
*/



function image_validation($image) {

/****************************************************************************
 Additional layer of error handling incase the input in the DOM is modified 
 *****************************************************************************/
 image_extension_validator ($image);

/****************************
  SIZE VALIDATION FUNCTION 
  *****************************/
  image_file_size($image);


// Register new array
  $arr_image_details = [];

// Check image dimensions
  $image_dimensions = getimagesize($image["tmp_name"]);
  $image_width = $image_dimensions[0];
  $image_height = $image_dimensions[1];

// Image orientation
  $image_orientation = ($image_width > $image_height)? "Landscape": "Portait";


  if (!file_exists('images')) {
  	mkdir('images', 0777, true);
  }


// Move to images directory
  move_uploaded_file($image['tmp_name'], 'images/ '. $image['name']);

// Push details to array
  array_push($arr_image_details, dirname(__FILE__).'\images\\' . $image['name']);
  array_push($arr_image_details, $image_orientation);

// Serialize array for mySql
  serialize($arr_image_details);

// Return array
  return $arr_image_details;


}











?>