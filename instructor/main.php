<div class=" col-md-12" style="background-color:#FFF">
<h2><i class="glyphicon glyphicon-education"></i> <?php echo $_SESSION['username'] ?>, You Are Logged In As Instructor.</h2>
<h3><span class="label label-success"> <i class="glyphicon glyphicon-ok-circle"></i> You are Online Now.</span>
</h3></div>
<?php
	$user_id = $_SESSION['instructor_id'];
	$q = "select * from users where user_id={$user_id}";
	$res = mysqli_query($connection, $q);
	if(!$res) {
		echo "Query Failed 1<br>";
	} else {
		$row = mysqli_fetch_array($res);
		?>
		<p></p>
	  <table class='table table-striped' style='max-width:48%; margin-top: 30px'>
		  <tr class="active">
			<th colspan="2">Personal Information 
				<a href="?p=edit_profile" title="Edit Profile" class="pull-right">
					<i class="glyphicon glyphicon-edit"></i>
				</a>
			</th>
		  </tr>
		  <tr>
			<th width="140">Full Name</th>
			<td><?php echo $row['fn'] . ' ' . $row['ln']; ?></td>
		  </tr>
		  <tr>
			<th width="140">Major</th>
			<td><?php 
					$id = $row['major']; 
					$q2 = "select * from majors where major_id={$id}";
					$res2 = mysqli_query($connection, $q2);
					$row2 = mysqli_fetch_array($res2);
					echo $row2['name'];
				?>
			</td>
		  </tr>
		 
		  <tr>
			<th width="140">Mobile</th>
			<td><?php echo $row['mobile']; ?></td>
		  </tr>
		  <tr>
			<th width="140">Email</th>
			<td><?php echo $row['email']; ?></td>
		  </tr>
		  <tr>
			<th width="140">User Name</th>
			<td><?php echo $row['username']; ?></td>
		  </tr>
		  
	</table>
<?php
	}
?>
