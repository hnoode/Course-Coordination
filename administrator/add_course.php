<?php
if(isset($_POST['createBtn']))
{
	$missing_input = array();
	
	$major_id = $_POST['major_id'];
	
	if(!empty($_POST['name']))
		$name=$_POST['name'];
	else
		$missing_input[] = 'Enter Course Name';
	
	if(!empty($_POST['code']))
		$code=$_POST['code'];
	else
		$missing_input[] = 'Enter Course code ';
	
	if(!empty($_POST['hour']))
		$hour=$_POST['hour'];
	else
		$missing_input[] = 'Enter Credit Hour';
		
	if(!empty($_POST['desc']))
		$desc=$_POST['desc'];
	else
		$missing_input[] = 'Enter Description';


	if(empty($missing_input))
	{
			
		$sql="INSERT INTO courses VALUES(NULL,'$code','$name',$major_id,$hour, '$desc')";
		
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
				echo 'Course Infromation Saved...';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=courses"/>';
				exit;
			}
		}
			
	} else {
		foreach($missing_input as $e) {
			echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
				echo $e;
			echo "</div>";
		}
	}
} 
?>


<form action="" method="post">
  <div class="panel panel-primary"  style="width:60%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Add New Course</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        
        <tr>
          <th>Major</th>
          <td><select name="major_id" class="form-control" >
            <?php
				$q2 = "SELECT * FROM majors";
				$res2 = mysqli_query($connection, $q2);
				
				while($row2 = mysqli_fetch_array($res2)) {
			?>
            <option value="<?php echo $row2['major_id'] ?>"><?php echo $row2['name']; ?></option>
            <?php
				}
			  ?>
          </select></td>
        </tr>
        <tr>
          <th>Course Name</th>
          <td><input type="text" class="form-control" name="name" id="name" placeholder="Enter Course Name"></td>
        </tr>
        <tr>
          <th>Course Code</th>
          <td><input type="text" class="form-control" name="code" id="code" placeholder="Enter Course Code"></td>
        </tr>
        <tr>
          <th>Credit Hour</th>
          <td><input name="hour" type="text" class="form-control" id="hour" maxlength="1" placeholder="Enter Credit Hour"></td>
        </tr>
        <tr>
          <th>Description</th>
          <td><textarea name="desc" class="form-control" id="desc" placeholder="Enter Description"></textarea></td>
        </tr>
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <a href="index.php" class="btn btn-default btn-sm"> Cancel </a> 
      <button type="submit" name="createBtn" class="send-btn btn btn-primary btn-sm"> <strong>Save Course</strong></button>
      </div>
   </div>
    </form>
