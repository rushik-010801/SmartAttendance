<?php 
  $uname=$_POST["tf1"]; 
  $pass=$_POST["tf2"]; 
  $mysqli=new mysqli('localhost','root','','dbms_project'); 
  $sql=$mysqli->query("SELECT username,password FROM teachers WHERE username='$uname'"); 

  session_start();

  if(isset($_SESSION['variable'])){
    echo "<script>location.href='TeacherAfterLogin.php'</script>";
    
  }
  else{
  while($obj=$sql->fetch_Object()){
    if($obj->username==$uname AND $obj->password==$pass){
      $_SESSION['variable']=$uname;
      echo "<script>location.href='TeacherAfterLogin.php'</script>";
    }
    else {
      echo " <script>alert('username or password is incorrect.')</script>";
      header( 'Location: TeacherLog.html' ); 
    }
  }
}
  $mysqli->close(); 
  
 ?> 