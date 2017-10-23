<?php

/*    $start=9;
    $no=5;
    $gap= 30;
    echo $start;
    echo "<br>";
    for($i=1;$i<$no;$i++){
        $new= $start + $gap;
        echo $new;
        $start= $new;
        echo "<br>";
    }
*/
?>
<style>
    .container{
        width:800px;
        border:1px solid #ccc;
    }
    .slide{
        height: 10px;
        background: red;
        margin: 10px 0;
    }
</style>
<!--<div class="container">-->
<!--    <div class="slide" style="width:80%"></div>-->
<!--    <div class="slide" style="width:10%"></div>-->
<!--    <div class="slide" style="width:2%"></div>-->
<!--    <div class="slide" style="width:3%"></div>-->
<!--    <div class="slide" style="width:5%"></div>-->
<!--</div>-->
<?php 
//   $begin = new DateTime( '2014-04-22' );
// $end = new DateTime( '2014-05-04' );
// $end = $end->modify( '+1 day' ); 

// $interval = new DateInterval('P1D');
// $daterange = new DatePeriod($begin, $interval ,$end);

// foreach($daterange as $date){
//     echo $date->format("Ymd") . "<br>";
// }

 ?>
 <div id="counter"></div>
 <script>
    var counter= document.getElementById("counter");
    var loop=1000;
    var i=0;
    var intv=setInterval(function(){
        counter.innerHTML=i=i+50;
        if(i>=loop){
            clearInterval(intv);
        }
    },100);

 </script>