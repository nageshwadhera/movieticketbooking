
<?php 
  function addZero($num){
        if($num<=9){
            return "0".$num;
        }
        return $num;
    }


/*
	start
	Hall table functions
*/
function allHalls(){
	$data=[];
	$qre=mysql_query("select * from halls");
 	while($res=mysql_fetch_array($qre)){
 		$data[]= $res;
 	}
 	return $data;
}

function allFeedback(){
	$data=[];
	$qre=mysql_query("select * from feedback");
 	while($res=mysql_fetch_array($qre)){
 		$data[]= $res;
 	}
 	return $data;
}

function halls_in_dropdown(){
	$str='';
	$str .='<select name="hall_id">
 			<option value="">--select hall--</option>';
 	$data= allHalls();
 	foreach ($data as $key => $res) {
 			$str .= "<option value='".$res['hall_id']."'>".$res['hall_name']."</option>";
 		}	
 	$str .='</select>';
 	return $str;
}



/*
	start
	Movies table functions
*/

function allMovies(){
	$qre=mysql_query("select * from movies");
 	$data= [];
 	while($res=mysql_fetch_array($qre)){
 		$data[]= $res;
 	}
 	return $data;
}

function movies_in_dropdown(){
	$str='';
	$str .='<select name="movie_id">
 			<option value="">--select movie--</option>';
 	$data= allMovies();
 	foreach ($data as $key => $res) {
 			$str .= "<option value='".$res['movie_id']."'>".$res['movie_name']."</option>";
 		}	
 	$str .='</select>';
 	return $str;
}

function find_movie_with_id($id){
	$qre=mysql_query("select * from movies where movie_id='".$id."'");
 	$movie=mysql_fetch_array($qre);

 	return $movie;
}

/*
	end
	Movies table functions 
*/

/*
	start
	assign movies table
*/	
	function allAssignMovies(){
		$qre=mysql_query("select assign_movies.*,movies.*,halls.* from assign_movies inner join movies on assign_movies.movie_id=movies.movie_id inner join halls on assign_movies.hall_id=halls.hall_id;");
		$data=[];
		while($res=mysql_fetch_array($qre)){
			$data[]= $res;
		}
		return $data;
	}

function findAssignMovies($id){
    $qre=mysql_query("select assign_movies.*,movies.*,halls.* from assign_movies inner join movies on assign_movies.movie_id=movies.movie_id inner join halls on assign_movies.hall_id=halls.hall_id where assign_id='$id'");
    $res=mysql_fetch_array($qre);
    return $res;
}


function findShowtimings($id){
    $qre=mysql_query("select * from show_timings where assign_id='$id'");
    $data= [];
    while($res=mysql_fetch_array($qre)){
        $data[]= $res;
    }

    return $data;
}

	function finduser($userid){
		$qre=mysql_query("select * from users where user_id='$userid'");
		$res=mysql_fetch_array($qre);
		return $res;	
	}

	function count_tickets($id){
		$qre=mysql_query("select * from tickets where booking_id='$id'");
		$rows= mysql_num_rows($qre);
		return $rows;
	}