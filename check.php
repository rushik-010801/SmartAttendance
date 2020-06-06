
<?php 
    
    $today = strval(date("dmY"));
    $mysqli=new mysqli('localhost','root','','dbms_project');   
    session_start();
      $uname=$_SESSION['variable'];  
      $table=$_SESSION['table'];
      $a="UPDATE ".$table." set NoofLect=NoofLect+1 where Teacher='".$uname."'";
      $sql=$mysqli->query($a); 
      if($sql==TRUE){
          foreach($_POST['check_list'] as $selected) 
          {
            $q=$mysqli->query("UPDATE ".$table." set Attended=Attended+1 where Teacher='".$uname."' AND student='".$selected."'");
                  
        }
        $q23=$mysqli->query("UPDATE ".$table." set percentage=(Attended*100/NoofLect)");
        echo "<script>location.href='TeacherAfterLogin.php'</script>";
  }
  else {
        echo $table;
        echo $today;
              echo "Not inserted".$sql->error;
              echo '<script type="text/javascript">';
              echo ' alert("Sorry for inconvience. \nPlease try again")';
              echo '</script>';
            }
    

  $mysqli->close();  
    ?>