<?php require 'config.php'; ?>
<?php 
if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= sha1($_POST['password']);

    $qre=mysql_query("select * from admin where username='$username' and password='$password' limit 1");
    $num_rows= mysql_num_rows($qre);
    if($num_rows==0){
        $error= "invalid username/password";
    }else{
        while($res=mysql_fetch_array($qre)){
            $_SESSION['admin_id']= $res['admin_id'];
            $_SESSION['admin_username']= $res['username'];
            if(isset($_SESSION['admin_id']) && $_SESSION['admin_username']){
                header("location:home.php");
            }
        }

    }

}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo CSS; ?>style.css">
</head>
<body style="background:#07598B">
	<div class="logincontainer">
		<h1 class="logo">Admin Panel</h1>
		<form action="" method="post">
		<div class="innercontainer">
			<div class="head">Sign In</div>
			 <?php if(isset($error)){
                echo "<div class='error'>".$error."</div>";
            } ?>
			<div class="row"><input type="text" name="username" placeholder="enter username" id="username"></div>
			<div class="row"><input type="password" name="password" placeholder="enter password" id="password"></div>
			<div class="row"><input type="submit" name="submit" value="Sign In" class="submitbtn"></div>
		</div>
		</form>
	</div>
</body>
</html>