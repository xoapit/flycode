<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
function convertDate($d){
  $a=substr($d,0,4);
  $b=substr($d,5,2);
  $c=substr($d,8,2);
  $d=$c."-".$b."-".$a;
  return $d;
}

include('../../ketnoi.php');
function query($conn, $sql){
  $query = mysqli_query($conn,$sql);
  return $query;
}                     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Đăng bài</title>
  <link href="/home/ubuntu/workspace/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/home/ubuntu/workspace/css/default.css">
  <link rel="stylesheet" type="text/css" href="/home/ubuntu/workspace/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/home/ubuntu/workspace/bootstrap/css/bootstrap-theme.min.css">
  <script src="/home/ubuntu/workspace/bootstrap/js/jquery.js"></script>
  <script src="/home/ubuntu/workspace/bootstrap/js/bootstrap.min.js"></script>
  <script src="/home/ubuntu/workspace/ckeditor/ckeditor.js"></script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

     <?php
     $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; 
     if(isset($_POST['btnPost'])){
      $noidung= $_POST['noidung'];
      $title= $_POST['title'];
      $nguoiDang= $_POST['nguoiDang'];
      $mota= $_POST['moTa'];
      $query= query($conn,"INSERT INTO  `baiviet` (  `noidung` ,mota,  `idbaiviet` ,  `ngaydang` ,  `nguoidang` ,  `like` ) VALUES (N'$noidung','$mota','$idbv', '$currentDate' ,  'Quan', '0')");
    }
    ?>


    <form action="" method="post">
      <div class="form-group">
        <label for="">Title: </label>
        <input type="text" name="title" id="title" class="form-control"/>
      </div>
      <div class="form-group">
        <label for="">Người Đăng: </label>
        <input type="text" name="nguoiDang" id="nguoiDang" class="form-control"/>
      </div>
      <div class="form-group">
        <label for="">Mô Tả: </label>
        <input type="text" name="moTa" id="moTa" class="form-control"/>
      </div>
      <textarea name="noidung" id="editor"  rows="3" style="width:100%;height:200px" class="ckeditor form-control">hello</textarea>
      <button class="btn btn-info pos-right" name="btnPost">Post</button>
    </form>

  </div>
</div>
</body>
</html>