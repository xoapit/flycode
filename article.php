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
<div class="col-md-9">
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
   <!--tieu de loai-->
   <div class="box-content row">
      <?php
         if(isset($_GET['idtheloai'])){
               $idtl= $_GET['idtheloai'];
         }
         $query= query($conn,"select * from baiviet where idtheloai='$idtl' order by idtheloai,idbaiviet asc");
         $sotrang=ceil(mysqli_num_rows($query)/$baivietmoitrang);  //tinh so trang tu csdl/so bai hien ra moi trang
         if(isset($_GET['idtheloai'])){
            $idtl= $_GET['idtheloai'];
         }
            $i=1;//xac dinh vi tri trang, chay trong vong lap 
            if(isset($_GET['tranghientai'])){
               $tranghientai=$_GET['tranghientai'];
               if($tranghientai<1||$tranghientai>$sotrang) $tranghientai=1;   //xu ly url bi user sua trang sai lech 
            }
            else $tranghientai=1;
                     
            $vitrihientai=($tranghientai-1)*$baivietmoitrang;
            $query= query($conn,"select * from baiviet where idtheloai='$idtl' order by idtheloai,idbaiviet asc limit {$vitrihientai}, {$baivietmoitrang} ");
         
         $idlast=0;  //id the loai cua dong truoc query ra duoc
         while($row=mysqli_fetch_assoc($query)){
            
            if($row[idtheloai]!=$idlast){
               echo " <h8 class=\"text-bold background-red text-white\">
               <span class=\"glyphicon glyphicon-tasks\"></span> ";
               echo $row['theloai'];
               echo "</h8>
               <div class=\"gach\"></div>
               <hr>";
            }
               $idlast=$row['idtheloai'];
         ?>
      <!--doan1-->
      <div class="#">
         <div class="col-md-12">
            <div class="row thumbnail">
               <div class="col-md-4" style="margin-top:10px;">
                  <img src="image/<?php 
                     echo strtolower($row['theloai']);
                     ?>.png" width="100%" height="100%" />
               </div>
               <div class="col-md-8 caption">
                  <h3><?php echo $row['title']; ?></h3>
                  <?php 
                     $nd = $row['noidung'];
                     $nd = substr($nd,0,250);
                     echo $nd; 
                     ?>
                  <hr />
                  <div class="mo" style="opacity:10%;"><span class="glyphicon glyphicon-user"></span> <?php echo $row['nguoidang']; ?>. 
                     <span class="glyphicon glyphicon-calendar"></span> 
                     <?php echo convertDate($row['ngaydang']); ?>
                  </div>
                  <a href="<?php echo "article.php?idtheloai=";
                     echo $row['idtheloai'];
                     echo "&idbaiviet=";
                     echo $row['idbaiviet']; 
                     ?>" 
                     class="btn btn-primary pos-right" role="button">Read more</a>
                  <a href="#" class="btn btn-default pos-right" style="margin-right:5px;" role="button"><span class="glyphicon glyphicon-share"></span> Share</a>
               </div>
            </div>
         </div>
      </div>
      <?php }; ?>
      <!--doan1-->
   </div>
   <!--phan trang-->
   <div class="text-center" style="margin-top:0px;">
      <div class="row">
         <ul class="pagination">
            <li><a href="<?php 
               $trangtruoc=$tranghientai-1;
               if($trangtruoc<1) $trangtruoc="1";
                  echo "article.php?idtheloai=";
                  echo $idtl;
                  echo "&tranghientai=";
                  echo $trangtruoc;
                 ?>">&laquo;</a>
            </li>
            <?php
               for($i=1;$i<=$sotrang;$i++){
               ?>
            <li class="<?php if($i==$tranghientai) echo "active"; ?>">
               <a href="<?php echo "article.php?idtheloai=";
                  echo $idtl;
                  echo "&tranghientai=";
                  echo $i;
                  ?>">
               <?php echo $i; ?>
               </a>
            </li>
            <?php } ?>
            <li><a href="<?php 
               $trangsau=$tranghientai+1;
               if($trangsau>$sotrang) $trangsau=$sotrang;
                  echo "article.php?idtheloai=";
                  echo $idtl;
                  echo "&tranghientai=";
                  echo $trangsau;
                 ?>">&raquo;</a></li>
         </ul>
      </div>
   </div>
   <!--phan trang-->
</div>
<?php 
   include('boxright.php') ;
   include('footer.php') ;
   
   ?>