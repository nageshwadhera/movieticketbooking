<?php 
	require 'config.php';
	require 'auth.php';
	if(isset($_POST['submit'])){
		$movie_id= $_POST['movie_id'];
		$hall_id= $_POST['hall_id'];
		$release_date= $_POST['release_date'];
		$end_date= $_POST['end_date'];
		$noshows= $_POST['noshows'];
		$price= $_POST['ticket_price'];
		$start_time= $_POST['start_hours'].":".$_POST['start_mins'];
		$break= $_POST['hours'].":".$_POST['mins'];
		$qre=mysql_query("insert into assign_movies 
			(movie_id,hall_id,release_date,end_date,no_shows,break_time,start_time,price) 
			values 
			('$movie_id','$hall_id','$release_date','$end_date','$noshows','$break','$start_time','$price')");

		if( $qre ){
			$last_id=mysql_insert_id();
			$hours= $_POST['schedule_hours'];
			$mins=$_POST['schedule_mins'];
			for ($i=0; $i<count($hours) ; $i++) { 
				$timings=$hours[$i]. ":".$mins[$i];
				$qre1=mysql_query("insert into show_timings (assign_id,show_timings) values ('$last_id','$timings')");
				if( $qre1 ){
					$success= "Movie Assign";
				}

			}
			
		}


		
		// die();
	}

	?>
<?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Assign Movies</h1>
 	<?php if(isset($success)){
 		echo "<div class='success'>$success</div>";
 		} ?>
<form action="" method="post"><table class="form" width="60%" cellspacing="0" cellpadding="0">
			<tr>
				<th>Select Movie</th>
					<td><?php echo movies_in_dropdown(); ?></td>
			</tr>
			<tr>
				<th>Select Hall</th>
				<td>
					<?php echo halls_in_dropdown(); ?>
				</td>
			</tr>
			<tr>
				<th>Release Date</th>
				<td><input type="text" name="release_date" class="datepicker" id=""></td>
			</tr>
			<tr>
				<th>End Date</th>
				<td><input type="text" name="end_date" class="datepicker" id=""></td>
			</tr>
			<tr>
				<th>Ticket Price</th>
				<td><input type="text" name="ticket_price" id=""></td>
			</tr>
			<tr>
				<th>No. of Shows</th>
				<td> 
			 			<select name='noshows'>
			 				<option value="">--select shows--</option>
			 				<option value="1">1</option>
			 				<option value="2">2</option>
			 				<option value="3">3</option>
			 				<option value="4">4</option>
			 				<option value="5">5</option>
			 			</select>
				</td>
			</tr>
			<tr>
				<th>Start Time of first show</th>
				<td>
						<input type="text" id="amount2" style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="start_hours" value="0">
						<div style="width:200px;" id="slider-range-max2"></div>
		
						<input type="text" id="amount3" style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="start_mins" value="0">
						<div style="width:200px;" id="slider-range-max3"></div>
				</td>
			</tr>
			<tr>
				<th>Break Time Between Shows</th>
				<td>
						<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="hours" value="0">
						<div style="width:200px;" id="slider-range-max"></div>
		
						<input type="text" id="amount1" style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="mins" value="0">
						<div style="width:200px;" id="slider-range-max1"></div>
				</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td><input type="button" value="Get Schedule" class="button getSchedule"></td>
			</tr>
		</table>
		<table class="form" id="assign_movie">
			
		</table>
		<table>
			<tr>
				<th>&nbsp;</th>
				<th><input type="submit"  style="display:none" class="button" value="Save" name="submit"></th>
			</tr>
		</table>
		 </form>	</div>
    <br clear="all"/>
</div>
<!-- <div class="bottom">2013 © Admin by Student Project.</div> -->
<script src="<?php echo JS; ?>jquery.js"></script>
<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo JS; ?>app.js"></script>

<script>
	
	 $( "#slider-range-max" ).slider({
      range: "max",
      min: 0,
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
//end
 $( "#slider-range-max2" ).slider({
      range: "max",
      min: 0,
      max: 23,
      value:0 ,
      slide: function( event, ui ) {
        $( "#amount2" ).val( "Hours "+ui.value );
        $( "input[name='start_hours']" ).val(ui.value );
      }
    });
    $( "#amount2" ).val( "Hours "+$( "#slider-range-max2" ).slider( "value" ) );
    $( "input[name='start_hours']" ).val( $( "#slider-range-max2" ).slider( "value" ) );

     $( "#slider-range-max3" ).slider({
      range: "max",
      min: 0,
      max: 59,
      value:0 ,
      slide: function( event, ui ) {
        $( "#amount3" ).val( "Mins "+ui.value );
         $( "input[name='start_mins']" ).val(ui.value );
      }
    });
    $( "#amount3" ).val( "Mins "+$( "#slider-range-max3" ).slider( "value" ) );
     $( "input[name='start_mins']" ).val( $( "#slider-range-max3" ).slider( "value" ) );
     jQuery(document).ready(function($) {
	     $('.getSchedule').on('click', function() {
	     	var movie_id= $('select[name="movie_id"]').val();
	     	var no_shows= $('select[name="noshows"]').val();
	     	var hours= $('input[name="hours"]').val();
	     	var mins= $('input[name="mins"]').val();
	     	var start_hours= $('input[name="start_hours"]').val();
	     	var start_mins= $('input[name="start_mins"]').val();

	     	$.ajax({
	     		url: 'ajax/getshowtimings.php',
	     		type: 'GET',
	     		data: {
	     			movie_id:movie_id,
	     			no_shows:no_shows,
	     			hours:hours,
	     			mins:mins,
	     			start_hours:start_hours,
					start_mins:start_mins	     			
	     		},
	     	})
	     	.done(function(data) {
	     		$('#assign_movie').html(data);
	     		$('input[name="submit"]').show();
	     	})
	     	.fail(function() {
	     		console.log("error");
	     	})
	     	.always(function() {
	     		// console.log("complete");
	     	});
	     	
	     	

	     });

     	
     });
</script>
</body>
</html>