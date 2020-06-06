<!DOCTYPE html>
<html>
<head><title>Teacher page</title>';
  <style>
    html, body {
    width: 100%;
    height: 100%;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
     background: linear-gradient(45deg, #49a09d, #5f2c82); 
  }

input[type=submit] 
   { background-color: #4CAF50;
   border: none;
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: bold;
   display: inline-block;
   font-size: 20px;
   margin: 4px 2px;
   cursor: pointer;
   background-color: #f44336;
    border-radius: 8px;
} 
.button {background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #f44336;
    border-radius: 8px;
  }

    p{
      font-size: 34px;
      color:black;
      font-weight: bold;
    }
    textarea.oblique 
    {
      font-style: oblique;
      font-size: 24px;
      background-color:#ffcccc;
    color:black;
    font-weight: bold;
    border-radius: 8px;
}
table {
  width: 400px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: center; background-color: #5f2c82;
}



tr :hover {
      background-color: #49a09d;
    }
  
  td {
   
    width: 200px;
    text-align: center;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: #49a09d;
        z-index: -1;
      }
    }
  }
    </style>
      </head>
<body>
  <div align="right">
    <a href='logout.php'><input type=button value='Logout' class="button" align="right" name=Logout></a>
  </div>
   <center><br><br>
    <?php 
    echo "<h1>".$_POST['a']."</h1><br>";
    ?>
    </center>
    <form action="check.php" method="POST">
      <div align="center">
      <table>        
      <tr>
      <th>Name</th>
      <th>Mark</th>
      </tr>
    <?php 
    $mysqli=new mysqli('localhost','root','','dbms_project');  
    session_start();
      $uname=$_SESSION['variable'];
      $_SESSION['table']=  $_POST['a'];
      $a="SELECT student FROM ".$_POST['a']." where Teacher='".$uname."'";//extract students from the subject
      $sql=$mysqli->query($a); 
      $i=0;
      
      while($row = $sql->fetch_array())
      {
          echo"<tr>";
        echo"<td>".$row[0]."</td>";
        echo'<td><input type="checkbox" name="check_list[]" value="'.$row[0].'"></td></tr>';
      }
      

  $mysqli->close();  
    ?>
     </table>
     </div>
    <center>
    <input type="submit" value="Submit">  
    </center>
</form> 
</body>
</html>
