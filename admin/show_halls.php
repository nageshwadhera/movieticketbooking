<?php 
	require 'config.php';
	require 'auth.php';
	if(isset($_GET['hall_id'])){
		$qre=mysql_query("delete from halls where hall_id='".$_GET['hall_id']."'");
		if( $qre ){
			header("location: show_halls.php");
		}
	}
	
 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Show Halls</h1>
 	<div class="showdata">
 		<table width="100%" cellspacing="0" cellpadding="0">
 			<tr>
 				<th>Name</th>
 				<th>Seats</th>
 				<th>Action</th>
 			</tr>
 			<?php 
 				$data= allHalls();
 				foreach($data as $res){
 					echo "<tr>";
 					
 					echo "<td width='13%' valign='top'>".$res['hall_name']."</td>";
 					echo "<td width='13%' valign='top'>".$res['hall_seats']."</td>";
 					echo "<td valign='top'>
 						<a href='edit_hall.php?hall_id=".$res['hall_id']."'>Edit</a> <a href='show_halls.php?hall_id=".$res['hall_id']."'>Delete</a> </td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>
 	</div>
 </div>
 <?php require 'footer.php'; ?>