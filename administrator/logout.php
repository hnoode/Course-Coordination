<p>Logging Out...</p>
<?php
	session_start();
	unset($_SESSION['admin_id']);
	unset($_SESSION['username']);		
	echo '<META HTTP-EQUIV="Refresh" Content="1; URL=../index.php"/>';
	exit;
?>