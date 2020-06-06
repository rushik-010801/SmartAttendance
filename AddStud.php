<?php 
  
  $mysqli=new mysqli('localhost','root','','dbms_project'); 
  $a="INSERT INTO students  VALUES(?,?,?)";
  $sql=$mysqli->prepare($a); 
  $sql->bind_param("sss",$name,$id,$pass); 
  $name=$_POST["tf1"]; 
  $id=$_POST["tf2"];
  $pass=$_POST["tf3"];  
  $sql->execute(); 
  if($sql==TRUE){ 
    echo '<script type="text/javascript">';
    echo ' alert("Inserted the Applicant.")';
    echo '</script>';
    header( 'Location: add student.html' ); 

  } 
  else {
    echo "Not inserted".$sql->error;
    echo '<script type="text/javascript">';
    echo ' alert("Sorry for inconvience. \nPlease try again")';
    echo '</script>';
    header("Location: add student.html");
  }
   
  $sql->close(); 
  $mysqli->close(); 
 ?> 