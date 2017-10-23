<?php 
	require 'config.php';
	require 'auth.php';
    $movie= mysql_query("select * from movies");
    $movie_rows= mysql_num_rows($movie);

    $hall= mysql_query("select * from halls");
    $hall_rows= mysql_num_rows($hall);

    $assign= mysql_query("select * from assign_movies");
    $assign_rows= mysql_num_rows($assign);

    $user= mysql_query("select * from users");
    $user_rows= mysql_num_rows($user);    

 ?>
 <?php require 'header.php'; ?>
    <div class="right">
        <div class="row">
         <a href="show_movies.php"><div class="tiles metro_purple">
                    <div class="icon"><img src="<?php echo IMG; ?>icons/category.png" alt=""></div>
                    <div class="text"><?php echo $movie_rows; ?> <br> Movies</div>
                </div></a>
            <a href="show_halls.php"><div class="tiles metro_dark_blue">
                    <div class="icon "><img src="<?php echo IMG; ?>icons/users.png" alt=""></div>
                    <div class="text"><?php echo $hall_rows; ?> <br> Halls</div>
                </div></a>
           
            <a href="show_assign.php"><div class="tiles metro_grey">
                    <div class="icon "><img src="<?php echo IMG; ?>icons/address.png" alt=""></div>
                    <div class="text"><?php echo $assign_rows; ?> <br> assign movies</div>
                </div></a>
      
        
                 <a href="users.php"><div class="tiles metro_red">
                    <div class="icon "><img src="<?php echo IMG; ?>icons/news.png" alt=""></div>
                    <div class="text"><?php echo $user_rows; ?> <br> Users</div>
                </div></a>
                
          
        </div>
        
      
    </div>
<?php require 'footer.php'; ?>