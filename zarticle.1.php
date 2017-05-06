<?php
   session_start();
   header('Content-Type: text/html; charset=UTF-8');
   
   include('ketnoi.php');
   function query($conn, $sql){
      $query = mysqli_query($conn,$sql);
      return $query;
   }                     
   include('head.php');
   ?>
   <div style="background:cyan;padding:5px;"><h2>ADMIN đăng bài</h2></div>
<div>
   <?php
               $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; 
               if(isset($_POST['noidungbv'])){
                  $tieudebv=$_POST['tieudebv'];
                  $noidung= $_POST['noidungbv'];
                  $query= query($conn,"INSERT INTO  `baiviet` (`idtheloai` ,`theloai` ,`title` ,`noidung` ,`nguoidang` ,`ngaydang` ,`like` ,`share`) VALUES ('1',  'Android',  '$tieudebv',  '$noidungbv', 'ABC',  '$currentDate',  '0',  '0')
");
               }
               ?>
            <form action="zarticle.1.php" method="post">
               <textarea name="tieudebv" row="1"></textarea>
               <textarea name="noidungbv" id="editor"  rows="3" style="width:100%;height:200px" class="ckeditor"></textarea>
               <button class="btn btn-info" name="btnPost">Post</button>
            </form>
</div>

<?php
   include('/home/ubuntu/workspace/footer.php') ;
   
   ?>