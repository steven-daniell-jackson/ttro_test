<?php 
/*
Written by Steven Jackson - 2 August 2016

Test provided by The Training Room Online

Test Description:
Create a script that sorts the following words by length from the shortest to the longest words. Create a function to make all of the words sentence case.

truck
cat
marshmallows
elevator
Berlin

*/

/*

ASSUMPTION:
Not sure what the input type is so I just created an simple array which contains the original words.
Used a decoded json array for the example.


**************************
	ORIGINAL DATA SET 
**************************
*/

// Just created a simple array with the original data
$arr_original = array('truck', 'cat', 'marshmallows', 'elevator', 'Berlin' );

// Converted to json and decoded it
$json_words = '["truck","cat","marshmallows","elevator","Berlin"]';
$arr_words = json_decode($json_words);



// Original Data
echo "<h1>Original Data set</h1> ";

echo "<h3>JSON Data</h3>";
echo $json_words;


// Print decoded array
echo "<h3>Decoded JSON Array</h3>";


// Print Result
foreach ($arr_words as $word) {
	echo $word . "<br>";
}



/*
**************************
	ASCENDING ORDER 
**************************
*/


echo "<h3>Sorted Array on String lengths in Ascending order</h3>";

// Sort on custom result from array_sort_length function and overwrite existing
usort($arr_words, "array_sort_asc_length");

// Print Result
foreach ($arr_words as $word) {
	echo $word . "<br>";
}


/*
**************************
	DESCENDING ORDER 
**************************
*/


// Sort on custom result from array_sort_length function and overwrite existing

// echo "<h3>Sorted Array on String lengths in Descending order</h3>";

// usort($arr_words, "array_sort_desc_length");

// foreach ($arr_words as $word) {
// 	echo $word . "<br>";
// }




/*
**************************
	FIRST UPPERCASE 
**************************
*/

echo "<h3>Sorted Array on String lengths in Ascending order</h3>";


// See first_character_uppercase() for comments
$arr_first_uppercase = first_character_uppercase($arr_words);

// Print Result
foreach ($arr_first_uppercase as  $value) {
	echo $value . "<br>";
}





/*
**************************
		 FUNCTIONS 
**************************
*/


// Array Sort by Length of string in Ascending Order
function array_sort_asc_length($first, $second) {
	return strlen($first) - strlen($second);	
}



// Array first character to uppercase
function first_character_uppercase($array) {

// Loop through array and use the current index and replace the value after running ucfirst()
	foreach ($array as $key => $value) {
		$array[$key] = ucfirst($value);
	}

	return $array;

}



/*
**************************
		 BONUS 
**************************
*/

// Array Sort by Length of string in Descending order
function array_sort_desc_length($first, $second) {

	return strlen($second) - strlen($first);
}





?>