<?php 
	require 'config.php'; 
	guest();
	//change password
	if(isset($_POST['password'])){
		$opassword= sha1($_POST['opassword']);
		$npassword= sha1($_POST['npassword']);
		if(empty($opassword) || empty($npassword)){

		}else{
			$qre=mysql_query("select * from users where user_password='$opassword' and user_id='".$_SESSION['user_id']."'");
			$rows=mysql_num_rows($qre);
			if($rows==0){
				$error="old password not match";
			}else{
				$qre=mysql_query("update users set user_password='$npassword' where user_id='".$_SESSION['user_id']."'");
				if( $qre ){
					$success="your password changed";
				}
			}
		}
	}

	//update profile
	if(isset($_POST['submit'])){
		$username= $_POST['username'];
		$email= $_POST['email'];
		$mobile= $_POST['mobile'];
		if(empty($username) || empty($email) || empty($mobile)){

		}else{
			$qre=mysql_query("update users set user_name='$username',user_email='$email',user_mobile='$mobile' where user_id='".$_SESSION['user_id']."'");
			if( $qre ){
				header("location: home.php");
			}
		}
	}


	$qre1= mysql_query("select * from users where user_id='".$_SESSION['user_id']."'");
	$login_user=mysql_fetch_array($qre1);
		

 ?>
 <?php require 'includes/header.php'; ?>
 <br clear="all"/><br clear="all"/>
	<div class="body">
		<h2 class="heading">Settings</h2>
		<form action="" method="post">
			<table class="form">
				<tr>
					<th>Username</th>
					<td><input type="text" name="username" value="<?php echo $login_user['user_name']; ?>" id=""></td>
				</tr>
				<tr>
					<th>E-mail</th>
					<td><input type="text" name="email" value="<?php echo $login_user['user_email']; ?>" id=""></td>
				</tr>
				<tr>
					<th>Mobile</th>
					<td><input type="text" name="mobile" value="<?php echo $login_user['user_mobile']; ?>" id=""></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td><input type="submit" value="Update" class="book_flight_btn" name="submit"></td>
				</tr>
			</table>
		</form>
		<br clear="all"/><br clear="all"/>
		<h2 class="heading">Change Password</h2>
		<?php if(isset($error)){
			echo "<div class='error'>$error</div>";
			} ?>
			<?php if(isset($success)){
			echo "<div class='success'>$success</div>";
			} ?>
		<form action="" method="post">
			<table class="form">
				<tr>
					<th>Old Password</th>
					<td><input type="password" name="opassword" id=""></td>
				</tr>
				<tr>
					<th>New Password</th>
					<td><input type="password" name="npassword" id=""></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td><input type="submit" style="width:140px;" class="book_flight_btn" value="change password" name="password"></td>
				</tr>
			</table>
		</form>
	</div>
<?php require 'includes/footer.php'; ?>
