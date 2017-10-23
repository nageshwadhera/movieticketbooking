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
 	<h1 class="heading">Show Assign Movies</h1>
 	<div class="showdata">
 		<table width="100%" cellspacing="0" cellpadding="0">
 			<tr>
 				<th>Movie Name</th>
 				<th>Hall Name</th>
 				<th>Release Date</th>
 				<th>End Date</th>
 				<th>No. Shows</th>
 				<th>Start Time</th>
 				<th>Break Time</th>
 				<th>Show Timings</th>
 				<th>Show Bookings</th>
 			</tr>
 			<?php 
 				$data=allAssignMovies();
 				foreach ($data as $key => $value) {
 						echo "<tr>";
 						echo "<td>".$value['movie_name']."</td>";
 						echo "<td>".$value['hall_name']."</td>";
 						echo "<td>".$value['release_date']."</td>";
 						echo "<td>".$value['end_date']."</td>";
 						echo "<td>".$value['no_shows']."</td>";
 						$start= explode(':', $value['start_time']);
 						echo "<td>".addZero($start[0]).":".addZero($start[1])."</td>";
 						$break= explode(":", $value['break_time']);
 						echo "<td>".addZero($break[0]).":".addZero($break[1])."</td>";
 						echo "<td><a data-role='".$value['movie_image']."' href='javascript: void(0)' class='show_timings' id=".$value['assign_id'].">Click</a></td>";
 						echo "<td><a href='bookings.php?id=".$value['assign_id']."'>Show</a></td>";
 						echo "</tr>";
 					}	
 			 ?>
 		</table>
 	</div>
 </div>
    <br clear="all"/>
</div>
<div class="shows">
	<div class="close">
		x
	</div>
	<div class="show_mainheading">Show Timings</div>
	<div class="ajax_showtimings">
		
	</div>
</div>
<!-- <div class="bottom">2013 © Admin by Student Project.</div> -->
<script src="<?php echo JS; ?>jquery.js"></script>
<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
<script>
	$(document).ready(function() {
		$('.show_timings').on('click', function(event) {
			event.preventDefault();
			$('.ajax_showtimings').html("");
			var $val= $(this).attr("id");
			var img= $(this).data("role");
			$('.shows').animate({
					"right":"0"
				},500);
			$.ajax({
				url: 'ajax/findshowtimings.php',
				data: {assign_id: $val,img:img},
			})
			.done(function(data) {
				setTimeout(function(){
					$('.ajax_showtimings').html(data);
				},600)
				
			})
			

		});

		$('.close').on('click',function(event) {
			event.preventDefault();
			/* Act on the event */
			$('.shows').animate({
				"right":"-200px"
			},500);
		});

	});
</script>
</body>
</html>