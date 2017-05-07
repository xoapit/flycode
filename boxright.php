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
         <div class="box-lienket">
            <ul>
              <li>
                 <a href="http://daotao.dut.udn.vn/sv/"><span class="glyphicon glyphicon-map-marker"></span> Hệ thống tín chỉ sinh viên</a>
              </li>
              <li>
                 <a href="http://class.sociss.com/index.php"><span class="glyphicon glyphicon-map-marker"></span> Công Nghệ Di Động</a>
              </li>
              <li>
                 <a href="https://duythanhcse.wordpress.com/lap-trinh-di-dong/android/"><span class="glyphicon glyphicon-map-marker"></span> Học Lập Trình Android</a>
              </li>
         </ul>
         </div>
      </div>
      <!--box contact-->
   </div>
   </div>