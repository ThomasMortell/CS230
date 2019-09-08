	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "Connected sucessfully \n";

session_start();
		$deleteRow = $_POST["idDelete"];

	$_SESSION["key"]="delete";

//

	$sql1 = "select * from eBook_MetaData where ID=$deleteRow;";


	$result10 = $conn->query($sql1);

	$sql = "DELETE from eBook_MetaData
	where ID='$deleteRow';";



if(mysqli_query($conn, $sql1)){

	while($row=$result10->fetch_assoc()){
		$_SESSION["deletedID"]  = $row["ID"];
		$_SESSION["deletedCreator"] = $row["creator"];
		$_SESSION["deletedTitle"]= $row["title"];
		$_SESSION["deletedType"] = $row["type"];
		$_SESSION["deletedIdentifier"] = $row["identifier"];
		$_SESSION["deletedLanguage"] = $row["language"];
		$_SESSION["deletedDescription"] = $row["description"];
		$_SESSION["deletedDate"] = $row["date"];
}
	
}


if(mysqli_query($conn, $sql)){
	while($row=$result10->fetch_assoc()){


}
	echo "\nDeletion Insertion occurred.";
	$redirect = "http://localhost/Assignment3/index.php?button1=";
	header('Location: '.$redirect);
}
else {
	echo "\nError insertion:" .mysqli_error($conn);
}


mysqli_close($conn);
	?>