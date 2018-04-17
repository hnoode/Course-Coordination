<script type="text/javascript" src="../js/jquery.min.js"></script>
<?php
	
	$course_id = $_GET['course_id'];
	$q = "select * from courses where course_id ={$course_id}";
	$res = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($res);
?>

<div class="col-md-12" style="background-color:#FFF; padding:10px;">
    <div class="well">
        <img class="pull-left img-responsive" src="../images/book logo.png" style="height:65px; margin:5px;"/>
        <h3>Course Details : <small><?php echo $row['name'] ?></small></h3>
       
    </div>
    <hr>
        <div>
        
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Details" aria-controls="Details" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#Board" aria-controls="Board" role="tab" data-toggle="tab">Board</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Live Chat</a></li>
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
                <h3>  Borad & Posts <a href="?p=add_post&course_id=<?php echo $course_id ?>" class="btn btn-primary pull-right">Add Post</a></h3>
                
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
                    <a href="?p=post_details&post_id=<?php echo $row2["post_id"] ?>&course_id=<?php echo $row2["course_id"] ?>">
                      <img class="media-object" src="<?php echo $row2["image"] ?>" alt="..." width="120" height="120">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="?p=post_details&post_id=<?php echo $row2["post_id"] ?>&course_id=<?php echo $row2["course_id"] ?>"><?php echo $row2["name"] ?></a></h4>
                    <p><?php echo $row2["desc"] ?></p>
                    <hr>
                    <span class="pull-left">
                    	<?php
							$user_id = $row2['user_id'];
							$q3 = "select * from users where user_id = {$user_id}";
							$res3 = mysqli_query($connection, $q3);
							$row3 = mysqli_fetch_array($res3);
						?>
                    	<span class="label label-info"> <i class="glyphicon glyphicon-user"></i> 
						<?php
							if($row3['type'] == 'Instructor') echo 'Dr. ';
						?>	
                       <?php echo $row3['fn'] . ' ' . $row3['ln'] ;?> </span> 
                        
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
            <div role="tabpanel" class="tab-pane" id="messages">
              <h3>Live Chat</h3>
              <?php
				$course_id = $_GET['course_id'];
				
			  ?>
                <div class="col-md-push-4 col-md-4">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <strong>Course Chatting</strong>
                      </div>
                    <div class="panel-body " id="chat_box" style="max-height: 340px; overflow: scroll; padding-right:20px;">
                    
                     
                      
                       
                      </div>
                      <div class="panel-footer">
                      	 <div class="input-group">
                       
                         <form method="post">
                         <div class="input-group">
                          <textarea class="form-control" autofocus placeholder="Type Here..." name="msgs" id="msgs" aria-describedby="sendMsg" style="width: 273px;height: 70px;"></textarea>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button" name="sendMsg" id="sendMsg" style="height: 70px;"><h3><i class="glyphicon glyphicon-comment"></i></h3></button>
                          </span>
                        </div>
                        	<input type="hidden" class="form-control" name="course_id" id="main_course_id" value="<?php echo $course_id ?>" />
                         </form>
                         
                         
                        </div>
                      </div>
                    </div>
                </div>
            
            </div>
          </div>
        
        </div>

</div>
 
<script>
$(document).ready(function() {
	
	var course_id = document.getElementById("main_course_id").value;
	var interval = setInterval(function() {
		
		//alert(course_id);
		var c = 'get_chat.php?course_id=' + course_id;
		//alert(c);
		$.ajax({
			url : 'get_chat.php?course_id=' + course_id,
			success: function(data) {
				$("#chat_box").html(data);
			}
		});
	}, 500);
	
	$("#sendMsg").click(function() {
		var msg = $("#msgs").val();
		if(msg == "") {
			$("#msgs").focus();
		} else {
			var dataString = "msg=" + msg +"&course_id=" + course_id;
			//alert(dataString);
			$.ajax({
				type: "POST",
				data: dataString,
				url : 'add_chat.php',
				success: function(data) {
					$("#msgs").val('');
					$("#msgs").focus();
				}
			});
		}
	});
});
</script>