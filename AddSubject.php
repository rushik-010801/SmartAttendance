<?php 
  $subname=$_POST['tf1'];
  $uname=$_POST['tf2'];
  $stud=$_POST['tf3'];
  $mysqli=new mysqli('localhost','root','','dbms_project'); 
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  $flag=0;
  $sql1=$mysqli->query("SELECT username FROM teachers WHERE username='$uname'"); 
  $sql2=$mysqli->query("SELECT username FROM students WHERE username='$stud'"); 
  while($obj=$sql1->fetch_Object()){
    if($obj->username==$uname){
      while($obj=$sql2->fetch_Object()){
        if($obj->username==$stud){
            $q=$mysqli->query("SELECT name,Teacher FROM subjects");
            while($row = $q->fetch_array())
            {
              if($row[0]==$subname){
                $flag=1;
                break;
              }
              }
            if($flag==1){
            $a="INSERT INTO ".$subname."(Teacher,student)  VALUES(?,?)";
            $sql=$mysqli->prepare($a); 
            $sql->bind_param("ss",$id,$pass); 
            $id=$_POST["tf2"];
            $pass=$_POST["tf3"];  
            $sql->execute(); 
            if($sql==TRUE){ 
              echo '<script type="text/javascript">';
              echo ' alert("Inserted the Subject.")';
              echo '</script>';
              header( 'Location: addsubject.html' ); 

            } 
            else {
              echo "Not inserted".$sql->error;
              echo '<script type="text/javascript">';
              echo ' alert("Sorry for inconvience. \nPlease try again")';
              echo '</script>';
              header("Location: addsubject.html");
            }
          }
          else{
            $q3=$mysqli->query("INSERT INTO subjects VALUES('".$_POST['tf1']."','".$_POST['tf2']."')");
            $q2=$mysqli->query("CREATE TABLE ".$subname."(Teacher varchar(15),student varchar(15),NoofLect int default 0,Attended int default 0,percentage double default (Attended*100/NoofLect))");
            if($q2==TRUE){
              $b="INSERT INTO ".$subname."(Teacher,student)  VALUES(?,?)";
              $sql3=$mysqli->prepare($b); 
              $sql3->bind_param("ss",$id,$pass); 
              $id=$_POST["tf2"];
              $pass=$_POST["tf3"];  
              $sql3->execute(); 
              if($sql3==TRUE){ 
                echo '<script type="text/javascript">';
                echo ' alert("Inserted the Subject.")';
                echo '</script>';
                header( 'Location: addsubject.html' ); 
             }
           }
             else{
              echo "Not inserted".$sql->error;
              echo '<script type="text/javascript">';
              echo ' alert("Sorry for inconvience. \nPlease try again")';
              echo '</script>';
              header("Location: addsubject.html");
          }
        }
             
             
          }
          else{
            echo '<script type="text/javascript">';
              echo ' alert("No student with this name")';
              echo '</script>';
          }
        }
      }
      else{
          echo '<script type="text/javascript">';
              echo ' alert("No Teacher with this name")';
              echo '</script>';
        }
    }
    $sql->close();
    $sql3->close();
  $mysqli->close(); 

 ?> 