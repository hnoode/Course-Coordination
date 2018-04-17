<script type="text/javascript" src="../js/jquery.min.js"></script>
<?php include("header.php"); ?>  
<?php
	
	$course_id = $_GET['course_id'];
	$q = "select * from courses where course_id ={$course_id}";
	$res = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($res);
?>

<div class="col-md-12" style="background-color:#FFF; padding:10px;">
    <div class="well">
        <img class="pull-left img-responsive" src="images/book logo.png" style="height:65px; margin:5px;"/>
        <h3>Course Details : <small><?php echo $row['name'] ?></small></h3>
       
    </div>
    <hr>
        <div>
        
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Details" aria-controls="Details" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#Board" aria-controls="Board" role="tab" data-toggle="tab">Board</a></li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="Details">
                
                <h3><?php echo $row['name'] ?></h3>
                <?php  
					$major_id = $row['major_id'];
					$q2 = "select * from majors where major_id = {$major_id}";
					$res2 = mysqli_query($connection, $q2);
					$row2 = mysqli_fetch_array($res2);
				?>
                <ul>
                	<li><strong>Major: </strong> <?php echo $row2['name'] ?></li>
                    <li><strong>Course Code: </strong> <?php echo $row['code'] ?></li>
                    <li><strong>Credit Hours: </strong> <?php echo $row['credit_hour'] ?> Hours</li>
                    <li><strong>Description: </strong> <?php echo $row['desc'] ?></li>
                </ul>
            
            </div>
            <div role="tabpanel" class="tab-pane" id="Board">
                <h3>  Borad & Posts </h3>
                
                <?php
					$course_id = $_GET['course_id'];
					$q2 = "select * from posts where course_id ={$course_id} and published=1";
					$res2 = mysqli_query($connection, $q2);
					
					$no2 = mysqli_num_rows($res2);
					if($no2 == 0) {
						echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
						echo "No Posts Published Belong To This Course<br>";
						echo "</div>";
						
					} else {
						while($row2 = mysqli_fetch_array($res2)) {
				?>

                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="<?php echo $row2["image"] ?>" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $row2["name"] ?></h4>
                    <p><?php echo $row2["desc"] ?></p>
                    <hr>
                    <span class="pull-left">
                    	<?php
							$user_id = $row2['instructor_id'];
							$q3 = "select * from users where user_id = {$user_id}";
							$res3 = mysqli_query($connection, $q3);
							$row3 = mysqli_fetch_array($res3);
						?>
                    	<span class="label label-info"> <i class="glyphicon glyphicon-user"></i> Dr. <?php echo $row3['fn'] . ' ' . $row3['ln'] ;?> </span> 
                        
                    </span>
                    <span class="pull-right">
                        <span class="label label-info"> <i class="glyphicon glyphicon-calendar"></i> <?php echo $row2['publish_date'] ?> </span>
                    </span>
                  </div>
                </div>
                
                
                <?php
						}
					}
				?>                
            </div>
            
          </div>
        
        </div>

</div>
 


<?php include("footer.php"); ?>  