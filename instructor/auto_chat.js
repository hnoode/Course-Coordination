$(document).ready(function() {
	
	var interval = setInterval(function() {
		var course_id = document.getElementById("course_id").value;
		alert(34);
		$.ajax({
			url : 'get_chat.php?course_id=' + course_id,
			success: function(data) {
				$("#chat_box").html(data);
			}
		});
	}, 500);
});