<?php require 'config.php'; ?>
<?php require 'includes/header.php';
	$movie= findAssignMovies($_GET['movie']);
	$date= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
	if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){
		header("location: register.php");
	}
 ?>
<br clear="all"/>
 <div style="margin-top:30px;"></div>
	<div class="body">
		<h2 class="heading">Book Ticket</h2>
		
		<?php 
		$total= 0;
			if(isset($_SESSION['seats'][$date][$_GET['show_id']])){
				if(empty($_SESSION['seats'][$date][$_GET['show_id']])){
					
				}else{
					$array=$_SESSION['seats'][$date][$_GET['show_id']];
					foreach($array as $seat){
						$total +=$movie['price'];
						echo '<div class="seat">
			<div class="seat_heading">Cinepolis India</div>
			<table>
			<tr>
				<th>Ticket No</th>
				<td>'.substr($movie['movie_name'], 0,4)."-".$date."-".$_GET['show_timings']."-".$seat.'</td>
			</tr>
				<tr>
					<th>Movie Name</th>
					<td>'.$movie['movie_name'].'</td>
				</tr>
				<tr>
					<th>Screen Name</th>
					<td>'.$movie['hall_name'].'</td>
				</tr>
				<tr>
					<th>Show Time</th>
					<td>'.$date.' '.$_GET['show_timings'].'</td>
				</tr>
				<tr>
					<th>Seat Number</th>
					<td>'.$seat.'</td>
				</tr>
				<tr>
					<th>Price</th>
					<td>Rs '.$movie['price'].'</td>
				</tr>
			</table>
		</div>';
					}
				}
				
			}
			
		 ?>
		 <br clear="all"/>
			<div class="detail_amount">Rs 
			 <?php echo $total; ?>
		 	</div>
		 	<div class="total_amount">
		 		<a href="payment.php?total=<?php echo $total;?>&<?php echo $_SERVER['QUERY_STRING']; ?>">Proceed</a>
		 	</div>
	</div>
</div>
	<script src="<?php echo JS; ?>jquery.js"></script>
	<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
</body>
</html>		

