    <?php
		
		$major_id = $_SESSION['major_id'];
		
		
		$q = "select * from courses where major_id = {$major_id}";
		$res = mysqli_query($connection, $q);
		if(!$res) {
			echo "Query Failed 1<br>";
		} else {
			$no = mysqli_num_rows($res);
			
			$q5 = "select * from majors where major_id = {$major_id}";
			$res5 = mysqli_query($connection, $q5);
			$row5 = mysqli_fetch_array($res5);

			?>
      <h3>Filter Courses By Major : <?php echo $row5['name']?></h3><hr>
          	
            <?php
			if($no == 0) {
				echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
				echo "No Courses Yet<br>";
				echo "</div>";
			} else {
				echo " <table class='table table-striped' style='max-width:98%'>
      <tr>
       
        <th>Course Code</th>
        <th>Course Name</th>
		<th>Major</th>
		<th>Credit Hour</th>
        <th>Actions</th>
      </tr>";
				
				while($row = mysqli_fetch_array($res)) {
					
		?>
      <tr>
    
        <th><i class="glyphicon glyphicon-book"></i> <?php echo $row['code'] ?></th>
        <th> <?php echo $row['name']?></th>
        <th> 
		<?php  
			$major_id = $row['major_id'];
			$q2 = "select * from majors where major_id = {$major_id}";
			$res2 = mysqli_query($connection, $q2);
			$row2 = mysqli_fetch_array($res2);
			echo $row2['name'];
		?></th>
        <th> <?php echo $row['credit_hour'] ?> hours</th>
        <th> 
     	<a href='?p=course_details&course_id=<?php echo $row['course_id']?>' class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a></th>
      </tr>
    <?php 
			 }
			}
		}
	?>
    </table>
