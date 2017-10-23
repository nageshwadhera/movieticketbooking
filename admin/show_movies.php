<?php 
	require 'config.php';
	require 'auth.php';
	if(isset($_GET['movie_id'])){
		$qre=mysql_query("delete from movies where movie_id='".$_GET['movie_id']."'");
		if( $qre ){
			header("location: show_movies.php");
		}
	}
	
 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Show Movies</h1>
 	<div class="showdata">
 		<table width="100%" cellspacing="0" cellpadding="0">
 			<tr>
 				<th>Image</th>
 				<th>Name</th>
 				<th>Cast</th>
 				<th>Director</th>
 				<th>Genre</th>
 				<th>Language</th>
 				<th>Action</th>
 			</tr>
 			<?php 
 				$data= allMovies();
 				foreach($data as $res){
 				
 					echo "<tr>";
 					echo "<td width='9%'><img src='../movies_img/".$res['movie_image']."' width='64'></td>";
 					echo "<td width='13%' valign='top'>".$res['movie_name']."</td>";
 					echo "<td width='30%' valign='top'>".$res['movie_cast']."</td>";
 					echo "<td valign='top'>".$res['movie_director']."</td>";
 					echo "<td valign='top'>".$res['movie_genre']."</td>";
 					echo "<td valign='top'>".$res['movie_language']."</td>";
 					echo "<td valign='top'>
 						<a href='edit_movie.php?movie_id=".$res['movie_id']."'>Edit</a> <a href='show_movies.php?movie_id=".$res['movie_id']."'>Delete</a> </td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>
 	</div>
 </div>
 <?php require 'footer.php'; ?>