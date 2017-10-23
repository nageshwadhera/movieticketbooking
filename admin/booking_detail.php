<?php 
	require 'config.php';
	require 'auth.php';
	$movie=findAssignMovies($_GET['assign_id']);
 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Booking Details of <?php echo $movie['movie_name']; ?></h1>
 	<?php $show_timings=findShowtimings($_GET['assign_id']);
 		foreach ($show_timings as $key => $value) {
 			echo "<a class='show_timing' href='detail.php?".$_SERVER['QUERY_STRING']."&show_timings=".$value['show_timings']."'>".$value['show_timings']."</a>";
 		}

 	 ?>
 	 <br clear="all"/>
  </div>
 <?php require 'footer.php'; ?>		