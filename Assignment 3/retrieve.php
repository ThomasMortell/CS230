	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}

	$sql = "Select * from myDB.eBook_MetaData;";

$result = mysqli_query($conn,$sql);
 

$counter;
if (isset($_REQUEST['button1'])){

$collector="";

while($row=mysqli_fetch_array($result)){
		$collector  = $collector."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";

}
}

if (isset($_REQUEST['updateOption'])){


$collector="";

while($row=mysqli_fetch_array($result)){
		$collector  = $collector."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";

}
}
if (isset($_REQUEST['buttonCreate'])){
	
}


mysqli_close($conn);
	?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">