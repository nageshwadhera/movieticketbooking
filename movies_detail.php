<?php use Carbon\Carbon;
date_default_timezone_set("Asia/Kolkata");
require 'config.php';
require 'admin/vendor/autoload.php';

$months=["jan","feb","mar","apr","may","june","july","august","sept","oct","nov","dec"];
$days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
?>
<?php require 'includes/header.php'; ?>
<?php
    $movie= findAssignMovies($_GET['movie']);
    $today= Carbon::now();
    $tommorrow= Carbon::now()->addDay();

    $nextday= Carbon::now()->addDays(2);
    $release_date= explode('/',$movie['release_date']);
    $end_date= explode('/',$movie['end_date']);

    $carbo_release= Carbon::createFromDate($release_date[2],$release_date[0],$release_date[1]);
    $carbo_end= Carbon::createFromDate($end_date[2],$end_date[0],$end_date[1]);
?>

	<div class="body">
		<div class="movie_detail">
			<div class="left">
				<img src="movies_img/<?php echo $movie['movie_image'];?>" width="150" alt="">
        <br clear="all"/>

			</div>
			<div class="right">
				<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Today <br>
            <?php echo $today->day; ?>
            <?php echo $months[$today->month-1]; ?>
            <?php echo $today->year; ?>
        </a></li>
    <li><a href="#tabs-2">Tommorrow <br>
            <?php echo $tommorrow->day; ?>
            <?php echo $months[$tommorrow->month-1]; ?>
            <?php echo $tommorrow->year; ?>
        </a></li>
    <li><a href="#tabs-3"><?php echo $days[$nextday->dayOfWeek];  ?> <br>
            <?php echo $nextday->day; ?>
            <?php echo $months[$nextday->month-1]; ?>
            <?php echo $nextday->year; ?>
        </a></li>
  </ul>
  <div class="tabs_detail" id="tabs-1">
    <p class="showheading">Show Timings</p>
     
    <?php
        if($today->between($carbo_release,$carbo_end)){
            $data= findShowtimings($_GET['movie']);
            foreach($data as $mv){
                $date= explode(":",$mv['show_timings']);
                echo '<p class="showno animated fadeInDown" >'; 
                if($today->hour==$date[0]){
                    if($today->minute>=$date[1]){
                        echo addZero($date[0]).":".addZero($date[1]);
                    }else{
                        echo '<a href="seating.php?movie='.$_GET['movie'].'&year='.$today->year.'&month='.$today->month.'&day='.$today->day.'&show_timings='.$mv['show_timings'].'&show_id='.$mv['show_id'].'" >'.addZero($date[0]).":".addZero($date[1]).'</a>';
                    }
                }
                elseif($today->hour>=$date[0]){
                    echo addZero($date[0]).":".addZero($date[1]);
                }else{
                  echo '<a href="seating.php?movie='.$_GET['movie'].'&year='.$today->year.'&month='.$today->month.'&day='.$today->day.'&show_timings='.$mv['show_timings'].'&show_id='.$mv['show_id'].'" >'.addZero($date[0]).":".addZero($date[1]).'</a>';
                }

                echo '</p>';
            }
        }

    ?>


  </div>
  <div class="tabs_detail" id="tabs-2">
   <p class="showheading">Show Timings</p>
      <?php
      if($tommorrow->between($carbo_release,$carbo_end)){
          $data= findShowtimings($_GET['movie']);
          foreach($data as $mv){
              $date= explode(":",$mv['show_timings']);
              echo '<p class="showno animated fadeInDown" >';
              echo '<a href="seating.php?movie='.$_GET['movie'].'&year='.$tommorrow->year.'&month='.$tommorrow->month.'&day='.$tommorrow->day.'&show_timings='.$mv['show_timings'].'&show_id='.$mv['show_id'].'" >'.addZero($date[0]).":".addZero($date[1]).'</a>';
              echo '</p>';
          }
      }

      ?>

  </div>
  <div class="tabs_detail" id="tabs-3">
   <p class="showheading">Show Timings</p>
      <?php
      if($nextday->between($carbo_release,$carbo_end)){
          $data= findShowtimings($_GET['movie']);
          foreach($data as $mv){
              $date= explode(":",$mv['show_timings']);
                echo '<p class="showno animated fadeInDown" >';
              echo '<a href="seating.php?movie='.$_GET['movie'].'&year='.$nextday->year.'&month='.$nextday->month.'&day='.$nextday->day.'&show_timings='.$mv['show_timings'].'&show_id='.$mv['show_id'].'" >'.addZero($date[0]).":".addZero($date[1]).'</a>';
              echo '</p>';
          }
      }

      ?>

  </div>
</div>

<div class="movies_info">
	<div class="movie_heading">Movie Detail</div>
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<th>Movie Name</th>
			<td><?php echo $movie['movie_name']; ?></td>
		</tr>
		<tr>
			<th>Movie Director</th>
			<td><?php echo $movie['movie_director']; ?></td>
		</tr>
		<tr>
			<th>Movie Genre</th>
			<td><?php echo $movie['movie_genre']; ?></td>
		</tr>
		<tr>
			<th>Movie Cast</th>
			<td><?php echo $movie['movie_cast']; ?></td>
		</tr>
		<tr>
			<th>Movie Language</th>
			<td><?php echo $movie['movie_language']; ?></td>
		</tr>
		<tr>
			<th>Movie Duration</th>
			<td><?php echo $movie['movie_hours'].' hours ' . $movie['movie_mins'].' mins'; ?></td>
		</tr>
	</table>
</div>
			</div>
			<br clear="all"/>
		</div>
	</div>
<?php require 'includes/footer.php'; ?>