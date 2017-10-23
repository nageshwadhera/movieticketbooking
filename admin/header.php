<?php 
    $total_qre=mysql_query("select * from booking");
    $grand_total=0;
    while($rs_total=mysql_fetch_array($total_qre)){
        $grand_total +=$rs_total['total'];
    }
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS; ?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>flick/jquery-ui-1.10.4.custom.min.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>animate.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>style.css">
  
</head>
<body>
<div class="header">
    <div class="logo"><a href="home.php">Admin <span class="pink">Panel</span></a></div>
   
    <div class="head_dropdown">
        <div class="name"><img src="<?php echo IMG; ?>default.png" width="29" align="absmiddle" alt=""><?php echo  $_SESSION['admin_username']; ?></div>
       
    </div>
     <div class="total_amount">
        Total Amount Rs <span id="counter"><?php echo $grand_total; ?></span>
    </div>
    <div class="menu">
        <div style="width:1024px;margin:auto;">
            <ul>
                <li><a href="show_movies.php">Movies</a>
                    <ul class="dropdown">
                        <li><a href="add_movie.php">Add</a></li>
                        <li><a href="show_movies.php">Show</a></li>
                    </ul>
                </li>
                <li><a href="show_halls.php">Hall</a>
                    <ul class="dropdown">
                        <li><a href="add_hall.php">Add</a></li>
                        <li><a href="show_halls.php">Show</a></li>
                    </ul>
                </li>
                <li><a href="assign_movies.php">Assign Movies</a>
                     <ul class="dropdown">
                        <li><a href="show_assign.php">Show</a></li>
                    </ul>
                </li>
                <li><a href="users.php">Registered Users</a></li>
                <li><a href="stats.php">Stats</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                
                <li><a href="logout.php">Logout</a></li>
                <br clear="all"/>
            </ul>
        </div>
    </div>
    <!-- <br clear="all"/> -->
</div>
<div class="container">
