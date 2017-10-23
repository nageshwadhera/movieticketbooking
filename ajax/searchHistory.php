<?php use Carbon\Carbon;

require '../config.php';
date_default_timezone_set("Asia/Kolkata");
require '../admin/vendor/autoload.php';

$date1_format= $_GET['start_date'];
$date1_format1= explode("/",$date1_format);
$date1= Carbon::createFromDate($date1_format1[2],$date1_format1[0],$date1_format1[1]);
$date2_format=$_GET['end_date'];
$date2_format1= explode("/",$date2_format);
$date2= Carbon::createFromDate($date2_format1[2],$date2_format1[0],$date2_format1[1]);
$qre= mysql_query("select booking.*,show_timings.* from booking inner join show_timings on booking.show_id=show_timings.show_id where user_id='".$_GET['user_id']."' ");
$i=1;
 echo '	<tr class="history_heading">
			<th>S.no</th>
			<th>Date</th>
			<th>Movie</th>
			<th>Ticket Price</th>
			<th>Show Time</th>
		</tr>';
while($res=mysql_fetch_array($qre)){
    $date= $res['day'];
    $dt= explode("-",$date);

    $newdate= Carbon::createFromDate($dt[2],$dt[1],$dt[0]);
    if($newdate->between($date1,$date2)){
    	$movie=findAssignMovies($res['assign_id']);
       echo "<tr>";
       echo "<td>$i</td>";
       echo "<td>".$res['day']."</td>";
       echo "<td>".$movie['movie_name']."</td>";
       echo "<td>".$movie['price']."</td>";
       echo "<td>".$res['show_timings']."</td>";
       echo "</tr>";

       $i++;
    }
}
