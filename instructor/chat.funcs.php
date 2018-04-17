<?php
	include("../connection.php");
	
	function get_msg($course_id) {
		$course_id = $course_id;
	//	echo "<h1>$course_id</h1>";
		$query2 = "SELECT * FROM chat where course_id = {$course_id} order by chat_id desc";
		echo $query2;
		$result2 = mysqli_query($connection, $query2) or die("Stopppppp");
		$num = mysqli_num_rows($result2);
		echo $num;
		
		if($num == 0) {
			return 0;
			
		} else {
		
			while($message = mysqli_fetch_assoc($result2)) {
				$messages[] = array('chat_id'=>$message['chat_id'],
									'course_id'=>$message['course_id'],
									'instructor_id'=>$message['instructor_id'],
									'student_id'=>$message['student_id'],
									'user_type'=>$message['user_type'],
									'msg'=>$message['msg'],
									'date'=>$message['date']);
			}
			
			return $messages;
		}
		
	}
	
	function get_public_room_msg() {
		$query2 = "SELECT * FROM chat order by chat_id desc";
		
		$result2 = mysqli_query($connection, $query2);
		while($message = mysqli_fetch_assoc($result2)) {
			$messages[] = array('chat_id'=>$message['chat_id'],
								'course_id'=>$message['course_id'],
								'instructor_id'=>$message['instructor_id'],
								'student_id'=>$message['student_id'],
								'user_type'=>$message['user_type'],
								'msg'=>$message['msg'],
								'date'=>$message['date']);
		}
		
		return $messages;
	}
	
	function send_msg($course_id,$instructor_id, $student_id, $user_type, $mssage) {
		if(!empty($course_id) and !empty($student_id) and !empty($user_type)  and !empty($mssage)) {
			$admin_id = mysqli_real_escape_string($connection, $instructor_id);
			$room_id = mysqli_real_escape_string($connection, $course_id);
			$sender = mysqli_real_escape_string($connection, $student_id);
			$mssage = mysqli_real_escape_string($connection, $mssage);
			$user_type = mysqli_real_escape_string($connection, $user_type);
			
			$query1 = "INSERT INTO chat VALUES (NULL, $course_id,$instructor_id, $student_id,'$user_type' ,'$mssage', NOW())";
			$result1 = mysqli_query($connection, $query1);
			if($result1) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
?>