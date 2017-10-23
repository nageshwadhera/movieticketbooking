<?php 
	require 'config.php';
	require 'auth.php';

	if(isset($_POST['submit'])){
		$hall_name= $_POST['hall_name'];
		$hall_seats= $_POST['hall_seats'];
		
			$qre=mysql_query("update halls set hall_name='$hall_name',
				hall_seats='$hall_seats' where hall_id='".$_GET['hall_id']."'");
			if($qre){
				header("location:show_halls.php");
			}

	}

 ?>
 <?php require 'header.php';
 	//find existing movie with movie id
 	$qre=mysql_query("select * from halls where hall_id='".$_GET['hall_id']."'");
 	$hall=mysql_fetch_array($qre);
  ?>
 <div class="innerbody">
 	<h1 class="heading">Update hall</h1>
 	<?php if(isset($success)){
 		echo "<div class='success'>".$success.'</div>';
 		} ?>
 		
 	<form action="" method="post" enctype="multipart/form-data">
 		<table class="form" cellpadding="0" cellspacing="0" width="60%">
 			<tr>
 				<th>Hall Name</th>
 				<td><input type="text" name="hall_name" value="<?php echo $hall['hall_name']; ?>" id=""></td>
 			</tr>
 			<tr>
 				<th>Seats</th>
 				<td><input type="text" name="hall_seats" value="<?php echo $hall['hall_seats']; ?>" id=""></td>
 			</tr>
 			
 			<tr>
 				<th></th>
 				<td><input type="submit" class="button" value="Update Hall" name="submit"></td>
 			</tr>
 		</table>
 	</form>
 </div>
 <?php require 'footer.php'; ?>