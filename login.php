<?php
   session_start();
   header('Content-Type: text/html; charset=UTF-8');
   
   include('ketnoi.php');
   
   if(isset($_SESSION['username'])) unset($_SESSION['username']);
                        function query($conn, $sql){
                           $query = mysqli_query($conn,$sql);
                           return $query;
                        }
                        
                        //check account
                        if(isset($_POST['txtusername']) && isset($_POST['txtpassword'])){
                           $user=addslashes($_POST['txtusername']);
                           $pwd=addslashes($_POST['txtpassword']);
                           
                           //$pwd=md5($pwd);
                           
                           if(($query=query($conn,"select * from user where username = '$user'"))==null) exit;
                           $war="";
                              if(mysqli_num_rows($query)==0) $war= "<div class=\"alert alert-danger\" role=\"alert\">Tài Khoản Không Tồn Tại</div>"; 
                              else{
                                 $row = mysqli_fetch_assoc($query);
                                 if($row['password']!=$pwd)
                                    $war= "<div class=\"alert alert-danger\" role=\"alert\">Mật Khẩu Không Chính Xác</div>";
                                 else{
                                    $_SESSION['username']=$user;
                                    header("Location: index.php");
                                    exit;
                                 }
                              } 
                           
                        } 
   
   include('head.php');
   ?>
<!--box giua-->
<div class="col-md-9">
   <!--doan1-->
   <div class="box-content row">
      <!--content of article-->
      <div class="#">
         <div class=" col-md-12">
            <div class="row thumbnail" style="padding:20px;">
               <h8 class="text-bold background-red text-white">
                  <span class="glyphicon glyphicon-tasks"></span> You can sign in your account in here.
               </h8>
               <div class="gach"></div>
               <div class="col-md-3 col-xs-0"></div>
               <div class="col-md-6 col-xs-12">
                  <form action="login.php" method="post">
                     <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="txtusername">
                     </div>
                     <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="txtpassword">
                     </div>
                     <?php
                        //check account
                        if(isset($_POST['txtusername']) && isset($_POST['txtpassword'])){
                           if($war!="") echo $war;
                        }
                        ?>
                     <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                     </div>
                     <button type="submit" class="btn btn-default">Sign in</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--content of article-->
      <h8 class="text-bold background-red text-white"><span class="glyphicon glyphicon-tasks"></span> Android</h8>
      <div class="gach"></div>
      <hr>
      <!--doan1-->
      <div class="#">
         <div class="col-sm-6 col-md-12">
            <div class="row thumbnail">
               <div class="col-md-4" style="margin-top:10px;"><img src="image/2NqZJYQI.png" width="100%" height="100%" /></div>
               <div class="col-md-8 caption">
                  <h3>Thumbnail labelThumbnail label askfjl lkj asfkj label</h3>
                  <p>The world’s most popular mobile OS
                     From phones and watches to cars and TVs, customize your digital life with Android.
                  </p>
                  <hr />
                  <div class="mo" style="opacity:10%;"><span class="glyphicon glyphicon-user"></span> Xoapit. <span class="glyphicon glyphicon-calendar"></span> Monday, 10/02
                     /2017 
                  </div>
                  <a href="#" class="btn btn-primary pos-right" role="button">Read more</a>
                  <a href="#" class="btn btn-default pos-right" style="margin-right:5px;" role="button"><span class="glyphicon glyphicon-share"></span> Share</a>
               </div>
            </div>
         </div>
      </div>
      <!--doan1-->
   </div>
</div>
<?php 
   include('boxright.php') ;
   include('footer.php') ;
   exit;
   ?>