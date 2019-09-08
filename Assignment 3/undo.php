	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}





	session_start();







	


	if($_SESSION["key"]=="create"){

		
		$sql="DELETE from eBook_MetaData order by id desc limit 1;";

	
	}


	else if($_SESSION["key"]=='delete'){
		// this is coming from delete.php, when its deleted, it stores this stuff and then you access it now. 

	$id = $_SESSION["deletedID"];
	$creator = $_SESSION["deletedCreator"];
	$title = $_SESSION["deletedTitle"];
	$type=$_SESSION["deletedType"];
	$identifier= $_SESSION["deletedIdentifier"];
	$date = $_SESSION["deletedDate"];
	$language = $_SESSION["deletedLanguage"];
	$description = $_SESSION["deletedDescription"];



		 $sql="INSERT INTO eBook_MetaData (ID,creator,title,type,identifier,date,language,description) VALUES ('$id','$creator','$title','$type',' $identifier','$date','$language','$description');";



		
	} 
	else if ($_SESSION["key"]=="update"){

	
	$id = $_SESSION["updatedID"];
	$creator = $_SESSION["updatedCreator"];
	$title = $_SESSION["updatedTitle"];
	$type=$_SESSION["updatedType"];
	$identifier= $_SESSION["updatedIdentifier"];
	$date = $_SESSION["updatedDate"];
	$language = $_SESSION["updatedLanguage"];
	$description = $_SESSION["updatedDescription"];

	$sql = "UPDATE eBook_MetaData SET ID='$id',creator='$creator',title='$title',identifier='$identifier',date='$date',language='$language',description='$description' where ID='$id'; ";


	}
	if ($_SESSION["key"]=="random"){

	}

if(mysqli_query($conn, $sql)){
	echo "\n undo occurred.";


	$redirect = "http://localhost/Assignment3/index.php?button1=";
	header('Location: '.$redirect);
 }
else {
	echo "\nError insertion:" .mysqli_error($conn);
}


mysqli_close($conn);
	?>
