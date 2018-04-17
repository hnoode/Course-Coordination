<?php ob_start(); ?><?php
	include("header.php");
?>


<?php
	if(isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = "main";
	}
	
	if($p == "main") {
		include("main.php");
	} else if($p == "users") {
		include("users.php");
	} else if($p == "add_user") {
		include("add_user.php");
	} else if($p == "add_student") {
		include("add_student.php");
	} else if($p == "toggle_user") {
		include("toggle_user.php");
	} else if($p == "majors") {
		include("majors.php");
	} else if($p == "add_major") {
		include("add_major.php");
	} else if($p == "courses") {
		include("courses.php");
	} else if($p == "add_course") {
		include("add_course.php");
	}  else if($p == "course_details") {
		include("course_details.php");
	}  else if($p == "filter_courses") {
		include("filter_courses.php");
	} else if($p == "filter_user_type") {
		include("filter_user_type.php");
	} else if($p == "posts") {
		include("posts.php");
	}else if($p == "post_details") {
		include("post_details.php");
	}else if($p == "delete_post") {
		include("delete_post.php");
	} else if($p == "logout") {
		include("logout.php");
	} 
?>

<?php
	include("footer.php");
?>