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
  <script src="<?php echo $root_url;?>/asset/js/jquery-3.7.1.min.js"></script>
  <script src="<?php echo $root_url;?>/asset/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-2 bg-info p-1">
        <div class="list-group" style="border-radius:0">
          <a href="" class="list-group-item list-group-item-action">首頁Banner</a>
          <a href="type1_list.php" class="list-group-item list-group-item-action active">建材商品-大分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品-小分類</a>
          <a href="" class="list-group-item list-group-item-action">建材商品總覽</a>        
        </div>
      </div>
      <div class="col-10 table-responsive-md">        
        <h4 class="float-start">建材商品-新增大分類</h4>
        <form id="form1">
        <table class="table table-borderless" style="border-collapse:separate;border-spacing:2px">
        <tbody>
          <tr>
          <td class="table-secondary w-25">大分類名稱</td>
          <td><input type="text" id="name" name="name" class="form-control"><div class="form-text">例如：衛浴，牆面建材，地板建材</div></td> 
          </tr>
          <tr>
          <td class="table-secondary w-25">PC版圖片</td>
          <td><input type="file" id="img_pc" name="img_pc" class="form-control"></td> 
          </tr>
          <tr>
          <td class="table-secondary w-25">MB版圖片</td>
          <td><input type="file" id="img_mb" name="img_mb" class="form-control"></td> 
          </tr>
          <tr>
          <td class="table-secondary w-25">排序</td>
          <td><input type="text" id="sort" name="sort" class="form-control"><div class="form-text">從0開始，數字越小排越前面</div></td> 
          </tr>
          <tr>
          <td class="table-secondary w-25">上架</td>
          <td>
            <div class="form-check form-check-inline"><input type="radio" name="status" class="form-check-input" value="1">是</div>
            <div class="form-check form-check-inline"><input type="radio" name="status" class="form-check-input" value="0">否</div>
          </td> 
          </tr>
        </tbody>  
        </table>
        <div class="text-center">
        <button type="submit" class="btn btn-primary">送出</button>
        </div>
        </form>
      </div>  
    </div>      
  </div>
</body>
<script>
var sending = false;
var msg = "";
$("#form1").on("submit",function(e){
  e.preventDefault();
  if(sending) return;
  sending = true;
  msg = "";
  var name = $("#name").val();
  var img_pc = $("#img_pc").val();
  var img_mb = $("#img_mb").val();
  if(!name) msg = "請輸入大分類名稱";
  //else if(!img_pc) msg = "請輸入PC版圖片";
  //else if(!img_mb) msg = "請輸入MB版圖片";
  if(msg){
    alert(msg);
    sending = false;
    return;
  }
  $.ajax({
    url: "ajax/type1_add.php",
    type: "post",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function(res){
      console.log(res);
      sending = false;
      return;
    },
    error: function(res){
      alert("新增失敗");
      sending = false;
      return;
    }
  });
});
</script>
</html>