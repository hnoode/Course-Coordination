    
    <?php
		$q = "select * from users where type='" . $_GET['type'] . "'";
		$res = mysqli_query($connection, $q);
		echo "<h3>System Users : " . $_GET['type'] . "</h3><hr>";
		if(!$res) {
			echo "Query Failed 1<br>";
		} else {
			$no = mysqli_num_rows($res);
			if($no == 0) {
				echo "No Users Yet<br>";
				echo "<a href='?p=add_user' class='btn btn-primary btn-sm'> + Add User</a>";
			} else {
				echo " <table class='table table-striped' style='max-width:98%'>
      <tr>
        <th>No#</th>
        <th>Full Name</th>
        <th>User Type</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Online</th>
		<th>Active / Not Active</th>
        <th>Actions</th>
      </tr>";
				if( $_GET['type'] == "student") {
					echo "<p><a href='?p=add_student' class='btn btn-primary btn-sm'> + Add User</a></p>";
				} else {
					echo "<p><a href='?p=add_user' class='btn btn-primary btn-sm'> + Add User</a></p>";
				}
				
				while($row = mysqli_fetch_array($res)) {
					
		?>
      <tr>
        <th><input type="checkbox" /></th>
        <th><i class="glyphicon glyphicon-user"></i> <?php echo $row['fn'] . " " . $row['ln'] ?></th>
        <th> <?php echo $row['type']?></th>
        <th> <?php echo $row['mobile']?></th>
        <th> <?php echo $row['email']?></th>
        <th> <?php if($row['online_now'] == 0) echo '<span class="label label-default">Not Online</span>'; else echo '<span class="label label-success">Online Now</span>';?></th>
        <th> <?php if($row['active'] == 0) echo '<span class="label label-warning">Not Active</span>'; else echo '<span class="label label-info">Active</span>';?></th>
        <th>
        <?php if($row['active'] == 1) { ?>
         		<a href='?p=toggle_user&user_id=<?php echo $row['user_id']?>' class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-remove"></i></a>
            <?php } else { ?>
            	<a href='?p=toggle_user&user_id=<?php echo $row['user_id']?>' class='btn btn-success btn-xs'><i class="glyphicon glyphicon-ok"></i></a>
             <?php } ?>
        </th>
      </tr>
    <?php 
			 }
			}
		}
	?>
    </table>
