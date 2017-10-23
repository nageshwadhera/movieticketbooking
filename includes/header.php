<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo CSS; ?>flick/jquery-ui-1.10.4.custom.min.css">
	<link rel="stylesheet" href="<?php echo CSS; ?>animate.css">
	<link rel="stylesheet" href="<?php echo CSS; ?>style.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1 class="logo"><a href="index.php"><img src="<?php echo IMG; ?>logo.png" alt=""></a></h1>
			<div class="toplinks">
			
			</div>
			<div class="topmenu">
				<ul>
				<li><a href="index.php">Home</a></li>
					<?php if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
				echo '<li><a href="home.php">'.$_SESSION['username'].'</a></li>
				<li><a href="history.php">History</a></li><li><a href="logout.php">Logout</a></li>';
				} else{?>
				<li>
					<a href="register.php">Login</a>
				</li>
				<li>
					<a href="register.php">Register</a>
				</li>
				<?php  }?>
				
					<li>
						<a href="feedback.php">Feedback</a>
					</li>
					<li>
						<a href="locations.php">Cinema Locations</a>
					</li>
				</ul>
			</div>
		</div>