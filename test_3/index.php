<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Registration form</h2>

<form action="form-handler.php" method="POST" enctype="multipart/form-data">
	
	<label for="">Email</label><br>
	<input type="email" name="email"><br>


	<label for="">Password</label><br>
	<input type="password" name="password"><br>

	<label for="">Confirm Password</label><br>
	<input type="password" name="confirm"><br>

	<label for="">Hobbies</label><br>
	<input type="text" name="hobbies"><br>

	<label for="">Image</label><br>
	<input type="file" accept="" name="image"><br>
	<!-- <input type="file" accept=".jpeg, .png, .JPG, .PNG" name="image"><br> -->

<p class="error"><?php ?></p>

<input type="submit">

</form>

</body>
</html>











