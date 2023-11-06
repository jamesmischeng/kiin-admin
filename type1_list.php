<?php
$root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

$servername = "localhost";
$username = "material";
$password = "84289961";
$dbname = "material";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM `type1` WHERE `status`=1 ORDER BY `sort`";
$result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    //echo "-id: " . $row["id"]. " - Name: " . $row["name"];
  }
// }
?>
<!DOCTYPE html>
<html>
<head>
  <title>建材網站-後台</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php echo $root_url;?>/asset/bootstrap/css/bootstrap.min.css">
  <script src="<?php echo $root_url;?>/asset/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-2 bg-info p-1">
        <div class="list-group" style="border-radius:0">
          <a href="type1_list.php" class="list-group-item list-group-item-action">首頁Banner</a>
          <a href="" class="list-group-item list-group-item-action active">建材商品-大分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品-小分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品總覽</a>        
        </div>
      </div>
      <div class="col-10 table-responsive-md">   
        <div class="clearfix mb-4">   
        <h4 class="float-start">建材商品-大分類</h4>
        <button type="button" class="btn btn-warning float-end">匯出</button>    
        <!-- <button type="button" class="btn btn-primary float-end me-3">新增分類</button>    -->
        <a href="type1_add.php" class="btn btn-primary float-end me-3">新增分類</a> 
        </div>
        <!-- <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">啟用</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu1">停用</a>
          </li>          
        </ul>   -->
        <table id="typeTable" class="table table-bordered table-striped table-hover mt-3">
          <thead>
          <!-- <table id="typeTable" border="1" class="display table-striped " style="width:100%">
            <thead class="table-info">   -->
            <tr>
              <th>編號</th>
              <th>名稱</th>
              <th class="text-center">圖片(PC)</th>
              <th class="text-center">圖片(MB)</th>
              <th>排序</th>
              <th>上架</th>
              <th class="text-center">動作</th>
            </tr>  
          </thead>
          <!-- <tbody>
            <tr>
              <td>1</td>
              <td>衛浴</td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/caroma-Vintage-986053.jpg" class="mx-auto d-block" width=180></td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/WC624.jpg" class="mx-auto d-block" width=180></td>
              <td>0</td>
              <td>是</td>
              <td class="text-center">
                <button type="button" class="btn btn-success">編輯</button>
                <button type="button" class="btn btn-danger">刪除</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>牆面建材</td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/caesar- CF1372-30CM_CF1472-40CM.jpg" class="mx-auto d-block" width=180></td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/caesar-CL1357-30CM_CL1457-40CM.jpg" class="mx-auto d-block" width=180></td>
              <td>1</td>
              <td>是</td>
              <td class="text-center">
                <button type="button" class="btn btn-success">編輯</button>
                <button type="button" class="btn btn-danger">刪除</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>地板建材</td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/HCG-C4288NBPAdb_0.jpg" class="mx-auto d-block" width=180></td>
              <td><img decoding="async" src="<?php //echo $root_url;?>/asset/image/caroma-Sovereign_2000-980005.jpg" class="mx-auto d-block" width=180></td>
              <td>2</td>
              <td>是</td>
              <td class="text-center">
                <button type="button" class="btn btn-success">編輯</button>
                <button type="button" class="btn btn-danger">刪除</button>
              </td>
            </tr>
          </tbody> -->
        </table>  
        <!-- <ul class="pagination justify-content-center mt-4">
          <li class="page-item disabled"><a class="page-link" href="#">上一頁</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">下一頁</a></li>
        </ul> -->
      </div>  
    </div>  
    <!-- <div class="alert alert-success alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      新增成功
    </div>   -->
  </div>
  <script>
  $(document).ready(function(){
    // $('#typeTable').DataTable({
    //   'processing': true,
    //   'serverSide': true,
    //   'serverMethod': 'post',
    //   'ajax':{
    //     'url':"<?php //echo $root_url;?>/ajax/type1_list.php"
    //   },
    //   'columns':[
    //     {data:'id'},
    //     {data:'name'}
        
    //   ]
    // });

    $('#typeTable').DataTable({
      "ajax":"<?php echo $root_url;?>/ajax/type1_list.php",
      "columns":[
        {data:'id'},
        {data:'name'},
        {data:'img_pc'},
        {data:'img_mb'},
        {data:'sort'},
        {data:'status'},
        {data:'status'}
      ],
      "columnDefs":[
        {targets:0, width:"8%"},
        {targets:1, width:"15%"},
        {targets:2, width:"20%", render:function(data, type, row, meta){
          var path = "<?php echo $root_url;?>/";
          return "<img src='"+path+data+"' class='mx-auto d-block' width=180>";
        }},
        {targets:3, width:"20%", render:function(data, type, row, meta){
          var path = "<?php echo $root_url;?>/";
          return "<img src='"+path+data+"' class='mx-auto d-block' width=180>";
        }},
        {targets:4, width:"8%"},
        {targets:5, width:"8%", render:function(data, type, row, meta){
          return data == "1" ? "是" : "否";
        }},
        {targets:6, className:"text-center", render:function(data, type, row, meta){
          var btnStr = "<button type='button' class='btn btn-success'>編輯</button>";
          btnStr += "<button type='button' class='btn btn-danger'>刪除</button>";
          return btnStr;
        }}
      ] 
    });
  } );
  </script>
</body>
</html>