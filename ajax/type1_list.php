<?php
$servername = "localhost";
$username = "material";
$password = "84289961";
$dbname = "material";

$success = false;
$data = array();
$res = array("success"=>$success, "data"=>$data);

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo json_encode($res);
}else{
  $res["success"] = true;    
}
$sql = "SELECT * FROM `type1` WHERE `status`=1 ORDER BY `sort`";
$result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
  }
// }

$res["data"] = $data;
echo json_encode($res);
?>