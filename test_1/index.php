<?php 


// Get HTTP Variables from form input
if (isset($_GET["specialCharacter"])) {
	$specialCharacter = $_GET["specialCharacter"];
} 	

if (isset($_GET["size"])) {
	$pyramid_size = $_GET["size"];
}



// Pyramid Function
function pyramid ($fnc_pyramid_character, $fnc_pyramid_size) {

	// Double the input size due to odd and even numbers
	$fnc_full_pyramid_size = $fnc_pyramid_size * 2;


	// Used for "str_repeat()", just to make it look cleaner
	$spacer = "&nbsp;";

	// Used to add the correct amount of spacing before the character based on the double the pyramid's size 
	$spacingCounter = $fnc_full_pyramid_size;


// Loop  through the full pyramid size
	for ($y=0; $y < $fnc_full_pyramid_size; $y++) { 

	// Only style and print odd numbers
		if ($y%2 != 0) {
			echo str_repeat($spacer, $spacingCounter - 1);
			echo str_repeat($fnc_pyramid_character, $y);
			echo "<br>";

		}
		
		// Decrement spacing counter
		$spacingCounter--;
	}

}


// Debug
// pyramid('*', 10);

?>

<html>
<head>

</head>
<body>

	<h1>Build a Pyramid</h1>


	<?php // Basic form requesting input for pyramid function and posts via GET ?>

	<form action="index.php" method="GET">
		<label for="specialCharacter">Enter the special character: </label>
		<input type="text" pattern="[^0-9]*" name="specialCharacter" title="Only characters allowed" maxlength="1" required>

		<br><br>
		<label for="size">Enter the special character: </label>
		<select name="size" required>
			<option value="" selected disabled>Choose a size</option>
			<option value="4">4</option>
			<option value="6">6</option>
			<option value="8">8</option>
			<option value="10">10</option>
		</select>
		<br><br>
		<input type="submit">

	</form>
	<br>
	<hr><br>


	<?php  

// Run Pyramid function if GET Variables are set
	pyramid (
		(isset($specialCharacter))? $specialCharacter : null, 
		(isset($pyramid_size))? $pyramid_size : null)
		?>

	</body>
	</html>

<?php 


/*
Written by Steven Jackson - 2 August 2016

Test provided by The Training Room Online

Test Description:

Create a function that allows the user to enter a character (e.g. '*')
Then they choose a number 4,6,8 or 10.
The function must then create a pyramid using the character and the number that the user entered will be the number of lines of the pyramid.
The pyramid must be symmetrical. 
There must be 1 character at the top. 

Example:
Inputs:  '*' , '4'
output:

   *
  ***
 *****
*******

*/

 ?>
