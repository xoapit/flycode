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
               <div class="col-md-offset-3 col-md-6 col-xs-12">
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
     
   </div>
</div>
<?php 
   include('boxright.php') ;
   include('footer.php') ;
   exit;
   ?>