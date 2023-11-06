<?php
ini_set("display_errors",1);

$servername = "localhost";
$username = "material";
$password = "84289961";
$dbname = "material";
$res = array("data"=>array(), "err_msg"=>"");

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
  $res["err_msg"] = $conn->connect_error;
  echo json_encode($res);
  exit;
}
// mysqli_report(MYSQLI_REPORT_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$name = $_POST["name"];
$sort = $_POST["sort"] == "" ? 0 : $_POST["sort"];
$status = $_POST["status"] == "" ? 0 : $_POST["status"];

$sql = "INSERT INTO `type1` SET `name`=?,`sort`=?,`status`=?, `create_time`=NOW()";
if(!$stmt = $conn->prepare($sql)) {
  $res["err_msg"] = "新增失敗:".$conn->error;
  echo json_encode($res);
  exit;
}

if(!$stmt->bind_param('ssd', $name, $sort, $status)){
  $res["err_msg"] = "新增失敗:".$stmt->error;
  echo json_encode($res);
  exit;
}

if(!$stmt->execute()){
  $res["err_msg"] = "新增失敗:".$stmt->error;
  echo json_encode($res);
  exit;
}

$insert_id = $conn->insert_id;
if(!$insert_id){
  $res["err_msg"] = "新增失敗,無insert_id";
  echo json_encode($res);
  exit;    
}

$validExt = array("jpeg", "jpg", "png", "gif", "bmp", "pdf", "doc", "ppt");
$rootPath = "../";
$uploadPath = "/upload/type1/";
if($_FILES["img_pc"]){
  $img = $_FILES["img_pc"]["name"];
  $tmp = $_FILES["img_pc"]["tmp_name"];
  $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  $filename = md5(rand()).".".$ext;
  $img_pc = $uploadPath.strtolower($filename);

  if(!in_array($ext,$validExt) || !move_uploaded_file($tmp,$rootPath.$img_pc)){
    $res["err_msg"] = "PC版圖片存檔失敗";
    echo json_encode($res);
    exit;  
  }
}

if($_FILES["img_mb"]){
  $img = $_FILES["img_mb"]["name"];
  $tmp = $_FILES["img_mb"]["tmp_name"];
  $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  $filename = md5(rand()).".".$ext;
  $img_mb = $uploadPath.strtolower($filename);

  if(!in_array($ext,$validExt) || !move_uploaded_file($tmp,$rootPath.$img_mb)){
    $res["err_msg"] = "MB版圖片存檔失敗";
    echo json_encode($res);
    exit;  
  }
}

$sql = "UPDATE `type1` SET `img_pc`=?,`img_mb`=?,`modify_time`=NOW() WHERE id=?";
if(!$stmt = $conn->prepare($sql)) {
  $res["err_msg"] = "更新圖檔資料失敗:".$stmt->error;
  echo json_encode($res);
  exit;
}

if(!$stmt->bind_param('ssd', $img_pc, $img_mb, $insert_id)){
  $res["err_msg"] = "更新圖檔資料失敗:".$stmt->error;
  echo json_encode($res);
  exit;
}

if(!$stmt->execute()){
  $res["err_msg"] = "更新圖檔資料失敗:".$stmt->error;
  echo json_encode($res);
  exit;
}

if(!$stmt->affected_rows > 0){
  $res["err_msg"] = "更新圖檔資料失敗:未更新任何資料";
  echo json_encode($res);
  exit;
}

$stmt->close();
$conn->close();
echo json_encode($res);
exit;