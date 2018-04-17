<?php include("header.php") ?>

<?php


	if(isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = "main";
	}
	
	if($p == "main") {
		include("main.php");
	} else if($p == "posts") {
		include("posts.php");
	} else if($p == "add_post") {
		include("add_post.php");
	} else if($p == "post_details") {
		include("post_details.php");
	} else if($p == "courses") {
		include("courses.php");
	} else if($p == "add_course") {
		include("add_course.php");
	}  else if($p == "course_details") {
		include("course_details.php");
	}  else if($p == "filter_courses") {
		include("courses.php");
	} else if($p == "delete_post") {
		include("delete_post.php");
	} else if($p == "edit_profile") {
		include("edit_profile.php");
	} else if($p == "delete_comment") {
		include("delete_comment.php");
	} else if($p == "logout") {
		include("logout.php");
	} 
?>

<?php include("footer.php") ?>
