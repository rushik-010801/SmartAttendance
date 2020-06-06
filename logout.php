<?php 
	session_start();
	if(isset($_SESSION['variable'])){
		session_destroy();
		echo "<script> location.href='index.html'</script>";
	}
	
?>
