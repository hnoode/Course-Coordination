<?php
	$user_id = $_GET['user_id'];
	
	$query1 = "select * from users where user_id = {$user_id} ";
	$result1 = mysqli_query($connection, $query1);
	$row1 = mysqli_fetch_array($result1);
	
	$msg = NULL;
	
	if($row1['active'] == 1) {
		$query2 = "update users set active = 0 where user_id = {$user_id} ";
		$msg = "User <strong>Deactivate</strong> Successfully...";
	} else {
		$query2 = "update users set active = 1 where user_id = {$user_id} ";
		$msg = "User <strong>Activate</strong> Successfully...";
	}
	
	$result2 = mysqli_query($connection, $query2);
	
	if($result2) {
		echo "<div class='alert alert-info' style='max-width:460px; margin: 4px auto'>";
			echo $msg;
		echo "</div>";
		if($result2) {
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=users"/>';
			exit;
		}
	} else {
		$msg = "Error While Toggle User";
		echo "<div class='alert alert-danger' style='max-width:460px; margin: 4px auto'>";
			echo $msg;
		echo "</div>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=users"/>';
			exit;
	}
?>