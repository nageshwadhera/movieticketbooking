<?php use Carbon\Carbon;
date_default_timezone_set("Asia/Kolkata");
require 'config.php';
require 'admin/vendor/autoload.php';
?>
<?php require 'includes/header.php'; ?>
		<div class="body">
			<br clear="all"/><br clear="all"/>
			<div class="slider">
				<img src="<?php echo IMG; ?>0.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>1.jpg" width="1024"  alt="" height="330">
				<img src="<?php echo IMG; ?>2.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>5.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>6.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>3.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>4.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>7.jpg" width="1024" alt="" height="330">
				<img src="<?php echo IMG; ?>8.jpg" width="1024" alt="" height="330">
			</div>

			<div class="nowshowing">
				<h2 class="heading">Now Showing</h2>
                <?php
                    $today= Carbon::now();
                    $movies= allAssignMovies();
                    foreach($movies as $movie){
                        $release_date= explode('/',$movie['release_date']);
                        $end_date= explode('/',$movie['end_date']);

                        $carbo_release= Carbon::createFromDate($release_date[2],$release_date[0],$release_date[1]);
                        $carbo_end= Carbon::createFromDate($end_date[2],$end_date[0],$end_date[1]);
                        if($today->between($carbo_release,$carbo_end)){
                            echo '				<div class="movies">
                        <a href="movies_detail.php?movie='.$movie['assign_id'].'"><img src="movies_img/'.$movie['movie_image'].'" alt=""></a>
                        <a href="movies_detail.php?movie='.$movie['assign_id'].'" class="buy_btn">
                            Buy Ticket</a>
                    </div>';
                        }
                    }
                ?>



			<br clear="all"/>

			</div>
			<!-- <div class="coming_Soon">
				<h2 class="heading">Coming Soon</h2>
				<div class="movies">
					<img src="movies_img/139788966512003.png" alt="">
							
				</div>
				<div class="movies">
					<img src="movies_img/139788966512003.png" alt="">
						
				</div>
				<br clear="all"/>
			</div> -->
			<br clear="all"/>
		</div>
<?php require 'includes/footer.php'; ?>
