<?php 
	session_start();
	if(isset($_SESSION['student'])){
		session_destroy();
		echo "<script> location.href='index.html'</script>";
	}
	else{
		echo "<script> location.href='index.html'</script>";
	}
?>
