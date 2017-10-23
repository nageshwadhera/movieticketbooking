<?php 
	require 'config.php';
	require 'auth.php';
	$movie=findAssignMovies($_GET['assign_id']);
 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 <?php $day= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
// echo $day;
  ?>
 	<h1 class="heading">Booking Details of <?php echo $movie['movie_name']; ?></h1>
 	<div class="showdata">
 	<table>
 		<tr>
 			<th>S.no.</th>
 			<th>Username</th>
 			<th>Email</th>
 			<th>Mobile</th>
 			<th>Tickets</th>
 			<th>Ticket Price</th>
 			<th>Amount</th>
 		</tr>

 	<?php 
 	$i=1;
 	$total=0;
 	$qre= mysql_query("select booking.*,show_timings.* from booking inner join show_timings on booking.show_id=show_timings.show_id where booking.assign_id='".$_GET['assign_id']."' and booking.day='$day' and show_timings.show_timings='".$_GET['show_timings']."' "); 
 		while($res=mysql_fetch_array($qre)){
 			$user= finduser($res['user_id']);
 			$rows=count_tickets($res['booking_id']);
 			echo "<tr>";
 			echo "<td>$i</td>";
 			echo "<td>".$user['user_name']."</td>";
 			echo "<td>".$user['user_email']."</td>";
 			echo "<td>".$user['user_mobile']."</td>";
 			echo "<td>".$rows."</td>";
 			echo "<td>".$movie['price']."</td>";
 			echo "<td>".$res['total']."</td>";
 			echo "</tr>";
 			$total +=(int)$res['total'];
 			// echo "<div>".$user['user_name']."</div>";
 			$i++;
 		}
 	 ?>
 	 <tr>
 	 	<td>&nbsp;</td>
 	 	<td>&nbsp;</td>
 	 	<td>&nbsp;</td>
 	 	<td>&nbsp;</td>
 	 	<td>&nbsp;</td>
 	 	<td style="font-weight:bold;font-size:20px;">Grand Total</td>
 	 	<td style="font-weight:bold;font-size:20px;">Rs <?php echo $total; ?></td>
 	 </tr>
 	  	</table>
 	  	</div>
 	<br clear="all"/>
  </div>
 <?php require 'footer.php'; ?>		