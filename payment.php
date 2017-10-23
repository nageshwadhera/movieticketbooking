<?php require 'config.php'; 
$movie= findAssignMovies($_GET['movie']);
$date= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
   if(isset($_POST['submit'])){
      $user_id=$_POST['user_id'];
      $total=$_POST['total'];
      $assign_id=$_POST['assign_id'];
      $show_id=$_POST['show_id'];
      $day=$_POST['day'];
   
      $qre=mysql_query("insert into booking(user_id,total,assign_id,show_id,day) values 
        ('$user_id','$total','$assign_id','$show_id','$day')");
      if( $qre ){
          $id= mysql_insert_id(); 
          $array=$_SESSION['seats'][$date][$_GET['show_id']];
          foreach($array as $seat){
              $ticket_num= substr($movie['movie_name'], 0,4)."-".$date."-".$_GET['show_timings']."-".$seat;
              $qre1=mysql_query("insert into tickets (ticket_number,booking_id,seat_number) values ('$ticket_num','$id','$seat')");
              if( $qre1 ){
                $success="Thank You";
              }
          }
      }


  }
?>
<?php require 'includes/header.php';
	$movie= findAssignMovies($_GET['movie']);
	$date= $_GET['day'].'-'.$_GET['month'].'-'.$_GET['year'];
 ?>
<br clear="all"/>
 <div style="margin-top:30px;"></div>
	<div class="body">
		<h2 class="heading">Payment</h2>
    <?php if(isset($success)){
      echo "<div style='font-size:18px;margin-top:50px;text-align:center;'>Thank You. you can redirect to your account in 2 seconds</div>";?>
    <script>
        setTimeout(function(){
          window.location="history.php";
        },2000)
    </script>
   <?php   }else{ ?>
		<form action="" method="post">			
		<select name="payment">
          <option value="">--select payment method--</option>
          <option value="credit_card">Credit Card</option>
          <option value="net_banking">Net Banking</option>
        </select>
		<div class="payment_container">	
		</div>
		<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
		<input type="hidden" name="total" value="<?php echo $_GET['total']; ?>">
		<input type="hidden" name="assign_id" value="<?php echo $_GET['movie']; ?>">
		<input type="hidden" name="show_id" value="<?php echo $_GET['show_id']; ?>">
		<input type="hidden" name="day" value="<?php echo $date; ?>">
    <br clear="all"/>
    <br clear="all"/>
			<div><input type="submit" class="book_flight_btn" value="Pay" name="submit"></div>
		</form>
<?php } ?>
	</div>
</div>
	<script src="<?php echo JS; ?>jquery.js"></script>
	<script src="<?php echo JS; ?>jquery-ui-1.10.4.custom.min.js"></script>
	<script>
	 function credit_card(amount){
      var text='';
      text +=' <table class="shipping">';
      text +='<tr><td>Credit Card Number</td><td><input required type="text" name="credit_card_no"></td></tr>';
      text +='<tr><td>Name on the card</td><td><input required type="text" name="credit_name"></td></tr>';
      text +='<tr><td>Expiry Date</td><td>';
      text +='<select name="month" required style="width:80px;">';
      text +='<option value="">Month</option>';
      for(i=1;i<=12;i++){
          text +='<option value="'+i+'">'+i+'</option>';
      }
      text +='</select>';
      text +='<select name="day" required style="width:80px;">';
      text +='<option value="">Day</option>';
      for(i=1;i<=31;i++){
          text +='<option value="'+i+'">'+i+'</option>';
      }
      text +='</select>';
      text +='<select name="year" required style="width:80px;">';
      text +='<option value="">Year</option>';
      for(i=2014;i<=2020;i++){
          text +='<option value="'+i+'">'+i+'</option>';
      }
      text +='</select>';
      text +='</td></tr>';
      text +='<tr><td>CVV Number</td><td><input required type="text" name="credit_cvv"></td></tr>';
      text +='<tr><td>Amount</td><td><input type="text" name="credit_amount" disabled value="'+amount+'"></td></tr>';
      text +='</table>';
      return text;
  }

  function net_banking(amount){
      var text='';
      text +=' <table class="shipping">';
      text +='<tr><td>Bank name</td><td><select name="bank" required>';
      text +='<option value="sbi">SBI</option>';
      text +='<option value="pnb">PNB</option>';
      text +='<option value="hdfc">HDFC</option>';
      text +='<option value="icici">ICICI</option>';
      text +='</select></td></tr>';
      text +='<tr><td>Account Number</td><td><input required type="text" name="bank_acc_no"></td></tr>';
      text +='<tr><td>Account Holder Name</td><td><input required type="text" name="bank_holder_no"></td></tr>';
      text +='<tr><td>Branch Name</td><td><input required type="text" name="bank_branch_name"></td></tr>';
      text +='<tr><td>Amount</td><td><input type="text" name="bank_amount" disabled value="'+amount+'"></td></tr>';
      text +='</table>';
      return text;
  }
	
		$(function() {
				 $('select[name="payment"]').on('change',function(){
				 	var value= $(this).val();
				 	var total= <?php 	echo $_GET['total']; ?>	;
				 	  if(value=='credit_card'){
				 	  	$('.payment_container').html(credit_card(total));
				 	  }else if(value=='net_banking'){
						$('.payment_container').html(net_banking(total));
					}		
				 });	  	
			
		});
	</script>
</body>
</html>		

		