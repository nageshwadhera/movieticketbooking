<?php
	require 'config.php';
	guest();
 ?>
 <?php require 'includes/header.php'; ?>
 <br clear="all"/><br clear="all"/>
	<div class="body">
		<h2 class="heading">History</h2>
		<br clear="all"/>
		<table class="form">
			<tr>
				<th>Select Start Date</th>
				<td><input type="text" name="start_date" class="datepicker" id=""></td>
			
				<th>Select End Date</th>
				<td><input type="text" name="end_date" class="datepicker" id=""></td>
				<th><button class="book_flight_btn" id="history">Search</button></th>
			</tr>
		</table>
		<div class="showing_results">Showing Results from <span class="start_date"></span> to <span class="end_date"></span></div>
		<div class="history_results">
			<table cellspacing="0" cellpadding="0">
				
			</table>
		</div>
	</div>
		<div class="footer"></div>
	</div>
	<script src="<?php echo JS; ?>jquery.js"></script>
	<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.datepicker').datepicker();	
			$('#history').on('click',function() {
				var start_date= $('input[name="start_date"]').val();
				var end_date= $('input[name="end_date"]').val();
				$('span.start_date').html(start_date);
				$('span.end_date').html(end_date);
				var user_id=<?php echo $_SESSION['user_id']; ?>;
				$.ajax({
					url: 'ajax/searchHistory.php',
					type: 'GET',
					data: {start_date:start_date,end_date:end_date,user_id:user_id},
				})
				.done(function(data) {
					$('.history_results table').html(data);
				});
				
			});	
		});
	</script>
</body>
</html>
