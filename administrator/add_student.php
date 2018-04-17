<?php
if(isset($_POST['createBtn']))
{
	$missing_input = array();
	
	$major_id = $_POST['major_id'];
	
	if(!empty($_POST['fn'])){
		$fn=$_POST['fn'];
	} else
		$missing_input[] = 'Enter First Name';
	
	if(!empty($_POST['ln']))
		$ln=$_POST['ln'];
	else
		$missing_input[] = 'Enter Last Name ';
	
	
	if(empty($_POST['email'])) {
		$missing_input[] = "Enter Email";
	} else {
		$email = $_POST['email'];
		$ending = "@pnu.edu.sa";
		
		
		if( !is_numeric($email) ){
			$missing_input[] = "Your Email must be number";
		} else if(is_numeric($email)) {
			$first = substr($email, 0, 2);
			if($first != "43") {
				$missing_input[] = "Your Email must start with 43";
			} else {
				$email = $email . $ending;
			}
		}
		
	}	
	
	if(!empty($_POST['mobile'])) {
		$mobile=$_POST['mobile'];
		$saCode=$_POST['saCode'];
		if(!preg_match("/^[0-9]{8}$/", $mobile)) { 
			$missing_input[] =  "Your Mobile number must be 8 digits."; 
		} else {
			$mobile = $saCode . $mobile;
			//echo $mobile;
		}
	}
	else
		$mobile= NULL;
		
	
	if(!empty($_POST['username']))
		$username=$_POST['username'];
	else
		$username=$_POST['username'];
		$sqluser="SELECT username FROM users WHERE username='$username' ";
		$qresult=mysqli_query($connection,$sqluser);
		$count=mysqli_num_rows($qresult);
		if($count)
		{
			$missing_input[]=' username is already taken'; 
		}
		else if(empty($_POST['username'])){
			$username=$_POST['username'];
			$missing_input[]='Enter username';}
		
	if(!empty($_POST['password'])) {
		$password=$_POST['password'];
		
		if( !preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $password) ) {
			$missing_input[] = 'Your Password must has numbers and letters';
		}
	} else
		$missing_input[] = 'Enter Password';
	
	$active = 1;
	$online_now = 0;
	

	if(empty($missing_input))
	{
		//echo 90;
		$sql="INSERT INTO users VALUES(NULL,'$fn','$ln','$mobile',$major_id,'Student','$email','$username','$password',$online_now, $active)";
		//echo $sql . "<br>";
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-success' style='max-width:460px; margin: 4px auto'>";
				echo 'User Account Created';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php?p=filter_user_type&type=student"/>';
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
  <div class="panel panel-primary"  style="width:50%;margin:20px auto">
    
    	<div class="panel-heading">
        	<h5 align="center">Create New Account</h5>
        </div>
        <div class="panel-body">
    
      <table class="table table-conseded table-hover">
        
        <tr>
          <th>User Type</th>
          <td>
          
          
          <label>
                  <input name="type" type="radio" id="type_0" value="Student" checked="checked" />
                  Student</label>
          </td>
        </tr>
        <tr>
          <th>First Name *</th>
          <td><input type="text" class="form-control" pattern="[A-Za-z]*" name="fn" id="fn" maxlength="10" value="<?php if(isset($_POST['fn'])) echo $_POST['fn']; ?>" placeholder="Enter First Name">
          <p class="help-block">First Name must be letters</p>
          </td>
        </tr>
        <tr>
          <th>Last Name *</th>
          <td><input type="text" class="form-control" name="ln"  pattern="[A-Za-z]*"  id="ln" maxlength="10" placeholder="Enter Last Name" value="<?php if(isset($_POST['ln'])) echo $_POST['ln']; ?>" >
          <p class="help-block">Last Name must be letters</p></td>
        </tr>
        <tr>
          <th>Major *</th>
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
          <th>Mobile </th>
          <td>
          <input name="saCode" type="text" class="form-control" id="saCode" readonly value="05" style="width: 50px; float: left" >
          <input name="mobile" type="text" class="form-control" id="mobile"  value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>"  maxlength="8" placeholder="Enter Mobile" style="width: auto;" >
          <p class="help-block">Mobile must be digits</p></td>
          </td>
        </tr>
       
        <tr>
          <th>Email *</th>
          <td><input type="text" maxlength="9" class="form-control" name="email" id="email" placeholder="Enter Email" style="width: 190px; float: left"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" >
          <span class="col-md-6" style="padding-top: 7px;">@pnu.edu.sa</span>
          </td>
        </tr>
        <tr>
          <th>Username *</th>
          <td><input type="text" class="form-control" name="username"  pattern="[A-Za-z0-9._%+-]*"  id="username"  value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" maxlength="10" placeholder="Enter User Name">
          <p class="help-block">.....</p>
          </td>
        </tr>
        <tr>
          <th>Password *</th>
          <td><input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
          <p class="help-block">Password must contains letters and digits</p>
          </td>
        </tr>
      </table>
    </div> <!-- End Body -->
      <div class="panel-footer text-right">
      <button type="submit" name="createBtn" class="send-btn btn btn-primary btn-sm"> <strong>Create Account</strong></button>
      </div>
   </div>
    </form>
