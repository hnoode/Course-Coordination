
<?php
	$post_id = $_GET['post_id'];
	$q = "select * from posts where post_id ={$post_id} order by post_id desc";
	$res = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($res);
?>
<h3><?php echo $row["name"] ?> <span class="pull-right" style="font-size: 18px;">
                        <span class="label label-info"> <i class="glyphicon glyphicon-calendar"></i> <?php echo $row['publish_date'] ?> </span>
                    </span></h3>
<img class="media-object" src="<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>" width="180" height="150">
<blockquote class="lead"><?php echo $row["desc"] ?></blockquote>
<hr>
<h4>Post File</h4>
<a href="<?php echo $row["file"] ?>" title="<?php echo $row["name"] ?>" target="_blank"> <i class="glyphicon glyphicon-save"></i> Download </a>
<hr>

