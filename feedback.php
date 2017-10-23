<?php 
	require 'config.php'; 
	if(isset($_POST['submit'])){
		$name= $_POST['name'];
		$email= $_POST['email'];
		$city= $_POST['city'];
		$mobile= $_POST['mobile'];
		$msg= $_POST['feedback'];
		if(empty($name) || empty($email) || empty($city) || empty($mobile) || empty($msg)){
			$error= "please enter empty fields";
		}else{
			$qre=mysql_query("insert into feedback
				(feedback_name,feedback_email,feedback_city,feedback_mobile,feedback_msg) 
				values 
				('$name','$email','$city','$mobile','$msg')");
			if($qre){
				$success="Thank You for your feedback";
			}
		}

	}

	?>
 <?php require 'includes/header.php'; ?>
 <br clear="all"/><br clear="all"/>
 <div class="body">
		<h2 class="heading">Feedback</h2>
		<?php if(isset($error)){
			echo "<div class='error'>$error</div>";
			} ?>
			<?php if(isset($success)){
			echo "<div class='success'>$success</div>";
			} ?>
		<form action="" m
		<form action="" method="post">
			<table class="form">
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" id=""></td>
				</tr>
				<tr>
					<th>E-mail</th>
					<td><input type="text" name="email" id=""></td>
				</tr>
				<tr>
					<th>City</th>
					<td><input type="text" name="city" id=""></td>
				</tr>
				<tr>
					<th>Mobile</th>
					<td><input type="text" name="mobile" id=""></td>
				</tr>
				<tr>
					<th>Feedback</th>
					<td><textarea name="feedback" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="Submit" name="submit" class="book_flight_btn"></td>
				</tr>
			</table>
		</form>
		<br clear="all"/><br clear="all"/>
		
	</div>
<?php require 'includes/footer.php'; ?>