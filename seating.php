<?php require 'config.php'; ?>
<?php require 'includes/header.php';
$date= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
	$movie= findAssignMovies($_GET['movie']);
	$data= booking($_GET['movie'],$date,$_GET['show_timings']);
	$seat_numbers=[];
	foreach ($data as $key => $value) {
		$data1= find_tickets($value['booking_id']);
		
		foreach ($data1 as $value1) {
			$seat_numbers[]=$value1['seat_number'];
		}

	}
	
 ?>
<br clear="all"/>
 <div style="margin-top:30px;"></div>
	<div class="body">
		<h2 class="heading">Seating Plan</h2>
	<div class="seating_left">
		<div class="seating_imgs">
			<ul>
				<li><img src="<?php echo IMG; ?>orange.png" width="30" alt="" align="absmiddle"> Available</li>
				<li><img src="<?php echo IMG; ?>green.png" width="30" alt="" align="absmiddle"> Current Selection</li>
				<li><img src="<?php echo IMG; ?>red.png" width="30" alt="" align="absmiddle"> Sold Out</li>
				<br clear="all"/>
			</ul>
		</div>
		<?php 
		echo "<table class='seating_plans'>";
		echo "<tr>";
		
		$total= 0;
		$date= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
		for ($i=1; $i<=$movie['hall_seats'] ; $i++) { 
			
				if($i%15==0){
					if(in_array($i, $seat_numbers)){
						echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='selected seats'></div></td></tr>";
					}else{


					if(isset($_SESSION['seats'][$date][$_GET['show_id']])){
						if(in_array($i, $_SESSION['seats'][$date][$_GET['show_id']])){
	                        $total +=$movie['price'];
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='selection seats'></div></td></tr>";
						}
						else{
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='available seats'></div></td></tr>";
						}
					}
					else{
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='available seats'></div></td></tr>";
						}
					}
					
				}
				else{
					if(in_array($i, $seat_numbers)){
						echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='selected seats'></div></td>";
					}else{

					if(isset($_SESSION['seats'][$date][$_GET['show_id']])){
						if(in_array($i, $_SESSION['seats'][$date][$_GET['show_id']])){
	                        $total +=$movie['price'];
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='selection seats'></div></td>";
						}
						else{
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='available seats'></div></td>";
						}
					}
					else{
							echo "<td>$i<div data-seat='".$i."' data-price='".$movie['price']."' class='available seats'></div></td>";
						}
					}
					
				}
			
		}
		echo "</tr>"; 
		echo "</table>";
		?>
		<div class="screen">
			<img src="<?php echo IMG; ?>screen.png" alt="">
		</div>
	</div>	
	<div class="seating_right">
		<div style="">
			<img src="<?php echo IMG; ?>0.jpg" width="100" alt="" >
		</div>
		<table class="seating_movie_detail" >
			<tr>
				<th>Movie Name</th>
				<td><?php echo $movie['movie_name']; ?></td>
			</tr>
			<tr>
				<th>Hall</th>
				<td><?php echo $movie['hall_name']; ?></td>
			</tr>
			<tr>
				<th>Show Time</th>
				<td><?php echo addZero($_GET['day']); ?>/<?php echo addZero($_GET['month']); ?>/<?php echo $_GET['year']; ?>
                    <?php echo $_GET['show_timings']; ?>
                </td>
			</tr>
			<tr>
				<th>Amount</th>
				<td>Rs <span class="amount"><?php echo $total; ?></span></td>
			</tr>
			<tr>
				<th>Total Amount</th>
				<td>Rs <span class="total_amt">0</span></td>
			</tr>
		</table>
		<div>
		<?php 
			if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){?>
			<a class="book_flight_btn" href="register.php?<?php echo $_SERVER['QUERY_STRING']; ?>">Book Ticket</a>
				
			<?php } else{?>
			<a class="book_flight_btn" href="booking.php?<?php echo $_SERVER['QUERY_STRING']; ?>">Book Ticket</a>

			<?php }?>
		</div>
	</div>	
	</div>
	<div class="footer"></div>
	</div>
	<script src="<?php echo JS; ?>jquery.js"></script>
	<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
	<script>
		$(function() {
			$('body').on('click', '.seats.available', function(event) {
				event.preventDefault();
				var seatsno= $(this).data("seat");
                var movie= <?php echo $_GET['show_id']; ?>;
                var year= <?php echo $_GET['year']; ?>;
                var month= <?php echo $_GET['month']; ?>;
                var day= <?php echo $_GET['day']; ?>;
                var dateof= day+'-'+month+'-'+year;
				$(this).removeClass('available').addClass('selection');
				var price= $(this).data("price");	
				var last_price=$('span.amount').text();
				var sel = $('table.seating_plans .seats.selection').map(function(_, el) {
                    return $(el).data("seat");
          		}).get();

          		$.ajax({
          			url: 'ajax/setSeats.php?movie='+movie+'',
          			type: 'GET',
          			data: {sel: sel,movie:movie,dateof:dateof}
          		})
          		.done(function(data) {
          			// console.log(data);
          			var total_price= parseInt(last_price) + price;
          			$('span.amount').text(total_price);
          		});
			});
		});

		$('body').on('click', '.seats.selection', function(event) {
				event.preventDefault();
				var seatsno= $(this).data("seat");
				$(this).removeClass('selection').addClass('available');
				var price= $(this).data("price");	
				var movie= <?php echo $_GET['show_id']; ?>;
				var year= <?php echo $_GET['year']; ?>;
                var month= <?php echo $_GET['month']; ?>;
                var day= <?php echo $_GET['day']; ?>;
                var dateof= day+'-'+month+'-'+year;
				var last_price=$('span.amount').text();
				var sel = $('table.seating_plans .seats.selection').map(function(_, el) {
                    return $(el).data("seat");
          		}).get();
          		$.ajax({
          			url: 'ajax/setSeats.php',
          			type: 'GET',
          			data: {sel: sel,movie:movie,dateof:dateof},
          		})
          		.done(function(data) {
          			var total_price= parseInt(last_price) - price;
          			$('span.amount').text(total_price);
          		})
			});
	</script>
	
</body>
</html>