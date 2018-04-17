<div class=" col-md-12" style="background-color:#FFF">
<h3>System Statistics </h3>
<div class="col-md-3">
    <div class="panel panel-primary">
       <?php
		$q = "select * from users where type='instructor'";
		$res = mysqli_query($connection, $q);
		$no = mysqli_num_rows($res);
		
		?>
        <div class="panel-heading">
            <h3><i class="glyphicon glyphicon-user"></i> <?php echo $no; ?> Instructors</h3>
        </div>
        <div class="panel-body text-center">
            <a href="?p=filter_user_type&type=instructor" class="btn btn-default"> View Details </a>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
       <?php
		$q = "select * from users where type='student'";
		$res = mysqli_query($connection, $q);
		$no = mysqli_num_rows($res);
		
		?>
        <div class="panel-heading">
            <h3><i class="glyphicon glyphicon-user"></i> <?php echo $no; ?> Students</h3>
        </div>
        <div class="panel-body text-center">
            <a href="?p=filter_user_type&type=student" class="btn btn-default"> View Details </a>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
       <?php
		$q = "select * from courses ";
		$res = mysqli_query($connection, $q);
		$no = mysqli_num_rows($res);
		
		?>
        <div class="panel-heading">
            <h3><i class="glyphicon glyphicon-book"></i> &nbsp;  <?php echo $no; ?> Courses</h3>
        </div>
        <div class="panel-body text-center">
            <a href="?p=courses" class="btn btn-default"> View Details </a>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
       <?php
		$q = "select * from posts ";
		$res = mysqli_query($connection, $q);
		$no = mysqli_num_rows($res);
		
		?>
        <div class="panel-heading">
            <h3><i class="glyphicon glyphicon-pencil"></i> <?php echo $no; ?> Posts</h3>
        </div>
        <div class="panel-body text-center">
            <a href="?p=posts" class="btn btn-default"> View Details </a>
        </div>
    </div>
</div>
</div>