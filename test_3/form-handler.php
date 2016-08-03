<?php 

/*

Started by Steven Jackson - 2 August 2016

*/ 

require_once ("config.php");
require_once ("functions.php");


// // If POST value is set. Assign to variable
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;


// if image is set. Run image_validation(). Located in functions.php
$arr_image_details = isset($_FILES['image']) ? image_validation($_FILES['image']) : null;

// If hobby input fields are set. Push to arr_hobbies_list
$arr_hobbies_list = [];
$hobby1 = isset($_POST['hobby1']) ? array_push($arr_hobbies_list, $_POST['hobby1']) : null;
$hobby2 = isset($_POST['hobby2']) ? array_push($arr_hobbies_list, $_POST['hobby2'])  : null;
$hobby3 = isset($_POST['hobby3']) ? array_push($arr_hobbies_list, $_POST['hobby3'])  : null;
$hobby4 = isset($_POST['hobby4']) ? array_push($arr_hobbies_list, $_POST['hobby4'])  : null;


// Create random confirm code
$confirm_number = gen_rand_confirm_link(13);
echo $confirm_number;



// print_r($arr_hobbies_list);
// print_r($arr_image_details);


// Debug 
echo "working";
echo "<br><br>";



sql_write_entry($email, $password, $arr_hobbies_list, $arr_image_details, $confirm_number);












?>