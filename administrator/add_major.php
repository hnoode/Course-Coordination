<?php
if(isset($_POST['createBtn']))
{
	$missing_input = array();
	
	
	if(!empty($_POST['name']))
		$name=$_POST['name'];
	else
		$missing_input[] = 'Enter Major Name';
	
	
	if(empty($missing_input))
	{
			
		$sql="INSERT INTO majors VALUES(NULL,'$name')";
		//echo $sql . "<br>";
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-info' style='max-width:460px; margin: 4px auto'>";
				echo 'New Major Created';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=majors"/>';
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
  <div class="panel panel-primary"  style="width:40%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Create New Major</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        
        
        <tr>
          <th>Major Name</th>
          <td><input type="text" class="form-control" name="name" id="name" placeholder="Enter Major Name"></td>
        </tr>
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <a href="index.php" class="btn btn-default btn-sm"> Cancel </a> <button type="submit" name="createBtn" class="send-btn btn btn-primary btn-sm"> <strong>Create Major</strong></button>
      </div>
   </div>
    </form>
