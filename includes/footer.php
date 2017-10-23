		<div class="footer" >
			<br clear="all">
			<small>Design & Developed by Student</small>
		</div>
	</div>
	<script src="<?php echo JS; ?>jquery.js"></script>
	<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo JS; ?>cycle.js"></script>
	<script>
		$(document).ready(function() {
			$('.slider').cycle({
				fx:"scrollDown"
			});	
			 $( "#tabs" ).tabs();	
		});
	</script>
</body>
</html>