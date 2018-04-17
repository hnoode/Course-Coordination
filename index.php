
<html>
<?php include("header.php"); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">

    	<div class="col-md-4">
        	<div class="left text-center">
            	<!--<img src="images/norahlogo.jpg" class="img-rounded img-thumbnail" />-->
                <h3 style="color:#FFF"><span>C</span>ourse <span>C</span>oordination</h3>
                <h5>Welcome</h5>
                
                <?php 
					
					require("connection.php");
					session_start();
					if(!isset($_SESSION['try_to_login'])) {
						$_SESSION['try_to_login'] = 1;
					}
					
					if($_SESSION['try_to_login'] > 2) {
						$_SESSION['try_to_login'] = 0;
						$ok = 'Redirect To Forget Password Page!';
						echo "<div class='alert alert-warning' style='max-width:500px; margin: 4px auto'>";
							echo '<center><img src="images/loading-spinner.gif" /></center>';
							echo $ok;
						echo "</div>";			 
						 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=forget_pwd.php">';    
						 exit;
						
					}
				
					//echo $_SESSION['try_to_login'];
					if(isset($_POST['loginBtn']))
						
					{
						$arr = array();
						$user_type = $_POST['user_type'];
						
						if(empty($_POST['username']))
							$arr[] = 'Enter Username';
						else
							$username=$_POST['username'];
							
						if(!empty($_POST['password']))
							$password= $_POST['password'];
						else
							$arr[] = 'Enter Password';
							
						if(empty($arr))
						{
							
							if($user_type == 'admin') {
								++$_SESSION['try_to_login'];
								$sql="SELECT * FROM admin WHERE username='$username' and password='$password' and active=1 LIMIT 1";
								$result = mysqli_query($connection,$sql);
								$row = mysqli_fetch_array($result, MYSQLI_BOTH);
								$count = mysqli_num_rows($result);
								if($count==1)
								{
									//session_start();
									$_SESSION['admin_id'] = $row['admin_id'];
									$_SESSION['username'] = $row['username'];	
									unset($_SESSION['try_to_login']);
									$ok = 'Logged In Successfully!';
									echo "<div class='alert alert-success' style='max-width:500px; margin: 4px auto'>";
										echo '<center><img src="images/loading-spinner.gif" /></center>';
										echo $ok;
									echo "</div>";			 
									 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=administrator/index.php">';    
									 exit;
									
								} else if($count==0) {
									$err = 'Your Username/Password Are Invalid';
									echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
										echo $err;
									echo "</div>";
								}
							} else if($user_type == 'instructor') {
								++$_SESSION['try_to_login'];
								$sql="SELECT * FROM users WHERE username='$username' and password='$password' and type='Instructor'  and active=1 LIMIT 1";
								$result = mysqli_query($connection,$sql);
								$row = mysqli_fetch_array($result, MYSQLI_BOTH);
								$count = mysqli_num_rows($result);
								if($count==1)
								{
									
									//session_start();
									$user_id = $row['user_id'];
									$_SESSION['instructor_id'] = $user_id;
									$_SESSION['username'] = $row['username'];
									$_SESSION['major_id'] = $row['major'];
									unset($_SESSION['try_to_login']);
									
									
									$query2 = "update users set online_now = 1 where user_id = {$user_id} ";
									$result2 = mysqli_query($connection,$query2);
									
									$ok = 'Logged In Successfully!';
									echo "<div class='alert alert-success' style='max-width:500px; margin: 4px auto'>";
										echo $ok;
									echo "</div>";				 
									 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=instructor/index.php">';    
									 exit;
									
								} else if($count==0) {
									$err = 'Your Username/Password Are Invalid';
									echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
										echo $err;
									echo "</div>";
								}
							} else if($user_type == 'student') {
								++$_SESSION['try_to_login'];
								 $sql="SELECT * FROM users WHERE username='$username' and password='$password' and type='Student' and active=1 LIMIT 1";
								//echo $sql;
								$result = mysqli_query($connection,$sql);
								$row = mysqli_fetch_array($result, MYSQLI_BOTH);
								$count = mysqli_num_rows($result);
								if($count==1)
								{
									
									//session_start();
									$user_id = $row['user_id'];
									$_SESSION['student_id'] = $user_id;
									$_SESSION['username'] = $row['username'];
									$_SESSION['major_id'] = $row['major'];
									unset($_SESSION['try_to_login']);
									
									
									$query2 = "update users set online_now = 1 where user_id = {$user_id} ";
									$result2 = mysqli_query($connection,$query2);
									
									$ok = 'Logged In Successfully!';
									echo "<div class='alert alert-success' style='max-width:500px; margin: 4px auto'>";
										echo $ok;
									echo "</div>";				 
									 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=student/index.php">';    
									 exit;
									
								} else if($count==0) {
									$err = 'Your Username/Password Are Invalid';
									echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
										echo $err;
									echo "</div>";
								}
							} 
						} else {
							foreach($arr as $e) {
								echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
									echo $e;
								echo "</div>";
							}
						}
					} 
					
					?>	
                
                <form method="post">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-cog"></i></span>
                  <select class="form-control" name="user_type">
                  	   <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                 <option value="admin">Admin</option>
                  </select>
                </div>
                <hr>
                <div class="input-group2 text-right" style="overflow:hidden">
                  
					<a href="forget_pwd.php" class="btn btn-success pull-left">Forget Password </a>
                  <input type="submit" name="loginBtn" class="btn btn-default pull-right" value="Login Now!">
                </div>
                
                </form>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="well info" style="opacity:.8">
            	<h2 style="color:#000;">Course Coordination web portal</h2>
                <p class="lead">course coordination web portal, is a website that serves and directs faculty members and students in PNU to achieving an effective coordination inside the educational communities.
The website allows the students and faculty members from PNU especially in computer science and medicines colleges to enroll and benefit from each other by sharing experiences, ideas, advices, case studies especially in pharmacies and other health fields.</p>
            </div>
        </div>

<?php include("footer.php") ?>
</html>