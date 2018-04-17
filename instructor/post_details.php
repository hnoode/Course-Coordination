<a href="index.php?p=course_details&course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-default btn-xs"> Back </a> 
<?php
	$post_id = $_GET['post_id'];
	$q = "select * from posts where post_id ={$post_id} order by post_id desc";
	$res = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($res);
?>
<h2><?php echo $row["name"] ?> <span class="pull-right">
                        <span class="label label-info"> <i class="glyphicon glyphicon-calendar"></i> <?php echo $row['publish_date'] ?> </span>
                    </span></h2>
<img class="media-object" src="<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>" width="180" height="150">
<blockquote class="lead"><?php echo $row["desc"] ?></blockquote>
<h4>Post File</h4>
<a href="<?php echo $row["file"] ?>" title="<?php echo $row["name"] ?>" target="_blank"> <i class="glyphicon glyphicon-save"></i> Download </a>
<hr>
<?php
	
	$course_id = $_GET['post_id'];
	$q2 = "select * from comments where post_id ={$post_id}";
	//echo $q2. "<br>";
	$res2 = mysqli_query($connection, $q2);
	$no = mysqli_num_rows($res2);
	if($no != 0) {
		while($row2 = mysqli_fetch_array($res2)) {
			$q3  = "select * from users where user_id = " . $row2['user_id'] . " ";
			$res3 = mysqli_query($connection, $q3);
			$row3 = mysqli_fetch_array($res3);
?>
<br>
	<div class="well" style="font-size: 14px">
		<blockquote ><i class="glyphicon glyphicon-pencil"></i>  <?php echo $row2['comment'] ?>
		<hr>
		<div class="pull-left" style="font-size: 12px;">
			<i class=" glyphicon glyphicon-user"></i>  <?php echo $row3['fn'] . " " . $row3['ln']  ?>
		</div>
		<div class="pull-right" style="font-size: 12px;">
			<i class="glyphicon glyphicon-calendar"></i>  <?php echo $row2['created_date'] ?>
			<?php
				if($_SESSION['instructor_id'] == $row2['user_id'])	{
				?>
				<a href="?p=delete_comment&post_id=<?php echo $row2['post_id'] ?>&comment_id=<?php echo $row2['comment_id'] ?>" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-remove"> </i> Delete My Comment</a>
				<?php
				}
			?>
		</div>
</blockquote>
	</div>
<?php
		}
	}
?>
<hr>
<?php
	if(isset($_POST['submit'])) {
		if(empty($_POST['comment'])) {
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?p=post_details&post_id=' . $post_id . '"/>';
			exit;
		}
		$comment = $_POST['comment'];
		$user_id = $_SESSION['instructor_id'];
		
		$q4 = "insert into comments values(NULL, '$comment', $user_id, $post_id, NOW())";
		$res4 = mysqli_query($connection, $q4);
		if($res4) {
			echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?p=post_details&post_id=' . $post_id . '"/>';
			exit;
		}
	}
?>
<form action="" method="post">
<div class="well" style="height: 120px">
	<div class="col-md-10">
		<textarea name="comment" rows="4" autofocus placeholder="Enter Your Comment" class="form-control"></textarea>
	</div>
	<div class="col-md-2">
		<a href="index.php" class="btn btn-default btn-sm"> Cancel </a>  <input type="submit" name="submit" class="btn btn-primary btn-sm">
	</div>
</div>
</form>
