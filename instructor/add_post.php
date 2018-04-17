<a href="index.php?p=course_details&course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-default btn-xs"> Back </a> 
<?php
if(isset($_POST['createBtn']))
{
	$missing_input = array();
		
	if(!empty($_POST['title']))
		$title=$_POST['title'];
	else
		$missing_input[] = 'Enter Post Title';
	
	if(!empty($_POST['desc']))
		$desc=$_POST['desc'];
	else
		$missing_input[] = 'Enter Post Description';
	
	
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

	
	$file_name1 = $_FILES['file']['name'];
	$file_size1 =$_FILES['file']['size'];
	$file_tmp1 =$_FILES['file']['tmp_name'];
	$file_type1 =$_FILES['file']['type'];

     
      
      if($file_size > 2097152){
         $missing_input[]='The Post image must be less that 2MB';
      } 
	
	if($file_size1 > 2097152){
	 $missing_input[]='The Post file must be less that 2MB';
	} 
	
	
	if($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE){
		 $target = "../posts/default.png";
		$check_upload = true;
	  } else {
		 $target = "../posts/". rand()*78789685 .  $file_name;
		$check_upload = move_uploaded_file($file_tmp,$target);
	}
		
	
	if($_FILES['file']['error'] == UPLOAD_ERR_NO_FILE){
		 $target1 = NULL;
		$check_upload1 = true;
	  } else {
		 $target1 = "../posts/". rand()*78789685 .  $file_name1;
		$check_upload1 = move_uploaded_file($file_tmp1,$target1);
	}
     
      
	$user_id = $_SESSION['instructor_id'];
	$course_id = $_GET['course_id'];
	
	
	if(empty($missing_input) and $check_upload and $check_upload1 )
	{
			
		$sql="INSERT INTO posts VALUES(NULL,'$title', '$desc', '$target', '$target1', $user_id, $course_id, NOW(), 1)";
		//echo $sql . "<br>";
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
				echo 'Your Post Published';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=posts"/>';
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


<form action="" method="post" enctype="multipart/form-data">
  <div class="panel panel-primary"  style="width:50%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Add New Post</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        <tr>
          <th>Post Title</th>
          <td><input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title"></td>
          
        </tr>
        <tr>
          <th>Post Description</th>
          <td><textarea name="desc"  class="form-control" placeholder="Enter Post Description" rows="6" ></textarea></td>
        </tr>
        <tr>
          <th>Post Image</th>
          <td><input type="file" class="form-control" name="image" id="image" ></td>
        </tr>
        <tr>
          <th>Post File</th>
          <td><input type="file" class="form-control" name="file" id="file" ></td>
        </tr>
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <a href="index.php" class="btn btn-default btn-sm"> Cancel </a> <button type="submit" name="createBtn" class="send-btn btn btn-primary btn-sm"> <strong>Create Post</strong></button>
      </div>
   </div>
    </form>