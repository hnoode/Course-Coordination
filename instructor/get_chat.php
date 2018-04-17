<?php
	require("../connection.php");
	$course_id = $_GET['course_id'];
	$query2 = "SELECT * FROM chat where course_id={$course_id} order by chat_id desc";
	
	$result2 = mysqli_query($connection, $query2);
	while($message = mysqli_fetch_assoc($result2)) {
		if($message['user_type'] =='instructor') {
			echo '<div class="alert alert-danger1">';
			$user_id = $message['instructor_id'];
			$query3 = "SELECT * FROM users where type='Instructor' and user_id={$user_id}";
			$result3 = mysqli_query($connection, $query3);
			$row3 = mysqli_fetch_assoc($result3);
			echo '<i class="glyphicon glyphicon-user"></i> ' . $row3['fn'] . ' ' . $row3['ln'] . '<br>';
			echo $message['msg'];
			echo "<span class='small pull-right'>" . $message['date'] . "</span>";
		} else {
			echo '<div class="alert alert-danger2">';
			$user_id = $message['student_id'];
			$query3 = "SELECT * FROM users where type='Student' and user_id={$user_id}";
			$result3 = mysqli_query($connection, $query3);
			$row3 = mysqli_fetch_assoc($result3);
			
			echo '' . $row3['fn'] . ' ' . $row3['ln'] . ' <i class="glyphicon glyphicon-user"></i>  <br>';
			echo $message['msg'];
			echo "<span class='small pull-left'>" . $message['date'] . "</span>";
		}
		
		
		echo "</div>";
	}
?>