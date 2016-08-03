<?php  

/** Email information **/

$admin_email = "stevenjackson.sanguine@gmail.com";
$from_email = "stevenjackson.sanguine@gmail.com";


/** Max image size in megabytes */
define('MAX_IMAGE_SIZE_MB', '2');


/** MySQL database name*/
define('DB_NAME', 'ttro_test3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');

/** MySQL Table name */
define('DB_TABLE', 'entries');






// Create instance of MySQLi
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

/* Create table if it does not exist  */
$mysqli->query("CREATE TABLE IF NOT EXISTS entries (
user_id INT AUTO_INCREMENT,
  email VARCHAR(45) DEFAULT NULL,
  password VARCHAR(45) DEFAULT NULL,
  hobbies VARCHAR(45) DEFAULT NULL,
  iamge_details VARCHAR(45) DEFAULT NULL,
  confrim_number VARCHAR(45) DEFAULT NULL,
  active BOOLEAN DEFAULT NULL,
  PRIMARY KEY (user_id) )"
  );

?>