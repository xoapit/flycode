<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>flycode</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>

</head>

<body class="body">
 <iframe name="iframe " style="display: none;"></iframe>
 <div id="head"></div>
 <div class="menufixed ">
  <a href="#head" style="padding-bottom:5px;">
   <img src="image/up.png" width=30px height=30px;/>
   <a/>
   <a href="https://www.facebook.com/Xoapit" style="padding-bottom:5px;">
     <img src="image/fb1.png" width=30px height=30px;/>
     <a/>
     <a href="https://www.facebook.com/QuanDinh13" style="margin-bottom:5px;">
       <img src="image/fb2.png" width=30px height=30px;/>
       <a/>
       <br>
       <a>
         <img src="image/gmail2.png" width=30px height=30px;/>
         <a/>
       </div>
       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-fixed-top" style="background:#e74c3c;">
        <div class="container">
          <!-- Nav -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php" style="color:#FFF">
              <span class="glyphicon glyphicon-home" ></span> Home
            </a>
            
          </div>
          <!-- Nav collapse -->
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav ">
              
              <li>
                <a data-toggle="dropdown" href="#" style="color:#FFF">Material
                 
                </a>
              </li>
              <li>
                <a href="/howtoinstallPhpmyAdmin.html" style="color:#FFF">Create VISA
                </a>
                
              </li>
              <li>
                <a href="#About" style="color:#FFF">About</a>
              </li>
            </ul>

            <ul class="navbar-right">
             <?php if(isset($_SESSION['username'])) { ?> 
             <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
               <span class="glyphicon glyphicon-user"></span>
               Welcome, <?php echo $_SESSION['username']; ?>
               <span class="caret"></span>
             </a>
             <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="profile"> Profile</a></li>
              <li>
                <a href="setting.php">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
            <?php } else echo "<a href=\"login.php\">Login</a>" ?>
          </ul>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>
      
      <!--page content -->
      <div class="container box-head">flycode</div>
      <div class="container">
       <nav class="navbar navbar-default" style="background:#282830; color:#fff;">
        <div class="container">
         <!-- Nav -->
         <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="color:#FFF">
            <span class="glyphicon glyphicon-globe" ></span> Programing
          </a>
        </div>
        <!-- Nav collapse -->
        <div class="collapse navbar-collapse" id="menu2">
          <ul class="nav navbar-nav ">
           <li><a href="" style="color:#fff;"> C/C++</a></li>
           <li><a href="" style="color:#fff;">JAVA</a></li>
           <li><a href="" style="color:#fff;">Android</a></li>
           <li><a href="" style="color:#fff;">PHP</a></li>
           <li><a href="" style="color:#fff;">SQL</a></li>
           <li>
            <a data-toggle="dropdown" href="#" style="color:#FFF">Javascript
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">JQuery</a>
              </li>
              <div class="divider"></div>
              <li><a href="#">Serverlet</a>
              </li>
              <div class="divider"></div>
              <li><a href="#">Nodejs</a>
              </li>
              <div class="divider"></div>
              <li><a href="#">Jsp</a>
              </li>
            </ul>
          </li>
          <li>
            <a data-toggle="dropdown" href="#" style="color:#FFF">.Net
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">C#</a>
              </li>
              <div class="divider"></div>
              <li><a href="#">ASP.net</a>
              </li>
              <div class="divider"></div>
              <li><a href="#">MVC Model</a>
              </li>
            </ul>
          </li>
          <li><a href="" style="color:#fff;">CNPM</a></li>
          <li><a href="" style="color:#fff;">Project</a></li>
          <li><a href="" style="color:#fff;">ARM</a></li>
          <li><a href="" style="color:#fff;">Arduino</a></li>
          <li><a href="" style="color:#fff;">English</a></li>
          <li><a href="" style="color:#fff;">Tips</a></li>
        </ul>
        <ul class="navbar-right" style="padding:10px;">
        </ul>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>