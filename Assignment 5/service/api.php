<?php

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$table = $request[0];

$link = mysqli_connect('localhost', 'root', '', 'Assignment5');
mysqli_set_charset($link,'utf8');
// create SQL based on HTTP method


switch ($method){
  case 'GET':
    $sel = htmlspecialchars($_GET['selection']);
    $spec = htmlspecialchars($_GET['specific']);
    //$key = array_shift($request)+0;
    echo "<br>";
    $sql = "SELECT * FROM `$table`".($sel!=="FullTable"?" WHERE $sel='$spec'":'');
  break;

  case 'PUT':
    parse_str(file_get_contents("php://input"),$post_vars);
    $updatecol = $post_vars['updatecol'];
    $updatecolvalue = $post_vars['updatecolvalue'];
    $finalupdatevalue = $post_vars['finalupdatevalue'];
    $updatecolfinal = $post_vars['updatecolfinal'];
    $sql = "update `$table` set $updatecolfinal='$finalupdatevalue'".($updatecol!=="*"?" WHERE $updatecol='$updatecolvalue'":'');
  break;

  case 'POST':
    $descript = $_POST['desc'];
    $namee = $_POST['name'];
    $url = $_POST['url'];
    $sql = "insert into `$table` (name, theDesc, URL) VALUES ('$namee', '$descript', '$url')";
  break;

  case 'DELETE':
    parse_str(file_get_contents("php://input"),$post_vars);
    $sel =$post_vars['select2'];
    $del =$post_vars['deleteid'];
    $sql = "delete from `$table` where $sel='$del'";
  break;
}


$result = mysqli_query($link,$sql);


// print results, insert id or affected row count


if ($method == 'GET') {
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',<br>':'').json_encode(mysqli_fetch_object($result));
  }
  if(mysqli_num_rows($result)==0){
    echo "Could not find results with that corresponding ID or Name";
  }
}
elseif ($method == 'POST') {
 echo "Successfully recorded entry with ID number:";
 echo mysqli_insert_id($link);
} else if($method == 'PUT') {
 echo "Selected item has been updated.";
}
else{
  echo "The numbers of items deleted: ".mysqli_affected_rows($link);
}


mysqli_close($link);
?>
