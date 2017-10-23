<?php 
	require 'config.php';
	require 'auth.php';

	if(isset($_POST['submit'])){
		$hall_name= $_POST['hall_name'];
		$hall_seats= $_POST['hall_seats'];
		
			$qre=mysql_query("insert into halls (hall_name,hall_seats) 
				values ('$hall_name','$hall_seats')");
			if( $qre ){
				$success= "Hall save";
			}

	}

 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Add halls</h1>
 	<?php if(isset($success)){
 		echo "<div class='success'>".$success.'</div>';
 		} ?>
 		
 	<form action="" method="post" enctype="multipart/form-data">
 		<table class="form" cellpadding="0" cellspacing="0" width="60%">
 			<tr>
 				<th>Hall Name</th>
 				<td><input type="text" name="hall_name" id=""></td>
 			</tr>
 			<tr>
 				<th>Seats</th>
 				<td><input type="text" name="hall_seats" id=""></td>
 			</tr>
 			
 			<tr>
 				<th></th>
 				<td><input type="submit" class="button" value="Add Hall" name="submit"></td>
 			</tr>
 		</table>
 	</form>
 </div>
 <?php require 'footer.php'; ?>