 <?php
 	include("../connection.php");
	/*if(isset($_POST['sendMsg'])) {
		if(empty($_POST['msgs'])) { echo "empty"; }
		$msgs = mysqli_real_escape_string($connection, $_POST['msgs']);
		
		$instructor_id = $_SESSION['instructor_id'];
		
		$user_type = "instructor";
		
		$query1 = "INSERT INTO chat VALUES (NULL, $course_id,$instructor_id, NULL,'$user_type' ,'$msgs', NOW())";
		$result1 = mysqli_query($connection, $query1);
		echo $query1;
		if($result1) {
			echo "sent";
		} else {
			echo "error while sent";
		}
	}*/
	session_start();
	$msgs = mysqli_real_escape_string($connection, $_POST['msg']);
	$course_id = mysqli_real_escape_string($connection, $_POST['course_id']);
	$instructor_id = $_SESSION['instructor_id'];
	
	$user_type = "instructor";
	
	$query1 = "INSERT INTO chat VALUES (NULL, $course_id,$instructor_id, NULL,'$user_type' ,'$msgs', NOW())";
	$result1 = mysqli_query($connection, $query1);
	//echo $query1;
	if($result1) {
		echo "sent";
	} else {
		echo "error while sent";
	}
 ?>