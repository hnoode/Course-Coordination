<?php
if(isset($_POST['updateBtn']))
{
	//echo 1323;
	$missing_input = array();
	
	$major_id = $_POST['major_id'];
	
	if(!empty($_POST['fn']))
		$fn=$_POST['fn'];
	else
		$missing_input[] = 'Enter First Name';
	
	if(!empty($_POST['ln']))
		$ln=$_POST['ln'];
	else
		$missing_input[] = 'Enter Last Name ';
	
		
	if(!empty($_POST['mobile']))
		$mobile=$_POST['mobile'];
	else
		$mobile= NULL;
		
	
	if(!empty($_POST['username']))
		$username=$_POST['username'];
	else
		$missing_input[] = 'Enter Username';
		
	

	if(empty($missing_input))
	{
		$user_id = $_SESSION['instructor_id'];
		$sql="Update users 
			SET 
				fn = '$fn',
				ln='$ln',
				major=$major_id,
				mobile='$mobile',
				username='$username'
			WHERE user_id = {$user_id}";
		//echo $sql . "<br>";
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
				echo 'User Account Information Updated';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php"/>';
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
<?php
	$user_id = $_SESSION['instructor_id'];
	$q = "select * from users where user_id={$user_id}";
	$res = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($res);
?>
<form action="" method="post">
  <div class="panel panel-primary"  style="width:50%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Update Profile</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        
        <tr>
          <th>First Name</th>
          <td><input type="text" class="form-control" name="fn" id="fn" value="<?php echo $row['fn'] ; ?>" placeholder="Enter First Name"></td>
        </tr>
        <tr>
          <th>Last Name</th>
          <td><input type="text" class="form-control" name="ln" id="ln" value="<?php echo $row['ln'] ; ?>" placeholder="Enter Last Name"></td>
        </tr>
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
          <th>Mobile</th>
          <td><input name="mobile" type="text" class="form-control"  value="<?php echo $row['mobile'] ; ?>" id="mobile" maxlength="10" placeholder="Enter Mobile"></td>
        </tr>
        <tr>
          <th>Username</th>
          <td><input type="text" class="form-control" name="username" id="username"  value="<?php echo $row['username'] ; ?>" placeholder="Enter User Name"></td>
        </tr>
        
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <a href="index.php" class="btn btn-default btn-sm"> Cancel </a> <button type="submit" name="updateBtn" class="send-btn btn btn-primary btn-sm"> <strong>Update </strong></button>
      </div>
   </div>
    </form>
