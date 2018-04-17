<?php include("header.php"); ?>  
   <h2>Courses Ordered By Majors</h2>  
    <?php
		$q = "select * from courses order by major_id asc";
		$res = mysqli_query($connection, $q);
		if(!$res) {
			echo "Query Failed 1<br>";
		} else {
			
				echo " <table class='table table-striped' style='max-width:98%; background-color:#FFF'>
      <tr>
       
        <th>Course Code</th>
        <th>Course Name</th>
		<th>Major</th>
		<th>Credit Hour</th>
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
        
      </tr>
    <?php 
			 }
			
		}
	?>
    </table>

<?php include("footer.php"); ?> 
