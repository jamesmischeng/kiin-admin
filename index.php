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
  <script src="<?php echo $root_url;?>/asset/bootstrap/js/bootstrap.mis.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="pt-5 my-5 bg-primary text-white">
      後台登入
    </div>
  </div>
</body>
</html>