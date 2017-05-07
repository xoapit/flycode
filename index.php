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

include('head.php');
?>

<!--box giua-->
<div class="col-md-9">
	
	<!--tieu de loai-->
	<div class="box-content row">
		<?php
		$query= query($conn,"select * from baiviet order by idtheloai,idbaiviet asc");
      $idlast=0;  //id the loai cua dong truoc query ra duoc
      while($row=mysqli_fetch_assoc($query)){
      	if($row[idtheloai]!=$idlast) {
      		echo " <h8 class=\"text-bold background-red text-white\">
      		<span class=\"glyphicon glyphicon-tasks\"></span> ";
      		echo $row['theloai'];
      		echo "</h8>
      		<div class=\"gach\"></div>
      		<hr>";
      		$dembaiviet=0;
      	}
      	$dembaiviet++;
      	if($dembaiviet>2) continue;
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
      					?>" class="btn btn-primary pos-right" role="button">Read more</a>
      					<a href="#" class="btn btn-default pos-right" style="margin-right:5px;" role="button"><span class="glyphicon glyphicon-share"></span> Share</a>
      				</div>
      			</div>
      		</div>
      	</div>
      	
      	<?php }; ?>
      	<!--doan1-->
      	
      	
      	
      </div>
  </div>
  <?php 
  include('boxright.php') ;
  include('footer.php') ;
  ?>
  
  
  