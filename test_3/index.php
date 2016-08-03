<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >


</head>
<body class="container">

	<h2>Registration form</h2>

	<!-- <form action="form-handler.php" method="POST" enctype="multipart/form-data"> -->
	<form name="registration" id="registration" action="form-handler.php" method="POST" enctype="multipart/form-data">

		<label for="">Email</label><br>
		<input type="email" name="email"><br>


		<label for="">Password</label><br>
		<input type="password" name="password"><br>

		<label for="">Confirm Password</label><br>
		<input type="password" name="confirm"><br>

		<label for="">Hobbies</label><br>
		<div id="hobbies-wrapper">
		<input type="text" name="hobby1" id="hobbies-list"><br>
		</div>
		<a class="add-new-hobbie">+ Add new Hobby</a><br>

		<label for="">Image</label><br>
		<!-- <input type="file" accept="" name="image"><br> -->
		<input type="file" accept=".jpeg, .png, .JPG, .PNG" name="image"><br>

		<p class="error"><?php ?></p>

		<input type="submit">

	</form>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/main.js" ></script>


</body>
</html>











