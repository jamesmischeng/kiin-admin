<?php
$root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
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
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-2 bg-info p-1">
        <div class="list-group" style="border-radius:0">
          <a href="" class="list-group-item list-group-item-action">首頁Banner</a>
          <a href="" class="list-group-item list-group-item-action active">建材商品-大分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品-小分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品總覽</a>        
        </div>
      </div>
      <div class="col-10 table-responsive-md">        
        <h4 class="float-start">建材商品-大分類</h4>
        <button type="button" class="btn btn-warning float-end">匯出</button>    
        <button type="button" class="btn btn-primary float-end me-3">新增分類</button>       
        <table class="table table-bordered table-striped table-hover mt-5">
          <thead>
            <tr>
              <th>編號</th>
              <th>名稱</th>
              <th>圖片(PC)</th>
              <th>圖片(MB)</th>
              <th>排序</th>
              <th>上架</th>
              <th>動作</th>
            </tr>  
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>衛浴</td>
              <td><img decoding="async" src="<?php echo $root_url;?>/asset/image/TOTO-C300.jpg" class="mx-auto d-block" width=250></td>
              <td><img decoding="async" src="<?php echo $root_url;?>/asset/image/HCG-C4288NBPAdb_0.jpg" class="mx-auto d-block" width=250></td>
              <td>0</td>
              <td>是</td>
            </tr>
            <tr>
              <td>2</td>
              <td>牆面建材</td>
              <td></td>
              <td></td>
              <td>1</td>
              <td>是</td>
            </tr>
            <tr>
              <td>3</td>
              <td>地板建材</td>
              <td></td>
              <td></td>
              <td>2</td>
              <td>是</td>
            </tr>
          </tbody>
        </table>  
        <ul class="pagination justify-content-center mt-4">
          <li class="page-item disabled"><a class="page-link" href="#">上一頁</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">下一頁</a></li>
        </ul>
      </div>  
    </div>  
    <!-- <div class="alert alert-success alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      新增成功
    </div>   -->
  </div>
</body>
</html>