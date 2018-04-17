<?php include("header.php"); ?>
<?php
if(isset($_POST['forgetBtn']))
{
	$missing_input = array();
	
	
	
	if(empty($_POST['email'])) {
		$missing_input[] = "Enter Your Email";
	} else {
		$email = $_POST['email'];
		$ending = "@pnu.edu.sa";
		$len = strlen($ending);
		$string = $email;
		$string_end = substr($string, strlen($string) - $len);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$missing_input[] = "Your Email is Invaled";
		} else if ($string_end != $ending) {
			$missing_input[] = "Your Email msut end with @pnu.edu.sa";
		} else {
			$email = $_POST['email'];
			
			$query = "select email, password from users where email='$email'";
			$result= mysqli_query($connection,$query);
			$no = mysqli_num_rows($result);
			$pass_row = mysqli_fetch_assoc($result);
			
			$return_pwd = $pass_row['password'];
			
			if($no == 0){
				$missing_input[] = "Your Email not registered with website";
			} 
		}
	}	
	
	if(empty($missing_input))
	{
		
		$msg = "Your Password: <strong> $return_pwd </strong>";
		if(mail($email,"Forget Password",$msg)) {
		
			echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
				echo 'User Password Sent to his/her Email';
			echo "</div>";
			
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php"/>';
			exit;
			
		} else {
			echo "<div class='alert alert-danger' style='max-width:460px; margin: 4px auto'>";
				echo 'There is problem while send email';
			echo "</div>";
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
  <div class="panel panel-primary"  style="width:50%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Forget password</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        
        <tr>
          <th>Email</th>
          <td><input type="email" class="form-control" name="email" id="email" placeholder="Enter Email end with @pnu.edu.sa" >
          </td>
        </tr>
        
        
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <button type="submit" name="forgetBtn" class="send-btn btn btn-primary btn-sm"> <strong> Send Password</strong></button>
      </div>
   </div>
    </form>


<?php include("footer.php"); ?>