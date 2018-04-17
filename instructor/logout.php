<p>Logging Out...</p>
<?php
	
	$user_id = $_SESSION['instructor_id'];
									
	$query2 = "update users set online_now = 0 where user_id = {$user_id} ";
	$result2 = mysqli_query($connection,$query2);
	
	session_destroy();	
	echo '<META HTTP-EQUIV="Refresh" Content="2; URL=../index.php"/>';
	exit;
?>