<?php
if(isset($_POST['confrimBtn'])) {
	$post_id = $_GET['post_id'];
	$comment_id = $_GET['comment_id'];
	$instructor_id = $_SESSION['instructor_id'];
	$q = "delete from comments where comment_id ={$comment_id} and user_id ={$instructor_id} and post_id={$post_id}";
	$res = mysqli_query($connection, $q);
	
	if($res) {
		echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
			echo 'Your Comment Has Been Deleted';
		echo "</div>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?p=post_details&post_id=' . $post_id . '"/>';
		exit;
	}
}
?>



<div class="well" style="max-width: 500px; margin: 100px auto">
	<h1 align="center"><i class="glyphicon glyphicon-alert"></i></h1>
	<h3 align="center">  This comment will be deleted.</h3>
	<form method="post" class="text-center">
		<input type="hidden" name="comment_id" value="<?php echo $_GET['comment_id'] ?>">
		<a href="index.php?p=post_details&post_id=<?php echo $_GET['post_id'] ?>" class="btn btn-default btn-sm"> Cancel </a>
		<input type="submit" name="confrimBtn" value="Delete" class="btn btn-danger btn-sm">
		
	</form>
</div>