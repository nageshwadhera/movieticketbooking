<?php require 'config.php';
	require 'auth.php';
	?>
<?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">Today's Stats</h1>
 	<div class="showdata">
 	<input type="text" name="datepicker" class="datepicker" id="">
		<select name="movie_id" id="">
		<option value="">--select movie--</option>
		<?php 
				$data=allAssignMovies();
				foreach ($data as $key => $movie) {
					echo "<option value='".$movie['assign_id']."'>".$movie['movie_name']."</option>";
				}
			?></select>
			<select name="chart_type" id="">
				<option value="area">area</option>
				<option value="line">line</option>
				<option value="bar">bar</option>
				<option value="column">column</option>
			</select>
		<input type="button" value="Show" name="show_graph" class="button">
		<div id="container" style="width:100%; height:700px;"></div>

 	 <br clear="all"/>
  </div>
    <br clear="all"/>
</div>
<!-- <div class="bottom">2013 © Admin by Student Project.</div> -->
<script src="<?php echo JS; ?>jquery.js"></script>
<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo JS; ?>chart.js"></script>
<script>
		$(function () { 
			$('.datepicker').datepicker();
			$('body').on('click', 'input[name="show_graph"]', function(event) {
				event.preventDefault();
				var movieid= $('select[name="movie_id"]').val();
				var day= $('input[name="datepicker"]').val();
				var chart_type=$('select[name="chart_type"]').val();
					$.ajax({
						url: 'ajax/graph.php',
						type: 'GET',
						dataType: 'json',
						data: {movieid: movieid,day:day},
					})
					.done(function(data) {
						// console.log(data.show_timings);
						    $('#container').highcharts({
        chart: {
            type: chart_type
        },
        title: {
            text: "Today's Movie Stats"
        },
        subtitle:{
        	text:'Compare Shows'
        },
        xAxis: {
            categories: data.show_timings
        },
        yAxis: {
            title: {
                text: 'Amount in Rs'
            }
        },
        series: [{
            name: 'Profit',
            data: data.total
        }
        ]
    });
					})
				
				});
			
			

});
	</script>

</body>
</html>