   <div class="col-md-3" style="padding-left:25px;">
      <div class="box-content row">
         <div class="box-title"><span class="glyphicon glyphicon-education"></span> Bài Viết Mới</div>
         <ul>
            <?php
               $query= query($conn,"select * from baiviet order by idbaiviet desc limit 0,8");
               while($row=mysqli_fetch_assoc($query)){
               ?>
            <li class="row" style="margin-right:2px">
               
               <a style="text-decoration:none;"
               href="<?php echo "article.php?idtheloai=";
                     echo $row['idtheloai'];
                     echo "&idbaiviet=";
                     echo $row['idbaiviet']; 
                     ?>"
                     ><div style="text-align:justify">
                  <img class="col-xs-2" style="padding-left:0px;" src="image/<?php echo strtolower($row['theloai']); ?>.png" width="100%" height="100%" />
                  <?php echo $row['title']; ?>
                  </div>
               </a>
            </li>
            <?php } ?>
         </ul>
      </div>
      <!--box contact-->
      <div class="box-content row">
         <div class="box-title"><span class="glyphicon glyphicon-education"></span> Liên Kết</div>
         <div class="row">
             <a href="http://facebook.com/XoapIt">
               <div class="col-md-8 col-md-offset-3 text-center text-size" >
                  <img src="image/facebook.png" width="15%" height="15%" style="float:left;"/><p style="float:left;">
                     <p style="float:left;">Tá Quý</p>
                  </div>
            </a>
            <a href="http://facebook.com/QuanDinh13">
               <div class="col-md-8 col-md-offset-3 text-center text-size" >
                  <img src="image/facebook.png" width="15%" height="15%" style="float:left;"/><p style="float:left;">Quân Đinh</p>
               </div>
            </a>
         </div>
         
         <ul class="text-center text-padding text-size">
           <img src="image/gmail.png" width="14%" height="14%" /> Gmail
         </ul>
      </div>
      <!--box contact-->
   </div>
   </div>