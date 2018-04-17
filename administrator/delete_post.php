<?php
if(isset($_POST['confrimBtn'])) {
	$post_id = $_GET['post_id'];
	//$student_id = $_SESSION['student_id'];
	//$q = "delete from posts where post_id ={$post_id} and user_id ={$student_id}";
	$q = "delete from posts where post_id ={$post_id}";
	$res = mysqli_query($connection, $q);
	
	if($res) {
		echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
			echo 'Your Post Has Been Deleted';
		echo "</div>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?p=posts"/>';
		exit;
	}
}
	
?>


<div class="well" style="max-width: 500px; margin: 100px auto">
	<h1 align="center"><i class="glyphicon glyphicon-alert"></i></h1>
	<h3 align="center">  This post will be deleted.</</h3>
	<form method="post" class="text-center">
		<input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
		<a href="index.php?p=posts" class="btn btn-default btn-sm"> Cancel </a>
		<input type="submit" name="confrimBtn" value="Delete" class="btn btn-danger btn-sm">
		
	</form>
</div>