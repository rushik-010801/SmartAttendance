<?php 
  $uname=$_POST["tf1"]; 
  $pass=$_POST["tf2"]; 
  if($uname=="admin" AND $pass=="admin"){
    echo "<script>location.href='AdminAfterLogin.html'</script>";
  }
  else{
    echo "<script>alert('Incorrect credentials');</script>";
  }
 ?> 