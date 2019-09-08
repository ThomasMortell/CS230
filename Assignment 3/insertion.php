	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	//session starts for the global variable
	session_start();
	echo "Connected sucessfully \n";
	//takes the variables sent into the post global array.

	$id = $_POST["ID"];
	$creator = $_POST["creator"]; 
	$title = $_POST["title"];
	$type = $_POST["type"];
	$identifier =  $_POST["identifier"]; 
	$date = $_POST["date"]; 
	$language = $_POST["language"];
	$description = $_POST["description"];



	$_SESSION["ID"]= $id;
	$_SESSION["creator"]=$creator;
	$_SESSION["title"]=$title;
	$_SESSION["type"]=$type;
	$_SESSION["identifier"]=$identifier;
	$_SESSION["description"]=$description;
	$_SESSION["date"]=$date;
	$_SESSION["language"]=$language;



$sql = "INSERT INTO eBook_MetaData (creator,title,type,identifier,date,language,description)
values ('$creator','$title','$type','$identifier','$date','$language','$description');";

	$_SESSION["key"] = "create";


if(mysqli_query($conn, $sql)){
	echo "\nInsertion occurred.";
	$redirect = "http://localhost/Assignment3/index.php?button1=";
	header('Location: '.$redirect);
}

else {
	echo "\nError insertion:" .mysqli_error($conn);
}



mysqli_close($conn);
	?>