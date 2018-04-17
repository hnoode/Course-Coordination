    <h3>Majors </h3><hr>
    <?php
		$q = "select * from majors";
		$res = mysqli_query($connection, $q);
		if(!$res) {
			echo "Query Failed 1<br>";
		} else {
			$no = mysqli_num_rows($res);
			if($no == 0) {
				echo "No Majors Yet<br>";
				echo "<a href='?p=add_major' class='btn btn-primary btn-sm'> + Add Major</a>";
			} else {
				echo " <table class='table table-striped' style='max-width:48%'>
      <tr>
      
        <th>Major Name</th>
		<th>View Courses</th>
      </tr>";
				echo "<p><a href='?p=add_major' class='btn btn-primary btn-sm'> + Add Major</a></p>";
				while($row = mysqli_fetch_array($res)) {
					
		?>
      <tr>
        
        <th><i class="glyphicon glyphicon-book"></i> <?php echo $row['name'] ?></th>
        <th><a href='?p=filter_courses&major_id=<?php echo $row['major_id']?>' class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-book"></i></a></th>
      </tr>
    <?php 
			 }
			}
		}
	?>
    </table>
