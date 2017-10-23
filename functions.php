<?php 
	function booking($movie_id,$day,$show_timings){
		$qre=mysql_query("select booking.*,show_timings.* from booking inner join show_timings on booking.show_id=show_timings.show_id where booking.assign_id='".$movie_id."' and show_timings.show_timings='".$show_timings."' and booking.day='".$day."' ");
		$data=[];
		while($res=mysql_fetch_array($qre)){
			$data[]= $res;
		}
		return $data;
	}

	function find_tickets($booking_id){
		$qre=mysql_query("select * from tickets where booking_id='".$booking_id."'");
		$data=[];
		while($res=mysql_fetch_array($qre)){
			$data[]= $res;
		}
		return $data;
	}

	function guest(){
		if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){
			return header("location: register.php");
		}
	}