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

// if image is set. Run image_validation(). See function below
$arr_image_details = isset($_FILES['image']) ? image_validation($_FILES['image']) : null;


$confirm_number = gen_rand_confirm_link(13);
// echo $confirm_number;


// Debug 
echo "working";
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
 // Located in functions.php
 $image_extension = image_extension_validator ($image);

/*****************************
  SIZE VALIDATION FUNCTION 
  ****************************/
  // Located in functions.php
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

/*****************************
  RESIZE AND COPY FILE 
  ****************************/
  // Located in functions.php
  image_resize_and_copy($image_width, $image_height, $image_temp_path, $image_new_path, $image_extension);


// Image orientation
  $image_orientation = ($image_width > $image_height)? "Landscape": "Portait";


// Push details to array
  array_push($arr_image_details, $image_new_path);
  array_push($arr_image_details, $image_orientation);

// Serialize array for mySql
  serialize($arr_image_details);

// Return array
  return $arr_image_details;


}











?>