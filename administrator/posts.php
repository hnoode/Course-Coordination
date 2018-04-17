<div role="tabpanel" class="tab-pane" id="Board">
                <h3> Posts </h3>
                
                <?php
					$q2 = "select * from posts where published=1";

					$res2 = mysqli_query($connection, $q2);
					
					$no2 = mysqli_num_rows($res2);
					if($no2 == 0) {
						echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
						echo "No Posts Published <br>";
						echo "</div>";
						
					} else {
						while($row2 = mysqli_fetch_array($res2)) {
				?>

                <div class="media">
                  <div class="media-left">
                    <a href="?p=post_details&post_id=<?php echo $row2["post_id"] ?>">
                      <img class="media-object" src="<?php echo $row2["image"] ?>" width="130" height="110"  alt="<?php echo $row2["name"] ?>">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">
                    	<a href="?p=post_details&post_id=<?php echo $row2["post_id"] ?>">
                    		<?php echo $row2["name"] ?>
                    	</a> 
                    <a class="btn btn-danger btn-sm pull-right" href="?p=delete_post&post_id=<?php echo $row2["post_id"] ?>">
                    <i class="glyphicon glyphicon-remove"></i> Delete</a> 
                    
                    </h4>
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