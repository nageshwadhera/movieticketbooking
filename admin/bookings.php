<?php 
	require 'config.php';
	require 'auth.php';
	$movie=findAssignMovies($_GET['id']);

	
 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Show Bookings</h1>
 	<?php 
 	$today= new DateTime();


 		$begin = new DateTime( $movie['release_date'] );
 		$end = new DateTime( $movie['end_date'] );
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		$months=["jan","feb","mar","apr","may","june","july","august","sept","oct","nov","dec"];
		foreach($daterange as $date){
			if($today->format("d")==$date->format("d") && $today->format("n")==$date->format("n") && $today->format("Y")==$date->format("Y")){
				echo "<div style='background:black;' class='date animated fadeInLeft'>";
				echo "<a style='color:white!important' href='booking_detail.php?assign_id=".$_GET['id']."&day=".$date->format("d")."&month=".$date->format("n")."&year=".$date->format("Y")."'>";
				echo "<div class='day'>".$date->format("d")."</div>";
			    echo "<div class='month'>".$months[$date->format("n")-1].'</div>';
			    echo "<div class='year'>".$date->format("Y").'</div>';
			    echo "</a>";
			    echo "</div>";
			}else{
				echo "<div class='date animated fadeInLeft'>";
				echo "<a href='booking_detail.php?assign_id=".$_GET['id']."&day=".$date->format("d")."&month=".$date->format("n")."&year=".$date->format("Y")."'>";
				echo "<div class='day'>".$date->format("d")."</div>";
			    echo "<div class='month'>".$months[$date->format("n")-1].'</div>';
			    echo "<div class='year'>".$date->format("Y").'</div>';
			    echo "</a>";
			    echo "</div>";
			}
		
		}
		echo "<br clear='all'>";
 	 ?>
 </div>
 <?php require 'footer.php'; ?>	