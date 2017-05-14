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

include('ketnoi.php');
function query($conn, $sql){
   $query = mysqli_query($conn,$sql);
   return $query;
}                     

$baivietmoitrang=2;
$sotrang=1;
include('head.php');
?>
<!--box giua-->
<div class="col-md-12 row">
   <!--content of article-->
   <?php
   if(isset($_GET['idbaiviet'])){
      $idbv= $_GET['idbaiviet'];
      $query= query($conn,"select * from baiviet where idbaiviet='$idbv'");
      $row=mysqli_fetch_assoc($query);
      ?>
      <div class="#">
         <div class="col-md-12">
            <br>
            <div class="row thumbnail" style="padding:20px;">
               <div class="text-red text-size text-margin text-bold">
                  <span class="glyphicon glyphicon-education"></span>
                  <?php echo $row['title']; ?>
               </div>
               <div class="gach30"></div>
               <div class="mo" style="opacity:10%;"><span class="glyphicon glyphicon-user"></span> <?php echo $row['nguoidang']; ?>. 
                  <span class="glyphicon glyphicon-calendar"></span> <?php echo convertDate($row['ngaydang']); ?> 
                  <span class="glyphicon glyphicon-tag"></span> <?php echo $row['theloai']; ?>
                  <a href="#" class="btn btn-default pos-right" style="margin-right:5px;" role="button">
                     <span class="glyphicon glyphicon-share"></span> Share</a>
                  </div>
                  <hr>
                  <?php echo $row['noidung']; ?>
                  <hr>
                  <div class="text-bold text-size">Comments:</div>
                  <div class="gach30"></div>
                  <?php
               $gioihancomment=5;   //giới hạn số lượng comment mỗi bài
               if(isset($_POST['btnviewcmt'])) $gioihancomment=100;
               $dem=0;
               $query= query($conn,"select * from comment where idbaiviet='$idbv'");
               while($row=mysqli_fetch_assoc($query)){
                  $dem++;
                  if($dem>$gioihancomment) break;
                  ?>
                  <div class="row" style="padding-left:2%;padding-bottom:0px;">
                     <img src="image/user.png" width="4%" height="4%" />
                     <?php echo $row['nguoidang']; ?>
                     <div class="mo pos-right"><?php echo convertDate($row['ngaydang']); ?></div>
                  </div>
                  <?php echo $row['noidung']; ?>
                  <div class="text-right"><span class="glyphicon glyphicon-thumbs-up"><?php echo $row['like']; ?> Like</span></div>
                  <hr>
                  <?php } 
                  if($gioihancomment!=100&&($dem>$gioihancomment)){
                     ?>
                     <!--update form not reload page-->
                     <form method="post" >
                        <button class="viewcmt pos-right text-margin" name="btnviewcmt">View all comments</button>
                     </form>
                     <?php } ?>
                     <!--update form not reload page-->
                     <?php
                     $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; 
                     if(isset($_POST['noidungcmt'])){
                        $noidung= $_POST['noidungcmt'];
                        $query= query($conn,"INSERT INTO  `comment` (  `noidung` ,  `idbaiviet` ,  `ngaydang` ,  `nguoidang` ,  `like` ) VALUES (N'$noidung','$idbv', ' $currentDate' ,  'Quan', '0')");
                     }
                     ?>
                     <form action="" method="post">
                        <textarea name="noidungcmt" id="editor"  rows="3" style="width:100%;height:200px" class="ckeditor"></textarea>
                        <button class="btn btn-info pos-right" name="btnPost">Post</button>
                     </form>
                  </div>
               </div>
            </div>
            <?php } ?>
            <!--content of article-->
         </div>

      </div>
      <?php 
      include('footer.php') ;

      ?>