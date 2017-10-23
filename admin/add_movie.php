<?php 
	require 'config.php';
	require 'auth.php';

	if(isset($_POST['submit'])){
		$movie_hours= $_POST['hours'];
		$movie_mins= $_POST['mins'];
		$movie_name= $_POST['movie_name'];
		$movie_image= $_FILES['movie_image']['name'];
		$movie_director= $_POST['movie_director'];
		$movie_genre= $_POST['movie_genre'];
		$movie_cast= $_POST['movie_cast'];
		$movie_language= $_POST['movie_language'];
		$movie_image= time().$movie_image;
		if(move_uploaded_file($_FILES['movie_image']['tmp_name'], "../movies_img/".$movie_image)){
			$qre=mysql_query("insert into movies (movie_name,movie_director,movie_genre,movie_cast,movie_language,movie_image,movie_hours,movie_mins) 
				values ('$movie_name','$movie_director','$movie_genre','$movie_cast','$movie_language','$movie_image','$movie_hours','$movie_mins')");
			if( $qre ){
				$success= "save";
			}

		}
	}

 ?>
 <?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Add Movies</h1>
 	<?php if(isset($success)){
 		echo "<div class='success'>".$success.'</div>';
 		} ?>
 		
 	<form action="" method="post" enctype="multipart/form-data">
 		<table class="form" cellpadding="0" cellspacing="0" width="60%">
 			<tr>
 				<th>Movie Name</th>
 				<td><input type="text" name="movie_name" id=""></td>
 			</tr>
 			<tr>
 				<th>Movie Image</th>
 				<td><input type="file" name="movie_image" id=""></td>
 			</tr>
 			<tr>
 				<th>Director</th>
 				<td><input type="text" name="movie_director" id=""></td>
 			</tr>
 			<tr>
 				<th>Genre</th>
 				<td><input type="text" name="movie_genre" id=""></td>
 			</tr>
 			<tr>
 				<th>Cast</th>
 				<td><input type="text" name="movie_cast" id=""></td>
 			</tr>
 			<tr>
 				<th>Language</th>
 				<td><input type="text" name="movie_language" id=""></td>
 			</tr>
 			<tr>
 				<th>Duration</th>
 				<td>
 					<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
 					<input type="hidden" name="hours">
 					<div style="width:200px;" id="slider-range-max"></div>

 					<input type="text" id="amount1" style="border:0; color:#f6931f; font-weight:bold;">
 					<input type="hidden" name="mins">
 					<div style="width:200px;" id="slider-range-max1"></div>
 				</td>
 			</tr>
 			<tr>
 				<th></th>
 				<td colspan="3">
 				<input type="submit" class="button" value="Add Movie" name="submit">
 				</td>
 			</tr>
 		</table>
 	</form>
 </div>
    <br clear="all"/>
</div>
<!-- <div class="bottom">2013 © Admin by Student Project.</div> -->
<script src="<?php echo JS; ?>jquery.js"></script>
<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
<script>
	
	 $( "#slider-range-max" ).slider({
      range: "max",
      min: 1,
      max: 4,
      value:0 ,
      slide: function( event, ui ) {
        $( "#amount" ).val( "Hours "+ui.value );
        $( "input[name='hours']" ).val(ui.value );
      }
    });
    $( "#amount" ).val( "Hours "+$( "#slider-range-max" ).slider( "value" ) );
    $( "input[name='hours']" ).val( $( "#slider-range-max" ).slider( "value" ) );

     $( "#slider-range-max1" ).slider({
      range: "max",
      min: 0,
      max: 59,
      value:0 ,
      slide: function( event, ui ) {
        $( "#amount1" ).val( "Mins "+ui.value );
         $( "input[name='mins']" ).val(ui.value );
      }
    });
    $( "#amount1" ).val( "Mins "+$( "#slider-range-max1" ).slider( "value" ) );
     $( "input[name='mins']" ).val( $( "#slider-range-max1" ).slider( "value" ) );
</script>
</body>
</html>