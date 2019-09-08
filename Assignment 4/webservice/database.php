<?php

<?php

//connection
$servername = 'localhost';
$dbname = 'Assignment6';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "<script>console.log('Connected sucessfully')</script>";

?>
