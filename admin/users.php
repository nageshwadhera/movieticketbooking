<?php 
	require 'config.php';
	require 'auth.php';
	?>
<?php require 'header.php'; ?>
 <div class="innerbody">
 	<h1 class="heading">All Users</h1>
 	<div class="showdata">
 		<table>
 			<tr>
 				<th>S.no.</th>
	 			<th>Username</th>
	 			<th>Email</th>
	 			<th>Mobile</th>
 			</tr>
 			<?php $qre=mysql_query("select * from users");
 			$i=1;
 			while($user=mysql_fetch_array($qre)){
 				echo "<tr>";
 				echo "<td>$i</td>";
 				echo "<td>".$user['user_name']."</td>";
	 			echo "<td>".$user['user_email']."</td>";
	 			echo "<td>".$user['user_mobile']."</td>";
	 			echo "</tr>";
	 			$i++;
 			} ?>
 		</table>
 	</div>
 	<?php 

 	 ?>
 	 <br clear="all"/>
  </div>
 <?php require 'footer.php'; ?>		