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
 	<h1 class="heading">Feedback</h1>
 	<div class="showdata">
 		<table width="100%" cellspacing="0" cellpadding="0">
 			<tr>
 				<th>Name</th>
 				<th>E-mail</th>
 				<th>City</th>
 				<th>Mobile</th>
 				<th>Message</th>
 			</tr>
 			<?php 
 				$data= allFeedback();
 				foreach($data as $res){
 					echo "<tr>";
 					
 					echo "<td width='13%' valign='top'>".$res['feedback_name']."</td>";
 					echo "<td width='13%' valign='top'>".$res['feedback_email']."</td>";
 					echo "<td width='13%' valign='top'>".$res['feedback_city']."</td>";
 					echo "<td width='13%' valign='top'>".$res['feedback_mobile']."</td>";
 					echo "<td width='13%' valign='top'>".$res['feedback_msg']."</td>";

 				}
 			 ?>
 		</table>
 	</div>
 </div>
 <?php require 'footer.php'; ?>